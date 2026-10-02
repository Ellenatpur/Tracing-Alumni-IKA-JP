<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route Home diproses oleh HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Tracer diproses oleh HomeController
Route::get('/tracer', [HomeController::class, 'tracer'])->name('tracer');

// Route lainnya
Route::get('/berita', function () {
    return view('pages.events');
})->name('berita');

Route::get('/jobs', function () {
    return view('pages.jobs');
})->name('jobs');

Route::get('/register', function () {
    return view('pages.register');
})->name('alumni.register');