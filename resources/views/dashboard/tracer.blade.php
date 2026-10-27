@extends('layouts.dashboard')

@section('title', 'Kuesioner Tracer')
@section('header_title', 'Kuesioner Tracer Study')
@section('header_subtitle', 'Partisipasi survei lulusan untuk peningkatan mutu kurikulum dan akreditasi')

@section('content')
<div class="max-w-4xl space-y-6">

    <!-- INFO BANNER -->
    <div class="bg-gradient-to-r from-blue-900 to-indigo-800 rounded-3xl p-6 sm:p-8 text-white shadow-md flex flex-col sm:flex-row items-center gap-6">
        <div class="w-16 h-16 rounded-2xl bg-white/10 text-cyan-300 flex items-center justify-center text-3xl shrink-0">
            <i class="fa-solid fa-clipboard-list"></i>
        </div>
        <div class="space-y-1.5 text-center sm:text-left">
            <h3 class="text-lg sm:text-xl font-bold">Survei Pelacakan Jejak Alumni</h3>
            <p class="text-xs sm:text-sm text-slate-200 leading-relaxed">
                Jawaban Anda sangat berharga bagi evaluasi relevansi kurikulum, fasilitas pembelajaran, dan peningkatan mutu lulusan di masa depan.
            </p>
        </div>
    </div>

    <!-- FORM KUESIONER TRACER -->
    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
        
        <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
            <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold text-sm">
                <i class="fa-solid fa-square-poll-vertical"></i>
            </div>
            <div>
                <h3 class="font-bold text-base text-slate-900">Pertanyaan Relevansi & Karir</h3>
                <p class="text-xs text-slate-500">Lengkapi data transisi dari dunia pendidikan ke dunia kerja</p>
            </div>
        </div>

        <form action="{{ route('dashboard.profile.update') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="name" value="{{ $user->name }}">
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="hidden" name="jenis_kelamin" value="{{ $alumni->jenis_kelamin ?? 'L' }}">
            <input type="hidden" name="angkatan" value="{{ $alumni->angkatan ?? date('Y')-3 }}">
            <input type="hidden" name="tahun_lulus" value="{{ $alumni->tahun_lulus ?? date('Y') }}">

            <!-- Pertanyaan 1: Status Bekerja -->
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2">
                    1. Bagaimana status aktivitas utama Anda saat ini? <span class="text-rose-500">*</span>
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                    @php $st = strtolower($alumni->status ?? ''); @endphp
                    <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="status" value="Bekerja" {{ $st == 'bekerja' ? 'checked' : '' }} class="text-[#1D63ED] focus:ring-[#1D63ED]">
                        <span class="text-xs font-medium text-slate-700">Bekerja (Karyawan Swasta/PNS/BUMN)</span>
                    </label>
                    <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="status" value="Wirausaha" {{ $st == 'wirausaha' ? 'checked' : '' }} class="text-[#1D63ED] focus:ring-[#1D63ED]">
                        <span class="text-xs font-medium text-slate-700">Wirausaha / Membuka Usaha Sendiri</span>
                    </label>
                    <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="status" value="Kuliah" {{ $st == 'kuliah' ? 'checked' : '' }} class="text-[#1D63ED] focus:ring-[#1D63ED]">
                        <span class="text-xs font-medium text-slate-700">Melanjutkan Studi (Kuliah S1/S2/Profesi)</span>
                    </label>
                    <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="status" value="Mencari Kerja" {{ $st == 'mencari kerja' ? 'checked' : '' }} class="text-[#1D63ED] focus:ring-[#1D63ED]">
                        <span class="text-xs font-medium text-slate-700">Sedang Mencari Pekerjaan</span>
                    </label>
                </div>
            </div>

            <!-- Pertanyaan 2: Nama Tempat Bekerja / Kampus -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                <div>
                    <label for="perusahaan_organisasi" class="block text-xs font-bold text-slate-700 mb-1.5">
                        2. Nama Tempat Bekerja / Kampus Lanjutan
                    </label>
                    <input type="text" name="perusahaan_organisasi" id="perusahaan_organisasi" value="{{ old('perusahaan_organisasi', $alumni->perusahaan_organisasi ?? '') }}"
                           placeholder="Contoh: PT Telkom / Universitas Brawijaya"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="posisi_jabatan" class="block text-xs font-bold text-slate-700 mb-1.5">
                        3. Jabatan / Posisi / Program Studi
                    </label>
                    <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan', $alumni->posisi_jabatan ?? '') }}"
                           placeholder="Contoh: Junior Programmer / Mahasiswa"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>
            </div>

            <!-- Pertanyaan 4: Keselarasan Jurusan -->
            <div class="pt-2">
                <label class="block text-xs font-bold text-slate-700 mb-2">
                    4. Seberapa erat hubungan antara bidang studi Anda dengan pekerjaan Anda saat ini?
                </label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                    <label class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="keselarasan" value="Sangat Erat" checked class="text-[#1D63ED]">
                        <span>Sangat Erat</span>
                    </label>
                    <label class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="keselarasan" value="Erat" class="text-[#1D63ED]">
                        <span>Erat</span>
                    </label>
                    <label class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="keselarasan" value="Cukup Erat" class="text-[#1D63ED]">
                        <span>Cukup Erat</span>
                    </label>
                    <label class="p-3 rounded-xl border border-slate-200 hover:bg-slate-50 flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="keselarasan" value="Kurang Erat" class="text-[#1D63ED]">
                        <span>Kurang Erat</span>
                    </label>
                </div>
            </div>

            <!-- Saran / Masukan Kurikulum -->
            <div class="pt-2">
                <label for="masukan" class="block text-xs font-bold text-slate-700 mb-1.5">
                    5. Saran & Masukan untuk Peningkatan Kualitas Pembelajaran / Kampus
                </label>
                <textarea id="masukan" rows="3" placeholder="Tuliskan saran keahlian atau materi yang perlu diperkuat di kurikulum..."
                          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"></textarea>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end">
                <button type="submit"
                        class="px-8 py-3 bg-[#1D63ED] hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-blue-500/25 transition-all flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Kirim Kuesioner Tracer</span>
                </button>
            </div>

        </form>

    </div>

</div>
@endsection
