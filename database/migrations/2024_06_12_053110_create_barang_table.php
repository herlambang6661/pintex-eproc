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
        Schema::create('gd_barangjasa', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('satuan');
            $table->string('jurnal');
            $table->string('persediaan');
            $table->string('penjualan');
            $table->string('pembelian');
            $table->string('penerimaan')->nullable();
            $table->string('pembayaran')->nullable();
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
        Schema::dropIfExists('gd_barangjasa');
    }
};
