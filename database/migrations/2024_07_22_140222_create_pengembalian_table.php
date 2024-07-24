<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->bigInteger('id_kembali')->unsigned()->primary(); // Menetapkan id_kembali sebagai primary key
            $table->bigInteger('id_peminjaman')->unsigned(); // Field untuk foreign key
            $table->bigInteger('id_anggota')->unsigned();
            $table->bigInteger('id_buku')->unsigned();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->integer('jumlah_denda'); // Menghilangkan panjang pada integer
            $table->timestamps();

            // Menambahkan foreign key constraint jika id_peminjaman merujuk ke tabel peminjaman
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            // Menambahkan foreign key constraint jika id_anggota merujuk ke tabel anggota
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
        Schema::dropIfExists('pengembalian');
    }
}
