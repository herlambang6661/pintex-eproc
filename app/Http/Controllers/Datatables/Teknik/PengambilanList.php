<?php

namespace App\Http\Controllers\Datatables\Teknik;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\_02Pengadaan\PermintaanController;


class PengambilanList extends Controller
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

            $data = DB::table('pengambilanitm AS b')
                ->whereBetween('b.tanggal', [$dari, $sampai])
                ->orderBy('b.kodeseri', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_permintaan', function ($row) {
                    $m = Carbon::parse($row->tanggal)->format('d/m/Y');
                    return $m;
                })
                ->addColumn('mesin', function ($row) {
                    $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk', 'mi.kode_nomor')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $row->mesin)->first();

                    $res =  $getMesin->mesin . " " . $getMesin->merk . " " . $getMesin->kode_nomor;
                    return $res;
                })
                ->rawColumns(['action', 'select_orders', 'status', 'tgl'])
                ->make(true);
        }

        return view('products.04_teknik.pengambilan');
    }

    public function destroy($id)
    {
        DB::table('barang')->where('kodeseri', '=', $id)->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
}
