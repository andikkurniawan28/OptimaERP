<?php

namespace App\Http\Controllers;

use App\Models\StatusKaryawan;
use Illuminate\Http\Request;

class StatusKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status_karyawans = StatusKaryawan::all();
        return view('status_karyawan.index', compact('status_karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('status_karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        StatusKaryawan::create([
            'nama' => $request->nama,
            'master' => $request->master ?? 0, // Default master = 0 jika tidak dikirim
        ]);

        return redirect()->route('status_karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'status_karyawan')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusKaryawan $status_karyawan)
    {
        return view('status_karyawan.show', compact('status_karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusKaryawan $status_karyawan)
    {
        return view('status_karyawan.edit', compact('status_karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusKaryawan $status_karyawan)
    {
        // Cek apakah record memiliki master = 1
        if ($status_karyawan->master == 1) {
            return redirect()->route('status_karyawan.index')->with('error', ucwords(str_replace('_', ' ', 'status_karyawan')).' ini tidak dapat diubah karena merupakan data master.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $status_karyawan->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('status_karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'status_karyawan')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusKaryawan $status_karyawan)
    {
        // Cek apakah record memiliki master = 1
        if ($status_karyawan->master == 1) {
            return redirect()->route('status_karyawan.index')->with('error', ucwords(str_replace('_', ' ', 'status_karyawan')).' ini tidak dapat dihapus karena merupakan data master.');
        }

        $status_karyawan->delete();

        return redirect()->route('status_karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'status_karyawan')).' berhasil dihapus');
    }
}
