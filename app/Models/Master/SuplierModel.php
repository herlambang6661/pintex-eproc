<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuplierModel extends Model
{
    use HasFactory;
    protected $table = 'person';
    protected $fillable = [
        'id',
        'entitas',
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
        'uang',
        'email',
        'dibuat',
        'status',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SuplierModel::class, 'id');
    }
}
