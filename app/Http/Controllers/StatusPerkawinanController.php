<?php

namespace App\Http\Controllers;

use App\Models\StatusPerkawinan;
use Illuminate\Http\Request;

class StatusPerkawinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status_perkawinans = StatusPerkawinan::all();
        return view('status_perkawinan.index', compact('status_perkawinans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status_perkawinan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        StatusPerkawinan::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('status_perkawinan.index')->with('success', ucwords(str_replace('_', ' ', 'status_perkawinan')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPerkawinan $status_perkawinan)
    {
        return view('status_perkawinan.show', compact('status_perkawinan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusPerkawinan $status_perkawinan)
    {
        return view('status_perkawinan.edit', compact('status_perkawinan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusPerkawinan $status_perkawinan)
    {
        // Cek apakah record memiliki master = 1
        if ($status_perkawinan->master == 1) {
            return redirect()->route('status_perkawinan.index')->with('error', ucwords(str_replace('_', ' ', 'status_perkawinan')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $status_perkawinan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('status_perkawinan.index')->with('success', ucwords(str_replace('_', ' ', 'status_perkawinan')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPerkawinan $status_perkawinan)
    {
        // Cek apakah record memiliki master = 1
        if ($status_perkawinan->master == 1) {
            return redirect()->route('status_perkawinan.index')->with('error', ucwords(str_replace('_', ' ', 'status_perkawinan')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $status_perkawinan->delete();

        return redirect()->route('status_perkawinan.index')->with('success', ucwords(str_replace('_', ' ', 'status_perkawinan')).' berhasil dihapus');
    }
}
