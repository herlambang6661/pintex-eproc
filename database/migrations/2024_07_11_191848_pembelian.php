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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('nofkt')->nullable();
            $table->date('tgl')->nullable();
            $table->integer('kurs')->nullable();
            $table->string('currid')->nullable();
            $table->string('penjual')->nullable();
            $table->string('pembeli')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kirim')->nullable();
            $table->string('pajak')->nullable();
            $table->string('noform')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('diskon')->nullable();
            $table->float('diskonint')->nullable();
            $table->float('thasil')->nullable();
            $table->float('totppn')->nullable();
            $table->integer('termasukpajak')->nullable();
            $table->float('grandtotal')->nullable();
            $table->string('catatan')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('pembelian');
    }
};
