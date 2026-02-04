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
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;
use App\Models\Petugas;

// Dashboard route - menampilkan welcome page dengan statistik
Route::get('/', function () {
    return view('welcome', [
        'siswas' => Siswa::all(),
        'gurus' => Guru::all(),
        'bukus' => Buku::all(),
        'penuliss' => Penulis::all(),
        'penerbits' => Penerbit::all(),
        'petugass' => Petugas::all(),
    ]);
})->name('dashboard');

// Resource route untuk Siswa
Route::resource('siswa', SiswaController::class);

// Resource route untuk Guru  
Route::resource('guru', GuruController::class);

// Resource route untuk Buku
Route::resource('buku', BukuController::class);

// Resource route untuk Penulis
Route::resource('penulis', PenulisController::class);

// Resource route untuk Penerbit
Route::resource('penerbit', PenerbitController::class);

// Resource route untuk Petugas
Route::resource('petugas', PetugasController::class);

// Resource route untuk Pinjam
Route::resource('pinjam', PinjamController::class);

Route::get('pinjam/{pinjam}/pengembalian', [PinjamController::class, 'pengembalian'])->name('pinjam.pengembalian');
Route::patch('pinjam/{pinjam}/kembalikan', [PinjamController::class, 'kembalikan'])->name('pinjam.kembalikan');

// Resource route untuk Pinjam Detail
Route::resource('pinjamdetail', PinjamDetailController::class);
