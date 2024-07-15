<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::prefix('back')->name('back.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

