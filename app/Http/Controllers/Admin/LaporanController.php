<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class LaporanController extends Controller
{
    public function index () {
        $laporan = BimbinganMagang::with([
            'mahasiswa.programStudi',
            'dosen',
            'lowongan',
            'lowongan.skemaMagang'
        ])
        ->get()
        ->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama_mahasiswa,
                'nama_program_studi' => $item->mahasiswa->programStudi->nama_program_studi ?? null,
                'jenis_kelamin' => $item->mahasiswa->jenis_kelamin,
                'nama_dosen' => $item->dosen->nama_dosen,
                'nama_perusahaan' => $item->lowongan->nama_perusahaan ?? null,
                'posisi_magang' => $item->lowongan->posisiMagang->nama_posisi,
                'tipe_perusahaan' => $item->lowongan->tipe_perusahaan ?? null,
                'nama_skema' => $item->lowongan->skemaMagang->nama_skema_magang ?? null,
                'tanggal_mulai' => $item->lowongan->skemaMagang->tanggal_mulai,
                'tanggal_selesai' => $item->lowongan->skemaMagang->tanggal_selesai,
            ];
        });

        $laporan = json_decode(json_encode($laporan), true);
        return view('admin.laporan',compact('laporan'));
    }

    public function export_excel() {
        $laporan = BimbinganMagang::with([
            'mahasiswa.programStudi',
            'dosen',
            'lowongan',
            'lowongan.skemaMagang'
        ])
        ->get()
        ->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama_mahasiswa,
                'nama_program_studi' => $item->mahasiswa->programStudi->nama_program_studi ?? null,
                'jenis_kelamin' => $item->mahasiswa->jenis_kelamin,
                'nama_dosen' => $item->dosen->nama_dosen,
                'nama_perusahaan' => $item->lowongan->nama_perusahaan ?? null,
                'posisi_magang' => $item->lowongan->posisiMagang->nama_posisi,
                'tipe_perusahaan' => $item->lowongan->tipe_perusahaan ?? null,
                'nama_skema' => $item->lowongan->skemaMagang->nama_skema_magang ?? null,
                'tanggal_mulai' => $item->lowongan->skemaMagang->tanggal_mulai,
                'tanggal_selesai' => $item->lowongan->skemaMagang->tanggal_selesai,
            ];
        });
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Mahasiswa');
        $sheet->setCellValue('C1', 'Nama Program Studi');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Nama Dosen');
        $sheet->setCellValue('F1', 'Nama Perusahaan');
        $sheet->setCellValue('G1', 'Posisi Magang');
        $sheet->setCellValue('H1', 'Tipe Perusahaan');
        $sheet->setCellValue('I1', 'Nama Skema');
        $sheet->setCellValue('J1', 'Tanggal Mulai');
        $sheet->setCellValue('K1', 'Tanggal Selesai');

        $sheet->getStyle('A1:K1')->getFont()->setBold(true);
        
        $no = 1;
        $baris = 2;

        foreach ($laporan as $value) {
            $sheet->setCellValue('A'.$baris, $no);
            $sheet->setCellValue('B'.$baris, $value['nama_mahasiswa']);
            $sheet->setCellValue('C'.$baris, $value['nama_program_studi']);
            $sheet->setCellValue('D'.$baris, $value['jenis_kelamin']);
            $sheet->setCellValue('E'.$baris, $value['nama_dosen']);
            $sheet->setCellValue('F'.$baris, $value['nama_perusahaan']);
            $sheet->setCellValue('G'.$baris, $value['posisi_magang']);
            $sheet->setCellValue('H'.$baris, $value['tipe_perusahaan']);
            $sheet->setCellValue('I'.$baris, $value['nama_skema']);
            $sheet->setCellValue('J'.$baris ,$value['tanggal_mulai']);
            $sheet->setCellValue('K'.$baris ,$value['tanggal_selesai']);
            $baris++;
            $no++;
        }
        
        foreach(range('A', 'K') as $columnId) {
            $sheet->getColumnDimension($columnId)->setAutoSize(true);
        }

        $sheet->setTitle('Data Laporan Mahasiswa Magang');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data_Laporan_Mahasiswa_Magang_'.date('Y-m-d_H-i-s').'.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf() {
        $laporan = BimbinganMagang::with([
            'mahasiswa.programStudi',
            'dosen',
            'lowongan',
            'lowongan.skemaMagang'
        ])
        ->get()
        ->map(function ($item) {
            return [
                'nama_mahasiswa' => $item->mahasiswa->nama_mahasiswa,
                'nama_program_studi' => $item->mahasiswa->programStudi->nama_program_studi ?? null,
                'jenis_kelamin' => $item->mahasiswa->jenis_kelamin,
                'nama_dosen' => $item->dosen->nama_dosen,
                'nama_perusahaan' => $item->lowongan->nama_perusahaan ?? null,
                'posisi_magang' => $item->lowongan->posisiMagang->nama_posisi,
                'tipe_perusahaan' => $item->lowongan->tipe_perusahaan ?? null,
                'nama_skema' => $item->lowongan->skemaMagang->nama_skema_magang ?? null,
                'tanggal_mulai' => $item->lowongan->skemaMagang->tanggal_mulai,
                'tanggal_selesai' => $item->lowongan->skemaMagang->tanggal_selesai,
            ];
        });
        
        $pdf = Pdf::loadView('admin.function.laporan.export-pdf', ['laporan' => $laporan]);   
        $pdf->setPaper('a4', 'potrait');
        // $pdf->setOption("isRemoteEnabled", true); // jika ada gambar
        $pdf->render();

        return $pdf->stream('Data_Laporan_Mahasiswa_Magang_'.date('Y-m-d_H-i-s').'.pdf');
    }
}
