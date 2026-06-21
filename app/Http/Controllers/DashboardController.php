<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Ringkasan Statistik (Dapat diganti Eloquent Model seperti: Member::count())
        $stats = [
            'total_jadwal'     => '2 Agenda',
            'jumlah_anggota'   => '12 Orang',
            'piket_aktif'      => '3 Anggota',
            'pengumuman_baru'  => '2 Notif',
        ];

        // 2. Data Jadwal Hari Ini
        $schedules = [
            [
                'title' => 'Sosialisasi Stunting di Posyandu Melati',
                'location' => 'Balai Dusun II',
                'pj' => 'Siti Rahma',
                'time' => '09:00 - 11:30 WIB',
                'color' => 'blue'
            ],
            [
                'title' => 'Rapat Evaluasi Mingguan Kelompok',
                'location' => 'Posko Utama KKN',
                'pj' => 'Andi Wijaya',
                'time' => '19:30 - Selesai',
                'color' => 'orange'
            ]
        ];

        // 3. Data Petugas Piket
        $piketMembers = [
            ['name' => 'Rian Hidayat', 'task' => 'Piket Kebersihan Posko & Masak Pagi', 'status' => 'Selesai', 'status_color' => 'emerald'],
            ['name' => 'Larasati Putri', 'task' => 'Belanja Logistik & Masak Sore', 'status' => 'Sedang Jalan', 'status_color' => 'amber'],
            ['name' => 'Bagas Dwi', 'task' => 'Dokumentasi & Standby Posko', 'status' => 'Belum Mulai', 'status_color' => 'slate'],
        ];

        // 4. Data Progress Program Kerja (Proker)
        $prokers = [
            ['title' => 'Digitalisasi UMKM Keripik Tempe Desa', 'percentage' => 80, 'theme' => 'blue'],
            ['title' => 'Pembuatan Peta Batas Wilayah Dusun III', 'percentage' => 45, 'theme' => 'amber'],
            ['title' => 'Bimbingan Belajar Gratis & Pojok Baca', 'percentage' => 100, 'theme' => 'emerald'],
        ];

        // 5. Data Pengumuman Terbaru
        $announcements = [
            [
                'title' => 'Jadwal Monitoring DPL',
                'excerpt' => 'Dosen Pembimbing Lapangan (DPL) dijadwalkan hadir berkunjung ke posko...',
                'content' => 'Dosen Pembimbing Lapangan (DPL) dijadwalkan hadir berkunjung ke posko pada tanggal 26 Juni 2026. Mohon persiapkan hardcopy logbook harian.',
                'is_important' => true,
                'time_ago' => '2 jam yang lalu'
            ],
            [
                'title' => 'Pengumpulan Berkas Luaran KKN',
                'excerpt' => 'Seluruh anggota diwajibkan mengunggah draf artikel ilmiah luaran KKN...',
                'content' => 'Seluruh anggota diwajibkan mengunggah draf artikel ilmiah luaran KKN paling lambat H-7 sebelum penarikan.',
                'is_important' => false,
                'time_ago' => 'Kemarin, 14:20 WIB'
            ]
        ];

        // 6. Data Dokumentasi (Foto Grid)
        $documentations = [
            ['image' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=300', 'caption' => 'Mengajar di SD 01'],
            ['image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=300', 'caption' => 'Kerja Bakti Desa'],
        ];

        // Mengirimkan seluruh variabel ke view dashboard
        return view('dashboard', compact(
            'stats', 
            'schedules', 
            'piketMembers', 
            'prokers', 
            'announcements', 
            'documentations'
        ));
    }
}
