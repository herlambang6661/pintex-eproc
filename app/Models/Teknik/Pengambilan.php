<?php

namespace App\Models\Teknik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $table = 'pengambilan';
    protected $fillable = [
        'entitas',
        'tanggal',
        'noform',
        'diambil',
        'dibuat',
    ];
}
