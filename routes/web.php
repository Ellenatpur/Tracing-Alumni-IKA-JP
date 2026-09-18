<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniRegistrationController;

Route::get('/', function () {
    return view('home.blade.php');
});

// Route pendaftaran alumni publik
Route::get('/register-alumni', [AlumniRegistrationController::class, 'index'])->name('alumni.register');
Route::post('/register-alumni', [AlumniRegistrationController::class, 'store'])->name('alumni.register.store');