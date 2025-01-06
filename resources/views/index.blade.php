@extends('layouts.app')

@section('content')
<h1>Daftar Buku Perpustakaan</h1>
<a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
<a href="{{ route('buku.exportPDF') }}" class="btn btn-success mb-3">Export PDF</a>

<table class="table table-bordered table-striped" id="buku-table">
    <thead>
        <tr>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $item)
        <tr>
            <td>{{ $item->id_buku }}</td>
            <td>{{ $item->judul_buku }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->penerbit }}</td>
            <td>{{ $item->tahun_terbit }}</td>
            <td>
                <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
