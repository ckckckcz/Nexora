<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitasMagang extends Model
{
    use HasFactory;
    protected $table = 'log_aktivitas_magang';
    protected $primaryKey = 'id_log_aktivitas';
    protected $fillable = [
        'id_bimbingan',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'kegiatan',
        'status_log'
    ];

    public function bimbinganMagang() {
        return $this->belongsTo(BimbinganMagang::class, 'id_bimbingan','id_bimbingan');
    }
}
