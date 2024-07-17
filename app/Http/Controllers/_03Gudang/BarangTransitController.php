<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BarangTransitController extends Controller
{
    public function barangTransit()
    {
        return view('products.03_gudang.barang_transit', [
            'active' => 'BarangTransit'
        ]);
    }
}
