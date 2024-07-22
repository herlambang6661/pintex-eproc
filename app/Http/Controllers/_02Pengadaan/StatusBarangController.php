<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class StatusBarangController extends Controller
{
    public function statusBarang()
    {
        return view('products.02_pengadaan.status_barang', [
            'active' => 'StatusBarang',
            'judul' => 'Status Barang',
        ]);
    }
}
