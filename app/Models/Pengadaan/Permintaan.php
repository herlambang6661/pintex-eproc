<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permintaan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'tanggal',
        'noform',
        'kabag',
        'keteranganform',
        'foto',
        'dibuat',
    ];
}
