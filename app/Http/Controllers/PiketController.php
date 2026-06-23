<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PiketController extends Controller
{
    public function index()
    {
        // Mengambil nama hari ini dalam bahasa Indonesia untuk fitur auto-highlight
        Carbon::setLocale('id');
        $today = Carbon::now()->isoFormat('dddd'); // Contoh output: "Selasa"

        // Data master jadwal piket posko KKN
        $piketSchedules = [
            'Senin' => [
                'group_name' => 'Kelompok A',
                'tasks' => ['Belanja Pasar', 'Masak Pagi & Siang', 'Sapu Posko Utama'],
                'members' => [
                    ['name' => 'Andi Wijaya', 'role' => 'Ketua Kelompok', 'avatar' => 'AW'],
                    ['name' => 'Siti Rahma', 'role' => 'Anggota', 'avatar' => 'SR'],
                    ['name' => 'Rian Hidayat', 'role' => 'Anggota', 'avatar' => 'RH'],
                ]
            ],
            'Selasa' => [
                'group_name' => 'Kelompok B',
                'tasks' => ['Masak Siang & Malam', 'Buang Sampah', 'Jaga Posko (Standby)'],
                'members' => [
                    ['name' => 'Putri Naila', 'role' => 'Sekretaris', 'avatar' => 'PN'],
                    ['name' => 'Bagas Dwi', 'role' => 'Anggota', 'avatar' => 'BD'],
                    ['name' => 'Fitriani', 'role' => 'Anggota', 'avatar' => 'FT'],
                ]
            ],
            'Rabu' => [
                'group_name' => 'Kelompok C',
                'tasks' => ['Belanja Bahan', 'Masak Pagi & Malam', 'Pel Lantai Posko'],
                'members' => [
                    ['name' => 'Dimas Saputra', 'role' => 'Bendahara', 'avatar' => 'DS'],
                    ['name' => 'Aulia Citra', 'role' => 'Anggota', 'avatar' => 'AC'],
                    ['name' => 'Rizky Pratama', 'role' => 'Anggota', 'avatar' => 'RP'],
                ]
            ],
            'Kamis' => [
                'group_name' => 'Kelompok D',
                'tasks' => ['Cuci Piring Bersama', 'Masak Siang', 'Bersih Kamar Mandi'],
                'members' => [
                    ['name' => 'Eko Prasetyo', 'role' => 'Anggota', 'avatar' => 'EP'],
                    ['name' => 'Lestari Putri', 'role' => 'Anggota', 'avatar' => 'LP'],
                    ['name' => 'Mega Utami', 'role' => 'Anggota', 'avatar' => 'MU'],
                ]
            ],
            'Jumat' => [
                'group_name' => 'Kelompok E',
                'tasks' => ['Pembersihan Total', 'Masak Malam', 'Sedia Air Konsumsi'],
                'members' => [
                    ['name' => 'Taufik Hidayat', 'role' => 'Anggota', 'avatar' => 'TH'],
                    ['name' => 'Dewi Lestari', 'role' => 'Anggota', 'avatar' => 'DL'],
                    ['name' => 'Fajar Shodiq', 'role' => 'Anggota', 'avatar' => 'FS'],
                ]
            ],
            'Sabtu' => [
                'group_name' => 'Kelompok F (Ganjil)',
                'tasks' => ['Masak Bebas', 'Jaga Meja Piket', 'Sapu Halaman Depan'],
                'members' => [
                    ['name' => 'Hendra Wijaya', 'role' => 'Anggota', 'avatar' => 'HW'],
                    ['name' => 'Nanda Sari', 'role' => 'Anggota', 'avatar' => 'NS'],
                ]
            ],
            'Minggu' => [
                'group_name' => 'Semua Anggota',
                'tasks' => ['Kerja Bakti Lingkungan Posko', 'Opsional / Masak Mandiri'],
                'members' => [
                    ['name' => 'Seluruh Tim KKN', 'role' => 'Kolaborasi', 'avatar' => 'ALL'],
                ]
            ],
        ];

        return view('piket', compact('piketSchedules', 'today'));
    }
}
