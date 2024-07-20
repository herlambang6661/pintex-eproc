<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function sample()
    {
        return view('products.03_gudang.sample', [
            'active' => 'Sample',
            'judul' => 'Sample'
        ]);
    }
}
