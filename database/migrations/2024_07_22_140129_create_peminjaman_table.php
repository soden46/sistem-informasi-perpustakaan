<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigInteger('id_peminjaman')->unsigned()->primary(); // Menetapkan id_anggota sebagai primary key
            $table->bigInteger('id_anggota')->unsigned(); // Field untuk foreign key
            $table->bigInteger('id_buku')->unsigned(); // Field untuk foreign key
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->timestamps();

            // Menambahkan foreign key constraint jika id_kategori merujuk ke tabel anggota
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('cascade');
            // Menambahkan foreign key constraint jika id_buku merujuk ke tabel koleksi
            $table->foreign('id_buku')->references('id_buku')->on('koleksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
