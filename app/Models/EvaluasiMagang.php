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
        'id_log_aktifitas',
    ];

    public function bimbinganMagang() {
        return $this->belongsTo(BimbinganMagang::class, 'id_bimbingan_magang','id_bimbingan');
    }
    public function logAktivitas() {
        return $this->belongsTo(LogAktivitasMagang::class, 'id_log_aktifitas','id_log_aktifitas');
    }
}
