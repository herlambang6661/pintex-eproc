<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function pengiriman()
    {
        return view('products.03_gudang.pengiriman', [
            'active' => 'Pengiriman',
            'judul' => 'Pengiriman'
        ]);
    }
}
