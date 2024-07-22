<?php

namespace App\Http\Controllers\_04Teknik;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function retur()
    {
        return view('products.04_teknik.retur', [
            'active' => 'Retur',
            'judul' => 'Retur'
        ]);
    }
}
