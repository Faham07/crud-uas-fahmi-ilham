<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('bukunew', function (Blueprint $table) {
        $table->id('id_buku');
        $table->string('judul_buku');
        $table->string('penulis');
        $table->string('penerbit');
        $table->year('tahun_terbit');
        $table->timestamps();
    });
}

};
