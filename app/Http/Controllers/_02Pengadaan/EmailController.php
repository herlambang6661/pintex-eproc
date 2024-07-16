<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function email()
    {
        return view('products.02_pengadaan.email', [
            'active' => 'ProsesEmail'
        ]);
    }
}
