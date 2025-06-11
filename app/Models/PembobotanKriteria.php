<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembobotanKriteria extends Model
{
    use HasFactory;
    protected $table = 'pembobotan_kriteria';
    protected $primaryKey = 'id_pembobotan_kriteria';
    protected $fillable = [
        'id_mahasiswa',
        'id_kriteria',
        'nilai',
    ];

    public function kriteria() {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}