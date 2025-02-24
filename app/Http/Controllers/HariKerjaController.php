<?php

namespace App\Http\Controllers;

use App\Models\HariKerja;
use Illuminate\Http\Request;

class HariKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari_kerjas = HariKerja::all();
        return view('hari_kerja.index', compact('hari_kerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hari_kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:hari_kerjas,kode',
            'nama' => 'required|string|max:255|unique:hari_kerjas,nama',
            'faktor' => 'required|numeric|min:0',
        ]);

        HariKerja::create($request->all());

        return redirect()->route('hari_kerja.index')->with('success', ucwords(str_replace('_', ' ', 'hari_kerja')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HariKerja $hari_kerja)
    {
        return view('hari_kerja.show', compact('hari_kerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HariKerja $hari_kerja)
    {
        return view('hari_kerja.edit', compact('hari_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HariKerja $hari_kerja)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:hari_kerjas,kode,' . $hari_kerja->id,
            'nama' => 'required|string|max:255|unique:hari_kerjas,nama,' . $hari_kerja->id,
            'faktor' => 'required|numeric|min:0',
        ]);

        $hari_kerja->update($request->all());
        return redirect()->route('hari_kerja.index')->with('success', ucwords(str_replace('_', ' ', 'hari_kerja')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HariKerja $hari_kerja)
    {
        $hari_kerja->delete();

        return redirect()->route('hari_kerja.index')->with('success', ucwords(str_replace('_', ' ', 'hari_kerja')).' berhasil dihapus');
    }
}
