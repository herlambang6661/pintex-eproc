<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function penerimaan()
    {
        return view('products.03_gudang.penerimaan', [
            'active' => 'Penerimaan',
        ]);
    }
}
