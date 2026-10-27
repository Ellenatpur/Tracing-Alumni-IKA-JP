<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Pengguna - Portal Alumni</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-[#F3F7FE] to-slate-200 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-xl text-center">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-2xl font-black text-[#1E1B4B] tracking-tight">
            <span class="w-10 h-10 rounded-xl bg-[#1D63ED] text-white flex items-center justify-center text-lg shadow-md shadow-blue-500/30">
                <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <span>Tracing<span class="text-[#1D63ED]">Alumni</span></span>
        </a>
        <h2 class="mt-4 text-2xl font-extrabold text-slate-900 tracking-tight">
            Registrasi Akun Pengguna
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Daftar akun untuk mengakses dashboard alumni dan tracer study
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl px-4">
        <div class="bg-white py-8 px-6 shadow-xl shadow-slate-200/50 sm:rounded-3xl border border-slate-100 sm:px-10">

            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3 text-rose-800 text-sm">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-base mt-0.5"></i>
                    <div>
                        <p class="font-bold mb-1">Periksa isian form Anda:</p>
                        <ul class="list-disc list-inside space-y-0.5 text-xs text-rose-700">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('register.user.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Identitas Akun -->
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Informasi Akun Login</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="Contoh: Budi Santoso">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 mb-1">Alamat Email <span class="text-rose-500">*</span></label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="nama@email.com">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-xs font-bold text-slate-700 mb-1">Password <span class="text-rose-500">*</span></label>
                                <input id="password" name="password" type="password" required
                                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                       placeholder="Minimal 6 karakter">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-1">Ulangi Password <span class="text-rose-500">*</span></label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                       placeholder="Konfirmasi password">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Alumni Opsional -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Data Alumni (Opsional)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="nim" class="block text-xs font-bold text-slate-700 mb-1">NIM / Nomor Induk</label>
                            <input id="nim" name="nim" type="text" value="{{ old('nim') }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="Nomor Induk Mahasiswa / Siswa">
                        </div>

                        <div>
                            <label for="jurusan" class="block text-xs font-bold text-slate-700 mb-1">Jurusan</label>
                            <input id="jurusan" name="jurusan" type="text" value="{{ old('jurusan') }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="Contoh: RPL, TKJ, dll.">
                        </div>

                        <div>
                            <label for="angkatan" class="block text-xs font-bold text-slate-700 mb-1">Tahun Angkatan</label>
                            <input id="angkatan" name="angkatan" type="number" value="{{ old('angkatan', date('Y')-3) }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="2021">
                        </div>

                        <div>
                            <label for="tahun_lulus" class="block text-xs font-bold text-slate-700 mb-1">Tahun Kelulusan</label>
                            <input id="tahun_lulus" name="tahun_lulus" type="number" value="{{ old('tahun_lulus', date('Y')) }}"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED]"
                                   placeholder="2024">
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-500/25 text-sm font-bold text-white bg-[#1D63ED] hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D63ED] transition-all">
                        <i class="fa-solid fa-user-plus text-xs"></i>
                        <span>Daftarkan Akun & Masuk</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <div class="text-center space-y-2">
                    <p class="text-xs text-slate-600">
                        Sudah memiliki akun pengguna? 
                        <a href="{{ route('login') }}" class="font-bold text-[#1D63ED] hover:underline">
                            Masuk di Sini
                        </a>
                    </p>
                    <div class="pt-2">
                        <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800">
                            <i class="fa-solid fa-arrow-left text-[10px]"></i>
                            <span>Kembali ke Beranda</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
