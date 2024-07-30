<?php

namespace App\Http\Controllers\_02Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\_02Pengadaan\PermintaanController;

class PersetujuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function persetujuan()
    {
        return view(
            'products.02_pengadaan.persetujuan',
            [
                'active' => 'Persetujuan',
                'judul' => 'Persetujuan',
            ]
        );
    }

    public function getACCPermintaan(Request $request)
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
                $sampai = date('Y-m-28');
            }

            if ($request->tipe == 'qtyacc') {
                $status = "PROSES PERSETUJUAN";
            } elseif ($request->tipe == 'persetujuan') {
                $status = "MENUNGGU ACC";
            } elseif ($request->tipe == 'reject') {
                $status = "REJECT";
            } elseif ($request->tipe == 'hold') {
                $status = "HOLD";
            }

            $data = DB::table('permintaanitm AS pe')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                ->where('pe.status', 'like', $status)
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
                ->addColumn('mesin', function ($row) {
                    $permintaanController = new PermintaanController();
                    $m = $permintaanController->getMesinPermintaan($row->mesin);
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
                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['select_orders', 'status', 'tgl'])
                ->make(true);
        }

        return view('products.02_pengadaan.persetujuan');
    }

    public function checkAccQty(Request $request)
    {
        $permintaanController = new PermintaanController();
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $jml = count($request->id);
            $dataPembeli = DB::table('person')->where('pembelian', '=', 1)->get();
            // $dataEstimasi = DB::table('barang')->where('', '=', '')->first();
            echo '<datalist id="pembeli">';
            foreach ($dataPembeli as $p) {
                echo '<option value="' . strtoupper($p->nama) . '">' . strtoupper($p->nama) . '</option>';
            }
            echo '</datalist>';
            echo '
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                                <label class="form-label">Tanggal</label>
                                <input name="tgl" type="date" class="form-control bg-secondary-lt cursor-not-allowed" readonly value="' . date("Y-m-d") . '">
                        </div>
                        <div class="col-lg-9 col-md-12">
                                <label class="form-label">Pembeli</label>
                                <input name="pembeli" list="pembeli" type="text" class="form-control" value="ANDRI">
                        </div>
                    </div>
                    <hr>
                    <div class="space-y">
                    ';
            echo '
                    <script>
                        function getDetails(id, kodeseri, nama) {
                            $.ajax({
                                type: "POST",
                                url: "' . route("persetujuan/carihistory") . '",
                                data: {
                                    "_token": "' . $request->_token . '",
                                    keyword: nama,
                                },
                                beforeSend: function() {
                                    $(".open-"+id).hide();
                                    $(".close-"+id).show();

                                    $("#tunggu-"+id).show();
                                    $("#hasilcari-"+id).hide();
                                    $("#tunggu-"+id).html(
                                        `<center><p style="color:black"><strong><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mohon Menunggu, Sedang mencari riwayat Pembelian `+nama+`<span class="animated-dots"></span></strong></p></center>`
                                    );
                                },
                                success: function(html) {
                                    $("#overlay2").fadeOut(300);
                                    $("#tunggu-"+id).html("");
                                    $("#hasilcari-"+id).show();
                                    $("#hasilcari-"+id).html(html);
                                }
                            });
                        }
                        function closeDetails(id) {
                            $("#hasilcari-"+id).hide();
                            $(".open-"+id).show();
                            $(".close-"+id).hide();
                        }
                    </script>
                ';
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('permintaanitm')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    echo  '<input type="hidden" name="idpermintaan[]" value="' . $u->id . '" >';
                    echo  '<input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '" >';
                    echo '
                        <style>
                                .cards{
                                    transition: all 0.2s ease;
                                }
                                .cards:hover{
                                    box-shadow: 5px 6px 6px 2px #e9ecef;
                                    background-color: #e9ecef;
                                    transform: scale(1.01);
                                }
                        </style>
                        <div class="card cards shadow border-green table-hover" id="kartu-' . $u->id . '">
                            <div class="row g-0">
                                <div class="col-auto">
                                    <div class="card-body">
                                        <div class="avatar avatar-md shadow cursor-pointer bg-yellow-lt open-' . $u->id . '" onclick="getDetails(`' . $u->id . '`, `' . $u->kodeseri . '`, `' . $u->namaBarang . '`)">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-history"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8l0 4l2 2" /><path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" /></svg>
                                        </div>
                                        <div class="avatar avatar-md shadow cursor-pointer bg-red-lt close-' . $u->id . '" onclick="closeDetails(`' . $u->id . '`)" style="display:none">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body ps-0">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-0">' . $u->namaBarang . '</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 class="mb-0">Qty : ' . $u->qty . ' ' . $u->satuan . '</h3>
                                            </div>
                                            <div class="col-auto font-italic text-green">Qty ACC : <input name="qtyAcc[]" type="number" min="1" style="width: 100px" id="" value="' . $u->qty . '"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                    <div class="list-inline-item cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="Deskripsi Barang : ' . $u->keterangan . '">
                                                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                                        ' . $u->keterangan . '
                                                    </div>
                                                    <div class="list-inline-item cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="Katalog Barang : ' . $u->katalog . '">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                                        ' . $u->katalog . '
                                                    </div>
                                                    <div class="list-inline-item cursor-pointer"  data-bs-toggle="tooltip" data-bs-placement="top" title="Part Barang : ' . $u->part . '">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" /></svg>
                                                        ' . $u->part . '
                                                    </div>
                                                    </div>
                                                    <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                                    <div class="list-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                                        ' . $u->keterangan . '
                                                    </div>
                                                    <div class="list-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                                        ' . $u->keterangan . '
                                                    </div>
                                                    <div class="list-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                                        ' . $u->keterangan . '
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="mt-3 badges">
                                                    <i class="text-green">Estimasi Harga : <input name="estimasiHarga[]" type="number" style="width: 100px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 ps-0 pe-0 pb-0">
                                    <table class="table table-sm table-card text-center text-blue">
                                        <tr>
                                            <td>Pemesan: ' . $u->pemesan . '</td>
                                            <td>' . $u->unit . '</td>
                                            <td>Mesin: ' . $permintaanController->getMesinPermintaan($u->mesin) . '</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        ';

                    echo '
                    <div id="hasilcari-' . $u->id . '" style="display:none"></div>
                    <div id="tunggu-' . $u->id . '" style="display:none"></div>';
                }
            }
            echo '      </div>';
        }
    }

    public function cariRiwayat(Request $request)
    {
        if (!empty($request->keyword)) {
            $cari = trim(strip_tags($request->keyword));
            if ($cari == '') {
            } else {
                // $dataPem = $this->permintaan->getDetailBarangPembelian($cari);
                // $dataQty = $this->permintaan->getDetailBarangQtyGudang($cari);
?>
                <div class="row" style="color:black">
                    <div class="col-lg-6">
                        <label style="color:black;">Riwayat Pembelian <strong><?= $cari ?></strong></label>
                        <div class="card-body" style="overflow-y: scroll; height: 150px">
                            <table border="1" class="text-nowrap" style="width:100%;color:black;text-transform:uppercase;text-align: center;font-size: 12px">
                                <thead class="bg-dark text-white" style="font-size:12px;">
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Kodeseri</td>
                                        <td>Barang</td>
                                        <td>Deskripsi</td>
                                        <td>Merk</td>
                                        <td>Qty</td>
                                        <td>Harga Satuan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label style="color:black;">Detail Qty <strong><?= $cari ?></strong> di Gudang</label>
                        <div class="card-body" style="overflow-y: scroll; height: 150px">
                            <table border="1" class="text-nowrap" style="width:100%;color:black;text-transform:uppercase;text-align: center;font-size: 12px">
                                <thead class="bg-dark text-white" style="font-size:12px;">
                                    <tr>
                                        <td>Kodeseri</td>
                                        <td>Barang</td>
                                        <td>Deskripsi</td>
                                        <td>Merk</td>
                                        <td>Qty Terima</td>
                                        <td>Qty Diambil</td>
                                        <td>Sisa</td>
                                        <td>Satuan</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }

    public function storeQtyPermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'pembeli' => 'required',
            ],
        );
        $jml = count($request->kodeseri);

        for ($i = 0; $i < $jml; $i++) {
            $check = DB::table('permintaanitm')
                ->where('id', $request->idpermintaan[$i])
                ->limit(1)
                ->update(
                    array(
                        'pembeli' => $request->pembeli,
                        'qtyacc' => $request->qtyAcc[$i],
                        'estimasiharga' => $request->estimasiHarga[$i],
                        'status' => 'MENUNGGU ACC',
                        'remember_token' => $request->_token,
                        'updated_at' => date('Y-m-d H:i:s'),
                    )
                );
        }
        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data telah berhasil diproses', 'status' => true);
        }
        return Response()->json($arr);
    }
}
