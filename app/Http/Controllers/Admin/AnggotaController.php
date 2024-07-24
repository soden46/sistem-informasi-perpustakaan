<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\AnggotaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = AnggotaModel::with('user')->get();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'tgl_lahir' => 'required|date',
            'nomor_induk' => 'required|unique:anggota,nomor_induk',
            'jk' => 'required',
            'alamat' => 'required|string',
            'role' => 'required|in:siswa,guru', // Validasi role
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'role' => $request->role, // Tambahkan role pada User
        ]);

        AnggotaModel::create([
            'id_user' => $user->id,
            'nama_anggota' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = AnggotaModel::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = AnggotaModel::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users,email,' . $anggota->user->id,
            'password' => 'nullable|min:8|confirmed',
            'tgl_lahir' => 'required|date',
            'nomor_induk' => 'required|unique:anggota,nomor_induk,' . $anggota->id_anggota,
            'jk' => 'required',
            'alamat' => 'required|string',
            'role' => 'required|in:siswa,guru',
        ]);

        $user = $anggota->user;
        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Update password only if provided
        ]);

        $anggota->update([
            'nama_anggota' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id_anggota)
    {
        $admin = AnggotaModel::where('id_anggota', $id_anggota)->first();
        User::where('id', $admin->id_user)->delete();
        AnggotaModel::where('id_anggota', $id_anggota)->delete();

        return redirect()->route('admin.accounts.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
