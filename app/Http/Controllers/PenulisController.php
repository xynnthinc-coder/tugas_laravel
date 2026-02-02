<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $penuliss = Penulis::all();
        $bukus = Buku::all();

        return view('penulis.index', compact('penuliss', 'bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penulis' => 'required|string|max:255',
            'no_telp'      => 'required|string|max:20',
        ]);

        Penulis::create($request->all());

        return redirect()->route('penulis.index')
            ->with('success', 'Data penulis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        $bukus = Buku::all();

        return view('penulis.edit', compact('penulis', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penulis' => 'required|string|max:255',
            'no_telp'      => 'required|string|max:20',
        ]);

        $penulis = Penulis::findOrFail($id);
        $penulis->update($request->all());

        return redirect()->route('penulis.index')
            ->with('success', 'Data penulis berhasil diupdate!');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index')
            ->with('success', 'Data penulis berhasil dihapus!');
    }

    public function show($id)
    {
        return redirect()->route('penulis.index');
    }
}
