<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus data user lama agar tidak duplikat saat dicheck
        User::truncate();

        // Membuat data user baru untuk login KKN
        User::create([
            'name' => 'Andi Wijaya',
            'email' => 'kkn@desa.com',
            'password' => Hash::make('password'), // Password otomatis di-enkripsi
        ]);
    }
}
