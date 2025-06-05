<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiMagang extends Model
{
    use HasFactory;
    protected $table = 'posisi_magang';
    protected $primaryKey = 'id_posisi_magang';
    protected $fillable = [
        'nama_posisi'
    ];
}
