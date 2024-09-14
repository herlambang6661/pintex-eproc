<?php

namespace App\Http\Controllers;

use App\Exports\ExportExisting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Gudang\Penerimaanitm;
use App\Models\Gudang\Pengirimanitm;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Teknik\PengambilanItm;
use App\Models\Pengadaan\PembelianItm;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    public function CariBarangSearchEngine(Request $request)
    {
        if ($request->has('q')) {
            // Pencarian di tabel permintaanitm
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
            // kosongkan value
        }

        return response()->json($itm);
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

        // Ambil data dari database
        $getData = DB::table('permintaanitm')->where('kodeseri', $request->kodeseri)->first();
        $getPembelian = DB::table('pembelianitm as p')
            ->select('pem.tgl', 'p.nofaktur', 'p.kode', 'p.namabarang', 'p.kts', 'p.satuan', 'p.harga', 'p.jumlah', 'p.supplier', 'p.dibuat')
            ->join('pembelian as pem', 'p.nofaktur', '=', 'pem.nofkt')
            ->where('p.kode', $request->kodeseri)
            ->first();


        $getPengiriman = DB::table('pengirimanitm')->where('kodeseri', $request->kodeseri)->first();
        $getPenerimaan = DB::table('penerimaanitm')->where('kodeseri', $request->kodeseri)->first();
        $getPengambilan = DB::table('pengambilanitm')->where('kodeseri', $request->kodeseri)->first();

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

        // Render HTML}
        echo '
        <div class="card">
            <div class="card-body px-0 py-0">
                <ul class="steps steps-green steps-counter my-4">
                    <li data-bs-toggle="tooltip" title="Tanggal Pengajuan ' . Carbon::parse($getData->tgl)->format("d/m/Y") . '" class="step-item ' . $satu . '">Pengajuan ' . $getData->kodeseri . '</li>
                    <li data-bs-toggle="tooltip" title="Tanggal QTY ACC ' . Carbon::parse($getData->tgl_qty_acc)->format("d/m/Y") . '" class="step-item ' . $dua . '">Penentuan QTY ACC</li>
                    <li data-bs-toggle="tooltip" title="Tanggal ACC ' . Carbon::parse($getData->tgl_acc)->format("d/m/Y") . '" class="step-item ' . $tiga . ' ' . $hold . ' ' . $reject . '">ACC Pimpinan</li>
                    <li data-bs-toggle="tooltip" title="Tanggal ' . Carbon::parse($getData->tgl_pembelian)->format("d/m/Y") . '" class="step-item ' . $empat . '">Proses Pembelian</li>
                    <li class="step-item ' . $lima . '">Dibeli</li>
                    <li data-bs-toggle="tooltip" title="Tanggal Diterima ' . Carbon::parse($getData->tgl_terima)->format("d/m/Y") . '" class="step-item ' . $enam . ' ' . $package . ' ' . $retur . '">' . $txtenam . '</li>
                </ul>
            </div>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Detail
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
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
                    </div>
            <div class="card">
                <div class="card-header bg-info text-white">Permintaan</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tgl Pesan</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Katalog</th>
                                <th>Part</th>
                                <th>Mesin</th>
                                <th>Satuan</th>
                                <th>Qty Pesan</th>
                                <th>Qty ACC</th>
                                <th>Pemesan</th>
                                <th>Unit</th>
                                <th>Peruntukan</th>
                                <th>Dibeli</th>
                                <th>ACC</th>
                                <th>Pembeli</th>
                                <th>Status</th>
                                <th>Urgent</th>
                                <th>Tgl Acc</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td>' . Carbon::parse($getData->tgl)->format("d/m/Y") . '</td>
                                <td>' . $getData->kodeseri . '</td>
                                <td>' . $getData->namaBarang . '</td>
                                <td>' . $getData->keterangan . '</td>
                                <td>' . $getData->katalog . '</td>
                                <td>' . $getData->part . '</td>
                                <td>' . $getData->mesin . '</td>
                                <td>' . $getData->satuan . '</td>
                                <td>' . $getData->qty . '</td>
                                <td>' . $getData->qtyacc . '</td>
                                <td>' . $getData->pemesan . '</td>
                                <td>' . $getData->unit . '</td>
                                <td>' . $getData->peruntukan . '</td>
                                <td>' . $getData->dibeli . '</td>
                                <td>' . $getData->acc . '</td>
                                <td>' . $getData->pembeli . '</td>
                                <td>' . $getData->status . '</td>
                                <td>' . $getData->urgent . '</td>
                                <td>' . Carbon::parse($getData->tgl_acc)->format("d/m/Y") . '</td>
                                <td>' . $getData->dibuat . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';

        if (empty($getPembelian)) {
            echo '<div class="card">
                    <div class="card-header bg-success text-white">Pembelian</div>
                    <div class="card-body">
                        <div style="overflow-x: scroll;">
                            <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Faktur</th>
                                    <th>Kodeseri</th>
                                    <th>Nama</th>
                                    <th>KTS</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Suplier</th>
                                    <th>Jumlah</th>
                                    <th>Dibuat</th>
                                </tr>
                                <tr>
                                    <td colspan="13" class="text-center">Tidak ada data yang ditampilkan</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>';
        } else {
            // Tampilkan tabel pembelian jika datanya ada
            echo '<div class="card">
                    <div class="card-header bg-success text-white">Pembelian ' . number_format($getPembelian->harga, 0, ',', ',') . '</div>
                    <div class="card-body">
                        <div style="overflow-x: scroll;">
                            <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Faktur</th>
                                    <th>Kodeseri</th>
                                    <th>Nama</th>
                                    <th>KTS</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Suplier</th>
                                    <th>Jumlah</th>
                                    <th>Dibuat</th>
                                </tr>
                                <tr>
                                    <td>' . Carbon::parse($getPembelian->tgl)->format('d/m/Y') . '</td>
                                    <td>' . $getPembelian->nofaktur . '</td>
                                    <td>' . $getPembelian->kode . '</td>
                                    <td>' . $getPembelian->namabarang . '</td>
                                    <td>' . $getPembelian->kts . '</td>
                                    <td>' . $getPembelian->satuan . '</td>
                                    <td>' . number_format($getPembelian->harga, 0, ',', ',') . '</td>
                                    <td>' . $getPembelian->supplier . '</td>
                                    <td>' . $getPembelian->jumlah . '</td>
                                    <td>' . $getPembelian->dibuat . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>';
        }

        if (empty($getPengiriman)) {
            echo '<div class="card">
                <div class="card-header bg-warning text-white">Pengiriman</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Noform</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Katalog</th>
                                <th>Part</th>
                                <th>Mesin</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Pemesan</th>
                                <th>Supplier</th>
                                <th>Surat Jalan</th>
                                <th>Expedisin</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td colspan="14" class="text-center">Tidak ada data yang ditampilkan</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        } else {
            echo '<div class="card">
                <div class="card-header bg-warning text-white">Pengiriman</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Noform</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Katalog</th>
                                <th>Part</th>
                                <th>Mesin</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Pemesan</th>
                                <th>Supplier</th>
                                <th>Surat Jalan</th>
                                <th>Expedisin</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td>' . Carbon::parse($getPengiriman->tgl)->format('d/m/Y') . '</td>
                                <td>' . $getPengiriman->noformpengiriman_itm . '</td>
                                <td>' . $getPengiriman->kodeseri . '</td>
                                <td>' . $getPengiriman->namaBarang . '</td>
                                <td>' . $getPengiriman->katalog . '</td>
                                <td>' . $getPengiriman->part . '</td>
                                <td>' . $getPengiriman->mesin . '</td>
                                <td>' . $getPengiriman->qty . '</td>
                                <td>' . $getPengiriman->satuan . '</td>
                                <td>' . $getPengiriman->pemesan . '</td>
                                <td>' . $getPengiriman->supplier . '</td>
                                <td>' . $getPengiriman->suratjalan . '</td>
                                <td>' . $getPengiriman->expedisi . '</td>
                                <td>' . $getPengiriman->dibuat . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        }
        if (empty($getPenerimaan)) {
            echo '<div class="card">
                <div class="card-header bg-danger text-white">Penerimaan</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Katalog</th>
                                <th>Mesin</th>
                                <th>Kts</th>
                                <th>Satuan</th>
                                <th>Pemesan</th>
                                <th>Urgent</th>
                                <th>Dibeli</th>
                                <th>Locker</th>
                                <th>Partial</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td colspan="13" class="text-center">Tidak ada data yang ditampilkan</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        } else {
            echo '<div class="card">
                <div class="card-header bg-danger text-white">Penerimaan</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Katalog</th>
                                <th>Mesin</th>
                                <th>Kts</th>
                                <th>Satuan</th>
                                <th>Pemesan</th>
                                <th>Urgent</th>
                                <th>Dibeli</th>
                                <th>Locker</th>
                                <th>Partial</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td>' . Carbon::parse($getPenerimaan->tanggal)->format('d/m/Y') . '</td>
                                <td>' . $getPenerimaan->kodeseri . '</td>
                                <td>' . $getPenerimaan->nama . '</td>
                                <td>' . $getPenerimaan->katalog . '</td>
                                <td>' . $getPenerimaan->mesin . '</td>
                                <td>' . $getPenerimaan->kts . '</td>
                                <td>' . $getPenerimaan->satuan . '</td>
                                <td>' . $getPenerimaan->pemesan . '</td>
                                <td>' . $getPenerimaan->urgent . '</td>
                                <td>' . $getPenerimaan->dibeli . '</td>
                                <td>' . $getPenerimaan->locker . '</td>
                                <td>' . $getPenerimaan->partial . '</td>
                                <td>' . $getPenerimaan->dibuat . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        }
        if (empty($getPengambilan)) {
            echo '<div class="card">
                <div class="card-header bg-secondary text-white">Pengambilan</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Noform</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Mesin</th>
                                <th>Unit</th>
                                <th>Jumlah</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <th>Diambil</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td colspan="13" class="text-center">Tidak ada data yang ditampilkan</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        } else {
            echo '<div class="card">
                <div class="card-header bg-secondary text-white">Pengambilan</div>
                <div class="card-body">
                    <div style="overflow-x: scroll;">
                        <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                            <tr>
                                <th>Tanggal</th>
                                <th>Noform</th>
                                <th>Kodeseri</th>
                                <th>Nama</th>
                                <th>Mesin</th>
                                <th>Unit</th>
                                <th>Jumlah</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <th>Diambil</th>
                                <th>Dibuat</th>
                            </tr>
                            <tr>
                                <td>' . Carbon::parse($getPengambilan->tanggal)->format('d/m/Y') . '</td>
                                <td>' . $getPengambilan->noform . '</td>
                                <td>' . $getPengambilan->kodeseri . '</td>
                                <td>' . $getPengambilan->namaBarang . '</td>
                                <td>' . $getPengambilan->mesin . '</td>
                                <td>' . $getPengambilan->unit . '</td>
                                <td>' . $getPengambilan->jumlah . '</td>
                                <td>' . $getPengambilan->jam . '</td>
                                <td>' . $getPengambilan->keterangan . '</td>
                                <td>' . $getPengambilan->diambil . '</td>
                                <td>' . $getPengambilan->dibuat . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>';
        }

        echo '</div>';
    }

    public function landing()
    {
        return view('landing');
    }

    public function existingPermintaan()
    {
        return view('products/exist', [
            'active' => 'Dashboard',
            'judul' => 'Items Existing',
        ]);
    }


    public function exportExisting(Request $request)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        ini_set('memory_limit', '-1');
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return Excel::download(new ExportExisting(), 'Permintaan ' . now()->subMonths(24) . ' - ' . date('Y-m-d') . ' (' . $randomString . ').xlsx');
    }

    public function viewNotifPermintaan(Request $request)
    {
        $notif = DB::table('permintaanitm')->orderByDesc('id')->limit('15')->get();
        foreach ($notif as $ntf) {
            echo '
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-auto" title="' . $ntf->dibuat . '" data-bs-toggle="tooltip"
                        data-bs-placement="left">
                        <span class="logo avatar-sm rounded">
                            <img class="rounded-circle" src="assets/static/temp/' . $ntf->dibuat . '.png" class="rounded" alt="...">
                        </span>
                    </div>
                    <div class="col text-truncate">
                        <a href="#" class="text-body d-block text-truncate mt-n1">
                            (' . $ntf->kodeseri . ')
                            ' . $ntf->namaBarang . ' ' . $ntf->keterangan . ' ' . $ntf->katalog . ' ' . $ntf->part . '
                        </a>
                        <div class="d-block text-muted text-truncate mt-n1">
                            ' . $ntf->qty . ' ' . $ntf->satuan . '
                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-due">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            </svg>
                            ' . Carbon::parse($ntf->created_at)->diffForHumans() . '
                        </div>
                    </div>
                    <div class="col-auto">';
            if ($ntf->urgent == 1) {
                echo '
                            <a href="#" class="list-group-item-actions show"
                                title="Urgent" data-bs-toggle="tooltip"
                                data-bs-placement="right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tada icon-tabler icons-tabler-outline icon-tabler-bell">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                </svg>
                            </a>';
            }
            echo '
                    </div>
                </div>
            </div>';
        }
    }
}
