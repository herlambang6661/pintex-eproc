<?php

namespace App\Http\Controllers\_03Gudang;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function stock()
    {
        return view('products.03_gudang.stock', [
            'active' => 'Stock',
            'judul' => 'Stock'
        ]);
    }

    public function getStockBarang(Request $request)
    {
        if (empty($request->idcari)) {
            echo '<div class="alert alert-important alert-warning alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                        </div>
                        <div>
                            Kolom Tidak Boleh Kosong
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>';
        } else {
            $getBarang = DB::table('barang as k')
                ->select(DB::raw(
                    "k.kodeseri, k.namaBarang, k.keterangan, k.katalog, k.part, k.satuan, k.qty_beli, k.qty_diterima, k.qty_partial, k.qty_diambil, k.pemesan, k.gudang, k.locker"
                ))
                ->where('k.status', '=', 'DITERIMA')
                ->where('k.namaBarang', 'like', '%' . $request->idcari . '%')
                ->orWhere('k.kodeseri', '=', $request->idcari)
                ->get();

            foreach ($getBarang as $key) {
                $diambil = DB::table('pengambilanitm')->where('kodeseri', $key->kodeseri)->count();
                echo '
                <div class="card mb-5 shadow border border-azure">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-bordered table-nowrap card-table table-sm">
                            <thead>
                                <tr>
                                    <td class="text-center">
                                        <div class="text-uppercase text-secondary font-weight-medium pt-2 pl-0">Locker</div>
                                        <div class="display-6 fw-bold my-3">' . (empty($key->locker) ? "-" : $key->locker) . '</div>
                                    </td>
                                    <td class="w-50 ps-4">
                                        <h2>( ' . $key->kodeseri . ' ) ' . strtoupper($key->namaBarang) . '</h2>
                                        <div class="text-secondary text-wrap text-uppercase">
                                            ' . strtoupper($key->keterangan) . ' ' . strtoupper($key->katalog) . ' ' . strtoupper($key->part) . '
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-uppercase text-secondary font-weight-medium">Diterima</div>
                                        <div class="display-6 fw-bold my-3">' . number_format($key->qty_diterima, 0, ",", ".") . '</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-uppercase text-secondary font-weight-medium">Terpakai</div>
                                        <div class="display-6 fw-bold my-3">' . number_format($diambil, 0, ",", ".") .  '</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-uppercase text-secondary font-weight-medium">Stok</div>
                                        <div class="display-6 fw-bold my-3">' . number_format(($key->qty_diterima - $diambil), 0, ",", ".") . '</div>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                ';
                echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            ';
            }
        }
    }
}
