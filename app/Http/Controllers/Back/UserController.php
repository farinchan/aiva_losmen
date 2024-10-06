<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function pelanggan()
    {
        $data = [
            'title' => 'Daftar Pengguna Biasa',
            'menu' => 'Manajemen Pengguna',
            'submenu' => 'Pengguna Biasa',
            'users' => User::with('pelanggan')->has('pelanggan')->latest()->get(),
        ];
        // dd($data);
        // return response()->json($data);
        return view('back.pages.pengguna.pelanggan', $data);
    }

    public function pelangganStore(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ], [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus valid',
            'unique' => ':attribute sudah terdaftar',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berformat jpeg, png, jpg, gif, svg',
            'max' => ':attribute maksimal 2MB',
        ]);

        if ($validator->fails()) {
            Alert::error('Validator Error', $validator->errors()->all());
            return back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $pelanggan = new Pelanggan();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->storeAs('uploads/pengguna/', time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension(), 'public');
            $pelanggan->foto = $filePath;
        }
        $pelanggan->nama = $request->name;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->user_id = $user->id;
        $pelanggan->save();

        Alert::success('Berhasil', 'Pengguna berhasil ditambahkan');
        return redirect()->route('back.pengguna.pelanggan');

    }

    public function pelangganUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus valid',
            'unique' => ':attribute sudah terdaftar',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berformat jpeg, png, jpg, gif, svg',
            'max' => ':attribute maksimal 2MB',
        ]);

        if ($validator->fails()) {
            Alert::error('Validator Error', $validator->errors()->all());
            return back()->withInput()->withErrors($validator);
        }

        $user = User::find($id);
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $pelanggan = $user->pelanggan;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->storeAs('uploads/pengguna/', time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension(), 'public');
            $pelanggan->foto = $filePath;
        }
        $pelanggan->nama = $request->name;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        Alert::success('Berhasil', 'Pengguna berhasil diubah');
        return redirect()->route('back.pengguna.pelanggan')->with('success', 'Pengguna berhasil diubah');
    }

    public function pelangganDestroy($id)
    {
        $user = User::find($id);
        Pelanggan::where('user_id', $id)->delete();
        $user->delete();

        Alert::success('Berhasil', 'Pengguna berhasil dihapus');
        return redirect()->route('back.pengguna.pelanggan')->with('success', 'Pengguna berhasil dihapus');
    }

    public function pegawai()
    {
        $data = [
            'title' => 'Daftar Pegawai',
            'menu' => 'Manajemen Pengguna',
            'submenu' => 'Pegawai',
            'users' => User::with('pegawai')->has('pegawai')->latest()->get(),
        ];
        return view('back.pages.pengguna.pegawai', $data);
    }

    public function pegawaiStore(Request $request)
    {
        // dd($request->all());
        $validator= Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_telp' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'jabatan' => 'nullable',
            'password' => 'required|min:8',
        ], [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus valid',
            'unique' => ':attribute sudah terdaftar',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berformat jpeg, png, jpg, gif, svg',
            'max' => ':attribute maksimal 2MB',
        ]);

        if ($validator->fails()) {
            Alert::error('Validator Error', $validator->errors()->all());
            return back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if($request->role_pegawai){
            $user->assignRole('pegawai');
        }

        if($request->role_admin_pegawai){
            $user->assignRole('admin pegawai');
        }

        if($request->role_admin_super){
            $user->assignRole('admin super');
        }

        if($request->role_admin_hotel){
            $user->assignRole('admin hotel');
        }


        $pegawai = new Pegawai();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->storeAs('uploads/pengguna/', time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension(), 'public');
            $pegawai->foto = $filePath;
        }
        $pegawai->nama = $request->name;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->user_id = $user->id;
        $pegawai->save();

        Alert::success('Berhasil', 'Pegawai berhasil ditambahkan');
        return redirect()->route('back.pengguna.pegawai');
    }

    public function pegawaiUpdate(Request $request, $id)
    {
        $validator= Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'no_telp' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'jabatan' => 'required',
        ], [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus valid',
            'unique' => ':attribute sudah terdaftar',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berformat jpeg, png, jpg, gif, svg',
            'max' => ':attribute maksimal 2MB',
        ]);

        if ($validator->fails()) {
            Alert::error('Validator Error', $validator->errors()->all());
            return back()->withInput()->withErrors($validator);
        }

        $user = User::find($id);
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        if($request->role_pegawai){
            $user->assignRole('pegawai');
        }else{
            $user->removeRole('pegawai');
        }

        if($request->role_admin_pegawai){
            $user->assignRole('admin pegawai');
        }else{
            $user->removeRole('admin pegawai');
        }

        if($request->role_admin_super){
            $user->assignRole('admin super');
        }else{
            $user->removeRole('admin super');
        }

        if($request->role_admin_hotel){
            $user->assignRole('admin hotel');
        }else{
            $user->removeRole('admin hotel');
        }

        $pegawai = $user->pegawai;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->storeAs('uploads/pengguna/', time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension(), 'public');
            $pegawai->foto = $filePath;
        }
        $pegawai->nama = $request->name;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->save();

        Alert::success('Berhasil', 'Pegawai berhasil diubah');
        return redirect()->route('back.pengguna.pegawai');
    }

    public function pegawaiDestroy($id)
    {
        $user = User::find($id);
        Pegawai::where('user_id', $id)->delete();
        $user->delete();

        Alert::success('Berhasil', 'Pegawai berhasil dihapus');
        return redirect()->route('back.pengguna.pegawai');
    }

}
