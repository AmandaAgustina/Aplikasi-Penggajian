<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matkul = Matkul::all();
        return view('pages.master.matkul.matkul', compact('matkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master.matkul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'kelas' => 'required',
            'type' => 'required',
            'jam' => 'required',
        ]);

        Matkul::create($request->all());

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('pages.master.matkul.edit', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'semester' => 'required',
            'kelas' => 'required',
            'type' => 'required',
            'jam' => 'required',
        ]);

        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
