<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Fonts: Plus Jakarta Sans -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>


<!-- STREAMING_CHUNK:Rendering Navbar Section... -->
<!-- NAVBAR (Header) -->
<nav class="bg-[#2B1B40] text-white sticky top-0 z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Logo Brand -->
        <div class="flex items-center space-x-3">
            <a href="{{ url('/') }}" class="text-3xl font-extrabold tracking-wider text-white">
                LOGO
            </a>
        </div>

        <!-- Menu Navigasi Tengah -->
        <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
            <a href="{{ url('/') }}" class="text-white hover:text-cyan-300 transition-colors">Beranda</a>
            <a href="{{ url('/statistik') }}" class="text-slate-300 hover:text-white transition-colors">Statistik</a>
            <a href="{{ url('/berita') }}" class="text-slate-300 hover:text-white transition-colors">Berita</a>
            <a href="{{ url('/kuesioner') }}" class="text-slate-300 hover:text-white transition-colors">Kuesioner</a>
        </div>

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

<!-- STREAMING_CHUNK:Rendering Hero Banner Section... -->
<!-- HERO BANNER SECTION -->
<section class="relative bg-gradient-to-r from-[#ECF3FE] via-[#F3F7FE] to-[#E9F1FC] py-16 lg:py-24 overflow-hidden border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left Content -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1E1B4B] leading-tight">
                    Kenali Jejak Alumni, Temukan Arah Masa Depanmu
                </h1>
                <p class="text-slate-600 text-base sm:text-lg max-w-2xl leading-relaxed">
                    Jelajahi perjalanan alumni kami, lihat karier mereka, dan temukan inspirasi untuk langkahmu selanjutnya.
                </p>

                <!-- Search Input Box -->
                <div class="pt-4 max-w-xl">
                    <form action="{{ url('/search') }}" method="GET" class="relative flex items-center">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input type="text" 
                               name="q" 
                               placeholder="Cari nama alumni, jurusan, atau pekerjaan..." 
                               class="w-full pl-11 pr-14 py-3.5 bg-white rounded-full text-sm text-slate-700 placeholder-slate-400 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 border border-slate-100">
                        <button type="submit" 
                                class="absolute right-1.5 p-2.5 bg-[#1D63ED] hover:bg-blue-700 text-white rounded-full transition-colors flex items-center justify-center w-10 h-10 shadow-sm">
                            <i class="fa-solid fa-magnifying-glass text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hero Right Illustration PlaceHolder -->
            <div class="lg:col-span-5 relative flex justify-center lg:justify-end">
                <div class="w-full max-w-lg aspect-[4/3] bg-gradient-to-tr from-slate-200 to-slate-100 rounded-3xl shadow-lg border border-white/60 flex flex-col items-center justify-center overflow-hidden relative group">
                    <!-- Disiapkan untuk memasukkan image gedung / wisudawan alumni -->
                    <img src="https://placehold.co/600x450/e2e8f0/475569?text=Tempat+Foto+Hero+Wisuda+/+Gedung" 
                         alt="Illustration Hero" 
                         class="w-full h-full object-cover rounded-3xl"
                         onerror="this.onerror=null; this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden');">
                    
                    <!-- Fallback jika image belum diset -->
                    <div class="hidden flex-col items-center justify-center p-6 text-center space-y-3">
                        <i class="fa-solid fa-[#1D63ED] fa-graduation-cap text-6xl text-slate-400"></i>
                        <span class="text-sm font-semibold text-slate-500">Tempat Meletakkan Gambar Banner</span>
                        <span class="text-xs text-slate-400">Dimensi Rekomendasi: 600x450 px</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- STREAMING_CHUNK:Rendering About and Benefits Section... -->
<!-- SECTION 1: APA ITU & MANFAAT TRACING ALUMNI -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            
            <!-- Apa itu Tracing Alumni? (Kiri) -->
            <div class="lg:col-span-5 bg-white p-8 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold text-[#1E1B4B] mb-4">Apa itu Tracing Alumni?</h2>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Tracing Alumni adalah sistem yang digunakan untuk melacak perkembangan lulusan setelah menyelesaikan pendidikan. Data yang dikumpulkan meliputi riwayat pekerjaan, masa tunggu kerja, studi lanjut, hingga kesesuaian kompetensi dengan dunia kerja. Informasi tersebut membantu institusi dalam meningkatkan kualitas pendidikan dan memperkuat jaringan alumni.
                    </p>
                </div>
            </div>

            <!-- Manfaat Tracing Alumni (Kanan) -->
            <div class="lg:col-span-7 flex flex-col justify-between">
                <h2 class="text-xl font-bold text-[#1E1B4B] mb-4">Manfaat Tracing Alumni</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-full">
                    
                    <!-- Card 1: Untuk Alumni -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 transition-all">
                        <div class="w-16 h-16 rounded-full bg-slate-300 flex items-center justify-center mb-4 text-slate-600">
                            <i class="fa-solid fa-user-graduate text-xl"></i>
                        </div>
                        <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Alumni</h3>
                        <ul class="text-xs text-slate-600 space-y-1.5 text-left w-full pl-2">
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Memperluas jaringan alumni
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Mendapat informasi lowongan kerja
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Mengikuti kegiatan alumni
                            </li>
                        </ul>
                    </div>

                    <!-- Card 2: Untuk Institusi -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 transition-all">
                        <div class="w-16 h-16 rounded-full bg-slate-300 flex items-center justify-center mb-4 text-slate-600">
                            <i class="fa-solid fa-building-columns text-xl"></i>
                        </div>
                        <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Institusi</h3>
                        <ul class="text-xs text-slate-600 space-y-1.5 text-left w-full pl-2">
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Evaluasi kurikulum & mutu
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Akreditasi perguruan tinggi
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Pemetaan karir lulusan
                            </li>
                        </ul>
                    </div>

                    <!-- Card 3: Untuk Mitra Industri -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 transition-all">
                        <div class="w-16 h-16 rounded-full bg-slate-300 flex items-center justify-center mb-4 text-slate-600">
                            <i class="fa-solid fa-briefcase text-xl"></i>
                        </div>
                        <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Mitra Industri</h3>
                        <ul class="text-xs text-slate-600 space-y-1.5 text-left w-full pl-2">
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Rekrutmen talenta berbakat
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Kolaborasi riset & industri
                            </li>
                            <li class="flex items-start">
                                <span class="mr-1.5">•</span> Kemitraan strategis
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- STREAMING_CHUNK:Rendering Latest News Section... -->
<!-- SECTION 2: BERITA TERBARU -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-[#1E1B4B] mb-8">Berita Terbaru</h2>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Kiri: 3 Card Vertikal Tinggi -->
            <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                @forelse($posts ?? [] as $post)
                    <!-- Dynamic Card dari Admin -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col h-80 hover:shadow-md transition-shadow">
                        <div class="h-40 bg-slate-100 relative">
                            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <h3 class="font-bold text-sm text-[#1E1B4B] line-clamp-2">{{ $post->judul }}</h3>
                            <span class="text-xs text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                @empty
                    <!-- Card Placeholder Sesuai Desain (3 Card Vertikal) -->
                    @for ($i = 0; $i < 3; $i++)
                        <div class="bg-white rounded-2xl border border-slate-300 shadow-sm min-h-[300px] flex items-center justify-center p-6 text-center">
                            <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
                        </div>
                    @endfor
                @endforelse
            </div>

            <!-- Kanan: 3 List Item Horizontal Stacked -->
            <div class="lg:col-span-4 flex flex-col justify-between space-y-4">
                @forelse($recent_posts ?? [] as $recent)
                    <!-- Dynamic List Item dari Admin -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 flex items-center space-x-4 h-24 hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-slate-100 rounded-xl flex-shrink-0 overflow-hidden">
                            <img src="{{ asset('storage/' . $recent->gambar) }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-semibold text-xs text-[#1E1B4B] line-clamp-2">{{ $recent->judul }}</h4>
                        </div>
                    </div>
                @empty
                    <!-- Placeholder Sesuai Desain (3 Horizontal Box) -->
                    @for ($j = 0; $j < 3; $j++)
                        <div class="bg-white rounded-2xl border border-slate-300 shadow-sm h-20 flex items-center justify-center p-4 text-center">
                            <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
                        </div>
                    @endfor
                @endforelse
            </div>

        </div>
    </div>
</section>

<!-- STREAMING_CHUNK:Rendering Events and Job Postings Section... -->
<!-- SECTION 3: EVENT TERDEKAT & LOWONGAN KERJA TERBARU -->
<section class="py-16 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <!-- Kolom Kiri: Event Terdekat -->
            <div>
                <h2 class="text-2xl font-bold text-[#1E1B4B] mb-6">Event Terdekat</h2>
                
                @if(isset($events) && count($events) > 0)
                    @foreach($events as$event)
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-4">
                            <h3 class="font-bold text-lg text-[#1E1B4B] mb-2">{{ $event->nama_event }}</h3>
                            <p class="text-xs text-slate-500"><i class="fa-regular fa-calendar mr-2"></i>{{ $event->tgl_pelaksanaan }}</p>
                        </div>
                    @endforeach
                @else
                    <!-- Card Placeholder Sesuai Desain (1 Rectangular Box Besar) -->
                    <div class="bg-white rounded-2xl border border-slate-300 shadow-sm min-h-[220px] flex items-center justify-center p-8 text-center">
                        <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Lowongan Kerja Terbaru -->
            <div>
                <h2 class="text-2xl font-bold text-[#1E1B4B] mb-6">Lowongan Kerja Terbaru</h2>

                @if(isset($jobs) && count($jobs) > 0)
                    <div class="space-y-4">
                        @foreach($jobs as$job)
                            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                                <h3 class="font-bold text-base text-[#1E1B4B]">{{ $job->judul_posisi }}</h3>
                                <p class="text-xs text-slate-500 mt-1">{{ $job->nama_perusahaan }} • {{$job->lokasi }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Card Placeholder Sesuai Desain (2 Stacked Rectangular Box) -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-300 shadow-sm h-24 flex items-center justify-center p-4 text-center">
                            <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
                        </div>
                        <div class="bg-white rounded-2xl border border-slate-300 shadow-sm h-24 flex items-center justify-center p-4 text-center">
                            <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>

<!-- STREAMING_CHUNK:Rendering Footer Section... -->
<!-- FOOTER (Warna Sama Sesuai Navbar) -->
<footer class="bg-[#2B1B40] text-white mt-auto pt-16 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
            
            <!-- Kolom 1 & 2: Brand & Deskripsi -->
            <div class="lg:col-span-2 space-y-4">
                <a href="{{ url('/') }}" class="text-4xl font-extrabold tracking-wider text-white inline-block">
                    LOGO
                </a>
                <p class="text-slate-300 text-sm leading-relaxed max-w-sm">
                    Sistem Tracing Alumni terpadu untuk menjembatani komunikasi, informasi karir, dan pengembangan komunitas alumni perguruan tinggi.
                </p>
                <div class="pt-2 flex items-center space-x-3 text-slate-300">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom 3: Navigasi Utama -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Navigasi</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li><a href="{{ url('/') }}" class="hover:text-cyan-300 transition-colors">Beranda</a></li>
                    <li><a href="{{ url('/statistik') }}" class="hover:text-cyan-300 transition-colors">Statistik Alumni</a></li>
                    <li><a href="{{ url('/berita') }}" class="hover:text-cyan-300 transition-colors">Berita & Informasi</a></li>
                    <li><a href="{{ url('/kuesioner') }}" class="hover:text-cyan-300 transition-colors">Kuesioner Tracer</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Fitur Portal -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Fitur Alumni</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li><a href="{{ url('/register-alumni') }}" class="hover:text-cyan-300 transition-colors">Pendaftaran Alumni</a></li>
                    <li><a href="{{ url('/lowongan-kerja') }}" class="hover:text-cyan-300 transition-colors">Lowongan Kerja</a></li>
                    <li><a href="{{ url('/event') }}" class="hover:text-cyan-300 transition-colors">Event & Agenda</a></li>
                    <li><a href="{{ url('/admin/login') }}" class="hover:text-cyan-300 transition-colors">Login Admin Panel</a></li>
                </ul>
            </div>

            <!-- Kolom 5: Kontak -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Kontak Kami</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li class="flex items-start">
                        <i class="fa-solid fa-location-dot mt-1 mr-2 text-xs text-cyan-300"></i>
                        <span>Jl. Kampus Alumni No. 1, Indonesia</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope mr-2 text-xs text-cyan-300"></i>
                        <span>alumni@kampus.ac.id</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone mr-2 text-xs text-cyan-300"></i>
                        <span>(021) 1234-5678</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar Copyright -->
        <div class="pt-8 border-t border-white/10 text-center text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} Tracing Alumni System. All rights reserved.</p>
        </div>
    </div>
</footer>
