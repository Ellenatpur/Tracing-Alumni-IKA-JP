<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Route Home diproses oleh HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Tracer diproses oleh HomeController
Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');
Route::get('/tracer/{alumni}', [HomeController::class, 'alumniDetail'])->name('tracer.detail');
Route::get('/alumni/{alumni}', [HomeController::class, 'alumniDetail'])->name('alumni.detail');

// Route Berita & Kegiatan
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{post}', [HomeController::class, 'beritaDetail'])->name('berita.detail');

// Route Lowongan Kerja
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
Route::get('/jobs/{job}', [HomeController::class, 'jobDetail'])->name('jobs.detail');

// Route Pendaftaran Alumni Publik
Route::get('/register', [HomeController::class, 'register'])->name('alumni.register');
Route::get('/register-alumni', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'registerSubmit'])->name('alumni.register.submit');

// Rute Autentikasi Pengguna
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register-user', [AuthController::class, 'showRegisterForm'])->name('register.user');
Route::post('/register-user', [AuthController::class, 'register'])->name('register.user.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);

// Rute Khusus Pengguna yang Sudah Login (Area Dashboard)
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/profil', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::get('/lowongan', [DashboardController::class, 'jobs'])->name('dashboard.jobs');
    Route::get('/event', [DashboardController::class, 'events'])->name('dashboard.events');
    Route::get('/kuesioner', [DashboardController::class, 'tracer'])->name('dashboard.tracer');
    Route::get('/alumni', [DashboardController::class, 'alumni'])->name('dashboard.alumni');
});