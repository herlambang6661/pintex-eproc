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

            $data = DB::table('pembelianitm AS pi')
                ->select('pi.noform', 'pi.nofaktur', 'pi.kode', 'pi.namabarang', 'pi.kts', 'pi.satuan', 'pi.harga', 'pi.supplier', 'pi.jumlah', 'pe.tgl', 'pe.currid')
                ->join('pembelian AS pe', 'pi.noform', '=', 'pe.noform')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                // ->orderBy('kode', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kts', function ($row) {
                    $result = $row->kts . " " . $row->satuan;
                    return $result;
                })
                ->addColumn('harga', function ($row) {
                    if ($row->currid == "IDR") {
                        $result = number_format($row->harga, 0, ",", ".");
                    } else {
                        $result = number_format($row->harga, 2, ",", ".");
                    }
                    return $result;
                })
                ->addColumn('jumlah', function ($row) {
                    if ($row->currid == "IDR") {
                        $result = number_format($row->jumlah, 0, ",", ".");
                    } else {
                        $result = number_format($row->jumlah, 2, ",", ".");
                    }
                    return $result;
                })
                ->rawColumns(['kts', 'harga', 'jumlah'])
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
