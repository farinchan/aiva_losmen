<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',
            'transaksi_hari_ini' => Transaksi::whereDate('created_at', date('Y-m-d'))->count(),
            'total_transaksi' => Transaksi::count(),
            'pendapatan_hari_ini' => Transaksi::whereDate('created_at', date('Y-m-d'))->sum('total_pembayaran'),
            'total_pendapatan' => Transaksi::sum('total_pembayaran'),
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

    public function profileEdit() {

        $data = [
            'title' => 'Edit Profile',
            'menu' => 'Profile',
            'submenu' => '',
        ];

        return view('back.pages.dashboard.profile_edit', $data);
    }

    public function profileUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
            'password' => 'nullable|string|min:8',
        ],[
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max karakter',
            'in' => ':attribute harus L atau P',
            'date' => ':attribute harus tanggal',
            'email' => ':attribute harus email',
            'unique' => ':attribute sudah terdaftar',
            'image' => ':attribute harus gambar',
            'mimes' => ':attribute harus berformat jpg, jpeg, png',
            'min' => ':attribute minimal :min karakter',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data gagal diperbarui');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $pegawai = Pegawai::where('user_id', Auth::user()->id)->first();
        $pegawai->nama = $request->nama;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->alamat = $request->alamat;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filePath = $foto->storeAs('uploads/pengguna/', time() . '_' . Str::slug($request->nama) . '.' . $foto->getClientOriginalExtension(), 'public');
            $pegawai->foto = $filePath;
        }
        $pegawai->save();


        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect()->back();
    }
}
