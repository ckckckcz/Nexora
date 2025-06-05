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
        'bobot_minat',
        'bobot_fasilitas',
        'bobot_gaji',
        'bobot_tipe',
        'bobot_fleksibilitas',
        'keahlian',
        'fasilitas',
        'status_gaji',
        'tipe_perusahaan',
        'fleksibilitas_kerja',
    ];

    public function mahasiswa () {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
