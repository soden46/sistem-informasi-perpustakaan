<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('alamat_peminjam');
            $table->string('email_peminjam');
            $table->string('notelp_peminjam');
            $table->string('kode_buku');
            $table->foreign('kode_buku')->references('kode_buku')->on('data_bukus')->onDelete('cascade'); 
            $table->date('tgl_pengembalian');
            $table->string('petugas');
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
