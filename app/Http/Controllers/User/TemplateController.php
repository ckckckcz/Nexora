<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TemplateController extends Controller
{
    /**
     * Download template files for magang application
     *
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function download(Request $request)
    {
        $file = $request->file;

        switch ($file) {
            case 'riwayat-hidup':
                $path = public_path('template/riwayat-hidup.docx');
                $name = 'Riwayat Hidup.docx';
                break;

            case 'izin-ortu':
                $path = public_path('template/template-izin-ortu.docx');
                $name = 'Izin Orang Tua.docx';
                break;

            case 'pakta-integritas':
                $path = public_path('template/template-pakta-integritas.docx');
                $name = 'Pakta Integritas.docx';
                break;

            default:
                return back()->with('error', 'File template tidak ditemukan.');
        }

        // Check if file exists
        if (!file_exists($path)) {
            // Create directory if it doesn't exist
            $directory = public_path('template');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // For development purposes, create dummy files
            if ($file == 'template-cv') {
                // Create a dummy Word document
                $dummy = fopen($path, 'w');
                fwrite($dummy, 'This is a placeholder for a CV template file.');
                fclose($dummy);
            } else {
                // Create a dummy PDF
                $dummy = fopen($path, 'w');
                fwrite($dummy, '%PDF-1.4
1 0 obj<</Type/Catalog/Pages 2 0 R>>endobj
2 0 obj<</Type/Pages/Count 1/Kids[3 0 R]>>endobj
3 0 obj<</Type/Page/MediaBox[0 0 612 792]/Parent 2 0 R/Resources<<>>>>endobj
xref
0 4
0000000000 65535 f
0000000010 00000 n
0000000053 00000 n
0000000102 00000 n
trailer<</Size 4/Root 1 0 R>>
startxref
178
%%EOF');
                fclose($dummy);
            }
        }

        return response()->download($path, $name);
    }
}
