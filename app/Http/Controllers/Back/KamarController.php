<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Tipe;
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
            'kamar' => Kamar::with(['tipe', 'fasilitasKamar'])->get(),
            'tipe_kamar' => Tipe::all(),
        ];
        // dd($data);
        return view('back.pages.kamar.daftar_kamar', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Kamar',
            'menu' => 'Manajemen Kamar',
            'submenu' => 'Kamar',
            'tipe_kamar' => Tipe::all(),
            'fasilitas_kamar' => Fasilitas::all(),
        ];
        return view('back.pages.kamar.tambah_kamar', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
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

        $fasilitas = $request->fasilitas;
        foreach ($fasilitas as $f) {
            FasilitasKamar::create([
                'kamar_id' => Kamar::latest()->first()->id,
                'fasilitas_id' => $f,
            ]);
        }

        Alert::success('Berhasil', 'Data kamar berhasil ditambahkan');
        return redirect()->route('back.kamar.index');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Kamar',
            'menu' => 'Manajemen Kamar',
            'submenu' => 'Kamar',
            'tipe_kamar' => Tipe::all(),
            'fasilitas_kamar' => Fasilitas::all(),
            'kamar' => Kamar::find($id),
            'fasilitas' => FasilitasKamar::where('kamar_id', $id)->get(),
        ];
        return view('back.pages.kamar.edit_kamar', $data);
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'tipe_id' => 'required|numeric',
                'nomor_kamar' => 'required|string',
                'kapasitas' => 'required|numeric',
                'harga' => 'required|numeric',
                'deskripsi' => 'required|string',
                'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
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
        $kamar = Kamar::find($id);
        $kamar->tip_id = $request->tipe_id;
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->kapasitas = $request->kapasitas;
        $kamar->harga = $request->harga;
        $kamar->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/kamar/', $fileName, 'public');
            $kamar->foto = $fileName;
        }

        $kamar->save();

        $fasilitas = $request->fasilitas;
        FasilitasKamar::where('kamar_id', $id)->delete();
        foreach ($fasilitas as $f) {
            FasilitasKamar::create([
                'kamar_id' => $id,
                'fasilitas_id' => $f,
            ]);
        }

        Alert::success('Berhasil', 'Data kamar berhasil diubah');
        return redirect()->route('back.kamar.index');

    }
}
