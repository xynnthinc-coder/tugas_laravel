<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Perpustakaan Sekolah</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="min-h-screen bg-gray-100 flex font-['DM_Sans']">

    <!-- ── SIDEBAR ── -->
    <aside class="w-[248px] min-h-screen bg-[#1e1b2e] text-white flex flex-col fixed top-0 left-0 z-[100] shadow-[4px_0_24px_rgba(0,0,0,0.18)] md:w-[72px] lg:w-[248px]">
        <!-- Logo -->
        <div class="px-6 py-7 border-b border-white/8 flex items-center gap-3.5 md:justify-center md:px-0 lg:justify-start lg:px-6">
            <div class="w-11 h-11 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center shadow-[0_4px_14px_rgba(79,70,229,0.4)]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div class="md:hidden lg:block">
                <h1 class="font-['DM_Serif_Display'] text-[1.15rem] font-normal tracking-tight leading-tight">Perpustakaan</h1>
                <p class="text-[0.72rem] text-white/38 uppercase tracking-wider mt-0.5">Sistem Informasi</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-5 overflow-y-auto">
            <!-- Utama Section -->
            <div class="text-[0.65rem] uppercase tracking-widest text-white/28 px-2.5 pt-4 pb-1.5 font-semibold md:hidden lg:block">Utama</div>
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('/') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('/') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1m-4 0h4" />
                </svg>
                <span class="md:hidden lg:inline">Dashboard</span>
            </a>

            <!-- Akademik Section -->
            <div class="text-[0.65rem] uppercase tracking-widest text-white/28 px-2.5 pt-4 pb-1.5 font-semibold md:hidden lg:block">Akademik</div>
            <a href="/siswa" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('siswa*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('siswa*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="md:hidden lg:inline">Siswa</span>
            </a>
            <a href="/guru" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('guru*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('guru*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="md:hidden lg:inline">Guru</span>
            </a>

            <!-- Perpustakaan Section -->
            <div class="text-[0.65rem] uppercase tracking-widest text-white/28 px-2.5 pt-4 pb-1.5 font-semibold md:hidden lg:block">Perpustakaan</div>
            <a href="/buku" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('buku*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('buku*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="md:hidden lg:inline">Buku</span>
            </a>
            <a href="/pinjam" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('pinjam*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('pinjam*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-4 4l4-4-4-4m-10 4l-4 4 4 4" />
                </svg>
                <span class="md:hidden lg:inline">Peminjaman</span>
            </a>
            <a href="/penulis" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('penulis*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('penulis*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.232 5.232l3.536 3.536a1 1 0 010 1.414l-8 8a1 1 0 01-.416.577l-5 2a1 1 0 01-1.277-1.277l2-5a1 1 0 01.577-.416l8-8a1 1 0 011.414 0z" />
                </svg>
                <span class="md:hidden lg:inline">Penulis</span>
            </a>
            <a href="/penerbit" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('penerbit*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('penerbit*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <span class="md:hidden lg:inline">Penerbit</span>
            </a>

            <!-- Operasional Section -->
            <div class="text-[0.65rem] uppercase tracking-widest text-white/28 px-2.5 pt-4 pb-1.5 font-semibold md:hidden lg:block">Operasional</div>
            <a href="/petugas" class="flex items-center gap-3 px-3 py-2.5 rounded-xl mb-0.5 text-white/62 text-sm font-medium transition-all hover:bg-[#2e2a42] hover:text-white {{ request()->is('petugas*') ? 'bg-indigo-500/15 text-white shadow-[inset_3px_0_0_#4f46e5]' : '' }} md:justify-center md:px-2.5 lg:justify-start lg:px-3">
                <svg class="w-[18px] h-[18px] flex-shrink-0 {{ request()->is('petugas*') ? 'opacity-100 text-indigo-600' : 'opacity-70' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span class="md:hidden lg:inline">Petugas</span>
            </a>
        </nav>

        <!-- Footer User -->
        <div class="px-4 py-4 border-t border-white/8">
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl md:justify-center lg:justify-start">
                <div class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center font-semibold text-sm">AD</div>
                <div class="md:hidden lg:block">
                    <p class="text-[0.82rem] text-white/75 font-medium">Admin</p>
                    <span class="text-[0.7rem] text-white/35">Administrator</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- ── MAIN CONTENT ── -->
    <div class="ml-[248px] flex-1 min-h-screen flex flex-col md:ml-[72px] lg:ml-[248px]">
        <!-- Topbar -->
        <header class="bg-white border-b border-gray-200 px-8 py-3.5 flex items-center justify-between sticky top-0 z-50">
            <div>
                <h2 class="font-['DM_Serif_Display'] text-[1.35rem] font-normal text-slate-900">@yield('page-title', 'Dashboard')</h2>
                <p class="text-[0.78rem] text-slate-500 mt-0.5">@yield('page-sub', 'Selamat datang di sistem informasi perpustakaan')</p>
            </div>
            <div class="flex items-center gap-4">
                @yield('topbar-action')
            </div>
        </header>

        <!-- Content Area -->
        <main class="p-8 flex-1">
            @yield('content')
        </main>
    </div>

    <!-- ── TOAST NOTIFICATION ── -->
    @if(session('success'))
    <div id="toast" class="fixed bottom-6 right-6 bg-emerald-500 text-white px-5 py-3.5 rounded-xl shadow-lg flex items-center gap-3 animate-slide-up z-[9999]">
        <div class="w-5 h-5 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(() => document.getElementById('toast')?.remove(), 3200)
    </script>
    @endif

    <!-- ── CONFIRM DELETE MODAL ── -->
    <div id="confirmModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[999] flex items-center justify-center opacity-0 invisible transition-all duration-200">
        <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl transform scale-95 transition-transform duration-200">
            <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h4 class="text-xl font-semibold text-center mb-2">Hapus Data?</h4>
            <p id="confirmMsg" class="text-sm text-gray-600 text-center mb-6">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex gap-3">
                <button onclick="closeModal()" class="flex-1 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors">
                    Batalkan
                </button>
                <button onclick="confirmDelete()" class="flex-1 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold transition-colors">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let _deleteForm = null;

        function openConfirm(form, name) {
            _deleteForm = form;
            document.getElementById('confirmMsg').textContent = `Apakah Anda yakin ingin menghapus "${name}"? Tindakan ini tidak dapat dibatalkan.`;
            const modal = document.getElementById('confirmModal');
            modal.classList.remove('opacity-0', 'invisible');
            modal.querySelector('div').classList.remove('scale-95');
            modal.querySelector('div').classList.add('scale-100');
        }

        function closeModal() {
            const modal = document.getElementById('confirmModal');
            modal.classList.add('opacity-0', 'invisible');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            _deleteForm = null;
        }

        function confirmDelete() {
            if (_deleteForm) _deleteForm.submit();
            closeModal();
        }

        document.getElementById('confirmModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>

    <style>
        @keyframes slide-up {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .animate-slide-up {
            animation: slide-up 0.3s ease-out;
        }
        #confirmModal.opacity-0 {
            pointer-events: none;
        }
        #confirmModal:not(.opacity-0) {
            pointer-events: auto;
        }
    </style>

</body>

</html>
