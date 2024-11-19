<?php

namespace App\Http\Controllers\_02Pengadaan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PermintaanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    function permintaan()
    {
        return view('products/02_pengadaan.permintaan', [
            'active' => 'Permintaan',
            'judul' => 'Permintaan',
            // 'namaBarang' => $this->getDatalist('permintaanitm', 'jenis', 'Lain', null),
            // 'deskripsi' => $this->getDatalist('permintaanitm', null, null, 'keterangan'),
            // 'katalog' => $this->getDatalist('permintaanitm', null, null, 'katalog'),
            // 'part' => $this->getDatalist('permintaanitm', null, null, 'part'),
            // 'satuan' => $this->getDatalist('permintaanitm', null, null, 'satuan'),
            'peruntukan' => $this->getDatalist('permintaanitm', null, null, 'peruntukan'),
        ]);
    }

    public function getMesinPermintaan($id)
    {
        $m = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_mesinitm', '=', $id)->first();
        return $m->mesin . " " . $m->merk;
    }
    public function getMesinServis($id)
    {
        $m = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk', 'mi.kode_nomor')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $id)->first();
        return $m->mesin . " " . $m->merk . " " . $m->kode_nomor;
    }

    private function getDatalist($table, $var = null, $value = null, $select = null)
    {
        if ($var) {
            $get = DB::table($table)->distinct()->where($var, '=', $value)->get('namaBarang');
        } else {
            $get = DB::table($table)->distinct()->get($select);
        }
        return $get;
    }

    function getKabag(Request $request)
    {

        // $kabag = [];
        if ($request->has('q')) {
            $search = $request->q;
            $kabag = DB::table('person')
                ->where('tipe', "INDIVIDU")
                ->where('kabag', "1")
                ->where('nama', 'LIKE', "%$search%")
                ->orderBy('nama')
                ->get();
        } else {
            $kabag = DB::table('person')
                ->where('tipe', "INDIVIDU")
                ->where('kabag', "1")
                ->orderBy('nama')
                ->get();
        }
        return Response()->json($kabag);
    }

    function getMesin(Request $request)
    {

        // $mesin = [];
        if ($request->has('q')) {
            $search = $request->q;
            $mesin = DB::table('mastermesin AS me')
                ->select(DB::raw('DISTINCT(id_mesin),merk,mi.id_itm as id, mesin, id_mesinitm, unit, mi.kode_nomor'))
                ->join('mastermesinitm AS mi', 'me.id', '=', 'mi.id_mesin')
                ->where('me.mesin', 'LIKE', "%$search%")
                ->orWhere('mi.merk', 'LIKE', "%$search%")
                ->orderBy('me.mesin', 'ASC')
                ->get();
        } else {
            $mesin = DB::table('mastermesin AS me')
                ->select(DB::raw('DISTINCT(id_mesin),merk,mi.id_itm as id, mesin, id_mesinitm, unit'))
                ->join('mastermesinitm AS mi', 'me.id', '=', 'mi.id_mesin')
                ->orderBy('me.mesin', 'ASC')
                ->get();
        }
        return Response()->json($mesin);
    }

    function getMasterBarang(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('masterbarang')
                ->select(DB::raw('id_masterbarang as id, kodebarang, nama'))
                ->where('tipe', '=', "Standard")
                ->where('nama', 'LIKE', "%$search%")
                ->orWhere('kodebarang', 'LIKE', "%$search%")
                ->orderBy('nama', 'ASC')
                ->get();
        } else {
            $barang = DB::table('masterbarang')
                ->select(DB::raw('id_masterbarang as id, kodebarang, nama'))
                ->where('tipe', '=', "Standard")
                ->orderBy('nama', 'ASC')
                ->get();
        }
        return Response()->json($barang);
    }

    function getMasterLain(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('permintaanitm')
                ->where('namaBarang', 'LIKE', "%$search%")
                ->orderBy('namaBarang', 'ASC')
                ->distinct()
                ->get(['namaBarang']);
        } else {
            $barang = DB::table('permintaanitm')
                ->orderBy('namaBarang', 'ASC')
                ->distinct()
                ->get(['namaBarang']);
        }
        return Response()->json($barang);
    }

    function getMasterDeskripsi(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('permintaanitm')
                ->where('keterangan', 'LIKE', "%$search%")
                ->orderBy('keterangan', 'ASC')
                ->distinct()
                ->get(['keterangan']);
        } else {
            $barang = DB::table('permintaanitm')
                ->orderBy('keterangan', 'ASC')
                ->distinct()
                ->get(['keterangan']);
        }
        return Response()->json($barang);
    }

    function getMasterKatalog(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('permintaanitm')
                ->where('katalog', 'LIKE', "%$search%")
                ->orderBy('katalog', 'ASC')
                ->distinct()
                ->get(['katalog']);
        } else {
            $barang = DB::table('permintaanitm')
                ->orderBy('katalog', 'ASC')
                ->distinct()
                ->get(['katalog']);
        }
        return Response()->json($barang);
    }

    function getMasterPart(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('permintaanitm')
                ->where('part', 'LIKE', "%$search%")
                ->orderBy('part', 'ASC')
                ->distinct()
                ->get(['part']);
        } else {
            $barang = DB::table('permintaanitm')
                ->orderBy('part', 'ASC')
                ->distinct()
                ->get(['part']);
        }
        return Response()->json($barang);
    }

    function getMasterSatuan(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('permintaanitm')
                ->where('satuan', 'LIKE', "%$search%")
                ->orderBy('satuan', 'ASC')
                ->distinct()
                ->get(['satuan']);
        } else {
            $barang = DB::table('permintaanitm')
                ->orderBy('satuan', 'ASC')
                ->distinct()
                ->get(['satuan']);
        }
        return Response()->json($barang);
    }

    function getMasterSupplier(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $barang = DB::table('person')
                ->where('tipe', '=', "ENTITAS")
                ->where('nama', 'LIKE', "%$search%")
                ->orderBy('nama', 'ASC')
                ->get();
        } else {
            $barang = DB::table('person')
                ->where('tipe', '=', "ENTITAS")
                ->orderBy('nama', 'ASC')
                ->get();
        }
        return Response()->json($barang);
    }

    public function getMasterPemesan(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $pemesan = DB::table('person')
                ->select(DB::raw('id, nama, jabatan'))
                ->where('tipe', '=', "INDIVIDU")
                ->where('nama', 'LIKE', "%$search%")
                ->orWhere('jabatan', 'LIKE', "%$search%")
                ->orderBy('nama', 'ASC')
                ->get();
        } else {
            $pemesan = DB::table('person')
                ->select(DB::raw('id, nama, jabatan'))
                ->where('tipe', '=', "INDIVIDU")
                ->orderBy('nama', 'ASC')
                ->get();
        }
        return Response()->json($pemesan);
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /******  3c7a6a28-04d8-4d2b-8f09-4bbfd0698c3b  *******/
    function storePermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tanggal' => 'required',
                'kabag' => 'required',
            ],
        );
        /* =================================================================================================
        ====================================================================================================
        Start Initiate Noform
        ====================================================================================================
        ==================================================================================================== */
        if ($request->entitas == 'TFI') {
            $checknoform = DB::table('permintaan')
                ->where('entitas', 'TFI') //diaktifkan kalo entitasnya TFI dan perkiraan awal tahun
                ->where('noform', 'like', '%' . date('y') . '-' . '9%')
                ->latest('noform')
                ->first();
            if ($checknoform) {
                $y = substr($checknoform->noform, 0, 2);
                if (date('y') == $y) {
                    $query = DB::table('permintaan')->where('noform', 'like', '%' . date('y') . '-' . '9%')->orderBy('noform', 'desc')->first();
                    $noUrut = (int) substr($query->noform, -4);
                    $noUrut++;
                    $char = date('y-') . '9';
                    $kodeSurat = $char . sprintf("%04s", $noUrut);
                } else {
                    $kodeSurat = date('y-') . "90001";
                }
            } else {
                $kodeSurat = date('y-') . "90001";
            }
        } else {
            $checknoform = DB::table('permintaan')
                ->where('entitas', 'PINTEX') //diaktifkan kalo entitasnya PINTEX dan perkiraan awal tahun
                ->latest('noform')
                ->first();
            $y = substr($checknoform->noform, 0, 2);
            if (date('y') == $y) {
                $query = DB::table('permintaan')->where('noform', 'like', $y . '%')->orderBy('noform', 'desc')->first();
                $noUrut = (int) substr($query->noform, -5);
                $noUrut++;
                $char = date('y-');
                $kodeSurat = $char . sprintf("%05s", $noUrut);
            } else {
                $kodeSurat = date('y-') . "00001";
            }
        }
        /* =================================================================================================
        ====================================================================================================
        End Initiate Noform
        ====================================================================================================
        ==================================================================================================== */

        $jml_mbl = count($request->jenis);
        for ($i = 0; $i < $jml_mbl; $i++) {
            if ($request->entitas == 'TFI') {
                // generate kodeseri TFI
                $getkodeseri = DB::table('permintaanitm')->where('entitas', 'TFI')->where('kodeseri', 'like', '%T%')->latest('kodeseri')->first();
                if ($getkodeseri) {
                    $kdseri = $getkodeseri->kodeseri;
                    $noUrutKodeseri = (int) substr($kdseri, -6);
                    $noUrutKodeseri++;
                    $charKodeseri = 'T';
                    $kdseri = $charKodeseri . sprintf("%06s", $noUrutKodeseri);
                } else {
                    $kdseri = 'T000001';
                }
            } else {
                // generate kodeseri PINTEX
                $getkodeseri = DB::table('permintaanitm')->where('entitas', 'PINTEX')->where('kodeseri', 'not like', '%T%')->latest('kodeseri')->first();
                if ($getkodeseri) {
                    $kdseriR = $getkodeseri->kodeseri;
                    $kdseri = $kdseriR + 1;
                } else {
                    $kdseri = '100000';
                }
            }

            if (!empty($request->urgent[$i])) {
                $urgent = $request->urgent[$i];
            } else {
                $urgent = 0;
            }
            $check = DB::table('permintaanitm')->insert([
                'remember_token'    => $request->_token,
                'entitas'           => $request->entitas,
                'jenis' => $request->jenis[$i],
                'tgl' => $request->tanggal,
                'kodeseri' => $kdseri,
                'noform' => $kodeSurat,
                'kodeproduk' => $request->kodeproduk[$i],
                'namaBarang' => strtoupper($request->namaBarang[$i]),
                'keterangan' => strtoupper($request->deskripsi[$i]),
                'katalog' => strtoupper($request->katalog[$i]),
                'part' => strtoupper($request->part[$i]),
                'mesin' => strtoupper($request->mesin[$i]),
                'qty' => $request->qty[$i],
                'satuan' => strtoupper($request->satuan[$i]),
                'pemesan' => strtoupper($request->pemesan[$i]),
                'unit' => $request->unit[$i],
                'peruntukan' => $request->peruntukan[$i],
                'qty_sample' => $request->sample[$i],
                'proses_email' => '0',
                'proses_po' => '0',
                'partial' => '0',
                'urgent' => $urgent,
                'status' => "PROSES PERSETUJUAN",
                'DIBUAT' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        DB::table('permintaan')->insert([
            'entitas'           => $request->entitas,
            'remember_token'    => $request->_token,
            'tanggal'           => $request->tanggal,
            'noform'            => $kodeSurat,
            'kabag'             => $request->kabag,
            'keteranganform'    => $request->keteranganform,
            'foto'              => '',
            'DIBUAT'            => Auth::user()->name,
            'created_at'        => date('Y-m-d H:i:s'),
        ]);

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $kodeSurat . ' telah berhasil disimpan', 'status' => true);
        }
        return Response()->json($arr);
    }

    function storeAddPermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
            ],
        );

        $jml_mbl = count($request->jenis);
        for ($i = 0; $i < $jml_mbl; $i++) {
            if ($request->entitas == 'TFI') {
                // generate kodeseri TFI
                $getkodeseri = DB::table('permintaanitm')->where('kodeseri', 'like', '%T%')->orderBy('kodeseri', 'desc')->first();
                if ($getkodeseri) {
                    $kdseri = $getkodeseri->kodeseri;
                    $noUrutKodeseri = (int) substr($kdseri, -6);
                    $noUrutKodeseri++;
                    $charKodeseri = 'T';
                    $kdseri = $charKodeseri . sprintf("%06s", $noUrutKodeseri);
                } else {
                    $kdseri = 'T000001';
                }
            } else {
                // generate kodeseri PINTEX
                $getkodeseri = DB::table('permintaanitm')->where('kodeseri', 'not like', '%T%')->latest('kodeseri')->first();
                if ($getkodeseri) {
                    $kdseriR = $getkodeseri->kodeseri;
                    $kdseri = $kdseriR + 1;
                } else {
                    $kdseri = '100000';
                }
            }

            if (!empty($request->urgent[$i])) {
                $urgent = $request->urgent[$i];
            } else {
                $urgent = 0;
            }
            $check = DB::table('permintaanitm')->insert([
                'remember_token' => $request->_token,
                'entitas' => $request->addEntitas,
                'jenis' => $request->jenis[$i],
                'tgl' => $request->addTanggal,
                'kodeseri' => $kdseri,
                'noform' => $request->addNoform,
                'kodeproduk' => $request->kodeproduk[$i],
                'namaBarang' => strtoupper($request->namaBarang[$i]),
                'keterangan' => strtoupper($request->deskripsi[$i]),
                'katalog' => strtoupper($request->katalog[$i]),
                'part' => strtoupper($request->part[$i]),
                'mesin' => strtoupper($request->mesin[$i]),
                'qty' => $request->qty[$i],
                'satuan' => strtoupper($request->satuan[$i]),
                'pemesan' => strtoupper($request->pemesan[$i]),
                'unit' => $request->unit[$i],
                'peruntukan' => $request->peruntukan[$i],
                'qty_sample' => $request->sample[$i],
                'proses_email' => '0',
                'proses_po' => '0',
                'partial' => '0',
                'urgent' => $urgent,
                'status' => "PROSES PERSETUJUAN",
                'DIBUAT' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $request->addNoform . ' telah berhasil ditambahkan', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function viewPermintaan(Request $request)
    {
        $no = 1;
        $getpermintaan = DB::table('permintaan')->where('noform', '=', $request->noform)->first();
        $getpermintaanitem =  DB::table('permintaanitm AS pe')
            ->select('pe.*', 'pe.mesin as idmesin', 'me.mesin', 'mi.merk')
            ->leftJoin('mastermesinitm AS mi', 'pe.mesin', '=', 'mi.id_itm')
            ->leftJoin('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('pe.noform', '=', $request->noform)
            ->get();
        echo '
                <style>
                    .stamp {
                            transform: rotate(12deg);
                            color: #555;
                            font-size: 2rem;
                            font-weight: 600;
                            border: 0.25rem solid #555;
                            display: inline-block;
                            padding: 0.25rem 1rem;
                            text-transform: uppercase;
                            border-radius: 1rem;
                            font-family: "Courier";
                            -webkit-mask-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png");
                            -webkit-mask-size: 944px 604px;
                            mix-blend-mode: multiply;
                        }

                        .is-nope {
                            color: #D23;
                            border: 0.5rem double #D23;
                            transform: rotate(3deg);
                            -webkit-mask-position: 2rem 3rem;
                            font-size: 2rem;  
                        }

                        .is-approved {
                            color: #0A9928;
                            border: 0.5rem solid #0A9928;
                            -webkit-mask-position: 13rem 6rem;
                            transform: rotate(-14deg);
                            border-radius: 0;
                        } 

                        .is-draft {
                            color: #C4C4C4;
                            border: 1rem double #C4C4C4;
                            transform: rotate(-5deg);
                            font-size: 6rem;
                            font-family: "Open sans", Helvetica, Arial, sans-serif;
                            border-radius: 0;
                            padding: 0.5rem;
                        } 
                </style>
                
                <div class="modal-body" style="color: black;">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="' . url("/photo/icon/pintex.png") . '" class="" alt="PT. PINTEX" srcset=""
                                width="150px"><br>
                            <p style="font-size: 8px; margin-top:0px" class="text-center">
                                Jln. Raya Cirebon-Bandung Km.12 Plumbon-Cirebon<br>
                                Phone : 62-231-321366 (HUNTING) Faximile : 62-231-321389
                            </p>
                        </div>
                        <div class="col-md-8" style="margin-top: 20px">
                            <u class="text-center">
                                <h2><b>FORM PERMINTAAN BARANG</b></h2>
                            </u>
                        </div>
                    </div>
                    <hr style="margin-top: 5px;">
                    <div class="container">
                        <i>
                            <p>
                                Tanggal : ' . Carbon::parse($getpermintaan->tanggal)->format("d/m/Y") . '
                            </p>
                            <div class="row mb-2">
                                <div class="col-lg-9 col-sm-9"> No. Form : ' . $getpermintaan->noform . '</div> 
                            </div>
                        </i>
                        <table class="table table-sm table-bordered table-hover"
                            style="color: black; border-color: black;text-transform: uppercase; font-size:10px">
                            <thead class="text-black" style="border-color: black;">
                                <th style="border-color: black;" class="text-center">#</th>
                                <th style="border-color: black;" class="text-center">Kodeseri</th>
                                <th style="border-color: black;" class="text-center">Barang</th>
                                <th style="border-color: black;" class="text-center">Deskripsi</th>
                                <th style="border-color: black;" class="text-center">Katalog</th>
                                <th style="border-color: black;" class="text-center">Part</th>
                                <th style="border-color: black;" class="text-center">Mesin</th>
                                <th style="border-color: black;" class="text-center">Quantity</th>
                                <th style="border-color: black;" class="text-center">Pemesan</th>
                                <th style="border-color: black;" class="text-center">Status</th>
                            </thead>
                            <tbody class="text-black" style="border-color: black;">
                            ';
        $i = 1;
        foreach ($getpermintaanitem as $key) {
            // $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_mesinitm', '=', $key->mesin)->first();
            if ($key->status == 'PROSES PERSETUJUAN') {
                $sst = '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span>';
                $txt = '<span class="badge bg-blue"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'ACC') {
                $sst = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-purple"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'HOLD') {
                $sst = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-orange"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'REJECT') {
                $sst = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-red"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'PROSES PEMBELIAN') {
                $sst = '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-lime"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'DIBELI') {
                $sst = '<span class="status-dot status-dot-animated status-green" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-green"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'DITERIMA') {
                $sst = '<span class="status-dot status-dot-animated status-teal" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-teal"><b>' . $key->status . '</b></span>';
            } else {
                $sst = '<span class="status-dot status-dot-animated status-dark"></span>';
                $txt = ' <span class="badge bg-dark"><b>' . $key->status . '</b></span>';
            }
            echo '
                                    <tr>
                                        <td class="text-center">' . $i . '</td>
                                        <td class="text-center">' . $sst . " " . $key->kodeseri . '</td>
                                        <td class="">' . $key->namaBarang . '</td>
                                        <td class="text-center">' . $key->keterangan . '</td>
                                        <td class="text-center">' . $key->katalog . '</td>
                                        <td class="text-center">' . $key->part . '</td>
                                        <td class="text-center">' . $key->mesin . " " . $key->merk . '</td>
                                        <td class="text-center">' . $key->qty . ' ' . $key->satuan . '</td>
                                        <td class="text-center">' . $key->pemesan . '</td>
                                        <td class="text-center">' . $txt . '</td>
                                    </tr>
                                    ';
            $i++;
            if ($key->statusACC == 'ACC') {
                $status = 'approve';
            } else {
                $status = 'proposal';
            }
        }

        echo '
                            </tbody>
                        </table>
                        <i>*Note : ' . $getpermintaan->keteranganform . '</i>
                        <br><br><br>
                        <div class="row text-center">
                            <div class="col">
                                Menyetujui,
                            </div>
                            <div class="col">
                                Mengetahui,
                            </div>
                            <div class="col">
                                Dibuat,
                            </div>
                        </div>
                        <br><br><br><br><br>
                        <div class="row text-center">
                            <div class="col">
                                ( Pak Alvin / Pak Brian / Pak Jesse )
                            </div>
                            <div class="col">
                                ( ' . $getpermintaan->kabag . ' )
                            </div>
                            <div class="col">
                                ( ' . $getpermintaan->dibuat .
            ' )
                            </div>
                        </div>
                    </div>
                </div>';
        if ($status == 'approve') {
            echo '          <span class="stamp is-approved">Approved</span>';
        } elseif ($status == 'proposal') {
            echo '          <span class="stamp">requested</span>';
        }
        echo '
        ';
    }

    public function viewAddPermintaan(Request $request)
    {
        $no = 1;
        $getpermintaan = DB::table('permintaan')->where('noform', '=', $request->noform)->first();
        // $getpermintaanitem = DB::table('permintaanitm')->where('noform', '=', $request->noform)->get();
        $getpermintaanitem =  DB::table('permintaanitm AS pe')
            ->select('pe.*', 'pe.mesin as idmesin', 'me.mesin', 'mi.merk')
            ->leftJoin('mastermesinitm AS mi', 'pe.mesin', '=', 'mi.id_itm')
            ->leftJoin('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('pe.noform', '=', $request->noform)
            ->get();
        echo '
                <div class="modal-body" style="color: black;">
                        <i>
                            <p>Entitas : <input type="text" name="addEntitas" value="' . $getpermintaan->entitas . '" class="form-control-sm border-white"></p>
                            <p>
                                Tanggal : ' . Carbon::parse($getpermintaan->tanggal)->format("d/m/Y") . '
                            </p>
                            <div class="row mb-2">
                                <div class="col-lg-9 col-sm-9"> No. Form : ' . $getpermintaan->noform . '</div> 
                                <input type="hidden" name="addNoform" value="' . $getpermintaan->noform . '">
                                <input type="hidden" name="addTanggal" value="' . $getpermintaan->tanggal . '">
                            </div>
                        </i>
                        <table class="table table-sm table-bordered table-hover"
                            style="color: black; border-color: black;text-transform: uppercase; font-size:10px">
                            <thead class="text-black" style="border-color: black;">
                                <th style="border-color: black;" class="text-center">#</th>
                                <th style="border-color: black;" class="text-center">Kodeseri</th>
                                <th style="border-color: black;" class="text-center">Barang</th>
                                <th style="border-color: black;" class="text-center">Deskripsi</th>
                                <th style="border-color: black;" class="text-center">Katalog</th>
                                <th style="border-color: black;" class="text-center">Part</th>
                                <th style="border-color: black;" class="text-center">Mesin</th>
                                <th style="border-color: black;" class="text-center">Quantity</th>
                                <th style="border-color: black;" class="text-center">Pemesan</th>
                                <th style="border-color: black;" class="text-center">Status</th>
                            </thead>
                            <tbody class="text-black" style="border-color: black;">
                            ';
        $i = 1;
        foreach ($getpermintaanitem as $key) {
            // $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_mesinitm', '=', $key->mesin)->first();
            if ($key->status == 'PROSES PERSETUJUAN') {
                $sst = '<span class="status-dot status-dot-animated status-blue" style="font-size:11px"></span>';
                $txt = '<span class="badge bg-blue"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'ACC') {
                $sst = '<span class="status-dot status-dot-animated status-purple" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-purple"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'HOLD') {
                $sst = '<span class="status-dot status-dot-animated status-orange" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-orange"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'REJECT') {
                $sst = '<span class="status-dot status-dot-animated status-red" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-red"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'PROSES PEMBELIAN') {
                $sst = '<span class="status-dot status-dot-animated status-lime" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-lime"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'DIBELI') {
                $sst = '<span class="status-dot status-dot-animated status-green" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-green"><b>' . $key->status . '</b></span>';
            } elseif ($key->status == 'DITERIMA') {
                $sst = '<span class="status-dot status-dot-animated status-teal" style="font-size:11px"></span>';
                $txt = ' <span class="badge bg-teal"><b>' . $key->status . '</b></span>';
            } else {
                $sst = '<span class="status-dot status-dot-animated status-dark"></span>';
                $txt = ' <span class="badge bg-dark"><b>' . $key->status . '</b></span>';
            }
            echo '
                                    <tr>
                                        <td class="text-center">' . $i . '</td>
                                        <td class="text-center">' . $sst . " " . $key->kodeseri . '</td>
                                        <td class="">' . $key->namaBarang . '</td>
                                        <td class="text-center">' . $key->keterangan . '</td>
                                        <td class="text-center">' . $key->katalog . '</td>
                                        <td class="text-center">' . $key->part . '</td>
                                        <td class="text-center">' . $key->mesin . " " . $key->merk . '</td>
                                        <td class="text-center">' . $key->qty . ' ' . $key->satuan . '</td>
                                        <td class="text-center">' . $key->pemesan . '</td>
                                        <td class="text-center">' . $txt . '</td>
                                    </tr>
                                    ';
            $i++;
            if ($key->statusACC == 'ACC') {
                $status = 'approve';
            } else {
                $status = 'proposal';
            }
        }

        echo '
                            </tbody>
                        </table>
                        
                        <div class="control-group after-add-more">
                            <button class="btn btn-success" type="button"
                                onclick="tambahItemForm(); return false;">
                                <i class="fa-solid fa-plus" style="margin-right: 5px"></i>
                                Tambah Item
                            </button>
                        </div>
                        <br>
                        <input id="idAddForm" value="1" type="hidden">
                        <div style="overflow-x:auto;overflow-x: scroll;">
                            <div style="width: 2800px">
                                <table id="detail_add_transaksi" class="control-group text-nowrap"
                                    border="0"
                                    style="width: 100%;text-align:center;font-weight: bold;">
                                    <thead>
                                        <tr>
                                            <td
                                                style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;width: 50px">
                                            </td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Jenis</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Kodeproduk</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Nama Barang</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Deskripsi</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                katalog</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Part</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Mesin</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Qty
                                            </td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Satuan</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Pemesan</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Unit</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Peruntukan</td>
                                            <td class="bg-primary text-white" style="width: 200px">
                                                Sample</td>
                                            <th
                                                style="border-right-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;">
                                                Urgent</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
                ';
    }

    public function viewEditPermintaan(Request $request)
    {
        $getItem = DB::table('permintaanitm AS pe')
            ->select('pe.*', 'pe.mesin as idmesin', 'me.mesin', 'mi.merk')
            ->leftJoin('mastermesinitm AS mi', 'pe.mesin', '=', 'mi.id_itm')
            ->leftJoin('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('pe.id', '=', $request->id)
            ->first();
        $getForm = DB::table('permintaan')->where('noform', '=', $getItem->noform)->first();
        // $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_mesinitm', '=', $getItem->mesin)->first();

        if ($getItem->jenis == "Lain") {
            echo '
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="card bg-pink-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Entitas</label>
                                                <input type="text" class="form-control border border-blue disabled cursor-not-allowed" readonly value="' . $getItem->entitas . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Jenis</label>
                                                <input type="hidden" name="kodeseri" value="' . $getItem->kodeseri . '">
                                                <input type="text" name="jenis" id="jenis" class="form-control border border-blue disabled cursor-not-allowed" readonly value="' . $getItem->jenis . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control border border-blue" value="' . $getItem->tgl . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Kodeseri</label>
                                                <input type="text" class="form-control border border-blue disabled cursor-not-allowed" readonly value="' . $getItem->kodeseri . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Noform</label>
                                                <input type="text" class="form-control border border-blue disabled cursor-not-allowed" readonly value="' . $getItem->noform . '">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Pimpinan</label>
                                                <input type="text" class="form-control border border-blue disabled cursor-not-allowed" readonly value="' . $getForm->kabag . '">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-azure-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Nama Barang</label>
                                        <select name="nama" class="form-select elementbrglain border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->namaBarang . '" selected="selected">' . $getItem->namaBarang . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Deskripsi</label>
                                        <select name="keterangan" class="form-select elementdeskripsi border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->keterangan . '" selected="selected">' . $getItem->keterangan . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Katalog</label>
                                        <select name="katalog" class="form-select elementkatalog border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->katalog . '" selected="selected">' . $getItem->katalog . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Part</label>
                                        <select name="part" class="form-select elementpart border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->part . '" selected="selected">' . $getItem->part . '</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="card bg-orange-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Mesin</label>
                                        <select name="mesin" id="mesin" class="form-select elementmsn text-nowrap" style="text-transform: uppercase;">
                                            <option value="' . $getItem->idmesin . '" selected="selected">' . $getItem->mesin . " " . $getItem->merk . '</option> 
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Qty</label>
                                                <input name="qty" id="qty" type="number" class="form-control" value="' . $getItem->qty . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Satuan</label>
                                                <select name="satuan" class="form-select elementsatuan border-danger" style="text-transform: uppercase;">
                                                    <option value="' . $getItem->satuan . '" selected="selected">' . $getItem->satuan . '</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Pemesan</label>
                                                <select required name="pemesan" id="pemesan" class="form-select  elementprm inputNone" style="text-transform: uppercase;">
                                                    <option value="' . $getItem->pemesan . '" selected="selected">' . $getItem->pemesan . '</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <input type="text" name="unit" id="unit" class="form-control" value="' . strtoupper($getItem->unit) . '">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Peruntukan</label>
                                                <input type="text" name="peruntukan" id="peruntukan" class="form-control" value="' . strtoupper($getItem->peruntukan) . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Sample</label>
                                                <input type="number" name="sample" id="sample" class="form-control" value="' . $getItem->qty_sample . '">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        </div>

                        <div class="hr-text text-blue">Keterangan Tambahan</div>
                        <div class="control-group col-lg-12">
                            <div id="ketTamb" class="shadow rounded border border-blue">
                                <div class="mb-3">
                                    <textarea id="tinymce-edit" name="keteranganform">' . (empty($getForm->keteranganform) ? "" : $getForm->keteranganform) . '</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
        } else {
            echo '
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="card bg-pink-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Jenis</label>
                                                <input type="hidden" name="kodeseri" value="' . $getItem->kodeseri . '">
                                                <input type="text" name="jenis" id="jenis" class="form-control border border-blue disabled" readonly value="' . $getItem->jenis . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" id="tanggal" class="form-control border border-blue" value="' . $getItem->tgl . '">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-azure-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Nama Barang</label>
                                        <select name="nama" id="nama" class="form-select  elementbrg inputNone" style="text-transform: uppercase;">
                                            <option value="' . $getItem->namaBarang . '" selected="selected">' . $getItem->namaBarang . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Deskripsi</label>
                                        <select name="keterangan" class="form-select elementdeskripsi border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->keterangan . '" selected="selected">' . $getItem->keterangan . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Katalog</label>
                                        <select name="katalog" class="form-select elementkatalog border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->katalog . '" selected="selected">' . $getItem->katalog . '</option> 
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Part</label>
                                        <select name="part" class="form-select elementpart border-danger" style="text-transform: uppercase;">
                                            <option value="' . $getItem->part . '" selected="selected">' . $getItem->part . '</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-orange-lt shadow rounded border border-blue">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Mesin</label>
                                        <select name="mesin" id="mesin" class="form-select elementmsn text-nowrap" style="text-transform: uppercase;">
                                            <option value="' . $getItem->idmesin . '" selected="selected">' . $getItem->mesin . " " . $getItem->merk . '</option> 
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Qty</label>
                                                <input name="qty" id="qty" type="number" class="form-control" value="' . $getItem->qty . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Satuan</label>
                                                <select name="satuan" class="form-select elementsatuan border-danger" style="text-transform: uppercase;">
                                                    <option value="' . $getItem->satuan . '" selected="selected">' . $getItem->satuan . '</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Pemesan</label>
                                                <select required name="pemesan" id="pemesan" class="form-select  elementprm inputNone" style="text-transform: uppercase;">
                                                    <option value="' . $getItem->pemesan . '" selected="selected">' . $getItem->pemesan . '</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Unit</label>
                                                <input type="text" name="unit" id="unit" class="form-control" value="' . $getItem->unit . '">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Peruntukan</label>
                                                <input type="text" name="peruntukan" id="peruntukan" class="form-control" value="' . $getItem->peruntukan . '">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-2">
                                                <label class="form-label">Sample</label>
                                                <input type="number" name="sample" id="sample" class="form-control" value="' . $getItem->qty_sample . '">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hr-text text-blue">Keterangan Tambahan</div>
                        <div class="control-group col-lg-12">
                            <div id="ketTamb" class="shadow rounded border border-blue">
                                <div class="mb-3">
                                    <textarea id="tinymce-edit2" name="keteranganform">' . (empty($getForm->keteranganform) ? "" : $getForm->keteranganform) . '</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
        };
        if (Auth::user()->role == "pur" || Auth::user()->role == "kng" || Auth::user()->role == "own") {
            echo '
            <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-dark-lt shadow rounded border border-blue">
                            <div class="card-body">
                                <div class="mb-2">
                                    <label class="form-label">Qty Acc</label>
                                    <input type="number" name="qtyacc" id="qtyacc" class="form-control" value="' . $getItem->qtyacc . '">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Estimasi Harga</label>
                                    <input type="text" name="estimasiharga" id="estimasiharga" class="form-control" value="' . $getItem->estimasiharga . '">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Pembeli</label>
                                    <input type="text" name="pembeli" id="pembeli" class="form-control" value="' . $getItem->pembeli . '">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        echo '
                    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
                    <script type="text/javascript">
                        $(function() {
                            $(".elementbrg").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Pilih Barang",
                                ajax: {
                                    url: "/getMasterBarang",
                                    dataType: "json",
                                    delay: 200,
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.nama,
                                                    text: item.nama.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementprm").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Pilih Pemesan",
                                ajax: {
                                    url: "/getMasterPemesan",
                                    dataType: "json",
                                    delay: 200,
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.id,
                                                    text: item.nama.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementmsn").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                width: "100%",
                                placeholder: "Pilih Mesin",
                                ajax: {
                                    url: "/getMesin",
                                    dataType: "json",
                                    delay: 200,
                                    processResults: function(response) {
                                        console.log(response);
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.id,
                                                    text: item.mesin.toUpperCase() + " " + item.merk
                                                        .toUpperCase() + (item.unit == "88" ? " (UMUM)" :
                                                            " (UNIT " + item.unit + ")"),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementbrglain").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Ketik Nama Barang",
                                tags: "true",
                                allowClear: true,
                                ajax: {
                                    url: "/getMasterLain",
                                    dataType: "json",
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.namaBarang,
                                                    text: item.namaBarang.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementdeskripsi").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Ketik Deskripsi",
                                tags: "true",
                                allowClear: true,
                                minimumInputLength: 1,
                                ajax: {
                                    url: "/getMasterDeskripsi",
                                    dataType: "json",
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.keterangan,
                                                    text: item.keterangan.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementkatalog").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Ketik Katalog",
                                tags: "true",
                                allowClear: true,
                                minimumInputLength: 1,
                                ajax: {
                                    url: "/getMasterKatalog",
                                    dataType: "json",
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.katalog,
                                                    text: item.katalog.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementpart").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Ketik Part",
                                tags: "true",
                                allowClear: true,
                                minimumInputLength: 1,
                                ajax: {
                                    url: "/getMasterPart",
                                    dataType: "json",
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.part,
                                                    text: item.part.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                            $(".elementsatuan").select2({
                                dropdownParent: $("#modalEditPermintaan"),
                                language: "id",
                                placeholder: "Ketik Satuan",
                                tags: "true",
                                allowClear: true,
                                ajax: {
                                    url: "/getMasterSatuan",
                                    dataType: "json",
                                    processResults: function(response) {
                                        return {
                                            results: $.map(response, function(item) {
                                                return {
                                                    id: item.satuan,
                                                    text: item.satuan.toUpperCase(),
                                                }
                                            })
                                        };
                                    },
                                    cache: true
                                },
                            });
                        })
                    </script>
                    <script type="text/javascript">
                        $(function() {
                            let options = {
                                selector: "#tinymce-edit",
                                height: 300,
                                menubar: false,
                                statusbar: false,
                                toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
                                content_style: "body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }"
                            }
                            if (localStorage.getItem("tablerTheme") === "dark") {
                                options.skin = "oxide-dark";
                                options.content_css = "dark";
                            }
                            tinyMCE.init(options);
                        })
                        $(function() {
                            let options = {
                                selector: "#tinymce-edit2",
                                height: 300,
                                menubar: false,
                                statusbar: false,
                                toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
                                content_style: "body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }"
                            }
                            if (localStorage.getItem("tablerTheme") === "dark") {
                                options.skin = "oxide-dark";
                                options.content_css = "dark";
                            }
                            tinyMCE.init(options);
                        })
                    </script>
        ';
    }

    public function printPermintaan(Request $request)
    {
        $permintaan = DB::table('permintaan')->where('noform', $request->noform)->get();
        $permintaanItem = DB::table('permintaanitm AS pe')
            ->select('pe.*', 'pe.mesin as idmesin', 'me.mesin', 'mi.merk')
            ->leftJoin('mastermesinitm AS mi', 'pe.mesin', '=', 'mi.id_itm')
            ->leftJoin('mastermesin AS me', 'mi.id_mesin', '=', 'me.id')
            ->where('noform', $request->noform)
            ->get();
        return view('products/00_print.printPermintaan', ['permintaan' => $permintaan, 'permintaanItem' => $permintaanItem]);
    }

    public function repeatOrder(Request $request)
    {
        if (!$request->keyword) {
            echo '<p class="text-center">Pencarian tidak boleh kosong</p>';
        } else {
            $hasil = DB::table('permintaanitm')->where('kodeseri', $request->keyword)->orWhere('namaBarang', 'LIKE', '%' . $request->keyword . '%')->orderBy('kodeseri', 'asc')->get();
            echo '
            <div class="table-responsive" style="max-height: 250px;">
                Hasil : ' . count($hasil) . ' Item untuk pencarian : "' . $request->keyword . '"
                <table class="text-nowrap table table-sm table-card table-bordered border border-dark" style="width:100%;color:black;text-transform:uppercase;font-size: 12px">
                    <thead>
                        <tr>
                            <td class="text-center" colspan="2">Kodeseri</td>
                            <td>Hasil</td>
                            <td class="text-center">Qty</td>
                        </tr>
                    </thead>';
            foreach ($hasil as $key) {
                echo    '<tbody>';
                echo        '<td class="text-center">
                                    <button type="button" class="btn btn-icon btn-sm btn-blue tambahkebawah" 
                                    data-jenis="' . $key->jenis . '" 
                                    data-kodeproduk="' . $key->kodeproduk . '" 
                                    data-namabarang="' . strtoupper($key->namaBarang) . '" 
                                    data-deskripsi="' . $key->keterangan . '"
                                    data-katalog="' . $key->katalog . '"
                                    data-part="' . $key->part . '"
                                    data-qty="' . $key->qty . '"
                                    data-satuan="' . $key->satuan . '"
                                    data-unit="' . $key->unit . '"
                                    data-peruntukan="' . $key->peruntukan . '"
                                    data-sample="' . $key->qty_sample . '"
                                    >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                    </button>
                                </td>';
                echo            '<td class="text-center">' . $key->kodeseri . '</td>';
                echo            '<td>' . $key->namaBarang . ' ' . $key->keterangan . ' ' . $key->katalog . ' ' . $key->part . '</td>';
                echo            '<td class="text-center">' . $key->qty . ' ' . $key->satuan . '</td>';
                echo        '</tbody>';
            }
            echo    '</table>
            </div>
        ';
        }
    }

    public function storeEditPermintaan(Request $request)
    {
        DB::table('permintaanitm')
            ->where('kodeseri', $request->kodeseri)
            ->update([
                'tgl' => $request->tanggal,
                'namaBarang' => $request->nama,
                'keterangan' => $request->keterangan,
                'katalog' => $request->katalog,
                'part' => $request->part,
                'mesin' => $request->mesin,
                'qty' => $request->qty,
                'satuan' => strtoupper($request->satuan),
                'pemesan' => $request->pemesan,
                'unit' => $request->unit,
                'peruntukan' => $request->peruntukan,
                'qty_sample' => $request->sample,
                'edited' => '1',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        if (Auth::user()->role == "pur" || Auth::user()->role == "kng" || Auth::user()->role == "own") {
            DB::table('permintaanitm')
                ->where('kodeseri', $request->kodeseri)
                ->update([
                    'qtyacc' => $request->qtyacc,
                    'estimasiharga' => $request->estimasiharga,
                    'pembeli' => $request->pembeli,
                ]);
        }
        $getbarang2 = DB::table('permintaanitm')->where('kodeseri', '=', $request->kodeseri)->first();
        $check = DB::table('permintaan')
            ->where('noform', $getbarang2->noform)
            ->update([
                'keteranganform' => $request->keteranganform,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: (' . $request->kodeseri . ') ' . $getbarang2->namaBarang . ' telah berhasil diubah', 'status' => true);
        }
        return Response()->json($arr);
    }
}
