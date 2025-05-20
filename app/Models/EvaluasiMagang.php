<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiMagang extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_magang';
    protected $primaryKey = 'id_evaluasi';
    protected $fillable = [
        'id_bimbingan_magang',
        'komentar',
        'id_log_aktivitas',
    ];
}
