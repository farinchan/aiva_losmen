<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user()
        ];
        return view('front.pages.profile.index', $data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
        ], [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus valid',
        ]);

        if ($validator->fails()) {
            Alert::error('Validator Error', $validator->errors()->all());
            return back();
        }

        $user = User::find(auth()->id());
        $user->email = $request->email;
        if($request->password != null || $request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->name;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->user_id = $user->id;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $pelanggan->foto = $path;
        }

        $pelanggan->update();

        Alert::success('Success', 'Profil berhasil diupdate');
        return back();
    }
}
