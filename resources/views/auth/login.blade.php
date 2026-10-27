<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Portal Alumni</title>

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

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-2xl font-black text-[#1E1B4B] tracking-tight">
            <span class="w-10 h-10 rounded-xl bg-[#1D63ED] text-white flex items-center justify-center text-lg shadow-md shadow-blue-500/30">
                <i class="fa-solid fa-graduation-cap"></i>
            </span>
            <span>Tracing<span class="text-[#1D63ED]">Alumni</span></span>
        </a>
        <h2 class="mt-4 text-2xl font-extrabold text-slate-900 tracking-tight">
            Masuk ke Portal Pengguna
        </h2>
        <p class="mt-2 text-sm text-slate-600">
            Akses dashboard karir, tracer study, dan jejaring alumni
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md px-4">
        <div class="bg-white py-8 px-6 shadow-xl shadow-slate-200/50 sm:rounded-3xl border border-slate-100 sm:px-10">

            @if(session('success'))
                <div class="mb-5 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center gap-3 text-emerald-800 text-sm">
                    <i class="fa-solid fa-check-circle text-emerald-500 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3 text-rose-800 text-sm">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-base mt-0.5"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Alamat Email
                    </label>
                    <div class="relative rounded-xl">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-regular fa-envelope text-sm"></i>
                        </div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] transition-all"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Password
                        </label>
                    </div>
                    <div class="relative rounded-xl">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                               class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1D63ED]/20 focus:border-[#1D63ED] transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-[#1D63ED] focus:ring-[#1D63ED] border-slate-300">
                        <span class="ml-2 text-xs font-medium text-slate-600">Ingat saya</span>
                    </label>
                </div>

                <div>
                    <button type="submit"
                            class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-500/25 text-sm font-bold text-white bg-[#1D63ED] hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D63ED] transition-all">
                        <i class="fa-solid fa-right-to-bracket text-xs"></i>
                        <span>Masuk ke Dashboard</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-slate-100 pt-6">
                <div class="text-center space-y-3">
                    <p class="text-xs text-slate-600">
                        Belum memiliki akun pengguna? 
                        <a href="{{ route('register.user') }}" class="font-bold text-[#1D63ED] hover:underline">
                            Daftar Sekarang
                        </a>
                    </p>
                    <p class="text-xs text-slate-400">
                        Apakah Anda pengelola? 
                        <a href="{{ url('/admin/login') }}" class="font-medium text-slate-600 hover:text-slate-900 underline">
                            Login Admin Panel
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
