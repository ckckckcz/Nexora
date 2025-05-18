<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'id_program_studi';

    protected $fillable = [
        'kode_program_studi',
        'nama_program_studi',
    ];

    // Relasi dengan Mahasiswa (1 program studi memiliki banyak mahasiswa)
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_program_studi', 'id_program_studi');
    }

    // Relasi dengan Dosen (1 program studi memiliki banyak dosen)
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_program_studi', 'id_program_studi');
    }
}
