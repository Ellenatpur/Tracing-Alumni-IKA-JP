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


        <!-- Navigasi Kanan (Search & Button Daftar) -->
        <div class="flex items-center space-x-5">
            <button type="button" class="text-slate-300 hover:text-white transition-colors p-1" title="Cari">
                <i class="fa-solid fa-magnifying-glass text-lg"></i>
            </button>

            <a href="{{ route('alumni.register', [], false) ?? url('/register-alumni') }}" 
               class="bg-[#4DD0C2] hover:bg-[#3dbcb0] text-[#1E1B4B] font-semibold px-6 py-2 rounded-full text-sm transition-all shadow-sm">
                Daftar
            </a>
        </div>
    </div>
</nav>