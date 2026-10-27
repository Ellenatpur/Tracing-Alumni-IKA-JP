@extends('layouts.dashboard')

@section('title', 'Profil Saya')
@section('header_title', 'Pengaturan & Profil Alumni')
@section('header_subtitle', 'Kelola informasi identitas, riwayat pendidikan, dan status karir Anda')

@section('content')
<div class="max-w-4xl space-y-6">

    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- SECTION 1: AKUN PENGGUNA -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-9 h-9 rounded-xl bg-blue-50 text-[#1D63ED] flex items-center justify-center font-bold text-sm">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-slate-900">Akun Pengguna</h3>
                    <p class="text-xs text-slate-500">Kredensial login dan identitas akun utama</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 mb-1.5">Alamat Email <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 mb-1.5">Password Baru <span class="text-xs font-normal text-slate-400">(Kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                           placeholder="••••••••">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-1.5">Ulangi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                           placeholder="••••••••">
                </div>
            </div>
        </div>

        <!-- SECTION 2: BIODATA & AKADEMIK ALUMNI -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-slate-900">Data Akademik Alumni</h3>
                    <p class="text-xs text-slate-500">Nomor induk, jurusan, dan tahun kelulusan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="nim" class="block text-xs font-bold text-slate-700 mb-1.5">NIM / Nomor Induk</label>
                    <input type="text" name="nim" id="nim" value="{{ old('nim', $alumni->nim ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="jenis_kelamin" class="block text-xs font-bold text-slate-700 mb-1.5">Jenis Kelamin <span class="text-rose-500">*</span></label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                        <option value="L" {{ old('jenis_kelamin', $alumni->jenis_kelamin ?? 'L') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $alumni->jenis_kelamin ?? 'L') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label for="jurusan" class="block text-xs font-bold text-slate-700 mb-1.5">Jurusan / Program Studi</label>
                    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $alumni->jurusan ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="angkatan" class="block text-xs font-bold text-slate-700 mb-1.5">Tahun Angkatan <span class="text-rose-500">*</span></label>
                    <input type="number" name="angkatan" id="angkatan" value="{{ old('angkatan', $alumni->angkatan ?? date('Y')-3) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="tahun_lulus" class="block text-xs font-bold text-slate-700 mb-1.5">Tahun Kelulusan <span class="text-rose-500">*</span></label>
                    <input type="number" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus', $alumni->tahun_lulus ?? date('Y')) }}" required
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div class="sm:col-span-2">
                    <label for="foto_profil" class="block text-xs font-bold text-slate-700 mb-1.5">Foto Profil</label>
                    @if(!empty($alumni?->foto_profil))
                        <div class="mb-3 flex items-center gap-3">
                            <img src="{{ asset('storage/' . $alumni->foto_profil) }}" class="w-14 h-14 rounded-xl object-cover border border-slate-200 shadow-xs">
                            <span class="text-xs text-slate-500">Foto profil saat ini</span>
                        </div>
                    @endif
                    <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                           class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-[#1D63ED]">
                </div>
            </div>
        </div>

        <!-- SECTION 3: AKTIVITAS & KARIR SAAT INI -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center font-bold text-sm">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-slate-900">Aktivitas & Karir Saat Ini</h3>
                    <p class="text-xs text-slate-500">Pekerjaan, perkuliahan, atau usaha saat ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label for="status" class="block text-xs font-bold text-slate-700 mb-1.5">Status Saat Ini <span class="text-rose-500">*</span></label>
                    <select name="status" id="status" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                        @php $currentStatus = old('status', $alumni->status ?? 'Bekerja'); @endphp
                        <option value="Bekerja" {{ strtolower($currentStatus) == 'bekerja' ? 'selected' : '' }}>Bekerja (Karyawan / Profesional)</option>
                        <option value="Kuliah" {{ strtolower($currentStatus) == 'kuliah' ? 'selected' : '' }}>Kuliah (Melanjutkan Studi)</option>
                        <option value="Wirausaha" {{ strtolower($currentStatus) == 'wirausaha' ? 'selected' : '' }}>Wirausaha / Membuka Usaha</option>
                        <option value="Mencari Kerja" {{ strtolower($currentStatus) == 'mencari kerja' ? 'selected' : '' }}>Sedang Mencari Pekerjaan</option>
                        <option value="Belum Bekerja" {{ strtolower($currentStatus) == 'belum bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                    </select>
                </div>

                <div>
                    <label for="perusahaan_organisasi" class="block text-xs font-bold text-slate-700 mb-1.5">Perusahaan / Kampus / Usaha</label>
                    <input type="text" name="perusahaan_organisasi" id="perusahaan_organisasi" value="{{ old('perusahaan_organisasi', $alumni->perusahaan_organisasi ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="posisi_jabatan" class="block text-xs font-bold text-slate-700 mb-1.5">Posisi / Jabatan / Jurusan Kuliah</label>
                    <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan', $alumni->posisi_jabatan ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div class="sm:col-span-2">
                    <label for="linkedin_url" class="block text-xs font-bold text-slate-700 mb-1.5">URL Profil LinkedIn</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $alumni->linkedin_url ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                           placeholder="https://linkedin.com/in/username">
                </div>
            </div>
        </div>

        <!-- SECTION 4: KONTAK & DOMISILI -->
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 sm:p-8 shadow-xs space-y-6">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                    <i class="fa-solid fa-address-book"></i>
                </div>
                <div>
                    <h3 class="font-bold text-base text-slate-900">Kontak & Domisili</h3>
                    <p class="text-xs text-slate-500">Agar dapat dihubungi untuk info karir dan reuni</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="no_hp" class="block text-xs font-bold text-slate-700 mb-1.5">No. WhatsApp / HP</label>
                    <input type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp', $alumni->no_hp ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div>
                    <label for="no_telp" class="block text-xs font-bold text-slate-700 mb-1.5">No. Telepon Rumah</label>
                    <input type="tel" name="no_telp" id="no_telp" value="{{ old('no_telp', $alumni->no_telp ?? '') }}"
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">
                </div>

                <div class="sm:col-span-2">
                    <label for="alamat" class="block text-xs font-bold text-slate-700 mb-1.5">Alamat Tempat Tinggal Saat Ini</label>
                    <textarea name="alamat" id="alamat" rows="3"
                              class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]">{{ old('alamat', $alumni->alamat ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit"
                    class="px-8 py-3 bg-[#1D63ED] hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-lg shadow-blue-500/25 transition-all flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Simpan Perubahan Profil</span>
            </button>
        </div>

    </form>

</div>
@endsection
