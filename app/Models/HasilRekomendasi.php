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
        'id_hasil_rekomendasi',
        'id_mahasiswa',
        'nilai_akhir',
        'ranking',
    ];
}
