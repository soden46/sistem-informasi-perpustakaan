<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_peminjaman',
        'id_anggota',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
    ];

    // Kolom tanggal
    protected $dates = ['tgl_pinjam', 'tgl_kembali'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(KoleksiModel::class, 'id_buku', 'id_buku');
    }

    public function pengembalian()
    {
        return $this->hasOne(PengembalianModel::class, 'id_peminjaman', 'id_peminjaman');
    }
}
