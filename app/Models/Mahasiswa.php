<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tambahkan baris ini untuk menentukan nama tabel
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'id_program_studi',
        'jurusan',
        'jenis_kelamin',
    ];

    // Relasi dengan ProgramStudi (banyak mahasiswa dimiliki oleh 1 program studi)
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }
}
