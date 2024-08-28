<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function CariBarangSearchEngine(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $itm = DB::table('permintaanitm')
                ->select('kodeseri', 'namaBarang', 'keterangan', 'katalog', 'part')
                ->where('kodeseri', 'LIKE', "%$search%")
                ->orWhere('namaBarang', 'LIKE', "%$search%")
                ->orWhere('keterangan', 'LIKE', "%$search%")
                ->orWhere('katalog', 'LIKE', "%$search%")
                ->orWhere('part', 'LIKE', "%$search%")
                ->orderBy('namaBarang', 'ASC')
                ->get();
        } else {
        }
        return Response()->json($itm);
    }
    public function BarangSearchEngineModal(Request $request)
    {
        $satu = '';
        $dua = '';
        $tiga = '';
        $empat = '';
        $lima = '';
        $enam = '';
        $package = '';
        $hold = '';
        $reject = '';
        $retur = '';
        $txtenam = 'Diterima';

        $getData = DB::table('permintaanitm')->where('kodeseri', $request->kodeseri)->first();
        if ($getData->status == 'PROSES PERSETUJUAN') {
            $satu = 'active';
        } elseif ($getData->status == 'MENUNGGU ACC') {
            $dua = 'active';
        } elseif ($getData->status == 'ACC') {
            $tiga = 'active';
        } elseif ($getData->status == 'PROSES PEMBELIAN') {
            $empat = 'active';
        } elseif ($getData->status == 'DIBELI') {
            $lima = 'active';
        } elseif ($getData->status == 'DITERIMA') {
            $enam = 'active';
        } elseif ($getData->status == 'MASUK PACKAGE') {
            $package = 'active steps-orange';
            $txtenam = ucwords($getData->status);
        } elseif ($getData->status == 'HOLD') {
            $hold = 'active steps-cyan';
            $txtenam = ucwords($getData->status);
        } elseif ($getData->status == 'REJECT') {
            $reject = 'active steps-red';
            $txtenam = ucwords($getData->status);
        } elseif ($getData->status == 'RETUR') {
            $retur = 'active steps-purple';
            $txtenam = ucwords($getData->status);
        }
        echo '
        <div class="card">
            <div class="card-body">
                <ul class="steps steps-green steps-counter my-4">
                    <li data-bs-toggle="tooltip" title="Tanggal Pengajuan ' . Carbon::parse($getData->tgl)->format("d/m/Y") . '" class="step-item ' . $satu . '">Pengajuan ' . $getData->kodeseri . '</li>
                    <li data-bs-toggle="tooltip" title="Tanggal QTY ACC ' . Carbon::parse($getData->tgl_qty_acc)->format("d/m/Y") . '" class="step-item ' . $dua . '">Penentuan QTY ACC</li>
                    <li data-bs-toggle="tooltip" title="Tanggal ACC ' . Carbon::parse($getData->tgl_acc)->format("d/m/Y") . '" class="step-item ' . $tiga . ' ' . $hold . ' ' . $reject . '">ACC Pimpinan</li>
                    <li data-bs-toggle="tooltip" title="Tanggal ' . Carbon::parse($getData->tgl_pembelian)->format("d/m/Y") . '" class="step-item ' . $empat . '">Proses Pembelian</li>
                    <li class="step-item ' . $lima . '">Dibeli</li>
                    <li data-bs-toggle="tooltip" title="Tanggal Diterima ' . Carbon::parse($getData->tgl_terima)->format("d/m/Y") . '" class="step-item ' . $enam . ' ' . $package . ' ' . $retur . '">' . $txtenam . '</li>
                </ul>
            </div>
            <div class="card-body">
                <h3 class="card-title">Detail</h3>
                <ul class="steps steps-counter steps-vertical">
                    <li class="step-item ' . $satu . '">
                        <div class="h4 m-0">Pengajuan</div>
                        <div class="text-secondary">
                            ' . $getData->namaBarang . ' ' . $getData->keterangan . ' ' . $getData->katalog . ' ' . $getData->part . ' diajukan tanggal ' . Carbon::parse($getData->tgl)->format("d/m/Y") . ' dengan kodeseri <strong>' . $getData->kodeseri . '</strong><br>
                            Qty : ' . $getData->qty . ' ' . $getData->satuan . '. Pemesan : ' . $getData->pemesan . '
                        </div>
                    </li>
                    <li class="step-item ' . $dua . '">
                        <div class="h4 m-0">Penentuan QTY ACC</div>
                        <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                    </li>
                    <li class="step-item ' . $tiga  . ' ' . $hold . ' ' . $reject . '">
                        <div class="h4 m-0">ACC Pimpinan</div>
                        <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                    </li>
                    <li class="step-item ' . $empat . '">
                        <div class="h4 m-0">Proses Pembelian</div>
                        <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                    </li>
                    <li class="step-item ' . $lima . '">
                        <div class="h4 m-0">Dibeli</div>
                        <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                    </li>
                    <li class="step-item ' . $enam . ' ' . $package . ' ' . $retur . '">
                        <div class="h4 m-0">' . $txtenam . '</div>
                        <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                    </li>
                </ul>
            </div>
        </div>
        ';
    }
    public function landing()
    {
        return view('landing');
    }
}
