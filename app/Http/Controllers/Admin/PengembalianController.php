<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\AnggotaModel;
use App\Models\Koleksi;
use App\Models\KoleksiModel;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = PengembalianModel::with('anggota', 'buku', 'peminjaman')->get();
        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    public function create()
    {
        $peminjamanOptions = PeminjamanModel::all();
        $anggotaOptions = AnggotaModel::all();
        $bukuOptions = KoleksiModel::all();
        return view('admin.pengembalian.create', compact('peminjamanOptions', 'anggotaOptions', 'bukuOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_kembali' => 'required|date',
            'denda' => 'nullable|numeric|min:0'
        ]);

        PengembalianModel::create($request->all());
        return redirect()->route('admin.pengembalian.index')->with('success', 'Pengembalian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengembalian = PengembalianModel::with('peminjaman')->findOrFail($id);
        $peminjamanOptions = PeminjamanModel::all();
        $anggotaOptions = AnggotaModel::all();
        $bukuOptions = KoleksiModel::all();
        return view('admin.pengembalian.edit', compact('pengembalian', 'peminjamanOptions', 'anggotaOptions', 'bukuOptions'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_buku' => 'required|exists:koleksi,id_buku',
            'tgl_kembali' => 'required|date',
            'jumlah_denda' => 'nullable|numeric|min:0'
        ]);

        $pengembalian = PengembalianModel::findOrFail($id);
        $pengembalian->update($validatedData);
        return redirect()->route('admin.pengembalian.index')->with('success', 'Pengembalian berhasil diperbarui');
    }

    public function destroy($id)
    {
        PengembalianModel::destroy($id);
        return redirect()->route('admin.pengembalian.index')->with('success', 'Pengembalian berhasil dihapus');
    }
}
