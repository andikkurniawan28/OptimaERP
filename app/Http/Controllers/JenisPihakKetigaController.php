<?php

namespace App\Http\Controllers;

use App\Models\JenisPihakKetiga;
use Illuminate\Http\Request;

class JenisPihakKetigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_pihak_ketigas = JenisPihakKetiga::all();
        return view('jenis_pihak_ketiga.index', compact('jenis_pihak_ketigas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_pihak_ketiga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisPihakKetiga::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('jenis_pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPihakKetiga $jenis_pihak_ketiga)
    {
        return view('jenis_pihak_ketiga.show', compact('jenis_pihak_ketiga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPihakKetiga $jenis_pihak_ketiga)
    {
        return view('jenis_pihak_ketiga.edit', compact('jenis_pihak_ketiga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPihakKetiga $jenis_pihak_ketiga)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_pihak_ketiga->master == 1) {
            return redirect()->route('jenis_pihak_ketiga.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis_pihak_ketiga->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis_pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPihakKetiga $jenis_pihak_ketiga)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_pihak_ketiga->master == 1) {
            return redirect()->route('jenis_pihak_ketiga.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $jenis_pihak_ketiga->delete();

        return redirect()->route('jenis_pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_pihak_ketiga')).' berhasil dihapus');
    }
}
