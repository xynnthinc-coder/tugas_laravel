<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugass = Petugas::all();
        return view('petugas.index', compact('petugass'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'  => 'required|string|max:255',
            'nama_petugas' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
        ]);

        Petugas::create($request->all());

        return redirect()->back()
            ->with('success', 'Data petugas berhasil ditambahkan!');
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugass = Petugas::all();
        
        return view('petugas.edit', compact('petugas', 'petugass'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'nip'  => 'required|string|max:255',
            'nama_petugas' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('petugas.index')
            ->with('success', 'Data petugas berhasil diupdate!');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $nama = $petugas->Nama_petugas;
        $petugas->delete();

        return redirect()->route('petugas.index')
            ->with('success', "Data petugas {$nama} berhasil dihapus!");
    }
}
