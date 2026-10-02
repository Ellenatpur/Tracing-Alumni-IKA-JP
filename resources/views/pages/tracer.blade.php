<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alumni - Tracer Study</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR HEADER -->
    <x-navbar />

    <!-- KONTEN UTAMA -->
    <main class="grow max-w-7xl w-full mx-auto px-6 sm:px-10 py-10">
        <!-- Header Judul & Subjudul -->
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#1E1B4B] tracking-tight">
                Daftar Alumni
            </h1>
            <p class="text-slate-500 text-sm sm:text-base mt-2">
                Temukan alumni berdasarkan jurusan, tahun, atau kata kunci
            </p>
        </div>

        <!-- Form Pencarian & Filter -->
        <form action="{{ url('/tracer') }}" method="GET" class="space-y-4 mb-10">
            <!-- Search Bar + Button -->
            <div class="flex items-center gap-3 max-w-4xl">
                <div class="relative grow">
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}"
                           placeholder="Cari nama, jurusan, atau pekerjaan....." 
                           class="w-full px-5 py-3.5 bg-white rounded-xl text-sm text-slate-700 placeholder-slate-400 border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] transition-all">
                </div>
                <button type="submit" 
                        class="bg-[#314E6E] hover:bg-[#253d57] text-white px-5 py-3.5 rounded-xl transition-colors flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-magnifying-glass text-base"></i>
                </button>
            </div>

            <!-- Filter Dropdowns -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Dropdown Jurusan -->
                <div class="relative">
                    <select name="jurusan" class="appearance-none bg-white border border-slate-300 rounded-xl px-5 py-2.5 pr-10 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] cursor-pointer">
                        <option value="">Jurusan</option>
                        <option value="PPLG" {{ request('jurusan') == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                        <option value="Teknik Informatika" {{ request('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ request('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Teknik Elektro" {{ request('jurusan') == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                        <option value="Manajemen" {{ request('jurusan') == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                </div>

                <!-- Dropdown Tahun Lulus -->
                <div class="relative">
                    <select name="tahun_lulus" class="appearance-none bg-white border border-slate-300 rounded-xl px-5 py-2.5 pr-10 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] cursor-pointer">
                        <option value="">Tahun Lulus</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                            <option value="{{ $year }}" {{ request('tahun_lulus') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor 
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                </div>

                <!-- Dropdown Pekerjaan/Status -->
                <div class="relative">
                    <select name="pekerjaan" class="appearance-none bg-white border border-slate-300 rounded-xl px-5 py-2.5 pr-10 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] cursor-pointer">
                        <option value="">Pekerjaan / Status</option>
                        <option value="kuliah" {{ request('pekerjaan') == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                        <option value="Wirausaha" {{ request('pekerjaan') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                        <option value="Software Engineer" {{ request('pekerjaan') == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                </div>
            </div>
        </form>

        <!-- Grid Cards Alumni -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 my-8">
            @forelse($alumnis ?? [] as $alumni)
                <!-- Dynamic Card dari Admin / Database -->
                <div class="bg-white rounded-2xl border border-slate-300 shadow-sm p-6 flex flex-col items-center text-center hover:shadow-md transition-shadow">
                    
                    <!-- Foto Profil Alumni -->
                    <div class="w-20 h-20 bg-slate-200 rounded-full mb-4 flex items-center justify-center text-slate-400 overflow-hidden">
                        @if(!empty($alumni->foto_profil))
                            <img src="{{ asset('storage/' . $alumni->foto_profil) }}" alt="{{ $alumni->nama }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-user text-3xl"></i>
                        @endif
                    </div>

                    <!-- Nama Alumni -->
                    <h3 class="font-bold text-base text-[#1E1B4B]">{{ $alumni->nama }}</h3>
                    
                    <!-- Jurusan & Angkatan -->
                    <p class="text-xs text-slate-500 mt-1">
                        {{ $alumni->jurusan ? $alumni->jurusan . ' • ' : '' }}Angkatan {{ $alumni->angkatan }}
                    </p>

                    <!-- Status / Posisi Jabatan -->
                    <span class="inline-block mt-3 px-3 py-1 bg-slate-100 text-slate-600 rounded-full text-xs font-medium">
                        {{ $alumni->posisi_jabatan ?? $alumni->status ?? 'Alumni' }}
                    </span>
                </div>
            @empty
                <!-- Placeholder Sesuai Desain (6 Box) -->
                @for ($i = 0; $i < 6; $i++)
                    <div class="bg-white rounded-2xl border border-slate-300 shadow-sm min-h-65 flex items-center justify-center p-6 text-center">
                        <span class="text-xs text-slate-400 font-medium">Belum ada data alumni</span>
                    </div>
                @endfor
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($alumnis) && method_exists($alumnis, 'links'))
            <div class="mt-8">
                {{ $alumnis->links() }}
            </div>
        @endif
    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>