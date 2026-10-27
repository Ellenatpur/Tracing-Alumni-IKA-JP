<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Membuka keamanan mass assignment agar Filament bisa menyimpan semua field
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}