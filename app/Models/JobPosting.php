<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    // Mengizinkan semua field/kolom dapat diisi dari form Filament
    protected $guarded = [];
}