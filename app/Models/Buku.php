<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'buku'; // Pastikan ini sesuai dengan nama tabel di database

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'id_buku';

    // Tentukan apakah primary key auto increment
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'judul_buku', 'penulis', 'penerbit', 'tahun_terbit'
    ];
}
