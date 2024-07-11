<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengadaan\PermintaanItm;

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
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('mesinV', function ($row) {
                //     $getmesin = DB::table('mastermesin')
                //         ->join('mastermesinitm', 'mastermesin.id', '=', 'mastermesinitm.id_mesin')
                //         ->where('id_mesinitm', $row->mesin)
                //         ->get();
                //     foreach ($getmesin as $key) {
                //         $m = $key->mesin . " - " . $key->merk;
                //     }
                //     return $m;
                // })
                ->addColumn('stt', function ($row) {

                    $getstatus = DB::table('permintaanitm')->get();
                    foreach ($getstatus as $key) {
                        $ss = $key->status;
                    }
                    if ($ss == 'PROSES PERSETUJUAN') {
                        $c = '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span> <b class="text-blue">' . $ss . '</b>';
                    } elseif ($ss == 'ACC') {
                        $c = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span> <b class="text-purple">' . $ss . '</b>';
                    } elseif ($ss == 'HOLD') {
                        $c = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span> <b class="text-orange">' . $ss . '</b>';
                    } elseif ($ss == 'REJECT') {
                        $c = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span> <b class="text-red">' . $ss . '</b>';
                    } elseif ($ss == 'PROSES PEMBELIAN') {
                        $c = '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span> <b class="text-lime">' . $ss . '</b>';
                    } elseif ($ss == 'DIBELI') {
                        $c = '<span class="status-dot status-dot-animated status-green" style="font-size:11px"></span> <b class="text-green">' . $ss . '</b>';
                    } elseif ($ss == 'DITERIMA') {
                        $c = '<span class="status-dot status-dot-animated status-teal" style="font-size:11px"></span> <b class="text-teal">' . $ss . '</b>';
                    } else {
                        $c = '<span class="status-dot status-dot-animated status-dark"></span> <b class="text-dark">' . $ss . '</b>';
                    }
                    return $c;
                })
                ->addColumn('action', function ($row) {

                    if ($row->status == "PROSES PERSETUJUAN" && (Auth::user()->alias == 'pur' || Auth::user()->alias == 'kng' || Auth::user()->alias == 'own')) {
                        $btn = '<div class="btn-list flex-nowrap">
                                    <a href="#" class="btn btn-sm btn-link">
                                        <i class="fa-solid fa-print" style="margin-right:5px;"></i>
                                    </a>
                                        <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="" target="_blank" data-id="' . $row->id . '"><i class="icon-copy dw dw-print"></i> Print</a> 
                                            <a class="dropdown-item" href="#myModal" id="custId" data-toggle="modal" data-id="' . $row->id . '" data-noform="' . $row->noform . '"><i class="dw dw-eye"></i> Lihat</a> 
                                            <a class="remove dropdown-item" href="javascript:void(0);" data-iditm="' . substr($row->kodeseri, 0, 3) . "-" . substr($row->kodeseri, 3, 3) . '" data-ket="' . $row->namaBarang . '" data-desc="' . $row->keterangan . '"><i class="icon-copy dw dw-delete-3"></i> Hapus</a>
                                            <a class="dropdown-item" style="margin: 4px 4px 4px 4px" href="#myModaleditPem" id="custId" data-toggle="modal" data-id="' . $row->id . '"><i class="icon-copy dw dw-pencil"></i> Edit</a>
                                        </div>
                                </div>';
                    }
                    if (($row->status == "PROSES PERSETUJUAN" || $row->status == "ACC" || $row->status == "MENUNGGU ACC" || $row->status == "PROSES PEMBELIAN" || $row->status == "HOLD" || $row->status == "REJECT") && (Auth::user()->alias == 'pur' || Auth::user()->alias == 'kng' || Auth::user()->alias == 'own')) {
                        $btn = '<div class="btn-list flex-nowrap">
                                    <a href="#" class="btn btn-sm btn-link">
                                        <i class="fa-solid fa-print" style="margin-right:5px;"></i>
                                    </a>
                                        <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="" target="_blank" data-id="' . $row->id . '"><i class="icon-copy dw dw-print"></i> Print</a> 
                                            <a class="dropdown-item" href="#myModal" id="custId" data-toggle="modal" data-id="' . $row->id . '" data-noform="' . $row->noform . '"><i class="dw dw-eye"></i> Lihat</a> 
                                            <a class="dropdown-item" style="margin: 4px 4px 4px 4px" href="#myModaleditPem" id="custId" data-toggle="modal" data-id="' . $row->id . '"><i class="icon-copy dw dw-pencil"></i> Edit</a>
                                        </div>
                                </div>';
                    }
                    if (($row->status == "PROSES PERSETUJUAN" || $row->status == "ACC" || $row->status == "MENUNGGU ACC" || $row->status == "PROSES PEMBELIAN" || $row->status == "HOLD" || $row->status == "REJECT" || $row->status == "DITERIMA" || $row->status == "DIBELI")) {
                        $btn = '<div class="btn-list flex-nowrap">
                                    <a href="#" class="btn btn-sm btn-link">
                                        <i class="fa-solid fa-print" style="margin-right:5px;"></i>
                                    </a>
                                    <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item" href="" target="_blank" data-id="' . $row->id . '"><i class="icon-copy dw dw-print"></i> Print</a> 
                                        <a class="dropdown-item" href="#myModal" id="custId" data-toggle="modal" data-id="' . $row->id . '" data-noform="' . $row->noform . '"><i class="dw dw-eye"></i> Lihat</a>
                                    </div>
                                </div>';
                    }
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
