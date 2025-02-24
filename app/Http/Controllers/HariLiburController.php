<?php

namespace App\Http\Controllers;

use App\Models\HariLibur;
use Illuminate\Http\Request;

class HariLiburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari_liburs = HariLibur::all();
        return view('hari_libur.index', compact('hari_liburs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hari_libur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:hari_liburs,tanggal',
            'keterangan' => 'required|string|max:255',
        ]);

        HariLibur::create($request->all());

        return redirect()->route('hari_libur.index')->with('success', ucwords(str_replace('_', ' ', 'hari_libur')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HariLibur $hari_libur)
    {
        return view('hari_libur.show', compact('hari_libur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HariLibur $hari_libur)
    {
        return view('hari_libur.edit', compact('hari_libur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HariLibur $hari_libur)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:hari_liburs,tanggal,' . $hari_libur->id,
            'keterangan' => 'required|string|max:255',
        ]);

        $hari_libur->update($request->all());
        return redirect()->route('hari_libur.index')->with('success', ucwords(str_replace('_', ' ', 'hari_libur')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HariLibur $hari_libur)
    {
        $hari_libur->delete();

        return redirect()->route('hari_libur.index')->with('success', ucwords(str_replace('_', ' ', 'hari_libur')).' berhasil dihapus');
    }
}
