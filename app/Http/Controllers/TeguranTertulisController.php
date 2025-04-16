<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeguranTertulis;
use App\Models\Karyawan;

class TeguranTertulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teguranTertulis = TeguranTertulis::with('karyawan')->get();
        return view('teguran_tertulis.index', compact('teguranTertulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('teguran_tertulis.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'isi_teguran' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        TeguranTertulis::create($request->all());
        return redirect()->route('teguran-tertulis.index')->with('success', 'Teguran Tertulis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeguranTertulis $teguranTertulis)
    {
        return view('teguran_tertulis.show', compact('teguranTertulis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeguranTertulis $teguranTertulis)
    {
        $karyawans = Karyawan::all();
        return view('teguran_tertulis.edit', compact('teguranTertulis', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeguranTertulis $teguranTertulis)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'isi_teguran' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        $teguranTertuli->update($request->all());
        return redirect()->route('teguran-tertulis.index')->with('success', 'Teguran Tertulis berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeguranTertulis $teguranTertulis)
    {
        $teguranTertuli->delete();
        return redirect()->route('teguran-tertulis.index')->with('success', 'Teguran Tertulis berhasil dihapus');
    }
}
