<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransitItm extends Model
{
    use HasFactory;
    protected $table = 'transititm';
    protected $fillable = [
        'noform_transit',
        'kodeseri',
        'tgl_transit',
        'namaBarang',
        'qty',
        'satuan',
        'suplier',
        'keterangan',
        'jenis',
        'dibuat'
    ];
}
