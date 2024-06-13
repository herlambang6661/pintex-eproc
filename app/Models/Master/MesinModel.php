<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesinModel extends Model
{
    use HasFactory;
    protected $table = 'mastermesin';
    protected $fillable = [
        'mesin',
        'unit',
        'dibuat',
    ];
}
