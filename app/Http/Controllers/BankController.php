<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::all();
        return view('bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank.create');
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

        Bank::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'master' => $request->master,
        ]);

        return redirect()->route('bank.index')->with('success', ucwords(str_replace('_', ' ', 'bank')).' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        return view('bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
        ]);

        $bank->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect()->route('bank.index')->with('success', ucwords(str_replace('_', ' ', 'bank')).' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index')->with('success', ucwords(str_replace('_', ' ', 'bank')).' berhasil dihapus');
    }
}
