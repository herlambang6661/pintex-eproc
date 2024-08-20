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
        Schema::create('pengambilanitm', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('noform')->nullable();
            $table->string('kodeseri')->nullable();
            $table->string('namaBarang')->nullable();
            $table->string('mesin')->nullable();
            $table->string('unit')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('jam')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('diambil')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambilanitm');
    }
};
