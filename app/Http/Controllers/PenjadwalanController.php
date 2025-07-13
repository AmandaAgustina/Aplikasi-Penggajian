<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\JadwalDosen;
use Illuminate\Http\Request;

class PenjadwalanController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('pages.penjadwalan.penjadwalan', compact('dosens'));
    }

    public function create($dosen_id)
    {
        $dosen = Dosen::findOrFail($dosen_id);
        $matkuls = Matkul::all();
        $jadwals = JadwalDosen::with('matkul')->where('dosen_id', $dosen_id)->get();

        return view('pages.penjadwalan.create', compact('dosen', 'matkuls', 'jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required',
            'matkul_id' => 'required',
        ]);

        JadwalDosen::create([
            'dosen_id' => $request->dosen_id,
            'matkul_id' => $request->matkul_id,
        ]);

        return redirect()->route('penjadwalan.create', $request->dosen_id)->with('success', 'Jadwal ditambahkan.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDosen::find($id);
        if ($jadwal) {
            $jadwal->delete();
            return back()->with('success', 'Jadwal berhasil dihapus.');
        }

        return back()->with('error', 'Jadwal tidak ditemukan.');
    }
}
