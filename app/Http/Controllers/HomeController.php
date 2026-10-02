<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Post;
use App\Models\Event;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Mengambil data untuk Halaman Utama (Homepage)
    public function index()
    {
        // Mengambil berita terbaru (misal 3 atau 6 berita terakhir)
        $posts = Post::latest()->take(6)->get();

        // Mengambil event terdekat/terbaru (1 event)
        $event = Event::latest()->first();

        // Mengambil lowongan kerja terbaru (2 lowongan)
        $jobs = JobPosting::latest()->take(2)->get();

        return view('pages.home', compact('posts', 'event', 'jobs'));
    }

    // Mengambil data untuk Halaman Daftar Alumni / Tracer
    public function tracer(Request $request)
{
    $query = Alumni::query();

    // Filter Pencarian
    if ($request->filled('q')) {
        $search = $request->q;
        $query->where(function($q) use ($search) {
            // Jika di tabel alumnis nama kolomnya 'name', gunakan 'name'.
            // Jika kolomnya 'nama', ubah 'name' di bawah menjadi 'nama'.
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('jurusan', 'like', "%{$search}%")
              ->orWhere('pekerjaan', 'like', "%{$search}%");
        });
    }

    // Filter Jurusan
    if ($request->filled('jurusan')) {
        $query->where('jurusan', $request->jurusan);
    }

    // Filter Tahun Lulus (atau angkatan/tahun_lulus)
    if ($request->filled('tahun_lulus')) {
        $query->where(function($q) use ($request) {
            $q->where('tahun_lulus', $request->tahun_lulus)
              ->orWhere('angkatan', $request->tahun_lulus);
        });
    }

    // Filter Pekerjaan
    if ($request->filled('pekerjaan')) {
        $query->where('pekerjaan', $request->pekerjaan);
    }

    $alumnis = $query->latest()->paginate(9);

    return view('pages.tracer', compact('alumnis'));
}
}