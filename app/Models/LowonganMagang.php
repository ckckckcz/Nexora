<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganMagang extends Model
{
    use HasFactory;
    protected $table = 'lowongan_magang';
    protected $primaryKey = 'id_lowongan_magang';
    protected $fillable = [
        'id_lowongan_magang',
        'nama_perusahaan',
        'id_skema_magang',
        'posisi_magang',
        'deskripsi',
        'lokasi',
        'bidang_keahlian',
        'status'
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
