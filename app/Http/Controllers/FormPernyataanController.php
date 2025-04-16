<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPernyataan;
use App\Models\Karyawan;

class FormPernyataanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formPernyataans = FormPernyataan::with('karyawan')->get();
        return view('form_pernyataans.index', compact('formPernyataans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('form_pernyataans.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'isi_pernyataan' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        FormPernyataan::create($request->all());
        return redirect()->route('form-pernyataans.index')->with('success', 'Form Pernyataan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormPernyataan $formPernyataan)
    {
        return view('form_pernyataans.show', compact('formPernyataan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormPernyataan $formPernyataan)
    {
        $karyawans = Karyawan::all();
        return view('form_pernyataans.edit', compact('formPernyataan', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormPernyataan $formPernyataan)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'isi_pernyataan' => 'required|string',
            'ditandatangani_oleh' => 'required|string|max:255',
        ]);

        $formPernyataan->update($request->all());
        return redirect()->route('form-pernyataans.index')->with('success', 'Form Pernyataan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormPernyataan $formPernyataan)
    {
        $formPernyataan->delete();
        return redirect()->route('form-pernyataans.index')->with('success', 'Form Pernyataan berhasil dihapus');
    }
}
