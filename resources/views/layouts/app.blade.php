<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="w-full py-6 px-4">
        <div class="max-w-7xl mx-auto relative">
            <div class="bg-white/90 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-pink-500/10"></div>
                
                <div class="relative px-6 md:px-8 py-5 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="font-bold text-lg md:text-xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Manajemen Data
                            </h1>
                            <p class="text-xs text-gray-500 hidden md:block">Sistem Informasi Sekolah</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 md:gap-3">
                        <a href="/" 
                           class="group relative px-4 md:px-6 py-2.5 text-sm md:text-base font-medium text-gray-700 hover:text-blue-600 transition-all duration-300 rounded-xl hover:bg-blue-50">
                            <span class="relative z-10">Siswa</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-3/4 transition-all duration-300"></div>
                        </a>
                        
                        <a href="/guru" 
                           class="group relative px-4 md:px-6 py-2.5 text-sm md:text-base font-medium text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-xl hover:bg-purple-50">
                            <span class="relative z-10">Guru</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-purple-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-purple-600 to-pink-600 group-hover:w-3/4 transition-all duration-300"></div>
                        </a>

                        <a href="/buku" 
                           class="group relative px-4 md:px-6 py-2.5 text-sm md:text-base font-medium text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-xl hover:bg-purple-50">
                            <span class="relative z-10">Buku</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-purple-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-purple-600 to-pink-600 group-hover:w-3/4 transition-all duration-300"></div>
                        </a>

                        <a href="/penulis" 
                           class="group relative px-4 md:px-6 py-2.5 text-sm md:text-base font-medium text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-xl hover:bg-purple-50">
                            <span class="relative z-10">Penulis</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-purple-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-purple-600 to-pink-600 group-hover:w-3/4 transition-all duration-300"></div>
                        </a>

                        <a href="/penerbit" 
                           class="group relative px-4 md:px-6 py-2.5 text-sm md:text-base font-medium text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-xl hover:bg-purple-50">
                            <span class="relative z-10">Penerbit</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-purple-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-purple-600 to-pink-600 group-hover:w-3/4 transition-all duration-300"></div>
                        </a>

                        <button class="ml-2 w-9 h-9 md:w-10 md:h-10 bg-gradient-to-br from-gray-100 to-gray-200 hover:from-blue-50 hover:to-purple-50 rounded-xl flex items-center justify-center transition-all duration-300 hover:shadow-lg group">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pb-10">
        @yield('content')
    </main>
</body>
</html>