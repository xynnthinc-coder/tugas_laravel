@extends('layouts.app')
@section('title', 'Tambah Penulis')
@section('page-title', 'Tambah Penulis')
@section('page-sub', 'Isi formulir berikut untuk menambahkan penulis baru')
@section('topbar-action')
<a href="{{ route('penulis.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>Kembali</a>
@endsection
@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="px-8 py-6 border-b border-gray-100">
            <h3 class="text-xl font-semibold text-slate-900 mb-1">Data Penulis Baru</h3>
            <p class="text-sm text-slate-500">Lengkapi semua field yang ditandai dengan <span class="text-red-600">*</span></p>
        </div>
        <div class="p-8">
            <form method="POST" action="{{ route('penulis.store') }}" class="space-y-6">@csrf
                <div><label class="block text-sm font-medium text-slate-700 mb-2">Nama Penulis <span class="text-red-600">*</span></label>
                    <input type="text" name="nama_penulis" value="{{ old('nama_penulis') }}" placeholder="Masukkan nama penulis" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('nama_penulis')<div class="mt-2 flex items-center gap-2 text-sm text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>{{ $message }}</div>@enderror
                </div>
                <div><label class="block text-sm font-medium text-slate-700 mb-2">No. Telepon <span class="text-red-600">*</span></label>
                    <input type="text" name="no_telp" value="{{ old('no_telp') }}" placeholder="Contoh: 081234567890" required class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('no_telp')<div class="mt-2 flex items-center gap-2 text-sm text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9.303 3.376a12 12 0 11-15.94-15.94 12 12 0 0115.94 15.94z" />
                        </svg>{{ $message }}</div>@enderror
                </div>
                <div class="flex gap-3 pt-6 border-t border-gray-100"><button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Simpan Penulis</button><a href="{{ route('penulis.index') }}" class="inline-flex items-center px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">Batalkan</a></div>
            </form>
        </div>
    </div>
</div>
@endsection