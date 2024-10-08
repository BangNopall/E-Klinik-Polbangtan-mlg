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
        Schema::create('inventory_consumables', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_alat');
            $table->string('kode_alat')->unique();
            $table->integer('stok')->default(0);
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->unsignedBigInteger('createdBy');
            $table->string('foto_consumable')->nullable();
            $table->timestamps();
            
            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('kategori_id')->references('id')->on('kategori_consumables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_consumables');
    }
};
