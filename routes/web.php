<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PinjamDetailController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return redirect()->route('siswa.index');
});

// Resource route untuk Siswa
Route::resource('siswa', SiswaController::class);

// Resource route untuk Guru  
Route::resource('guru', GuruController::class);

// Resource route untuk Buku
Route::resource('buku', BukuController::class);

// Resource route untuk Penulis
Route::resource('penulis', PenulisController::class);

//Resource route untuk Penerbit
Route::resource('penerbit', PenerbitController::class);

//Resource route untuk Petugas
Route::resource('petugas', PetugasController::class);

//Resource route untuk Pinjam
Route::resource('pinjam', PinjamController::class);

//Resource route untuk Pinjam Detail
Route::resource('pinjamdetail', PinjamDetailController::class);
