<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keahlians = Keahlian::all();
        return view('keahlian.index', compact('keahlians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keahlian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        Keahlian::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'master' => $request->master,
        ]);

        return redirect()->route('keahlian.index')->with('success', ucwords(str_replace('_', ' ', 'keahlian')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keahlian $keahlian)
    {
        return view('keahlian.show', compact('keahlian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keahlian $keahlian)
    {
        return view('keahlian.edit', compact('keahlian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keahlian $keahlian)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $keahlian->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('keahlian.index')->with('success', ucwords(str_replace('_', ' ', 'keahlian')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keahlian $keahlian)
    {
        $keahlian->delete();

        return redirect()->route('keahlian.index')->with('success', ucwords(str_replace('_', ' ', 'keahlian')).' berhasil dihapus');
    }
}
