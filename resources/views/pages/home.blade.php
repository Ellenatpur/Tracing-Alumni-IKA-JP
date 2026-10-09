<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study & Karir Alumni</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR (Header) -->
    <x-navbar />

    <!-- KONTEN UTAMA -->
    <main class="grow">

        <!-- HERO BANNER SECTION -->
        <section class="relative bg-gradient-to-r from-[#ECF3FE] via-[#F3F7FE] to-[#E9F1FC] py-16 lg:py-24 overflow-hidden border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Hero Left Content -->
                    <div class="lg:col-span-7 space-y-6 text-left">
                        <span class="inline-block px-3.5 py-1.5 bg-[#1D63ED]/10 text-[#1D63ED] text-xs font-bold rounded-full uppercase tracking-wider">
                            Portal Resmi Tracer Study
                        </span>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1E1B4B] leading-tight">
                            Kenali Jejak Alumni, Temukan Arah Masa Depanmu
                        </h1>
                        <p class="text-slate-600 text-base sm:text-lg max-w-2xl leading-relaxed">
                            Jelajahi perjalanan alumni kami, lihat karier mereka, dan temukan inspirasi untuk langkahmu selanjutnya.
                        </p>

                        <!-- Search Input Box (Mengarahkan ke Halaman Tracer) -->
                        <div class="pt-4 max-w-xl">
                            <form action="{{ url('/tracer') }}" method="GET" class="relative flex items-center">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <input type="text" 
                                       name="q" 
                                       placeholder="Cari nama alumni, jurusan, atau pekerjaan..." 
                                       class="w-full pl-11 pr-14 py-3.5 bg-white rounded-full text-sm text-slate-700 placeholder-slate-400 shadow-md focus:outline-none focus:ring-2 focus:ring-[#1D63ED] border border-slate-100">
                                <button type="submit" 
                                        class="absolute right-1.5 p-2.5 bg-[#1D63ED] hover:bg-blue-700 text-white rounded-full transition-colors flex items-center justify-center w-10 h-10 shadow-sm"
                                        title="Cari Alumni">
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Hero Right Illustration -->
                    <div class="lg:col-span-5 relative flex justify-center lg:justify-end">
                        <div class="w-full max-w-lg aspect-[4/3] bg-gradient-to-tr from-slate-200 to-slate-100 rounded-3xl shadow-lg border border-white/60 flex flex-col items-center justify-center overflow-hidden relative group">
                            <div class="flex flex-col items-center justify-center p-8 text-center space-y-4">
                                <div class="w-20 h-20 rounded-2xl bg-blue-50 text-[#1D63ED] flex items-center justify-center text-4xl shadow-sm">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-[#1E1B4B]">Sistem Penelusuran Lulusan</h3>
                                    <p class="text-xs text-slate-500 mt-1 max-w-xs">Membangun koneksi kuat antara almamater, alumni, dan mitra industri dunia kerja.</p>
                                </div>
                                <a href="{{ route('tracer') }}" class="inline-flex items-center gap-2 text-xs font-bold text-[#1D63ED] hover:underline pt-1">
                                    <span>Jelajahi Database Alumni</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 1: APA ITU & MANFAAT TRACING ALUMNI -->
        <section class="py-16 bg-white border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    
                    <!-- Apa itu Tracing Alumni? (Kiri) -->
                    <div class="lg:col-span-5 bg-slate-50 p-8 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-bold text-[#314E6E] uppercase tracking-wider block mb-2">Tentang Program</span>
                            <h2 class="text-2xl font-bold text-[#1E1B4B] mb-4">Apa itu Tracing Alumni?</h2>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                Tracing Alumni adalah sistem yang digunakan untuk melacak perkembangan lulusan setelah menyelesaikan pendidikan. Data yang dikumpulkan meliputi riwayat pekerjaan, masa tunggu kerja, studi lanjut, hingga kesesuaian kompetensi dengan dunia kerja. Informasi tersebut membantu institusi dalam meningkatkan kualitas pendidikan dan memperkuat jaringan alumni.
                            </p>
                        </div>
                        <div class="pt-6 border-t border-slate-200/60 mt-6 flex items-center justify-between text-xs text-slate-500">
                            <span>Evaluasi Mutu Pendidikan</span>
                            <i class="fa-solid fa-chart-line text-[#314E6E] text-base"></i>
                        </div>
                    </div>

                    <!-- Manfaat Tracing Alumni (Kanan) -->
                    <div class="lg:col-span-7 flex flex-col justify-between space-y-4">
                        <div>
                            <span class="text-xs font-bold text-[#314E6E] uppercase tracking-wider block mb-1">Tujuan & Nilai Tambah</span>
                            <h2 class="text-2xl font-bold text-[#1E1B4B]">Manfaat Tracing Alumni</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 grow">
                            
                            <!-- Card 1: Untuk Alumni -->
                            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 hover:shadow-md transition-all">
                                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#1D63ED] flex items-center justify-center mb-4 text-xl shadow-xs">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </div>
                                <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Alumni</h3>
                                <ul class="text-xs text-slate-600 space-y-2 text-left w-full pl-2">
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-blue-500">•</span> Memperluas jaringan alumni
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-blue-500">•</span> Info lowongan kerja eksklusif
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-blue-500">•</span> Mengikuti agenda reuni & meetup
                                    </li>
                                </ul>
                            </div>

                            <!-- Card 2: Untuk Institusi -->
                            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 hover:shadow-md transition-all">
                                <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4 text-xl shadow-xs">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Institusi</h3>
                                <ul class="text-xs text-slate-600 space-y-2 text-left w-full pl-2">
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-purple-500">•</span> Evaluasi kurikulum & mutu
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-purple-500">•</span> Syarat akreditasi kampus
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-purple-500">•</span> Pemetaan karir lulusan
                                    </li>
                                </ul>
                            </div>

                            <!-- Card 3: Untuk Mitra Industri -->
                            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center text-center hover:border-slate-300 hover:shadow-md transition-all">
                                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 text-xl shadow-xs">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <h3 class="font-bold text-[#1E1B4B] text-sm mb-3">Untuk Mitra Industri</h3>
                                <ul class="text-xs text-slate-600 space-y-2 text-left w-full pl-2">
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-emerald-500">•</span> Rekrutmen talenta kompeten
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-emerald-500">•</span> Kolaborasi riset terapan
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-1.5 text-emerald-500">•</span> Kemitraan magang & proyek
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION 2: BERITA TERBARU -->
        <section class="py-16 bg-slate-50 border-b border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
                    <div>
                        <span class="text-xs font-bold text-[#314E6E] uppercase tracking-wider block mb-1">Warta & Informasi</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E1B4B]">Berita & Artikel Terbaru</h2>
                        <p class="text-slate-500 text-sm mt-1">Dapatkan informasi terkini seputar pencapaian alumni dan kegiatan kampus</p>
                    </div>
                    <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-[#1D63ED] hover:text-blue-700 transition-colors group self-start sm:self-auto">
                        <span>Lihat Semua Berita</span>
                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Grid Cards Berita -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($posts as $post)
                        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1 transition-all flex flex-col justify-between">
                            <div>
                                <!-- Thumbnail Gambar -->
                                <a href="{{ route('berita.detail', $post->id) }}" class="block h-44 bg-slate-100 relative overflow-hidden">
                                    @if(!empty($post->gambar ?? $post->image ?? $post->thumbnail))
                                        <img src="{{ asset('storage/' . ($post->gambar ?? $post->image ?? $post->thumbnail)) }}" alt="{{ $post->judul ?? $post->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <i class="fa-solid fa-newspaper text-4xl"></i>
                                        </div>
                                    @endif
                                    <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#1E1B4B] text-[10px] font-bold px-2.5 py-1 rounded-full shadow-xs uppercase">
                                        {{ $post->kategori ?? 'Berita' }}
                                    </span>
                                </a>

                                <div class="p-5">
                                    <span class="text-[11px] text-slate-400 block mb-2">
                                        <i class="fa-regular fa-calendar mr-1"></i> {{ $post->created_at?->format('d M Y') }}
                                    </span>
                                    <h3 class="font-bold text-slate-800 text-base mb-2 line-clamp-2 hover:text-[#1D63ED] transition-colors leading-snug">
                                        <a href="{{ route('berita.detail', $post->id) }}">
                                            {{ $post->judul ?? $post->title }}
                                        </a>
                                    </h3>
                                    <p class="text-slate-500 text-xs line-clamp-3 leading-relaxed">
                                        {{ Str::limit(strip_tags($post->konten ?? $post->content), 110) }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-5 pb-5 pt-0">
                                <a href="{{ route('berita.detail', $post->id) }}" class="text-xs font-semibold text-[#1D63ED] hover:underline inline-flex items-center gap-1">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fa-solid fa-chevron-right text-[9px]"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        @for($i = 0; $i < 3; $i++)
                            <div class="bg-white rounded-2xl border border-slate-200 min-h-[220px] flex items-center justify-center p-6 text-center shadow-xs">
                                <span class="text-xs text-slate-400 font-medium">Belum ada berita dipublikasikan</span>
                            </div>
                        @endfor
                    @endforelse
                </div>

            </div>
        </section>

        <!-- SECTION 3: EVENT TERDEKAT & LOWONGAN KERJA TERBARU -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Kiri (5 Kolom): Event Terdekat -->
                    <div class="lg:col-span-5 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2.5">
                                <i class="fa-solid fa-calendar-days text-[#314E6E] text-lg"></i>
                                <h3 class="text-xl font-bold text-[#1E1B4B]">Event Terdekat</h3>
                            </div>
                        </div>

                        @if($event)
                            <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-shadow space-y-4">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <span class="px-2.5 py-1 bg-purple-100 text-purple-700 text-[10px] font-bold rounded-md uppercase">
                                            Agenda Kampus
                                        </span>
                                        <h4 class="font-bold text-lg text-slate-800 mt-2 leading-snug">
                                            {{ $event->nama_event ?? $event->title }}
                                        </h4>
                                    </div>
                                    <div class="text-center px-3 py-2 bg-white rounded-xl border border-slate-200 shrink-0 shadow-xs">
                                        <span class="block text-xs font-bold text-purple-700 uppercase">
                                            {{ \Carbon\Carbon::parse($event->tanggal_event ?? $event->event_date ?? $event->tanggal)->format('M') }}
                                        </span>
                                        <span class="block text-xl font-extrabold text-slate-800">
                                            {{ \Carbon\Carbon::parse($event->tanggal_event ?? $event->event_date ?? $event->tanggal)->format('d') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 pt-1">
                                    <span class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-slate-400"></i>
                                        {{ \Carbon\Carbon::parse($event->tanggal_event ?? $event->event_date ?? $event->tanggal)->format('H:i') }} WIB
                                    </span>
                                    @if(!empty($event->lokasi))
                                        <span class="flex items-center gap-1.5">
                                            <i class="fa-solid fa-location-dot text-slate-400"></i>
                                            {{ $event->lokasi }}
                                        </span>
                                    @endif
                                </div>

                                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                                    {{ Str::limit(strip_tags($event->deskripsi ?? $event->description), 140) }}
                                </p>
                            </div>
                        @else
                            <div class="bg-slate-50 rounded-2xl border border-dashed border-slate-200 min-h-[220px] flex items-center justify-center p-6 text-center">
                                <span class="text-xs text-slate-400 font-medium">Belum ada agenda event terdekat</span>
                            </div>
                        @endif
                    </div>

                    <!-- Kanan (7 Kolom): Peluang Karir / Lowongan Terbaru -->
                    <div class="lg:col-span-7 space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2.5">
                                <i class="fa-solid fa-briefcase text-[#314E6E] text-lg"></i>
                                <h3 class="text-xl font-bold text-[#1E1B4B]">Lowongan Kerja Terbaru</h3>
                            </div>
                            <a href="{{ route('jobs') }}" class="text-xs sm:text-sm font-bold text-[#1D63ED] hover:underline flex items-center gap-1">
                                <span>Lihat Semua</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>

                        <div class="space-y-4">
                            @forelse($jobs as $job)
                                <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm hover:shadow-md hover:border-slate-300 transition-all flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-[#314E6E] font-bold text-lg border border-slate-200 shrink-0">
                                            <i class="fa-solid fa-building"></i>
                                        </div>
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2">
                                                <h4 class="font-bold text-base text-[#1E1B4B] hover:text-[#1D63ED] transition-colors line-clamp-1">
                                                    <a href="{{ route('jobs.detail', $job->id) }}">
                                                        {{ $job->judul_posisi ?? $job->posisi }}
                                                    </a>
                                                </h4>
                                                <span class="px-2 py-0.5 bg-cyan-50 text-cyan-700 text-[10px] font-bold rounded-md">
                                                    {{ $job->tipe ?? 'Pekerjaan' }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-slate-600 font-medium">
                                                {{ $job->nama_perusahaan }}
                                            </p>
                                            <div class="flex items-center gap-3 text-xs text-slate-400 pt-0.5">
                                                <span><i class="fa-solid fa-location-dot mr-1"></i> {{ $job->lokasi ?? 'Indonesia' }}</span>
                                                <span>•</span>
                                                <span>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shrink-0 self-end sm:self-center">
                                        <a href="{{ route('jobs.detail', $job->id) }}" class="bg-slate-100 hover:bg-[#314E6E] hover:text-white text-slate-700 text-xs font-semibold px-4 py-2 rounded-xl transition-colors inline-block">
                                            Detail Lowongan
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="bg-slate-50 rounded-2xl border border-dashed border-slate-200 min-h-[220px] flex items-center justify-center p-6 text-center">
                                    <span class="text-xs text-slate-400 font-medium">Belum ada lowongan pekerjaan aktif</span>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>