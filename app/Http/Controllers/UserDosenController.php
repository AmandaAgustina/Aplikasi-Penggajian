<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JarakSKS;
use App\Models\Penggajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserDosenController extends Controller
{
    /**
     * Display the Dosen index page.
     */
    public function dosenIndex()
    {
        return view('pages.penggajian.gaji-dosen', [
            'dosens' => Dosen::where('user_id', Auth::id())->get(),
            'tunjangans' => \App\Models\Tunjangan::all(),
            'jarak_sks' => \App\Models\JarakSKS::first(),
            'tunjangan_tersedia' => Penggajian::where('dosen_id', Dosen::where('user_id', Auth::id())->first()->id)->with('tunjangan')
                ->get(),
        ]);
    }

    public function exportPdf()
    {
        $dosens = Dosen::where('user_id', Auth::id())->with(['jadwalDosen'])->get();

        $tunjangan_tersedia = Penggajian::with('tunjangan')->get();

        $jarak = JarakSKS::first();

        $jarak_sks = (object)[
            'harga_jarak' => $jarak->harga_jarak,
            'harga_sks_teori' => $jarak->harga_sks_teori,
            'harga_sks_praktik' => $jarak->harga_sks_praktik,
        ];

        $pdf = Pdf::loadView('pdf.gaji', compact('dosens', 'tunjangan_tersedia', 'jarak_sks'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('slip-gaji.pdf');
    }
}
