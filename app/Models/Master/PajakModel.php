<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakModel extends Model
{
    use HasFactory;
    protected $table = 'pajak';
    protected $fillable = [
        'tax_code',
        'jenis_pajak',
        'rate',
        'pembuat'
    ];
}
