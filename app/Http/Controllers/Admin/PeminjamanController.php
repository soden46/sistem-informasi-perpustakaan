<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\AnggotaModel;
use App\Models\Koleksi;
use App\Models\KoleksiModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = PeminjamanModel::with('anggota', 'buku')->paginate(10);

        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $anggota = AnggotaModel::all();
        $buku = KoleksiModel::all();
        return view('admin.peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'jumlah_denda' => 'nullable|numeric',
        ]);

        PeminjamanModel::create($validatedData);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        $anggota = AnggotaModel::all();
        $buku = KoleksiModel::all();
        return view('admin.peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'jumlah_denda' => 'nullable|numeric',
        ]);

        $peminjaman = PeminjamanModel::findOrFail($id);
        $peminjaman->update($validatedData);

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
}
