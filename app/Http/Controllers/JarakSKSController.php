<?php

namespace App\Http\Controllers;

use App\Models\JarakSKS;
use Illuminate\Http\Request;

class JarakSKSController extends Controller
{
    public function index()
    {
        $jaraksks = JarakSKS::all();
        return view('pages.master.jaraksks.jaraksks', compact('jaraksks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master.jaraksks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'harga_jarak' => 'required',
            'harga_sks' => 'required',
        ]);

        JarakSKS::create($request->all());

        return redirect()->route('jaraksks.index')->with('success', 'Jarak dan SKS created successfully.');
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
        $jaraksks = JarakSKS::findOrFail($id);
        return view('pages.master.jaraksks.edit', compact('jaraksks'));
    }

    /**
     * Update the specified resource in storage.  
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'harga_jarak' => 'required',
            'harga_sks' => 'required',
        ]);

        $jaraksks = JarakSKS::findOrFail($id);
        $jaraksks->update($request->all());

        return redirect()->route('jaraksks.index')->with('success', 'Jarak dan SKS updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
