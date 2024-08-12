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
        Schema::table('koleksi', function (Blueprint $table) {
            $table->bigInteger('stok')->after('rekomendasi')->default(0);
            $table->bigInteger('dipinjam')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koleksi', function (Blueprint $table) {
            $table->dropColumn(['stok', 'dipinjam']);
        });
    }
};
