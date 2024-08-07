<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengadaan\PermintaanItm;
use App\Http\Controllers\_02Pengadaan\PermintaanController;


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
            if ($request->dari) {
                $dari = $request->dari;
            } else {
                $dari = date('Y-m-01');
            }

            if ($request->sampai) {
                $sampai = $request->sampai;
            } else {
                $sampai = date('Y-m-d');
            }

            $data = DB::table('permintaanitm AS pe')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                ->orderBy('pe.kodeseri', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return $m;
                })
                ->addColumn('action', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return $m;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'PROSES PERSETUJUAN') {
                        $c = '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span> <b class="text-blue">' . $row->status . '</b>';
                    } elseif ($row->status == 'ACC') {
                        $c = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span> <b class="text-purple">' . $row->status . '</b>';
                    } elseif ($row->status == 'HOLD') {
                        $c = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span> <b class="text-orange">' . $row->status . '</b>';
                    } elseif ($row->status == 'REJECT') {
                        $c = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span> <b class="text-red">' . $row->status . '</b>';
                    } elseif ($row->status == 'PROSES PEMBELIAN') {
                        $c = '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span> <b class="text-lime">' . $row->status . '</b>';
                    } elseif ($row->status == 'DIBELI') {
                        $c = '<span class="status-dot status-dot-animated status-green" style="font-size:11px"></span> <b class="text-green">' . $row->status . '</b>';
                    } elseif ($row->status == 'DITERIMA') {
                        $c = '<span class="status-dot status-dot-animated status-teal" style="font-size:11px"></span> <b class="text-teal">' . $row->status . '</b>';
                    } else {
                        $c = '<span class="status-dot status-dot-animated status-dark"></span> <b class="text-dark">' . $row->status . '</b>';
                    }
                    return $c;
                })
                ->addColumn('action', function ($row) {
                    // Menampilkan button edit jika kondisi edited di dalam db = 0
                    if (($row->edited == 0 || $row->edited == null) && $row->status == 'PROSES PERSETUJUAN') {
                        $btnEdit = '<a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditPermintaan" data-id="' . $row->id . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        Edit
                                    </a>';
                    } else {
                        $btnEdit = ' ';
                    }
                    if ($row->status == "PROSES PERSETUJUAN" && (Auth::user()->alias == 'pur' || Auth::user()->alias == 'kng' || Auth::user()->alias == 'own')) {
                        $btnCondition = '
                                    <a class="remove dropdown-item" href="javascript:void(0);" data-id="' . $row->kodeseri . '" data-nama="' . $row->namaBarang . '" data-desc="' . $row->keterangan . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-red icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                        Hapus
                                    </a>' . $btnEdit;
                    } else {
                        $btnCondition = ' ' . $btnEdit;
                    }
                    $btn = '<div class="btn-list flex-nowrap">
                                <form method="POST" action="printPermintaan" target="_blank">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="hidden" name="noform" value="' . $row->noform . '">
                                    <button type="submit" class="btn btn-sm btn-link btn-icon">
                                        <i class="fa-solid fa-print" style="margin-right:5px;"></i>
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <form method="POST" action="printPermintaan" target="_blank">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                                        <input type="hidden" name="noform" value="' . $row->noform . '">
                                        <button type="submit" class="dropdown-item">
                                            <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-blue icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                            PRINT
                                        </button>
                                    </form>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan" data-id="' . $row->id . '" data-noform="' . $row->noform . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-green icon-tabler icons-tabler-outline icon-tabler-file-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5" /><path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" /><path d="M18.5 19.5l2.5 2.5" /></svg>
                                        Lihat
                                    </a>' .
                        $btnCondition
                        . '</div>
                        </div>';
                    return $btn;
                })
                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['action', 'select_orders', 'status', 'tgl'])
                ->make(true);
        }

        return view('products.02_pengadaan.permintaan');
    }

    public function destroy($id)
    {
        DB::table('permintaanitm')->where('kodeseri', '=', $id)->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
}
