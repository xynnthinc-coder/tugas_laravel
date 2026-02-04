@extends('layouts.app')

@section('title', 'Tambah Buku')
@section('page-title', 'Tambah Buku')
@section('page-sub', 'Isi formulir berikut untuk menambahkan buku baru ke koleksi')

@section('topbar-action')
<a href="{{ route('buku.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    Kembali
</a>
@endsection

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <!-- Header -->
        <div class="px-8 py-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-slate-900 mb-1">Data Buku Baru</h3>
            <p class="text-sm text-slate-500">Lengkapi semua field yang ditandai dengan <span class="text-red-600">*</span></p>
        </div>

        <!-- Form Body -->
        <div class="p-8">
            <form method="POST" action="{{ route('buku.store') }}" class="space-y-6">
                @csrf
                
                <!-- Kode Buku -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kode Buku <span class="text-red-600">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="kode_buku" 
                        value="{{ old('kode_buku') }}" 
                        placeholder="Contoh: MTK-001" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    >
                    <p class="mt-2 text-xs text-slate-500">Kode unik untuk identifikasi buku di perpustakaan.</p>
                    @error('kode_buku')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Judul Buku -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Judul Buku <span class="text-red-600">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="judul_buku" 
                        value="{{ old('judul_buku') }}" 
                        placeholder="Masukkan judul buku" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    >
                    @error('judul_buku')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Penulis <span class="text-red-600">*</span>
                    </label>
                    <select 
                        name="penulis_id" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    >
                        <option value="">— Pilih Penulis —</option>
                        @foreach ($penuliss as $penulis)
                            <option value="{{ $penulis->id }}" {{ old('penulis_id') == $penulis->id ? 'selected' : '' }}>
                                {{ $penulis->nama_penulis }}
                            </option>
                        @endforeach
                    </select>
                    @error('penulis_id')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Penerbit -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Penerbit <span class="text-red-600">*</span>
                    </label>
                    <select 
                        name="penerbit_id" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    >
                        <option value="">— Pilih Penerbit —</option>
                        @foreach ($penerbits as $penerbit)
                            <option value="{{ $penerbit->id }}" {{ old('penerbit_id') == $penerbit->id ? 'selected' : '' }}>
                                {{ $penerbit->nama_penerbit }}
                            </option>
                        @endforeach
                    </select>
                    @error('penerbit_id')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Stok <span class="text-red-600">*</span>
                    </label>
                    <input 
                        type="number" 
                        name="stok" 
                        value="{{ old('stok') }}" 
                        placeholder="Jumlah stok buku" 
                        min="0" 
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    >
                    @error('stok')
                        <div class="mt-2 flex items-center gap-2 text-sm text-red-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z"/>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-6 border-t border-gray-100">
                    <button 
                        type="submit" 
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-colors"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Buku
                    </button>
                    <a 
                        href="{{ route('buku.index') }}" 
                        class="inline-flex items-center px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors"
                    >
                        Batalkan
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection