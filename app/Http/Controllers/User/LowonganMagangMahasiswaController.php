<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;

class LowonganMagangMahasiswaController extends Controller
{
    /**
     * Display the rekomendasi magang view.
     */
    public function index()
    {
        $bidangKeahlian = LowonganMagang::select('bidang_keahlian')->distinct()->get();
        $tipePerusahaan = LowonganMagang::select('tipe_perusahaan')->distinct()->get();
        $fasilitasPerusahaan = LowonganMagang::select('fasilitas_perusahaan')->distinct()->get();
        $statusGaji = LowonganMagang::select('status_gaji')->distinct()->get();
        $fleksibilitasKerja = LowonganMagang::select('fleksibilitas_kerja')->distinct()->get();

        return view('user.rekomendasi_magang', compact('bidangKeahlian', 'tipePerusahaan', 'fasilitasPerusahaan', 'statusGaji', 'fleksibilitasKerja'));
    }

    /**
     * Fetch bidang keahlian tags from the database.
     */
    public function getBidangKeahlianTags()
    {
        $tags = LowonganMagang::select('bidang_keahlian')->distinct()->get()->pluck('bidang_keahlian')->toArray();

        // Split tags by comma and format them into an array of buttons
        $formattedTags = [];
        foreach ($tags as $tagGroup) {
            $individualTags = explode(',', $tagGroup);
            foreach ($individualTags as $tag) {
                $formattedTags[] = ['name' => trim($tag), 'icon' => '📚'];
            }
        }

        return response()->json($formattedTags);
    }
}
