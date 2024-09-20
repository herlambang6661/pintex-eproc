<?php

namespace App\Models\Teknik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisitmModel extends Model
{
    use HasFactory;
    protected $table = 'servisitm';

    protected $fillable = [
        'tgl_servis',
        'noformservis',
        'kodeseri_servis',
        'subkodeseri_servis',
        'kodeproduk_servis',
        'namaBarang',
        'keterangan',
        'serialnumber',
        'katalog',
        'part',
        'mesin',
        'qty',
        'qtykirim',
        'satuan',
        'suratjalan',
        'pemesan',
        'qty_sample',
        'kodeseri_partial',
        'urgent',
        'expedisi',
        'supplier',
        'tglpenentuanservis',
        'tglacc',
        'acc_servis',
        'statusACC',
        'keteranganACC',
        'tgl_pengiriman',
        'tgl_diterima',
        'qty_terima',
        'status',
        'estimasi',
        'garansi',
        'estimasi_tgl',
        'garansi_tgl',
        'edited',
        'dibuat'
    ];
}
