<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Tambahkan baris ini untuk menentukan nama tabel
    protected $table = 'dosen';

    protected $primaryKey = 'id_dosen';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'id_program_studi',
        'jurusan',
    ];

    // Relasi dengan ProgramStudi (banyak dosen dimiliki oleh 1 program studi)
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }
}
