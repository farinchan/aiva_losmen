<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\KonfirmasiPembayaran;
use App\Models\MetodePembayaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class TransaksiController extends Controller
{
    public function bookingDetail(Request $request, $id)
    {
        $checkIn = $request->get('check_in');
        $checkOut = $request->get('check_out');

        if (!$checkIn || !$checkOut) {
            Alert::error('Check In dan Check Out harus diisi');
            return redirect()->back()->with('error', 'Check In dan Check Out harus diisi');
        }

        // dd($checkIn, $checkOut);

        $kamar = Kamar::findOrFail($id);

        $checkIn = Carbon::createFromFormat('m/d/Y', $checkIn)->format('Y-m-d');
        $checkOut = Carbon::createFromFormat('m/d/Y', $checkOut)->format('Y-m-d');

        if ($kamar->transaksi()->where(function ($query) use ($checkIn, $checkOut) {
            $query->where(function ($query) use ($checkIn, $checkOut) {
                $query->where('check_in', '>=', $checkIn)
                    ->where('check_in', '<', $checkOut);
            })->orWhere(function ($query) use ($checkIn, $checkOut) {
                $query->where('check_out', '>', $checkIn)
                    ->where('check_out', '<=', $checkOut);
            });
        })->exists()) {
            Alert::error('Kamar sudah dipesan pada tanggal tersebut');
            return redirect()->back()->with('error', 'Kamar sudah dipesan pada tanggal tersebut');
        }

        $data = [
            'title' => 'Booking Detail',
            'metaTitle' => 'Booking Detail',
            'metaDescription' => 'Booking Detail',
            'metaKeywords' => 'Booking Detail',
            'url' => route('kamar.detail', $id),
            'kamar' => $kamar,
            'list_metode_pembayaran' => MetodePembayaran::all(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
        ];

        return view('front.pages.transaksi.booking', $data);
    }

    public function bookingProcess(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'check_in' => 'required',
                'check_out' => 'required',
                'metode_pembayaran_id' => 'required|numeric',
            ],
            [
                'check_in.required' => 'Check In harus diisi',
                'check_out.required' => 'Check Out harus diisi',
                'metode_pembayaran_id.required' => 'Metode Pembayaran harus diisi',
            ]
        );

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $kamar = Kamar::findOrFail($id);

        $total_hari = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        $total_pembayaran = $total_hari * $kamar->harga;

        $transaksi = $kamar->transaksi()->create([
            'pelanggan_id' => Auth::user()->pelanggan->id_pelanggan,
            'tanggal_reservasi' => now(),
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => 'belum bayar',
            'total_hari' => $total_hari,
            'total_pembayaran' => $total_pembayaran,
            'metode_pembayaran_id' => $request->metode_pembayaran_id,
        ]);

        Alert::success('Berhasil', 'Transaksi berhasil ditambahkan');
        return redirect()->route('pembayaran', $transaksi->id);

    }

    public function pembayaranDetail($id)
    {

        $transaksi = Auth::user()->pelanggan->transaksi()->findOrFail($id);

        if ($transaksi->status != 'belum bayar') {
            Alert::error('Transaksi sudah dibayar');
            return redirect()->back()->with('error', 'Transaksi sudah dibayar');
        }

        $data = [
            'title' => 'Pembayaran',
            'metaTitle' => 'Pembayaran',
            'metaDescription' => 'Pembayaran',
            'metaKeywords' => 'Pembayaran',
            'url' => route('pembayaran', $id),
            'transaksi' => $transaksi,
        ];
        // dd($data);

        return view('front.pages.transaksi.pembayaran', $data);
    }

    public function pembayaranProcess(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'bukti_pembayaran' => 'required|image|mimes:png,jpg,jpeg|max:9000',
            ],
            [
                'bukti_pembayaran.required' => 'Bukti Pembayaran harus diisi',
                'bukti_pembayaran.image' => 'Bukti Pembayaran harus berupa gambar',
                'bukti_pembayaran.mimes' => 'Bukti Pembayaran harus berupa gambar dengan format png, jpg, jpeg',
                'bukti_pembayaran.max' => 'Bukti Pembayaran maksimal 9 MB',
            ]
        );

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $transaksi = Auth::user()->pelanggan->transaksi()->findOrFail($id);

        $file = $request->file('bukti_pembayaran');
        $filePath = $file->storeAs('uploads/bukti_pembayaran', time() . '_' . $transaksi->id . '_' . time() . '.' . $file->getClientOriginalExtension(), 'public');

        // $transaksi->update([
        //     'status' => 'sudah bayar',
        // ]);

        KonfirmasiPembayaran::create([
            'transaksi_id' => $transaksi->id,
            'bukti_pembayaran' => $filePath,
            'status' => false,
        ]);

        Alert::success('Berhasil', 'Pembayaran berhasil ditambahkan');
        return redirect()->route('transaksi');
    }


}
