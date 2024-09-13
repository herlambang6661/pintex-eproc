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
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
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
            if ($request->selected == "PERMINTAAN") {
                if ($request->tipe == 'qtyacc') {
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
                    $status = "PROSES PERSETUJUAN";
                } elseif ($request->tipe == 'persetujuan') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
                    $status = "MENUNGGU ACC";
                } elseif ($request->tipe == 'reject') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
                    $status = "REJECT";
                } elseif ($request->tipe == 'hold') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
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
            } elseif ($request->selected == "SERVIS") {
                if ($request->tipe == 'qtyacc') {
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
                    $status = "PROSES PERSETUJUAN";
                } elseif ($request->tipe == 'persetujuan') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
                    $status = "MENUNGGU ACC";
                } elseif ($request->tipe == 'reject') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
                    $status = "REJECT";
                } elseif ($request->tipe == 'hold') {
                    $dari = date('2021-m-d');
                    $sampai = date('Y-m-d');
                    $status = "HOLD";
                }

                $data = DB::table('servisitm AS pe')
                    ->whereBetween('pe.tgl_servis', [$dari, $sampai])
                    ->where('pe.status', 'like', $status)
                    ->orderBy('pe.kodeseri_servis', 'desc')
                    ->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tgl', function ($row) {
                        $m = Carbon::parse($row->tgl_servis)->format('d/m/Y');
                        return $m;
                    })
                    ->addColumn('kodeseri', function ($row) {
                        $kodeseri = $row->kodeseri_servis;
                        return $kodeseri;
                    })
                    ->addColumn('noform', function ($row) {
                        $noform = $row->noformservis;
                        return $noform;
                    })
                    ->addColumn('mesin', function ($row) {
                        $getMesin = DB::table('mastermesinitm AS mi')->select(
                            'me.mesin',
                            'mi.merk'
                        )->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $row->mesin)->first();
                        $m = $getMesin->mesin . ' ' . $getMesin->merk;
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
        }

        return view('products.02_pengadaan.persetujuan');
    }

    public function getACCUrgent(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('permintaanitm AS pe')
                ->where('pe.bypass', '=', 1)
                ->orderBy('pe.kodeseri', 'asc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return $m;
                })
                ->addColumn('action', function ($row) {
                    $m = '
                    <div class="btn-list flex-nowrap">
                        <form method="POST" action="printPermintaan" target="_blank">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="noform" value="' . $row->kodeform . '">
                            <button type="submit" class="btn btn-sm btn-link btn-icon">
                                <i class="fa-solid fa-print" style="margin-right:5px;"></i>
                            </button>
                        </form>
                    </div>
                    ';
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
                ->rawColumns(['select_orders', 'status', 'tgl'])
                ->make(true);
        }
        return view('products.02_pengadaan.persetujuan');
    }

    public function checkAccQty(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $permintaanController = new PermintaanController();
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
                if (substr($request->id[$i], 0, 1) == "S") {
                    $data = DB::table('servisitm')
                        ->select('entitas', 'id', 'kodeseri_servis as kodeseri', 'namaBarang', 'qty', 'satuan', 'keterangan', 'katalog', 'serialnumber as part', 'pemesan', 'urgent', 'mesin')
                        ->where('kodeseri_servis', $request->id[$i])
                        ->get();
                    $tipe = "servis";
                } else {
                    $data = DB::table('permintaanitm')->where('kodeseri', $request->id[$i])->get();
                    $tipe = "permintaan";
                }
                foreach ($data as $u) {
                    echo  '<input type="hidden" name="idpermintaan[]" value="' . $u->id . '" >';
                    echo  '<input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '" >';
                    if ($u->entitas == 'TFI') {
                        $bg_entitas = 'bg-orange-lt';
                    } else {
                        $bg_entitas = 'bg-cyan-lt';
                    }
                    if ($u->urgent == 1) {
                        $urgent = 'border-cyan bg-cyan-lt';
                        $ribbon = '
                            <div class="ribbon ribbon-bottom ribbon-start bg-red">
                                <svg style="margin-right:5px" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tada icon-tabler icons-tabler-outline icon-tabler-bell-ringing"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /><path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" /><path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" /></svg>
                                Urgent
                            </div>
                        ';
                    } else {
                        $urgent = 'border-green';
                        $ribbon = '';
                    }
                    if ($tipe == "servis") {
                        $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $u->mesin)->first();
                        $mesin = $getMesin->mesin . " " . $getMesin->merk;
                    } else {
                        $mesin = $permintaanController->getMesinPermintaan($u->mesin);
                    }
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
                        <div class="card cards ' . $bg_entitas . ' shadow ' . $urgent . ' table-hover" id="kartu-' . $u->id . '">
                            ' . $ribbon . '
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
                                                        ' . $u->katalog . '
                                                    </div>
                                                    <div class="list-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                                        ' . $u->part . '
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="mt-3 badges">
                                                    <i class="text-green">Estimasi Harga : <input name="estimasiHarga[]" type="number" style="width: 100px"></i>
                                                </div>
                                            </div>
                                        </div>';
                    if (substr($request->id[$i], 0, 1) == "S") {
                        echo '
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div class="mt-3 badges">
                                                    <i class="text-green">Supplier : <input name="supplier[]" type="text" style="width: 120px"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="mt-3 badges">
                                                    <i class="text-green">Ekspedisi : <input name="ekspedisi[]" type="text" style="width: 100px"></i>
                                                </div>
                                            </div>
                                        </div>';
                    }

                    echo '
                                    </div>
                                </div>
                                <div class="card-body bg-light pt-0 ps-0 pe-0 pb-0">
                                    <table class="table table-sm table-card table-bordered text-center text-blue text-nowrap">
                                        <tr style="font-size:12px">
                                            <td style="width: 20%">' . $u->kodeseri . '</td>
                                            <td style="width: 20%">Entitas: ' . strtoupper($u->entitas) . '</td>
                                            <td style="width: 20%">Pemesan: ' . $u->pemesan . '</td>
                                            <td style="width: 20%">' . (empty($u->unit) ? "" : strtoupper($u->unit)) . '</td>
                                            <td style="width: 20%">Mesin: ' . $mesin . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="form-check form-switch py-2 ">
                                                            <input type="hidden" id="vbypass-' . $u->id . '" name="bypass[]">
                                                            <input class="form-check-input" type="checkbox" id="bypass-' . $u->id . '" onclick="bypass(' . $u->id . ')">
                                                            <label class="form-check-label text-danger" for="bypass-' . $u->id . '">Bypass ACC</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <select name="stBypass" id="stBypass-' . $u->id . '" class="form-select disabled bg-secondary-lt cursor-not-allowed visually-hidden">
                                                            <option value="ACC">ACC</option>
                                                            <option value="HOLD">HOLD</option>
                                                            <option value="REJECT">REJECT</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control disabled bg-secondary-lt cursor-not-allowed visually-hidden" type="input" id="ketBypass-' . $u->id . '" placeholder="Alasan Bypass" name="ketBypass[]">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <script>
                                        function bypass(param) {
                                            if (document.getElementById("bypass-"+param).checked) {
                                                document.getElementById("vbypass-"+param).value = 1;
                                                $("#stBypass-"+param).removeClass("disabled bg-secondary-lt cursor-not-allowed visually-hidden")
                                                $("#ketBypass-"+param).removeClass("disabled bg-secondary-lt cursor-not-allowed visually-hidden")
                                                $("#stBypass-"+param).prop("disabled", false);
                                                $("#ketBypass-"+param).prop("disabled", false);
                                                console.log("turn on bypass acc "+param);

                                            } else {
                                                document.getElementById("vbypass-"+param).value = 0;
                                                $("#stBypass-"+param).addClass("disabled bg-secondary-lt cursor-not-allowed visually-hidden")
                                                $("#ketBypass-"+param).addClass("disabled bg-secondary-lt cursor-not-allowed visually-hidden")
                                                $("#stBypass-"+param).prop("disabled", true);
                                                $("#ketBypass-"+param).prop("disabled", true);
                                                console.log("turn off bypass acc "+param);
                                            }
                                        }
                                    </script>
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

    public function checkAccept(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $permintaanController = new PermintaanController();
            $jml = count($request->id);
            echo '
                    <div class="space-y">
                    ';
            echo '
                    <script>
                        function getDetails(id, kodeseri, nama) {
                            $.ajax({
                                type: "POST",
                                url: "' . route("persetujuan/cariDetail") . '",
                                data: {
                                    "_token": "' . $request->_token . '",
                                    keyword: kodeseri,
                                },
                                beforeSend: function() {
                                    $(".open-"+id).hide();
                                    $(".close-"+id).show();

                                    $("#tunggu-"+id).show();
                                    $("#hasilcari-"+id).hide();
                                    $("#tunggu-"+id).html(
                                        `<center><p style="color:black"><strong><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mohon Menunggu, Sedang mencari Detail Pembelian `+nama+`<span class="animated-dots"></span></strong></p></center>`
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
                if (substr($request->id[$i], 0, 1) == "S") {
                    $data = DB::table('servisitm')
                        ->select('id', 'kodeseri_servis as kodeseri', 'qtykirim as qtyacc', 'namaBarang', 'qty', 'satuan', 'keterangan', 'katalog', 'serialnumber as part', 'pemesan', 'urgent', 'mesin')
                        ->where('kodeseri_servis', $request->id[$i])
                        ->get();
                    $tipe = "servis";
                } else {
                    $data = DB::table('permintaanitm')->where('kodeseri', $request->id[$i])->get();
                    $tipe = "permintaan";
                }
                foreach ($data as $u) {
                    if ($u->entitas == 'TFI') {
                        $bg_entitas = 'bg-orange-lt';
                    } else {
                        $bg_entitas = 'bg-cyan-lt';
                    }
                    if ($tipe == "servis") {
                        $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $u->mesin)->first();
                        $mesin = $getMesin->mesin . " " . $getMesin->merk;
                    } else {
                        $mesin = $permintaanController->getMesinPermintaan($u->mesin);
                    }
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
                        <div class="card cards shadow ' . $bg_entitas . ' border-green table-hover" id="kartu-' . $u->id . '">
                            <div class="row g-0">
                                <div class="col-auto">
                                    <div class="card-body">
                                        <div class="avatar avatar-md shadow cursor-pointer bg-green-lt open-' . $u->id . '" onclick="getDetails(`' . $u->id . '`, `' . $u->kodeseri . '`, `' . $u->namaBarang . '`)">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
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
                                                <h3 class="mb-0">' . strtoupper($u->namaBarang) . '</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 class="mb-0">Qty : ' . $u->qtyacc . ' ' . $u->satuan . '</h3>
                                            </div>
                                            <div class="col-auto font-italic text-green">
                                                Status ACC : 
                                                <select name="statusAcc[]" id="statusAcc">
                                                    <option value="ACC">ACC</option>
                                                    <option value="HOLD">HOLD</option>
                                                    <option value="REJECT">REJECT</option>
                                                </select>
                                            </div>
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
                                                    <i class="text-green">Ket. Acc. : <input name="ketAcc[]" type="text" style="width: 150px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 ps-0 pe-0 pb-0">
                                    <table class="table table-sm table-card text-blue">
                                        <tr class="text-center">
                                            <td>Pemesan: ' . $u->pemesan . '</td>
                                            <td>' . (!empty($u->unit) ? $u->unit : '') . '</td>
                                            <td>Mesin: ' . $mesin . '</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div id="hasilcari-' . $u->id . '" style="display:none"></div>
                                                <div id="tunggu-' . $u->id . '" style="display:none"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        ';

                    echo '';
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
                echo '
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
                </div>';
            }
        }
    }

    public function cariDetailbarang(Request $request)
    {
        if (!empty($request->keyword)) {
            $cari = trim(strip_tags($request->keyword));
            if ($cari == '') {
            } else {
                if ($request->tipe == 'penerimaan') {
                    $dataBarang = DB::table('barang')->where('kodeseri', '=', $cari)->first();
                    echo '
                    <div class="table-responsive">
                        <table class="table table-sm table-vcenter card-table table-hover">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td class="text-secondary"> : ' . /* Carbon::parse($dataPermintaan->tgl)->format('d/m/Y') */ '' . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Barang</td>
                                    <td class="text-secondary fw-bolder"> : ' . (empty($dataBarang->namaBarang) ? " --- " : $dataBarang->namaBarang) . '</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td class="text-blue"> : ' . (empty($dataBarang->keterangan) ? " --- " : $dataBarang->keterangan) . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Katalog</td>
                                    <td class="text-secondary"> : ' . (empty($dataBarang->katalog) ? " --- " : $dataBarang->katalog) . '</td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td class="text-secondary"> : ' . (empty($dataBarang->part) ? " --- " : $dataBarang->part) . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Qty Permintaan</td>
                                    <td class="text-secondary"> : ' . $dataBarang->qty_permintaan . ' ' . $dataBarang->satuan . '</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                } else {
                    $dataPermintaan = DB::table('permintaanitm')->where('kodeseri', '=', $cari)->first();
                    echo '
                    <div class="table-responsive">
                        <table class="table table-sm table-vcenter card-table table-hover">
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td class="text-secondary"> : ' . Carbon::parse($dataPermintaan->tgl)->format('d/m/Y') . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Kodeseri</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->kodeseri . '</td>
                                </tr>
                                <tr>
                                    <td>Barang</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->namaBarang . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Deskripsi</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->keterangan . '</td>
                                </tr>
                                <tr>
                                    <td>Merk</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->part . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Qty Permintaan</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->qty . ' ' . $dataPermintaan->satuan . '</td>
                                </tr>
                                <tr>
                                    <td>Estimasi Harga</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->estimasiharga . '</td>
                                    <td class="text-secondary"></td>
                                    <td>Peruntukan</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->peruntukan . '</td>
                                </tr>
                                <tr>
                                    <td>Dibeli</td>
                                    <td class="text-secondary"> : ' . $dataPermintaan->dibeli . '</td>
                                    <td class="text-secondary"></td>
                                    <td></td>
                                    <td class="text-secondary"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>';
                }
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
            if (substr($request->kodeseri[$i], 0, 1) == "S") {
                if ($request->bypass[$i] == 1) {
                    $check = DB::table('servisitm')
                        ->where('kodeseri_servis', $request->kodeseri[$i])
                        ->limit(1)
                        ->update(
                            array(
                                // 'tgl_qty_acc' => date('Y-m-d'),
                                // 'pembeli' => $request->pembeli,
                                'expedisi' => $request->ekspedisi[$i],
                                'supplier' => $request->supplier[$i],
                                'status' => 'ACC',
                                'bypass' => $request->bypass[$i],
                                'ketBypass' => $request->ketBypass[$i],
                                'remember_token' => $request->_token,
                                'updated_at' => date('Y-m-d H:i:s'),
                            )
                        );
                } else {
                    $check = DB::table('servisitm')
                        ->where('kodeseri_servis', $request->kodeseri[$i])
                        ->limit(1)
                        ->update(
                            array(
                                // 'tgl_qty_acc' => date('Y-m-d'),
                                // 'pembeli' => $request->pembeli,
                                'expedisi' => $request->ekspedisi[$i],
                                'supplier' => $request->supplier[$i],
                                'status' => 'MENUNGGU ACC',
                                'remember_token' => $request->_token,
                                'updated_at' => date('Y-m-d H:i:s'),
                            )
                        );
                }
            } else {
                if ($request->bypass[$i] == 1) {
                    $check = DB::table('permintaanitm')
                        ->where('kodeseri', $request->kodeseri[$i])
                        ->limit(1)
                        ->update(
                            array(
                                'tgl_qty_acc' => date('Y-m-d'),
                                'pembeli' => $request->pembeli,
                                'qtyacc' => $request->qtyAcc[$i],
                                'estimasiharga' => $request->estimasiHarga[$i],
                                'status' => 'ACC',
                                'bypass' => $request->bypass[$i],
                                'ketBypass' => $request->ketBypass[$i],
                                'remember_token' => $request->_token,
                                'updated_at' => date('Y-m-d H:i:s'),
                            )
                        );
                } else {
                    $check = DB::table('permintaanitm')
                        ->where('kodeseri', $request->kodeseri[$i])
                        ->limit(1)
                        ->update(
                            array(
                                'tgl_qty_acc' => date('Y-m-d'),
                                'pembeli' => $request->pembeli,
                                'qtyacc' => $request->qtyAcc[$i],
                                'estimasiharga' => $request->estimasiHarga[$i],
                                'status' => 'MENUNGGU ACC',
                                'remember_token' => $request->_token,
                                'updated_at' => date('Y-m-d H:i:s'),
                            )
                        );
                }
            }
        }
        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data telah berhasil diproses', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function storeAccPermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
            ],
        );
        $jml = count($request->kodeseri);

        for ($i = 0; $i < $jml; $i++) {
            if ($request->statusAcc[$i] == 'ACC') {
                $status = 'PROSES PEMBELIAN';
            } else {
                $status = $request->statusAcc[$i];
            }
            $check = DB::table('permintaanitm')
                ->where('id', $request->idpermintaan[$i])
                ->limit(1)
                ->update(
                    array(
                        'status' => $status,
                        'statusACC' => $request->statusAcc[$i],
                        'keteranganACC' => $request->ketAcc[$i],
                        'acc' => Auth::user()->name,
                        'tgl_acc' => date('Y-m-d'),
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
