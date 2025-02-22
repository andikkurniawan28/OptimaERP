<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayahs = Wilayah::all();
        return view('wilayah.index', compact('wilayahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wilayah.create');
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

        Wilayah::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'master' => $request->master,
        ]);

        return redirect()->route('wilayah.index')->with('success', ucwords(str_replace('_', ' ', 'wilayah')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        return view('wilayah.show', compact('wilayah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        return view('wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $wilayah->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('wilayah.index')->with('success', ucwords(str_replace('_', ' ', 'wilayah')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();

        return redirect()->route('wilayah.index')->with('success', ucwords(str_replace('_', ' ', 'wilayah')).' berhasil dihapus');
    }
}
