<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'id_program_studi',
        'jurusan',
        'jenis_kelamin',
        'id_user',
    ];

    // Relasi dengan ProgramStudi (banyak mahasiswa dimiliki oleh 1 program studi)
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }

    // Relasi dengan User (1 mahasiswa dimiliki oleh 1 user)
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }
}
