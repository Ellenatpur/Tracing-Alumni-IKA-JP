
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita & Artikel - Tracer Study</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tailwind CSS CDN Fallback -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<x-navbar />

<!-- HERO HEADER BERITA -->
<section class="bg-gradient-to-r from-[#1E1B4B] via-[#2B1B40] to-[#314E6E] text-white py-12 px-6 sm:px-10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-3 text-center md:text-left">
            <span class="px-3 py-1 bg-cyan-400/20 text-cyan-300 text-xs font-semibold rounded-full uppercase tracking-wider">
                Informasi & Kabar Kampus
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                Berita & Artikel Alumni
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl">
                Dapatkan kabar terbaru seputar pencapaian alumni, agenda jejaring, kisah sukses, dan perkembangan kampus.
            </p>
        </div>

        <!-- Form Search Berita -->
        <form action="{{ url('/berita') }}" method="GET" class="w-full md:w-auto min-w-[300px]">
            <div class="relative">
                <input type="text" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="Cari kata kunci berita..." 
                       class="w-full pl-11 pr-4 py-3 bg-white/10 backdrop-blur-md text-white placeholder-slate-300 rounded-2xl border border-white/20 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 text-sm"></i>
            </div>
        </form>
    </div>
</section>

<!-- KONTEN UTAMA BERITA -->
<main class="grow max-w-7xl w-full mx-auto px-6 sm:px-10 py-10">

    <!-- HIGHLIGHT / FEATURED POST (Jika ada data) -->
    @if(isset($featured_post) &&$featured_post)
        <div class="mb-12 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden grid grid-cols-1 lg:grid-cols-12 hover:shadow-md transition-shadow">
            <div class="lg:col-span-7 h-64 lg:h-auto bg-slate-100 relative">
                @if(!empty($featured_post->gambar))
                    <img src="{{ asset('storage/' . $featured_post->gambar) }}" alt="{{ $featured_post->judul }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-100">
                        <i class="fa-solid fa-newspaper text-5xl"></i>
                    </div>
                @endif
                <span class="absolute top-4 left-4 bg-[#1E1B4B] text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                    Berita Utama
                </span>
            </div>
            <div class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center space-x-3 text-xs text-slate-400">
                        <span><i class="fa-regular fa-calendar mr-1"></i> {{ $featured_post->created_at?->format('d M Y') }}</span>
                        <span>•</span>
                        <span><i class="fa-regular fa-user mr-1"></i> {{ $featured_post->penulis ?? 'Admin' }}</span>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-[#1E1B4B] leading-tight hover:text-cyan-600 transition-colors">
                        <a href="#">{{ $featured_post->judul }}</a>
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($featured_post->konten ?? $featured_post->content), 180) }}
                    </p>
                </div>
                <div>
                    <a href="#" class="inline-flex items-center text-xs font-bold text-[#1D63ED] hover:text-blue-700 transition-colors group">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- GRID BERITA TERBARU -->
    <div class="mb-6 flex items-center justify-between border-b border-slate-200 pb-4">
        <h2 class="text-xl font-bold text-[#1E1B4B]">Semua Berita & Pengumuman</h2>
        <span class="text-xs text-slate-500">Menampilkan berita terkini</span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 my-6">
        @forelse($posts ?? [] as $post)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <!-- Thumbnail Gambar -->
                <div class="h-48 bg-slate-100 relative overflow-hidden">
                    @if(!empty($post->gambar))
                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <i class="fa-solid fa-image text-4xl"></i>
                        </div>
                    @endif
                    <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#1E1B4B] text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow-sm uppercase">
                        {{ $post->kategori ?? 'Informasi' }}
                    </span>
                </div>

                <!-- Konten Card -->
                <div class="p-6 flex flex-col justify-between grow space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2 text-[11px] text-slate-400">
                            <span><i class="fa-regular fa-clock mr-1"></i> {{ $post->created_at?->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-bold text-base text-[#1E1B4B] line-clamp-2 leading-snug hover:text-cyan-600 transition-colors">
                            <a href="#">{{ $post->judul }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                            {{ Str::limit(strip_tags($post->konten ?? $post->content), 120) }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="text-slate-400 font-medium"><i class="fa-regular fa-user mr-1"></i> {{ $post->penulis ?? 'Admin Portal' }}</span>
                        <a href="#" class="font-semibold text-[#1D63ED] hover:underline">
                            Baca <i class="fa-solid fa-chevron-right text-[10px] ml-0.5"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <!-- Placeholder Kosong / Loading -->
            @for ($i = 0; $i < 6; $i++)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm min-h-[320px] flex flex-col justify-between p-6">
                    <div class="w-full h-40 bg-slate-100 rounded-xl animate-pulse mb-4"></div>
                    <div class="space-y-2">
                        <div class="w-1/3 h-3 bg-slate-200 rounded animate-pulse"></div>
                        <div class="w-full h-4 bg-slate-200 rounded animate-pulse"></div>
                        <div class="w-4/5 h-4 bg-slate-200 rounded animate-pulse"></div>
                    </div>
                    <span class="text-xs text-slate-400 text-center mt-4">Belum ada berita dipublikasikan</span>
                </div>
            @endfor
        @endforelse
    </div>

    <!-- PAGINASI -->
    @if(isset($posts) && method_exists($posts, 'links'))
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @endif

</main>

<!-- FOOTER -->
<x-footer />
