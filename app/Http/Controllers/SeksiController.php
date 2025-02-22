<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Seksi;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seksis = Seksi::with('departemen')->get(); // Load relasi departemen
        return view('seksi.index', compact('seksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemens = Departemen::all();
        return view('seksi.create', compact('departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'departemen_id' => 'required|exists:departemens,id',
        ]);

        Seksi::create([
            'nama' => $request->nama,
            'departemen_id' => $request->departemen_id, // Simpan departemen_id
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('seksi.index')->with('success', ucwords(str_replace('_', ' ', 'seksi')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seksi $seksi)
    {
        return view('seksi.show', compact('seksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seksi $seksi)
    {
        if ($seksi->master == 1) {
            return redirect()->route('seksi.index')->with('error', ucwords(str_replace('_', ' ', 'seksi')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $departemens = Departemen::all();
        return view('seksi.edit', compact('seksi', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seksi $seksi)
    {
        if ($seksi->master == 1) {
            return redirect()->route('seksi.index')->with('error', ucwords(str_replace('_', ' ', 'seksi')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'departemen_id' => 'required|exists:departemens,id',
        ]);

        $seksi->update([
            'nama' => $request->nama,
            'departemen_id' => $request->departemen_id,
        ]);

        return redirect()->route('seksi.index')->with('success', ucwords(str_replace('_', ' ', 'seksi')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seksi $seksi)
    {
        if ($seksi->master == 1) {
            return redirect()->route('seksi.index')->with('error', ucwords(str_replace('_', ' ', 'seksi')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $seksi->delete();

        return redirect()->route('seksi.index')->with('success', ucwords(str_replace('_', ' ', 'seksi')).' berhasil dihapus');
    }
}
