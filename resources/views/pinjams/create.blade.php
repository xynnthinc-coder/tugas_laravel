@extends('layouts.app')

@section('title', 'Tambah Peminjaman')
@section('page-title', 'Tambah Peminjaman')
@section('page-sub', 'Isi formulir berikut untuk mencatat peminjaman buku')

@section('topbar-action')
<a href="{{ route('pinjam.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    Kembali
</a>
@endsection

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-slate-900 mb-1">Form Peminjaman</h3>
            <p class="text-sm text-slate-500">Pastikan buku tersedia sebelum menyimpan data peminjaman.</p>
        </div>
        <div class="p-8">
            <form method="POST" action="{{ route('pinjam.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Siswa <span class="text-red-600">*</span></label>
                    <select name="siswa_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Pilih siswa</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                    <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Buku <span class="text-red-600">*</span></label>
                    <select name="buku_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Pilih buku</option>
                        @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ old('buku_id') == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul_buku }}
                        </option>
                        @endforeach
                    </select>
                    @error('buku_id')
                    <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Petugas <span class="text-red-600">*</span></label>
                    <select name="petugas_id" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Pilih petugas</option>
                        @foreach ($petugass as $petugas)
                        <option value="{{ $petugas->id }}" {{ old('petugas_id') == $petugas->id ? 'selected' : '' }}>
                            {{ $petugas->nama_petugas }}
                        </option>
                        @endforeach
                    </select>
                    @error('petugas_id')
                    <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Pinjam <span class="text-red-600">*</span></label>
                        <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tanggal_pinjam')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                            </svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Kembali <span class="text-red-600">*</span></label>
                        <input type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('tanggal_kembali')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                            </svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Status <span class="text-red-600">*</span></label>
                    <select name="status" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="dipinjam" {{ old('status', 'dipinjam') === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ old('status') === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                    @error('status')
                    <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="flex gap-3 pt-6 border-t border-gray-100">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Peminjaman
                    </button>
                    <a href="{{ route('pinjam.index') }}" class="inline-flex items-center px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">
                        Batalkan
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
