<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UserController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('back')->name('back.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

