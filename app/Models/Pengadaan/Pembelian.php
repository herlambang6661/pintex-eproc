<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'nofkt',
        'tgl',
        'kurs',
        'currid',
        'penjual',
        'pembeli',
        'alamat',
        'kirim',
        'pajak',
        'noform',
        'subtotal',
        'diskon',
        'diskonint',
        'thasil',
        'totppn',
        'termasukpajak',
        'grandtotal',
        'catatan',
        'dibuat'
    ];

    public function getDatatablesCheck()
    {
        $this->_get_datatables_query_check();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
}
