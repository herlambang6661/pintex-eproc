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
        Schema::create('sample', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('noform')->unique()->nullable();
            $table->string('kodeseri');
            $table->string('namaBarang')->nullable();
            $table->integer('qty')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('suplier')->nullable();
            $table->string('expedisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample');
    }
};
