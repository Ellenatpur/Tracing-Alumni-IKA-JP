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
    Schema::create('job_postings', function (Blueprint $table) {
        $table->id();
        $table->string('judul_posisi'); // Contoh: "Frontend Developer" atau "Proyek App Tracer"
        $table->string('nama_perusahaan');
        $table->enum('tipe', ['Pekerjaan', 'Proyek Kolaborasi', 'Magang'])->default('Pekerjaan');
        $table->string('lokasi')->nullable();
        $table->text('deskripsi');
        $table->string('link_pendaftaran')->nullable();
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
