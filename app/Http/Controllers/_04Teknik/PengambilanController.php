<?php

namespace App\Http\Controllers\_04Teknik;

use App\Models\Teknik\PengambilanItm;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengambilanController extends Controller
{
    public function pengambilan()
    {
        return view('products.04_teknik.pengambilan', [
            'active' => 'Pengambilan',
            'judul' => 'Pengambilan'
        ]);
    }

    function getMesin(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $mesin = DB::table('mastermesin AS me')
                ->select(DB::raw('merk,mi.id_itm as id, mesin, id_mesinitm, unit, mi.kode_nomor'))
                ->join('mastermesinitm AS mi', 'me.id', '=', 'mi.id_mesin')
                ->where('me.mesin', 'LIKE', "%$search%")
                ->orWhere('mi.merk', 'LIKE', "%$search%")
                ->orderBy('me.mesin', 'ASC')
                ->get();
        } else {
            $mesin = DB::table('mastermesin AS me')
                ->select(DB::raw('merk,mi.id_itm as id, mesin, id_mesinitm, unit, mi.kode_nomor'))
                ->join('mastermesinitm AS mi', 'me.id', '=', 'mi.id_mesin')
                ->orderBy('me.mesin', 'ASC')
                ->get();
        }
        return Response()->json($mesin);
    }

    public function getPerson(Request $request)
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

    public function pencarianBarang(Request $request)
    {
        if (!$request->keyword) {
            echo '<p class="text-center">Pencarian tidak boleh kosong</p>';
        } else {
            $hasil = DB::table('barang')->where('kodeseri', $request->keyword)->orWhere('namaBarang', 'LIKE', '%' . $request->keyword . '%')->orWhere('keterangan', 'LIKE', '%' . $request->keyword . '%')->where('status', 'DITERIMA')->orderBy('kodeseri', 'asc')->get();
            echo '
            <div class="table-responsive" style="max-height: 250px;">
                Hasil : ' . count($hasil) . ' Item untuk pencarian : "' . $request->keyword . '"
                <table class="text-nowrap table table-sm table-card table-bordered border border-dark" style="width:100%;color:black;text-transform:uppercase;font-size: 12px">
                    <thead>
                        <tr>
                            <td class="text-center" colspan="2">Kodeseri</td>
                            <td>Hasil</td>
                            <td class="text-center">Satuan</td>
                            <td class="text-center">Awal</td>
                            <td class="text-center">Ambil</td>
                            <td class="text-center">Sisa</td>
                        </tr>
                    </thead>';
            foreach ($hasil as $key) {
                $sisa = DB::table('pengambilanitm')->where('kodeseri', $key->kodeseri)->count();
                if (($key->qty_diterima - $sisa) <= 0) {
                    echo    '<tbody>';
                    echo        '<td class="text-center"></td>';
                } else {
                    echo    '<tbody>';
                    echo        '<td class="text-center">
                                    <button type="button" class="btn btn-icon btn-sm btn-blue tambahkebawah" data-kodeseri="' . $key->kodeseri . '" data-namabarang="' . strtoupper($key->namaBarang) . ' ' . strtoupper($key->keterangan) . ' ' . strtoupper($key->katalog) . ' ' . strtoupper($key->part) . '" data-qty="' . $key->qty_diterima . '" data-sisa="' . ($key->qty_diterima - $sisa) . '">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                    </button>
                                </td>';
                }
                echo            '<td class="text-center">' . $key->kodeseri . '</td>';
                echo            '<td>' . $key->namaBarang . ' ' . $key->keterangan . ' ' . $key->katalog . ' ' . $key->part . '</td>';
                echo            '<td class="text-center">' . $key->satuan . '</td>';
                echo            '<td class="text-center">' . $key->qty_diterima . '</td>';
                echo            '<td class="text-center">' . $sisa . '</td>';
                echo            '<td class="text-center">' . ($key->qty_diterima - $sisa) . '</td>';
                echo        '</tbody>';
            }
            echo    '</table>
            </div>
        ';
        }
    }

    public function storePengambilan(Request $request)
    {
        $request->validate(
            [
                '_token' => 'required',
                'tgl' => 'required',
                'diambil' => 'required',
            ],
        );

        // Initiate Noform
        $checknoform = DB::table('pengambilan')->latest('noform')->first();
        if ($checknoform) {
            $y = substr($checknoform->noform, 0, 2);
            if (date('y') == $y) {
                $query = DB::table('pengambilan')->where('noform', 'like', $y . '%')->orderBy('noform', 'desc')->first();
                $noUrut = (int) substr($query->noform, -7);
                $noUrut++;
                $char = date('y-');
                $kodenoform = $char . sprintf("%07s", $noUrut);
            } else {
                $kodenoform = date('y-') . "0000001";
            }
        } else {
            $kodenoform = date('y-') . "0000001";
        }


        DB::table('pengambilan')->insert([
            'tanggal' => $request->tgl,
            'noform' => $kodenoform,
            'diambil' => $request->diambil,
            'dibuat' => Auth::user()->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $jml_mbl = count($request->kodeseri);
        for ($i = 0; $i < $jml_mbl; $i++) {
            $getkodeseri = DB::table('permintaanitm')->where('kodeseri', $request->kodeseri[$i])->first();

            $check = DB::table('pengambilanitm')->insert([
                'tanggal' => $request->tgl,
                'noform' => $kodenoform,
                'kodeseri' => $getkodeseri->kodeseri,
                'namaBarang' => $getkodeseri->namaBarang,
                'mesin' => $request->mesin[$i],
                'unit' => $request->unit[$i],
                'jumlah' => $request->qty[$i],
                'jam' => date('H:i:s'),
                'keterangan' => $request->keterangan[$i],
                'diambil' => $request->diambil,
                'dibuat' => Auth::user()->name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $arr = array('msg' => 'Something goes to wrong. Please try later', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Data: ' . $kodenoform . ' telah berhasil disimpan', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function edit($id)
    {
        $data = PengambilanItm::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $pengambilan = Pengambilanitm::find($id);
        $pengambilan->update($request->all());

        return response()->json(['success' => 'Data berhasil diperbarui']);
    }
}
