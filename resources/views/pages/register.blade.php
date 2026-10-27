<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Alumni - Tracer Study</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <x-navbar />

    <!-- KONTEN UTAMA -->
    <main class="grow py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header Section -->
            <div class="text-center mb-10">
                <span class="inline-block px-4 py-1.5 bg-[#1D63ED]/10 text-[#1D63ED] text-xs font-bold rounded-full uppercase tracking-wider mb-3">
                    Portal Data Alumni
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-[#1E1B4B] tracking-tight">
                    Formulir Pendaftaran Alumni
                </h1>
                <p class="mt-3 text-slate-600 max-w-xl mx-auto text-sm sm:text-base">
                    Lengkapi data diri Anda untuk terhubung kembali dengan almamater, memperluas jejaring karir, serta membantu pelacakan alumni.
                </p>
            </div>

            <!-- Flash Alert (Sukses) -->
            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-start gap-4 text-emerald-800 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-check text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-emerald-900 text-base">Pendaftaran Berhasil Dikirim!</h4>
                        <p class="text-sm mt-1 text-emerald-700 leading-relaxed">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Flash Alert (Error Validasi) -->
            @if($errors->any())
                <div class="mb-8 p-5 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-4 text-rose-800 shadow-sm">
                    <div class="w-10 h-10 rounded-xl bg-rose-500 text-white flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-triangle-exclamation text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-rose-900 text-base">Terdapat kesalahan pengisian formulir:</h4>
                        <ul class="list-disc list-inside text-sm mt-1.5 space-y-1 text-rose-700">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Formulir Pendaftaran -->
            <form action="{{ route('alumni.register.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-sm border border-slate-200/80 p-6 sm:p-10 space-y-8">
                @csrf

                <!-- Section 1: Data Identitas Diri -->
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#1D63ED] flex items-center justify-center font-bold text-sm">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Identitas Diri</h2>
                            <p class="text-xs text-slate-500">Informasi biodata dasar alumni</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required placeholder="Contoh: Budi Santoso"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="nim" class="block text-sm font-semibold text-slate-700 mb-1.5">NIM / Nomor Induk</label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" placeholder="Nomor Induk Mahasiswa / Siswa"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-semibold text-slate-700 mb-1.5">Jenis Kelamin <span class="text-rose-500">*</span></label>
                            <select name="jenis_kelamin" id="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm bg-white">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="foto_profil" class="block text-sm font-semibold text-slate-700 mb-1.5">Foto Profil <span class="text-xs text-slate-400 font-normal">(Maks. 2MB)</span></label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                   class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-sm file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-[#1D63ED] hover:file:bg-blue-100 cursor-pointer">
                        </div>
                    </div>
                </div>

                <!-- Section 2: Riwayat Akademik -->
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Riwayat Akademik</h2>
                            <p class="text-xs text-slate-500">Program studi dan tahun kelulusan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div>
                            <label for="jurusan" class="block text-sm font-semibold text-slate-700 mb-1.5">Jurusan / Program Studi</label>
                            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" placeholder="Contoh: Rekayasa Perangkat Lunak"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="angkatan" class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun Angkatan <span class="text-rose-500">*</span></label>
                            <input type="number" name="angkatan" id="angkatan" value="{{ old('angkatan', date('Y') - 3) }}" required min="1970" max="2099" placeholder="2021"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="tahun_lulus" class="block text-sm font-semibold text-slate-700 mb-1.5">Tahun Lulus <span class="text-rose-500">*</span></label>
                            <input type="number" name="tahun_lulus" id="tahun_lulus" value="{{ old('tahun_lulus', date('Y')) }}" required min="1970" max="2099" placeholder="2024"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>
                    </div>
                </div>

                <!-- Section 3: Status & Karir -->
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center font-bold text-sm">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Aktivitas & Karir Saat Ini</h2>
                            <p class="text-xs text-slate-500">Pekerjaan, perkuliahan, atau kegiatan saat ini</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="sm:col-span-2">
                            <label for="status" class="block text-sm font-semibold text-slate-700 mb-1.5">Status Saat Ini <span class="text-rose-500">*</span></label>
                            <select name="status" id="status" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm bg-white">
                                <option value="">-- Pilih Status --</option>
                                <option value="Bekerja" {{ old('status') == 'Bekerja' ? 'selected' : '' }}>Bekerja (Karyawan / Profesional)</option>
                                <option value="Kuliah" {{ old('status') == 'Kuliah' ? 'selected' : '' }}>Kuliah (Melanjutkan Studi)</option>
                                <option value="Wirausaha" {{ old('status') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha / Membuka Usaha Sendiri</option>
                                <option value="Mencari Kerja" {{ old('status') == 'Mencari Kerja' ? 'selected' : '' }}>Sedang Mencari Pekerjaan</option>
                                <option value="Belum Bekerja" {{ old('status') == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                            </select>
                        </div>

                        <div>
                            <label for="perusahaan_organisasi" class="block text-sm font-semibold text-slate-700 mb-1.5">Perusahaan / Instansi / Kampus</label>
                            <input type="text" name="perusahaan_organisasi" id="perusahaan_organisasi" value="{{ old('perusahaan_organisasi') }}" placeholder="Contoh: PT Telkom Indonesia / Universitas Gadjah Mada"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="posisi_jabatan" class="block text-sm font-semibold text-slate-700 mb-1.5">Posisi / Jabatan / Jurusan</label>
                            <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan') }}" placeholder="Contoh: Software Engineer / Mahasiswa S1"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="linkedin_url" class="block text-sm font-semibold text-slate-700 mb-1.5">URL Profil LinkedIn <span class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/username"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>
                    </div>
                </div>

                <!-- Section 4: Kontak & Alamat -->
                <div>
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                            <i class="fa-solid fa-address-book"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Kontak & Domisili</h2>
                            <p class="text-xs text-slate-500">Agar kami dapat mengirimkan info reuni dan lowongan karir</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-slate-700 mb-1.5">No. WhatsApp / HP</label>
                            <input type="tel" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="08123456789"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div>
                            <label for="no_telp" class="block text-sm font-semibold text-slate-700 mb-1.5">No. Telepon Alternatif</label>
                            <input type="tel" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" placeholder="Opsional"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">
                        </div>

                        <div class="sm:col-span-2">
                            <label for="alamat" class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Domisili Saat Ini</label>
                            <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat lengkap kota domisili..."
                                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] text-sm">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-500">
                        <i class="fa-solid fa-shield-halved text-emerald-500 mr-1"></i> Data Anda akan diverifikasi oleh tim admin sebelum ditampilkan di daftar publik.
                    </p>
                    <button type="submit"
                            class="w-full sm:w-auto px-8 py-3.5 bg-[#1D63ED] hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-500/25 transition-all text-sm flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Kirim Pendaftaran</span>
                    </button>
                </div>

            </form>

        </div>
    </main>

    <!-- FOOTER -->
    <x-footer />

</body>
</html>
