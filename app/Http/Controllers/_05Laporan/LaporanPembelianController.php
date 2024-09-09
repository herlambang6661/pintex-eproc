<?php

namespace App\Http\Controllers\_05Laporan;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LaporanPembelianController extends Controller
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
        return view('products.05_laporan.laporan_pembelian', [
            'active' => 'LaporanPembelian',
            'judul' => 'Laporan Pembelian',
        ]);
    }

    public function getLaporan(Request $request)
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

            $data = DB::table('pembelianitm AS pi')
                ->select(DB::raw('pe.tgl, pi.kode, pi.supplier, pi.nofaktur, pi.namabarang, pi.kts, pi.satuan, pi.jumlah, pe.pembeli, pe.currid, pe.kurs'))
                ->join('pembelian AS pe', 'pe.nofkt', '=', 'pi.nofaktur')
                ->where('pi.kode', 'not like', '%S%')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return '<i class="fa-solid fa-chevron-right"></i> ' . $m;
                })
                ->addColumn('harga_dalam', function ($row) {
                    if ($row->currid == "IDR") {
                        $m = $row->jumlah;
                    } else {
                        $m = $row->jumlah * $row->kurs;
                    }
                    return $m;
                })
                ->addColumn('harga_luar', function ($row) {
                    if ($row->currid == "IDR") {
                        $m = '';
                    } else {
                        $m = $row->jumlah;
                    }
                    return $m;
                })
                ->rawColumns(['select_orders', 'harga_luar', 'harga_dalam', 'tgl'])
                ->make(true);
        }

        return view('products.05_laporan.laporan_pembelian');
    }

    public function getServisLaporan(Request $request)
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

            $data = DB::table('pembelianitm AS pi')
                ->select(DB::raw('pe.tgl, pi.kode, pi.supplier, pi.nofaktur, pi.namabarang, pi.kts, pi.satuan, pi.jumlah, pe.pembeli, pe.currid, pe.kurs'))
                ->join('pembelian AS pe', 'pe.nofkt', '=', 'pi.nofaktur')
                ->where('pi.kode', 'like', '%S%')
                ->whereBetween('pe.tgl', [$dari, $sampai])
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl', function ($row) {
                    $m = Carbon::parse($row->tgl)->format('d/m/Y');
                    return '<i class="fa-solid fa-chevron-right"></i> ' . $m;
                })
                ->addColumn('harga_dalam', function ($row) {
                    if ($row->currid == "IDR") {
                        $m = $row->jumlah;
                    } else {
                        $m = $row->jumlah * $row->kurs;
                    }
                    return $m;
                })
                ->addColumn('harga_luar', function ($row) {
                    if ($row->currid == "IDR") {
                        $m = '';
                    } else {
                        $m = $row->jumlah;
                    }
                    return $m;
                })
                ->rawColumns(['select_orders', 'harga_luar', 'harga_dalam', 'tgl'])
                ->make(true);
        }
        return view('products.05_laporan.laporan_pembelian');
    }

    public function Mesinlaporan(Request $request)
    {
        $startDate = strval($_POST['startDate']);
        $endDate = $_POST['endDate'];

        $sumunit1 = $this->sumUnit(1, $startDate, $endDate);
        $sumunit2 = $this->sumUnit(2, $startDate, $endDate);
        $sumunit3 = $this->sumUnit(15, $startDate, $endDate);
        $sumunit4 = $this->sumUnit(88, $startDate, $endDate);
?>
        <style>
            .accordion-button {
                display: block;
            }
        </style>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item bg-blue-lt">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button collapsed text-center py-1" onclick="getMesin('unit1'); this.onclick=null;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                        <div class="d-flex justify-content-between">
                            <h3 class="my-auto">UNIT 1</h3>
                            <div class="d-flex justify-content-between">
                                <h3 class="my-auto"><?php echo number_format($sumunit1, 0, ",", "."); ?></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div id="hasil_mesin_unit1"></div>
                        <div id="tunggu_mesin_unit1"></div>
                        <span id="success-msg">
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-red-lt">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed text-center pt-1 pb-1" onclick="getMesin('unit2'); this.onclick=null;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <div class="d-flex justify-content-between">
                            <h3 class="my-auto">UNIT 2</h3>
                            <div class="d-flex justify-content-between">
                                <h3 class="my-auto"><?php echo number_format($sumunit2, 0, ",", "."); ?></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div id="hasil_mesin_unit2"></div>
                        <div id="tunggu_mesin_unit2"></div>
                        <span id="success-msg">
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-green-lt">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed text-center pt-1 pb-1" onclick="getMesin('unit3'); this.onclick=null;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        <div class="d-flex justify-content-between">
                            <h3 class="my-auto">KENDARAAN</h3>
                            <div class="d-flex justify-content-between">
                                <h3 class="my-auto text-center"><?php echo number_format($sumunit3, 0, ",", "."); ?></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div id="hasil_mesin_unit3"></div>
                        <div id="tunggu_mesin_unit3"></div>
                        <span id="success-msg">
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-yellow-lt">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed text-center pt-1 pb-1" onclick="getMesin('unit4'); this.onclick=null;" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        <div class="d-flex justify-content-between">
                            <h3 class="my-auto">UMUM</h3>
                            <div class="d-flex justify-content-between">
                                <h3 class="my-auto text-center"><?php echo number_format($sumunit4, 0, ",", "."); ?></h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div id="hasil_mesin_unit4"></div>
                        <div id="tunggu_mesin_unit4"></div>
                        <span id="success-msg">
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    private function sumUnit($unit, $awal, $akhir)
    {
        // $query = DB::table('pembelian as pb')
        //     ->select(DB::raw('SUM(p.jumlah * p.harga) as total'))
        //     ->whereBetween('pb.tgl', [$awal, $akhir])
        //     ->join('mastermesinitm as mmti', 'pti.mesin', '=', 'mmti.id_itm')
        //     ->join('mastermesin as mm', 'mmti.id_mesin', '=', 'mm.id')
        //     ->join('pembelianitm as p', 'pb.nofkt', '=', 'p.nofaktur')
        //     ->join('permintaanitm as pti', 'p.kode', '=', 'pti.kodeseri')
        //     ->where('mm.unit', $unit)
        //     ->first();

        $query = DB::table('pengambilanitm AS p')
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('mastermesin AS m', 'i.id_mesin', '=', 'm.id')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('m.unit', $unit)
            ->first();

        if ($query) {
            return $query->total;
        } else {
            return '';
        }
    }


    public function Mesinget(Request $request)
    {
        if ($request->unit == 'unit1') {
            $unit = "1";
        } elseif ($request->unit == 'unit2') {
            $unit = "2";
        } elseif ($request->unit == 'unit3') {
            $unit = "15";
        } elseif ($request->unit == 'unit4') {
            $unit = "88";
        }
        $query = DB::table('mastermesin')
            ->where('unit', $unit)
            ->orderBy("mesin", "ASC")
            ->get();
        echo '
        <div id="accordianId" role="tablist" aria-multiselectable="true">
            <div class="card my-0">';
        foreach ($query as $show) {
            echo '
                <div class="accordion-item">
                    <h2 class="accordion-header py-0" id="panelsStayOpen-heading-sub' . $show->id . '">
                        <button class="accordion-button collapsed my-0 py-1" type="button" onclick="getSubMesin(`' . $request->unit . '`, `' . $show->id . '`); this.onclick=null;" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-sub' . $show->id . '" aria-expanded="false" aria-controls="panelsStayOpen-collapse-sub' . $show->id . '">
                            <div class="d-flex justify-content-between">
                                <p class="my-auto">
                                    ' . strtoupper($show->mesin) . '
                                </p>
                                <div class="d-flex justify-content-between">
                                    <h3 class="my-auto">' . ($this->subsumUnit($show->id, $request->startDate, $request->endDate) == null ? "" : number_format($this->subsumUnit($show->id, $request->startDate, $request->endDate), 0, ",", ".")) . '</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse-sub' . $show->id . '" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading-sub' . $show->id . '">
                        <div class="accordion-body">
                            <div id="hasil_sub_mesin_' . $show->id . '"></div>
                            <div id="tunggu_sub_mesin_' . $show->id . '"></div>
                            <span id="success-msg">
                        </div>
                    </div>
                </div>';
        }
        echo '
            </div>
        </div>';
    }

    private function subsumUnit($id, $awal, $akhir)
    {

        // $query = DB::table('pembelianitm as p')
        //     ->select(DB::raw('SUM(p.jumlah * p.harga) as total'))
        //     ->join('permintaanitm as pti', 'p.kode', '=', 'pti.kodeseri')
        //     ->join('mastermesinitm as mmti', 'pti.mesin', '=', 'mmti.id_itm')
        //     ->join('mastermesin as mm', 'mmti.id_mesin', '=', 'mm.id')
        //     ->where('mm.id', $id)
        //     ->whereBetween('pti.tgl', [$awal, $akhir])
        //     ->first();

        $query = DB::table("pengambilanitm AS p")
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('i.id_mesin', $id)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->first();
        if ($query) {
            return $query->total;
        } else {
            return '';
        }
    }


    public function MesingetSub(Request $request)
    {
        if ($request->unit == 'unit1') {
            $unit = "1";
        } elseif ($request->unit == 'unit2') {
            $unit = "2";
        } elseif ($request->unit == 'unit3') {
            $unit = "15";
        } elseif ($request->unit == 'unit4') {
            $unit = "88";
        }
        $query = DB::table('mastermesinitm AS mi')
            ->join('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('me.id', $request->id)
            ->where('unit', $unit)
            ->orderBy("merk", "ASC")
            ->get();
        echo '
        <div id="accordianId" role="tablist" aria-multiselectable="true">
            <div class="card my-0">';
        foreach ($query as $show) {
            $datalapmesin = $this->loadDataLapMesin($show->id_itm, $request->startDate, $request->endDate);
            echo '
                <div class="accordion-item">
                    <h2 class="accordion-header py-0" id="panelsStayOpen-sub-heading' . $show->id_itm . '">
                        <button class="accordion-button collapsed my-0 py-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-sub-' . $show->id_itm . '" aria-expanded="false" aria-controls="panelsStayOpen-collapse-sub-' . $show->id_itm . '">
                            <div class="d-flex justify-content-between">
                                <p class="my-auto">
                                    ' . strtoupper($show->merk) . ' ' . strtoupper($show->kode_nomor) . '
                                </p>
                                <div class="d-flex justify-content-between">
                                    <h3 class="my-auto">' . number_format($this->subsubsumPerkalian($show->id_itm, $request->startDate, $request->endDate), 0, ",", ".")  . '</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" my-auto icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse-sub-' . $show->id_itm . '" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-sub-heading' . $show->id_itm . '">
                        <div class="accordion-body">';
            if (empty($datalapmesin)) {
                echo '      <center>Tidak ada data yang ditampilkan</center>';
            } else {
                echo '
                            <table class="table table-sm table-bordered bg-azure-lt">
                                <thead>
                                    <th class="text-center">Kodeseri</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Katalog</th>
                                    <th class="text-center">Part</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                </thead>
                                <tbody style="color: black">';
                foreach ($datalapmesin as $s) {
                    echo '
                                        <tr>
                                            <td class="text-center">' . $s->kodeseri . '</td>
                                            <td>' . $s->namaBarang . '</td>
                                            <td>' . $s->keterangan . '</td>
                                            <td>' . $s->katalog . '</td>
                                            <td>' . $s->part . '</td>
                                            <td class="text-center">' . $s->ambil . '</td>
                                            <td class="text-center">' . number_format($s->harga) . '</td>
                                            <td class="text-center">' . number_format(($s->ambil * $s->harga)) . '</td>
                                        </tr>';
                }
                echo '
                                </tbody>
                            </table>';
            }
            echo '
                        </div>
                    </div>
                </div>';
        }
        echo '
            </div>
        </div>';
    }

    private function subsubsumPerkalian($id, $awal, $akhir)
    {
        $query = DB::table('pengambilanitm AS p')
            ->select(DB::raw('SUM(p.jumlah * b.harga) as total'))
            ->join('mastermesinitm AS i', 'p.mesin', '=', 'i.id_itm')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->where('i.id_itm', $id)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->first();

        return $query ? $query->total : 0;
    }

    private function loadDataLapMesin($id, $awal, $akhir)
    {
        $query = DB::table('pengambilanitm AS p')
            ->select('p.kodeseri', 'a.namaBarang', 'a.keterangan', 'a.katalog', 'a.part', 'b.harga', 'p.jumlah as ambil')
            ->join('pembelianitm AS b', 'p.kodeseri', '=', 'b.kode')
            ->join('barang AS a', 'p.kodeseri', '=', 'a.kodeseri')
            ->where('p.mesin', $id)
            ->whereBetween('p.tanggal', [$awal, $akhir])
            ->orderBy("a.namaBarang", "ASC")
            ->get();

        return $query;
    }
}
