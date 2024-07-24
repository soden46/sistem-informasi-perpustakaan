<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\AnggotaModel;
use App\Models\Koleksi;
use App\Models\KoleksiModel;
use App\Models\Peminjaman;
use App\Models\PeminjamanModel;

class UserAnggotaController extends Controller
{
    // Menampilkan formulir peminjaman buku
    public function pinjamBuku()
    {
        $koleksi = KoleksiModel::all(); // Mengambil semua data buku
        return view('anggota.pinjam', compact('koleksi'));
    }

    // Menyimpan peminjaman buku
    public function storePeminjaman(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        // Ambil data anggota yang sedang login
        $anggota = AnggotaModel::where('id_user', Auth::id())->firstOrFail();

        // Simpan data peminjaman
        PeminjamanModel::create([
            'id_anggota' => $anggota->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return redirect()->route('anggota.pinjam')->with('success', 'Buku berhasil dipinjam.');
    }
}
