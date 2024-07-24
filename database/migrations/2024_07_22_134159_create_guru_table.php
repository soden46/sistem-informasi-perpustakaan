<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->bigInteger('id_guru')->unsigned()->primary(); // Menetapkan id_anggota sebagai primary key
            $table->bigInteger('id_user')->unsigned(); // Field untuk foreign key
            $table->string('nama_anggota', 50);
            $table->char('nomor_induk', 10)->unique(); // Menambahkan unique constraint pada nomor_induk jika diperlukan
            $table->date('tgl_lahir');
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->text('alamat');
            $table->timestamps();

            // Menambahkan foreign key constraint jika id_user merujuk ke tabel users
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
