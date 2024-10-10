<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
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

        ];

        return response()->json($data);
    }
}
