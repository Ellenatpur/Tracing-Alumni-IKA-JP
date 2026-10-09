<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->judul }} - Berita & Artikel</title>

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

        <!-- Breadcrumb & Back Button -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
            <nav class="flex items-center gap-2 text-xs sm:text-sm text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-[#1E1B4B] transition-colors">Beranda</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <a href="{{ route('berita') }}" class="hover:text-[#1E1B4B] transition-colors">Berita & Artikel</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <span class="text-slate-800 font-semibold truncate max-w-[200px] sm:max-w-xs">{{ $post->judul }}</span>
            </nav>

            <a href="{{ route('berita') }}" 
               class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#314E6E] hover:text-[#1E1B4B] bg-white border border-slate-200 px-4 py-2 rounded-xl shadow-sm hover:border-slate-300 transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Berita</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- ARTIKEL UTAMA (8 Kolom) -->
            <article class="lg:col-span-8 bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-10 space-y-6">
                
                <!-- Kategori & Meta -->
                <div class="space-y-3">
                    <span class="inline-block px-3 py-1 bg-cyan-50 text-cyan-800 text-xs font-bold rounded-full uppercase tracking-wider">
                        {{ $post->kategori ?? 'Berita' }}
                    </span>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1E1B4B] leading-tight">
                        {{ $post->judul }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm text-slate-400 pt-1 pb-4 border-b border-slate-100">
                        <span class="flex items-center gap-1.5 text-slate-600 font-medium">
                            <i class="fa-regular fa-calendar text-slate-400"></i>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}
                        </span>
                        <span>•</span>
                        <span class="flex items-center gap-1.5 text-slate-600 font-medium">
                            <i class="fa-regular fa-user text-slate-400"></i>
                            {{ $post->penulis ?? 'Admin Portal' }}
                        </span>
                        <span>•</span>
                        <span class="flex items-center gap-1.5 text-slate-500">
                            <i class="fa-regular fa-clock text-slate-400"></i>
                            {{ ceil(str_word_count(strip_tags($post->konten ?? '')) / 200) }} menit baca
                        </span>
                    </div>
                </div>

                <!-- Gambar Utama Artikel -->
                @if(!empty($post->gambar))
                    <div class="rounded-2xl overflow-hidden shadow-sm max-h-[460px] bg-slate-100">
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <!-- Isi Konten Artikel -->
                <div class="prose max-w-none text-slate-700 leading-relaxed text-sm sm:text-base space-y-4 pt-2">
                    @if(strip_tags($post->konten) != $post->konten)
                        {!! $post->konten !!}
                    @else
                        {!! nl2br(e($post->konten)) !!}
                    @endif
                </div>

                <!-- Bagikan Artikel -->
                <div class="pt-8 border-t border-slate-100 flex flex-wrap items-center justify-between gap-4">
                    <span class="text-xs sm:text-sm font-bold text-[#1E1B4B]">
                        Bagikan Artikel Ini:
                    </span>
                    <div class="flex items-center gap-2">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->judul . ' ' . url()->current()) }}" 
                           target="_blank" 
                           class="w-9 h-9 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center transition-colors shadow-sm"
                           title="Bagikan ke WhatsApp">
                            <i class="fa-brands fa-whatsapp text-sm"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="w-9 h-9 rounded-xl bg-[#0A66C2] hover:bg-[#084e96] text-white flex items-center justify-center transition-colors shadow-sm"
                           title="Bagikan ke LinkedIn">
                            <i class="fa-brands fa-linkedin-in text-sm"></i>
                        </a>
                        <button type="button" 
                                onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin!');"
                                class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 flex items-center justify-center transition-colors"
                                title="Salin Link">
                            <i class="fa-solid fa-link text-xs"></i>
                        </button>
                    </div>
                </div>

            </article>

            <!-- SIDEBAR BERITA LAINNYA (4 Kolom) -->
            <aside class="lg:col-span-4 space-y-6">

                <!-- BERITA TERBARU LAINNYA -->
                @if(isset($recentPosts) && $recentPosts->count() > 0)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2.5">
                                <i class="fa-solid fa-newspaper text-[#314E6E]"></i>
                                <h3 class="font-bold text-sm text-[#1E1B4B]">Berita Terkini</h3>
                            </div>
                            <a href="{{ route('berita') }}" class="text-[11px] font-semibold text-[#314E6E] hover:underline">
                                Semua
                            </a>
                        </div>

                        <div class="space-y-4">
                            @foreach($recentPosts as $recent)
                                <a href="{{ route('berita.detail', $recent->id) }}" class="flex items-start gap-3 group">
                                    <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
                                        @if(!empty($recent->gambar))
                                            <img src="{{ asset('storage/' . $recent->gambar) }}" alt="{{ $recent->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                <i class="fa-solid fa-image text-sm"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="grow min-w-0">
                                        <span class="text-[10px] font-semibold text-cyan-700 uppercase">
                                            {{ $recent->kategori ?? 'Berita' }}
                                        </span>
                                        <h4 class="font-bold text-xs text-[#1E1B4B] group-hover:text-[#314E6E] transition-colors line-clamp-2 leading-snug">
                                            {{ $recent->judul }}
                                        </h4>
                                        <span class="text-[10px] text-slate-400 block mt-1">
                                            {{ \Carbon\Carbon::parse($recent->created_at)->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- BANNER TRACER STUDY & LOWONGAN -->
                <div class="bg-gradient-to-br from-[#1E1B4B] to-[#314E6E] rounded-2xl p-6 text-white space-y-4 shadow-sm">
                    <span class="px-2.5 py-1 bg-white/20 text-white text-[11px] font-bold rounded-lg uppercase">
                        Komunitas Alumni
                    </span>
                    <h3 class="text-lg font-bold leading-snug">
                        Terhubung Kembali Dengan Rekan & Almamater
                    </h3>
                    <p class="text-xs text-slate-200 leading-relaxed">
                        Perbarui data dirimu di sistem Tracer Study untuk membantu adik tingkat dan memperluas jaringan profesional.
                    </p>
                    <div class="pt-2 flex flex-col gap-2">
                        <a href="{{ route('tracer') }}" class="w-full bg-white text-[#1E1B4B] font-bold text-xs py-2.5 rounded-xl text-center hover:bg-slate-100 transition-colors">
                            Cari Alumni
                        </a>
                        <a href="{{ route('jobs') }}" class="w-full bg-white/10 hover:bg-white/20 text-white font-bold text-xs py-2.5 rounded-xl text-center transition-colors">
                            Lihat Lowongan Kerja
                        </a>
                    </div>
                </div>

            </aside>

        </div>

    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>
