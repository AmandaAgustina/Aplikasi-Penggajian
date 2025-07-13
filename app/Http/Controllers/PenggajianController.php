<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JarakSKS;
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
        ]);
    }
}
