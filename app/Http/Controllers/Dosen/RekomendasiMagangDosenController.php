<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\BimbinganMagang;
use App\Models\HasilRekomendasi;
use Illuminate\Http\Request;

class RekomendasiMagangDosenController extends Controller
{
    public function index()
    {
        // Get student IDs that are under this lecturer's guidance
        $mahasiswaIds = BimbinganMagang::where('id_dosen', auth()->user()->dosen->id_dosen)
            ->pluck('id_mahasiswa')
            ->toArray();

        // Get recommendation results for those students - filter only ranking 1
        $mahasiswas = HasilRekomendasi::with(['mahasiswa', 'lowongan'])
            ->whereIn('id_mahasiswa', $mahasiswaIds)
            ->where('ranking', 1) // Only show rank 1 recommendations
            ->get()
            ->map(function ($hasil) {
                return [
                    'id' => $hasil->mahasiswa->id_mahasiswa,
                    'name' => $hasil->mahasiswa->nama_mahasiswa,
                    'nim' => $hasil->mahasiswa->nim,
                    'jurusan' => $hasil->mahasiswa->jurusan,
                    'jenis_kelamin' => $hasil->mahasiswa->jenis_kelamin,
                    'status' => $hasil->rekomendasi_dosen ?? 'Direkomendasikan',
                    'vikor' => number_format($hasil->wmsc, 3),
                    'ranking' => $hasil->ranking,
                    'company' => $hasil->lowongan->nama_perusahaan,
                    'hasil_rekomendasi' => $hasil, // Include full recommendation data
                ];
            });

        return view('dosen.rekomendasi_magang', compact('mahasiswas'));
    }
    
    // New method to show student profile details
    public function showProfile($nim)
    {
        // Get mahasiswa data based on NIM - similar to ProfileController's index method
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        
        return view('dosen.detail_profile_mahasiswa', compact('mahasiswa'));
    }

    public function getRecommendationData($mahasiswaId)
    {
        // Check if this student is under the current lecturer's guidance
        $isUnderGuidance = BimbinganMagang::where('id_dosen', auth()->user()->dosen->id_dosen)
            ->where('id_mahasiswa', $mahasiswaId)
            ->exists();

        if (!$isUnderGuidance) {
            return response()->json(['error' => 'Anda tidak memiliki akses ke data mahasiswa ini'], 403);
        }

        $recommendation = HasilRekomendasi::with(['mahasiswa', 'lowongan'])
            ->where('id_mahasiswa', $mahasiswaId)
            ->first();

        if (!$recommendation) {
            return response()->json(['error' => 'Data rekomendasi tidak ditemukan'], 404);
        }

        return response()->json([
            'id_hasil_rekomendasi' => $recommendation->id_hasil_rekomendasi,
            'id_mahasiswa' => $recommendation->id_mahasiswa,
            'id_lowongan' => $recommendation->id_lowongan,
            'wmsc' => number_format($recommendation->wmsc, 3),
            'qi' => number_format($recommendation->qi, 3),
            'ranking' => $recommendation->ranking,
            'rekomendasi_dosen' => $recommendation->rekomendasi_dosen,
            'nama_mahasiswa' => $recommendation->mahasiswa->nama_mahasiswa,
            'nim' => $recommendation->mahasiswa->nim,
            'nama_perusahaan' => $recommendation->lowongan->nama_perusahaan,
        ]);
    }

    public function updateRecommendation(Request $request, $mahasiswaId)
    {
        $request->validate([
            'rekomendasi_dosen' => 'required|in:Direkomendasikan,Tidak Direkomendasikan'
        ]);

        // Check if this student is under the current lecturer's guidance
        $isUnderGuidance = BimbinganMagang::where('id_dosen', auth()->user()->dosen->id_dosen)
            ->where('id_mahasiswa', $mahasiswaId)
            ->exists();

        if (!$isUnderGuidance) {
            return response()->json(['error' => 'Anda tidak memiliki akses ke data mahasiswa ini'], 403);
        }

        $recommendation = HasilRekomendasi::where('id_mahasiswa', $mahasiswaId)->first();

        if (!$recommendation) {
            return response()->json(['error' => 'Data rekomendasi tidak ditemukan'], 404);
        }

        $recommendation->update([
            'rekomendasi_dosen' => $request->rekomendasi_dosen
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Rekomendasi berhasil diperbarui'
        ]);
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
