<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuplierModel extends Model
{
    use HasFactory;
    protected $table = 'gd_suplier';
    protected $fillable = [
        'uang_id',
        'nama',
        'tipe',
        'jabatan',
        'pembelian',
        'npwp',
        'alamat',
        'kopos',
        'kota',
        'provinsi',
        'telp',
        'contact',
        'fax',
        'email',
        'website',
        'catatan',
        'dibuat',
        'status',
    ];

    public function uang(): BelongsTo
    {
        return $this->belongsTo(UangModel::class, 'id');
    }
}
