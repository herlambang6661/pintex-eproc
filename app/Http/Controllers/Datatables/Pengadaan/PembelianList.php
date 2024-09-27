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
                ->editColumn('namabarang', function ($row) {
                    $result = strtoupper($row->namabarang);
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
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list flex-nowrap">
                                <a href="#" class="btn btn-sm btn-link btn-icon" data-bs-toggle="modal" data-bs-target="#modalViewPembelian" data-nofkt="' . $row->nofaktur . '">
                                    <i class="fa-solid fa-eye" style="margin-right:5px;"></i>
                                </a>
                                <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <form method="POST" action="printPembelian" target="_blank">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                                        <input type="hidden" name="nofkt" value="' . $row->nofaktur . '">
                                        <button type="submit" class="dropdown-item">
                                            <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-blue icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                            PRINT
                                        </button>
                                    </form>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan" data-id="' . $row->kode . '" data-noform="' . $row->noform . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-orange icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        EDIT
                                    </a>
                                </div>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['kts', 'harga', 'jumlah', 'action'])
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
