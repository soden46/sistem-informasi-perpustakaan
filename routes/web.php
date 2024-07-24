<?php

use App\Http\Controllers\Admin\AdminAccountsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DendaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KoleksiController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Anggota\UserAnggotaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pilihan login
Route::get('/', function () {
    return view('auth.choose_login');
})->name('login');
Route::get('/login', function () {
    return view('auth.choose_login');
})->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Login Admin
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('login.admin');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.post');

// Login Guru
Route::get('/login/guru', [LoginController::class, 'showGuruLoginForm'])->name('login.guru');
Route::post('/login/guru', [LoginController::class, 'guruLogin'])->name('login.guru.post');

// Login Siswa
Route::get('/login/siswa', [LoginController::class, 'showSiswaLoginForm'])->name('login.siswa');
Route::post('/login/siswa', [LoginController::class, 'siswaLogin'])->name('login.siswa.post');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin', AdminController::class); // CRUD admin

    Route::prefix('accounts')->group(function () {
        Route::get('/', [AdminAccountsController::class, 'index'])->name('admin.accounts.index');
        Route::get('/create', [AdminAccountsController::class, 'create'])->name('admin.accounts.create');
        Route::post('/', [AdminAccountsController::class, 'store'])->name('admin.accounts.store');
        Route::get('/{id}/edit', [AdminAccountsController::class, 'edit'])->name('admin.accounts.edit');
        Route::put('/{id}', [AdminAccountsController::class, 'update'])->name('admin.accounts.update');
        Route::delete('/{id}', [AdminAccountsController::class, 'destroy'])->name('admin.accounts.destroy');
    });

    Route::prefix('koleksi')->group(function () {
        Route::get('/', [KoleksiController::class, 'index'])->name('admin.koleksi.index');
        Route::get('/create', [KoleksiController::class, 'create'])->name('admin.koleksi.create');
        Route::post('/', [KoleksiController::class, 'store'])->name('admin.koleksi.store');
        Route::get('/{id_admin}/edit', [KoleksiController::class, 'edit'])->name('admin.koleksi.edit');
        Route::put('/{id_admin}', [KoleksiController::class, 'update'])->name('admin.koleksi.update');
        Route::delete('/{id_admin}', [KoleksiController::class, 'destroy'])->name('admin.koleksi.destroy');
    });

    Route::prefix('kategori')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('admin.kategori.index');
        Route::get('/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });

    Route::prefix('anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('admin.anggota.index');
        Route::get('/create', [AnggotaController::class, 'create'])->name('admin.anggota.create');
        Route::post('/', [AnggotaController::class, 'store'])->name('admin.anggota.store');
        Route::get('/{id}/edit', [AnggotaController::class, 'edit'])->name('admin.anggota.edit');
        Route::put('/{id}', [AnggotaController::class, 'update'])->name('admin.anggota.update');
        Route::delete('/{id}', [AnggotaController::class, 'destroy'])->name('admin.anggota.destroy');
    });

    Route::prefix('peminjaman')->group(function () {
        Route::get('/', [PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
        Route::get('/create', [PeminjamanController::class, 'create'])->name('admin.peminjaman.create');
        Route::post('/', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
        Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
        Route::put('/{id}', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
        Route::delete('/{id}', [PeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');
    });

    Route::prefix('pengembalian')->group(function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('admin.pengembalian.index');
        Route::get('/create', [PengembalianController::class, 'create'])->name('admin.pengembalian.create');
        Route::post('/', [PengembalianController::class, 'store'])->name('admin.pengembalian.store');
        Route::get('/{id}/edit', [PengembalianController::class, 'edit'])->name('admin.pengembalian.edit');
        Route::put('/{id}', [PengembalianController::class, 'update'])->name('admin.pengembalian.update');
        Route::delete('/{id}', [PengembalianController::class, 'destroy'])->name('admin.pengembalian.destroy');
    });

    Route::prefix('denda')->group(function () {
        Route::get('/', [DendaController::class, 'index'])->name('admin.denda.index');
        Route::get('/create', [DendaController::class, 'create'])->name('admin.denda.create');
        Route::post('/', [DendaController::class, 'store'])->name('admin.denda.store');
        Route::get('/{id}/edit', [DendaController::class, 'edit'])->name('admin.denda.edit');
        Route::put('/{id}', [DendaController::class, 'update'])->name('admin.denda.update');
        Route::delete('/{id}', [DendaController::class, 'destroy'])->name('admin.denda.destroy');
    });
});

// Guru dan Siswa Routes
Route::middleware(['auth', 'role:guru,siswa'])->prefix('anggota')->group(function () {
    Route::get('/pinjam', [UserAnggotaController::class, 'pinjamBuku'])->name('anggota.pinjam');
    Route::post('/pinjam', [UserAnggotaController::class, 'storePeminjaman'])->name('anggota.storePeminjaman');
});
