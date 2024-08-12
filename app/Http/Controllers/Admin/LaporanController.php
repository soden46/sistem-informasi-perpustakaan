<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function peminjaman(Request $request)
    {
        $bulan = $request->input('bulan', date('m')); // Default ke bulan saat ini
        $tahun = $request->input('tahun', date('Y')); // Default ke tahun saat ini

        // Mengambil data peminjaman berdasarkan bulan dan tahun
        $peminjamans = PeminjamanModel::with('anggota', 'buku')
            ->whereMonth('tgl_pinjam', $bulan)
            ->whereYear('tgl_pinjam', $tahun)
            ->paginate(10);

        return view('admin.laporan.peminjaman', compact('peminjamans', 'bulan', 'tahun'));
    }

    public function peminjaman_pdf()
    {
        $data = [
            'title' => 'Data Pendaftaran Osis',
            'pendaftaran' => DataPendaftaran::with('rekrutmen', 'siswa')
                ->whereHas('rekrutmen', function ($query) {
                    $query->whereHas('ekskul', function ($query) {
                        $query->where('nama_ekskul', 'osis');
                    });
                })
                ->get(),

        ];

        $customPaper = [0, 0, 567.00, 500.80];
        $pdf = Pdf::loadView('admin.laporan.pendaftaran', $data)->setPaper('customPaper', 'potrait');
        return $pdf->stream('data-pendaftaran.pdf');
    }
}
