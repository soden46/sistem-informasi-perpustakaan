<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);
        User::create([
            'nama' => 'Guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('password123'),
            'role' => 'guru'
        ]);
        User::create([
            'nama' => 'Siswa',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password123'),
            'role' => 'anggota'
        ]);
    }
}
