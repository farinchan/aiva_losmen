<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TipeKamarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tipe Kamar',
            'menu' => 'Manajemen Kamar',
            'submenu' => 'Tipe Kamar',
            'tipe_kamar' => Tipe::all(),
        ];
        // dd($data);
        return view('back.pages.kamar.tipe_kamar', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back();
        }

        $tipe_kamar = new Tipe();
        $tipe_kamar->nama = $request->nama;
        $tipe_kamar->deskripsi = $request->deskripsi;
        $tipe_kamar->save();

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back();
        }

        $tipe_kamar = Tipe::find($id);
        $tipe_kamar->nama = $request->nama;
        $tipe_kamar->deskripsi = $request->deskripsi;
        $tipe_kamar->save();

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tipe_kamar = Tipe::find($id);
        $tipe_kamar->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->back();
    }


}
 