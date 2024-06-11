<?php

namespace App\Models\Daftar;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mastermesin extends Model
{
    use HasFactory;

    public function up()
    {
        Schema::create('mastermesin', function (Blueprint $table) {
            $table->id();
            $table->string('mesin');
            $table->string('unit');
            $table->string('dibuat');
            $table->timestamps();
        });
    }
}
