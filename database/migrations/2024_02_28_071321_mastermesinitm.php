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
        Schema::create('mastermesinitm', function (Blueprint $table) {
            $table->id('id_itm');
            $table->unsignedBigInteger('id_mesin');
            $table->string('id_mesinitm')->nullable();
            $table->string('merk');
            $table->string('kode_nomor');
            $table->string('foto')->nullable();
            $table->string('dibuat');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_mesin')->references('id')->on('mastermesin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mastermesinitm');
    }
};
