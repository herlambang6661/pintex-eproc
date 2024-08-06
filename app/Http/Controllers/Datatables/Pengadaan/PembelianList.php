<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\_02Pengadaan\PermintaanController;

class PembelianList extends Controller
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
            $data = DB::table('pembelianitm')->orderBy('id', 'desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                // ->editColumn('select_orders', function ($row) {
                //     return '';
                // })
                ->rawColumns([''])
                ->make(true);
        }

        return view('products.02_pengadaan.pembelian');
    }

    public function destroy($id)
    {
        DB::table('pembelianitm')->where('kodeseri', '=', $id)->delete();
        return response()->json(['success' => 'Record deleted successfully.']);
    }
}
