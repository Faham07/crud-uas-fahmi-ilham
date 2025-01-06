<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('buku'); // Redirect ke halaman yang diinginkan setelah login
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('buku'); // Redirect ke halaman utama setelah logout
    }
    
    // app/Http/Controllers/Auth/LoginController.php

protected function authenticated(Request $request, $user)
{
    return redirect()->route('buku.index'); // Redirect ke halaman daftar buku setelah login
}

}
