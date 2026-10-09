<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->judul_posisi }} di {{ $job->nama_perusahaan }} - Lowongan Kerja</title>

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
                <a href="{{ route('jobs') }}" class="hover:text-[#1E1B4B] transition-colors">Lowongan Kerja</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <span class="text-slate-800 font-semibold truncate max-w-[200px] sm:max-w-xs">{{ $job->judul_posisi }}</span>
            </nav>

            <a href="{{ route('jobs') }}" 
               class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#314E6E] hover:text-[#1E1B4B] bg-white border border-slate-200 px-4 py-2 rounded-xl shadow-sm hover:border-slate-300 transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Lowongan</span>
            </a>
        </div>

        <!-- JOB HEADER HERO CARD -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 relative overflow-hidden">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                
                <div class="flex items-start sm:items-center gap-5">
                    <!-- Logo / Avatar Perusahaan -->
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-100 rounded-2xl flex items-center justify-center text-[#314E6E] text-2xl sm:text-3xl font-bold border border-slate-200 shrink-0 shadow-sm overflow-hidden">
                        @if(!empty($job->logo_perusahaan))
                            <img src="{{ asset('storage/' . $job->logo_perusahaan) }}" alt="{{ $job->nama_perusahaan }}" class="w-full h-full object-cover">
                        @else
                            <i class="fa-solid fa-building"></i>
                        @endif
                    </div>

                    <!-- Judul & Detail Utama -->
                    <div class="space-y-1.5">
                        <div class="flex flex-wrap items-center gap-2.5">
                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-[#1E1B4B] tracking-tight">
                                {{ $job->judul_posisi }}
                            </h1>
                            <span class="px-3 py-1 bg-cyan-50 text-cyan-700 text-xs font-semibold rounded-full border border-cyan-100">
                                {{ $job->tipe ?? 'Pekerjaan' }}
                            </span>
                        </div>

                        <p class="text-sm sm:text-base font-semibold text-slate-600 flex items-center gap-2">
                            <span>{{ $job->nama_perusahaan }}</span>
                            @if(!empty($job->lokasi))
                                <span class="text-slate-300">•</span>
                                <span class="text-slate-500 font-normal flex items-center gap-1 text-xs sm:text-sm">
                                    <i class="fa-solid fa-location-dot text-slate-400"></i> {{ $job->lokasi }}
                                </span>
                            @endif
                        </p>

                        <p class="text-xs text-slate-400 flex items-center gap-3 pt-1">
                            <span><i class="fa-regular fa-clock mr-1"></i> Diposting {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                            <span>•</span>
                            <span><i class="fa-solid fa-circle-check mr-1 text-emerald-500"></i> Lowongan Terverifikasi</span>
                        </p>
                    </div>
                </div>

                <!-- Tombol Aksi Utama -->
                <div class="flex flex-wrap items-center gap-3 w-full md:w-auto shrink-0 pt-3 md:pt-0 border-t md:border-t-0 border-slate-100">
                    @if(!empty($job->link_pendaftaran ?? $job->link_lamaran))
                        <a href="{{ $job->link_pendaftaran ?? $job->link_lamaran }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full sm:w-auto bg-[#314E6E] hover:bg-[#253d57] text-white text-xs sm:text-sm font-semibold px-6 py-3 rounded-xl shadow-sm transition-all flex items-center justify-center gap-2">
                            <span>Lamar Sekarang</span>
                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                        </a>
                    @endif

                    <button type="button" 
                            onclick="navigator.clipboard.writeText(window.location.href); alert('Link lowongan berhasil disalin!');"
                            class="w-full sm:w-auto bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs sm:text-sm font-semibold px-4 py-3 rounded-xl transition-colors flex items-center justify-center gap-2">
                        <i class="fa-regular fa-share-from-square"></i>
                        <span>Bagikan</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- GRID DETAIL CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KOLOM KIRI (2 Kolom) - DESKRIPSI & PERSYARATAN -->
            <div class="lg:col-span-2 space-y-6">

                <!-- 1. DESKRIPSI PEKERJAAN LENGKAP -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#314E6E] flex items-center justify-center font-bold">
                            <i class="fa-solid fa-file-lines text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-[#1E1B4B]">Deskripsi & Persyaratan Pekerjaan</h2>
                            <p class="text-xs text-slate-500">Rincian tanggung jawab dan kualifikasi yang dicari</p>
                        </div>
                    </div>

                    <div class="text-slate-700 text-sm sm:text-base leading-relaxed space-y-4 whitespace-pre-line">
                        {!! nl2br(e($job->deskripsi)) !!}
                    </div>

                    @if(!empty($job->link_pendaftaran ?? $job->link_lamaran))
                        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
                            <div class="text-xs text-slate-500">
                                Tertarik dengan posisi ini? Segera kirimkan lamaran sebelum kuota terpenuhi.
                            </div>
                            <a href="{{ $job->link_pendaftaran ?? $job->link_lamaran }}" 
                               target="_blank" 
                               class="bg-[#1E1B4B] hover:bg-[#2B1B40] text-white text-xs sm:text-sm font-semibold px-5 py-2.5 rounded-xl transition-all shadow-sm inline-flex items-center gap-2">
                                Lamar Sekarang <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- 2. RINGKASAN INFORMASI PEKERJAAN -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <h3 class="text-base font-bold text-[#1E1B4B] mb-4 pb-3 border-b border-slate-100">
                        Ringkasan Lowongan
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Perusahaan / Mitra</span>
                            <span class="font-bold text-slate-800">{{ $job->nama_perusahaan }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Posisi / Jabatan</span>
                            <span class="font-bold text-slate-800">{{ $job->judul_posisi }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Tipe Lowongan</span>
                            <span class="font-bold text-slate-800">{{ $job->tipe ?? 'Pekerjaan' }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Lokasi Penempatan</span>
                            <span class="font-bold text-slate-800">{{ $job->lokasi ?? 'Indonesia / Remote' }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Tanggal Dipublikasikan</span>
                            <span class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($job->created_at)->format('d F Y') }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Status Lowongan</span>
                            <span class="font-bold text-emerald-600 flex items-center gap-1.5">
                                <i class="fa-solid fa-circle text-[8px]"></i> Masih Aktif
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN (1 Kolom) - SIDEBAR LOWONGAN LAIN & ALUMNI -->
            <div class="space-y-6">

                <!-- 1. LOWONGAN LAINNYA -->
                @if(isset($otherJobs) && $otherJobs->count() > 0)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-briefcase text-[#314E6E]"></i>
                                <h3 class="font-bold text-sm text-[#1E1B4B]">Lowongan Lainnya</h3>
                            </div>
                            <a href="{{ route('jobs') }}" class="text-[11px] font-semibold text-[#314E6E] hover:underline">
                                Lihat Semua
                            </a>
                        </div>

                        <div class="space-y-3">
                            @foreach($otherJobs as $other)
                                <a href="{{ route('jobs.detail', $other->id) }}" class="block p-3 rounded-xl bg-slate-50/60 hover:bg-slate-50 border border-slate-100 hover:border-slate-200 transition-all group">
                                    <span class="px-2 py-0.5 bg-blue-100 text-[#314E6E] text-[10px] font-bold rounded-md">
                                        {{ $other->tipe ?? 'Pekerjaan' }}
                                    </span>
                                    <h4 class="font-bold text-xs text-[#1E1B4B] group-hover:text-[#314E6E] transition-colors mt-1.5 truncate">
                                        {{ $other->judul_posisi }}
                                    </h4>
                                    <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                        {{ $other->nama_perusahaan }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 2. ALUMNI DI INDUSTRI TERKAIT -->
                @if(isset($relatedAlumnis) && $relatedAlumnis->count() > 0)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-user-tie text-[#314E6E]"></i>
                                <h3 class="font-bold text-sm text-[#1E1B4B]">Alumni Yang Bekerja</h3>
                            </div>
                            <a href="{{ route('tracer') }}" class="text-[11px] font-semibold text-[#314E6E] hover:underline">
                                Tracer Alumni
                            </a>
                        </div>

                        <div class="space-y-3">
                            @foreach($relatedAlumnis as $alumni)
                                <a href="{{ route('tracer.detail', $alumni->id) }}" class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden flex items-center justify-center shrink-0">
                                        @if(!empty($alumni->foto_profil))
                                            <img src="{{ asset('storage/' . $alumni->foto_profil) }}" alt="{{ $alumni->nama }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-user text-slate-400 text-sm"></i>
                                        @endif
                                    </div>
                                    <div class="grow min-w-0">
                                        <h4 class="font-bold text-xs text-[#1E1B4B] group-hover:text-[#314E6E] transition-colors truncate">
                                            {{ $alumni->nama }}
                                        </h4>
                                        <p class="text-[11px] text-slate-500 truncate">
                                            {{ $alumni->perusahaan_organisasi ?? $alumni->posisi_jabatan }}
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-[10px] text-slate-300 group-hover:text-slate-600 transition-colors"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>
