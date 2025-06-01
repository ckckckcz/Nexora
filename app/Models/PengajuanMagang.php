<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMagang extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_magang';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_pengajuan',
        'id_mahasiswa',
        'id_lowongan',
        'status_pengajuan',
        'Pakta_Integritas',
        'Daftar_Riwayat_Hidup',
        'KHS_cetak_Siakad',
        'KTP',
        'KTM',
        'Surat_Izin_Orang_Tua',
        'Kartu_BPJS_Asuransi_lainnya',
        'SKTM_KIP_Kuliah',
        'Proposal_Magang',
        'CV',
        'Surat_Tugas',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'id_lowongan', 'id_lowongan');
    }
}
