<?php

namespace App\Http\Controllers\_04Teknik;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PengambilanController extends Controller
{
    public function pengambilan()
    {
        return view('products.04_teknik.pengambilan', [
            'active' => 'Pengambilan',
            'judul' => 'Pengambilan'
        ]);
    }

    public function pencarianBarang(Request $request)
    {
        $hasil = DB::table('barang')->where('kodeseri', $request->keyword)->get();
        echo '
            <div class="table-responsive">
                <table class="text-nowrap table table-sm table-card table-bordered" style="width:100%;color:black;text-transform:uppercase;text-align: center;font-size: 12px">
                    <thead>
                        <tr>
                            <td>Kodeseri</td>
                            <td>Barang</td>
                            <td>Deskripsi</td>
                            <td>Katalog</td>
                            <td>Part</td>
                            <td>Satuan</td>
                            <td>Awal</td>
                            <td>Ambil</td>
                            <td>Sisa</td>
                            <td>Opsi</td>
                        </tr>
                    </thead>';
        foreach ($hasil as $key) {
            echo    '<tbody>';
            echo        '<td>' . $key->kodeseri . '</td>';
            echo        '<td>' . $key->namaBarang . '</td>';
            echo        '<td>' . $key->keterangan . '</td>';
            echo        '<td>' . $key->katalog . '</td>';
            echo        '<td>' . $key->part . '</td>';
            echo        '<td>' . $key->satuan . '</td>';
            echo        '<td>' . $key->qty_diterima . '</td>';
            echo        '<td>' . $key->qty_diambil . '</td>';
            echo        '<td>' . ($key->qty_diterima - $key->qty_diambil) . '</td>';
            echo        '<td>
                                        <button type="button" class="btn btn-icon btn-sm btn-blue">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                        </button>
                                    </td>';
            echo    '</tbody>';
        }
        echo    '</table>
            </div>
        ';
    }
}
