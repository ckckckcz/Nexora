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
}
