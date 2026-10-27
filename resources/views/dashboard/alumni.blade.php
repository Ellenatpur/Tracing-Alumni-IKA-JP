@extends('layouts.dashboard')

@section('title', 'Direktori Alumni')
@section('header_title', 'Direktori Rekan Alumni')
@section('header_subtitle', 'Cari dan terhubung kembali dengan teman satu angkatan maupun lintas jurusan')

@section('content')
<div class="space-y-6">

    <!-- SEARCH & FILTER BAR -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs">
        <form action="{{ route('dashboard.alumni') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <div class="sm:col-span-6 relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama alumni atau perusahaan..."
                       class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
            </div>

            <div class="sm:col-span-3">
                <input type="text" name="jurusan" value="{{ request('jurusan') }}" placeholder="Filter jurusan..."
                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
            </div>

            <div class="sm:col-span-3 flex items-center gap-2">
                <button type="submit" class="flex-1 py-2.5 px-4 bg-[#1D63ED] hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-xs transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-filter text-xs"></i>
                    <span>Terapkan</span>
                </button>
                @if(request()->has('q') || request()->has('jurusan'))
                    <a href="{{ route('dashboard.alumni') }}" class="py-2.5 px-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition-colors">
                        Reset
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- ALUMNI GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse($alumnis as $alumniItem)
            <div class="bg-white rounded-3xl border border-slate-200/80 p-5 shadow-xs hover:border-blue-300 hover:shadow-md transition-all flex flex-col justify-between text-center space-y-4">
                
                <div class="space-y-3">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-linear-to-tr from-[#1D63ED] to-indigo-600 text-white flex items-center justify-center text-xl font-extrabold shadow-sm uppercase">
                        @if(!empty($alumniItem->foto_profil))
                            <img src="{{ asset('storage/' . $alumniItem->foto_profil) }}" class="w-full h-full object-cover rounded-2xl">
                        @else
                            {{ substr($alumniItem->nama, 0, 2) }}
                        @endif
                    </div>

                    <div>
                        <h4 class="font-extrabold text-sm text-slate-900 truncate">{{ $alumniItem->nama }}</h4>
                        <p class="text-xs text-slate-500 truncate mt-0.5">{{ $alumniItem->jurusan ?? 'Alumni' }}</p>
                    </div>

                    <div class="pt-2 border-t border-slate-100 space-y-1 text-xs">
                        <div class="flex items-center justify-center gap-1.5 text-slate-600 font-medium">
                            <i class="fa-solid fa-graduation-cap text-slate-400 text-[11px]"></i>
                            <span>Lulus Tahun {{ $alumniItem->tahun_lulus }}</span>
                        </div>
                        <div class="text-[11px] text-[#1D63ED] font-semibold truncate">
                            {{ $alumniItem->status ?? 'Alumni Terverifikasi' }}
                            @if(!empty($alumniItem->perusahaan_organisasi))
                                • {{ $alumniItem->perusahaan_organisasi }}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="{{ route('tracer.detail', $alumniItem->id) }}" target="_blank"
                       class="w-full py-2 px-3 bg-blue-50 hover:bg-blue-100 text-[#1D63ED] font-bold text-xs rounded-xl transition-colors flex items-center justify-center gap-1.5">
                        <span>Lihat Profil</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>

            </div>
        @empty
            <div class="col-span-full bg-white rounded-3xl border border-slate-200/80 p-12 text-center text-slate-400">
                <i class="fa-solid fa-users-slash text-4xl mb-3 text-slate-300 block"></i>
                <h4 class="font-bold text-slate-700 text-base">Tidak Ada Alumni Ditemukan</h4>
                <p class="text-xs text-slate-500 mt-1">Coba gunakan filter pencarian lainnya.</p>
            </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="pt-4">
        {{ $alumnis->links() }}
    </div>

</div>
@endsection
