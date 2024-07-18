<?php

namespace App\Http\Controllers\_04Teknik;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PengambilanController extends Controller
{
    public function pengambilan()
    {
        return view('products.04_teknik.pengambilan', [
            'active' => 'Pengambilan',
        ]);
    }
}
