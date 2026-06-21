<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Jalur akses untuk halaman utama dashboard KKN
Route::get('/dashboard', [DashboardController::class, 'index'])->name('kkn.dashboard');
