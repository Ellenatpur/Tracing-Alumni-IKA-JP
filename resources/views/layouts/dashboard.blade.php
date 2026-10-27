<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Portal Alumni</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine.js for interactive dropdowns & sidebar toggle -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-100/70 text-slate-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">

        <!-- BACKDROP FOR MOBILE SIDEBAR -->
        <div x-cloak x-show="sidebarOpen" @click="sidebarOpen = false"
             class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-xs lg:hidden transition-opacity"></div>

        <!-- SIDEBAR -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
               class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1E1B4B] text-slate-300 flex flex-col justify-between transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shadow-xl lg:shadow-none shrink-0">
            
            <div>
                <!-- Brand / Logo Area -->
                <div class="h-20 flex items-center justify-between px-6 border-b border-white/10">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <span class="w-10 h-10 rounded-xl bg-[#4DD0C2] text-[#1E1B4B] flex items-center justify-center font-extrabold text-lg shadow-md shadow-cyan-500/20">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <div>
                            <span class="text-white font-extrabold text-base tracking-tight block leading-none">TRACER<span class="text-[#4DD0C2]">ALUMNI</span></span>
                            <span class="text-[10px] text-cyan-200/70 uppercase tracking-widest font-semibold">User Dashboard</span>
                        </div>
                    </a>
                    <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Nav Menu List -->
                <div class="px-4 py-6 space-y-1">
                    <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400/80">Menu Utama</div>

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-chart-pie w-5 text-center text-sm {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('dashboard.profile') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard.profile') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-user-graduate w-5 text-center text-sm {{ request()->routeIs('dashboard.profile') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Profil Saya</span>
                    </a>

                    <a href="{{ route('dashboard.tracer') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard.tracer') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-clipboard-list w-5 text-center text-sm {{ request()->routeIs('dashboard.tracer') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Kuesioner Tracer</span>
                    </a>

                    <div class="pt-5 px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-slate-400/80">Eksplorasi</div>

                    <a href="{{ route('dashboard.jobs') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard.jobs') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-briefcase w-5 text-center text-sm {{ request()->routeIs('dashboard.jobs') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Lowongan Karir</span>
                    </a>

                    <a href="{{ route('dashboard.events') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard.events') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-calendar-days w-5 text-center text-sm {{ request()->routeIs('dashboard.events') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Agenda & Event</span>
                    </a>

                    <a href="{{ route('dashboard.alumni') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard.alumni') ? 'bg-[#1D63ED] text-white shadow-md shadow-blue-600/30 font-bold' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-users w-5 text-center text-sm {{ request()->routeIs('dashboard.alumni') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Rekan Alumni</span>
                    </a>
                </div>
            </div>

            <!-- Sidebar Bottom User Info & Logout -->
            <div class="p-4 border-t border-white/10 bg-black/20">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-linear-to-tr from-[#1D63ED] to-[#4DD0C2] text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-sm uppercase">
                        {{ substr(auth()->user()->name, 0, 2) }}
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</h4>
                        <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ url('/') }}" target="_blank"
                       class="flex-1 py-1.5 px-2 bg-white/10 hover:bg-white/20 rounded-lg text-center text-[11px] font-semibold text-slate-200 transition-colors flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-globe text-[10px]"></i>
                        <span>Website</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="py-1.5 px-3 bg-rose-500/20 hover:bg-rose-500 text-rose-300 hover:text-white rounded-lg text-center text-[11px] font-semibold transition-all flex items-center justify-center gap-1.5"
                                title="Keluar">
                            <i class="fa-solid fa-power-off text-[10px]"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        <!-- MAIN WRAPPER -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

            <!-- TOPBAR -->
            <header class="h-20 bg-white border-b border-slate-200/80 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
                
                <!-- Left: Hamburger & Page Title -->
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-slate-900 p-2 rounded-xl hover:bg-slate-100">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                    <div>
                        <h1 class="text-lg sm:text-xl font-bold text-slate-900 tracking-tight">
                            @yield('header_title', 'Dashboard Alumni')
                        </h1>
                        <p class="text-xs text-slate-500 hidden sm:block">
                            @yield('header_subtitle', 'Selamat datang di area khusus pengguna terdaftar')
                        </p>
                    </div>
                </div>

                <!-- Right: Quick Actions & Profile Dropdown -->
                <div class="flex items-center gap-3 sm:gap-4">
                    
                    <a href="{{ url('/') }}" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-[#1D63ED] hover:bg-blue-50 transition-all border border-slate-200">
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        <span>Lihat Portal Publik</span>
                    </a>

                    <!-- User Profile Dropdown (Alpine) -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.outside="open = false"
                                class="flex items-center gap-3 p-1 sm:px-3 sm:py-1.5 rounded-2xl hover:bg-slate-100 transition-all border border-transparent hover:border-slate-200">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#1D63ED] to-indigo-600 text-white flex items-center justify-center font-bold text-xs uppercase shadow-sm">
                                {{ substr(auth()->user()->name, 0, 2) }}
                            </div>
                            <div class="text-left hidden md:block">
                                <span class="block text-xs font-bold text-slate-800 leading-tight">{{ auth()->user()->name }}</span>
                                <span class="block text-[10px] text-emerald-600 font-semibold">● Pengguna Aktif</span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-slate-400 text-[10px] hidden md:block"></i>
                        </button>

                        <div x-cloak x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50">
                            
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-xs font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <div class="py-1 text-xs">
                                <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-2 px-4 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#1D63ED]">
                                    <i class="fa-solid fa-user-pen text-slate-400 w-4"></i>
                                    <span>Edit Profil Saya</span>
                                </a>
                                <a href="{{ route('dashboard.tracer') }}" class="flex items-center gap-2 px-4 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#1D63ED]">
                                    <i class="fa-solid fa-clipboard-check text-slate-400 w-4"></i>
                                    <span>Kuesioner Tracer</span>
                                </a>
                                <a href="{{ url('/') }}" class="flex items-center gap-2 px-4 py-2 text-slate-700 hover:bg-slate-50 hover:text-[#1D63ED]">
                                    <i class="fa-solid fa-arrow-left text-slate-400 w-4"></i>
                                    <span>Kembali ke Beranda</span>
                                </a>
                            </div>

                            <div class="border-t border-slate-100 pt-1 text-xs">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-rose-600 hover:bg-rose-50">
                                        <i class="fa-solid fa-right-from-bracket text-rose-400 w-4"></i>
                                        <span>Keluar (Logout)</span>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </header>

            <!-- FLASH ALERTS -->
            <div class="px-4 sm:px-8 pt-6">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center justify-between text-emerald-800 text-sm shadow-xs">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-500 text-base"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" @click="$el.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 p-1">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-start gap-3 text-rose-800 text-sm shadow-xs">
                        <i class="fa-solid fa-circle-exclamation text-rose-500 text-base mt-0.5"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- PAGE CONTENT -->
            <main class="flex-1 px-4 sm:px-8 pb-12">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>
