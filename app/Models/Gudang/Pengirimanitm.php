<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirimanitm extends Model
{
    use HasFactory;
    protected $table = 'pengirimanitm';
    protected $fillable = [
        'tgl',
        'noformpengiriman_itm',
        'kodeseri',
        'namaBarang',
        'katalog',
        'part',
        'mesin',
        'qty',
        'satuan',
        'pemesan',
        'supplier',
        'suratjalan',
        'urgent',
        'dibuat',
    ];
}
