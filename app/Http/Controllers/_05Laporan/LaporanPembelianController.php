<?php

namespace App\Http\Controllers\_05Laporan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LaporanPembelianController extends Controller
{
    public function pembelian()
    {
        return view('products.05_laporan.laporan_pembelian', [
            'active' => 'LaporanPembelian',

        ]);
    }
}
