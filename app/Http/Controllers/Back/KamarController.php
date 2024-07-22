<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KamarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kamar',
            'menu' => 'Manajemen Kamar',
            'submenu' => 'Kamar',
        ];
        return view('back.pages.kamar.kamar', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tipe_id' => 'required|numeric',
                'nomor_kamar' => 'required|string',
                'kapasitas' => 'required|numeric',
                'harga' => 'required|numeric',
                'deskripsi' => 'required|string',
                'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'required' => ':attribute tidak boleh kosong',
                'numeric' => ':attribute harus berupa angka',
                'string' => ':attribute harus berupa string',
                'image' => ':attribute harus berupa gambar',
                'mimes' => ':attribute harus berupa gambar dengan format png, jpg, jpeg',
                'max' => ':attribute maksimal :max KB',
            ]
        );

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back();
        }

        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads/kamar/', $fileName, 'public');

        Kamar::create([
            'tipe_id' => $request->tipe_id,
            'nomor_kamar' => $request->nomor_kamar,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
        ]);

        Alert::success('Berhasil', 'Data kamar berhasil ditambahkan');
        return redirect()->back();
    }
}
