<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Kontak;
use App\Models\Jabatan;
use App\Models\StatusKaryawan;
use App\Models\Agama;
use App\Models\StatusPerkawinan;
use App\Models\PendidikanTerakhir;
use App\Models\Sekolah;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Kontak::with(['organisasi', 'jabatan', 'statusKaryawan', 'agama', 'statusPerkawinan', 'pendidikanTerakhir', 'sekolah', 'jurusan'])
            ->where('jenis_kontak_id', 1) // Jenis kontak untuk karyawan
            ->get();
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasis = Organisasi::all();
        $jabatans = Jabatan::all();
        $status_karyawans = StatusKaryawan::all();
        $agamas = Agama::all();
        $status_perkawinans = StatusPerkawinan::all();
        $pendidikan_terakhirs = PendidikanTerakhir::all();
        $sekolahs = Sekolah::all();
        $jurusans = Jurusan::all();

        return view('karyawan.create', compact(
            'organisasis',
            'jabatans',
            'status_karyawans',
            'agamas',
            'status_perkawinans',
            'pendidikan_terakhirs',
            'sekolahs',
            'jurusans'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:kontaks,kode',
            'organisasi_id' => 'required|exists:organisasis,id',
            'nama_lengkap' => 'required|string|unique:kontaks,nama_lengkap',
            'nama_panggilan' => 'required|string|unique:kontaks,nama_panggilan',
            'nomor_handphone' => 'required|string|unique:kontaks,nomor_handphone',
            'email' => 'required|email|unique:kontaks,email',
            'alamat' => 'required|string',
            'npwp' => 'nullable|string',
            'jabatan_id' => 'required|exists:jabatans,id',
            'status_karyawan_id' => 'required|exists:status_karyawans,id',
            'agama_id' => 'nullable|exists:agamas,id',
            'status_perkawinan_id' => 'nullable|exists:status_perkawinans,id',
            'pendidikan_terakhir_id' => 'nullable|exists:pendidikan_terakhirs,id',
            'sekolah_id' => 'nullable|exists:sekolahs,id',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'nik' => 'nullable|string|unique:kontaks,nik',
            'nkk' => 'nullable|string',
            'bpjs_ketenagakerjaan' => 'nullable|string',
            'bpjs_kesehatan' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        Kontak::create([
            'kode' => $request->kode,
            'jenis_kontak_id' => 1, // Jenis kontak untuk karyawan
            'organisasi_id' => $request->organisasi_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'nomor_handphone' => $request->nomor_handphone,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
            'jabatan_id' => $request->jabatan_id,
            'status_karyawan_id' => $request->status_karyawan_id,
            'agama_id' => $request->agama_id,
            'status_perkawinan_id' => $request->status_perkawinan_id,
            'pendidikan_terakhir_id' => $request->pendidikan_terakhir_id,
            'sekolah_id' => $request->sekolah_id,
            'jurusan_id' => $request->jurusan_id,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'bpjs_ketenagakerjaan' => $request->bpjs_ketenagakerjaan,
            'bpjs_kesehatan' => $request->bpjs_kesehatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'karyawan')) . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $karyawan = Kontak::with(['organisasi', 'jabatan', 'statusKaryawan', 'agama', 'statusPerkawinan', 'pendidikanTerakhir', 'sekolah', 'jurusan'])
            ->whereId($id)
            ->firstOrFail();
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Kontak::with(['organisasi', 'jabatan', 'statusKaryawan', 'agama', 'statusPerkawinan', 'pendidikanTerakhir', 'sekolah', 'jurusan'])
            ->whereId($id)
            ->firstOrFail();
        $organisasis = Organisasi::all();
        $jabatans = Jabatan::all();
        $status_karyawans = StatusKaryawan::all();
        $agamas = Agama::all();
        $status_perkawinans = StatusPerkawinan::all();
        $pendidikan_terakhirs = PendidikanTerakhir::all();
        $sekolahs = Sekolah::all();
        $jurusans = Jurusan::all();

        return view('karyawan.edit', compact(
            'karyawan',
            'organisasis',
            'jabatans',
            'status_karyawans',
            'agamas',
            'status_perkawinans',
            'pendidikan_terakhirs',
            'sekolahs',
            'jurusans'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'organisasi_id' => 'required|exists:organisasis,id',
            'nama_lengkap' => 'required|string|unique:kontaks,nama_lengkap,' . $id,
            'nama_panggilan' => 'required|string|unique:kontaks,nama_panggilan,' . $id,
            'nomor_handphone' => 'required|string|unique:kontaks,nomor_handphone,' . $id,
            'email' => 'required|email|unique:kontaks,email,' . $id,
            'alamat' => 'required|string',
            'npwp' => 'nullable|string',
            'jabatan_id' => 'required|exists:jabatans,id',
            'status_karyawan_id' => 'required|exists:status_karyawans,id',
        ]);

        Kontak::whereId($id)->update($request->except('_token', '_method'));

        return redirect()->route('karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'karyawan')) . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kontak::whereId($id)->delete();
        return redirect()->route('karyawan.index')->with('success', ucwords(str_replace('_', ' ', 'karyawan')) . ' berhasil dihapus');
    }
}
