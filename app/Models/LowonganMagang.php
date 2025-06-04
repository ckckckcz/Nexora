<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganMagang extends Model
{
    use HasFactory;

    protected $table = 'lowongan_magang';

    protected $fillable = [
        'nama_perusahaan',
        'bidang_keahlian',
        'tipe_perusahaan',
        'fasilitas',
        'gaji',
        'fleksibilitas_kerja',
    ];

    // Relasi dengan SkemaMagang 1 lowongan memiliki 1 skema magang
    public function skemaMagang()
    {
        return $this->belongsTo(SkemaMagang::class, 'id_skema_magang', 'id_skema_magang');
    }

    // Relasi dengan PosisiMagang 1 lowongan memiliki banyak posisi magang
    public function posisiMagang()
    {
        return $this->belongsTo(PosisiMagang::class, 'id_posisi_magang', 'id_posisi_magang');
    }
}
