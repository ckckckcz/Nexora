<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimbinganMagang extends Model
{
    use HasFactory;
    protected $table = 'bimbingan_magang';
    protected $primaryKey = 'id_bimbingan_magang';
    protected $fillable = [
        'id_mahasiswa',
        'id_dosen',
        'id_perusahaan',
        'status_bimbingan',
    ];
}
