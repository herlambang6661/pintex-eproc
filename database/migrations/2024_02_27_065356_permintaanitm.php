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
        Schema::create('permintaanitm', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->date('tgl');
            $table->string('kodeseri');
            $table->string('noform');
            $table->string('kodeproduk')->nullable();
            $table->string('namaBarang')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('katalog')->nullable();
            $table->string('part')->nullable();
            $table->string('mesin')->nullable();
            $table->float('qty', 10, 2)->nullable();
            $table->string('satuan')->nullable();
            $table->string('pemesan')->nullable();
            $table->string('unit')->nullable();
            $table->string('peruntukan')->nullable();
            $table->string('dibeli')->nullable();
            $table->string('acc')->nullable();
            $table->float('qtyterima', 10, 2)->nullable();
            $table->float('qtyacc', 10, 2)->nullable();
            $table->float('qtyakhir', 10, 2)->nullable();
            $table->float('qtyselisih', 10, 2)->nullable();
            $table->string('pembeli')->nullable();
            $table->string('status')->nullable();
            $table->boolean('urgent')->nullable();
            $table->string('nsupp')->nullable();
            $table->boolean('partial')->nullable();
            $table->float('qtypenerimaan_partial', 10, 2)->nullable();
            $table->string('kodeseri_partial')->nullable();
            $table->float('estimasiharga', 10, 2)->nullable();
            $table->string('statusACC')->nullable();
            $table->string('keteranganACC')->nullable();
            $table->integer('qty_sample')->nullable();
            $table->string('file_sample')->nullable();
            $table->date('tgl_qty_acc')->nullable();
            $table->date('tgl_acc')->nullable();
            $table->date('tgl_terima')->nullable();
            $table->boolean('proses_email')->nullable();
            $table->boolean('proses_po')->nullable();
            $table->string('kd_package')->nullable();
            $table->string('dibuat')->nullable();
            $table->string('edited')->nullable();
            $table->rememberToken();
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
