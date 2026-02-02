<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index() {
        $penerbits = Penerbit::all();
        $bukus = Buku::all();

        return view('penerbit.index', compact('penerbits', 'bukus'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_penerbit' => 'required|string|max:255',
            'alamat'        => 'required|string|max:500',
            'isbn'          => 'required|string|max:20|unique:penerbits,isbn',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')
            ->with('success', 'Data penerbit berhasil ditambahkan!');
    }

    public function edit($id) {
        $penerbit = Penerbit::findOrFail($id);
        $bukus = Buku::all();

        return view('penerbit.edit', compact('penerbit', 'bukus'));
    }

    public function update(Request $request, $id) {
         $request->validate([
            'nama_penerbit' => 'required|string|max:255',
            'alamat'        => 'required|string|max:500',
            'isbn'          => 'required|string|max:20|unique:penerbits,isbn',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')
            ->with('success', 'Data penerbit berhasil diupdate!');
    }

    public function destroy($id) {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')
            ->with('success', 'Data penerbit berhasil dihapus!');
    }

    public function show($id) {
        return redirect()->route('penerbit.index');
    }
}
