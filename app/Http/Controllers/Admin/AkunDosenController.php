<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Storage;
use Str;

class AkunDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Dosen::limit(10)->get();
        return view('admin.manajemenAkun.dosen', compact('lecturers'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = ProgramStudi::all();
        return view('admin.function.dosen.tambah', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nidn' => 'required|string|max:10|unique:dosen,nidn', // Adjust table name
            'nama_dosen' => 'required|string|max:100',
            'id_program_studi' => 'required|exists:program_studi,id_program_studi', // Adjust table name
            'jurusan' => 'required|string|max:100',
            'tanda_tangan' => 'nullable|image|mimes:png,jpg|max:2048', // For uploaded file
            'signature_pad_data' => 'nullable|string', // For canvas data
            'signature_method' => 'required|in:upload,draw',
        ]);

        // Initialize the signature path
        $signaturePath = null;

        // Handle signature based on method
        if ($validated['signature_method'] === 'upload' && $request->hasFile('tanda_tangan')) {
            // Process uploaded image
            $file = $request->file('tanda_tangan');
            $filename = 'signature_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $signaturePath = $file->storeAs('signatures', $filename, 'public');
        } elseif ($validated['signature_method'] === 'draw' && !empty($validated['signature_pad_data'])) {
            // Process canvas signature (base64)
            $base64Image = $validated['signature_pad_data'];
            // Remove the base64 prefix (e.g., "data:image/png;base64,")
            $base64Image = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
            $imageData = base64_decode($base64Image);
            $filename = 'signature_' . Str::random(10) . '.png';
            $signaturePath = 'signatures/' . $filename;

            // Save the image to storage
            Storage::disk('public')->put($signaturePath, $imageData);
        } else {
            // If no signature is provided, return an error or handle as needed
            return back()->withErrors(['tanda_tangan' => 'Tanda tangan wajib diisi.']);
        }

        // Create the Dosen record
        Dosen::create([
            'nidn' => $validated['nidn'],
            'nama_dosen' => $validated['nama_dosen'],
            'id_program_studi' => $validated['id_program_studi'],
            'jurusan' => $validated['jurusan'],
            'tanda_tangan' => $signaturePath, // Store the path to the signature
        ]);

        // Redirect with success message
        return redirect('/admin/manajemen-akun/dosen')->with('success', 'Data dosen berhasil ditambahkan!');
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
        $dosen = Dosen::findOrFail($id);
        $prodis = ProgramStudi::all();
        return view('admin.function.dosen.edit', compact('dosen', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);
        // Validate the incoming request
        $validated = $request->validate([
            'nidn' => 'required|unique:dosen,nidn,' . $dosen->id_dosen . ',id_dosen',
            'nama_dosen' => 'required|string|max:100',
            'id_program_studi' => 'required|exists:program_studi,id_program_studi',
            'jurusan' => 'required|string|max:100',
            'tanda_tangan' => 'nullable|image|mimes:png,jpg,gif|max:2048',
            'signature_pad_data' => 'nullable|string',
            'signature_method' => 'required|in:upload,draw',
        ]);

        // Find the lecturer

        // Initialize the signature path
        $signaturePath = $dosen->tanda_tangan; // Preserve existing signature if no new one is provided

        // Handle signature based on method
        if ($validated['signature_method'] === 'upload' && $request->hasFile('tanda_tangan')) {
            // Delete old signature if exists
            if ($dosen->tanda_tangan && Storage::disk('public')->exists($dosen->tanda_tangan)) {
                Storage::disk('public')->delete($dosen->tanda_tangan);
            }

            // Process uploaded image
            $file = $request->file('tanda_tangan');
            $filename = 'signature_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $signaturePath = $file->storeAs('signatures', $filename, 'public');
        } elseif ($validated['signature_method'] === 'draw' && !empty($validated['signature_pad_data'])) {
            // Delete old signature if exists
            if ($dosen->tanda_tangan && Storage::disk('public')->exists($dosen->tanda_tangan)) {
                Storage::disk('public')->delete($dosen->tanda_tangan);
            }

            // Process canvas signature (base64)
            $base64Image = $validated['signature_pad_data'];
            // Remove the base64 prefix (e.g., "data:image/png;base64,")
            $base64Image = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
            $imageData = base64_decode($base64Image);
            $filename = 'signature_' . Str::random(10) . '.png';
            $signaturePath = 'signatures/' . $filename;

            // Save the image to storage
            Storage::disk('public')->put($signaturePath, $imageData);
        }

        // Update the Dosen record
        $dosen->update([
            'nidn' => $validated['nidn'],
            'nama_dosen' => $validated['nama_dosen'],
            'id_program_studi' => $validated['id_program_studi'],
            'jurusan' => $validated['jurusan'],
            'tanda_tangan' => $signaturePath, // Store the path to the signature
        ]);

        // Redirect with success message
        return redirect('/admin/manajemen-akun/dosen')->with('success', 'Data dosen berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
