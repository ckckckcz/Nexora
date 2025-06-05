<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorKecocokan extends Model
{
    use HasFactory;

    protected $table = 'skor_kecocokan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_mahasiswa',
        'id_lowongan',
        'skor_minat',
        'skor_fasilitas',
        'skor_gaji',
        'skor_tipe',
        'skor_fleksibilitas',
        'skor_total',
    ];

    // Relasi dengan Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    // Relasi dengan LowonganMagang
    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'id_lowongan', 'id_lowongan');
    }
}
