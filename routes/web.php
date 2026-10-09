<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/register', function () {
    return view('pages.register');
})->name('alumni.register');