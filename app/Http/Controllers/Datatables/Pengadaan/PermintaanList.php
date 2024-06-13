<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use App\Models\Pengadaan\PermintaanItm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PermintaanList extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('permintaanitm')
                ->orderBy('kodeseri', 'desc')
                ->where('tgl', '2024-02-28')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('mesinV', function ($row) {
                    $getmesin = DB::table('mastermesin')
                        ->join('mastermesinitm', 'mastermesin.id', '=', 'mastermesinitm.id_mesin')
                        ->where('id_mesinitm', $row->mesin)
                        ->get();
                    foreach ($getmesin as $key) {
                        $m = $key->mesin . " - " . $key->merk;
                    }
                    return $m;
                })
                ->addColumn('stt', function ($row) {

                    $getstatus = DB::table('permintaanitm')->get();
                    foreach ($getstatus as $key) {
                        $ss = $key->status;
                    }
                    if ($ss == 'PROSES PERSETUJUAN') {
                        $c = '<span class="status status-blue" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'ACC') {
                        $c = '<span class="status status-purple" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'HOLD') {
                        $c = '<span class="status status-orange" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'REJECT') {
                        $c = '<span class="status status-red" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'PROSES PEMBELIAN') {
                        $c = '<span class="status status-lime" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'DIBELI') {
                        $c = '<span class="status status-green" style="font-size:11px">' . $ss . '</span>';
                    } elseif ($ss == 'DITERIMA') {
                        $c = '<span class="status status-teal" style="font-size:11px">' . $ss . '</span>';
                    } else {
                        $c = '<span class="status status-dark">' . $ss . '</span>';
                    }
                    return $c;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list flex-nowrap">
                                <a href="#" class="btn btn-indigo w-100">
                                    <i class="fa-solid fa-print" style="margin-right:5px;"></i>Print
                                </a>
                                <div class="dropdown">
                                    <button class="btn btn-dark w-100 dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-bars" style="margin-right:5px"></i> Opsi
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-pen-to-square" style="margin-right:5px;"></i> Edit Permintaan
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-eye" style="margin-right:5px;"></i> Lihat Detail
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa-solid fa-trash-can" style="margin-right:5px"></i> Hapus Permintaan
                                        </a>
                                    </div>
                                </div>
                            </div>';
                    // $btn = '
                    // <a style="margin: 4px 4px 4px 4px" class="btn btn-outline-primary btn-icon" href="https://pintex.co.id/apps/index.php/GD/Pengadaan/print/1716/24-00350" target="_blank" data-id="6674"><i class="fas fa-print fa-fw"></i></a> 
                    // <a href="#myModal" class="btn btn-outline-info btn-icon" id="custId" data-toggle="modal" data-id="6674" data-noform="24-00350"><i class="fas fa-eye fa-fw"></i></a> 
                    // <a href="javascript:void(0);" class="remove btn btn-outline-danger btn-icon" data-iditm="120-101" data-ket="BEARING" data-desc="6309 2RS C3"><i class="fas fa-trash fa-fw"></i></a>
                    // <a style="margin: 4px 4px 4px 4px" href="#myModaleditPem" class="btn btn-outline-success btn-icon" id="custId" data-toggle="modal" data-id="6674"><i class="fas fa-pencil fa-fw"></i></a>';

                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="View" class="view btn btn-info btn-sm viewProduct"><i class="fa-solid fa-fw fa-eye"></i> Lihat</a>  <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fa-solid fa-fw fa-pen-to-square"></i> Edit</a>';
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-item="' . $row->kodeseri . '" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa-solid fa-fw fa-trash-can"></i> Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'stt', 'mesinV'])
                ->make(true);
        }

        return view('products.02_administrasi.suratkontrak');
    }
}
