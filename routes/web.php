<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JarakSKSController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PenjadwalanController;
use App\Http\Controllers\TunjanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');

    //data dosen
    Route::resource('/data-dosen', DosenController::class)->names('dosen');

    //matkul
    Route::resource('/data-matkul', MatkulController::class)->names('matkul');

    //jarakdansks
    Route::resource('/jarak-dan-sks', JarakSKSController::class)->names('jaraksks');

    //tunjangan
    Route::resource('/tunjangan', TunjanganController::class)->names('tunjangan');

    //penjadwalan
    Route::get('/penjadwalan', [PenjadwalanController::class, 'index'])->name('penjadwalan.index');
    Route::get('/penjadwalan/{dosen_id}/create', [PenjadwalanController::class, 'create'])->name('penjadwalan.create');
    Route::post('/penjadwalan/store', [PenjadwalanController::class, 'store'])->name('penjadwalan.store');

    //absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('/absensi/import', [AbsensiController::class, 'import'])->name('absensi.import');
});



//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.authenticate');

//register
Route::get('/register', [LoginController::class, 'register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'store'])->name('auth.store');

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');