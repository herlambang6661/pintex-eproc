<?php

namespace App\Http\Controllers\_02Pengadaan;

use App\Models\Pengadaan\PermintaanItm;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PersetujuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function persetujuan()
    {
        return view('products.02_pengadaan.persetujuan', [
            'active' => 'Persetujuan',
        ]);
    }
}
