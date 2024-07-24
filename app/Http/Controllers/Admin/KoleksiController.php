<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\KategoriModel;
use App\Models\KoleksiModel;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = KoleksiModel::with('kategori')->get();
        return view('admin.koleksi.index', compact('koleksis'));
    }

    public function create()
    {
        $kategoris = KategoriModel::all();
        return view('admin.koleksi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string|max:20',
            'rekomendasi' => 'required',
        ]);

        KoleksiModel::create($request->all());

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $koleksi = KoleksiModel::findOrFail($id);
        $kategoris = KategoriModel::all();
        return view('admin.koleksi.edit', compact('koleksi', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string|max:20',
            'rekomendasi' => 'required',
        ]);

        $koleksi = KoleksiModel::findOrFail($id);
        $koleksi->update($request->all());

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KoleksiModel::destroy($id);
        return redirect()->route('admin.koleksi.index')->with('success', 'Buku berhasil dihapus');
    }
}
