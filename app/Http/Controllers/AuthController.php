<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');  // Pastikan view ini ada
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cek apakah username dan password sesuai
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/buku');  // Redirect ke halaman buku setelah login
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
}
