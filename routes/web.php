<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
