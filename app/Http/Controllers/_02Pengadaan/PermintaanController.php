<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function permintaan()
    {
        return view('products/02_pengadaan.permintaan', [
            'active' => 'Permintaan'
        ]);
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
                ->select(DB::raw('DISTINCT(merk),me.id, mesin, id_mesinitm, unit'))
                ->join('mastermesinitm AS mi', 'me.id', '=', 'mi.id_mesin')
                ->where('me.mesin', 'LIKE', "%$search%")
                ->orWhere('mi.merk', 'LIKE', "%$search%")
                ->orderBy('me.mesin', 'ASC')
                ->get();
        } else {
            $mesin = DB::table('mastermesin AS me')
                ->select(DB::raw('DISTINCT(merk),me.id, mesin, id_mesinitm, unit'))
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

    function storePermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tanggal' => 'required',
                'kabag' => 'required',
            ],
        );

        // // GET NOFORM
        $noform = date('y') . "00000";
        $checknoform = DB::table('permintaan')->orderBy('noform', 'desc')->limit('1')->get();
        foreach ($checknoform as $key) {
            $noform = $key->noform;
        }
        $y = substr($noform, 0, 2);
        if (date('y') == $y) {
            $noUrut = substr($noform, 2, 5);
            $na = $noUrut + 1;
            $char = date('y');
            $kodeSurat = $char . sprintf("%05s", $na);
        } else {
            $kodeSurat = date('y') . "00001";
        }
        // GET NOFORM

        $jml_mbl = count($request->jenis);
        for ($i = 0; $i < $jml_mbl; $i++) {
            $kdseri = "10000";
            $getkodeseri = DB::table('permintaanitm')->orderBy('kodeseri', 'desc')->limit('1')->get();
            foreach ($getkodeseri as $key) {
                $kdseri = $key->kodeseri;
            }
            $kdseri = $kdseri + 1;

            // $cekMasterBarang = $this->permintaan->cekMaster($namaBarang[$i]);
            // if ($cekMasterBarang < 1) {
            //     $dataMB = array(
            //         'nama' => strtoupper($namaBarang[$i]),
            //         'tipe' => 'Lain',
            //         'dibuat' => $dibuat,
            //     );
            //     $this->permintaan->saveMB($dataMB); // <====================== INPUT
            // }
            // $checkDuplicateDeskripsi = $this->permintaan->checkdesk($keterangan[$i]);
            // if ($checkDuplicateDeskripsi < 1) {
            //     $inputDataDeskripsi = array(
            //         'deskripsi' => $keterangan[$i],
            //         'katalog' => $katalog[$i],
            //         'part' => $part[$i]
            //     );
            //     $this->permintaan->savedesk($inputDataDeskripsi); // <====================== INPUT
            // }

            $check = DB::table('permintaanitm')->insert([

                'remember_token'    => $request->_token,
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
                'urgent' => '0',
                'status' => "PROSES PERSETUJUAN",
                'DIBUAT'            => Auth::user()->name,
                'created_at'        => date('Y-m-d H:i:s'),
            ]);
        }

        DB::table('permintaan')->insert([
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

    public function printPermintaan(Request $request)
    {
        $permintaan = DB::table('permintaan')->where('noform', $request->noform)->get();
        $permintaanItem = DB::table('permintaanitm')->where('noform', $request->noform)->get();
        return view('products/00_print.printPermintaan', ['permintaan' => $permintaan, 'permintaanItem' => $permintaanItem]);
    }
}
