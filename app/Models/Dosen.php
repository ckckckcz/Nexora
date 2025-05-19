<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'id_dosen';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'id_program_studi',
        'tanda_tangan',
        'jurusan',
        'id_user',
    ];

    // Relasi dengan ProgramStudi (banyak dosen dimiliki oleh 1 program studi)
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }

    // Relasi dengan User (1 dosen dimiliki oleh 1 user)
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }
}
