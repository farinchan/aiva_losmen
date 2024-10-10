<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\FasilitasKamarController;
use App\Http\Controllers\Back\KamarController;
use App\Http\Controllers\Back\MetodePembayaranController;
use App\Http\Controllers\Back\TipeKamarController;
use App\Http\Controllers\Back\UlasanController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\TransaksiController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\KamarController as FrontKamarController;
use App\Http\Controllers\Front\TransaksiController as FrontTransaksiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/my-profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/kamar', [FrontKamarController::class, 'listKamar'])->name('kamar');
Route::get('/kamar/{id}', [FrontKamarController::class, 'detailKamar'])->name('kamar.detail');

Route::get('/booking/{id}', [FrontTransaksiController::class, 'bookingDetail'])->name('booking')->middleware(['redirectIfNotAuthenticated', 'role:pelanggan', ]);
Route::post('/booking/{id}', [FrontTransaksiController::class, 'bookingProcess'])->name('booking.process')->middleware(['redirectIfNotAuthenticated', 'role:pelanggan']);

Route::get('/pembayaran/{id}', [FrontTransaksiController::class, 'pembayaranDetail'])->name('pembayaran')->middleware(['auth', 'role:pelanggan']);
Route::post('/pembayaran/{id}', [FrontTransaksiController::class, 'pembayaranProcess'])->name('pembayaran.process')->middleware(['auth', 'role:pelanggan']);

Route::get('/transaksi', [FrontTransaksiController::class, 'myTransaction'])->name('transaksi')->middleware(['auth', 'role:pelanggan']);
Route::get('/transaksi/{id}/cancel', [FrontTransaksiController::class, 'myTransactionCancel'])->name('transaksi.cancel')->middleware(['auth', 'role:pelanggan']);
Route::get('/transaksi/{id}/receipt', [FrontTransaksiController::class, 'receipt'])->name('transaksi.receipt')->middleware(['auth', 'role:pelanggan']);


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest')->name('login.process');
    Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->middleware('guest')->name('register.process');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->middleware('guest')->name('forget-password');
    Route::post('/forget-password', [AuthController::class, 'forgetPasswordProcess'])->middleware('guest')->name('forget-password.process');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest')->name('reset-password');
    Route::post('/reset-password/{token}', [AuthController::class, 'resetPasswordProcess'])->middleware('guest')->name('reset-password.process');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::prefix('back')->name('back.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('role:admin super')->name('dashboard');
    Route::get('/dashboard/statistik', [DashboardController::class, 'statistik'])->middleware('role:admin super')->name('dashboard.statistik');

    Route::prefix('metode-pembayaran')->name('metode-pembayaran.')->middleware('role:admin super')->group(function () {
        Route::get('/', [MetodePembayaranController::class, 'index'])->name('index');
        Route::post('/store', [MetodePembayaranController::class, 'store'])->name('store');
        Route::put('/update/{id}', [MetodePembayaranController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MetodePembayaranController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('transaksi')->name('transaksi.')->middleware('role:admin super')->group(function () {
        Route::get('/{id}/detail', [TransaksiController::class, 'detail'])->name('detail');
        Route::get('/{id}/invoice', [TransaksiController::class, 'invoice'])->name('invoice');

        Route::get('/konfirmasi-pembayaran', [TransaksiController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');
        Route::post('/konfirmasi-pembayaran/{id_konfirmasi}/approve', [TransaksiController::class, 'konfirmasiPembayaranApprove'])->name('konfirmasi-pembayaran.approve');
        Route::post('/konfirmasi-pembayaran/{id_konfirmai}/reject', [TransaksiController::class, 'konfirmasiPembayaranReject'])->name('konfirmasi-pembayaran.reject');

        Route::get('/reservasi', [TransaksiController::class, 'reservasi'])->name('reservasi');
        Route::get('/reservasi/check-in', [TransaksiController::class, 'reservasiCheckIn'])->name('reservasi.check-in');
        Route::get('/reservasi/check-out', [TransaksiController::class, 'reservasiCheckOut'])->name('reservasi.check-out');
        Route::get('/reservasi/cancel', [TransaksiController::class, 'reservasiCancel'])->name('reservasi.cancel');

        Route::post('/{id}/check-in', [TransaksiController::class, 'checkIn'])->name('check-in');
        Route::post('/{id}/check-out', [TransaksiController::class, 'checkOut'])->name('check-out');
        Route::post('/{id}/cancel', [TransaksiController::class, 'cancel'])->name('cancel');

    });

    Route::prefix('fasilitas-kamar')->name('fasilitas-kamar.')->middleware('role:admin super')->group(function () {
        Route::get('/', [FasilitasKamarController::class, 'index'])->name('index');
        Route::post('/store', [FasilitasKamarController::class, 'store'])->name('store');
        Route::put('/update/{id}', [FasilitasKamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [FasilitasKamarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tipe-kamar')->name('tipe-kamar.')->middleware('role:admin super')->group(function () {
        Route::get('/', [TipeKamarController::class, 'index'])->name('index');
        Route::post('/store', [TipeKamarController::class, 'store'])->name('store');
        Route::put('/update/{id}', [TipeKamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [TipeKamarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('kamar')->name('kamar.')->middleware('role:admin super')->group(function () {
        Route::get('/', [KamarController::class, 'index'])->name('index');
        Route::get('/create', [KamarController::class, 'create'])->name('create');
        Route::post('/store', [KamarController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KamarController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [KamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [KamarController::class, 'destroy'])->name('destroy');

        Route::get('/detail/{id}', [KamarController::class, 'detail'])->name('detail');
        Route::get('/detail/{id}/ulasan', [KamarController::class, 'ulasan'])->name('ulasan');
    });

    Route::prefix('ulasan')->name('ulasan.')->middleware('role:admin super')->group(function () {
        Route::get('/', [UlasanController::class, 'index'])->name('index');
    });

    Route::prefix('pengguna')->name('pengguna.')->middleware('role:admin super')->group(function () {
        Route::get('/pelanggan', [UserController::class, 'pelanggan'])->name('pelanggan');
        Route::post('/pelanggan/store', [UserController::class, 'pelangganStore'])->name('pelanggan.store');
        Route::put('/pelanggan/update/{id}', [UserController::class, 'pelangganUpdate'])->name('pelanggan.update');
        Route::delete('/pelanggan/destroy/{id}', [UserController::class, 'pelangganDestroy'])->name('pelanggan.destroy');

        Route::get('/pegawai', [UserController::class, 'pegawai'])->name('pegawai');
        Route::post('/pegawai/store', [UserController::class, 'pegawaiStore'])->name('pegawai.store');
        Route::put('/pegawai/update/{id}', [UserController::class, 'pegawaiUpdate'])->name('pegawai.update');
        Route::delete('/pegawai/destroy/{id}', [UserController::class, 'pegawaiDestroy'])->name('pegawai.destroy');

    });
});

