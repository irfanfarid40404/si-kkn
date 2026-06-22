<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Memproses validasi dan pencocokan data ke database
     */
    public function login(Request $request)
    {
        // 1. Validasi input form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format penulisan email salah.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        // 2. Cek kecocokan data ke database & eksekusi login otomatis jika benar
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            
            // Regenerasi session untuk keamanan dari hacking fixation
            $request->session()->regenerate();
            
            // Redirect ke halaman yang dituju sebelumnya, atau langsung ke dashboard
            return redirect()->intended(route('kkn.dashboard'));
        }

        // 3. Jika gagal cocok, kembalikan dengan pesan error khusus
        return back()->withErrors([
            'loginError' => 'Email atau kata sandi yang Anda masukkan tidak sesuai dengan data kami.',
        ])->onlyInput('email');
    }

    /**
     * Menghapus session login (Logout)
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Bersihkan dan hancurkan data session lama
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
