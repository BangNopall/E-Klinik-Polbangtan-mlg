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
        Schema::create('c_d_m_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 16)->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->enum('kelas', ['1', '2', '3', '4']);
            $table->string('no_ruangan', 25);
            // Relasi prodi
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            // Relasi blok
            $table->foreignId('blok_id')->constrained()->onDelete('cascade');

            $table->timestamps();
            $table->unique(['user_id', 'nim']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_d_m_i_s');
    }
};
