<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JarakSKS;
use App\Models\Penggajian;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    public function index()
    {
        return view('pages.penggajian.penggajian', [
            'dosens' => Dosen::all(),
            'tunjangans' => Tunjangan::all(),
            'jarak_sks' => JarakSKS::first(),
            'penggajians' => Penggajian::get()->map(function ($item) {
                return $item->dosen_id . '-' . $item->tunjangan_id;
            })->toArray()
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|integer',
            'tunjangan_id' => 'required|integer',
            'checked' => 'required|boolean',
        ]);

        if ($validated['checked']) {
            Penggajian::firstOrCreate([
                'dosen_id' => $validated['dosen_id'],
                'tunjangan_id' => $validated['tunjangan_id'],
            ]);
        } else {
            Penggajian::where([
                'dosen_id' => $validated['dosen_id'],
                'tunjangan_id' => $validated['tunjangan_id'],
            ])->delete();
        }

        return response()->json(['message' => 'Penggajian updated']);
    }
}
