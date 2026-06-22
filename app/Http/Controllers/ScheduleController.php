<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // 1. Jadwal Hari Ini
        $todaySchedules = [
            [
                'id' => 1,
                'title' => 'Sosialisasi Stunting & Pembagian PMT',
                'date' => 'Senin, 22 Juni 2026',
                'time' => '09:00 - 11:30 WIB',
                'location' => 'Balai Dusun II (Posyandu Melati)',
                'pj' => 'Siti Rahma',
                'description' => 'Kegiatan rutin posyandu sekaligus pemaparan materi pencegahan stunting dan demo masak MPASI sehat oleh tim kesehatan kelompok KKN.',
                'status' => 'Berjalan',
                'badge_color' => 'bg-blue-100 text-blue-700'
            ],
            [
                'id' => 2,
                'title' => 'Rapat Evaluasi Mingguan Kelompok',
                'date' => 'Senin, 22 Juni 2026',
                'time' => '19:30 - Selesai',
                'location' => 'Posko Utama KKN',
                'pj' => 'Andi Wijaya',
                'description' => 'Membahas kendala program kerja lintas divisi selama seminggu terakhir dan menyusun rencana taktis untuk minggu depan.',
                'status' => 'Malam Ini',
                'badge_color' => 'bg-purple-100 text-purple-700'
            ]
        ];

        // 2. Jadwal Akan Datang (Upcoming)
        $upcomingSchedules = [
            [
                'id' => 3,
                'title' => 'Pelatihan Digital Marketing UMKM Keripik Tempe',
                'date' => 'Rabu, 24 Juni 2026',
                'time' => '13:00 - 15:30 WIB',
                'location' => 'Balai Desa Kemuning',
                'pj' => 'Rian Hidayat',
                'description' => 'Mengundang pelaku usaha makro desa untuk belajar foto produk, pembuatan akun TikTok Affiliate, dan pendaftaran Google Maps Bisnis.',
                'status' => 'Akan Datang',
                'badge_color' => 'bg-amber-100 text-amber-700'
            ],
            [
                'id' => 4,
                'title' => 'Kunjungan & Monitoring DPL (Dosen Pembimbing)',
                'date' => 'Jumat, 26 Juni 2026',
                'time' => '10:00 - 12:00 WIB',
                'location' => 'Posko Utama KKN',
                'pj' => 'Putri Naila',
                'description' => 'Kunjungan lapangan oleh DPL untuk meninjau logbook harian, progres luaran wajib, dan koordinasi dengan Kepala Desa.',
                'status' => 'Penting',
                'badge_color' => 'bg-rose-100 text-rose-700'
            ],
            [
                'id' => 5,
                'title' => 'Kerja Bakti Akbar & Penanaman Pohon',
                'date' => 'Minggu, 28 Juni 2026',
                'time' => '06:30 - 10:00 WIB',
                'location' => 'Area Bantaran Sungai Dusun III',
                'pj' => 'Bagas Dwi',
                'description' => 'Aksi kolaborasi bersama karang taruna desa untuk membersihkan area selokan dan menanam 50 bibit pohon mahoni.',
                'status' => 'Akan Datang',
                'badge_color' => 'bg-slate-100 text-slate-700'
            ]
        ];

        // 3. Jadwal yang Sudah Selesai (Past)
        $pastSchedules = [
            [
                'id' => 6,
                'title' => 'Pembukaan Resmi KKN & Penerimaan oleh Camat',
                'date' => 'Senin, 15 Juni 2026',
                'time' => '08:00 - 10:30 WIB',
                'location' => 'Pendopo Kecamatan Kemuning',
                'pj' => 'Andi Wijaya',
                'description' => 'Upacara serah terima mahasiswa KKN dari pihak universitas kepada jajaran perangkat kecamatan dan desa setempat.',
                'status' => 'Selesai',
                'badge_color' => 'bg-emerald-100 text-emerald-700'
            ]
        ];

        return view('jadwal', compact('todaySchedules', 'upcomingSchedules', 'pastSchedules'));
    }
}
