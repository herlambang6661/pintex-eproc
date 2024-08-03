<?php

namespace App\Http\Controllers\_02Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function checkPembelian(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $permintaanController = new PermintaanController();
            $uang = DB::table("uang")->get();
            $supplier = DB::table("person")->where('tipe', '=', 'ENTITAS')->orderBy('nama')->get();

            $noform = DB::table("pembelianitm")->max('noform');
            $noform++;

            $nofaktur = DB::table("pembelianitm")->max('nofaktur');
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
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="card bg-orange-lt text-dark transparent-card card-xl shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal Faktur</label>
                                                <input name="tgl" type="date" class="form-control" value="' . date("Y-m-d") .
                '">
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
                                                    <option value="PUJI NURRETI">PUJI NURRETI</option>
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
                                                <input type="text" class="form-control" value="' . $NOPO . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Mata Uang</label>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <select class="form-control" name="uang" id="uangcheck">
                                                            <option value="">-- Pilih Mata Uang --</option>
                                                        ';
            foreach ($uang as $key) {
                echo '                                      <option value="' . $key->inisial . '" data-kursuang="' . $key->kurs . '">' . $key->inisial . ' - ' . $key->negara . '</option>';
            }
            echo '                                      </select>
                                                        <script>
                                                            $("#uangcheck").on("change", function() {
                                                                const kurs = $("#uangcheck option:selected").data("kursuang");
                                                                $("[name=kurscheck]").val(kurs);
                                                            });
                                                            
                                                            $("#vendorcheck").on("change", function() {
                                                                const alamat = $("#vendorcheck option:selected").data("alamat");
                                                                $("[name=alamatcheck]").val(alamat);
                                                                $("[name=kirimcheck]").val(alamat);
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class="col">
                                                        <input name="kurscheck" type="number" class="form-control" placeholder="Kurs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="card bg-azure-lt text-dark transparent-card card-xl shadow rounded border border-blue" style="height: 250px">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Alamat</label>
                                            <textarea id="alamat1" name="alamatcheck" disabled class="form-control bg-secondary-lt border border-blue cursor-not-allowed" rows="8" placeholder="Pilih Supplier dan alamat akan terisi..."></textarea>
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
                    <hr>
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
                                    <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Qty Beli</td>
                                    <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Satuan</td>
                                    <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Harga Satuan</td>
                                    <td class="text-center" rowspan="2" style="padding-top:10px;padding-bottom:15px">Jumlah</td>
                                    <td class="text-center">Estimasi</td>
                                    <td class="text-center">Garansi</td>
                                    <td class="text-center" style="padding-top:15px;padding-bottom:15px" rowspan="2" colspan="3">Pajak</td>
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
                                <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . Carbon::parse($u->tgl)->format('d/m/Y') . '</td>
                                <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->kodeseri . '</td>
                                <td style="padding-top:10px;padding-bottom:10px">' . $stturgent . $u->namaBarang . ' </td>
                                <td style="padding-top:10px;padding-bottom:10px">' . $u->keterangan . '</td>
                                <td class="text-center" style="padding-top:10px;padding-bottom:10px">' . $u->qtyacc . '</td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number" value="' . $u->qtyacc . '"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="text" value="' . $u->satuan . '"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
                                <td class="text-center" style="padding-right:1px;padding-left:1px;padding-top:5px;padding-bottom:1px"><input class="form-control form-control-sm" type="number"></td>
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
                                    <div class="card-body">
                                        <table class="text-nowrap" width="100%">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td colspan="3">:</td>
                                                <td><input type="text" class="form-control border border-blue"></td>
                                            </tr>
                                            <tr>
                                                <td>Diskon</td>
                                                <td>:</td>
                                                <td style="width:80px"><input type="number" class="form-control border border-blue" value="0"></td>
                                                <td>%</td>
                                                <td><input type="text" class="form-control border border-blue"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="3"></td>
                                                <td><input type="text" class="form-control border border-blue"></td>
                                            </tr>
                                            <tr>
                                                <td>PPN</td>
                                                <td>:</td>
                                                <td colspan="2" style="width:80px"><input type="number" class="form-control border border-blue" value="0"></td>
                                                <td><input type="text" class="form-control border border-blue"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon" aria-label="Button">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calculator"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M8 14l0 .01" /><path d="M12 14l0 .01" /><path d="M16 14l0 .01" /><path d="M8 17l0 .01" /><path d="M12 17l0 .01" /><path d="M16 17l0 .01" /></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><hr></td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>:</td>
                                                <td colspan="3"><input type="text" class="form-control border border-blue"></td>
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
}
