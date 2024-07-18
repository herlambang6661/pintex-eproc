<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangModel extends Model
{
    use HasFactory;
    protected $table = 'uang';
    protected $fillable = [
        'inisial',
        'kurs',
        'negara',
        'simbol',
        'pembuat',
    ];
}
