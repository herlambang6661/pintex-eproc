<?php

namespace App\Http\Controllers\_04Teknik;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function barcode()
    {
        return view('products.04_teknik.barcode', [
            'active' => 'Barcode',
            'judul' => 'Barcode'
        ]);
    }
}
