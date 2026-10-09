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

    // Halaman Detail Profil Alumni
    public function alumniDetail(Alumni $alumni)
    {
        // Lowongan kerja aktif dari admin job posting
        $relatedJobs = JobPosting::where('is_active', true)->latest()->take(3)->get();

        // Alumni lainnya dari jurusan yang sama
        $otherAlumnis = Alumni::where('id', '!=', $alumni->id)
            ->where('status_verifikasi', 'approved')
            ->when($alumni->jurusan, fn($q) => $q->where('jurusan', $alumni->jurusan))
            ->take(3)
            ->get();

        return view('pages.alumni-detail', compact('alumni', 'relatedJobs', 'otherAlumnis'));
    }

    // Halaman Berita & Artikel
    public function berita(Request $request)
    {
        $query = Post::query()->where('is_published', true);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        $featured_post = Post::where('is_published', true)->latest()->first();
        $posts = $query->latest()->paginate(6);

        return view('pages.events', compact('posts', 'featured_post'));
    }

    // Halaman Detail Berita & Artikel
    public function beritaDetail(Post $post)
    {
        $recentPosts = Post::where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.post-detail', compact('post', 'recentPosts'));
    }

    // Halaman Lowongan Kerja
    public function jobs(Request $request)
    {
        $query = JobPosting::query()->where('is_active', true);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul_posisi', 'like', "%{$search}%")
                  ->orWhere('nama_perusahaan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tipe')) {
            $tipe = $request->tipe;
            $query->where(function($q) use ($tipe) {
                $q->where('tipe', $tipe)
                  ->orWhere('tipe', 'like', "%{$tipe}%");
            });
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'like', "%{$request->lokasi}%");
        }

        $jobs = $query->latest()->paginate(6);

        return view('pages.jobs', compact('jobs'));
    }

    // Halaman Detail Lowongan Kerja
    public function jobDetail(JobPosting $job)
    {
        $otherJobs = JobPosting::where('id', '!=', $job->id)
            ->where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $relatedAlumnis = Alumni::where('status_verifikasi', 'approved')
            ->whereNotNull('perusahaan_organisasi')
            ->take(3)
            ->get();

        return view('pages.job-detail', compact('job', 'otherJobs', 'relatedAlumnis'));
    }
}