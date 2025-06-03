<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferensiMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'preferensi_mahasiswa';
    protected $primaryKey = 'id_preferensi_mahasiswa';
    protected $fillable = [
        'id_mahasiswa',
        'id_kriteria',
        'bobot',
    ];

    public function mahasiswa () {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
    public function kriteria () {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
