@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-sub', 'Selamat datang, ' . date('l') . ' — Pantau sistem perpustakaan Anda')

@section('content')

<!-- Welcome Hero -->
<div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-2xl p-8 mb-8 text-white shadow-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/20 rounded-full blur-2xl"></div>
    
    <div class="relative z-10 flex items-center justify-between">
        <div class="flex-1">
            <h2 class="text-3xl font-semibold mb-2 font-['DM_Serif_Display']">Selamat Pagi, Administrator 👋</h2>
            <p class="text-indigo-100 text-base">Kelola seluruh data perpustakaan sekolah dari satu tempat yang terintegrasi dan mudah digunakan.</p>
        </div>
        <div class="hidden lg:block">
            <svg class="w-32 h-32 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Stat Card - Siswa -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $siswas->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Siswa</div>
            </div>
            <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat Card - Guru -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $gurus->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Guru</div>
            </div>
            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat Card - Buku -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $bukus->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Buku</div>
            </div>
            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat Card - Penulis -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $penuliss->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Penulis</div>
            </div>
            <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536a1 1 0 010 1.414l-8 8a1 1 0 01-.416.577l-5 2a1 1 0 01-1.277-1.277l2-5a1 1 0 01.577-.416l8-8a1 1 0 011.414 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat Card - Penerbit -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $penerbits->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Penerbit</div>
            </div>
            <div class="w-12 h-12 bg-sky-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stat Card - Petugas -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="text-3xl font-bold text-slate-900 mb-1">{{ $petugass->count() ?? 0 }}</div>
                <div class="text-sm text-slate-500">Total Petugas</div>
            </div>
            <div class="w-12 h-12 bg-violet-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Quick Access -->
<h3 class="font-['DM_Serif_Display'] text-lg font-normal text-slate-900 mb-4">Akses Cepat</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Quick Card - Siswa -->
    <a href="/siswa" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-indigo-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center group-hover:bg-indigo-600 transition-colors">
                <svg class="w-5 h-5 text-indigo-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Siswa</h4>
        <p class="text-sm text-slate-500">Kelola data siswa</p>
    </a>

    <!-- Quick Card - Guru -->
    <a href="/guru" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-emerald-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center group-hover:bg-emerald-600 transition-colors">
                <svg class="w-5 h-5 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-emerald-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Guru</h4>
        <p class="text-sm text-slate-500">Kelola data guru</p>
    </a>

    <!-- Quick Card - Buku -->
    <a href="/buku" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-amber-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center group-hover:bg-amber-600 transition-colors">
                <svg class="w-5 h-5 text-amber-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-amber-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Buku</h4>
        <p class="text-sm text-slate-500">Kelola koleksi buku</p>
    </a>

    <!-- Quick Card - Penulis -->
    <a href="/penulis" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-rose-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-rose-100 rounded-xl flex items-center justify-center group-hover:bg-rose-600 transition-colors">
                <svg class="w-5 h-5 text-rose-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536a1 1 0 010 1.414l-8 8a1 1 0 01-.416.577l-5 2a1 1 0 01-1.277-1.277l2-5a1 1 0 01.577-.416l8-8a1 1 0 011.414 0z" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-rose-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Penulis</h4>
        <p class="text-sm text-slate-500">Kelola data penulis</p>
    </a>

    <!-- Quick Card - Penerbit -->
    <a href="/penerbit" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-sky-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-sky-100 rounded-xl flex items-center justify-center group-hover:bg-sky-600 transition-colors">
                <svg class="w-5 h-5 text-sky-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-sky-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Penerbit</h4>
        <p class="text-sm text-slate-500">Kelola data penerbit</p>
    </a>

    <!-- Quick Card - Petugas -->
    <a href="/petugas" class="group bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-lg hover:border-violet-200 transition-all">
        <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-violet-100 rounded-xl flex items-center justify-center group-hover:bg-violet-600 transition-colors">
                <svg class="w-5 h-5 text-violet-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <svg class="w-5 h-5 text-gray-400 group-hover:text-violet-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>
        <h4 class="text-base font-semibold text-slate-900 mb-1">Petugas</h4>
        <p class="text-sm text-slate-500">Kelola data petugas</p>
    </a>
</div>

@endsection