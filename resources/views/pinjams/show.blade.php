@extends('layouts.app')

@section('title', 'Detail Peminjaman')
@section('page-title', 'Detail Peminjaman')
@section('page-sub', 'Informasi lengkap peminjaman buku')

@section('topbar-action')
<a href="{{ route('pinjam.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
    Kembali
</a>
@endsection

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <!-- Status Card -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-5">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Peminjaman #{{ $pinjam->id }}
                        </h3>
                        @if($pinjam->status === 'dipinjam')
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Sedang Dipinjam
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                Sudah Dikembalikan
                            </span>
                        @endif
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        Dicatat pada {{ $pinjam->created_at->format('d M Y H:i') }}
                    </p>
                </div>
                
                <div class="flex gap-2">
                    @if($pinjam->status === 'dipinjam')
                        <a href="{{ route('pinjam.edit', $pinjam->id) }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                        
                        <form method="POST" action="{{ route('pinjam.kembalikan', $pinjam->id) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                    onclick="return confirm('Tandai buku sebagai sudah dikembalikan?')"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Kembalikan
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Info Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Siswa -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-500">Peminjam</h4>
            </div>
            <p class="text-lg font-semibold text-gray-900">{{ $pinjam->siswa->nama }}</p>
            @if($pinjam->siswa->kelas)
                <p class="text-sm text-gray-500">{{ $pinjam->siswa->kelas }}</p>
            @endif
        </div>

        <!-- Petugas -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-500">Petugas</h4>
            </div>
            <p class="text-lg font-semibold text-gray-900">{{ $pinjam->petugas->nama_petugas }}</p>
        </div>

        <!-- Jumlah Buku -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-500">Total Buku</h4>
            </div>
            <p class="text-lg font-semibold text-gray-900">{{ $pinjam->pinjamDetails->count() }} Buku</p>
        </div>
    </div>

    <!-- Tanggal -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Waktu</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Pinjam</label>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $pinjam->tanggal_pinjam->format('d M Y') }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Batas Pengembalian</label>
                    <p class="text-lg font-semibold text-gray-900">
                        {{ $pinjam->tanggal_kembali->format('d M Y') }}
                    </p>
                    @if($pinjam->status === 'dipinjam')
                        @php
                            $daysLeft = now()->diffInDays($pinjam->tanggal_kembali, false);
                        @endphp
                        @if($daysLeft < 0)
                            <span class="inline-block mt-1 text-sm font-medium text-red-600">
                                Terlambat {{ abs($daysLeft) }} hari
                            </span>
                        @elseif($daysLeft <= 3)
                            <span class="inline-block mt-1 text-sm font-medium text-yellow-600">
                                {{ $daysLeft }} hari lagi
                            </span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Buku -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Buku</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerbit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($pinjam->pinjamDetails as $index => $detail)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $detail->buku->judul_buku }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $detail->buku->penulis->nama_penulis ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $detail->buku->penerbit->nama_penerbit ?? '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center">
                            <p class="text-sm text-gray-500">Tidak ada data buku</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection