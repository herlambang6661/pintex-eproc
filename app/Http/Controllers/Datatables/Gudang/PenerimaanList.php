<?php

namespace App\Http\Controllers\Datatables\Gudang;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\_02Pengadaan\PermintaanController;
use Carbon\Carbon;

class PenerimaanList extends Controller
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
            if ($request->dari) {
                $dari = $request->dari;
            } else {
                $dari = date('Y-01-01');
            }
            if ($request->sampai) {
                $sampai = $request->sampai;
            } else {
                $sampai = date('Y-m-d');
            }

            // $data = DB::table('barang')
            //     ->where('status', '=', 'DITERIMA')
            //     ->whereBetween('tgl_penerimaan', [$dari, $sampai])
            //     ->orderBy('tgl_penerimaan', 'desc')
            //     ->get();

            $data = DB::table('barang AS pe')
                ->select('pe.*', 'pe.mesin as idmesin', 'me.mesin', 'mi.merk')
                ->leftJoin('mastermesinitm AS mi', 'pe.mesin', '=', 'mi.id_itm')
                ->leftJoin('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
                ->where('status', '=', 'DITERIMA')
                ->whereBetween('pe.tgl_penerimaan', [$dari, $sampai])
                ->orderBy('tgl_penerimaan', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $tgl = Carbon::parse($row->tgl_penerimaan)->format('d/m/Y');
                    return $tgl;
                })
                ->addColumn('mesin', function ($row) {
                    // $permintaanController = new PermintaanController();
                    // $m = $permintaanController->getMesinPermintaan($row->mesin);
                    $m = $row->mesin . " " . $row->merk;
                    return $m;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list flex-nowrap">
                                <button class="btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <button type="submit" class="dropdown-item"data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan" data-id="' . $row->kodeseri . '"">
                                        <i class="fa-solid fa-eye" style="margin-right:10px;"></i>
                                        LIHAT
                                    </button>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan" data-id="' . $row->kodeseri . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-orange icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        EDIT
                                    </a>
                                </div>
                            </div>';
                    return $btn;
                })
                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['action', 'select_orders'])
                ->make(true);
        }

        return view('products.03_gudang.penerimaan');
    }
}
