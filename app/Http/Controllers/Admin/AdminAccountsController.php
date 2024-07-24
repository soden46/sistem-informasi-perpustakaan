<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAccountsController extends Controller
{
    public function index()
    {
        $admin = AdminModel::with('user')->paginate(10);

        return view('admin.accounts.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'tgl_lahir' => 'required|date',
            'nomor_induk' => 'required|unique:admin,nomor_induk',
            'jk' => 'required',
            'alamat' => 'required|string',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password), // Use password for hashing
        ]);

        AdminModel::create([
            'id_user' => $user->id,
            'nama_anggota' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.accounts.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id_admin)
    {
        $admin = AdminModel::with('user')->where('id_admin', $id_admin)->first();
        return view('admin.accounts.edit', compact('admin'));
    }

    public function destroy($id_admin)
    {
        $admin = AdminModel::where('id_admin', $id_admin)->first();
        User::where('id', $admin->id_user)->delete();
        AdminModel::where('id_admin', $id_admin)->delete();

        return redirect()->route('admin.accounts.index')->with('success', 'Admin berhasil dihapus.');
    }
}
