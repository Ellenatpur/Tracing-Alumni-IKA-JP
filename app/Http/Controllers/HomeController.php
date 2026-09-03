<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data statistik alumni
        $totalAlumni = Alumni::count();
        $totalBekerja = Alumni::where('status', 'Bekerja')->count();
        $totalKuliah = Alumni::where('status', 'Kuliah')->count();
        $totalWirausaha = Alumni::where('status', 'Wirausaha')->count();

        // Mengambil kuesioner yang sedang aktif
        $questionnaire = Questionnaire::where('is_active', true)->with('questions')->first();

        return view('welcome', compact('totalAlumni', 'totalBekerja', 'totalKuliah', 'totalWirausaha', 'questionnaire'));
    }
}