<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferensiMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'preferensi_mahasiswa';
    protected $primaryKey = 'id_preferensi_mahasiswa';
    protected $fillable = [
        'id_mahasiswa',
        'id_kriteria',
        'bobot',
    ];
}
