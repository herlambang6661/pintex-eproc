<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian()
    {
        return view('products.02_pengadaan.pembelian', [
            'active' => 'Pembelian',
        ]);
    }
}
