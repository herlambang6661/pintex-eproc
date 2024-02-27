<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Pengadaan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function permintaan()
    {
        return view('products/02_pengadaan.permintaan');
    }
}
