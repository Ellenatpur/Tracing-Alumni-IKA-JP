<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja - Tracer Study</title>

    <!-- Tailwind CSS CDN (Play v3) -->
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
                Peluang Karir & Lowongan Alumni
            </h1>
            <p class="text-slate-500 text-sm sm:text-base mt-2">
                Temukan posisi pekerjaan impian dari mitra industri, perusahaan alumni, dan instansi terpercaya.
            </p>
        </div>

        <!-- Form Pencarian & Filter -->
        <form action="{{ url('/jobs') }}" method="GET" class="space-y-4 mb-10">
            <!-- Search Bar + Button -->
            <div class="flex items-center gap-3 max-w-4xl">
                <div class="relative grow">
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}"
                           placeholder="Cari posisi pekerjaan atau nama perusahaan..." 
                           class="w-full px-5 py-3.5 bg-white rounded-xl text-sm text-slate-700 placeholder-slate-400 border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] transition-all">
                </div>
                <button type="submit" 
                        class="bg-[#314E6E] hover:bg-[#253d57] text-white px-5 py-3.5 rounded-xl transition-colors flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-magnifying-glass text-base"></i>
                </button>
            </div>

            <!-- Filter Dropdowns -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Filter Tipe Pekerjaan -->
                <div class="relative">
                    <select name="tipe" class="appearance-none bg-white border border-slate-300 rounded-xl px-5 py-2.5 pr-10 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2B1B40] cursor-pointer">
                        <option value="">Semua Tipe</option>
                        <option value="Full-time" {{ request('tipe') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ request('tipe') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="Internship" {{ request('tipe') == 'Internship' ? 'selected' : '' }}>Internship (Magang)</option>
                        <option value="Freelance" {{ request('tipe') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                </div>

                <!-- Input Lokasi -->
                <div class="relative">
                    <input type="text" 
                           name="lokasi" 
                           value="{{ request('lokasi') }}"
                           placeholder="Kota / Lokasi (cth: Jakarta)" 
                           class="bg-white border border-slate-300 rounded-xl px-5 py-2.5 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2B1B40]">
                </div>
            </div>
        </form>

        <!-- Grid Cards Lowongan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
            @forelse($jobs ?? [] as $job)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <!-- Header Pekerjaan & Perusahaan -->
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-[#314E6E] font-bold text-lg overflow-hidden border border-slate-200 shrink-0">
                                    @if(!empty($job->logo_perusahaan))
                                        <img src="{{ asset('storage/' . $job->logo_perusahaan) }}" alt="{{ $job->nama_perusahaan }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-building"></i>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-bold text-base text-[#1E1B4B] line-clamp-1 hover:text-[#314E6E] transition-colors">
                                        <a href="{{ route('jobs.detail', $job->id) }}">
                                            {{ $job->judul_posisi ?? $job->posisi }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-slate-500 font-medium mt-0.5">
                                        {{ $job->nama_perusahaan }}
                                    </p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-700 text-xs font-semibold rounded-full shrink-0">
                                {{ $job->tipe ?? $job->tipe_pekerjaan ?? 'Pekerjaan' }}
                            </span>
                        </div>

                        <!-- Lokasi & Gaji -->
                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 mb-4">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-location-dot text-slate-400"></i>
                                <span>{{ $job->lokasi ?? 'Indonesia' }}</span>
                            </div>
                            @if(!empty($job->gaji))
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-money-bill-wave text-slate-400"></i>
                                    <span>{{ $job->gaji }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Deskripsi Singkat -->
                        <p class="text-slate-600 text-xs leading-relaxed line-clamp-3 mb-6">
                            {{ Str::limit(strip_tags($job->deskripsi), 140) }}
                        </p>
                    </div>

                    <!-- Footer Action Card -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                        <span class="text-[11px] text-slate-400">
                            Diposting {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                        </span>
                        
                        <div class="flex items-center gap-2">
                            <a href="{{ route('jobs.detail', $job->id) }}" 
                               class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold px-3.5 py-2 rounded-lg transition-colors">
                                Detail
                            </a>
                            @if(!empty($job->link_pendaftaran ?? $job->link_lamaran))
                                <a href="{{ $job->link_pendaftaran ?? $job->link_lamaran }}" 
                                   target="_blank" 
                                   class="bg-[#314E6E] hover:bg-[#253d57] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors flex items-center gap-1.5">
                                    Lamar <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State Card (3 Box Placeholder Sesuai Tampilan Kamu) -->
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-white rounded-2xl border border-slate-300 shadow-sm min-h-[160px] flex items-center justify-center p-6 text-center">
                        <span class="text-xs text-slate-400 font-medium">Belum ada lowongan pekerjaan tersedia dari admin</span>
                    </div>
                @endfor
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($jobs) && method_exists($jobs, 'links'))
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        @endif
    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>