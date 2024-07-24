<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $primaryKey = 'id_kembali';

    protected $fillable = [
        'id_peminjaman',
        'id_anggota',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'jumlah_denda'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(KoleksiModel::class, 'id_buku', 'id_buku');
    }
}
