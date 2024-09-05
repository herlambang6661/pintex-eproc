<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaanitm extends Model
{
    use HasFactory;
    protected $table = 'penerimaanitm';
    protected $fillable = [
        'npb',
        'tanggal',
        'kodeseri',
        'nama',
        'katalog',
        'mesin',
        'kts',
        'satuan',
        'pemesan',
        'urgent',
        'dibeli',
        'locker',
        'partial',
        'dibuat'
    ];
}
