<?php

namespace App\Http\Controllers\_05Laporan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function stok()
    {
        return view('products.05_laporan.laporan_stok', [
            'active' => 'Stok',
        ]);
    }
}
