<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function CariBarangSearchEngine(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $itm = DB::table('permintaanitm')
                ->select('kodeseri', 'namaBarang', 'keterangan', 'katalog', 'part')
                ->where('kodeseri', 'LIKE', "%$search%")
                ->orWhere('namaBarang', 'LIKE', "%$search%")
                ->orWhere('keterangan', 'LIKE', "%$search%")
                ->orWhere('katalog', 'LIKE', "%$search%")
                ->orWhere('part', 'LIKE', "%$search%")
                ->orderBy('namaBarang', 'ASC')
                ->get();
        } else {
        }
        return Response()->json($itm);
    }
}
