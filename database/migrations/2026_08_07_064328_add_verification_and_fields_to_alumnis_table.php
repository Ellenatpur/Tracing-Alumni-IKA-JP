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
        Schema::table('alumnis', function (Blueprint $table) {
            if (!Schema::hasColumn('alumnis', 'jurusan')) {
                $table->string('jurusan')->nullable();
            }
            if (!Schema::hasColumn('alumnis', 'no_telp')) {
                $table->string('no_telp')->nullable();
            }
            if (!Schema::hasColumn('alumnis', 'status_verifikasi')) {
                $table->enum('status_verifikasi', ['pending', 'approved', 'rejected'])
                      ->default('pending');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropColumn(['jurusan', 'no_telp', 'status_verifikasi']);
        });
    }
};