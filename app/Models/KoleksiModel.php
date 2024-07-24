<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiModel extends Model
{
    use HasFactory;

    protected $table = 'koleksi';

    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'id_kategori',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'rekomendasi'
    ];

    protected $casts = [
        'tahun_terbit' => 'date',  // Cast the `tahun_terbit` field to a date
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanModel::class, 'id_buku', 'id_buku');
    }

    public function pengembalian()
    {
        return $this->hasMany(PengembalianModel::class, 'id_buku', 'id_buku');
    }
}
