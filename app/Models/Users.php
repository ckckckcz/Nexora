<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'email',
        'email_verified_at',
        'password',
        'role',
        'profile_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id_user', 'id_user');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id_user', 'id_user');
    }

}
