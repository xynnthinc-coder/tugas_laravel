<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\PinjamDetail;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('penulis', 'penerbit', 'pinjamDetails')->get();
        $penuliss = Penulis::all();
        $penerbits = Penerbit::all();

        return view('buku.index', compact('bukus', 'penuliss', 'penerbits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku'    => 'required|string|max:50|unique:bukus,kode_buku',
            'judul_buku'   => 'required|string|max:255',
            'penulis_id'   => 'required|exists:penuliss,id',
            'penerbit_id'  => 'required|exists:penerbits,id',
            'stok'         => 'required|integer|min:0',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penuliss = Penulis::all();
        $penerbits = Penerbit::all();

        return view('buku.edit', compact('buku', 'penuliss', 'penerbits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku'    => 'required|string|max:50|unique:bukus,kode_buku,' . $id,
            'judul_buku'   => 'required|string|max:255',
            'penulis_id'   => 'required|exists:penuliss,id',
            'penerbit_id'  => 'required|exists:penerbits,id',
            'stok'         => 'required|integer|min:0',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil diupdate!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $judul = $buku->judul_buku;
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus!');
    }

    public function show($id)
    {
        return redirect()->route('siswa.index');
    }
}
