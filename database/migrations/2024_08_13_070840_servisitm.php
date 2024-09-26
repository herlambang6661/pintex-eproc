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
        Schema::create('servisitm', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_servis');
            $table->string('noformservis');
            $table->string('kodeseri_servis')->nullable();
            $table->string('subkodeseri_servis')->nullable();
            $table->string('kodeproduk_servis')->nullable();
            $table->string('namaBarang')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('serialnumber')->nullable();
            $table->string('katalog')->nullable();
            $table->string('part')->nullable();
            $table->string('mesin')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('qtykirim')->nullable();
            $table->string('satuan')->nullable();
            $table->string('suratjalan')->nullable();
            $table->string('pemesan')->nullable();
            $table->integer('qty_sample')->nullable();
            $table->string('kodeseri_partial')->nullable();
            $table->integer('urgent')->nullable();
            $table->string('expedisi')->nullable();
            $table->string('supplier')->nullable();
            $table->date('tglpenentuanservis')->nullable();
            $table->date('tglacc')->nullable();
            $table->string('acc_servis')->nullable();
            $table->string('statusACC')->nullable();
            $table->string('keteranganACC')->nullable();
            $table->date('tgl_pengiriman')->nullable();
            $table->date('tgl_diterima')->nullable();
            $table->integer('qty_terima')->nullable();
            $table->integer('qtypenerimaan_partial')->nullable();
            $table->string('status')->nullable();
            $table->integer('estimasi')->nullable();
            $table->integer('garansi')->nullable();
            $table->date('estimasi_tgl')->nullable();
            $table->string('nsupp')->nullable();
            $table->string('partial')->nullable();
            $table->date('garansi_tgl')->nullable();
            $table->integer('edited')->nullable();
            $table->string('dibuat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servisitm');
    }
};
