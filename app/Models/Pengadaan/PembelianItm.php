<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianItm extends Model
{
    use HasFactory;
    protected $table = 'pembelianitm';
    protected $fillable = [
        'noform',
        'nofaktur',
        'kode',
        'namabarang',
        'kts',
        'satuan',
        'harga',
        'pajak',
        'nmpajak',
        'pj',
        'jumlah',
        'supplier',
        'estimasi',
        'estimasi_tgl',
        'garansi',
        'garansi_tgl',
        'parsial',
        'non',
        'dibuat'
    ];
}
