<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'mapel' => 'required|string|max:100',
        ]);

        Guru::create($request->all());

        return redirect()->back()
            ->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $gurus = Guru::all();
        
        return view('guru.edit', compact('guru', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'mapel' => 'required|string|max:100',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $nama = $guru->nama;
        $guru->delete();

        return redirect()->route('guru.index')
            ->with('success', "Data guru {$nama} berhasil dihapus!");
    }
}