<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\AnggotaModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $id_user = Auth::id();
        $id_anggota = AnggotaModel::where('id_user', $id_user)->first()->id_anggota;

        $peminjaman = PeminjamanModel::where('id_anggota', $id_anggota)->paginate(10);

        // Tampilkan view dengan data peminjaman
        return view('anggota.datapeminjaman', compact('peminjaman'));
    }
}
