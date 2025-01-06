<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fahmi ilham</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    
                </ul>
            </div>

            <!-- Tombol Login/Logout di pojok kanan -->
            <div class="d-flex">
                <!-- Cek apakah pengguna sudah login -->
                @if (Auth::check())
                    <!-- Tampilkan link logout jika sudah login -->
                    <a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Tampilkan link login jika belum login -->
                    <a class="btn btn-primary btn-sm" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Konten Halaman Daftar Buku -->
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Buku Perpustakaan</h1>
        
         <!-- Link untuk menambah buku -->
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>

         <!-- Link untuk menambah buku hanya terlihat jika user login -->
        @auth
        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-4">Tambah Buku</a>
        @else
        <p>Anda harus login untuk menambah buku.</p>
        @endauth
        
        <!-- Tabel Daftar Buku -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $b)
                    <tr>
                        <td>{{ $b->id_buku }}</td>
                        <td>{{ $b->judul_buku }}</td>
                        <td>{{ $b->penulis }}</td>
                        <td>{{ $b->penerbit }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('buku.edit', $b->id_buku) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form untuk Hapus Buku -->
                            <form action="{{ route('buku.destroy', $b->id_buku) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
