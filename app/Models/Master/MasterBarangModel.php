<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarangModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_masterbarang';
    protected $table = 'gd_masterbarang';
    protected $fillable = [
        'kodebarang',
        'nama',
        'inisial',
        'tipe',
        'dibuat'
    ];
}
