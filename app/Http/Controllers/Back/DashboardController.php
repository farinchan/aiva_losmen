<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',
            'jumlah_reservasi' => Transaksi::where('status', 'reservasi')->count(),
            'jumlah_digunakan' => Transaksi::where('status', 'digunakan')->count(),
            'jumlah_selesai' => Transaksi::where('status', 'selesai')->count(),
            'jumlah_dibatalkan' => Transaksi::where('status', 'dibatalkan')->count(),
            'jumlah_pelanggan' => Pelanggan::count(),
            'jumlah_pegawai' => Pegawai::count(),
            'jumlah_kamar' => Kamar::count(),
            'jumlah_ulasan' => Ulasan::count(),

        ];
        return view('back.pages.dashboard.index', $data);
    }

    public function statistik()
    {
        $data = [
            'transaksi_bulanan' => DB::table('transaksi')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
                ->groupBy('month')
                ->get(),
            'pendapatan_bulanan' => DB::table('transaksi')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('sum(total_pembayaran) as total'))
                ->groupBy('month')
                ->get(),
            'pendapatan_sebulan_terakhir' => DB::table('transaksi')->select(DB::raw('Date(created_at) as date'), DB::raw('sum(total_pembayaran) as total'))->limit(30)
                ->groupBy('date')
                ->get(),

            'transaksi_tahunan' => DB::table('transaksi')->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(*) as total'))
                ->groupBy('year')
                ->get(),
            'pendapatan_tahunan' => DB::table('transaksi')->select(DB::raw('YEAR(created_at) as year'), DB::raw('sum(total_pembayaran) as total'))
                ->groupBy('year')
                ->get(),
            'pendapatan_bulanan_tahun_ini' => DB::table('transaksi')->select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(total_pembayaran) as total'))
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->get(),

        ];

        return response()->json($data);
    }
}
