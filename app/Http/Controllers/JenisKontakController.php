<?php

namespace App\Http\Controllers;

use App\Models\JenisKontak;
use Illuminate\Http\Request;

class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_kontaks = JenisKontak::all();
        return view('jenis_kontak.index', compact('jenis_kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisKontak::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('jenis_kontak.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_kontak')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisKontak $jenis_kontak)
    {
        return view('jenis_kontak.show', compact('jenis_kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisKontak $jenis_kontak)
    {
        return view('jenis_kontak.edit', compact('jenis_kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisKontak $jenis_kontak)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_kontak->master == 1) {
            return redirect()->route('jenis_kontak.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_kontak')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenis_kontak->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis_kontak.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_kontak')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisKontak $jenis_kontak)
    {
        // Cek apakah record memiliki master = 1
        if ($jenis_kontak->master == 1) {
            return redirect()->route('jenis_kontak.index')->with('error', ucwords(str_replace('_', ' ', 'jenis_kontak')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $jenis_kontak->delete();

        return redirect()->route('jenis_kontak.index')->with('success', ucwords(str_replace('_', ' ', 'jenis_kontak')).' berhasil dihapus');
    }
}
