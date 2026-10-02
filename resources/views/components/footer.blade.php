<footer class="bg-[#2B1B40] text-white mt-auto pt-16 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
            
            <!-- Kolom 1 & 2: Brand & Deskripsi -->
            <div class="lg:col-span-2 space-y-4">
                <a href="{{ url('/') }}" class="text-4xl font-extrabold tracking-wider text-white inline-block">
                    LOGO
                </a>
                <p class="text-slate-300 text-sm leading-relaxed max-w-sm">
                    Sistem Tracing Alumni terpadu untuk menjembatani komunikasi, informasi karir, dan pengembangan komunitas alumni perguruan tinggi.
                </p>
                <div class="pt-2 flex items-center space-x-3 text-slate-300">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-400 hover:text-[#2B1B40] transition-colors flex items-center justify-center text-sm"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Kolom 3: Navigasi Utama -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Navigasi</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li><a href="{{ url('/') }}" class="hover:text-cyan-300 transition-colors">Beranda</a></li>
                    <li><a href="{{ url('/statistik') }}" class="hover:text-cyan-300 transition-colors">Statistik Alumni</a></li>
                    <li><a href="{{ url('/berita') }}" class="hover:text-cyan-300 transition-colors">Berita & Informasi</a></li>
                    <li><a href="{{ url('/kuesioner') }}" class="hover:text-cyan-300 transition-colors">Kuesioner Tracer</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Fitur Portal -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Fitur Alumni</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li><a href="{{ url('/register-alumni') }}" class="hover:text-cyan-300 transition-colors">Pendaftaran Alumni</a></li>
                    <li><a href="{{ url('/lowongan-kerja') }}" class="hover:text-cyan-300 transition-colors">Lowongan Kerja</a></li>
                    <li><a href="{{ url('/event') }}" class="hover:text-cyan-300 transition-colors">Event & Agenda</a></li>
                    <li><a href="{{ url('/admin/login') }}" class="hover:text-cyan-300 transition-colors">Login Admin Panel</a></li>
                </ul>
            </div>

            <!-- Kolom 5: Kontak -->
            <div>
                <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-white/10 pb-2">Kontak Kami</h3>
                <ul class="space-y-2.5 text-sm text-slate-300">
                    <li class="flex items-start">
                        <i class="fa-solid fa-location-dot mt-1 mr-2 text-xs text-cyan-300"></i>
                        <span>Jl. Kampus Alumni Bu Yayak No. 1, Indonesia</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope mr-2 text-xs text-cyan-300"></i>
                        <span>alumni@kampus.ac.id</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone mr-2 text-xs text-cyan-300"></i>
                        <span>(021) 1234-5678</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar Copyright -->
        <div class="pt-8 border-t border-white/10 text-center text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} Tracing Alumni System. All rights reserved.</p>
        </div>
    </div>
</footer>