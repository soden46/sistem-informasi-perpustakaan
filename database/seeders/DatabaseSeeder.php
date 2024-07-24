<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus data dari tabel users dengan DELETE
        DB::table('users')->delete();

        // Panggil seeder lain untuk mengisi data
        $this->call(UsersTableSeeder::class);
    }
}
