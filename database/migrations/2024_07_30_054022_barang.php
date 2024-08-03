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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->nullable();
            $table->string('kodeseri')->nullable();
            $table->string('form_permintaan')->nullable();
            $table->string('kodeproduk')->nullable();
            $table->string('namaBarang')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('katalog')->nullable();
            $table->string('part')->nullable();
            $table->string('mesin')->nullable();
            $table->string('satuan')->nullable();
            $table->float('qty_permintaan', 10, 2)->nullable();
            $table->float('qty_acc', 10, 2)->nullable();
            $table->float('qty_diterima', 10, 2)->nullable();
            $table->float('qty_diambil', 10, 2)->nullable();
            $table->string('pemesan')->nullable();
            $table->string('unit')->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('pembeli')->nullable();
            $table->string('dibeli')->nullable();
            $table->string('status')->nullable();
            $table->boolean('urgent')->nullable();
            $table->string('no_faktur')->nullable();
            $table->float('estimasi_harga', 10, 2)->nullable();
            $table->float('harga_satuan', 10, 2)->nullable();
            $table->float('pajak', 10, 2)->nullable();
            $table->float('harga_jumlah', 10, 2)->nullable();
            $table->float('supplier', 10, 2)->nullable();
            $table->integer('garansi')->nullable();
            $table->date('tgl_garansi')->nullable();
            $table->date('tgl_permintaan')->nullable();
            $table->date('tgl_qty_acc')->nullable();
            $table->date('tgl_acc')->nullable();
            $table->date('tgl_pembelian')->nullable();
            $table->date('tgl_penerimaan')->nullable();
            $table->boolean('proses_email')->nullable();
            $table->boolean('proses_po')->nullable();
            $table->string('dibuat')->nullable();
            $table->string('diedit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaanitm');
    }
};
