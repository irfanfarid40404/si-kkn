<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PiketController;


// =======================================================
// GUEST MIDDLEWARE (Hanya bisa diakses jika BELUM login)
// =======================================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// =======================================================
// AUTH MIDDLEWARE (Hanya bisa diakses jika SUDAH login)
// =======================================================
Route::middleware('auth')->group(function () {
    
    // Halaman Dashboard Utama
    Route::get('/', function () {
        // Mengirimkan variabel mock data agar halaman dashboard tidak error saat di-render
        $stats = ['total_jadwal' => 2, 'jumlah_anggota' => 12, 'piket_aktif' => 'Kelompok A', 'pengumuman_baru' => 2];
        $schedules = [
            ['title' => 'Sosialisasi Stunting', 'location' => 'Balai Desa', 'pj' => 'Siti', 'time' => '09:00', 'color' => 'blue']
        ];
        $piketMembers = [];
        $prokers = [];
        $announcements = [];
        $documentations = [];

        return view('dashboard', compact('stats', 'schedules', 'piketMembers', 'prokers', 'announcements', 'documentations'));
    })->name('kkn.dashboard');

    // Halaman Jadwal Kegiatan
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('kkn.jadwal');
    
    // Proses Keluar Sistem (Logout)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route untuk Halaman Piket Harian
    Route::get('/piket', [PiketController::class, 'index'])->name('kkn.piket');
});