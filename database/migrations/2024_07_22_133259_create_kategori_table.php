<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->bigInteger('id_kategori')->unsigned()->primary(); // Menambahkan primary key auto-increment
            $table->string('nama_kategori', 100)->unique(); // Nama kategori yang unik
            $table->text('deskripsi')->nullable(); // Deskripsi kategori, boleh kosong
            $table->timestamps(); // Menambahkan created_at dan updated_at

            // Jika diperlukan, bisa ditambahkan index untuk optimasi pencarian
            $table->index('nama_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
}
