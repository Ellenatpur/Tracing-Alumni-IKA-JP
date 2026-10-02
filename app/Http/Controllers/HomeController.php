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
        $posts = Post::latest()->take(6)->get();
        $event = Event::latest('tanggal_event')->first();
        $jobs = JobPosting::latest()->take(2)->get();

        return view('pages.home', compact('posts', 'event', 'jobs'));
    }

    // Mengambil data untuk Halaman Daftar Alumni / Tracer
    public function tracer(Request $request)
    {
        $query = Alumni::query()->where('status_verifikasi', 'approved');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('jurusan', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%")
                  ->orWhere('perusahaan_organisasi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        if ($request->filled('tahun_lulus')) {
            $query->where(function($q) use ($request) {
                $q->where('tahun_lulus', $request->tahun_lulus)
                  ->orWhere('angkatan', $request->tahun_lulus);
            });
        }

        $alumnis = $query->latest()->paginate(9);

        return view('pages.tracer', compact('alumnis'));
    }

    // Halaman Berita
    public function berita(Request $request)
    {
        $query = Post::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(6);

        return view('pages.berita', compact('posts'));
    }

    // Halaman Lowongan Kerja
    public function jobs(Request $request)
    {
        $query = JobPosting::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul_posisi', 'like', "%{$search}%")
                  ->orWhere('nama_perusahaan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tipe')) {
            $query->where('tipe_pekerjaan', $request->tipe);
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', "%{$request->lokasi}%");
        }

        $jobs = $query->latest()->paginate(6);

        return view('pages.jobs', compact('jobs'));
    }
}