<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BimbinganMagang extends Model
{
    use HasFactory;
    protected $table = 'bimbingan_magang';
    protected $primaryKey = 'id_bimbingan';
    protected $fillable = [
        'id_mahasiswa',
        'id_dosen',
        'id_lowongan_magang',
        'status_bimbingan',
    ];

    // Relasi dengan Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
    // Relasi dengan Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
    }
    // Relasi dengan Perusahaan
    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'id_lowongan_magang', 'id_lowongan');
    }

    // Get chat room name
    public function getChatRoomAttribute()
    {
        return 'chat_' . $this->id_bimbingan;
    }

    // Get chat messages for this bimbingan
    public function chatMessages()
    {
        return \Illuminate\Support\Facades\DB::table('chat_messages')
            ->where('room', $this->chat_room)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
