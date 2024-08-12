<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaModel;
use App\Models\KoleksiModel;
use App\Models\PeminjamanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiBukuController extends Controller
{
    public function index()
    {
        $books = KoleksiModel::paginate(10);
        return view('anggota.koleksibuku', compact('books'));
    }

    public function showPinjamForm($id_buku)
    {
        $buku = KoleksiModel::findOrFail($id_buku);
        $allBooks = KoleksiModel::all();
        return view('anggota.pinjam', compact('buku', 'allBooks'));
    }

    public function post_pinjam($id_buku, Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        // Ambil data buku
        $buku = KoleksiModel::findOrFail($id_buku);

        // Ambil ID user yang login
        $id_user = Auth::user()->id;
        // Ambil ID Anggota dari ID User
        $anggota = AnggotaModel::where('id_user', $id_user)->first();

        if (!$anggota) {
            return redirect()->route('anggota.koleksi')->with('error', 'Anggota tidak ditemukan.');
        }

        $id_anggota = $anggota->id_anggota;

        // Simpan data peminjaman
        PeminjamanModel::create([
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'tgl_pinjam' => $validatedData['tgl_pinjam'],
            'tgl_kembali' => $validatedData['tgl_kembali']
        ]);

        // Kurangi stok dan tambahkan peminjaman
        if ($buku->stok > $buku->dipinjam) {
            $buku->dipinjam += 1;
            $buku->save();

            // Berikan umpan balik kepada pengguna
            return redirect()->route('anggota.koleksi')->with('success', 'Buku berhasil dipinjam.');
        } else {
            return redirect()->route('anggota.koleksi')->with('error', 'Stok buku tidak mencukupi.');
        }
    }
}
