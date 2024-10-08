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
        Schema::create('presensi_bimbingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal_bimbingans');
            $table->foreignId('senso_id')->constrained('users');
            $table->date('tanggal_presensi');
            $table->time('jam_presensi')->nullable()->default(null);
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha', '']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_bimbingans');
    }
};
