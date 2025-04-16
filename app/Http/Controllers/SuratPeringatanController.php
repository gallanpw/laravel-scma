<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPeringatan;
use App\Models\Karyawan;

class SuratPeringatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratPeringatans = SuratPeringatan::with('karyawan')->get();
        return view('surat_peringatans.index', compact('suratPeringatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('surat_peringatans.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tingkat' => 'required|integer|in:1,2,3',
            'tanggal' => 'required|date',
            'isi_sp' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        SuratPeringatan::create($request->all());
        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratPeringatan $suratPeringatan)
    {
        return view('surat_peringatans.show', compact('suratPeringatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPeringatan $suratPeringatan)
    {
        $karyawans = Karyawan::all();
        return view('surat_peringatans.edit', compact('suratPeringatan', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratPeringatan $suratPeringatan)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tingkat' => 'required|integer|in:1,2,3',
            'tanggal' => 'required|date',
            'isi_sp' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        $suratPeringatan->update($request->all());
        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratPeringatan $suratPeringatan)
    {
        $suratPeringatan->delete();
        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil dihapus');
    }
}
