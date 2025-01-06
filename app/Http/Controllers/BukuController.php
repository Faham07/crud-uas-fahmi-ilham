<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        // Mengambil semua buku dari tabel buku
        $buku = Buku::all(); 

        // Menampilkan ke view 'buku.index' dengan data buku
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form untuk membuat buku baru
    public function create()
    {
        // Menampilkan form input buku
        return view('buku.create');
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_buku' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_terbit' => 'required|digits:4',
        ]);

        // Menyimpan buku baru ke dalam database
        Buku::create([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        // Redirect ke halaman daftar buku
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Menampilkan form edit buku
    public function edit($id_buku)
    {
        // Mencari buku berdasarkan id_buku
        $buku = Buku::findOrFail($id_buku);

        // Menampilkan form edit
        return view('buku.edit', compact('buku'));
    }

    // Menyimpan perubahan data buku
    public function update(Request $request, $id_buku)
    {
        // Validasi input
        $request->validate([
            'judul_buku' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun_terbit' => 'required|digits:4',
        ]);

        // Mencari buku berdasarkan id_buku
        $buku = Buku::findOrFail($id_buku);

        // Update buku
        $buku->update([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        // Redirect ke halaman daftar buku
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    // Fungsi untuk menghapus buku
    public function destroy($id_buku)
    {
        // Mencari buku berdasarkan id_buku
        $buku = Buku::findOrFail($id_buku);

        // Menghapus buku
        $buku->delete();

        // Redirect ke halaman daftar buku
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
