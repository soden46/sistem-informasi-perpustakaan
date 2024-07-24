<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Denda;
use App\Models\DendaModel;
use App\Models\Pengembalian;
use App\Models\PengembalianModel;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $dendas = DendaModel::with('pengembalian')->get();
        return view('admin.denda.index', compact('dendas'));
    }

    public function create()
    {
        $pengembalian = PengembalianModel::all();
        return view('admin.denda.create', compact('pengembalian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengembalian' => 'required|exists:pengembalian,id_pengembalian',
            'jumlah_denda' => 'required|numeric|min:0'
        ]);

        DendaModel::create($request->all());
        return redirect()->route('admin.denda.index')->with('success', 'Denda berhasil ditambahkan');
    }

    public function edit($id)
    {
        $denda = DendaModel::findOrFail($id);
        $pengembalian = PengembalianModel::all();
        return view('admin.denda.edit', compact('denda', 'pengembalian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengembalian' => 'required|exists:pengembalian,id_pengembalian',
            'jumlah_denda' => 'required|numeric|min:0'
        ]);

        $denda = DendaModel::findOrFail($id);
        $denda->update($request->all());
        return redirect()->route('admin.denda.index')->with('success', 'Denda berhasil diperbarui');
    }

    public function destroy($id)
    {
        DendaModel::destroy($id);
        return redirect()->route('admin.denda.index')->with('success', 'Denda berhasil dihapus');
    }
}
