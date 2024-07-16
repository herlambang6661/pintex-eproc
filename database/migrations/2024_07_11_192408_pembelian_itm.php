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
        Schema::create('pembelianitm', function (Blueprint $table) {
            $table->id();
            $table->string('noform')->nullable();
            $table->string('nofaktur')->nullable();
            $table->string('kode')->nullable();
            $table->string('namabarang')->nullable();
            $table->integer('kts')->nullable();
            $table->string('satuan')->nullable();
            $table->float('harga')->nullable();
            $table->integer('pajak')->nullable();
            $table->integer('nmpajak')->nullable();
            $table->integer('pj')->nullable();
            $table->float('jumlah')->nullable();
            $table->string('supplier')->nullable();
            $table->integer('estimasi')->nullable();
            $table->date('estimasi_tgl')->nullable();
            $table->integer('garansi')->nullable();
            $table->date('garansi_tgl')->nullable();
            $table->string('parsial')->nullable();
            $table->string('non')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('pembelianitm');
    }
};
