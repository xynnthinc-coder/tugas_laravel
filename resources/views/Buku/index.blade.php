@extends('layouts.app')

@section('title', 'Data buku')

@section('content')
<section class="w-full bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10 rounded-3xl shadow-xl border-gray-100 p-6 overflow-hidden mx-auto">
    <div class="max-w-3xl items-center mx-auto my-10 text-center">
        <h1 class="text-5xl font-bold text-blue-600">Sistem Manajemen Data buku</h1>
        <p class="text-lg mt-2 text-gray-600 font-normal">Kelola data buku dengan mudah dan efisien dengan integritas tinggi</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Form Tambah buku -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-purple-500 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah buku Baru
                </h2>
            </div>

            <form method="POST" action="{{ route('buku.store') }}" class="p-6 space-y-4">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Kode Buku
                    </label>
                    <input name="kode_buku" placeholder="Contoh: MTK-001, BING-091" required
                        class="border border-gray-300 p-3 w-full rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    @error('kode_buku')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Judul Buku
                    </label>
                    <input name="judul_buku" placeholder="Masukkan judul buku" required
                        class="border border-gray-300 p-3 w-full rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    @error('judul_buku')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Penulis
                    </label>
                    <select name="penulis_id" required
                        class="border border-gray-300 p-3 w-full rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white">
                        <option value="">Pilih Penulis</option>
                        @foreach ($penuliss as $penulis)
                        <option value="{{ $penulis->id }}">
                            {{ $penulis->nama_penulis }}
                        </option>
                        @endforeach
                    </select>
                    @error('penulis_id')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Penerbit
                    </label>
                    <select name="penerbit_id" required
                        class="border border-gray-300 p-3 w-full rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all bg-white">
                        <option value="">Pilih Penerbit</option>
                        @foreach ($penerbits as $penerbit)
                        <option value="{{ $penerbit->id }}">
                            {{ $penerbit->nama_penerbit }}
                        </option>
                        @endforeach
                    </select>
                    @error('penerbit_id')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                 <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Stok Buku
                    </label>
                    <input type="number" name="stok" placeholder="Masukkan Stok Buku" required
                        class="border border-gray-300 p-3 w-full rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                    @error('stok')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>                

                <button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white w-full py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Simpan Data buku
                </button>
            </form>
        </div>

        <!-- List Data buku -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl shadow-xl border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-purple-500 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"></path>
                    </svg>
                    Data buku ({{ $bukus->count() }})
                </h2>
            </div>
            
            <div class="p-6 space-y-3 max-h-[600px] overflow-y-auto">
                @forelse ($bukus as $buku)
                <div class="group border border-gray-200 hover:border-purple-300 rounded-xl p-4 transition-all duration-300 hover:shadow-lg bg-gradient-to-br from-white to-gray-50">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                                    {{ strtoupper(substr($buku->judul_buku, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 group-hover:text-purple-600 transition-colors">
                                        {{ $buku->judul_buku }}
                                    </p>
                                    <p class="text-sm text-gray-500 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        {{ $buku->kode_buku }}
                                    </p>
                                </div>
                            </div>

                            <div class="ml-13 pl-4 border-l-2 border-purple-200">
                                <p class="text-xs text-gray-500 mb-1">Penulis & Penerbit:</p>
                                <p class="text-sm font-medium text-gray-700">
                                    {{ $buku->penulis->nama_penulis }}
                                </p>
                                <p class="text-xs text-purple-600 font-medium">
                                    {{ $buku->penerbit->nama_penerbit }}
                                </p>
                            </div>

                            <div class="ml-13 pl-4 border-l-2 border-purple-200 mt-2">
                                <p class="text-sm text-gray-500 mb-1">Stok:</p>
                                <p class="text-md font-medium text-gray-700">
                                    {{ $buku->stok }}
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <!-- Tombol Edit -->
                            <a href="{{ route('buku.edit', $buku->id) }}" 
                               class="w-8 h-8 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors flex items-center justify-center"
                               title="Edit data buku">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            
                            <!-- Tombol Delete - DIPERBAIKI -->
                            <form method="POST" action="{{ route('buku.destroy', $buku->id) }}" 
                                  onsubmit="return confirm('Yakin ingin menghapus data {{ $buku->judul_buku }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors flex items-center justify-center"
                                        title="Hapus data buku">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-gray-500 font-medium">Belum ada data buku</p>
                    <p class="text-sm text-gray-400">Tambahkan buku baru menggunakan form di samping</p>
                </div>
                @endforelse
            </div>
        </div>
        </div>
    </div>
</section>

@if(session('success'))
<div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
    {{ session('success') }}
</div>
@endif
@endsection