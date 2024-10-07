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

Route::get('/booking/{id}', [FrontTransaksiController::class, 'bookingDetail'])->name('booking')->middleware([ 'role:pelanggan', 'redirectIfNotAuthenticated']);
Route::post('/booking/{id}', [FrontTransaksiController::class, 'bookingProcess'])->name('booking.process')->middleware([ 'role:pelanggan', 'redirectIfNotAuthenticated']);

Route::get('/pembayaran/{id}', [FrontTransaksiController::class, 'pembayaranDetail'])->name('pembayaran')->middleware(['auth', 'role:pelanggan']);
Route::post('/pembayaran/{id}', [FrontTransaksiController::class, 'pembayaranProcess'])->name('pembayaran.process')->middleware(['auth', 'role:pelanggan']);


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

    Route::prefix('metode-pembayaran')->name('metode-pembayaran.')->middleware('role:admin super')->group(function () {
        Route::get('/', [MetodePembayaranController::class, 'index'])->name('index');
        Route::post('/store', [MetodePembayaranController::class, 'store'])->name('store');
        Route::put('/update/{id}', [MetodePembayaranController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MetodePembayaranController::class, 'destroy'])->name('destroy');
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

