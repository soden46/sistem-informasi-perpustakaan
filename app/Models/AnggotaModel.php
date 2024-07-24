<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'id_user',
        'nama_anggota',
        'nomor_induk',
        'tgl_lahir',
        'jk',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanModel::class, 'id_anggota', 'id_anggota');
    }

    public function pengembalian()
    {
        return $this->hasMany(PengembalianModel::class, 'id_anggota', 'id_anggota');
    }

    public function denda()
    {
        return $this->hasMany(DendaModel::class, 'id_anggota', 'id_anggota');
    }
}
