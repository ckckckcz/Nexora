<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianLowongan extends Model
{
    use HasFactory;
    protected $table = 'penilaian_lowongan';
    protected $primaryKey = 'id_penilaian';
    protected $fillable = [
        'id_lowongan',
        'id_kriteria',
        'nilai',
    ];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }

    public function lowongan() {
        return $this->belongsTo(LowonganMagang::class, 'id_lowongan', 'id_lowongan_magang');
    }
}
