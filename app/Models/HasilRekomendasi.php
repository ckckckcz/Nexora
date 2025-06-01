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
        'nilai_akhir', // VIKOR Q value
        'ranking',
        'rekomendasi_dosen', // Boolean flag for lecturer recommendation
    ];
}
