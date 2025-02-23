<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:shifts,kode',
            'nama' => 'required|string|max:255|unique:shifts,nama',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_pulang' => 'required|date_format:H:i',
            'faktor_pengali_gaji' => 'required|numeric|min:1',
        ]);

        Shift::create($request->all());

        return redirect()->route('shift.index')->with('success', ucwords(str_replace('_', ' ', 'shift')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        return view('shift.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        return view('shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:shifts,kode,' . $shift->id,
            'nama' => 'required|string|max:255|unique:shifts,nama,' . $shift->id,
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'faktor_pengali_gaji' => 'required|numeric|min:1',
        ]);

        $shift->update($request->all());
        return redirect()->route('shift.index')->with('success', ucwords(str_replace('_', ' ', 'shift')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shift.index')->with('success', ucwords(str_replace('_', ' ', 'shift')).' berhasil dihapus');
    }
}
