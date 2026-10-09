<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $alumni->nama }} - Tracer Study</title>

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
                <a href="{{ route('tracer') }}" class="hover:text-[#1E1B4B] transition-colors">Daftar Alumni</a>
                <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                <span class="text-slate-800 font-semibold">{{ $alumni->nama }}</span>
            </nav>

            <a href="{{ route('tracer') }}" 
               class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-[#314E6E] hover:text-[#1E1B4B] bg-white border border-slate-200 px-4 py-2 rounded-xl shadow-sm hover:border-slate-300 transition-all">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Daftar Alumni</span>
            </a>
        </div>

        <!-- PROFILE HEADER HERO CARD -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 relative overflow-hidden">
            <!-- Decorative Background Accent -->
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-gradient-to-br from-indigo-100 to-blue-50 rounded-full blur-2xl opacity-60 pointer-events-none"></div>

            <div class="flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-8 relative z-10 text-center md:text-left">
                
                <!-- Avatar Alumni -->
                <div class="w-28 h-28 sm:w-32 sm:sm-32 rounded-full bg-slate-100 ring-4 ring-[#314E6E]/15 overflow-hidden flex items-center justify-center shrink-0 shadow-md">
                    @if(!empty($alumni->foto_profil))
                        <img src="{{ asset('storage/' . $alumni->foto_profil) }}" alt="{{ $alumni->nama }}" class="w-full h-full object-cover">
                    @else
                        <i class="fa-solid fa-user text-5xl text-slate-400"></i>
                    @endif
                </div>

                <!-- Bio & Primary Meta -->
                <div class="grow space-y-3">
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2.5">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E1B4B] tracking-tight">
                            {{ $alumni->nama }}
                        </h1>
                        
                        @if($alumni->status_verifikasi === 'approved')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-full border border-emerald-200">
                                <i class="fa-solid fa-circle-check text-xs"></i> Terverifikasi
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-700 text-xs font-semibold rounded-full border border-amber-200">
                                <i class="fa-solid fa-clock text-xs"></i> Pending
                            </span>
                        @endif
                    </div>

                    <!-- Jurusan & Angkatan -->
                    <p class="text-sm sm:text-base text-slate-600 font-medium">
                        {{ $alumni->jurusan ?? 'Alumni' }} <span class="text-slate-300">•</span> Angkatan {{ $alumni->angkatan }} (Lulus {{ $alumni->tahun_lulus }})
                    </p>

                    <!-- Tempat Bekerja & Posisi Headline -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 pt-1">
                        @if(!empty($alumni->perusahaan_organisasi))
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-slate-100 rounded-xl text-xs sm:text-sm font-semibold text-slate-800">
                                <i class="fa-solid fa-building text-[#314E6E]"></i>
                                <span>{{ $alumni->perusahaan_organisasi }}</span>
                            </div>
                        @endif

                        @if(!empty($alumni->posisi_jabatan))
                            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-blue-50 text-[#314E6E] rounded-xl text-xs sm:text-sm font-semibold border border-blue-100">
                                <i class="fa-solid fa-briefcase text-xs"></i>
                                <span>{{ $alumni->posisi_jabatan }}</span>
                            </div>
                        @endif

                        <span class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-[#1E1B4B] rounded-xl text-xs font-semibold">
                            Status: {{ $alumni->status ?? 'Alumni' }}
                        </span>
                    </div>

                    <!-- Social / Action Buttons -->
                    @if(!empty($alumni->linkedin_url))
                        <div class="pt-2 flex items-center justify-center md:justify-start">
                            <a href="{{ $alumni->linkedin_url }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 bg-[#0A66C2] hover:bg-[#084e96] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm transition-colors">
                                <i class="fa-brands fa-linkedin text-sm"></i>
                                <span>Kunjungi Profil LinkedIn</span>
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                            </a>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <!-- GRID DETAIL CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KOLOM KIRI (2 Kolom) - DETAIL KARIR & AKADEMIK -->
            <div class="lg:col-span-2 space-y-6">

                <!-- 1. INFORMASI KARIR & TEMPAT BEKERJA (Sesuai Permintaan Utama) -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#314E6E] flex items-center justify-center font-bold">
                                <i class="fa-solid fa-briefcase text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-[#1E1B4B]">Informasi Karir & Pekerjaan</h2>
                                <p class="text-xs text-slate-500">Data tempat berkarir dan pekerjaan alumni saat ini</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-cyan-50 text-cyan-800 text-xs font-semibold rounded-full">
                            {{ $alumni->status ?? 'Aktif' }}
                        </span>
                    </div>

                    @if(!empty($alumni->perusahaan_organisasi) || !empty($alumni->posisi_jabatan))
                        <!-- Card Highlight Pekerjaan (Gaya Job Posting) -->
                        <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 mb-5 space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-[#314E6E] text-xl shrink-0 shadow-sm">
                                    <i class="fa-solid fa-building"></i>
                                </div>
                                <div class="grow">
                                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Perusahaan / Kantor</span>
                                    <h3 class="text-lg font-bold text-[#1E1B4B]">
                                        {{ $alumni->perusahaan_organisasi ?? 'Nama Perusahaan Belum Dicantumkan' }}
                                    </h3>
                                    @if(!empty($alumni->posisi_jabatan))
                                        <p class="text-sm font-semibold text-[#314E6E] mt-0.5">
                                            {{ $alumni->posisi_jabatan }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-3 border-t border-slate-200/60 text-xs">
                                <div class="flex items-center gap-2 text-slate-600">
                                    <i class="fa-solid fa-circle-info text-slate-400"></i>
                                    <span>Status Karir: <strong class="text-slate-800">{{ $alumni->status ?? '-' }}</strong></span>
                                </div>
                                @if(!empty($alumni->alamat))
                                    <div class="flex items-center gap-2 text-slate-600">
                                        <i class="fa-solid fa-location-dot text-slate-400"></i>
                                        <span>Lokasi / Alamat: <strong class="text-slate-800">{{ Str::limit($alumni->alamat, 35) }}</strong></span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                        <!-- State Jika Data Belum Lengkap -->
                        <div class="p-6 text-center bg-slate-50 rounded-2xl border border-dashed border-slate-200 text-slate-500 mb-4">
                            <i class="fa-solid fa-building-circle-exclamation text-3xl text-slate-300 mb-2"></i>
                            <p class="text-sm font-semibold text-slate-700">Informasi Tempat Bekerja Belum Diisi</p>
                            <p class="text-xs text-slate-500 mt-1">Alumni ini belum memperbarui data instansi atau perusahaan tempat bekerja.</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="p-3.5 bg-white border border-slate-200 rounded-xl">
                            <span class="text-slate-400 block text-[11px] mb-1">Status Tracer Saat Ini</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->status ?? '-' }}</span>
                        </div>
                        <div class="p-3.5 bg-white border border-slate-200 rounded-xl">
                            <span class="text-slate-400 block text-[11px] mb-1">Posisi / Jabatan</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->posisi_jabatan ?? 'Belum ada jabatan' }}</span>
                        </div>
                    </div>
                </div>

                <!-- 2. INFORMASI AKADEMIK -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-graduation-cap text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-[#1E1B4B]">Riwayat Pendidikan</h2>
                            <p class="text-xs text-slate-500">Informasi akademik semasa menempuh pendidikan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Jurusan / Program Studi</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->jurusan ?? '-' }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Tahun Angkatan</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->angkatan }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Tahun Kelulusan</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->tahun_lulus }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">NIM</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->nim ?? '-' }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">NISN</span>
                            <span class="font-bold text-slate-800 text-sm">{{ $alumni->nisn ?? '-' }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <span class="text-slate-400 text-xs block mb-1">Jenis Kelamin</span>
                            <span class="font-bold text-slate-800 text-sm">
                                {{ $alumni->jenis_kelamin === 'L' ? 'Laki-laki' : ($alumni->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- 3. KONTAK & DOMISILI -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-7">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-address-book text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-[#1E1B4B]">Kontak & Domisili</h2>
                            <p class="text-xs text-slate-500">Saluran komunikasi dan alamat domisili alumni</p>
                        </div>
                    </div>

                    <div class="space-y-4 text-xs sm:text-sm">
                        @if(!empty($alumni->no_hp))
                            <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-xl border border-slate-100">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <i class="fa-solid fa-phone text-[#314E6E] w-5 text-center"></i>
                                    <span>No. Handphone / WhatsApp</span>
                                </div>
                                <span class="font-semibold text-slate-900">{{ $alumni->no_hp }}</span>
                            </div>
                        @endif

                        @if(!empty($alumni->no_telp))
                            <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-xl border border-slate-100">
                                <div class="flex items-center gap-3 text-slate-700">
                                    <i class="fa-solid fa-square-phone text-[#314E6E] w-5 text-center"></i>
                                    <span>No. Telepon Rumah</span>
                                </div>
                                <span class="font-semibold text-slate-900">{{ $alumni->no_telp }}</span>
                            </div>
                        @endif

                        @if(!empty($alumni->alamat))
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                                <div class="flex items-center gap-2 text-slate-500 text-xs mb-1.5 font-medium">
                                    <i class="fa-solid fa-location-dot text-[#314E6E]"></i>
                                    <span>Alamat Lengkap</span>
                                </div>
                                <p class="text-slate-800 font-medium leading-relaxed">{{ $alumni->alamat }}</p>
                            </div>
                        @endif

                        @if(empty($alumni->no_hp) && empty($alumni->no_telp) && empty($alumni->alamat))
                            <p class="text-xs text-slate-400 italic">Kontak dan alamat belum dipublikasikan oleh alumni.</p>
                        @endif
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN (1 Kolom) - SIDEBAR LOWONGAN KERJA & ALUMNI TERKAIT -->
            <div class="space-y-6">

                <!-- 1. LOWONGAN KERJA TERBARU (Job Postings dari Admin) -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-bullhorn text-[#314E6E]"></i>
                            <h3 class="font-bold text-sm text-[#1E1B4B]">Peluang Karir</h3>
                        </div>
                        <a href="{{ url('/jobs') }}" class="text-[11px] font-semibold text-[#314E6E] hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-3">
                        @forelse($relatedJobs ?? [] as $job)
                            <div class="p-3.5 rounded-xl border border-slate-100 hover:border-slate-200 bg-slate-50/60 hover:bg-slate-50 transition-all">
                                <span class="px-2 py-0.5 bg-blue-100 text-[#314E6E] text-[10px] font-bold rounded-md">
                                    {{ $job->tipe ?? 'Pekerjaan' }}
                                </span>
                                <h4 class="font-bold text-xs text-[#1E1B4B] mt-1.5 line-clamp-1">
                                    {{ $job->judul_posisi }}
                                </h4>
                                <p class="text-[11px] text-slate-500 flex items-center gap-1 mt-0.5">
                                    <i class="fa-solid fa-building text-[10px]"></i>
                                    <span class="truncate">{{ $job->nama_perusahaan }}</span>
                                </p>
                                @if(!empty($job->link_pendaftaran))
                                    <a href="{{ $job->link_pendaftaran }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] font-semibold text-[#314E6E] hover:text-[#1E1B4B] mt-2">
                                        <span>Detail Lowongan</span>
                                        <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                    </a>
                                @endif
                            </div>
                        @empty
                            <p class="text-xs text-slate-400 py-3 text-center">Belum ada lowongan pekerjaan aktif.</p>
                        @endforelse
                    </div>
                </div>

                <!-- 2. ALUMNI LAINNYA DARI JURUSAN YANG SAMA -->
                @if(isset($otherAlumnis) && $otherAlumnis->count() > 0)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <div class="flex items-center gap-2.5 pb-3 mb-4 border-b border-slate-100">
                            <i class="fa-solid fa-user-group text-[#314E6E]"></i>
                            <h3 class="font-bold text-sm text-[#1E1B4B]">Alumni Jurusan Serupa</h3>
                        </div>

                        <div class="space-y-3">
                            @foreach($otherAlumnis as $other)
                                <a href="{{ route('tracer.detail', $other->id) }}" class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 transition-colors group">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden flex items-center justify-center shrink-0">
                                        @if(!empty($other->foto_profil))
                                            <img src="{{ asset('storage/' . $other->foto_profil) }}" alt="{{ $other->nama }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-user text-slate-400 text-sm"></i>
                                        @endif
                                    </div>
                                    <div class="grow min-w-0">
                                        <h4 class="font-bold text-xs text-[#1E1B4B] group-hover:text-[#314E6E] transition-colors truncate">
                                            {{ $other->nama }}
                                        </h4>
                                        <p class="text-[11px] text-slate-500 truncate">
                                            {{ $other->perusahaan_organisasi ?? ('Angkatan ' . $other->angkatan) }}
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
