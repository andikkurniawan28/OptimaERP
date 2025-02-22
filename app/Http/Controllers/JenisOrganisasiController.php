<?php

namespace App\Http\Controllers;

use App\Models\JenisOrganisasi;
use Illuminate\Http\Request;

class JenisOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_organisasis = JenisOrganisasi::all();
        return view('jenis_organisasi.index', compact('jenis_organisasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisOrganisasi::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('jenis_organisasi.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_organisasi')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisOrganisasi $jenis_organisasi)
    {
        return view('jenis_organisasi.show', compact('jenis_organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisOrganisasi $jenis_organisasi)
    {
        return view('jenis_organisasi.edit', compact('jenis_organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisOrganisasi $jenis_organisasi)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_organisasi->master == 1) {
            return redirect()->route('jenis_organisasi.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_organisasi')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis_organisasi->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis_organisasi.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_organisasi')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisOrganisasi $jenis_organisasi)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_organisasi->master == 1) {
            return redirect()->route('jenis_organisasi.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_organisasi')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $jenis_organisasi->delete();

        return redirect()->route('jenis_organisasi.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_organisasi')).' berhasil dihapus');
    }
}
