<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Cuti::with('kontak.jabatan')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('kontak_id', function ($row) {
                    return $row->kontak ? $row->kontak->nama_panggilan : '-';
                })
                ->editColumn('jabatan', function ($row) {
                    return $row->kontak && $row->kontak->jabatan ? $row->kontak->jabatan->nama : '-';
                })
                ->make(true);
        }
        return view('cuti.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Kontak::with('jabatan')->where('jenis_kontak_id', 1)->get();
        return view('cuti.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date',
            'kontak_id' => 'required|exists:kontaks,id',
            'keterangan' => 'required|string',
        ]);

        Cuti::create([
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'kontak_id' => $request->kontak_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cuti = Cuti::with('kontak')->findOrFail($id);
        return view('cuti.show', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuti = Cuti::with('kontak')->findOrFail($id);
        $karyawans = Kontak::with('jabatan')->where('jenis_kontak_id', 1)->get();
        return view('cuti.edit', compact('cuti', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date',
            'kontak_id' => 'required|exists:kontaks,id',
            'keterangan' => 'required|string',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update([
            'dari' => $request->dari,
            'sampai' => $request->sampai,
            'kontak_id' => $request->kontak_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus');
    }
}
