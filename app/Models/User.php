<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'alias',
        'phone',
        'entitas_all',
        'entitas_pintex',
        'entitas_tfi',
        'p_master',
        'p_pengadaan',
        'c_permintaan',
        'c_persetujuan',
        'c_email',
        'c_pembelian',
        'c_status',
        'p_gudang',
        'c_stock',
        'c_penerimaan',
        'c_pengiriman',
        'c_sample',
        'c_transit',
        'c_mutasi',
        'p_teknik',
        'c_servis',
        'c_retur',
        'c_pengambilan',
        'p_laporan',
        'c_lap_pemakaian',
        'c_lap_pembelian',
        'c_lap_stock',
        'p_pengaturan',
        'c_pengguna',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
