<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login pengguna
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    // Memproses login pengguna
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman pendaftaran akun pengguna
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    // Memproses pendaftaran akun pengguna
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'nim' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:4',
            'tahun_lulus' => 'nullable|string|max:4',
            'jurusan' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Hubungkan atau buat profil alumni
        if (!empty($validated['nim'])) {
            $existingAlumni = Alumni::where('nim', $validated['nim'])->first();
            if ($existingAlumni) {
                $existingAlumni->update([
                    'user_id' => $user->id,
                ]);
            } else {
                Alumni::create([
                    'user_id' => $user->id,
                    'nama' => $user->name,
                    'nim' => $validated['nim'],
                    'jenis_kelamin' => 'L',
                    'angkatan' => $validated['angkatan'] ?? date('Y') - 3,
                    'tahun_lulus' => $validated['tahun_lulus'] ?? date('Y'),
                    'jurusan' => $validated['jurusan'] ?? '-',
                    'status' => $validated['status'] ?? 'Belum Bekerja',
                    'status_verifikasi' => 'pending',
                ]);
            }
        } else {
            // Buat profil alumni default
            Alumni::create([
                'user_id' => $user->id,
                'nama' => $user->name,
                'jenis_kelamin' => 'L',
                'angkatan' => $validated['angkatan'] ?? date('Y') - 3,
                'tahun_lulus' => $validated['tahun_lulus'] ?? date('Y'),
                'jurusan' => $validated['jurusan'] ?? '-',
                'status' => $validated['status'] ?? 'Belum Bekerja',
                'status_verifikasi' => 'pending',
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('success', 'Akun berhasil dibuat! Selamat datang di portal alumni.');
    }

    // Proses logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }
}
