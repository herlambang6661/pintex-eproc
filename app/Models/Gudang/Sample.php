<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    protected $table = 'sample';
    protected $fillable = [
        'tanggal',
        'noform',
        'kodeseri',
        'namaBarang',
        'qty',
        'keterangan',
        'suplier',
        'expedisi',
    ];
}
