<?php

namespace App\Http\Controllers\_02Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function pembelian()
    {
        return view('products.02_pengadaan.pembelian', [
            'active' => 'Pembelian',
            'judul' => 'Pembelian'
        ]);
    }

    public function getDataPembelian(Request $request)
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

            $data = DB::table('permintaanitm AS pi')
                ->whereBetween('pi.tgl', [$dari, $sampai])
                ->where('pi.status', '=', 'PROSES PEMBELIAN')
                ->orderBy('pi.kodeseri', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
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
        }

        return view('products.02_pengadaan.persetujuan');
    }

    public function viewPembelian(Request $request)
    {
        $no = 1;
        $getpembelian = DB::table('pembelian')->where('nofkt', '=', $request->nofkt)->first();
        $getpembelianitem = DB::table('pembelianitm')->where('nofaktur', '=', $request->nofkt)->get();
        echo '
                <div class="modal-body" style="color: black;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <p> Tanggal : ' . Carbon::parse($getpembelian->tgl)->format("d/m/Y") . '</p>
                                <p> No. Faktur : ' . $getpembelian->nofkt . '</p> 
                            </div>
                            <div class="col-lg-6">
                                <p> Penjual : ' . $getpembelian->penjual . '</p>
                                <p> Pembeli : ' . $getpembelian->pembeli . '</p> 
                            </div>
                        </div>
                        <table class="table table-sm table-bordered table-hover"
                            style="color: black; border-color: black;text-transform: uppercase; font-size:10px">
                            <thead class="text-black" style="border-color: black;">
                                <th style="border-color: black;" class="text-center">#</th>
                                <th style="border-color: black;" class="text-center">Kodeseri</th>
                                <th style="border-color: black;" class="text-center">Barang</th>
                                <th style="border-color: black;" class="text-center">Quantity</th>
                                <th style="border-color: black;" class="text-center">Harga</th>
                                <th style="border-color: black;" class="text-center">Pajak</th>
                                <th style="border-color: black;" class="text-center">Jumlah</th>
                            </thead>
                            <tbody class="text-black" style="border-color: black;">
                            ';
        foreach ($getpembelianitem as $key) {
            echo '
                                    <tr>
                                        <td class="text-center">' . $no . '</td>
                                        <td class="text-center">' . $key->kode . '</td>
                                        <td class="">' . $key->namabarang . '</td>
                                        <td class="text-center">' . $key->kts . '</td>
                                        <td class="text-center">' . $key->harga . '</td>
                                        <td class="text-center">' . $key->nmpajak . '</td>
                                        <td class="text-center">' . $key->jumlah . '</td>
                                    </tr>
                                    ';
            $no++;
        }
        echo '
                            </tbody>
                        </table>
                        <i>*Note : ' . $getpembelian->catatan . '</i>
                        
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-sm table-bordered table-hover"
                                    style="color: black; border-color: black;text-transform: uppercase; font-size:10px">
                                    <tr class="text-black" style="border-color: black;">
                                        <td colspan="5">Pembayaran</td>
                                    </tr>
                                    <tr class="text-black" style="border-color: black;">
                                        <td>Subtotal</td>
                                        <td>:</td>
                                        <td></td>
                                        <td>' . $getpembelian->subtotal . '</td>
                                    </tr>
                                    <tr class="text-black" style="border-color: black;">
                                        <td>Diskon</td>
                                        <td>:</td>
                                        <td>' . $getpembelian->diskon . '%</td>
                                        <td>' . $getpembelian->diskonint . '</td>
                                    </tr>
                                    <tr class="text-black" style="border-color: black;">
                                        <td colspan="3"></td>
                                        <td>' . $getpembelian->thasil . '</td>
                                    </tr>
                                    <tr class="text-black" style="border-color: black;">
                                        <td>PPN</td>
                                        <td>:</td>
                                        <td></td>
                                        <td>' . $getpembelian->totppn . '</td>
                                    </tr>
                                    <tr class="text-black" style="border-color: black;">
                                        <td>Total</td>
                                        <td>:</td>
                                        <td></td>
                                        <td>' . $getpembelian->grandtotal . '</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>';
    }

    public function getDataServis(Request $request)
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

            $data = DB::table('servisitm AS pi')
                ->whereBetween('pi.tgl_servis', [$dari, $sampai])
                ->where('pi.status', '=', 'PROSES SERVIS')
                ->orderBy('pi.kodeseri_servis', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl_servis)->format('d/m/Y');
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
                        $c = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span> <b class="text-purple">' . $row->status . '</b>';
                    } elseif ($row->status == 'HOLD') {
                        $c = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span> <b class="text-orange">' . $row->status . '</b>';
                    } elseif ($row->status == 'REJECT') {
                        $c = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span> <b class="text-red">' . $row->status . '</b>';
                    } elseif ($row->status == 'PROSES SERVIS') {
                        $c = '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span> <b class="text-lime">' . $row->status . '</b>';
                    } elseif ($row->status == 'DIBAYAR') {
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

    public function checkPembelian(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $permintaanController = new PermintaanController();
            $uang = DB::table("uang")->get();
            $supplier = DB::table("person")->where('tipe', '=', 'ENTITAS')->orderBy('nama')->get();
            $pajak = DB::table("pajak")->get();

            $noform = DB::table("pembelian")->max('noform');
            $noform++;

            $nofaktur = DB::table("pembelianitm")->where('nofaktur', 'LIKE', '%P-INVN-%')->max('nofaktur');
            $y = substr($nofaktur, 7, 2);
            if (date('y') == $y) {
                $noUrut2 = substr($nofaktur, 10, 7);
                $na = $noUrut2 + 1;
                $NOPO = "P-INVN-" . $y . "-" . sprintf("%07s", $na);
            } else {
                $NOPO = "P-INVN-" . date('y') . "-" . "0000001";
            }
            $jml = count($request->id);
            echo '
                    <input name="package" id="package" type="hidden" value="0">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="card bg-orange-lt text-dark transparent-card card-xl shadow rounded border border-blue">
                                <div class="card-header pb-0 pt-1">
                                    <h5 class="card-title">Data Formulir</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal Faktur</label>
                                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Supplier</label>
                                                <select name="supplier" id="vendorcheck" class="form-select" required>
                                                    <option value="">-- Pilih Supplier --</option>';
            foreach ($supplier as $show) {
                echo '                              <option value="' . $show->nama . '" data-alamat="' . $show->alamat . '">' . $show->nama . '</option>';
            }
            echo '
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Dibeli Oleh</label>
                                                <select name="dibeli" class="form-select" required>
                                                    <option value="">-- Pilih Pembeli --</option>
                                                    <option value="ANDRI">ANDRI</option>
                                                    <option value="LOBIARTO">LOBIARTO</option>
                                                    <option value="MANTI">MANTI</option>
                                                    <option value="MARNI">MARNI</option>
                                                    <option value="NURLAELA">NURLAELA</option>
                                                    <option value="PUJI NURRETI">PUJI NURRENTI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">No. Form</label>
                                                <input type="text" class="form-control bg-secondary-lt cursor-not-allowed" disabled value="' . $noform . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">No. PO / Faktur</label>
                                                <input type="text" name="nopo" class="form-control" value="' . $NOPO . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Mata Uang</label>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <select class="form-select" name="uang" id="uangcheck">
                                                            <option value="">-- Pilih --</option>
                                                        ';
            foreach ($uang as $key) {
                echo '                                      <option value="' . $key->inisial . '" data-kursuang="' . $key->kurs . '">' . $key->inisial . ' - ' . $key->negara . '</option>';
            }
            echo '                                      </select>
                                                        <script>
                                                            $("#uangcheck").on("change", function() {
                                                                const kurs = $("#uangcheck option:selected").data("kursuang");
                                                                $("[name=kurs]").val(kurs);
                                                            });
                                                            
                                                            $("#vendorcheck").on("change", function() {
                                                                const alamat = $("#vendorcheck option:selected").data("alamat");
                                                                $("[name=alamatcheck]").val(alamat);
                                                                $("[name=kirimcheck]").val(alamat);
                                                            });
                                    
                                                            function jumlahitem(id) {
                                                                var txt1 = document.getElementById("qtybeli-" + id).value;
                                                                var txt2 = document.getElementById("harga-" + id).value;
                                                                var result = parseFloat(txt1) * parseFloat(txt2);
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("jumlah-" + id).value = result;
                                                                    document.getElementById("txtjumlah-" + id).innerText = result;
                                                                }
                                                            }

                                                            function formatRibuan(angka){
                                                                var number_string = angka.toString().replace(/[^,\d]/g, ""),
                                                                split           = number_string.split("."),
                                                                sisa            = split[0].length % 3,
                                                                angka_hasil     = split[0].substr(0, sisa),
                                                                ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
                                                                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                if(ribuan){
                                                                    separator = sisa ? "." : "";
                                                                    angka_hasil += separator + ribuan.join(".");
                                                                }
                                                                angka_hasil = split[1] != undefined ? angka_hasil + "," + split[1] : angka_hasil;
                                                                return angka_hasil;
                                                            }

                                                            function getPajak(id) {
                                                                const pajak = $("#pajak-"+id+" option:selected").data("nm");
                                                                var jml = document.getElementById("jumlah-" + id).value;
                                                                if (!isNaN(pajak)) {
                                                                    document.getElementById("inisialpajak-" + id).value = pajak;
                                                                } else {
                                                                    document.getElementById("inisialpajak-" + id).value = "0";
                                                                }
                                                                var result = (parseFloat(jml) * parseFloat(pajak)) / 100;
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("itempajak-" + id).value = result;
                                                                    document.getElementById("txtitempajak-" + id).innerText = result;
                                                                } else {
                                                                    document.getElementById("itempajak-" + id).value = "0";
                                                                    document.getElementById("txtitempajak-" + id).innerText = "0";
                                                                }
                                                            }

                                                            function getTotalitem(id){
                                                                var txt1 = document.getElementById("jumlah-" + id).value;
                                                                var txt2 = document.getElementById("itempajak-" + id).value;
                                                                var result = parseFloat(txt1) + parseFloat(txt2);
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalitem-" + id).value = result;
                                                                    document.getElementById("txttotalitem-" + id).innerText = result;
                                                                }
                                                                    
                                                                var arr = document.getElementsByName("jumlahNet[]");
                                                                var tot = 0;
                                                                for (var i = 0; i < arr.length; i++) {
                                                                    if (parseFloat(arr[i].value))
                                                                        tot += parseFloat(arr[i].value);
                                                                }
                                                                document.getElementById("subtotalcheck").value = tot;

                                                                var txt1 = document.getElementById("subtotalcheck").value;
                                                                var txt2 = document.getElementById("subdiskon").value;
                                                                
                                                                var resDiskon = (parseFloat(txt1) * parseFloat(txt2)) / 100;
                                                                document.getElementById("subHasildiskon").value = resDiskon;
                                                                
                                                                var txt3 = document.getElementById("subHasildiskon").value;

                                                                var result = parseFloat(txt1) - parseFloat(txt3);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalSub").value = result;
                                                                    document.getElementById("totalPembelian").value = result;
                                                                }
                                                            }

                                                            function getDiskonsub() {
                                                                var txt1 = document.getElementById("subtotalcheck").value;
                                                                var txt2 = document.getElementById("subdiskon").value;
                                                                
                                                                var resDiskon = (parseFloat(txt1) * parseFloat(txt2)) / 100;
                                                                document.getElementById("subHasildiskon").value = resDiskon;
                                                                
                                                                var txt3 = document.getElementById("subHasildiskon").value;

                                                                var result = parseFloat(txt1) - parseFloat(txt3);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalSub").value = result;
                                                                }
                                                            }

                                                            function getppn() {
                                                                var txt1 = document.getElementById("totalSub").value;
                                                                var txt2 = document.getElementById("percentageppn").value;
                                                                
                                                                var result = (parseFloat(txt1) * parseFloat(txt2))/100;
                                                                var resTot = parseFloat(txt1) + parseFloat(result);
                                                                document.getElementById("totalppn").value = result;
                                                                document.getElementById("totalPembelian").value = resTot;
                                                            }

                                                            function setPPN(params){
                                                                var pjk = document.getElementsByName("itempajak[]");
                                                                var ini = document.getElementById("inisialpajak-"+params).value;
                                                                var tot = 0;
                                                                for (var i = 0; i < pjk.length; i++) {
                                                                    if (parseFloat(pjk[i].value))
                                                                        tot += parseFloat(pjk[i].value);
                                                                }
                                                                document.getElementById("totalppn").value = tot;
                                                                document.getElementById("percentageppn").value = ini;
                                                            }

                                                            function getTotalPembelian() {
                                                                var txt1 = document.getElementById("totalSub").value;
                                                                var txt2 = document.getElementById("totalppn").value;
                                                                
                                                                var result = parseFloat(txt1) + parseFloat(txt2);
                                                                document.getElementById("totalPembelian").value = result;
                                                            }

                                                            

                                                            function setSubTotalPackage(){
                                                                var txt1 = document.getElementById("QtyPackage").value;
                                                                var txt2 = document.getElementById("hargaSatuPackage").value;
                                                                var result = parseFloat(txt1) * parseFloat(txt2);
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("package-subtotalcheck").value = result;
                                                                    document.getElementById("package-totalPembelian").value = result;
                                                                }
                                                            }

                                                            function getDiskonsubPackage() {
                                                                var txt1 = document.getElementById("package-subtotalcheck").value;
                                                                var txt2 = document.getElementById("package-subdiskon").value;
                                                                
                                                                var resDiskon = (parseFloat(txt1) * parseFloat(txt2)) / 100;
                                                                document.getElementById("package-subHasildiskon").value = resDiskon;
                                                                
                                                                var txt3 = document.getElementById("package-subHasildiskon").value;

                                                                var result = parseFloat(txt1) - parseFloat(txt3);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("package-totalSub").value = result;
                                                                    document.getElementById("package-totalPembelian").value = result;
                                                                }
                                                            }

                                                            function getppnPackage() {
                                                                var txt1 = document.getElementById("package-totalSub").value;
                                                                var txt2 = document.getElementById("package-percentageppn").value;
                                                                
                                                                var result = (parseFloat(txt1) * parseFloat(txt2))/100;
                                                                var resTot = parseFloat(txt1) + parseFloat(result);
                                                                document.getElementById("package-totalppn").value = result;
                                                                document.getElementById("package-totalPembelian").value = resTot;
                                                            }

                                                            function getTotalPembelianPackage() {
                                                                var txt1 = document.getElementById("package-totalSub").value;
                                                                var txt2 = document.getElementById("package-totalppn").value;
                                                                
                                                                var result = parseFloat(txt1) + parseFloat(txt2);
                                                                document.getElementById("package-totalPembelian").value = result;
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col">
                                                        <input name="kurs" type="number" class="form-control" placeholder="Kurs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="card bg-azure-lt text-dark transparent-card card-xl shadow rounded border border-blue" style="height: 280px">
                                <div class="card-header pb-0 pt-1">
                                    <h5 class="card-title">Data Alamat</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Alamat</label>
                                            <textarea id="alamat1" name="alamatcheck" readonly class="form-control bg-secondary-lt border border-blue cursor-not-allowed" rows="8" placeholder="Pilih Supplier dan alamat akan terisi..."></textarea>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Alamat Kirim</label>
                                            <textarea id="alamat2" name="kirimcheck" class="form-control border border-blue" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="packagesId" value="0" onclick="packages();">
                            <span class="form-check-label">Masukkan Barang yang dipilih menjadi <i class="fw-bold">Package</i></span>
                        </label>
                    </div>
                    <div class="space-y">
                        <div class="table-responsive shadow pembelianItems">
                            <table class="table table-sm table-bordered text-nowrap text-dark transparent-card card-xl rounded border border-dark" style="text-transform: uppercase;font-weight: bold;font-size:10px;">
                                <thead class="bg-purple-lt text-dark">
                                    <tr>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Tanggal</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Kodeseri</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Barang</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Deskripsi</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Qty</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Qty Beli</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Satuan</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Harga Satuan</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Jumlah</td>
                                        <td class="text-center">Estimasi</td>
                                        <td class="text-center">Garansi</td>
                                        <td class="text-center" style="padding-top:15px;padding-bottom:15px" rowspan="2" colspan="2">Pajak</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Total</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" colspan="2">(Hari)</td>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                        ';
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('permintaanitm')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    if ($u->urgent == 1) {
                        $stturgent = '<span class="badge bg-red ms-auto badge-blink"></span> ';
                    } else {
                        $stturgent = '';
                    }
                    echo '
                                    <tr>
                                        <input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '">
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px;width:75px">' . Carbon::parse($u->tgl)->format('d/m/Y') . '</td>
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px;width:75px">' . $u->kodeseri . '</td>
                                        <td style="padding-top:10px;padding-bottom:10px">' . $stturgent . $u->namaBarang . ' </td>
                                        <td style="padding-top:10px;padding-bottom:10px">' . $u->keterangan . '</td>
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->qtyacc . '</td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:100px">
                                            <input class="form-control form-control-sm" type="number" name="qtybeli[]" id="qtybeli-' . $u->kodeseri . '" value="' . $u->qtyacc . '" onblur="jumlahitem(`' . $u->kodeseri . '`);getPajak(`' . $u->kodeseri . '`);getTotalitem(`' . $u->kodeseri . '`)" onkeyup="jumlahitem(`' . $u->kodeseri . '`);getPajak(`' . $u->kodeseri . '`);getTotalitem(`' . $u->kodeseri . '`)" min="0" style="text-align:center;" required>
                                            <input type="hidden" name="qtypermintaan[]" value="' . $u->qtyacc . '">
                                        </td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:100px"><input class="form-control form-control-sm" type="text" name="satuan[]" id="satuan-' . $u->kodeseri . '" value="' . $u->satuan . '" style="text-align:center;" required></td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:100px"><input class="form-control form-control-sm" type="number" name="harga[]" id="harga-' . $u->kodeseri . '" onblur="jumlahitem(`' . $u->kodeseri . '`);getPajak(`' . $u->kodeseri . '`);getTotalitem(`' . $u->kodeseri . '`)" onkeyup="jumlahitem(`' . $u->kodeseri . '`);getPajak(`' . $u->kodeseri . '`);getTotalitem(`' . $u->kodeseri . '`)" min="0" style="text-align:center;" required></td>
                                        <td class="text-center text-blue bg-secondary-lt cursor-not-allowed" style="padding-right:1px;padding-left:1px;padding-top:10px;padding-bottom:1px">
                                            <i id="txtjumlah-' . $u->kodeseri . '"></i>
                                            <input type="hidden" id="jumlah-' . $u->kodeseri . '" name="jumlahNet[]">
                                        </td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:75px"><input class="form-control form-control-sm" type="number" name="estimasi[]" id="estimasi-' . $u->kodeseri . '" min="0"></td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:75px"><input class="form-control form-control-sm" type="number" name="garansi[]" id="garansi-' . $u->kodeseri . '" min="0"></td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:75px">
                                            
                                                                <select class="form-control form-control-sm" name="pajak[]" id="pajak-' . $u->kodeseri . '" onblur="getPajak(`' . $u->kodeseri . '`);getTotalitem(`' . $u->kodeseri . '`);setPPN(`' . $u->kodeseri . '`);getTotalPembelian();">
                                                                    <option value="0">-</option>
                                                                ';
                    foreach ($pajak as $p) {
                        echo '                                      <option value="' . $p->tax_code . '" data-nm="' . $p->rate . '">' . $p->tax_code . ' ( ' . $p->rate . ' % )</option>';
                    }
                    echo '                                      </select>
                                        </td>
                                        <input type="hidden" id="inisialpajak-' . $u->kodeseri . '" name="inisialpajak[]">
                                        <td class="text-center text-blue bg-secondary-lt cursor-not-allowed" style="width:10px;padding-right:10px;padding-left:10px;padding-top:10px;padding-bottom:1px">
                                            <i id="txtitempajak-' . $u->kodeseri . '"></i>
                                            <input type="hidden" id="itempajak-' . $u->kodeseri . '" name="itempajak[]" value="0">
                                        </td>
                                        <td class="text-center text-blue bg-secondary-lt cursor-not-allowed" style="width:10px;padding-right:10px;padding-left:10px;padding-top:10px;padding-bottom:1px">
                                            <i id="txttotalitem-' . $u->kodeseri . '"></i>
                                            <input type="hidden" id="totalitem-' . $u->kodeseri . '" name="totalitem[]">
                                        </td>
                                    </tr>
                                ';
                }
            }
            echo '      
                                </tbody>
                            </table>
                        </div>
                        <div class="shadow packagesItems" style="display:none;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card bg-yellow-lt text-dark transparent-card card-xl shadow rounded border border-blue">
                                        <div class="card-header pb-0 pt-1">
                                            <h3 class="card-title">Data Package</h3>
                                        </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="mb-0 pb-0 pt-0">
                                                            <label class="form-label">Jenis</label>
                                                            <input type="text" class="form-control bg-secondary-lt cursor-not-allowed" value="Lain-Lain" readonly>
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label">Nama Package</label>
                                                            <input type="text" name="packagenamaBarang" class="form-control" placeholder="Nama Package...">
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label">Deskripsi</label>
                                                            <input type="text" name="packagedeskripsi" class="form-control" placeholder="Deskripsi...">
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label">Katalog</label>
                                                            <input type="text" name="packagekatalog" class="form-control" placeholder="Katalog...">
                                                        </div>
                                                        <div class="mb-0 pb-2 pt-1">
                                                            <label class="form-label">Part</label>
                                                            <input type="text" name="packagepart" class="form-control" placeholder="Part...">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3">
                                                        <div class="mb-0 pb-0 pt-0">
                                                            <label class="form-label">Mesin</label>
                                                            <select class="form-select elementmesin text-nowrap" name="packagemesin"
                                                                style="text-transform: uppercase;">
                                                            </select>
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label">Qty</label>
                                                            <input type="number" name="packageqty" class="form-control" placeholder="Qty..." value="1" id="QtyPackage" onblur="setSubTotalPackage()">
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label">Satuan</label>
                                                            <input type="text" name="packagesatuan" class="form-control" placeholder="Satuan...">
                                                        </div>
                                                        <div class="mb-0 pb-0 pt-1">
                                                            <label class="form-label text-primary">Harga</label>
                                                            <input type="number" name="packagehargaSatuan" class="form-control border border-primary" placeholder="Harga Satuan Package..." id="hargaSatuPackage" onblur="setSubTotalPackage()">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="table-responsive">
                                                        <table class="table table-sm table-bordered bg-primary-lt text-nowrap text-dark border border-dark" style="text-transform: uppercase;font-weight: bold;font-size:10px;">
                                                                <tr>
                                                                    <th colspan="3" class="fw-bold text-center">Barang dalam Package</th>
                                                                </tr>
                                                                <tr class="fw-bold text-center">
                                                                    <th>Kodeseri</th>
                                                                    <th>Nama</th>
                                                                    <th>Qty</th>
                                                                </tr>
                                                        ';
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('permintaanitm')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    echo '
                                                            <tr>
                                                                <input type="hidden" name="packagekodeseri[]" value="' . $u->kodeseri . '">
                                                                <td class="text-center">' . $u->kodeseri . '</td>
                                                                <td>' . $u->namaBarang . ' ' . $u->keterangan . ' ' . $u->katalog . ' ' . $u->part . '</td>
                                                                <td class="text-center">' . $u->qtyacc . ' ' . $u->satuan . '</td>
                                                            </tr>
                        ';
                }
            }
            echo '                                          
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Catatan</label>
                                <textarea class="form-control shadow border border-blue" rows="8" name="keteranganform" placeholder="Masukkan Catatan Tambahan..."></textarea>
                            </div>
                            <div class="col">
                                <div class="card bg-green-lt text-dark transparent-card card-xl shadow rounded border border-green pembelianItems">
                                    <div class="card-header pb-0 pt-1">
                                        <h5 class="card-title">Pembayaran</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="text-nowrap" width="100%">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td colspan="2">:</td>
                                                <td><input type="text" class="form-control border border-blue" id="subtotalcheck" name="subtotalcheck" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Diskon</td>
                                                <td>:</td>
                                                <td style="width:110px">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control border border-blue" value="0" min="0" onblur="getDiskonsub()" id="subdiskon" name="subdiskon">
                                                        <span class="input-group-text border border-blue">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-percentage"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M6 18l12 -12" /></svg>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="subHasildiskon" name="subHasildiskon"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="totalSub" name="totalSub"></td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td>:</td>
                                                <td colspan="1" style="width:80px">
                                                    <input type="number" class="form-control border border-blue" value="0" min="0" id="percentageppn" name="percentageppn">
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="totalppn" name="totalppn"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon" aria-label="Button" onclick="getTotalPembelian()">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calculator"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M8 14l0 .01" /><path d="M12 14l0 .01" /><path d="M16 14l0 .01" /><path d="M8 17l0 .01" /><path d="M12 17l0 .01" /><path d="M16 17l0 .01" /></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><hr></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembelian</td>
                                                <td>:</td>
                                                <td colspan="2"><input type="text" value="0" class="form-control border border-blue" id="totalPembelian" name="totalPembelian"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card bg-cyan-lt text-dark transparent-card card-xl shadow rounded border border-green packagesItems" style="display:none">
                                    <div class="card-header pb-0 pt-1">
                                        <h5 class="card-title">Pembayaran Package</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="text-nowrap" width="100%">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td colspan="2">:</td>
                                                <td><input type="text" class="form-control border border-blue" id="package-subtotalcheck" name="packagesubtotalcheck" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Diskon</td>
                                                <td>:</td>
                                                <td style="width:110px">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control border border-blue" value="0" min="0" onblur="getDiskonsubPackage()" id="package-subdiskon" name="packagesubdiskon">
                                                        <span class="input-group-text border border-blue">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-percentage"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M6 18l12 -12" /></svg>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="package-subHasildiskon" name="packagesubHasildiskon"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="package-totalSub" name="packagetotalSub"></td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td>:</td>
                                                <td colspan="1" style="width:80px">
                                                    <input type="number" class="form-control border border-blue" value="0" min="0" id="package-percentageppn" name="packagepercentageppn" onblur="getppnPackage()">
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="package-totalppn" name="packagetotalppn"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon" aria-label="Button" onclick="getTotalPembelianPackage()">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calculator"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M8 14l0 .01" /><path d="M12 14l0 .01" /><path d="M16 14l0 .01" /><path d="M8 17l0 .01" /><path d="M12 17l0 .01" /><path d="M16 17l0 .01" /></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><hr></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembelian</td>
                                                <td>:</td>
                                                <td colspan="2"><input type="text" value="0" class="form-control border border-blue" id="package-totalPembelian" name="packagetotalPembelian"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';
            echo '      </div>';
        }
    }

    public function checkServis(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $uang = DB::table("uang")->get();
            $pajak = DB::table("pajak")->get();

            $noform = DB::table("pembelian")->max('noform');
            $noform++;

            $nofaktur = DB::table("pembelianitm")->where('nofaktur', 'LIKE', '%P-INVN-%')->max('nofaktur');
            $y = substr($nofaktur, 7, 2);
            if (date('y') == $y) {
                $noUrut2 = substr($nofaktur, 10, 7);
                $na = $noUrut2 + 1;
                $NOPO = "P-INVN-" . $y . "-" . sprintf("%07s", $na);
            } else {
                $NOPO = "P-INVN-" . date('y') . "-" . "0000001";
            }
            $jml = count($request->id);
            echo '
                    <div class="row mb-3">
                        <div class="col-lg-5 col-md-12">
                            <div class="card bg-orange-lt text-dark transparent-card card-xl shadow rounded border border-blue">
                                <div class="card-header pb-0 pt-1">
                                    <h5 class="card-title">Data Formulir</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal Faktur</label>
                                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">No. PO / Faktur</label>
                                                <input type="text" name="nopo" class="form-control" value="' . $NOPO . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">No. Form</label>
                                                <input type="text" class="form-control bg-secondary-lt cursor-not-allowed" disabled value="' . $noform . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Mata Uang</label>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <select class="form-select" name="uang" id="uangcheck">
                                                            <option value="">-- Pilih --</option>
                                                        ';
            foreach ($uang as $key) {
                echo '                                      <option value="' . $key->inisial . '" data-kursuang="' . $key->kurs . '">' . $key->inisial . ' - ' . $key->negara . '</option>';
            }
            echo '                                      </select>
                                                        <script>
                                                            $("#uangcheck").on("change", function() {
                                                                const kurs = $("#uangcheck option:selected").data("kursuang");
                                                                $("[name=kurs]").val(kurs);
                                                            });
                                    
                                                            function jumlahitem(id) {
                                                                var txt1 = document.getElementById("qty-" + id).value;
                                                                var txt2 = document.getElementById("harga-" + id).value;
                                                                var result = parseFloat(txt1) * parseFloat(txt2);
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalitem-" + id).value = result;
                                                                    document.getElementById("txttotalitem-" + id).innerText = result;
                                                                }
                                                            }

                                                            function formatRibuan(angka){
                                                                var number_string = angka.toString().replace(/[^,\d]/g, ""),
                                                                split           = number_string.split("."),
                                                                sisa            = split[0].length % 3,
                                                                angka_hasil     = split[0].substr(0, sisa),
                                                                ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
                                                                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                                                                if(ribuan){
                                                                    separator = sisa ? "." : "";
                                                                    angka_hasil += separator + ribuan.join(".");
                                                                }
                                                                angka_hasil = split[1] != undefined ? angka_hasil + "," + split[1] : angka_hasil;
                                                                return angka_hasil;
                                                            }

                                                            function getPajak(id) {
                                                                const pajak = $("#pajak-"+id+" option:selected").data("nm");
                                                                var jml = document.getElementById("totalitem-" + id).value;
                                                                if (!isNaN(pajak)) {
                                                                    document.getElementById("inisialpajak-" + id).value = pajak;
                                                                } else {
                                                                    document.getElementById("inisialpajak-" + id).value = "0";
                                                                }
                                                                var result = (parseFloat(jml) * parseFloat(pajak)) / 100;
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("itempajak-" + id).value = result;
                                                                    document.getElementById("txtitempajak-" + id).innerText = result;

                                                                    document.getElementById("totalitem-" + id).value = document.getElementById("totalitem-" + id).value + result;
                                                                    document.getElementById("txttotalitem-" + id).innerText = document.getElementById("txttotalitem-" + id).value + result;

                                                                } else {
                                                                    document.getElementById("itempajak-" + id).value = "0";
                                                                    document.getElementById("txtitempajak-" + id).innerText = "0";
                                                                }
                                                            }

                                                            function getTotalitem(id){
                                                                var txt1 = document.getElementById("qty-" + id).value;
                                                                var txt2 = document.getElementById("harga-" + id).value;
                                                                var result = parseFloat(txt1) * parseFloat(txt2);
                                                                var hasilAngka = formatRibuan(result);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalitem-" + id).value = result;
                                                                    document.getElementById("txttotalitem-" + id).innerText = result;
                                                                }
                                                                    
                                                                var arr = document.getElementsByName("totalitem[]");
                                                                var tot = 0;
                                                                for (var i = 0; i < arr.length; i++) {
                                                                    if (parseFloat(arr[i].value))
                                                                        tot += parseFloat(arr[i].value);
                                                                }
                                                                document.getElementById("subtotalcheckservis").value = tot;

                                                                var txt1 = document.getElementById("subtotalcheckservis").value;
                                                                var txt2 = document.getElementById("subdiskonservis").value;
                                                                
                                                                var resDiskon = (parseFloat(txt1) * parseFloat(txt2)) / 100;
                                                                document.getElementById("subHasildiskonservis").value = resDiskon;
                                                                
                                                                var txt3 = document.getElementById("subHasildiskonservis").value;

                                                                var result = parseFloat(txt1) - parseFloat(txt3);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalSubServis").value = result;
                                                                    document.getElementById("totalPembelianservis").value = result;
                                                                }
                                                            }

                                                            function getDiskonsub() {
                                                                var txt1 = document.getElementById("subtotalcheckservis").value;
                                                                var txt2 = document.getElementById("subdiskonservis").value;
                                                                
                                                                var resDiskon = (parseFloat(txt1) * parseFloat(txt2)) / 100;
                                                                document.getElementById("subHasildiskonservis").value = resDiskon;
                                                                
                                                                var txt3 = document.getElementById("subHasildiskonservis").value;

                                                                var result = parseFloat(txt1) - parseFloat(txt3);
                                                                if (!isNaN(result)) {
                                                                    document.getElementById("totalSubServis").value = result;
                                                                }
                                                            }

                                                            function getppn() {
                                                                var txt1 = document.getElementById("totalSubServis").value;
                                                                var txt2 = document.getElementById("percentageppnservis").value;
                                                                
                                                                var result = (parseFloat(txt1) * parseFloat(txt2))/100;
                                                                var resTot = parseFloat(txt1) + parseFloat(result);
                                                                document.getElementById("totalppn").value = result;
                                                                document.getElementById("totalPembelianservis").value = resTot;
                                                            }

                                                            function setPPN(params){
                                                                var pjk = document.getElementsByName("itempajak[]");
                                                                var ini = document.getElementById("inisialpajak-"+params).value;
                                                                var tot = 0;
                                                                for (var i = 0; i < pjk.length; i++) {
                                                                    if (parseFloat(pjk[i].value))
                                                                        tot += parseFloat(pjk[i].value);
                                                                }
                                                                document.getElementById("totalppnservis").value = tot;
                                                                document.getElementById("percentageppnservis").value = ini;
                                                            }

                                                            function getTotalPembelian() {
                                                                var txt1 = document.getElementById("totalSubServis").value;
                                                                var txt2 = document.getElementById("totalppn").value;
                                                                
                                                                var result = parseFloat(txt1) + parseFloat(txt2);
                                                                document.getElementById("totalPembelianservis").value = result;
                                                            }
                                                        </script>
                                                    </div>
                                                    <div class="col">
                                                        <input name="kurs" type="number" class="form-control" placeholder="Kurs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                        </div>
                    </div>
                    <div class="space-y">
                        <div class="table-responsive shadow">
                            <table class="table table-sm table-bordered text-nowrap text-dark transparent-card card-xl rounded border border-dark" style="text-transform: uppercase;font-weight: bold;font-size:10px;">
                                <thead class="bg-purple-lt text-dark">
                                    <tr>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Tanggal</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Kodeseri</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Barang</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Deskripsi</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Qty</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Mesin</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Pemesan</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Supplier</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Harga Satuan</td>
                                        <td class="text-center" style="padding-top:15px;padding-bottom:15px" rowspan="2" colspan="2">Pajak</td>
                                        <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Total</td>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                        ';
            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('servisitm')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    if ($u->urgent == 1) {
                        $stturgent = '<span class="badge bg-red ms-auto badge-blink"></span> ';
                    } else {
                        $stturgent = '';
                    }
                    echo '
                                    <tr>
                                        <input type="hidden" name="kodeseri[]" value="' . $u->kodeseri_servis . '">
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px;width:75px">' . Carbon::parse($u->tgl_servis)->format('d/m/Y') . '</td>
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px;width:75px">' . $u->kodeseri_servis . '</td>
                                        <td style="padding-top:10px;padding-bottom:10px">' . $stturgent . $u->namaBarang . ' </td>
                                        <td style="padding-top:10px;padding-bottom:10px">' . $u->keterangan . '</td>
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->qty . ' ' . $u->satuan . '</td>
                                        <input type="hidden" name="qty[]" id="qty-' . $u->kodeseri_servis . '" value="' . $u->qty . '">
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->mesin . '</td>
                                        <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->pemesan . '</td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:100px"><input class="form-control form-control-sm" type="text" name="supplier[]" id="supplier-' . $u->kodeseri_servis . '" value="' . $u->supplier . '" required></td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:100px"><input class="form-control form-control-sm" type="number" name="harga[]" id="harga-' . $u->kodeseri_servis . '" onblur="jumlahitem(`' . $u->kodeseri_servis . '`);getPajak(`' . $u->kodeseri_servis . '`);getTotalitem(`' . $u->kodeseri_servis . '`)" onkeyup="jumlahitem(`' . $u->kodeseri_servis . '`);getPajak(`' . $u->kodeseri_servis . '`);getTotalitem(`' . $u->kodeseri_servis . '`)" min="0" style="text-align:center;" required></td>
                                        <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px;width:75px">
                                            <select class="form-control form-control-sm" name="pajak[]" id="pajak-' . $u->kodeseri_servis . '" onblur="getPajak(`' . $u->kodeseri_servis . '`);getTotalitem(`' . $u->kodeseri_servis . '`);setPPN(`' . $u->kodeseri_servis . '`);">
                                                <option value="0">-</option>
                            ';
                    foreach ($pajak as $p) {
                        echo '                  <option value="' . $p->tax_code . '" data-nm="' . $p->rate . '">' . $p->tax_code . ' ( ' . $p->rate . ' % )</option>';
                    }
                    echo '                  </select>
                                        </td>
                                        <input type="hidden" id="inisialpajak-' . $u->kodeseri_servis . '" name="inisialpajak[]">
                                        <td class="text-center text-blue bg-secondary-lt cursor-not-allowed" style="width:10px;padding-right:10px;padding-left:10px;padding-top:10px;padding-bottom:1px">
                                            <i id="txtitempajak-' . $u->kodeseri_servis . '"></i>
                                            <input type="hidden" id="itempajak-' . $u->kodeseri_servis . '" name="itempajak[]" value="0">
                                        </td>
                                        <td class="text-center text-blue bg-secondary-lt cursor-not-allowed" style="width:10px;padding-right:10px;padding-left:10px;padding-top:10px;padding-bottom:1px">
                                            <i id="txttotalitem-' . $u->kodeseri_servis . '"></i>
                                            <input type="hidden" id="totalitem-' . $u->kodeseri_servis . '" name="totalitem[]">
                                        </td>
                                    </tr>
                                ';
                }
            }
            echo '      
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Catatan</label>
                                <textarea class="form-control shadow border border-blue" rows="8" name="keteranganform" placeholder="Masukkan Catatan Tambahan..."></textarea>
                            </div>
                            <div class="col">
                                <div class="card bg-green-lt text-dark transparent-card card-xl shadow rounded border border-green">
                                    <div class="card-header pb-0 pt-1">
                                        <h5 class="card-title">Pembayaran</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="text-nowrap" width="100%">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td colspan="2">:</td>
                                                <td><input type="text" class="form-control border border-blue" id="subtotalcheckservis" name="subtotalcheck" value="0"></td>
                                            </tr>
                                            <tr>
                                                <td>Diskon</td>
                                                <td>:</td>
                                                <td style="width:110px">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control border border-blue" value="0" min="0" onblur="getDiskonsub()" id="subdiskonservis" name="subdiskon">
                                                        <span class="input-group-text border border-blue">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-percentage"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M7 7m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M6 18l12 -12" /></svg>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="subHasildiskonservis" name="subHasildiskon"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="totalSubServis" name="totalSub"></td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td>:</td>
                                                <td colspan="1" style="width:80px">
                                                    <input type="number" class="form-control border border-blue" value="0" min="0" id="percentageppnservis" name="percentageppn" onblur="getppn()">
                                                </td>
                                                <td><input type="text" class="form-control border border-blue" value="0" id="totalppnservis" name="totalppn"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon" aria-label="Button" onclick="getTotalPembelian()">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calculator"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M8 14l0 .01" /><path d="M12 14l0 .01" /><path d="M16 14l0 .01" /><path d="M8 17l0 .01" /><path d="M12 17l0 .01" /><path d="M16 17l0 .01" /></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><hr></td>
                                            </tr>
                                            <tr>
                                                <td>Total Pembelian</td>
                                                <td>:</td>
                                                <td colspan="2"><input type="text" value="0" class="form-control border border-blue" id="totalPembelianservis" name="totalPembelian"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                ';
            echo '      </div>';
        }
    }

    public function storePembelian(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
                'supplier' => 'required',
                'pembeli' => 'required',
                'nopo' => 'required',
                'uang' => 'required',
            ],
        );

        if ($request->package == '1') {
            $g = DB::table('permintaanitm')->where('kodeseri', '=', $request->packagekodeseri[0])->first();
            $h = DB::table('permintaan')->where('noform', '=', $g->noform)->first();
            // buat barang baru di permintaan dari inputan package
            // Initiate noform permintaan
            // ======================================================
            // ======================================================
            // ====== PERMINTAAN BARU AWAL
            // ======================================================
            // ======================================================
            $noformPermintaan = DB::table('permintaan')->latest('noform')->first();
            $y = substr($noformPermintaan->noform, 0, 2);
            if (date('y') == $y) {
                $query = DB::table('permintaan')->where('noform', 'like', $y . '%')->orderBy('noform', 'desc')->first();
                $noUrut = (int) substr($query->noform, -5);
                $noUrut++;
                $char = date('y-');
                $noformPermintaanBaru = $char . sprintf("%05s", $noUrut);
            } else {
                $noformPermintaanBaru = date('y-') . "00001";
            }
            // Initiate kodeseri
            $kodeseriBaru = DB::table("permintaanitm")->max('kodeseri');
            $kodeseriBaru++;

            DB::table('permintaan')->insert([
                'remember_token'    => $request->_token,
                'tanggal'           => $request->tgl,
                'noform'            => $noformPermintaanBaru,
                'kabag'             => $h->kabag,
                'keteranganform'    => $request->keteranganform,
                'DIBUAT'            => Auth::user()->name,
                'created_at'        => date('Y-m-d H:i:s'),
            ]);
            DB::table('permintaanitm')->insert([
                'remember_token'    => $request->_token,
                'jenis' => 'Lain',
                'tgl' => $request->tgl,
                'kodeseri' => $kodeseriBaru,
                'noform' => $noformPermintaanBaru,
                'kodeproduk' => '8',
                'namaBarang' => strtoupper($request->packagenamaBarang),
                'keterangan' => strtoupper($request->packagedeskripsi),
                'katalog' => strtoupper($request->packagekatalog),
                'part' => strtoupper($request->packagepart),
                'mesin' => strtoupper($request->packagemesin),
                'qty' => $request->packageqty,
                'qtyacc' => $request->packageqty,
                'satuan' => strtoupper($request->packagesatuan),
                'pemesan' => $g->pemesan,
                'unit' => $g->unit,
                'peruntukan' => $g->peruntukan,
                'qty_sample' => '0',
                'proses_email' => '0',
                'proses_po' => '0',
                'partial' => '0',
                'urgent' => '0',
                'status' => "DIBELI",
                'dibuat' => Auth::user()->name,
                'dibeli' => $request->dibeli,
                'pembeli' => $g->pembeli,
                'acc' => $g->acc,
                'package' => '1',
                'statusACC' => $g->statusACC,
                'tgl_qty_acc' => date('Y-m-d'),
                'tgl_acc' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // input barang
            DB::table('barang')->insert([
                'jenis' => 'Lain',
                'kodeseri' => $kodeseriBaru,
                'form_permintaan' => $noformPermintaanBaru,
                'kodeproduk' => '8',
                'namaBarang' => $request->packagenamaBarang,
                'keterangan' => $request->packagedeskripsi,
                'katalog' => $request->packagekatalog,
                'part' => $request->packagepart,
                'mesin' => $request->packagemesin,
                'satuan' => $request->packagesatuan,
                'qty_permintaan' => $request->packageqty,
                'qty_acc' => $request->packageqty,
                "qty_beli" => $request->packageqty,
                'dibeli' => $request->dibeli,
                'status' => 'DIBELI',
                'no_faktur' => $request->nopo,
                'harga_satuan' => $request->packagehargaSatuan,
                'pajak' => $request->packagetotalppn,
                'harga_jumlah' => $request->packagetotalPembelian,
                'supplier' => $request->supplier,

                'pemesan' => $g->pemesan,
                'unit' => $g->unit,
                'peruntukan' => $g->peruntukan,
                'pembeli' => $g->pembeli,
                'estimasi_harga' => '0',
                'tgl_permintaan' => date('Y-m-d'),
                'tgl_qty_acc' => date('Y-m-d'),
                'tgl_acc' => date('Y-m-d'),
                'tgl_pembelian' => date('Y-m-d'),
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // ======================================================
            // ======================================================
            // ====== PERMINTAAN BARU AKHIR
            // ======================================================
            // ======================================================

            // ======================================================
            // ======================================================
            // ====== PEMBELIAN BARU AWAL
            // ======================================================
            // ======================================================
            // Initiate Noform Pembelian
            $noformpembelian = DB::table("pembelian")->max('noform');
            $noformpembelian++;
            // input Pembelian
            $check = DB::table('pembelian')->insert([
                'nofkt' => $request->nopo,
                'noform' => $noformpembelian,
                'tgl' => $request->tgl,
                'kurs' => $request->kurs,
                'currid' => $request->uang,
                'penjual' => $request->supplier,
                'pembeli' => $request->dibeli,
                'alamat' => $request->alamatcheck,
                'kirim' => $request->kirimcheck,

                'pajak' => $request->packagetotalppn,
                'subtotal' => $request->packagesubtotalcheck,
                'diskon' => $request->packagesubdiskon,
                'diskonint' => $request->packagesubHasildiskon,
                'catatan' => $request->keteranganform,
                'grandtotal' => $request->packagetotalPembelian,
                'thasil' => $request->packagetotalSub,
                'totppn' => $request->packagetotalppn,

                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // input pembelian items
            DB::table('pembelianitm')->insert([
                "noform" => $noformpembelian,
                "nofaktur" => $request->nopo,
                "kode" => $kodeseriBaru,
                "namabarang" => $request->packagenamaBarang,
                "kts" => $request->packageqty,
                "satuan" => $request->packagesatuan,
                "harga" => $request->packagehargaSatuan,
                "pajak" => $request->packagetotalppn,
                "nmpajak" => $request->packagepercentageppn,
                "pj" => $request->packagepercentageppn,
                "jumlah" => $request->packagetotalPembelian,
                "supplier" => $request->supplier,
                // "estimasi" => $request->estimasi[$i],
                // "estimasi_tgl" => date('Y-m-d', strtotime($request->estimasi[$i] . " days")),
                // "garansi" => $request->garansi[$i],
                // "garansi_tgl" => '',
                // "parsial" => '',
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // ======================================================
            // ======================================================
            // ====== PEMBELIAN BARU AKHIR
            // ======================================================
            // ======================================================

            $jml_mbl = count($request->packagekodeseri);
            for ($i = 0; $i < $jml_mbl; $i++) {
                $getbarang = DB::table('permintaanitm')->where('kodeseri', '=', $request->packagekodeseri[$i])->first();
                DB::table('permintaanitm')
                    ->where('kodeseri', $request->packagekodeseri[$i])
                    ->update([
                        'dibeli' => $request->dibeli,
                        'qtyterima' => '0',
                        'qtyakhir' => '0',
                        'qtyselisih' => '0',
                        "kd_package" => $kodeseriBaru,
                        'status' => 'MASUK PACKAGE',
                        'tgl_terima' => date('Y-m-d'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
            }
        } else {
            // Initiate Noform
            $noform = DB::table("pembelian")->max('noform');
            $noform++;
            // input Pembelian
            $check = DB::table('pembelian')->insert([
                'nofkt' => $request->nopo,
                'noform' => $noform,
                'tgl' => $request->tgl,
                'kurs' => $request->kurs,
                'currid' => $request->uang,
                'penjual' => $request->supplier,
                'pembeli' => $request->dibeli,
                'alamat' => $request->alamatcheck,
                'kirim' => $request->kirimcheck,
                'pajak' => $request->totalppn,
                'subtotal' => $request->subtotalcheck,
                'diskon' => $request->subdiskon,
                'diskonint' => $request->subHasildiskon,
                'catatan' => $request->keteranganform,
                'grandtotal' => $request->totalPembelian,
                'thasil' => $request->totalSub,
                'totppn' => $request->totalppn,
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $jml_mbl = count($request->kodeseri);
            for ($i = 0; $i < $jml_mbl; $i++) {
                $getbarang = DB::table('permintaanitm')->where('kodeseri', '=', $request->kodeseri[$i])->first();
                // input pembelian items
                DB::table('pembelianitm')->insert([
                    "noform" => $noform,
                    "nofaktur" => $request->nopo,
                    "kode" => $getbarang->kodeseri,
                    "namabarang" => $getbarang->namaBarang,
                    "kts" => $request->qtybeli[$i],
                    "satuan" => $getbarang->satuan,
                    "harga" => $request->harga[$i],
                    "pajak" => $request->inisialpajak[$i],
                    "nmpajak" => $request->itempajak[$i],
                    "pj" => $request->itempajak[$i],
                    "jumlah" => $request->totalitem[$i],
                    "supplier" => $request->supplier,
                    "estimasi" => $request->estimasi[$i],
                    "estimasi_tgl" => date('Y-m-d', strtotime($request->estimasi[$i] . " days")),
                    "garansi" => $request->garansi[$i],
                    // "garansi_tgl" => '',
                    // "parsial" => '',
                    // "non" => '',
                    'dibuat' => Auth::user()->name,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                // Jika Qty Beli lebih besar sama dengan permintaan maka akan normal
                // tetapi jika qty beli lebih kecil, maka akan partial dan
                // akan buat kodeseri baru di permintaan
                if ($request->qtypermintaan[$i] <= $request->qtybeli[$i]) {
                    DB::table('permintaanitm')
                        ->where('kodeseri', $request->kodeseri[$i])
                        ->update([
                            'dibeli' => $request->dibeli,
                            'status' => 'DIBELI',
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                    // input barang
                    DB::table('barang')->insert([
                        'jenis' => $getbarang->jenis,
                        'kodeseri' => $getbarang->kodeseri,
                        'form_permintaan' => $getbarang->noform,
                        'kodeproduk' => $getbarang->kodeproduk,
                        'namaBarang' => $getbarang->namaBarang,
                        'keterangan' => $getbarang->keterangan,
                        'katalog' => $getbarang->katalog,
                        'part' => $getbarang->part,
                        'mesin' => $getbarang->mesin,
                        'satuan' => $getbarang->satuan,
                        'qty_permintaan' => $getbarang->qty,
                        'qty_acc' => $getbarang->qtyacc,
                        "qty_beli" => $request->qtybeli[$i],
                        'pemesan' => $getbarang->pemesan,
                        'unit' => $getbarang->unit,
                        'peruntukan' => $getbarang->peruntukan,
                        'pembeli' => $getbarang->pembeli,
                        'dibeli' => $request->dibeli,
                        'status' => 'DIBELI',
                        'urgent' => $getbarang->urgent,
                        'no_faktur' => $request->nopo,
                        'estimasi_harga' => $getbarang->estimasiharga,
                        'harga_satuan' => $request->harga[$i],
                        'pajak' => $request->itempajak[$i],
                        'harga_jumlah' => $request->totalitem[$i],
                        'supplier' => $request->supplier,
                        'garansi' => $request->garansi[$i],
                        // 'tgl_garansi' => '',
                        'tgl_permintaan' => $getbarang->tgl,
                        'tgl_qty_acc' => $getbarang->tgl_qty_acc,
                        'tgl_acc' => $getbarang->tgl_acc,
                        'tgl_pembelian' => $request->tgl,
                        'proses_email' => $request->proses_email,
                        'proses_po' => $request->proses_po,
                        'dibuat' => Auth::user()->name,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                } else {
                    $getItem = DB::table('permintaanitm')->where('kodeseri', '=', $request->kodeseri[$i])->first();
                    $latestKodeseri = DB::table('permintaanitm')->latest('kodeseri')->first();
                    $newKodeseri = $latestKodeseri->kodeseri + 1;
                    $newQty = $request->qtypermintaan[$i] - $request->qtybeli[$i];
                    // update qty dan status permintaan lama
                    DB::table('permintaanitm')
                        ->where('kodeseri', $request->kodeseri[$i])
                        ->update([
                            'qty' => $request->qtybeli[$i],
                            'qtyacc' => $request->qtybeli[$i],
                            'dibeli' => $request->dibeli,
                            'status' => 'DIBELI',
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);

                    DB::table('permintaanitm')->insert([
                        'jenis' => $getItem->jenis,
                        'tgl' => $getItem->tgl,
                        'kodeseri' => $newKodeseri,
                        'noform' => $getItem->noform,
                        'kodeproduk' => $getItem->kodeproduk,
                        'namaBarang' => $getItem->namaBarang,
                        'keterangan' => $getItem->keterangan,
                        'katalog' => $getItem->katalog,
                        'part' => $getItem->part,
                        'mesin' => $getItem->mesin,
                        'qty' => $newQty,
                        'satuan' => $getItem->satuan,
                        'pemesan' => $getItem->pemesan,
                        'unit' => $getItem->unit,
                        'peruntukan' => $getItem->peruntukan,
                        'dibeli' => $getItem->dibeli,
                        'acc' => $getItem->acc,
                        'qtyterima' => $getItem->qtyterima,
                        'qtyacc' => $newQty,
                        'qtyakhir' => $getItem->qtyakhir,
                        'qtyselisih' => $getItem->qtyselisih,
                        'pembeli' => $getItem->pembeli,
                        'status' => 'PROSES PEMBELIAN',
                        'urgent' => $getItem->urgent,
                        'nsupp' => $getItem->nsupp,
                        'partial' => 1,
                        'qtypenerimaan_partial' => $getItem->qtypenerimaan_partial,
                        'kodeseri_partial' => $request->kodeseri[$i],
                        'estimasiharga' => $getItem->estimasiharga,
                        'statusACC' => $getItem->statusACC,
                        'keteranganACC' => $getItem->keteranganACC,
                        'qty_sample' => $getItem->qty_sample,
                        'file_sample' => $getItem->file_sample,
                        'tgl_qty_acc' => $getItem->tgl_qty_acc,
                        'tgl_acc' => $getItem->tgl_acc,
                        'proses_email' => $getItem->proses_email,
                        'proses_po' => $getItem->proses_po,
                        'dibuat' => $getItem->dibuat,
                        'edited' => $getItem->edited,
                        'remember_token' => $getItem->remember_token,
                        'created_at' => $getItem->created_at,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                    // input barang
                    DB::table('barang')->insert([
                        'jenis' => $getbarang->jenis,
                        'kodeseri' => $getbarang->kodeseri,
                        'form_permintaan' => $getbarang->noform,
                        'kodeproduk' => $getbarang->kodeproduk,
                        'namaBarang' => $getbarang->namaBarang,
                        'keterangan' => $getbarang->keterangan,
                        'katalog' => $getbarang->katalog,
                        'part' => $getbarang->part,
                        'mesin' => $getbarang->mesin,
                        'satuan' => $getbarang->satuan,
                        'qty_permintaan' => $getbarang->qty,
                        'qty_acc' => $newQty,
                        'pemesan' => $getbarang->pemesan,
                        'unit' => $getbarang->unit,
                        'peruntukan' => $getbarang->peruntukan,
                        'pembeli' => $getbarang->pembeli,
                        'dibeli' => $request->dibeli,
                        'status' => 'DIBELI',
                        'urgent' => $getbarang->urgent,
                        'no_faktur' => $request->nopo,
                        'estimasi_harga' => $getbarang->estimasiharga,
                        'harga_satuan' => $request->harga[$i],
                        'pajak' => $request->itempajak[$i],
                        'harga_jumlah' => $request->totalitem[$i],
                        'supplier' => $request->supplier,
                        'garansi' => $request->garansi[$i],
                        // 'tgl_garansi' => '',
                        'tgl_permintaan' => $getbarang->tgl,
                        'tgl_qty_acc' => $getbarang->tgl_qty_acc,
                        'tgl_acc' => $getbarang->tgl_acc,
                        'tgl_pembelian' => $request->tgl,
                        'proses_email' => $request->proses_email,
                        'proses_po' => $request->proses_po,
                        'dibuat' => Auth::user()->name,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $request->nopo . ' telah berhasil disimpan', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function storeServis(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
                'nopo' => 'required',
                'uang' => 'required',
            ],
        );

        // Initiate Noform
        $noform = DB::table("pembelian")->max('noform');
        $noform++;
        // input Pembelian
        $check = DB::table('pembelian')->insert([
            'nofkt' => $request->nopo,
            'noform' => $noform,
            'tgl' => $request->tgl,
            'kurs' => $request->kurs,
            'currid' => $request->uang,
            'penjual' => '',
            'pembeli' => '',
            'alamat' => '',
            'kirim' => '',
            'pajak' => $request->totalppn,
            'subtotal' => $request->subtotalcheck,
            'diskon' => $request->subdiskon,
            'diskonint' => $request->subHasildiskon,
            'catatan' => $request->keteranganform,
            'grandtotal' => $request->totalPembelian,
            'thasil' => $request->totalSub,
            'totppn' => $request->totalppn,
            'dibuat' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $jml_mbl = count($request->kodeseri);
        for ($i = 0; $i < $jml_mbl; $i++) {
            $getbarang = DB::table('servisitm')->where('kodeseri_servis', '=', $request->kodeseri[$i])->first();
            // input pembelian items
            DB::table('pembelianitm')->insert([
                "noform" => $noform,
                "nofaktur" => $request->nopo,
                "kode" => $getbarang->kodeseri_servis,
                "namabarang" => $getbarang->namaBarang,
                "kts" => $request->qty[$i],
                "satuan" => $getbarang->satuan,
                "harga" => $request->harga[$i],
                "pajak" => $request->inisialpajak[$i],
                "nmpajak" => $request->itempajak[$i],
                "pj" => $request->itempajak[$i],
                "jumlah" => $request->totalitem[$i],
                "supplier" => $request->supplier[$i],
                // "estimasi" => $request->estimasi[$i],
                // "estimasi_tgl" => date('Y-m-d', strtotime($request->estimasi[$i] . " days")),
                // "garansi" => $request->garansi[$i],
                // "garansi_tgl" => '',
                // "parsial" => '',
                // "non" => '',
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            // Jika Qty Beli lebih besar sama dengan permintaan maka akan normal
            // tetapi jika qty beli lebih kecil, maka akan partial dan
            // akan buat kodeseri baru di permintaan
            DB::table('servisitm')
                ->where('kodeseri_servis', $request->kodeseri[$i])
                ->update([
                    'status' => 'DIBAYAR',
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            // input barang
            DB::table('barang')->insert([
                'jenis' => 'Servis',
                'kodeseri' => $getbarang->kodeseri_servis,
                'form_permintaan' => $getbarang->noformservis,
                'kodeproduk' => $getbarang->kodeproduk_servis,
                'namaBarang' => $getbarang->namaBarang,
                'keterangan' => $getbarang->keterangan,
                'katalog' => $getbarang->katalog,
                'part' => $getbarang->part,
                'mesin' => $getbarang->mesin,
                'satuan' => $getbarang->satuan,
                'qty_permintaan' => $getbarang->qty,
                'qty_acc' => $getbarang->qty,
                "qty_beli" => $request->qty[$i],
                'pemesan' => $getbarang->pemesan,
                'unit' => '',
                'peruntukan' => '',
                'pembeli' => '',
                'dibeli' => $request->dibeli,
                'status' => 'DIBELI',
                'urgent' => $getbarang->urgent,
                'no_faktur' => $request->nopo,
                'harga_satuan' => $request->harga[$i],
                'pajak' => $request->itempajak[$i],
                'harga_jumlah' => $request->totalitem[$i],
                'supplier' => $request->supplier[$i],
                // 'tgl_garansi' => '',
                'tgl_permintaan' => $getbarang->tgl_servis,
                'tgl_qty_acc' => date('Y-m-d'),
                'tgl_acc' => date('Y-m-d'),
                'tgl_pembelian' => $request->tgl,
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $request->nopo . ' telah berhasil disimpan', 'status' => true);
        }
        return Response()->json($arr);
    }
}
