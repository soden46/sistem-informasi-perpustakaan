<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\AnggotaModel;
use App\Models\Peminjaman;
use App\Models\Koleksi;
use App\Models\KoleksiModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data buku yang direkomendasikan
        $books = KoleksiModel::where('rekomendasi', 'Ya')->get();

        // Kirim data ke view dengan menggunakan nama variabel 'books'
        return view('anggota.dashboard', compact('books'));
    }

    public function storePeminjaman(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        $anggota = AnggotaModel::where('user_id', auth()->id())->first();
        PeminjamanModel::create([
            'id_anggota' => $anggota->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dipinjam');
    }
}
