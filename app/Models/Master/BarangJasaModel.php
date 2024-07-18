<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJasaModel extends Model
{
    use HasFactory;
    protected $table = 'barangjasa';
    protected $fillable = [
        'keterangan',
        'satuan',
        'jurnal',
        'persediaan',
        'penjualan',
        'pembelian',
        'penerimaan',
        'pembayaran',
        'catatan',
        'dibuat',
    ];
}
