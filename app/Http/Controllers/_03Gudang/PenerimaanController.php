<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\_02Pengadaan\PermintaanController;
use Carbon\Carbon;

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
                        <div class="col-lg-3 col-md-12">
                                <label class="form-label">Tanggal Penerimaan</label>
                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                        </div>
                        <div class="col-lg-9 col-md-12">
                                <label class="form-label">Penerimaan</label>
                                <input name="penerima" type="text" class="form-control" value="FAHMI FAHRURROZI">
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
                                    $(".hasilcari-"+id).show();
                                    $(".hasilcari-"+id).html(html);
                                }
                            });
                        }
                        function closeDetails(id) {
                            $(".hasilcari-"+id).hide();
                            $(".open-"+id).show();
                            $(".close-"+id).hide();
                        }
                    </script>
                ';
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('barang')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    echo  '<input type="hidden" name="id[]" value="' . $u->id . '" >';
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
                                background-color: #f6f6fa;
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
                        <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                            <div class="card cards shadow-lg border-blue table-hover" id="kartu-' . $u->id . '">
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
                                                    <h2 class="mb-0 fw-bold">' . $u->namaBarang . '</h2>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h3 class="mb-0">Qty : ' . $u->qty_permintaan . ' ' . $u->satuan . '</h3>
                                                </div>
                                                <div class="col-auto font-italic text-green">
                                                    Qty Terima : <input name="qtyTerima[]" type="number" min="1" style="width: 100px" id="" value="' . $u->qty_permintaan . '">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
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
                                                <div class="col-md-auto">
                                                    <div class="mt-3 badges">
                                                        <i class="text-green">Loker : <input name="locker[]" type="text" style="width: 150px"></i>
                                                    </div>
                                                    <div class="mt-3 badges">
                                                        <i class="text-green">Foto Penerimaan : <input name="imgPenerimaan-' . $u->kodeseri . '" type="file" style="width: 150px"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 ps-0 pe-0 pb-0">
                                        <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                            <table class="table table-sm table-card text-orange">
                                                <tr class="text-center">
                                                    <td class="fw-bolder text-azure">' . $u->kodeseri . '</td>
                                                    <td>Pemesan: ' . $u->pemesan . '</td>
                                                    <td>Mesin: ' . $permintaanController->getMesinPermintaan($u->mesin) . '</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="hasilcari-' . $u->id . '" style="display:none"></div>
                                                        <div class="tunggu-' . $u->id . '" style="display:none"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                            <div class="container-customCard rounded-3 shadow-lg">
                                <div class="header-customCard rounded-3">
                                    <div class="navbar-customCard">
                                        <button class="btn-link text-white open-' . $u->id . '" onclick="getDetails(`' . $u->id . '`, `' . $u->kodeseri . '`, `' . $u->namaBarang . '`)">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                        <button class="btn-link text-white close-' . $u->id . '" onclick="closeDetails(`' . $u->id . '`)" style="display:none">
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
                                                ' . $u->qty_beli . ' ' . strtoupper($u->satuan) . '
                                            </div>
                                        </div>
                                        <div class="qr-code-customCard">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Qrcode_wikipedia_fr_v2clean.png" alt="">
                                        </div>
                                    </div>
                                    <div class="ctas">
                                        <button class="bg-green shadow-lg text-white fw-bold">Terima</button>
                                        <button class="bg-cyan shadow-lg text-white fw-bold">Diambil User</button>
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

    public function storePenerimaanBarang(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
                'penerima' => 'required',
            ],
        );
        $jml = count($request->kodeseri);

        for ($i = 0; $i < $jml; $i++) {
            $check = DB::table('barang')
                ->where('kodeseri', $request->kodeseri[$i])
                ->limit(1)
                ->update(
                    array(
                        'qty_diterima' => '',
                        'tgl_penerimaan' => $request->pembeli,
                        'npb' => $request->qtyAcc[$i],
                        'estimasiharga' => $request->estimasiHarga[$i],
                        'status' => 'DITERIMA',
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
