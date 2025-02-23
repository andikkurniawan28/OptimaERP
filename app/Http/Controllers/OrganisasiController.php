<?php

namespace App\Http\Controllers;

use App\Models\BidangUsaha;
use App\Models\JenisOrganisasi;
use App\Models\Wilayah;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Menampilkan daftar organisasi.
     */
    public function index()
    {
        $organisasis = Organisasi::with(['jenis_organisasi', 'bidang_usaha', 'wilayah'])->latest()->paginate(10);
        return view('organisasi.index', compact('organisasis'));
    }

    /**
     * Menampilkan form tambah organisasi.
     */
    public function create()
    {
        $jenis_organisasis = JenisOrganisasi::all();
        $bidang_usahas = BidangUsaha::all();
        $wilayahs = Wilayah::all();

        return view('organisasi.create', compact('jenis_organisasis', 'bidang_usahas', 'wilayahs'));
    }

    /**
     * Menyimpan data organisasi baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:organisasis,kode',
            'nama' => 'required|string|max:255',
            'jenis_organisasi_id' => 'required|exists:jenis_organisasis,id',
            'bidang_usaha_id' => 'required|exists:bidang_usahas,id',
            'wilayah_id' => 'required|exists:wilayahs,id',
            'nomor_handphone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'npwp' => 'nullable|string|max:30',
        ]);

        Organisasi::create($request->all());

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail organisasi berdasarkan ID.
     */
    public function show(Organisasi $organisasi)
    {
        return view('organisasi.show', compact('organisasi'));
    }

    /**
     * Menampilkan form edit organisasi.
     */
    public function edit(Organisasi $organisasi)
    {
        $jenis_organisasis = JenisOrganisasi::all();
        $bidang_usahas = BidangUsaha::all();
        $wilayahs = Wilayah::all();

        return view('organisasi.edit', compact('organisasi', 'jenis_organisasis', 'bidang_usahas', 'wilayahs'));
    }

    /**
     * Memperbarui data organisasi di database.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:organisasis,kode,' . $organisasi->id,
            'nama' => 'required|string|max:255',
            'jenis_organisasi_id' => 'required|exists:jenis_organisasis,id',
            'bidang_usaha_id' => 'required|exists:bidang_usahas,id',
            'wilayah_id' => 'required|exists:wilayahs,id',
            'nomor_handphone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'npwp' => 'nullable|string|max:30',
        ]);

        $organisasi->update($request->all());

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil diperbarui.');
    }

    /**
     * Menghapus organisasi dari database.
     */
    public function destroy(Organisasi $organisasi)
    {
        $organisasi->delete();
        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
