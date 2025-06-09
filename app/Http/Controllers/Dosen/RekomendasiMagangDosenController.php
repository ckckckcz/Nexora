<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;

class RekomendasiMagangDosenController extends Controller
{
    public function index()
    {
        // Get mahasiswa data with proper relationships
        $mahasiswas = BimbinganMagang::with('mahasiswa')
            ->where('id_dosen', auth()->user()->dosen->id_dosen)
            ->get()
            ->pluck('mahasiswa')
            ->filter() // Remove null values
            ->unique('id_mahasiswa')
            ->map(function ($mahasiswa) {
                return [
                    'id' => $mahasiswa->id_mahasiswa,           // Map id_mahasiswa to id
                    'name' => $mahasiswa->nama_mahasiswa,       // Map nama_mahasiswa to name
                    'nim' => $mahasiswa->nim,                   // Keep nim as is
                    'jurusan' => $mahasiswa->jurusan,          // Additional fields
                    'jenis_kelamin' => $mahasiswa->jenis_kelamin,
                    'status' => 'Direkomendasikan',             // Default status
                    'vikor' => rand(1, 100) / 100,            // Mock data for demo
                    'ranking' => rand(1, 10),                  // Mock data for demo
                    'company' => 'PT. Example Corp',           // Mock data for demo
                ];
            })
            ->values(); // Reset array keys

        return view('dosen.rekomendasi_magang', compact('mahasiswas'));
    }
    
    // New method to show student profile details
    public function showProfile($nim)
    {
        // Get mahasiswa data based on NIM - similar to ProfileController's index method
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        
        return view('dosen.detail_profile_mahasiswa', compact('mahasiswa'));
    }

    // Alternative method using Eloquent accessors
    public function indexWithAccessors()
    {
        $mahasiswas = BimbinganMagang::with(['mahasiswa' => function($query) {
                $query->select('id_mahasiswa', 'nim', 'nama_mahasiswa', 'jurusan', 'jenis_kelamin');
            }])
            ->where('id_dosen', auth()->user()->dosen->id_dosen)
            ->get()
            ->pluck('mahasiswa')
            ->filter()
            ->unique('id_mahasiswa')
            ->transform(function ($mahasiswa) {
                $mahasiswa->id = $mahasiswa->id_mahasiswa;
                $mahasiswa->name = $mahasiswa->nama_mahasiswa;
                $mahasiswa->status = 'Direkomendasikan';
                return $mahasiswa;
            });

        return view('dosen.rekomendasi_magang', compact('mahasiswas'));
    }

    // Debug method with fixed data structure
    // public function debug()
    // {
    //     $bimbinganMagang = BimbinganMagang::with('mahasiswa')
    //         ->where('id_dosen', auth()->user()->dosen->id_dosen)
    //         ->get();

    //     $mahasiswas = $bimbinganMagang
    //         ->pluck('mahasiswa')
    //         ->filter()
    //         ->unique('id_mahasiswa')
    //         ->map(function ($mahasiswa) {
    //             return [
    //                 'id' => $mahasiswa->id_mahasiswa,
    //                 'name' => $mahasiswa->nama_mahasiswa,
    //                 'nim' => $mahasiswa->nim,
    //                 'jurusan' => $mahasiswa->jurusan,
    //                 'original_data' => $mahasiswa->toArray(), // Keep original for debugging
    //             };
    //         })
    //         ->values();

    //     $debugInfo = [
    //         'user_id' => auth()->user()->id,
    //         'dosen_id' => auth()->user()->dosen->id_dosen,
    //         'total_bimbingan_records' => $bimbinganMagang->count(),
    //         'total_mahasiswa_after_filter' => $mahasiswas->count(),
    //         'mahasiswa_ids' => $mahasiswas->pluck('id')->toArray(),
    //         'data_mapping_fixed' => true,
    //     ];

    //     return view('dosen.debug_rekomendasi', compact('mahasiswas', 'bimbinganMagang', 'debugInfo'));
    // }
}
