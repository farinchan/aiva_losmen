<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\FasilitasKamarController;
use App\Http\Controllers\Back\KamarController;
use App\Http\Controllers\Back\MetodePembayaranController;
use App\Http\Controllers\Back\TipeKamarController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/my-profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget-password');
    Route::post('/forget-password', [AuthController::class, 'forgetPasswordProcess'])->name('forget-password.process');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password/{token}', [AuthController::class, 'resetPasswordProcess'])->name('reset-password.process');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('back')->name('back.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('metode-pembayaran')->name('metode-pembayaran.')->group(function () {
        Route::get('/', [MetodePembayaranController::class, 'index'])->name('index');
        Route::post('/store', [MetodePembayaranController::class, 'store'])->name('store');
        Route::put('/update/{id}', [MetodePembayaranController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MetodePembayaranController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('fasilitas-kamar')->name('fasilitas-kamar.')->group(function () {
        Route::get('/', [FasilitasKamarController::class, 'index'])->name('index');
        Route::post('/store', [FasilitasKamarController::class, 'store'])->name('store');
        Route::put('/update/{id}', [FasilitasKamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [FasilitasKamarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('tipe-kamar')->name('tipe-kamar.')->group(function () {
        Route::get('/', [TipeKamarController::class, 'index'])->name('index');
        Route::post('/store', [TipeKamarController::class, 'store'])->name('store');
        Route::put('/update/{id}', [TipeKamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [TipeKamarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('kamar')->name('kamar.')->group(function () {
        Route::get('/', [KamarController::class, 'index'])->name('index');
        Route::get('/create', [KamarController::class, 'create'])->name('create');
        Route::post('/store', [KamarController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KamarController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [KamarController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [KamarController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('pengguna')->name('pengguna.')->group(function () {
        Route::get('/pelanggan', [UserController::class, 'pelanggan'])->name('pelanggan');
        Route::post('/pelanggan/store', [UserController::class, 'pelangganStore'])->name('pelanggan.store');
        Route::put('/pelanggan/update/{id}', [UserController::class, 'pelangganUpdate'])->name('pelanggan.update');
        Route::delete('/pelanggan/destroy/{id}', [UserController::class, 'pelangganDestroy'])->name('pelanggan.destroy');

        Route::get('/admin', [UserController::class, 'admin'])->name('admin');
        Route::post('/admin/store', [UserController::class, 'adminStore'])->name('admin.store');
        Route::put('/admin/update/{id}', [UserController::class, 'adminUpdate'])->name('admin.update');
        Route::delete('/admin/destroy/{id}', [UserController::class, 'adminDestroy'])->name('admin.destroy');

        Route::get('/owner', [UserController::class, 'owner'])->name('owner');
        Route::post('/owner/store', [UserController::class, 'ownerStore'])->name('owner.store');
        Route::put('/owner/update/{id}', [UserController::class, 'ownerUpdate'])->name('owner.update');
        Route::delete('/owner/destroy/{id}', [UserController::class, 'ownerDestroy'])->name('owner.destroy');
    });
});

