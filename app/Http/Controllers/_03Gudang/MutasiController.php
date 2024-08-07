<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function mutasi()
    {
        return view('products.03_gudang.mutasi', [
            'active' => 'Mutasi',
            'judul' => 'Mutasi'
        ]);
    }
}
