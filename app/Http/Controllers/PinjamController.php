<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Petugas;
use App\Models\Pinjam;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with(['siswa', 'petugas', 'pinjamDetails.buku'])
            ->latest()
            ->get();

        return view('pinjams.index', compact('pinjams'));
    }

    public function create()
    {
        $siswas = Siswa::orderBy('nama')->get();
        $bukus = Buku::where('stok', '>', 0)->orderBy('judul_buku')->get();
        $petugass = Petugas::orderBy('nama_petugas')->get();

        return view('pinjams.create', compact('siswas', 'bukus', 'petugass'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'petugas_id' => 'required|exists:petugass,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'buku_ids' => 'required|array|min:1',
            'buku_ids.*' => 'exists:bukus,id',
        ], [
            'buku_ids.required' => 'Pilih minimal satu buku untuk dipinjam.',
            'buku_ids.*.exists' => 'Salah satu buku yang dipilih tidak valid.',
        ]);

        DB::transaction(function () use ($validated) {
            // Buat record peminjaman tanpa buku_id
            $pinjam = Pinjam::create([
                'siswa_id' => $validated['siswa_id'],
                'petugas_id' => $validated['petugas_id'],
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_kembali' => $validated['tanggal_kembali'],
                'status' => 'dipinjam',
            ]);

            // Tambahkan detail buku dan kurangi stok
            foreach ($validated['buku_ids'] as $bukuId) {
                $buku = Buku::findOrFail($bukuId);
                
                if ($buku->stok < 1) {
                    throw new \Exception("Stok buku '{$buku->judul_buku}' tidak mencukupi.");
                }

                $pinjam->pinjamDetails()->create(['buku_id' => $bukuId]);
                $buku->decrement('stok');
            }
        });

        return redirect()->route('pinjam.index')
            ->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pinjam = Pinjam::with([
            'siswa',
            'petugas',
            'pinjamDetails.buku.penulis',
            'pinjamDetails.buku.penerbit',
        ])->findOrFail($id);

        return view('pinjams.show', compact('pinjam'));
    }

    public function edit($id)
    {
        $pinjam = Pinjam::with('pinjamDetails')->findOrFail($id);
        
        if ($pinjam->status === 'dikembalikan') {
            return redirect()->route('pinjam.show', $pinjam)
                ->with('error', 'Tidak dapat mengedit peminjaman yang sudah dikembalikan.');
        }

        $siswas = Siswa::orderBy('nama')->get();
        $bukus = Buku::orderBy('judul_buku')->get();
        $petugass = Petugas::orderBy('nama_petugas')->get();

        return view('pinjams.edit', compact('pinjam', 'siswas', 'bukus', 'petugass'));
    }

    public function update(Request $request, $id)
    {
        $pinjam = Pinjam::with('pinjamDetails')->findOrFail($id);

        if ($pinjam->status === 'dikembalikan') {
            return redirect()->route('pinjam.show', $pinjam)
                ->with('error', 'Tidak dapat mengedit peminjaman yang sudah dikembalikan.');
        }

        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'petugas_id' => 'required|exists:petugass,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'buku_ids' => 'required|array|min:1',
            'buku_ids.*' => 'exists:bukus,id',
        ]);

        DB::transaction(function () use ($pinjam, $validated) {
            // Kembalikan stok buku lama
            foreach ($pinjam->pinjamDetails as $detail) {
                $detail->buku->increment('stok');
            }

            // Hapus detail lama
            $pinjam->pinjamDetails()->delete();

            // Update data peminjaman
            $pinjam->update([
                'siswa_id' => $validated['siswa_id'],
                'petugas_id' => $validated['petugas_id'],
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_kembali' => $validated['tanggal_kembali'],
            ]);

            // Tambahkan detail baru dan kurangi stok
            foreach ($validated['buku_ids'] as $bukuId) {
                $buku = Buku::findOrFail($bukuId);
                
                if ($buku->stok < 1) {
                    throw new \Exception("Stok buku '{$buku->judul_buku}' tidak mencukupi.");
                }

                $pinjam->pinjamDetails()->create(['buku_id' => $bukuId]);
                $buku->decrement('stok');
            }
        });

        return redirect()->route('pinjam.index')
            ->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pinjam = Pinjam::with('pinjamDetails')->findOrFail($id);

        DB::transaction(function () use ($pinjam) {
            // Kembalikan stok jika masih dipinjam
            if ($pinjam->status === 'dipinjam') {
                foreach ($pinjam->pinjamDetails as $detail) {
                    $detail->buku->increment('stok');
                }
            }

            $pinjam->delete();
        });

        return redirect()->route('pinjam.index')
            ->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function kembalikan($id)
    {
        $pinjam = Pinjam::with('pinjamDetails')->findOrFail($id);

        if ($pinjam->status === 'dikembalikan') {
            return redirect()->route('pinjam.show', $pinjam)
                ->with('info', 'Buku sudah dikembalikan sebelumnya.');
        }

        DB::transaction(function () use ($pinjam) {
            $pinjam->update([
                'status' => 'dikembalikan',
                'tanggal_kembali' => now(),
            ]);

            // Kembalikan stok semua buku
            foreach ($pinjam->pinjamDetails as $detail) {
                $detail->buku->increment('stok');
            }
        });

        return redirect()->route('pinjam.show', $pinjam)
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}