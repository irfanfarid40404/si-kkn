<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;

// Jalur akses untuk halaman utama dashboard KKN
Route::get('/dashboard', [DashboardController::class, 'index'])->name('kkn.dashboard');

// Route untuk halaman jadwal kegiatan KKN
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('kkn.jadwal');
