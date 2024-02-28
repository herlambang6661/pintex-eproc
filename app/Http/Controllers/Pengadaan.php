<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Pengadaan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function permintaan()
    {
        return view('products/02_pengadaan.permintaan');
    }

    function storePermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tanggal' => 'required',
                'kabag' => 'required',
                'jenis' => 'required',
                'kodeproduk' => 'required',
                'qty' => 'required',
                'satuan' => 'required',
                'unit' => 'required',
                'namaBarang' => 'required',
                'mesin' => 'required',
                'pemesan' => 'required',
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

    function getKabag(Request $request)
    {

        // $kabag = [];
        if ($request->has('q')) {
            $search = $request->q;
            $kabag = DB::table('person')
                ->where('tipe', "INDIVIDU")
                ->where('kabag', "1")
                ->where('nama', 'LIKE', "%$search%")
                ->get();
        } else {
            $kabag = DB::table('person')
                ->where('tipe', "INDIVIDU")
                ->where('kabag', "1")
                ->get();
        }
        return Response()->json($kabag);
    }
}
