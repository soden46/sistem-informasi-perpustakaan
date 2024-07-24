<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DendaModel extends Model
{
    use HasFactory;

    protected $table = 'denda';

    protected $primaryKey = 'id_denda';

    protected $fillable = [
        'id_anggota',
        'id_peminjaman',
        'id_kembali',
        'jumlah_denda'
    ];

    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'id_anggota', 'id_anggota');
    }

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman', 'id_peminjaman');
    }

    public function pengembalian()
    {
        return $this->belongsTo(PengembalianModel::class, 'id_kembali', 'id_kembali');
    }
}
