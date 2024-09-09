<?php

namespace App\Http\Controllers\_03Gudang;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PengirimanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function pengiriman()
    {
        return view('products.03_gudang.pengiriman', [
            'active' => 'Pengiriman',
            'judul' => 'Pengiriman'
        ]);
    }

    public function getDataPengiriman(Request $request)
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

            $data1 = DB::table('servisitm AS pi')
                ->select('id', 'tgl_servis as tgl', 'kodeseri_servis as kodeseri', 'namaBarang', 'keterangan', 'serialnumber as part', 'mesin', 'qty', 'satuan', 'pemesan', 'status', 'urgent')
                ->whereBetween('pi.tgl_servis', [$dari, $sampai])
                ->where('pi.status', '=', 'ACC')
                ->orderBy('pi.kodeseri_servis', 'desc')
                ->get();
            $data2 = DB::table('permintaanitm AS pa')
                ->select('id', 'tgl', 'kodeseri', 'namaBarang', 'keterangan', 'part', 'mesin', 'qty', 'satuan', 'pemesan', 'status', 'urgent')
                ->whereBetween('pa.tgl', [$dari, $sampai])
                ->where('pa.status', '=', 'RETUR')
                ->orderBy('pa.kodeseri', 'desc')
                ->get();

            $data = $data1->merge($data2);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return $m;
                })
                ->addColumn('mesin', function ($row) {
                    $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $row->mesin)->first();
                    $mesin = $getMesin->mesin . " " . $getMesin->merk;
                    return $mesin;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 'PROSES PERSETUJUAN') {
                        $c = '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span> <b class="text-blue">' . $row->status . '</b>';
                    } elseif ($row->status == 'ACC') {
                        $c = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span> <b class="text-purple">SERVIS</b>';
                    } elseif ($row->status == 'HOLD') {
                        $c = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span> <b class="text-orange">' . $row->status . '</b>';
                    } elseif ($row->status == 'REJECT') {
                        $c = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span> <b class="text-red">' . $row->status . '</b>';
                    } elseif ($row->status == 'PROSES SERVIS') {
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
                ->editColumn('select_orders', function ($row) {
                    if ($row->urgent == 1) {
                        $opsi = '
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Urgent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing-filled icon-tada text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17.451 2.344a1 1 0 0 1 1.41 -.099a12.05 12.05 0 0 1 3.048 4.064a1 1 0 1 1 -1.818 .836a10.05 10.05 0 0 0 -2.54 -3.39a1 1 0 0 1 -.1 -1.41z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M5.136 2.245a1 1 0 0 1 1.312 1.51a10.05 10.05 0 0 0 -2.54 3.39a1 1 0 1 1 -1.817 -.835a12.05 12.05 0 0 1 3.045 -4.065z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </div>
                        ';
                    } else {
                        $opsi = '';
                    }
                    return $opsi;
                })
                ->rawColumns(['select_orders', 'status', 'tgl'])
                ->make(true);
        }
        return view('products.02_pengadaan.persetujuan');
    }

    public function checkPengiriman(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $jml = count($request->id);
            echo '
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-body bg-info-lt">
                                    <label class="form-label">Tanggal Pengiriman</label>
                                    <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                                    <label class="form-label mt-2">Surat Jalan</label>
                                    <input name="suratjalan" type="text" class="form-control mb-2" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-body bg-danger-lt">
                                    <label class="form-label">Catatan</label>
                                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Masukkan Catatan Tambahan..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            
                        </div>
                    </div>
                    <div class="space-y">
                        <label class="fw-bold mt-2 mb-0">
                            Total Pengiriman Barang : ' . $jml . '
                        </label> 
                        <table class="table table-sm table-bordered table-hover text-uppercase">
                            <tr class="bg-info-lt">
                                <td class="text-center fw-bold">Kodeseri</td>
                                <td class="text-center fw-bold">Nama</td>
                                <td class="text-center fw-bold">Qty</td>
                                <td class="text-center fw-bold">Supplier</td>
                                <td class="text-center fw-bold">Expedisi</td>
                            </tr>
                    ';
            $z = 1;
            for ($i = 0; $i < $jml; $i++) {
                if (substr($request->id[$i], 0, 1) == "S") {
                    $data = DB::table('servisitm')
                        ->select('id', 'kodeseri_servis as kodeseri', 'namaBarang', 'keterangan', 'qty', 'satuan', 'supplier', 'status')
                        ->where('kodeseri_servis', $request->id[$i])
                        ->get();
                } else {
                    $data = DB::table('permintaanitm')->where('kodeseri', $request->id[$i])->get();
                }

                foreach ($data as $u) {
                    echo  '<input type="hidden" name="id[]" value="' . $u->id . '" >';
                    echo  '<input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '">';
                    echo  '<input type="hidden" name="partial[]" id="partial-' . $u->id . '" value="0">';
                    echo '
                            <tr>
                                <td class="text-center fw-bold">' . $u->kodeseri . '</td>
                                <td>' . $u->namaBarang . ' ' . $u->keterangan . '</td>
                                <td class="text-center">' . $u->qty . ' ' . $u->satuan . '</td>
                                <td><input type="text" class="form-control form-control-sm" name="supplier[]" value="' . (!empty($u->supplier) ? $u->supplier : "") . '"></td>
                                <td><input type="text" class="form-control form-control-sm" name="expedisi[]" value="ANDRI"></td>
                            </tr>
                    ';
                }
            }
            echo '  
                        </table>    
                    </div>';
        }
    }

    public function storePengirimanBarang(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
            ],
        );
        // Get NPB
        $latestKodeseri = DB::table('pengiriman')->latest('noformpengiriman')->first();
        if ($latestKodeseri) {
            $y = substr($latestKodeseri->noformpengiriman, 3, 2);
            $m = substr($latestKodeseri->noformpengiriman, 6, 2);
            $d = substr($latestKodeseri->noformpengiriman, 8, 2);
            if (date('ymd') == $y . $m . $d) {
                $noUrut = (int) substr($latestKodeseri->noformpengiriman, -4);
                $noUrut++;
                $char = date('y-md');
                $NPB = "PG-" . $char . sprintf("%04s", $noUrut);
            } else {
                $NPB = "PG-" . date('y') . "-" . date('md') . "0001";
            }
        } else {
            $NPB = "PG-" . date('y') . "-" . date('md') . "0001";
        }
        // input Penerimaan
        $penerimaan = DB::table('pengiriman')->insert([
            'tglpengiriman' => $request->tgl,
            'noformpengiriman' => $NPB,
            'keterangan' => $request->keterangan,
            'dibuat' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $jml = count($request->kodeseri);
        for ($i = 0; $i < $jml; $i++) {
            if (substr($request->kodeseri[$i], 0, 1) == "S") {
                // ambil data permintaan barang untuk deskripsi, katalog dan lain-lain
                $getbarang = DB::table('servisitm')->where('kodeseri_servis', '=', $request->kodeseri[$i])->first();
                // Update Barang
                $check = DB::table('servisitm')
                    ->where('kodeseri_servis', $request->kodeseri[$i])
                    ->limit(1)
                    ->update(
                        array(
                            'tgl_pengiriman' => $request->tgl,
                            'suratjalan' => $request->suratjalan,
                            'expedisi' => $request->expedisi[$i],
                            'supplier' => $request->supplier[$i],
                            'status' => 'PROSES SERVIS',
                            'updated_at' => date('Y-m-d H:i:s'),
                        )
                    );
            } else {
                // // ambil data permintaan barang untuk deskripsi, katalog dan lain-lain
                // $getbarang = DB::table('permintaanitm')->where('kodeseri', '=', $request->kodeseri[$i])->first();
                // // Update Barang
                // $check = DB::table('barang')
                //     ->where('kodeseri', $request->kodeseri[$i])
                //     ->limit(1)
                //     ->update(
                //         array(
                //             'tgl_penerimaan' => $request->tgl,
                //             'npb' => $NPB,
                //             'status' => 'DITERIMA',
                //             'updated_at' => date('Y-m-d H:i:s'),
                //         )
                //     );
            }
            // input Penerimaan Item
            DB::table('pengirimanitm')->insert([
                'tgl' => $request->tgl,
                'noformpengiriman_itm' => $NPB,
                'kodeseri' => $request->kodeseri[$i],
                "namaBarang" => $getbarang->namaBarang,
                'katalog' => $getbarang->katalog,
                'part' => $getbarang->part,
                'mesin' => $getbarang->mesin,
                'qty' => $getbarang->qty,
                'satuan' => $getbarang->satuan,
                'pemesan' => $getbarang->pemesan,
                'expedisi' => $request->expedisi[$i],
                'supplier' => $request->supplier[$i],
                'urgent' => $getbarang->urgent,
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($penerimaan) {
            $arr = array('msg' => 'Data telah berhasil diproses', 'status' => true);
        }
        return Response()->json($arr);
    }
}
