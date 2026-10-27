@extends('layouts.dashboard')

@section('title', 'Lowongan Karir')
@section('header_title', 'Lowongan Karir & Pekerjaan')
@section('header_subtitle', 'Peluang pekerjaan eksklusif dari jaringan mitra kampus dan alumni')

@section('content')
<div class="space-y-6">

    <!-- SEARCH & FILTER BAR -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs">
        <form action="{{ route('dashboard.jobs') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-1 w-full">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari posisi kerja, nama perusahaan, atau kata kunci..."
                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[#1D63ED] hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-xs transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-filter text-xs"></i>
                    <span>Cari</span>
                </button>
                @if(request()->has('q'))
                    <a href="{{ route('dashboard.jobs') }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- JOB CARDS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($jobs as $job)
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:border-blue-400 hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between gap-2">
                        <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-blue-50 text-[#1D63ED] uppercase border border-blue-100">
                            {{ $job->tipe ?? 'Full Time' }}
                        </span>
                        <span class="text-[11px] text-slate-400">
                            {{ $job->created_at?->diffForHumans() }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-bold text-base text-slate-900 leading-snug hover:text-[#1D63ED] transition-colors">
                            <a href="{{ route('jobs.detail', $job->id) }}" target="_blank">
                                {{ $job->judul_posisi ?? $job->posisi }}
                            </a>
                        </h3>
                        <p class="text-xs font-semibold text-slate-600 mt-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-building text-slate-400 text-xs"></i>
                            <span>{{ $job->nama_perusahaan ?? $job->perusahaan }}</span>
                        </p>
                    </div>

                    <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($job->deskripsi ?? 'Informasi lowongan kerja dari mitra alumni.'), 120) }}
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs text-slate-500 flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400 text-xs"></i>
                        <span class="truncate max-w-[120px]">{{ $job->lokasi ?? 'Indonesia' }}</span>
                    </span>

                    <a href="{{ route('jobs.detail', $job->id) }}" target="_blank"
                       class="px-3.5 py-1.5 bg-blue-50 hover:bg-blue-100 text-[#1D63ED] font-bold text-xs rounded-lg transition-colors flex items-center gap-1">
                        <span>Lamar / Detail</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-3xl border border-slate-200/80 p-12 text-center text-slate-400">
                <i class="fa-solid fa-briefcase text-4xl mb-3 text-slate-300 block"></i>
                <h4 class="font-bold text-slate-700 text-base">Tidak ada lowongan ditemukan</h4>
                <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
            </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="pt-4">
        {{ $jobs->links() }}
    </div>

</div>
@endsection
