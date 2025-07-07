<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function daftarMahasiswa()
    {
        return view('pages.daftar-mahasiswa');
    }
    public function nilaiKeseluruhan()
    {
        return view('pages.nilai-keseluruhan');
    }
    public function nilai()
    {
        return view('pages.nilai');
    }
}
