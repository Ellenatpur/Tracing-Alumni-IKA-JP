<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study Alumni</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Header / Navbar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 bg-amber-500 text-white font-bold flex items-center justify-center rounded-lg shadow-sm">
                    TS
                </div>
                <span class="font-bold text-lg text-slate-900">Tracer Study Alumni</span>
            </div>
            <div>
                <a href="/admin" class="px-4 py-2 text-sm font-medium text-amber-700 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors border border-amber-200 shadow-sm">
                    Portal Admin →
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-amber-500/10 to-transparent py-16 px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Sistem Penelusuran Alumni & Karir
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-600 leading-relaxed">
                Bantu kami meningkatkan kualitas pendidikan dan mempererat jaringan alumni dengan mengisi kuesioner tracer study secara berkala.
            </p>
        </div>
    </section>

    <!-- Stat Cards -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-xs sm:text-sm font-medium text-slate-500">Total Alumni</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $totalAlumni }}</p>
            </div>
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-xs sm:text-sm font-medium text-emerald-600">Bekerja</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $totalBekerja }}</p>
            </div>
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-xs sm:text-sm font-medium text-blue-600">Lanjut Studi</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $totalKuliah }}</p>
            </div>
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm">
                <p class="text-xs sm:text-sm font-medium text-amber-600">Wirausaha</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $totalWirausaha }}</p>
            </div>
        </div>
    </section>

    <!-- Questionnaire Section -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white p-6 sm:p-10 rounded-2xl border border-slate-200 shadow-sm">
            @if($questionnaire)
                <div class="border-b border-slate-200 pb-6 mb-6">
                    <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full mb-2">
                        Kuesioner Aktif
                    </span>
                    <h2 class="text-2xl font-bold text-slate-900">{{ $questionnaire->judul }}</h2>
                    @if($questionnaire->deskripsi)
                        <p class="text-slate-600 text-sm mt-1">{{ $questionnaire->deskripsi }}</p>
                    @endif
                </div>

                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    @foreach($questionnaire->questions as $index => $q)
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <label class="block text-sm font-semibold text-slate-800 mb-2">
                                {{ $index + 1 }}. {{ $q->pertanyaan }}
                                @if($q->is_required) <span class="text-red-500">*</span> @endif
                            </label>

                            @if($q->tipe === 'text')
                                <input type="text" name="answers[{{ $q->id }}]" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-sm bg-white" placeholder="Jawaban Anda..." {{ $q->is_required ? 'required' : '' }}>
                            @elseif($q->tipe === 'textarea')
                                <textarea name="answers[{{ $q->id }}]" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-sm bg-white" placeholder="Jawaban Anda..." {{ $q->is_required ? 'required' : '' }}></textarea>
                            @endif
                        </div>
                    @endforeach

                    <button type="submit" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-xl shadow-sm transition-colors text-sm">
                        Kirim Jawaban Kuesioner
                    </button>
                </form>
            @else
                <div class="text-center py-8">
                    <div class="w-12 h-12 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-3">
                        📝
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800">Belum Ada Kuesioner Aktif</h3>
                    <p class="text-slate-500 text-sm mt-1">Saat ini belum ada pengisian kuesioner tracer study yang dibuka oleh Admin.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-8 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} Sistem Informasi Tracer Study Alumni. All rights reserved.</p>
    </footer>

</body>
</html>