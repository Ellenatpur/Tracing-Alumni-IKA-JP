@extends('layouts.dashboard')

@section('title', 'Agenda & Event')
@section('header_title', 'Agenda & Kegiatan Alumni')
@section('header_subtitle', 'Jadwal temu alumni, workshop karir, webinar, dan agenda kampus')

@section('content')
<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($events as $event)
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:border-purple-300 hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-purple-50 text-purple-700 uppercase border border-purple-100">
                            Agenda Kampus
                        </span>
                        <div class="text-right">
                            <span class="text-xs font-bold text-slate-800 block">
                                {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <h3 class="font-bold text-base text-slate-900 leading-snug">
                        {{ $event->nama_event ?? $event->title }}
                    </h3>

                    <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($event->deskripsi ?? 'Kegiatan resmi untuk mempererat hubungan alumni dan almamater.'), 120) }}
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-100 flex flex-col gap-2 text-xs text-slate-500">
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-clock text-slate-400 w-4"></i>
                        <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('H:i') }} WIB</span>
                    </div>
                    @if(!empty($event->lokasi))
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-location-dot text-slate-400 w-4"></i>
                            <span class="truncate">{{ $event->lokasi }}</span>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-3xl border border-slate-200/80 p-12 text-center text-slate-400">
                <i class="fa-solid fa-calendar-xmark text-4xl mb-3 text-slate-300 block"></i>
                <h4 class="font-bold text-slate-700 text-base">Belum Ada Agenda Mendatang</h4>
                <p class="text-xs text-slate-500 mt-1">Nantikan pembaruan jadwal kegiatan berikutnya.</p>
            </div>
        @endforelse
    </div>

    <div class="pt-4">
        {{ $events->links() }}
    </div>

</div>
@endsection
