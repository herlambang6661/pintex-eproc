<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    public function email()
    {
        return view('products.02_pengadaan.email', [
            'active' => 'ProsesEmail',
            'judul' => 'Email'
        ]);
    }
}
