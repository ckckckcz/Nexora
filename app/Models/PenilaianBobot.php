<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianBobot extends Model
{
    use HasFactory;
    protected $table = 'penilaian_bobot';
    protected $primaryKey = 'id_penilaian_bobot';
    protected $fillable = [
        'id_perusahaan',
        'id_kriteria',
        'nilai',
    ];
}
