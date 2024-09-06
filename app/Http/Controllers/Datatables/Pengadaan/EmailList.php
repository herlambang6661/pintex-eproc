<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EmailList extends Controller
{
    public function index(Request $request)
    {
        $entitas = $request->session()->get('entitas');

        if ($request->ajax()) {
            $dari = $request->dari ? $request->dari : date('Y-m-01');
            $sampai = $request->sampai ? $request->sampai : date('Y-m-d');

            $type = $request->type;

            $query = DB::table('permintaanitm AS pe')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                ->where('pe.entitas', 'LIKE', '%' . $entitas . '%')
                ->orderBy('pe.kodeseri', 'desc');

            if ($type == 'table2') {
                $query->where('pe.proses_email', 1);
            } elseif ($type == 'table3') {
                $query->where('pe.proses_email', 1)
                    ->where('pe.status', 'PROSES PEMBELIAN');
            } elseif ($type == 'table4') {
                $query->where('pe.proses_email', 1)
                    ->where('pe.status', 'DIBELI');
            }

            $data = $query->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    return Carbon::parse($row->tgl)->format('d/m/Y');
                })
                ->addColumn('status', function ($row) {
                    return $this->getStatusBadge($row->status);
                })

                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['action', 'select_orders', 'status', 'tgl'])
                ->make(true);
        }

        return view('pages.products.02_pengadaan.email');
    }

    /**
     * Helper method to generate status badge HTML.
     */
    private function getStatusBadge($status)
    {
        switch ($status) {
            case 'PROSES PERSETUJUAN':
                return '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span> <b class="text-blue">' . $status . '</b>';
            case 'ACC':
                return '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span> <b class="text-purple">' . $status . '</b>';
            case 'HOLD':
                return '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span> <b class="text-orange">' . $status . '</b>';
            case 'REJECT':
                return '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span> <b class="text-red">' . $status . '</b>';
            case 'PROSES PEMBELIAN':
                return '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span> <b class="text-lime">' . $status . '</b>';
            case 'DIBELI':
                return '<span class="status-dot status-dot-animated status-green" style="font-size:11px"></span> <b class="text-green">' . $status . '</b>';
            case 'DITERIMA':
                return '<span class="status-dot status-dot-animated status-teal" style="font-size:11px"></span> <b class="text-teal">' . $status . '</b>';
            default:
                return '<span class="status-dot status-dot-animated status-dark"></span> <b class="text-dark">' . $status . '</b>';
        }
    }
}
