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
        Schema::create('penerimaanitm', function (Blueprint $table) {
            $table->id();
            $table->string('npb');
            $table->date('tanggal')->nullable();
            $table->string('kodeseri')->nullable();
            $table->string('nama')->nullable();
            $table->string('katalog')->nullable();
            $table->string('mesin')->nullable();
            $table->integer('kts')->nullable();
            $table->string('satuan')->nullable();
            $table->string('pemesan')->nullable();
            $table->integer('urgent')->nullable();
            $table->string('dibeli')->nullable();
            $table->string('locker')->nullable();
            $table->integer('partial')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaanitm');
    }
};
