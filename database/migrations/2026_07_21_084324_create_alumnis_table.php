<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('alumnis', function (Blueprint $table) {
        $table->id();
        $table->string('nisn')->unique();
        $table->string('nama');
        $table->string('jenis_kelamin');
        $table->string('angkatan', 4); // 🟢 TAMBAHAN BARU
        $table->string('tahun_lulus', 4);
        $table->string('no_hp')->nullable();
        $table->string('status');

        // 🟢 KOLOM BARU UNTUK KARIR & KOLABORASI
        $table->string('perusahaan_organisasi')->nullable(); 
        $table->string('posisi_jabatan')->nullable();
        $table->string('linkedin_url')->nullable();
        $table->string('foto_profil')->nullable(); // Opsional, bisa menyusul

        $table->text('alamat')->nullable();
        $table->timestamps();
    });
}
};