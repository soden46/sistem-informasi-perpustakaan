<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->bigInteger('id_denda')->unsigned()->primary(); // Menetapkan id_anggota sebagai primary key
            $table->bigInteger('id_anggota')->unsigned(); // Field untuk foreign key
            $table->bigInteger('id_peminjaman')->unsigned();
            $table->bigInteger('id_kembali')->unsigned(); // Menambahkan unique constraint pada nomor_induk jika diperlukan
            $table->char('jumlah_denda', 20);
            $table->timestamps();

            // Menambahkan foreign key constraint jika id_anggota merujuk ke tabel anggota
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('cascade');
            // Menambahkan foreign key constraint jika id_peminjaman merujuk ke tabel peminjaman
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            // Menambahkan foreign key constraint jika id_kembali merujuk ke tabel pengembalian
            $table->foreign('id_kembali')->references('id_kembali')->on('pengembalian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denda');
    }
}
