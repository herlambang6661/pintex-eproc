<?php

namespace App\Http\Controllers\_04Teknik;

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
            'namaBarang' => $this->getDatalist('permintaanitm', 'jenis', 'Lain', null),
            'deskripsi' => $this->getDatalist('permintaanitm', null, null, 'keterangan'),
            'katalog' => $this->getDatalist('permintaanitm', null, null, 'katalog'),
            'part' => $this->getDatalist('permintaanitm', null, null, 'part'),
            'satuan' => $this->getDatalist('permintaanitm', null, null, 'satuan'),
            'peruntukan' => $this->getDatalist('permintaanitm', null, null, 'peruntukan'),
        ]);
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

    function storePermintaan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tanggal' => 'required',
                'kabag' => 'required',
            ],
        );

        // Initiate Noform
        $checknoform = DB::table('servisitm')->orderBy('noformservis', 'desc')->first();
        $y = substr($checknoform->noformservis, 0, 2);
        if (date('y') == $y) {
            $query = DB::table('servisitm')->where('noformservis', 'like', $y . '%')->orderBy('noformservis', 'desc')->first();
            $noUrut = (int) substr($query->noformservis, -5);
            $noUrut++;
            $char = date('y-');
            $kodeSurat = $char . sprintf("%05s", $noUrut);
        } else {
            $kodeSurat = date('y-') . "00001";
        }
        DB::table('servis')->insert([
            'tanggalservis'     => $request->tanggal,
            'noformservis'      => $kodeSurat,
            'kabag'             => $request->kabag,
            'ket_servis'        => $request->keteranganform,
            'dibuat'            => Auth::user()->name,
            'created_at'        => date('Y-m-d H:i:s'),
        ]);
        $jml_mbl = count($request->namaBarang);
        for ($i = 0; $i < $jml_mbl; $i++) {
            $kdseri = "S0001";
            $getkodeseri = DB::table('servisitm')->orderBy('kodeseri_servis', 'desc')->limit('1')->get();
            foreach ($getkodeseri as $key) {
                $kdseri = $key->kodeseri_servis;
            }
            $kdseri = $kdseri + 1;

            if ($request->urgent[$i] == '1') {
                $urgent = '1';
            } else {
                $urgent = '0';
            }

            $check = DB::table('permintaanitm')->insert([
                'tgl_servis' => $request->tanggal,
                'noformservis' => $kodeSurat,
                'kodeseri_servis' => $kdseri,
                'subkodeseri_servis' => $kdseri,
                'kodeproduk_servis' => $request->kodeproduk[$i],
                'namaBarang' => strtoupper($request->namaBarang[$i]),
                'keterangan' => strtoupper($request->deskripsi[$i]),
                'serialnumber' => strtoupper($request->serialnumber[$i]),
                'mesin' => strtoupper($request->mesin[$i]),
                'qty' => $request->qty[$i],
                'qtykirim' => $request->qty[$i],
                'satuan' => strtoupper($request->satuan[$i]),
                'pemesan' => strtoupper($request->pemesan[$i]),
                'unit' => $request->unit[$i],
                'peruntukan' => $request->peruntukan[$i],
                'urgent' => $urgent,
                'status' => "PROSES PERSETUJUAN",
                'DIBUAT'            => Auth::user()->name,
                'created_at'        => date('Y-m-d H:i:s'),
            ]);
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $kodeSurat . ' telah berhasil disimpan', 'status' => true);
        }
        return Response()->json($arr);
    }
}
