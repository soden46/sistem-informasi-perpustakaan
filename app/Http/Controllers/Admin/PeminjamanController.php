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
        $peminjamans = PeminjamanModel::with('anggota', 'buku')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $anggota = AnggotaModel::all();
        $koleksi = KoleksiModel::all();
        return view('admin.peminjaman.create', compact('anggota', 'koleksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        PeminjamanModel::create($request->all());
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function edit($id)
    {
        $peminjaman = PeminjamanModel::findOrFail($id);
        $anggota = AnggotaModel::all();
        $koleksi = KoleksiModel::all();
        return view('admin.peminjaman.edit', compact('peminjaman', 'anggota', 'koleksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        $peminjaman = PeminjamanModel::findOrFail($id);
        $peminjaman->update($request->all());
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        PeminjamanModel::destroy($id);
        return redirect()->route('admin.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
