<?php

namespace App\Http\Controllers\_04Teknik;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    public function servis()
    {
        return view('products.04_teknik.servis', [
            'active' => 'Servis',
            'judul' => 'Servis',
            'namaBarang' => $this->getDatalist('servisitm', 'namaBarang', null, null),
            'deskripsi' => $this->getDatalist('servisitm', null, null, 'keterangan'),
            'serialnumber' => $this->getDatalist('servisitm', null, null, 'serialnumber'),
            'satuan' => $this->getDatalist('servisitm', null, null, 'satuan'),
        ]);
    }

    function getMesin(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $mesin = DB::table('mastermesinitm AS mi')
                ->select(DB::raw('DISTINCT(id_mesin),merk,mi.id_itm as id, mesin, id_mesinitm, unit, mi.kode_nomor'))
                ->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')
                ->where('me.mesin', 'LIKE', "%$search%")
                ->orWhere('mi.merk', 'LIKE', "%$search%")
                ->orderBy('me.mesin', 'ASC')
                ->get();
        } else {
            $mesin = DB::table('mastermesinitm AS mi')
                ->select(DB::raw('DISTINCT(id_mesin),merk,mi.id_itm as id, mesin, id_mesinitm, unit, mi.kode_nomor'))
                ->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')
                ->orderBy('me.mesin', 'ASC')
                ->get();
        }
        return Response()->json($mesin);
    }

    private function getDatalist($table, $var = null, $value = null, $select = null)
    {
        if ($var) {
            $get = DB::table($table)->distinct()->get('namaBarang');
        } else {
            $get = DB::table($table)->distinct()->get($select);
        }
        return $get;
    }

    function storedataServis(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tanggal' => 'required',
                'kabag' => 'required',
            ],
        );

        // Initiate Noform
        $checknoform = DB::table('servis')->orderBy('noformservis', 'desc')->first();
        $query = $checknoform->noformservis;
        $noUrutForm = (int) substr($query, -5);
        $noUrutForm++;
        $charForm = date('y-');
        $noForm = $charForm . sprintf("%05s", $noUrutForm);

        DB::table('servis')->insert([
            'entitas'           => $request->entitas,
            'tanggalservis'     => $request->tanggal,
            'noformservis'      => $noForm,
            'kabag'             => $request->kabag,
            'ket_servis'        => $request->keteranganform,
            'dibuat'            => Auth::user()->name,
            'created_at'        => date('Y-m-d H:i:s'),
        ]);
        $jml_mbl = count($request->kodeproduk);
        for ($i = 0; $i < $jml_mbl; $i++) {
            if (empty($request->urgent[$i])) {
                $urgent = '0';
            } else {
                $urgent = '1';
            }
            $getkodeseri = DB::table('servisitm')->orderBy('kodeseri_servis', 'desc')->first();
            $kdseri = $getkodeseri->kodeseri_servis;
            $noUrutKodeseri = (int) substr($kdseri, -3);
            $noUrutKodeseri++;
            $charKodeseri = 'S' . date('y');
            $kodeseriItem = $charKodeseri . sprintf("%03s", $noUrutKodeseri);
            $subkodes = $kodeseriItem . '-01';

            $check = DB::table('servisitm')->insert([
                'entitas' => $request->entitas,
                'tgl_servis' => $request->tanggal,
                'noformservis' => $noForm,
                'kodeseri_servis' => $kodeseriItem,
                'subkodeseri_servis' => $subkodes,
                'kodeproduk_servis' => 'Services',
                'namaBarang' => strtoupper($request->namaBarang[$i]),
                'keterangan' => strtoupper($request->deskripsi[$i]),
                'serialnumber' => strtoupper($request->serialnumber[$i]),
                'mesin' => strtoupper($request->mesin[$i]),
                'qty' => $request->qty[$i],
                'satuan' => strtoupper($request->satuan[$i]),
                'pemesan' => strtoupper($request->pemesan[$i]),
                'urgent' => $urgent,
                'status' => "PROSES PERSETUJUAN",
                'DIBUAT' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $noForm . ' telah berhasil disimpan. ' . $jml_mbl . ' Item', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function printServis(Request $request)
    {
        $servis = DB::table('servis')->where('noformservis', $request->noform)->get();
        $servisItem = DB::table('servisitm')->where('noformservis', $request->noform)->get();
        return view('products/00_print.printServis', ['servis' => $servis, 'servisItem' => $servisItem]);
    }

    public function viewServis(Request $request)
    {
        $no = 1;
        $getservis = DB::table('servis')->where('noformservis', '=', $request->noform)->first();
        $getservisitem = DB::table('servisitm')->where('noformservis', '=', $request->noform)->get();
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
                                <h2><b>FORM SERVIS BARANG</b></h2>
                            </u>
                        </div>
                    </div>
                    <hr style="margin-top: 5px;">
                    <div class="container">
                        <i>
                            <p>
                                Tanggal : ' . Carbon::parse($getservis->tanggalservis)->format("d/m/Y") . '
                            </p>
                            <p>
                                No. Form : ' . $getservis->noformservis . '
                            </p>
                        </i>
                        <table class="table table-sm table-bordered table-hover"
                            style="color: black; border-color: black;text-transform: uppercase; font-size:10px">
                            <thead class="text-black" style="border-color: black;">
                                <th style="border-color: black;" class="text-center">#</th>
                                <th style="border-color: black;" class="text-center">Kodeseri</th>
                                <th style="border-color: black;" class="text-center">Barang</th>
                                <th style="border-color: black;" class="text-center">Deskripsi</th>
                                <th style="border-color: black;" class="text-center">Serial Number</th>
                                <th style="border-color: black;" class="text-center">Mesin</th>
                                <th style="border-color: black;" class="text-center">Quantity</th>
                                <th style="border-color: black;" class="text-center">Pemesan</th>
                                <th style="border-color: black;" class="text-center">Status</th>
                            </thead>
                            <tbody class="text-black" style="border-color: black;">
                            ';
        $i = 1;
        foreach ($getservisitem as $key) {
            $getMesin = DB::table('mastermesinitm AS mi')->select('me.mesin', 'mi.merk')->join('mastermesin AS me', 'me.id', '=', 'mi.id_mesin')->where('mi.id_itm', '=', $key->mesin)->first();
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
                                        <td class="text-center">' . $sst . " " . $key->kodeseri_servis . '</td>
                                        <td class="">' . $key->namaBarang . '</td>
                                        <td class="text-center">' . $key->keterangan . '</td>
                                        <td class="text-center">' . $key->serialnumber . '</td>
                                        <td class="text-center">' . $getMesin->mesin . " " . $getMesin->merk . '</td>
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
                        <i>*Note : ' . $getservis->ket_servis . '</i>
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
                                ( ' . $getservis->kabag . ' )
                            </div>
                            <div class="col">
                                ( ' . $getservis->dibuat .
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
}
