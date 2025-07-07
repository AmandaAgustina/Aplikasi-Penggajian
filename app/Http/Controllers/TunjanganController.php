<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tunjangan = Tunjangan::all();
        return view('pages.master.tunjangan.tunjangan', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master.tunjangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nominal' => 'required',
        ]);

        Tunjangan::create($request->all());

        return redirect()->route('tunjangan.index')->with('success', 'Tunjangan created successfully.');
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
        $tunjangan = Tunjangan::findOrFail($id);
        return view('pages.master.tunjangan.edit', compact('tunjangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nominal' => 'required',
        ]);

        $tunjangan = Tunjangan::findOrFail($id);
        $tunjangan->update($request->all());

        return redirect()->route('tunjangan.index')->with('success', 'Tunjangan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tunjangan = Tunjangan::findOrFail($id);
        $tunjangan->delete();

        return redirect()->route('tunjangan.index')->with('success', 'Tunjangan deleted successfully.');
    }
}
