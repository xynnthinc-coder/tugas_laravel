<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('guru')->get();
        $gurus  = Guru::all();

        return view('siswa.index', compact('siswas', 'gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'kelas'   => 'required|string|max:10',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $gurus = Guru::all();

        return view('siswa.edit', compact('siswa', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'kelas'   => 'required|string|max:10',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $nama = $siswa->nama;
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', "Data siswa {$nama} berhasil dihapus!");
    }

    public function show($id)
    {
        // Redirect ke index karena tidak ada halaman detail
        return redirect()->route('siswa.index');
    }
}