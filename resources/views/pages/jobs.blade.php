<!-- NAVBAR HEADER -->
<x-navbar />

<!-- HERO HEADER LOWONGAN KERJA -->
<section class="bg-gradient-to-r from-[#1E1B4B] via-[#253D57] to-[#1D63ED] text-white py-12 px-6 sm:px-10">
    <div class="max-w-7xl mx-auto space-y-4">
        <span class="px-3 py-1 bg-teal-400/20 text-teal-300 text-xs font-semibold rounded-full uppercase tracking-wider">
            Karir & Kesempatan Kerja
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
            Peluang Karir & Lowongan Alumni
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed">
            Temukan posisi pekerjaan impian dari mitra industri, perusahaan alumni, dan instansi terpercaya.
        </p>
    </div>
</section>

<!-- KONTEN UTAMA LOWONGAN KERJA -->
<main class="grow max-w-7xl w-full mx-auto px-6 sm:px-10 py-10">

    <!-- FORM FILTER & PENCARIAN LOWONGAN -->
    <form action="{{ url('/jobs') }}" method="GET" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4 mb-10 -mt-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
            
            <!-- Search Keyword -->
            <div class="md:col-span-5 relative">
                <input type="text" 
                       name="q" 
                       value="{{ request('q') }}"
                       placeholder="Cari posisi pekerjaan atau nama perusahaan..." 
                       class="w-full pl-11 pr-4 py-3 bg-slate-50 rounded-xl text-sm text-slate-700 placeholder-slate-400 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E1B4B]">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            </div>

            <!-- Filter Lokasi -->
            <div class="md:col-span-3 relative">
                <input type="text" 
                       name="lokasi" 
                       value="{{ request('lokasi') }}"
                       placeholder="Kota / Lokasi (cth: Jakarta)..." 
                       class="w-full pl-10 pr-4 py-3 bg-slate-50 rounded-xl text-sm text-slate-700 placeholder-slate-400 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E1B4B]">
                <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            </div>

            <!-- Dropdown Tipe Pekerjaan -->
            <div class="md:col-span-2 relative">
                <select name="tipe" class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 pr-8 text-xs sm:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1E1B4B] cursor-pointer">
                    <option value="">Semua Tipe</option>
                    <option value="Full-time" {{ request('tipe') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ request('tipe') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Internship" {{ request('tipe') == 'Internship' ? 'selected' : '' }}>Internship (Magang)</option>
                    <option value="Contract" {{ request('tipe') == 'Contract' ? 'selected' : '' }}>Kontrak</option>
                    <option value="Remote" {{ request('tipe') == 'Remote' ? 'selected' : '' }}>Remote</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
            </div>

            <!-- Tombol Cari -->
            <div class="md:col-span-2">
                <button type="submit" class="w-full bg-[#1D63ED] hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl text-sm transition-colors flex items-center justify-center gap-2 shadow-sm">
                    <i class="fa-solid fa-filter"></i> Cari Karir
                </button>
            </div>

        </div>
    </form>

    <!-- LIST CARDS LOWONGAN KERJA -->
    <div class="space-y-4 my-8">
        @forelse($jobs ?? [] as $job)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md p-6 transition-all duration-200 flex flex-col md:flex-row md:items-center justify-between gap-6 border-l-4 border-l-[#1D63ED]">
                
                <!-- Detail Perusahaan & Posisi -->
                <div class="flex items-start space-x-4">
                    <div class="w-14 h-14 bg-slate-100 rounded-xl flex items-center justify-center shrink-0 border border-slate-200 overflow-hidden">
                        @if(!empty($job->logo_perusahaan))
                            <img src="{{ asset('storage/' . $job->logo_perusahaan) }}" alt="{{ $job->nama_perusahaan }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-briefcase text-2xl text-slate-400"></i>
                        @endif
                    </div>
                    <div class="space-y-1.5">
                        <div class="flex flex-wrap items-center gap-2">
                            <h2 class="font-bold text-lg text-[#1E1B4B] hover:text-[#1D63ED] transition-colors">
                                {{ $job->judul_posisi ?? $job->posisi }}
                            </h2>
                            <span class="px-2.5 py-0.5 bg-blue-50 text-[#1D63ED] text-[11px] font-bold rounded-full border border-blue-100">
                                {{ $job->tipe_pekerjaan ?? 'Full-time' }}
                            </span>
                        </div>

                        <p class="text-xs font-semibold text-slate-600">
                            {{ $job->nama_perusahaan ?? $job->perusahaan }}
                        </p>

                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400 pt-1">
                            <span><i class="fa-solid fa-location-dot mr-1.5 text-slate-400"></i>{{ $job->lokasi ?? 'Indonesia' }}</span>
                            @if(!empty($job->gaji))
                                <span><i class="fa-solid fa-money-bill-wave mr-1.5 text-emerald-500"></i>{{ $job->gaji }}</span>
                            @endif
                            <span><i class="fa-regular fa-clock mr-1.5"></i>{{ $job->created_at?->diffForHumans() ?? 'Baru saja' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi / Detail -->
                <div class="flex items-center gap-3 shrink-0 self-end md:self-center">
                    @if(!empty($job->link_pendaftaran))
                        <a href="{{ $job->link_pendaftaran }}" target="_blank" class="bg-[#1E1B4B] hover:bg-[#2B1B40] text-white px-5 py-2.5 rounded-xl text-xs font-semibold transition-all shadow-sm flex items-center gap-2">
                            Lamar Sekarang <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </a>
                    @else
                        <button type="button" class="bg-slate-100 text-slate-700 hover:bg-slate-200 px-5 py-2.5 rounded-xl text-xs font-semibold transition-colors">
                            Detail Lowongan
                        </button>
                    @endif
                </div>

            </div>
        @empty
            <!-- Placeholder / Empty State -->
            @for ($j = 0; $j < 3; $j++)
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex items-center justify-center text-center min-h-[100px]">
                    <span class="text-xs text-slate-400 font-medium">Belum ada lowongan pekerjaan tersedia dari admin</span>
                </div>
            @endfor
        @endforelse
    </div>

    <!-- PAGINASI -->
    @if(isset($jobs) && method_exists($jobs, 'links'))
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    @endif

</main>

<!-- FOOTER -->
<x-footer />
