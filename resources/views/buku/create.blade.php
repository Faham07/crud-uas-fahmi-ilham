@extends('layouts.app')

@section('content')
<h1>Tambah Buku</h1>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="judul_buku" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" name="judul_buku" required>
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" class="form-control" name="penulis" required>
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" required>
    </div>
    <div class="mb-3">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input type="number" class="form-control" name="tahun_terbit" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
