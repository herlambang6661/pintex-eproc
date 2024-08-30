<?php

namespace App\Models\Teknik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanItm extends Model
{
    use HasFactory;
    protected $table = 'pengambilanitm';
    protected $fillable = [
        'tanggal',
        'noform',
        'kodeseri',
        'namaBarang',
        'mesin',
        'unit',
        'jumlah',
        'jam',
        'keterangan',
        'diambil',
        'dibuat',
    ];
}
