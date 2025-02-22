<?php

namespace App\Http\Controllers;

use App\Models\PendidikanTerakhir;
use Illuminate\Http\Request;

class PendidikanTerakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikan_terakhirs = PendidikanTerakhir::all();
        return view('pendidikan_terakhir.index', compact('pendidikan_terakhirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendidikan_terakhir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        PendidikanTerakhir::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('pendidikan_terakhir.index')->with('success', ucwords(str_replace('_', ' ', 'pendidikan_terakhir')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PendidikanTerakhir $pendidikan_terakhir)
    {
        return view('pendidikan_terakhir.show', compact('pendidikan_terakhir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendidikanTerakhir $pendidikan_terakhir)
    {
        return view('pendidikan_terakhir.edit', compact('pendidikan_terakhir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendidikanTerakhir $pendidikan_terakhir)
    {
        // Cek apakah record memiliki master = 1
        if ($pendidikan_terakhir->master == 1) {
            return redirect()->route('pendidikan_terakhir.index')->with('error', ucwords(str_replace('_', ' ', 'pendidikan_terakhir')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $pendidikan_terakhir->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pendidikan_terakhir.index')->with('success', ucwords(str_replace('_', ' ', 'pendidikan_terakhir')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendidikanTerakhir $pendidikan_terakhir)
    {
        // Cek apakah record memiliki master = 1
        if ($pendidikan_terakhir->master == 1) {
            return redirect()->route('pendidikan_terakhir.index')->with('error', ucwords(str_replace('_', ' ', 'pendidikan_terakhir')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $pendidikan_terakhir->delete();

        return redirect()->route('pendidikan_terakhir.index')->with('success', ucwords(str_replace('_', ' ', 'pendidikan_terakhir')).' berhasil dihapus');
    }
}
