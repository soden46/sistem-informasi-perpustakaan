<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggotaModel;
use App\Models\KoleksiModel;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahAnggota = AnggotaModel::count();
        $jumlahKoleksi = KoleksiModel::count();
        $rekomendasi = KoleksiModel::with('kategori')->where('rekomendasi', 'Ya')->paginate(10);
        $jumlahPeminjaman = PeminjamanModel::count();
        $jumlahPengembalian = PengembalianModel::count();

        return view('admin.dashboard', compact('jumlahAnggota', 'jumlahKoleksi', 'jumlahPeminjaman', 'jumlahPengembalian', 'rekomendasi'));
    }
}
