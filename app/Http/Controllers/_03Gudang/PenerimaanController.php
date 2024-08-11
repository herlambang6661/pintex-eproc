<?php

namespace App\Http\Controllers\_03Gudang;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\_02Pengadaan\PermintaanController;

class PenerimaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function penerimaan()
    {
        return view('products.03_gudang.penerimaan', [
            'active' => 'Penerimaan',
            'judul' => 'Penerimaan'
        ]);
    }

    public function checkPenerimaan(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $permintaanController = new PermintaanController();
            $jml = count($request->id);
            echo '
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                                <label class="form-label">Tanggal Penerimaan</label>
                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                        </div>
                        <div class="col-lg-8 col-md-12">
                                <label class="form-label">Penerimaan</label>
                                <input name="penerima" type="text" class="form-control" value="FAHMI FAHRURROZI">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Catatan</label>
                            <textarea name="keterangan" id="keterangan" rows="1" class="form-control" placeholder="Masukkan Catatan Tambahan..."></textarea>
                        </div>
                    </div>
                    <div class="space-y">
                    <label class="fw-bold mt-2 mb-0">
                        Total Barang : ' . $jml . '
                    </label> 
                    ';
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
                    <style>
                        $purple: #6562ad;
                        $light-purple: #8b91d1;
                        $pink: #f9bdbd;
                        $red: #e46b7b;
                        $green: #a1e060;
                        $orange: #fec74b;
                        $white: #fff;
                        $grey: #f6f6fa;

                        .container-customCard {
                            max-width: 305px;
                            height: 550px;
                            margin: 20px auto;
                            box-shadow: 0 0 20px #9a9a9a;
                            overflow: hidden;
                            font-family: "Montserrat";
                            border-radius: 6px;
                            position: relative;
                        }

                        .header-customCard {
                            background: #6562ad;
                            padding: 20px;
                        }

                        .navbar-customCard {
                            color: #fff;
                            padding-bottom: 10px;
                            border-bottom: 0.5px solid #7270bb;

                            a {
                                color: #fff;
                                text-decoration: none;
                                font-size: 1.2em;
                            }
                        }

                        .main-account-customCard {
                            float: right;

                            a {
                                color: #f9bdbd;
                                font-size: 0.8em;
                                font-weight: 500;
                            }
                        }

                        .top-view-customCard {
                            padding-top: 20px;

                            .payment-infos {
                                display: inline-block;
                                vertical-align: top;

                                .current-balance {
                                    color: #8b91d1;
                                    font-size: 0.75em;
                                }

                                .price {
                                    font-size: 2.2em;
                                    font-weight: 500;
                                    padding-top: 5px;
                                }

                                .btc {
                                    color: #fff;
                                    font-size: 0.8em;
                                    padding-top: 3px;
                                }
                            }
                        }

                        .qr-code-customCard {
                            float: right;
                            position: relative;

                            img {
                                width: 60px;
                                height: 60px;
                                background: ##fff;
                                padding: 4px;
                            }
                        }

                        .ctas {
                            display: block;
                            padding: 30px 0 50px;
                            width: 100%;

                            button {
                                color: ##fff;
                                width: 48%;
                                background-color: #f9bdbd;
                                border-radius: 40px 40px;
                                padding: 10px 10%;
                                font-size: 0.8em;
                                border: none;
                                cursor: pointer;
                            }

                            button:hover {
                                box-shadow: 0 0 5px #f9bdbd;
                            }

                            button:focus {
                                outline: 0;
                            }

                            .send {
                                float: right;
                            }
                        }

                        .bottom-view {
                            padding: 20px;
                            background-color: #fff;
                            height: 100%;

                            ul {
                                margin: -50px 0 0;
                                padding: 0;
                                list-style: none;
                            }

                            .payment-card {
                                vertical-align: top;
                                background: #fff;
                                margin-bottom: 15px;
                                box-shadow: 0 0 6px #808080;
                                border-radius: 6px;
                                padding: 10px 18px;

                                .hour {
                                    vertical-align: top;
                                    display: inline-block;
                                    color: #f9bdbd;
                                    font-size: 0.7em;
                                    font-weight: 500;
                                }

                                .price {
                                    vertical-align: top;
                                    float: right;
                                    font-size: 0.7em;
                                    font-weight: 500;

                                    &.negative {
                                        color: #e46b7b;
                                    }

                                    &.positive {
                                        color: #a1e060;
                                    }
                                }

                                .token {
                                    font-size: 0.8em;
                                    color: #6562ad;
                                    font-weight: 500;
                                    padding: 10px 0;
                                    border-bottom: 0.5px solid #d8d8d8;

                                    span {
                                        color: #8b91d1;
                                        font-size: 0.8em;
                                        display: block;
                                        padding-top: 5px;
                                    }
                                }

                                .score {
                                    font-size: 1.5em;

                                    &.green {
                                        color: #a1e060;
                                    }

                                    &.orange {
                                        color: #fec74b;
                                    }
                                }
                            }
                        }
                    </style>
                    <script>
                        function getDetails(id, kodeseri, nama) {
                            $.ajax({
                                type: "POST",
                                url: "' . route("persetujuan/cariDetail") . '",
                                data: {
                                    "_token": "' . $request->_token . '",
                                    keyword: kodeseri,
                                    tipe: "penerimaan",
                                },
                                beforeSend: function() {
                                    $(".open-"+id).hide();
                                    $(".close-"+id).show();

                                    $(".tunggu-"+id).show();
                                    $(".hasilcari-"+id).hide();
                                    $(".tunggu-"+id).html(
                                        `<center><p style="color:black"><strong><span class="spinner-border spinner-border-sm me-2" role="status"></span> Mohon Menunggu, Sedang mencari Detail Pembelian `+nama+`<span class="animated-dots"></span></strong></p></center>`
                                    );
                                },
                                success: function(html) {
                                    $("#overlay2").fadeOut(300);
                                    $(".tunggu-"+id).html("");
                                    $(".hasilcari-"+id).fadeIn();
                                    $(".hasilcari-"+id).html(html);
                                }
                            });
                        }
                        function closeDetails(id) {
                            $(".hasilcari-"+id).fadeOut();
                            $(".open-"+id).show();
                            $(".close-"+id).hide();
                        }
                            
                        function openOption(id, param){
                            if (param == "terima") {
                                $(".opLocker-"+id).fadeIn();
                                $(".opDiambil-"+id).hide();
                            } else if (param == "diambil") {
                                $(".opLocker-"+id).hide();
                                $(".opDiambil-"+id).fadeIn();
                            }
                        }
                    </script>
                ';
            $z = 1;
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('barang')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    echo  '<input type="hidden" name="id[]" value="' . $u->id . '" >';
                    echo  '<input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '">';
                    echo '
                        <div class="list-inline list-inline-dots mt-0 mb-0 text-secondary d-sm-block d-none">
                            <div class="container-customCard rounded-3 shadow-lg">
                                <div class="header-customCard rounded-3 pt-2">
                                    <div class="navbar-customCard pt-2">
                                        <button type="button" class="btn-link text-white open-' . $u->id . '" onclick="getDetails(`' . $u->id . '`, `' . $u->kodeseri . '`, `' . $u->namaBarang . '`)">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn-link text-white close-' . $u->id . '" onclick="closeDetails(`' . $u->id . '`)" style="display:none">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                        <div class="main-account-customCard">
                                            <h4>' . strtoupper($u->namaBarang) . '</h4>
                                        </div>
                                    </div>
                                    <div class="top-view-customCard rounded-3 pt-1">
                                        <div class="payment-infos">
                                            <div class="text-white">
                                                Kodeseri : ' . $u->kodeseri . '
                                            </div>
                                            <div class="price">
                                                <input type="number" name="diterima[]" value="' . $u->qty_beli . '" class="form-control" style="width: 50%">
                                            </div>
                                            <div class="btc">
                                                Qty Permintaan: ' . $u->qty_beli . ' ' . strtoupper($u->satuan) . '
                                            </div>
                                        </div>
                                        <div class="qr-code-customCard">
                                            <div class="img-thumbnail border rounded-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Qrcode_wikipedia_fr_v2clean.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ctas pt-1">
                                        <button type="button" class="bg-green shadow-lg text-white fw-bold" onclick="openOption(`' . $u->id . '`, `terima`)">Terima</button>
                                        <button type="button" class="bg-cyan shadow-lg text-white fw-bold" onclick="openOption(`' . $u->id . '`, `diambil`)">Diambil User</button>
                                        <label for="isi" class="mt-2 mb-2 text-white">Foto Penerimaan</label>
                                        <input type="file" class="form-control">
                                        <div class="opLocker-' . $u->id . '" style="display:none">
                                            <label for="isi" class="mt-2 mb-2 text-white">Loker</label>
                                            <input name="locker[]" type="text" class="form-control" placeholder="Masukkan Loker Gudang">
                                        </div>
                                        <div class="opDiambil-' . $u->id . '" style="display:none">
                                            <label for="isi" class="mt-2 mb-2 text-white">Loker</label>
                                            <input type="text" class="form-control bg-secondary-lt" placeholder="Tidak perlu mengisi loker" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="gradient-overlay"></div>
                                <div class="bottom-view rounded-3 pt-1 pb-1">
                                    <ul>
                                        <li>
                                            <div class="payment-card">
                                                <div class="hour text-danger">' . Carbon::parse($u->tgl_permintaan)->format('d/m/Y') . '</div>
                                                <div class="price text-green">' . $permintaanController->getMesinPermintaan($u->mesin) . '</div>
                                                <div class="token">
                                                    ' . strtoupper($u->namaBarang) . '
                                                    <span>' . $u->keterangan . " " . $u->katalog . " " . $u->part . '</span>
                                                </div>
                                                <h5> <span>' . ucfirst($u->supplier) . '</span> </h5>
                                                <div class="hasilcari-' . $u->id . '" style="display:none"></div>
                                                <div class="tunggu-' . $u->id . '" style="display:none"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="badge bg-indigo float-end">' . $z . ' / ' . $jml . '</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                            <div class="container-customCard rounded-3 shadow-lg">
                                <div class="header-customCard rounded-3">
                                    <div class="navbar-customCard">
                                        <button type="button" class="btn-link text-white open-' . $u->id . '" onclick="getDetails(`' . $u->id . '`, `' . $u->kodeseri . '`, `' . $u->namaBarang . '`)">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn-link text-white close-' . $u->id . '" onclick="closeDetails(`' . $u->id . '`)" style="display:none">
                                            <i class="fas fa-xmark"></i>
                                        </button>
                                        <div class="main-account-customCard">
                                            <h4>' . strtoupper($u->namaBarang) . '</h4>
                                        </div>
                                    </div>
                                    <div class="top-view-customCard rounded-3">
                                        <div class="payment-infos">
                                            <div class="text-white">
                                                Kodeseri : ' . $u->kodeseri . '
                                            </div>
                                            <div class="price">
                                                <input type="number" value="' . $u->qty_beli . '" class="form-control" style="width: 50%">
                                            </div>
                                            <div class="btc">
                                                Qty Permintaan: ' . $u->qty_beli . ' ' . strtoupper($u->satuan) . '
                                            </div>
                                        </div>
                                        <div class="qr-code-customCard">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Qrcode_wikipedia_fr_v2clean.png" alt="">
                                        </div>
                                    </div>
                                    <div class="ctas">
                                        <button type="button" class="bg-green shadow-lg text-white fw-bold" onclick="openOption(`' . $u->id . '`, `terima`)">Terima</button>
                                        <button type="button" class="bg-cyan shadow-lg text-white fw-bold" onclick="openOption(`' . $u->id . '`, `diambil`)">Diambil User</button>
                                        <label for="isi" class="mt-2 mb-2 text-white">Foto Penerimaan</label>
                                        <input type="file" class="form-control">
                                        <div class="opLocker-' . $u->id . '" style="display:none">
                                            <label for="isi" class="mt-2 mb-2 text-white">Loker</label>
                                            <input name="locker[]" type="text" class="form-control" placeholder="Masukkan Loker Gudang">
                                        </div>
                                        <div class="opDiambil-' . $u->id . '" style="display:none">
                                            <label for="isi" class="mt-2 mb-2 text-white">Loker</label>
                                            <input type="text" class="form-control bg-secondary-lt" placeholder="Tidak perlu mengisi loker" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="gradient-overlay"></div>
                                <div class="bottom-view rounded-3">
                                    <ul>
                                        <li>
                                            <div class="payment-card">
                                                <div class="hour text-danger">' . Carbon::parse($u->tgl_permintaan)->format('d/m/Y') . '</div>
                                                <div class="price text-green">' . $permintaanController->getMesinPermintaan($u->mesin) . '</div>
                                                <div class="token">
                                                    ' . strtoupper($u->namaBarang) . '
                                                    <span>' . $u->keterangan . " " . $u->katalog . " " . $u->part . '</span>
                                                </div>
                                                <h5> <span>' . ucfirst($u->supplier) . '</span> </h5>
                                                <div class="hasilcari-' . $u->id . '" style="display:none"></div>
                                                <div class="tunggu-' . $u->id . '" style="display:none"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <span class="badge bg-indigo float-end">' . $z . ' / ' . $jml . '</span>
                                </div>
                            </div>
                        </div>
                        ';

                    $z++;
                }
            }
            echo '      </div>';
        }
    }

    public function storePenerimaanBarang(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
                'penerima' => 'required',
            ],
        );
        // Get NPB
        $latestKodeseri = DB::table('penerimaan')->latest('npb')->first();
        if ($latestKodeseri) {
            $y = substr($latestKodeseri->npb, 3, 2);
            $m = substr($latestKodeseri->npb, 6, 2);
            $d = substr($latestKodeseri->npb, 8, 2);
            if (date('ymd') == $y . $m . $d) {
                $noUrut = (int) substr($latestKodeseri->npb, -4);
                $noUrut++;
                $char = date('y-md');
                $NPB = "PN-" . $char . sprintf("%04s", $noUrut);
            } else {
                $NPB = "PN-" . date('y') . "-" . date('md') . "0001";
            }
        } else {
            $NPB = "PN-" . date('y') . "-" . date('md') . "0001";
        }
        // input Penerimaan
        $penerimaan = DB::table('penerimaan')->insert([
            'npb' => $NPB,
            'tanggal' => $request->tgl,
            'penerima' => $request->penerima,
            'keterangan' => $request->keterangan,
            'dibuat' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $jml = count($request->kodeseri);
        for ($i = 0; $i < $jml; $i++) {
            // ambil data permintaan barang untuk deskripsi, katalog dan lain-lain
            $getbarang = DB::table('permintaanitm')->where('kodeseri', '=', $request->kodeseri[$i])->first();
            // input Penerimaan Item
            DB::table('penerimaanitm')->insert([
                'npb' => $NPB,
                'tanggal' => $request->tgl,
                'kodeseri' => $request->kodeseri[$i],
                "nama" => $getbarang->namaBarang,
                'katalog' => $getbarang->katalog,
                'mesin' => $getbarang->mesin,
                'kts' => $request->diterima[$i],
                'satuan' => $getbarang->satuan,
                'pemesan' => $getbarang->pemesan,
                'urgent' => $getbarang->urgent,
                'dibeli' => $getbarang->dibeli,
                'locker' => $request->locker[$i],
                'partial' => 0,
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // Update Barang
            $check = DB::table('barang')
                ->where('kodeseri', $request->kodeseri[$i])
                ->limit(1)
                ->update(
                    array(
                        'tgl_penerimaan' => $request->tgl,
                        'qty_diterima' => $request->diterima[$i],
                        'npb' => $NPB,
                        'locker' => $request->locker[$i],
                        'partial' => 0,
                        'status' => 'DITERIMA',
                        'updated_at' => date('Y-m-d H:i:s'),
                    )
                );
        }
        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($penerimaan) {
            $arr = array('msg' => 'Data telah berhasil diproses', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function getPenerimaanCheck(Request $request)
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

            $data = DB::table('barang')
                ->where('status', '=', 'DIBELI')
                ->whereBetween('tgl_pembelian', [$dari, $sampai])
                ->orderBy('kodeseri', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('mesin', function ($row) {
                    $permintaanController = new PermintaanController();
                    $m = $permintaanController->getMesinPermintaan($row->mesin);
                    return $m;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list flex-nowrap">
                                <form method="POST" action="printPermintaan" target="_blank">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button type="submit" class="btn btn-sm btn-link btn-icon">
                                        <i class="fa-solid fa-eye" style="margin-right:5px;"></i>
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <form method="POST" action="printPermintaan" target="_blank">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                                        <button type="submit" class="dropdown-item">
                                            <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-blue icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                            PRINT
                                        </button>
                                    </form>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDetailPermintaan" data-id="' . $row->kodeseri . '"">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-orange icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        EDIT
                                    </a>
                                </div>
                            </div>';
                    return $btn;
                })
                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['action', 'select_orders'])
                ->make(true);
        }

        return view('products.03_gudang.penerimaan');
    }
}
