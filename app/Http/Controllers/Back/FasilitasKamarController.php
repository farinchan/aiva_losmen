<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FasilitasKamarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Fasilitas Kamar',
            'menu' => 'Manajemen Kamar',
            'submenu' => 'Fasilitas Kamar',
            'fasilitas_kamar' => Fasilitas::all(),
        ];
        return view('back.pages.kamar.fasilitas_kamar', $data);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'nama' => 'required|string',
            'detail' => 'required|string',
            'icon' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format png, jpg, jpeg',
            'max' => ':attribute maksimal :max KB',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back();
        }

        $file = $request->file('icon');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads/fasilitas/', $fileName, 'public');

        Fasilitas::create([
            'nama' => $request->nama,
            'detail' => $request->detail,
            'icon' => $fileName,
        ]);

        Alert::success('Berhasil', 'Data fasilitas kamar berhasil ditambahkan');
        return redirect()->back();        
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'nama' => 'required|string',
            'detail' => 'required|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'required' => ':attribute tidak boleh kosong',
            'string' => ':attribute harus berupa string',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa gambar dengan format png, jpg, jpeg',
            'max' => ':attribute maksimal :max KB',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back();
        }

        $fasilitas = Fasilitas::find($id);
        $fileName = $fasilitas->icon;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/fasilitas/', $fileName, 'public');
        }

        $fasilitas->update([
            'nama' => $request->nama,
            'detail' => $request->detail,
            'icon' => $fileName,
        ]);

        Alert::success('Berhasil', 'Data fasilitas kamar berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        Storage::delete('public/uploads/fasilitas/' . $fasilitas->icon);
        $fasilitas->delete();

        Alert::success('Berhasil', 'Data fasilitas kamar berhasil dihapus');
        return redirect()->back();
    }
}
