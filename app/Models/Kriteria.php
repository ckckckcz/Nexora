<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'id_kriteria';
    protected $primaryKey = 'id_bimbingan_magang';
    protected $fillable = [
        'nama_kriteria',
        'bobot',
        'tipe',
        'keterangan',
    ];
}
