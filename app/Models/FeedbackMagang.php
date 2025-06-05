<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackMagang extends Model
{
    use HasFactory;
    protected $table = 'feedback_magang';
    protected $primaryKey = 'id_feedback';
    protected $fillable = [
        'id_bimbingan_magang',
        'testimoni_magang',
        'pesan_dosen'
    ];

    public function bimbinganMagang() {
        return $this->belongsTo(BimbinganMagang::class, 'id_bimbingan_magang','id_bimbingan');
    }
}
