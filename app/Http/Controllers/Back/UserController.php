<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function pelanggan()
    {
        $data = [
            'title' => 'Daftar Pengguna Biasa',
            'menu' => 'Manajemen Pengguna',
            'submenu' => 'Pengguna Biasa',
            'users' => User::where('role', 'pelanggan')->get(),
        ];
        return view('back.pages.pengguna.pelanggan', $data);
    }

    public function pelangganStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        $user->role = 'pelanggan';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('back.pengguna.pelanggan')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function pelangganUpdate(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ]);

        $user = User::find($id);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('back.pengguna.pelanggan')->with('success', 'Pengguna berhasil diubah');
    }

    public function pelangganDestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('back.pengguna.pelanggan')->with('success', 'Pengguna berhasil dihapus');
    }

    public function admin()
    {
        $data = [
            'title' => 'Daftar Admin',
            'menu' => 'Manajemen Pengguna',
            'submenu' => 'Admin',
            'users' => User::where('role', 'admin')->get(),
        ];
        return view('back.pages.pengguna.admin', $data);
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        $user->role = 'admin';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('back.pengguna.admin')->with('success', 'Admin berhasil ditambahkan');
    }

    public function adminUpdate(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ]);

        $user = User::find($id);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('back.pengguna.admin')->with('success', 'Admin berhasil diubah');
    }

    public function adminDestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('back.pengguna.admin')->with('success', 'Admin berhasil dihapus');
    }

    public function owner()
    {
        $data = [
            'title' => 'Daftar Owner',
            'menu' => 'Manajemen Pengguna',
            'submenu' => 'Owner',
            'users' => User::where('role', 'owner')->get(),
        ];
        return view('back.pages.pengguna.owner', $data);
    }

    public function ownerStore(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        $user->role = 'owner';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('back.pengguna.owner')->with('success', 'Owner berhasil ditambahkan');
    }

    public function ownerUpdate(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
        ]);

        $user = User::find($id);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/pengguna/', $fileName, 'public');
            $user->foto = $fileName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('back.pengguna.owner')->with('success', 'Owner berhasil diubah');
    }

    public function ownerDestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('back.pengguna.owner')->with('success', 'Owner berhasil dihapus');
    }
}
