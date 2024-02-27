<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermintaanItm extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'jenis',
        'tgl',
        'kodeseri',
        'noform',
        'kodeproduk',
        'namaBarang',
        'keterangan',
        'katalog',
        'part',
        'mesin',
        'qty',
        'satuan',
        'pemesan',
        'unit',
        'peruntukan',
        'dibeli',
        'acc',
        'qtyterima',
        'qtyacc',
        'pembeli',
        'status',
        'urgent',
        'nsupp',
        'partial',
    ];
}
