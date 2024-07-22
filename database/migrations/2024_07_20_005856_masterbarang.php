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
        Schema::create('masterbarang', function (Blueprint $table) {
            $table->id('id_masterbarang');
            $table->string('kodebarang')->nullable();
            $table->string('nama')->nullable();
            $table->string('inisial')->nullable();
            $table->string('tipe')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masterbarang');
    }
};
