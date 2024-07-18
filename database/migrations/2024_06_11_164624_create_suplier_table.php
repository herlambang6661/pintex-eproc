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
        Schema::create('suplier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uang_id')->nullable();
            $table->string('nama');
            $table->string('tipe');
            $table->string('jabatan')->nullable();
            $table->string('pembelian')->nullable();
            $table->string('npwp')->nullable();
            $table->string('alamat');
            $table->string('kopos')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('telp')->nullable();
            $table->string('contact')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('catatan')->nullable();
            $table->string('dibuat');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('uang_id')->references('id')->on('gd_uang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suplier');
    }
};
