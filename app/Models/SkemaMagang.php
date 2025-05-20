<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkemaMagang extends Model
{
    use HasFactory;
    protected $table = 'skema_magang';
    protected $primaryKey = 'id_skema_magang';
    protected $fillable = [
        'id_skema_magang',
        'nama_skema_magang',
        'tanggal_mulai',
        'tanggal_selesai'
    ];
}
