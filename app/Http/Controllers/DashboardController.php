<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Event;
use App\Models\JobPosting;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // Mengambil profil alumni yang terkait dengan user saat ini
    private function getAlumniProfile()
    {
        $user = Auth::user();
        if (!$user) return null;

        $alumni = $user->alumni;
        if (!$alumni) {
            $alumni = Alumni::where('nama', $user->name)->first();
            if ($alumni && !$alumni->user_id) {
                $alumni->update(['user_id' => $user->id]);
            }
        }
        return $alumni;
    }

    // Halaman Utama Dashboard
    public function index()
    {
        $user = Auth::user();
        $alumni = $this->getAlumniProfile();

        $totalAlumni = Alumni::where('status_verifikasi', 'approved')->count();
        $totalJobs = JobPosting::where('is_active', true)->count();
        $totalEvents = Event::count();
        $totalBerita = Post::where('is_published', true)->count();

        $recentJobs = JobPosting::where('is_active', true)->latest()->take(4)->get();
        $recentEvents = Event::latest('tanggal_event')->take(3)->get();
        $networkAlumni = Alumni::where('status_verifikasi', 'approved')
            ->when($alumni, fn($q) => $q->where('id', '!=', $alumni->id))
            ->latest()
            ->take(4)
            ->get();

        return view('dashboard.index', compact(
            'user',
            'alumni',
            'totalAlumni',
            'totalJobs',
            'totalEvents',
            'totalBerita',
            'recentJobs',
            'recentEvents',
            'networkAlumni'
        ));
    }

    // Halaman Edit Profil Alumni Saya
    public function profile()
    {
        $user = Auth::user();
        $alumni = $this->getAlumniProfile();

        return view('dashboard.profile', compact('user', 'alumni'));
    }

    // Menyimpan Pembaruan Profil Alumni & Akun
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $alumni = $this->getAlumniProfile();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'nim' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'nullable|string|max:255',
            'angkatan' => 'required|digits:4',
            'tahun_lulus' => 'required|digits:4',
            'status' => 'required|string|max:255',
            'perusahaan_organisasi' => 'nullable|string|max:255',
            'posisi_jabatan' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'no_hp' => 'nullable|string|max:50',
            'no_telp' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        // Update Akun User
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        // Update / Buat Profil Alumni
        $alumniData = [
            'nama' => $validated['name'],
            'nim' => $validated['nim'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'jurusan' => $validated['jurusan'],
            'angkatan' => $validated['angkatan'],
            'tahun_lulus' => $validated['tahun_lulus'],
            'status' => $validated['status'],
            'perusahaan_organisasi' => $validated['perusahaan_organisasi'],
            'posisi_jabatan' => $validated['posisi_jabatan'],
            'linkedin_url' => $validated['linkedin_url'],
            'no_hp' => $validated['no_hp'],
            'no_telp' => $validated['no_telp'],
            'alamat' => $validated['alamat'],
        ];

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('alumni-photos', 'public');
            $alumniData['foto_profil'] = $path;
        }

        if ($alumni) {
            $alumni->update($alumniData);
        } else {
            $alumniData['user_id'] = $user->id;
            $alumniData['status_verifikasi'] = 'pending';
            Alumni::create($alumniData);
        }

        return redirect()->route('dashboard.profile')
            ->with('success', 'Profil Anda berhasil diperbarui!');
    }

    // Halaman Portal Lowongan Kerja di Dashboard
    public function jobs(Request $request)
    {
        $user = Auth::user();
        $query = JobPosting::query()->where('is_active', true);

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('judul_posisi', 'like', "%{$search}%")
                  ->orWhere('nama_perusahaan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $jobs = $query->latest()->paginate(9);

        return view('dashboard.jobs', compact('user', 'jobs'));
    }

    // Halaman Event & Agenda di Dashboard
    public function events()
    {
        $user = Auth::user();
        $events = Event::latest('tanggal_event')->paginate(9);

        return view('dashboard.events', compact('user', 'events'));
    }

    // Halaman Kuesioner Tracer Study di Dashboard
    public function tracer()
    {
        $user = Auth::user();
        $alumni = $this->getAlumniProfile();

        return view('dashboard.tracer', compact('user', 'alumni'));
    }

    // Halaman Direktori Rekan Alumni di Dashboard
    public function alumni(Request $request)
    {
        $user = Auth::user();
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
            $query->where('tahun_lulus', $request->tahun_lulus);
        }

        $alumnis = $query->latest()->paginate(12);

        return view('dashboard.alumni', compact('user', 'alumnis'));
    }
}
