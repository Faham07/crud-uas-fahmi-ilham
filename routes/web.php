<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Route untuk menampilkan daftar buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

// Route untuk menampilkan form tambah buku
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

// Route untuk menyimpan buku baru
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

// Route untuk menampilkan form edit buku
Route::get('/buku/{id_buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');

// Route untuk mengupdate buku
Route::put('/buku/{id_buku}', [BukuController::class, 'update'])->name('buku.update');

// Route untuk menghapus buku
Route::delete('/buku/{id_buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Route untuk Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Route untuk Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Halaman login jika user belum login
Route::get('/login', function() {
    return view('auth.login');
})->name('login');