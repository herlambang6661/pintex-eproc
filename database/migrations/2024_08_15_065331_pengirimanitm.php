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
        Schema::create('pengirimanitm', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('noformpengiriman_itm')->nullable();
            $table->string('kodeseri')->nullable();
            $table->string('namaBarang')->nullable();
            $table->string('katalog')->nullable();
            $table->string('part')->nullable();
            $table->string('mesin')->nullable();
            $table->integer('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('pemesan')->nullable();
            $table->string('supplier')->nullable();
            $table->string('suratjalan')->nullable();
            $table->string('expedisi')->nullable();
            $table->integer('urgent')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimanitm');
    }
};
