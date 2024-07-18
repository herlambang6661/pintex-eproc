<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LockerModel extends Model
{
    use HasFactory;
    protected $table = 'locker';
    protected $fillable = [
        'qr',
        'inisial',
        'gudang',
        'keterangan',
        'qrcode',
        'dibuat',
    ];
}
