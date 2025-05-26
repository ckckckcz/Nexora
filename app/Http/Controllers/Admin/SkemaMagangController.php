<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganMagang;
use App\Models\SkemaMagang;
use Illuminate\Http\Request;
use Validator;

class SkemaMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schemeInternships = SkemaMagang::limit(10)->get();
        return view('admin.skema_magang', compact('schemeInternships'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.function.skema_magang.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_skema' => 'required|string',
            'tanggal_mulai' => 'required|date|date_format:Y-m-d',
            'tanggal_selesai' => 'required|date|date_format:Y-m-d|after:tanggal_mulai',
        ], [
            'nama_skema.required' => 'Nama Skema Harus Diisi',
            'tanggal_mulai.required' => 'Tanggal Mulai Harus Diisi',
            'tanggal_mulai.date' => 'Tanggal Mulai harus dalam format YYYY-MM-DD',
            'tanggal_selesai.required' => 'Tanggal Selesai Harus Diisi',
            'tanggal_selesai.date' => 'Tanggal Selesai harus dalam format YYYY-MM-DD',
            'tanggal_selesai.after_or_equal' => 'Tanggal Selesai harus setelah Tanggal Mulai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        SkemaMagang::create([
            'nama_skema' => $request->nama_skema,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('admin.skema-magang')->with('success', 'Skema Magang berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skemaMagang = SkemaMagang::findOrFail($id);
        return view('admin.function.skema_magang.edit', compact('skemaMagang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_skema' => 'required|string',
            'tanggal_mulai' => 'required|date|date_format:Y-m-d',
            'tanggal_selesai' => 'required|date|date_format:Y-m-d|after:tanggal_mulai',
        ], [
            'nama_skema.required' => 'Nama Skema Harus Diisi',
            'tanggal_mulai.required' => 'Tanggal Mulai Harus Diisi',
            'tanggal_mulai.date' => 'Tanggal Mulai harus dalam format YYYY-MM-DD',
            'tanggal_selesai.required' => 'Tanggal Selesai Harus Diisi',
            'tanggal_selesai.date' => 'Tanggal Selesai harus dalam format YYYY-MM-DD',
            'tanggal_selesai.after_or_equal' => 'Tanggal Selesai harus setelah Tanggal Mulai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        SkemaMagang::find($id)->update([
            'nama_skema_magang' => $request->nama_skema,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->route('admin.skema-magang')->with('success', 'Skema Magang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skema = SkemaMagang::findOrFail($id);

        // Cek apakah masih ada lowongan dengan status "open" yang menggunakan skema ini
        $lowonganTerbuka = LowonganMagang::where('id_skema_magang', $id)->where('status_lowongan', 'open')->count();

        if ($lowonganTerbuka > 0) {
            return redirect()->route('admin.skema-magang')->with('error', 'Skema tidak dapat dihapus karena masih digunakan oleh lowongan yang status-nya "open".');
        }

        // Jika tidak ada lowongan open, lanjut hapus
        $skema->delete();

        return redirect()->route('admin.skema-magang')->with('success', 'Skema Magang berhasil dihapus.');
    }

}
