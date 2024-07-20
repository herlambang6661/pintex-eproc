<?php

namespace App\Http\Controllers\_04Teknik;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function servis()
    {
        return view('products.04_teknik.servis', [
            'active' => 'Servis',
            'judul' => 'Servis'
        ]);
    }
}
