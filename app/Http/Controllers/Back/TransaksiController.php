<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KonfirmasiPembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{

    public function cancel($id_transaksi){
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $transaksi->update([
            'status' => 'dibatalkan'
        ]);

        $user = $transaksi->pelanggan->user;

        Mail::send('email.transaction_cancel', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Pembatalan Pemesanan');
        });

        Alert::success('Berhasil', 'Transaksi berhasil dibatalkan');
        return redirect()->back();
    }

    public function konfirmasiPembayaran(Request $request){
        $search = $request->input('q');
        $data = [
            'title' => 'Konfirmasi Pembayaran',
            'menu' => 'Transaksi',
            'submenu' => 'Konfirmasi Pembayaran',
            'list_transaksi' => Transaksi::with(['kamar', 'pelanggan'])->where('status', 'selesaikan pembayaran')->whereHas('pelanggan', function($query) use ($search){
                $query->where('nama', 'like', '%'.$search.'%');
            })->latest()->paginate(10)
        ];
        return view('back.pages.transaksi.konfirmasi_pembayaran', $data);
    }

    public function konfirmasiPembayaranApprove($id_konfirmasi){
        $konfirmasi = KonfirmasiPembayaran::findOrFail($id_konfirmasi);
        $konfirmasi->update([
            'status' => 'Diterima',
            'waktu_konfirmasi' => now(),
            'admin_id' => Auth::user()->id
        ]);

        $konfirmasi->transaksi->update([
            'status' => 'reservasi'
        ]);

        $user = $konfirmasi->transaksi->pelanggan->user;

        Mail::send('email.transaction_approve', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Pemesanan Berhasil');
        });

        Alert::success('Berhasil', 'Konfirmasi pembayaran berhasil di approve');
        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil di approve');
    }

    public function konfirmasiPembayaranReject($id_konfirmasi){
        $konfirmasi = KonfirmasiPembayaran::findOrFail($id_konfirmasi);
        $konfirmasi->update([
            'status' => 'Ditolak',
            'waktu_konfirmasi' => now(),
            'admin_id' => Auth::user()->id
        ]);

        $user = $konfirmasi->transaksi->pelanggan->user;

        Mail::send('email.transaction_reject', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Pembayaran Ditolak');
        });

        Alert::success('Berhasil', 'Konfirmasi pembayaran berhasil di reject');
        return redirect()->back()->with('success', 'Konfirmasi pembayaran berhasil di reject');
    }

    public function reservasi(Request $request){
        $search = $request->input('q');
        $data = [
            'title' => 'Reservasi',
            'menu' => 'Transaksi',
            'submenu' => 'Reservasi',
            'list_transaksi' => Transaksi::with(['kamar', 'pelanggan'])->where('status', 'reservasi')->whereHas('pelanggan', function($query) use ($search){
                $query->where('nama', 'like', '%'.$search.'%');
            })->latest()->paginate(10)
        ];
        return view('back.pages.transaksi.reservasi', $data);
    }

    public function ReservasiCheckIn(Request $request){
        $search = $request->input('q');
        $data = [
            'title' => 'Check In',
            'menu' => 'Transaksi',
            'submenu' => 'Check In',
            'list_transaksi' => Transaksi::with(['kamar', 'pelanggan'])->where('status', 'digunakan')->whereHas('pelanggan', function($query) use ($search){
                $query->where('nama', 'like', '%'.$search.'%');
            })->latest()->paginate(10)
        ];

        return view('back.pages.transaksi.reservasi_checkin', $data);
    }

    public function ReservasiCheckOut(Request $request){
        $search = $request->input('q');
        $data = [
            'title' => 'Check Out',
            'menu' => 'Transaksi',
            'submenu' => 'Check Out',
            'list_transaksi' => Transaksi::with(['kamar', 'pelanggan'])->where('status', 'selesai')->whereHas('pelanggan', function($query) use ($search){
                $query->where('nama', 'like', '%'.$search.'%');
            })->latest()->paginate(10)
        ];

        return view('back.pages.transaksi.reservasi_checkout', $data);

    }

    public function reservasiCancel(Request $request){
        $search = $request->input('q');
        $data = [
            'title' => 'Cancel Reservasi',
            'menu' => 'Transaksi',
            'submenu' => 'Cancel Reservasi',
            'list_transaksi' => Transaksi::with(['kamar', 'pelanggan'])->where('status', 'dibatalkan')->whereHas('pelanggan', function($query) use ($search){
                $query->where('nama', 'like', '%'.$search.'%');
            })->latest()->paginate(10)
        ];

        return view('back.pages.transaksi.reservasi_cancel', $data);
    }

    public function checkIn($id_transaksi){
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $transaksi->update([
            'status' => 'digunakan'
        ]);

        Alert::success('Berhasil', 'Check In berhasil');
        return redirect()->back();
    }

    public function checkOut($id_transaksi){
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $transaksi->update([
            'status' => 'selesai'
        ]);

        Alert::success('Berhasil', 'Check Out berhasil');
        return redirect()->back();
    }
}
