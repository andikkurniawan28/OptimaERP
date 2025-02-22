<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::with('seksi')->get(); // Load relasi seksi
        return view('jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seksis = Seksi::all();
        return view('jabatan.create', compact('seksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'seksi_id' => 'required|exists:seksis,id',
        ]);

        Jabatan::create([
            'nama' => $request->nama,
            'seksi_id' => $request->seksi_id, // Simpan seksi_id
        ]);

        return redirect()->route('jabatan.index')->with('success', ucwords(str_replace('_', ' ', 'jabatan')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return view('jabatan.show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        $seksis = Seksi::all();
        return view('jabatan.edit', compact('jabatan', 'seksis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'seksi_id' => 'required|exists:seksis,id',
        ]);

        $jabatan->update([
            'nama' => $request->nama,
            'seksi_id' => $request->seksi_id,
        ]);

        return redirect()->route('jabatan.index')->with('success', ucwords(str_replace('_', ' ', 'jabatan')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', ucwords(str_replace('_', ' ', 'jabatan')).' berhasil dihapus');
    }
}
