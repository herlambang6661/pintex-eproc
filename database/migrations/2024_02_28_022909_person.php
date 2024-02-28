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
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tipe');
            $table->string('jabatan')->nullable();
            $table->string('pembelian')->nullable();
            $table->string('kabag')->nullable();
            $table->string('npwp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kopos')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('telp')->nullable();
            $table->string('contact')->nullable();
            $table->string('uang')->nullable();
            $table->string('email')->nullable();
            $table->string('dibuat');
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};
