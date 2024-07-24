<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksi', function (Blueprint $table) {
            $table->bigInteger('id_buku')->unsigned()->primary(); // Menetapkan id_buku sebagai primary key
            $table->bigInteger('id_kategori')->unsigned(); // Field untuk foreign key
            $table->string('judul_buku', 50);
            $table->string('pengarang', 50);
            $table->string('penerbit', 50);
            $table->date('tahun_terbit');
            $table->char('isbn', 20);
            $table->timestamps();

            // Menambahkan foreign key constraint yang benar
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koleksi');
    }
}
