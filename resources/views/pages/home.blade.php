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

<!-- NAVBAR (Header) -->
<x-navbar />

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
                    <img src="https://placehold.co/600x450/e2e8f0/475569?text=Tempat+Foto+Hero+Wisuda+/+Gedung" 
                         alt="Illustration Hero" 
                         class="w-full h-full object-cover rounded-3xl"
                         onerror="this.onerror=null; this.classList.add('hidden'); this.nextElementSibling.classList.remove('hidden');">
                    
                    <div class="hidden flex-col items-center justify-center p-6 text-center space-y-3">
                        <i class="fa-solid fa-[#1D63ED] fa-graduation-cap text-6xl text-slate-400"></i>
                        <span class="text-sm font-semibold text-slate-500">Gambar Banner</span>
                        <span class="text-xs text-slate-400">Dimensi Rekomendasi: 600x450 px</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

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

<!-- SECTION 2: BERITA TERBARU -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($posts as $post)
        <div class="bg-white rounded-2xl border border-slate-200 p-5 flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
            <div>
                @if($post->image || $post->thumbnail)
                    <img src="{{ asset('storage/' . ($post->image ?? $post->thumbnail)) }}" alt="{{ $post->title }}" class="w-full h-40 object-cover rounded-xl mb-4">
                @else
                    <div class="w-full h-40 bg-slate-100 rounded-xl mb-4 flex items-center justify-center text-slate-400">
                        <i class="fa-solid fa-newspaper text-3xl"></i>
                    </div>
                @endif
                <h3 class="font-bold text-slate-800 text-lg mb-2 line-clamp-2">{{ $post->title ?? $post->judul }}</h3>
                <p class="text-slate-500 text-xs line-clamp-3 mb-4">{{ Str::limit(strip_tags($post->content ?? $post->konten), 100) }}</p>
            </div>
            <span class="text-xs text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
        </div>
    @empty
        <!-- Jika belum ada data dari admin, tampilkan placeholder -->
        @for($i = 0; $i < 3; $i++)
            <div class="bg-white rounded-2xl border border-slate-200 min-h-[200px] flex items-center justify-center p-6 text-center">
                <span class="text-xs text-slate-400">Ditampilkan dari admin</span>
            </div>
        @endfor
    @endforelse
</div>

<!-- SECTION 3: EVENT TERDEKAT & LOWONGAN KERJA TERBARU -->
@if($event)
    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <h3 class="font-bold text-lg text-slate-800 mb-2">{{ $event->title ?? $event->nama_event }}</h3>
        <p class="text-xs text-cyan-600 font-semibold mb-3">
            <i class="fa-regular fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($event->event_date ?? $event->tanggal)->format('d M Y') }}
        </p>
        <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ Str::limit(strip_tags($event->description ?? $event->deskripsi), 150) }}</p>
    </div>
@else
    <div class="bg-white rounded-2xl border border-slate-200 min-h-[200px] flex items-center justify-center p-6 text-center">
        <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
    </div>
@endif

@if($event)
    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
        <h3 class="font-bold text-lg text-slate-800 mb-2">{{ $event->title ?? $event->nama_event }}</h3>
        <p class="text-xs text-cyan-600 font-semibold mb-3">
            <i class="fa-regular fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($event->event_date ?? $event->tanggal)->format('d M Y') }}
        </p>
        <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ Str::limit(strip_tags($event->description ?? $event->deskripsi), 150) }}</p>
    </div>
@else
    <div class="bg-white rounded-2xl border border-slate-200 min-h-[200px] flex items-center justify-center p-6 text-center">
        <span class="text-xs text-slate-400 font-medium">Ditampilkan dari admin</span>
    </div>
@endif

<!-- FOOTER -->
<x-footer />