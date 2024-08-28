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
        Schema::create('transititm', function (Blueprint $table) {
            $table->id();
            $table->string('noform_transit')->unique()->nullable();
            $table->string('kodeseri');
            $table->date('tgl_transit')->nullable();
            $table->string('namaBarang')->nullable();
            $table->integer('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('suplier')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenis')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transititm');
    }
};
