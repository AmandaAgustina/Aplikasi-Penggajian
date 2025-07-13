<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);
    }
}
