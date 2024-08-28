<?php

namespace App\Models\Gudang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    use HasFactory;
    protected $table = 'transit';
    protected $fillable = [
        'tgl',
        'noform_transit',
        'gaterang_global',
        'dibuat',
    ];
}
