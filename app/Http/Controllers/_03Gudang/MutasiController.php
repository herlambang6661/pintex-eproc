<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function mutasi()
    {
        return view('products.03_gudang.mutasi', [
            'active' => 'Mutasi',
            'judul' => 'Mutasi'
        ]);
    }
}
