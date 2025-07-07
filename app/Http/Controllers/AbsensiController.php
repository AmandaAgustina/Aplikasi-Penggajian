<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Menampilkan halaman absensi
    public function index()
    {
        $absensis = Absensi::all();
        return view('pages.absensi.absensi', compact('absensis'));
    }

    // Import file Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new AbsensiImport, $request->file('file'));

        return redirect()->route('absensi')->with('success', 'Data absensi berhasil diimpor!');
    }
}
