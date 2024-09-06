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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('alias')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('entitas_all')->default(0);
            $table->boolean('entitas_pintex')->default(0);
            $table->boolean('entitas_tfi')->default(0);
            $table->boolean('p_master')->default(0);
            $table->boolean('p_pengadaan')->default(0);
            $table->boolean('c_permintaan')->default(0);
            $table->boolean('c_persetujuan')->default(0);
            $table->boolean('c_email')->default(0);
            $table->boolean('c_pembelian')->default(0);
            $table->boolean('c_status')->default(0);
            $table->boolean('p_gudang')->default(0);
            $table->boolean('c_stock')->default(0);
            $table->boolean('c_penerimaan')->default(0);
            $table->boolean('c_pengiriman')->default(0);
            $table->boolean('c_sample')->default(0);
            $table->boolean('c_transit')->default(0);
            $table->boolean('c_mutasi')->default(0);
            $table->boolean('p_teknik')->default(0);
            $table->boolean('c_servis')->default(0);
            $table->boolean('c_retur')->default(0);
            $table->boolean('c_pengambilan')->default(0);
            $table->boolean('p_laporan')->default(0);
            $table->boolean('c_lap_pemakaian')->default(0);
            $table->boolean('c_lap_pembelian')->default(0);
            $table->boolean('c_lap_stock')->default(0);
            $table->boolean('p_pengaturan')->default(0);
            $table->boolean('c_pengguna')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
