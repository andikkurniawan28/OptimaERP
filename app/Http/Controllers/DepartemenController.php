<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Departemen::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('departemen.index')->with('success', ucwords(str_replace('_', ' ', 'departemen')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        return view('departemen.show', compact('departemen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        return view('departemen.edit', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departemen $departemen)
    {
        // Cek apakah record memiliki master = 1
        if ($departemen->master == 1) {
            return redirect()->route('departemen.index')->with('error', ucwords(str_replace('_', ' ', 'departemen')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $departemen->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('departemen.index')->with('success', ucwords(str_replace('_', ' ', 'departemen')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        // Cek apakah record memiliki master = 1
        if ($departemen->master == 1) {
            return redirect()->route('departemen.index')->with('error', ucwords(str_replace('_', ' ', 'departemen')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $departemen->delete();

        return redirect()->route('departemen.index')->with('success', ucwords(str_replace('_', ' ', 'departemen')).' berhasil dihapus');
    }
}
