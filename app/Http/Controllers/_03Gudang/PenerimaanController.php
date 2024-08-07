<?php

namespace App\Http\Controllers\_03Gudang;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
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
                        <div class="col-lg-3 col-md-12">
                                <label class="form-label">Tanggal Penerimaan</label>
                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                        </div>
                        <div class="col-lg-9 col-md-12">
                                <label class="form-label">Penerimaan</label>
                                <input name="pembeli" list="pembeli" type="text" class="form-control" value="FAHMI FAHRURROZI">
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
                        <div class="card cards shadow border-green table-hover" id="kartu-' . $u->id . '">
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
                                                <h3 class="mb-0">' . $u->namaBarang . '</h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 class="mb-0">Qty : ' . $u->qty_permintaan . ' ' . $u->satuan . '</h3>
                                            </div>
                                            <div class="col-auto font-italic text-green">Qty Terima : <input name="qtyAcc[]" type="number" min="1" style="width: 100px" id="" value="' . $u->qty_permintaan . '"></div>
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
                                                    <i class="text-green">Loker : <input name="ketAcc[]" type="text" style="width: 150px"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 ps-0 pe-0 pb-0">
                                    <table class="table table-sm table-card text-orange">
                                        <tr class="text-center">
                                            <td>Pemesan: ' . $u->pemesan . '</td>
                                            <td>' . $u->unit . '</td>
                                            <td>Mesin: ' . $permintaanController->getMesinPermintaan($u->mesin) . '</td>
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
}
