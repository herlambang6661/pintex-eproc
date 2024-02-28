<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'tipe',
        'jabatan',
        'pembelian',
        'kabag',
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
}
