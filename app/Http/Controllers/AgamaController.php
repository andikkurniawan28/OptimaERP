<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::all();
        return view('agama.index', compact('agamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Agama::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('agama.index')->with('success', ucwords(str_replace('_', ' ', 'agama')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agama $agama)
    {
        return view('agama.show', compact('agama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agama $agama)
    {
        return view('agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        // Cek apakah record memiliki master = 1
        if ($agama->master == 1) {
            return redirect()->route('agama.index')->with('error', ucwords(str_replace('_', ' ', 'agama')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $agama->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('agama.index')->with('success', ucwords(str_replace('_', ' ', 'agama')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agama $agama)
    {
        // Cek apakah record memiliki master = 1
        if ($agama->master == 1) {
            return redirect()->route('agama.index')->with('error', ucwords(str_replace('_', ' ', 'agama')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $agama->delete();

        return redirect()->route('agama.index')->with('success', ucwords(str_replace('_', ' ', 'agama')).' berhasil dihapus');
    }
}
