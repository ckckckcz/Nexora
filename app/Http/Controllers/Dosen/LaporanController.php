<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index() {
        $bimbingan = BimbinganMagang::where('id_dosen', auth()->user()->dosen->id_dosen)->get();

        return view('dosen.laporan', compact('bimbingan'));
    }

    public function exportLog($id)
    {
        $subQuery = DB::table('mahasiswa as m')
            ->select(
                'm.id_mahasiswa',
                'm.nama_mahasiswa',
                'm.nim',
                'ps.nama_program_studi',
                'l.nama_perusahaan'
            )
            ->join('bimbingan_magang as bm', 'bm.id_mahasiswa', '=', 'm.id_mahasiswa')
            ->join('lowongan_magang as l', 'l.id_lowongan', '=', 'bm.id_lowongan_magang')
            ->join('skema_magang as sm', 'sm.id_skema_magang', '=', 'l.id_skema_magang')
            ->join('program_studi as ps', 'm.id_program_studi', '=', 'ps.id_program_studi')
            ->where('m.id_mahasiswa', $id)
            ->groupBy('m.id_mahasiswa', 'm.nama_mahasiswa', 'm.nim', 'ps.nama_program_studi', 'l.nama_perusahaan');

        // Query for all activity logs for the student
        $logs = DB::table('log_aktivitas_magang as la')
            ->select(
                'sub.nama_mahasiswa',
                'sub.nim',
                'sub.nama_program_studi',
                'sub.nama_perusahaan',
                'la.id_log_aktifitas',
                'la.tanggal',
                'la.jam_masuk',
                'la.jam_pulang',
                'la.kegiatan'
            )
            ->join('bimbingan_magang as bm', 'bm.id_bimbingan', '=', 'la.id_bimbingan')
            ->joinSub($subQuery, 'sub', function ($join) {
                $join->on('bm.id_mahasiswa', '=', 'sub.id_mahasiswa');
            })
            ->where('bm.id_mahasiswa', $id)
            ->orderBy('la.tanggal')
            ->get();

        // Prepare data for the Blade template
        $laporan = [
            'student' => $logs->isNotEmpty() ? [$logs->first()] : [new \stdClass()],
            'logs' => $logs
        ];


        $pdf = Pdf::loadView('dosen.functions.log_aktivitas.export-log', ['laporan' => $laporan]);   
        $pdf->setPaper('a4', 'potrait');
        // $pdf->setOption("isRemoteEnabled", true); // jika ada gambar
        $pdf->render();

        return $pdf->stream('Data_Laporan_Log_Aktifitas_'.$laporan['student'][0]->nama_mahasiswa.date('Y-m-d_H-i-s').'.pdf');
        // return view('dosen.functions.log_aktivitas.export-log', compact('laporan'));
    }
}
