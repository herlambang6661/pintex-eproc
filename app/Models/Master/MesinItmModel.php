<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MesinItmModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_itm';
    protected $table = 'mastermesinitm';
    protected $fillable = [
        'id_mesin',
        'id_mesinitm',
        'merk',
        'kode_nomor',
        'foto',
        'dibuat',
    ];

    public function mesin(): BelongsTo
    {
        return $this->belongsTo(MesinModel::class, 'id_mesin');
    }
}
