@extends('layouts.app')

@section('title', 'Pengembalian')
@section('page-title', 'Pengembalian Buku')
@section('page-sub', 'Konfirmasi pengembalian untuk menambah stok buku kembali')

@section('topbar-action')
<a href="{{ route('pinjam.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/7 hover:bg-white/10 text-slate-200 rounded-xl text-sm font-medium transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>
@endsection

@section('content')
<div class="max-w-5xl space-y-6">
    <div class="glass-card p-6">
        <div class="flex flex-wrap items-start justify-between gap-5">
            <div>
                <h3 class="text-lg font-semibold text-slate-100">Data Peminjaman</h3>
                <p class="text-sm text-slate-400 mt-1">Pastikan buku yang dikembalikan sesuai daftar.</p>
            </div>
            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $pinjam->status === 'dipinjam' ? 'bg-amber-500/15 text-amber-300' : 'bg-emerald-500/15 text-emerald-300' }}">
                {{ ucfirst($pinjam->status) }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6 text-sm">
            <div class="glass-surface rounded-xl p-4">
                <p class="text-xs uppercase tracking-widest text-slate-400">Siswa</p>
                <p class="mt-1 font-semibold text-slate-100">{{ $pinjam->siswa?->nama ?? '-' }}</p>
            </div>
            <div class="glass-surface rounded-xl p-4">
                <p class="text-xs uppercase tracking-widest text-slate-400">Petugas</p>
                <p class="mt-1 font-semibold text-slate-100">{{ $pinjam->petugas?->nama_petugas ?? '-' }}</p>
            </div>
            <div class="glass-surface rounded-xl p-4">
                <p class="text-xs uppercase tracking-widest text-slate-400">Jatuh Tempo</p>
                <p class="mt-1 font-semibold text-slate-100">
                    {{ $pinjam->tanggal_kembali ? \Carbon\Carbon::parse($pinjam->tanggal_kembali)->format('d M Y') : '-' }}
                </p>
            </div>
        </div>
    </div>

    <div class="glass-card p-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h3 class="text-base font-semibold text-slate-100">Daftar Buku Dipinjam</h3>
                <p class="text-sm text-slate-400">Total: {{ $pinjam->pinjamDetails->count() }} buku</p>
            </div>
            <a href="{{ route('pinjam.show', $pinjam->id) }}" class="text-sm font-semibold text-indigo-300 hover:text-indigo-200">
                Lihat Detail
            </a>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="w-full text-sm">
                <thead class="text-xs text-slate-400 uppercase tracking-wider border-b border-white/10">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Judul Buku</th>
                        <th class="px-4 py-3 text-left">Penulis</th>
                        <th class="px-4 py-3 text-left">Penerbit</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10 text-slate-200">
                    @forelse ($pinjam->pinjamDetails as $i => $detail)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-4 py-3 text-slate-400">{{ $i + 1 }}</td>
                        <td class="px-4 py-3 font-medium text-slate-100">{{ $detail->buku?->judul_buku ?? '-' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $detail->buku?->penulis?->nama_penulis ?? '-' }}</td>
                        <td class="px-4 py-3 text-slate-300">{{ $detail->buku?->penerbit?->nama_penerbit ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-slate-400">Belum ada detail buku.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="glass-card p-6">
        @if ($pinjam->status === 'dikembalikan')
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h3 class="text-base font-semibold text-slate-100">Sudah Dikembalikan</h3>
                <p class="text-sm text-slate-400">Peminjaman ini sudah ditandai sebagai dikembalikan.</p>
            </div>
            <a href="{{ route('pinjam.index') }}" class="inline-flex items-center px-6 py-2.5 bg-white/7 hover:bg-white/10 text-slate-200 rounded-xl text-sm font-semibold transition-colors">
                Kembali ke List
            </a>
        </div>
        @else
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h3 class="text-base font-semibold text-slate-100">Konfirmasi Pengembalian</h3>
                <p class="text-sm text-slate-400">Klik tombol di kanan untuk mengembalikan semua buku dan menambah stok.</p>
            </div>
            <form method="POST" action="{{ route('pinjam.kembalikan', $pinjam->id) }}">
                @csrf
                @method('PATCH')
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition-colors shadow-lg shadow-emerald-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Konfirmasi Dikembalikan
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection

