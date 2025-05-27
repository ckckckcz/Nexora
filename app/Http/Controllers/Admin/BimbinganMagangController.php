<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BimbinganMagang;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class BimbinganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guidances = BimbinganMagang::limit(10)->get();
        return view('admin.bimbingan_magang', compact('guidances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.function.bimbingan_magang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.function.bimbingan_magang.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
