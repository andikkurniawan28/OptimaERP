<?php

namespace App\Http\Controllers;

use App\Models\BidangUsaha;
use Illuminate\Http\Request;

class BidangUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidang_usahas = BidangUsaha::all();
        return view('bidang_usaha.index', compact('bidang_usahas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidang_usaha.create');
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

        BidangUsaha::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('bidang_usaha.index')->with('success', ucwords(str_replace('_', ' ', 'bidang_usaha')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangUsaha $bidang_usaha)
    {
        return view('bidang_usaha.show', compact('bidang_usaha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangUsaha $bidang_usaha)
    {
        return view('bidang_usaha.edit', compact('bidang_usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidangUsaha $bidang_usaha)
    {
        // Cek apakah record memiliki master = 1
        if ($bidang_usaha->master == 1) {
            return redirect()->route('bidang_usaha.index')->with('error', ucwords(str_replace('_', ' ', 'bidang_usaha')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $bidang_usaha->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('bidang_usaha.index')->with('success', ucwords(str_replace('_', ' ', 'bidang_usaha')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangUsaha $bidang_usaha)
    {
        // Cek apakah record memiliki master = 1
        if ($bidang_usaha->master == 1) {
            return redirect()->route('bidang_usaha.index')->with('error', ucwords(str_replace('_', ' ', 'bidang_usaha')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $bidang_usaha->delete();

        return redirect()->route('bidang_usaha.index')->with('success', ucwords(str_replace('_', ' ', 'bidang_usaha')).' berhasil dihapus');
    }
}
