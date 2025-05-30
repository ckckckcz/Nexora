<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Validator;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = ProgramStudi::limit(10)->get();
        return view('admin.program_studi', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.function.program_studi.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_program_studi' => 'required|string',
            'nama_program_studi' => 'required|string',
        ], [
            'kode_program_studi.required' => 'Kode Program Studi Harus Diisi',
            'nama_program_studi.required' => 'Nama Program Studi Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        ProgramStudi::create([
            'kode_program_studi' => $request->kode_program_studi,
            'nama_program_studi' => $request->nama_program_studi,
        ]);

        return redirect()->route('admin.program-studi')->with('success', 'Program Studi berhasil ditambahkan');
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
        $programStudi = ProgramStudi::findOrFail($id);
        return view('admin.function.program_studi.edit', compact('programStudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_program_studi' => 'required|string',
            'nama_program_studi' => 'required|string',
        ], [
            'kode_program_studi.required' => 'Kode Program Studi Harus Diisi',
            'nama_program_studi.required' => 'Nama Program Studi Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        ProgramStudi::find($id)->update([
            'kode_program_studi' => $request->kode_program_studi,
            'nama_program_studi' => $request->nama_program_studi,
        ]);

        return redirect()->route('admin.program-studi')->with('success', 'Program Studi berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProgramStudi = ProgramStudi::findOrFail($id);

        // Cek apakah masih ada program studi di mahasiswa dan dosen 
        $checkMahasiswa = Mahasiswa::where('id_program_studi', $id)->count();
        $chekDosen = Dosen::where('id_program_studi', $id)->count();

        if ($checkMahasiswa > 0 || $chekDosen > 0) {
            return redirect()->route('admin.program-studi')->with('error', 'Program Studi tidak dapat dihapus karena masih digunakan oleh mahasiswa dan dosen.');
        }

        // Jika tidak ada lowongan open, lanjut hapus
        $ProgramStudi->delete();

        return redirect()->route('admin.program-studi')->with('success', 'Program Studi berhasil dihapus.');
    }
}
