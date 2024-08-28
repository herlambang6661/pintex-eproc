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
        Schema::create('transit', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->string('noform_transit')->unique()->nullable();
            $table->string('gaterang_global')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transit');
    }
};
