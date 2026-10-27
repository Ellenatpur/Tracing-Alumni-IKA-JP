<nav class="bg-[#2B1B40] text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Logo Brand -->
        <div class="flex items-center space-x-3">
            <a href="{{ url('/') }}" class="text-3xl font-extrabold tracking-wider text-white">
                LOGO
            </a>
        </div>

        <!-- Menu Navigasi Tengah -->
        <!-- Navigasi Manual -->
<div class="hidden md:flex items-center space-x-8 text-sm font-medium">
    <!-- Mengarah ke Homepage -->
    <a href="{{ route('home') }}" class="text-white hover:text-cyan-300 transition-colors">Beranda</a>

    <!-- Mengarah ke Halaman Alumni (tracer.blade.php) -->
    <a href="{{ route('tracer') }}" class="text-slate-300 hover:text-white transition-colors">Alumni</a>

    <!-- Mengarah ke Halaman Berita -->
    <a href="{{ route('berita') }}" class="text-slate-300 hover:text-white transition-colors">Berita</a>

    <!-- Mengarah ke Halaman Lowongan -->
    <a href="{{ route('jobs') }}" class="text-slate-300 hover:text-white transition-colors">Lowongan</a>
</div>

<!-- Tombol Daftar -->


        <!-- Navigasi Kanan (Search & Auth Buttons) -->
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" 
                   class="bg-[#4DD0C2] hover:bg-[#3dbcb0] text-[#1E1B4B] font-bold px-5 py-2 rounded-full text-xs sm:text-sm transition-all shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-chart-pie text-xs"></i>
                    <span>Dashboard ({{ auth()->user()->name }})</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="text-slate-300 hover:text-white font-medium text-xs sm:text-sm transition-colors px-2 py-1">
                    Masuk
                </a>
                <a href="{{ route('alumni.register') }}" 
                   class="bg-[#4DD0C2] hover:bg-[#3dbcb0] text-[#1E1B4B] font-semibold px-5 py-2 rounded-full text-xs sm:text-sm transition-all shadow-sm">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</nav>