<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PihakKetigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pihak_ketigas = Kontak::with('organisasi')->where('jenis_kontak_id', 2)->get(); // Load relasi organisasi
        return view('pihak_ketiga.index', compact('pihak_ketigas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasis = Organisasi::all();
        return view('pihak_ketiga.create', compact('organisasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organisasi_id' => 'required|exists:organisasis,id',
            'nama_lengkap' => 'required|string|unique:kontaks,nama_lengkap',
            'nama_panggilan' => 'required|string|unique:kontaks,nama_panggilan',
            'nomor_handphone' => 'required|string|unique:kontaks,nomor_handphone',
            'email' => 'required|email|unique:kontaks,email',
            'alamat' => 'required|string',
            'npwp' => 'nullable|string',
        ]);

        Kontak::create([
            'kode' => Str::random(10),
            'jenis_kontak_id' => 2, // Set default jenis_kontak_id
            'organisasi_id' => $request->organisasi_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'nomor_handphone' => $request->nomor_handphone,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
        ]);

        return redirect()->route('pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'pihak_ketiga')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        return view('pihak_ketiga.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        $organisasis = Organisasi::all();
        return view('pihak_ketiga.edit', compact('pihak_ketiga', 'organisasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'organisasi_id' => 'required|exists:organisasis,id',
        ]);

        $kontak->update([
            'nama' => $request->nama,
            'organisasi_id' => $request->organisasi_id,
        ]);

        return redirect()->route('pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'pihak_ketiga')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('pihak_ketiga.index')->with('success', ucwords(str_replace('_', ' ', 'pihak_ketiga')).' berhasil dihapus');
    }
}
