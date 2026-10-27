@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('header_title', 'Ringkasan Dashboard')
@section('header_subtitle', 'Selamat datang kembali di panel khusus alumni')

@section('content')
<div class="space-y-6">

    <!-- HERO BANNER -->
    <div class="relative overflow-hidden rounded-3xl bg-linear-to-r from-[#1E1B4B] via-[#2A2150] to-[#1D63ED] text-white p-6 sm:p-8 shadow-lg shadow-indigo-950/20">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs font-semibold text-cyan-300">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                    <span>Portal Tracer Study & Karir</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Halo, {{ $user->name }}! 👋
                </h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Senang melihat Anda kembali. Pantau perkembangan karir rekan alumni, temukan lowongan pekerjaan impian, dan pastikan data penelusuran lulusan Anda selalu mutakhir.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-3">
                    <a href="{{ route('dashboard.profile') }}"
                       class="px-5 py-2.5 bg-[#4DD0C2] hover:bg-[#3ec1b3] text-[#1E1B4B] font-bold text-xs rounded-xl shadow-md transition-all flex items-center gap-2">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Lengkapi Profil Alumni</span>
                    </a>
                    <a href="{{ route('dashboard.tracer') }}"
                       class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white font-semibold text-xs rounded-xl transition-all border border-white/20 flex items-center gap-2">
                        <i class="fa-solid fa-clipboard-check"></i>
                        <span>Isi Kuesioner Tracer</span>
                    </a>
                </div>
            </div>

            <!-- Ilustrasi / Badge Profil Kanan -->
            <div class="hidden lg:flex flex-col items-center justify-center p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 min-w-[200px] text-center">
                <div class="w-16 h-16 rounded-full bg-linear-to-tr from-cyan-400 to-blue-500 text-[#1E1B4B] flex items-center justify-center text-2xl font-black shadow-lg mb-2 uppercase">
                    {{ substr($user->name, 0, 2) }}
                </div>
                <h4 class="text-sm font-bold text-white truncate max-w-[180px]">{{ $user->name }}</h4>
                @if($alumni && $alumni->status_verifikasi === 'approved')
                    <span class="mt-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-400/20 text-emerald-300 border border-emerald-400/30">
                        <i class="fa-solid fa-circle-check text-[9px] mr-1"></i> Terverifikasi
                    </span>
                @else
                    <span class="mt-1 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-400/20 text-amber-300 border border-amber-400/30">
                        <i class="fa-solid fa-clock text-[9px] mr-1"></i> Menunggu Verifikasi
                    </span>
                @endif
            </div>
        </div>

        <!-- Background Glow Accent -->
        <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    </div>

    <!-- STATS METRIC CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Card 1: Status Verifikasi -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-slate-500">Status Akun Alumni</span>
                <div class="flex items-center gap-2">
                    @if($alumni && $alumni->status_verifikasi === 'approved')
                        <span class="text-base font-extrabold text-emerald-600">Terverifikasi</span>
                    @else
                        <span class="text-base font-extrabold text-amber-500">Pending</span>
                    @endif
                </div>
                <p class="text-[11px] text-slate-400">{{ $alumni->jurusan ?? 'Alumni Terdaftar' }}</p>
            </div>
            <div class="w-12 h-12 rounded-2xl {{ $alumni && $alumni->status_verifikasi === 'approved' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-500' }} flex items-center justify-center text-xl shadow-xs">
                <i class="fa-solid {{ $alumni && $alumni->status_verifikasi === 'approved' ? 'fa-id-card-clip' : 'fa-hourglass-half' }}"></i>
            </div>
        </div>

        <!-- Card 2: Total Alumni -->
        <a href="{{ route('dashboard.alumni') }}" class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:border-blue-300 hover:shadow-md transition-all flex items-center justify-between group">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-slate-500">Total Rekan Alumni</span>
                <div class="text-2xl font-black text-slate-800">{{ $totalAlumni }}</div>
                <p class="text-[11px] text-blue-600 group-hover:underline flex items-center gap-1 font-semibold">
                    <span>Lihat direktori</span>
                    <i class="fa-solid fa-arrow-right text-[9px]"></i>
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#1D63ED] flex items-center justify-center text-xl shadow-xs group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-users"></i>
            </div>
        </a>

        <!-- Card 3: Lowongan Aktif -->
        <a href="{{ route('dashboard.jobs') }}" class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:border-teal-300 hover:shadow-md transition-all flex items-center justify-between group">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-slate-500">Lowongan Karir Aktif</span>
                <div class="text-2xl font-black text-slate-800">{{ $totalJobs }}</div>
                <p class="text-[11px] text-teal-600 group-hover:underline flex items-center gap-1 font-semibold">
                    <span>Eksplor lowongan</span>
                    <i class="fa-solid fa-arrow-right text-[9px]"></i>
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl shadow-xs group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-briefcase"></i>
            </div>
        </a>

        <!-- Card 4: Event Mendatang -->
        <a href="{{ route('dashboard.events') }}" class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-xs hover:border-purple-300 hover:shadow-md transition-all flex items-center justify-between group">
            <div class="space-y-1">
                <span class="text-xs font-semibold text-slate-500">Agenda & Event</span>
                <div class="text-2xl font-black text-slate-800">{{ $totalEvents }}</div>
                <p class="text-[11px] text-purple-600 group-hover:underline flex items-center gap-1 font-semibold">
                    <span>Cek jadwal kegiatan</span>
                    <i class="fa-solid fa-arrow-right text-[9px]"></i>
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl shadow-xs group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
        </a>

    </div>

    <!-- MAIN TWO-COLUMN CONTENT GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- LEFT COLUMN (8 COLS): JOBS & EVENTS -->
        <div class="lg:col-span-8 space-y-6">

            <!-- LOWONGAN TERBARU SECTION -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center text-sm font-bold">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-base">Lowongan Karir Terbaru</h3>
                            <p class="text-xs text-slate-500">Peluang pekerjaan aktif dari mitra kampus</p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.jobs') }}" class="text-xs font-bold text-[#1D63ED] hover:underline flex items-center gap-1">
                        <span>Semua Lowongan</span>
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @forelse($recentJobs as $job)
                        <div class="p-4 rounded-2xl border border-slate-200/80 hover:border-blue-400 hover:shadow-md transition-all flex flex-col justify-between space-y-3 bg-slate-50/50">
                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-blue-100 text-[#1D63ED] uppercase">
                                        {{ $job->tipe ?? 'Penuh Waktu' }}
                                    </span>
                                    <span class="text-[10px] text-slate-400">
                                        {{ $job->created_at?->diffForHumans() }}
                                    </span>
                                </div>
                                <h4 class="font-bold text-sm text-slate-900 leading-snug hover:text-[#1D63ED] transition-colors">
                                    <a href="{{ route('jobs.detail', $job->id) }}" target="_blank">
                                        {{ $job->judul_posisi ?? $job->posisi }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-600 font-medium flex items-center gap-1.5">
                                    <i class="fa-solid fa-building text-slate-400 text-[11px]"></i>
                                    <span>{{ $job->nama_perusahaan ?? $job->perusahaan }}</span>
                                </p>
                            </div>

                            <div class="pt-3 border-t border-slate-200/60 flex items-center justify-between text-xs">
                                <span class="text-slate-500 flex items-center gap-1">
                                    <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i>
                                    <span>{{ $job->lokasi ?? 'Indonesia' }}</span>
                                </span>
                                <a href="{{ route('jobs.detail', $job->id) }}" target="_blank"
                                   class="text-xs font-bold text-[#1D63ED] hover:underline">
                                    Detail <i class="fa-solid fa-arrow-right text-[9px] ml-0.5"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 py-8 text-center text-slate-400 text-xs">
                            <i class="fa-solid fa-folder-open text-2xl mb-2 text-slate-300 block"></i>
                            Belum ada lowongan pekerjaan aktif saat ini.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- AGENDA & EVENT TERDEKAT -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-7 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-sm font-bold">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-base">Agenda & Event Terdekat</h3>
                            <p class="text-xs text-slate-500">Reuni, seminar karir, dan agenda kampus</p>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.events') }}" class="text-xs font-bold text-[#1D63ED] hover:underline flex items-center gap-1">
                        <span>Semua Event</span>
                        <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($recentEvents as $event)
                        <div class="p-4 rounded-2xl border border-slate-200/80 hover:bg-slate-50 transition-colors flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-purple-50 border border-purple-100 text-purple-700 flex flex-col items-center justify-center shrink-0">
                                    <span class="text-[10px] font-bold uppercase leading-none">
                                        {{ \Carbon\Carbon::parse($event->tanggal_event)->format('M') }}
                                    </span>
                                    <span class="text-lg font-black leading-tight">
                                        {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d') }}
                                    </span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-slate-900 leading-snug">
                                        {{ $event->nama_event ?? $event->title }}
                                    </h4>
                                    <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 mt-1">
                                        <span class="flex items-center gap-1">
                                            <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i>
                                            <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('H:i') }} WIB</span>
                                        </span>
                                        @if(!empty($event->lokasi))
                                            <span class="flex items-center gap-1">
                                                <i class="fa-solid fa-location-dot text-slate-400 text-[10px]"></i>
                                                <span>{{ $event->lokasi }}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <span class="hidden sm:inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-full text-xs font-semibold">
                                Terbuka
                            </span>
                        </div>
                    @empty
                        <div class="py-8 text-center text-slate-400 text-xs">
                            <i class="fa-solid fa-calendar-xmark text-2xl mb-2 text-slate-300 block"></i>
                            Belum ada jadwal event terdekat.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN (4 COLS): PROFIL SINGKAT & REKAN ALUMNI -->
        <div class="lg:col-span-4 space-y-6">

            <!-- KARTU PROFIL ALUMNI SAYA -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Profil Alumni Saya</h3>
                    <a href="{{ route('dashboard.profile') }}" class="text-xs font-bold text-[#1D63ED] hover:underline">
                        Edit
                    </a>
                </div>

                <div class="text-center space-y-2">
                    <div class="w-20 h-20 mx-auto rounded-2xl bg-linear-to-tr from-[#1D63ED] to-indigo-600 text-white flex items-center justify-center text-2xl font-extrabold shadow-md uppercase">
                        @if(!empty($alumni?->foto_profil))
                            <img src="{{ asset('storage/' . $alumni->foto_profil) }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-2xl">
                        @else
                            {{ substr($user->name, 0, 2) }}
                        @endif
                    </div>
                    <div>
                        <h4 class="font-extrabold text-base text-slate-900">{{ $user->name }}</h4>
                        <p class="text-xs text-slate-500">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 space-y-2.5 text-xs text-slate-600 border border-slate-100">
                    <div class="flex justify-between">
                        <span class="text-slate-400">NIM / Nomor Induk</span>
                        <span class="font-bold text-slate-800">{{ $alumni->nim ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Jurusan</span>
                        <span class="font-bold text-slate-800">{{ $alumni->jurusan ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Angkatan / Lulus</span>
                        <span class="font-bold text-slate-800">{{ $alumni->angkatan ?? '-' }} / {{ $alumni->tahun_lulus ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400">Aktivitas Saat Ini</span>
                        <span class="font-bold text-[#1D63ED]">{{ $alumni->status ?? 'Belum Diisi' }}</span>
                    </div>
                    @if(!empty($alumni?->perusahaan_organisasi))
                        <div class="flex justify-between">
                            <span class="text-slate-400">Tempat Kerja / Kampus</span>
                            <span class="font-bold text-slate-800 truncate max-w-[140px]">{{ $alumni->perusahaan_organisasi }}</span>
                        </div>
                    @endif
                </div>

                <a href="{{ route('dashboard.profile') }}"
                   class="w-full py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                    <span>Perbarui Data Profil</span>
                </a>
            </div>

            <!-- REKAN ALUMNI TERHUBUNG -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Rekan Alumni Terbaru</h3>
                    <a href="{{ route('dashboard.alumni') }}" class="text-xs font-bold text-[#1D63ED] hover:underline">
                        Lihat Semua
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($networkAlumni as $peer)
                        <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 transition-colors">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1D63ED] flex items-center justify-center font-bold text-xs uppercase shrink-0">
                                @if(!empty($peer->foto_profil))
                                    <img src="{{ asset('storage/' . $peer->foto_profil) }}" class="w-full h-full object-cover rounded-xl">
                                @else
                                    {{ substr($peer->nama, 0, 2) }}
                                @endif
                            </div>
                            <div class="overflow-hidden flex-1">
                                <h5 class="text-xs font-bold text-slate-900 truncate">{{ $peer->nama }}</h5>
                                <p class="text-[11px] text-slate-500 truncate">{{ $peer->jurusan ?? 'Alumni' }} • {{ $peer->tahun_lulus }}</p>
                            </div>
                            <a href="{{ route('tracer.detail', $peer->id) }}" target="_blank"
                               class="text-[11px] text-blue-600 hover:text-blue-800 font-semibold p-1"
                               title="Lihat Profil">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-4">Belum ada rekan alumni lain.</p>
                    @endforelse
                </div>
            </div>

            <!-- BANTUAN & PUSAT KARIR -->
            <div class="bg-linear-to-br from-indigo-50 to-blue-50 rounded-3xl border border-blue-100 p-6 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-[#1D63ED] text-white flex items-center justify-center text-lg shadow-sm">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h4 class="font-bold text-sm text-slate-900">Butuh Bantuan Tracer Study?</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Jika ada kendala verifikasi data kelulusan atau ingin membagikan lowongan karir alumni, silakan hubungi pusat karir almamater.
                </p>
                <div class="pt-1">
                    <a href="mailto:alumni@kampus.ac.id" class="text-xs font-bold text-[#1D63ED] hover:underline flex items-center gap-1.5">
                        <i class="fa-regular fa-envelope"></i>
                        <span>alumni@kampus.ac.id</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
