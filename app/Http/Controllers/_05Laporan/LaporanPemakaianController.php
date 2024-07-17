<?php

namespace App\Http\Controllers\_05Laporan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LaporanPemakaianController extends Controller
{
    public function pemakaian()
    {
        return view('products.05_laporan.laporan_pemakaian', [
            'active' => 'Pemakaian',
        ]);
    }
}
