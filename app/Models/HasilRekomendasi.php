<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilRekomendasi extends Model
{
    use HasFactory;
    protected $table = 'hasil_rekomendasi';
    protected $primaryKey = 'id_hasil_rekomendasi';
    protected $fillable = [
        'id_mahasiswa',
        'id_lowongan',
        'wmsc',
        'qi',
        'ranking',
        'rekomendasi_dosen', 
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function lowongan() {
        return $this->belongsTo(LowonganMagang::class, 'id_lowongan', 'id_lowongan');
    }
}
