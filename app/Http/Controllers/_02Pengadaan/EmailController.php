<?php

namespace App\Http\Controllers\_02Pengadaan;

use App\Models\Pengadaan\PermintaanItm;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    public function email()
    {
        return view('products.02_pengadaan.email', [
            'active' => 'ProsesEmail',
            'judul' => 'Email'
        ]);
    }

    public function checkProsesEmail(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $ids = $request->id;
            $data = DB::table('permintaanitm')->whereIn('kodeseri', $ids)->get();
            echo '
                   <div class="card">
            <div class="card-header bg-info text-white">Permintaan</div>
            <div class="card-body">
                <div style="overflow-x: scroll;">
                    <table class="table table-sm table-bordered table-hover text-nowrap" style="color:black;">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kodeseri</th>
                                <th>Noform</th>
                                <th>Barang</th>
                                <th>Deskripsi</th>
                                <th>QTY ACC</th>
                                <th>Satuan</th>
                                <th>Pemesan</th>
                                <th>Unit</th>
                                <th>Proses Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>';

            foreach ($data as $row) {
                echo '
                            <tr>
                                <td>' . Carbon::parse($row->tgl)->format("d/m/Y") . '</td>
                                <td>' . $row->kodeseri . '</td>
                                <td>' . $row->noform . '</td>
                                <td>' . $row->namaBarang . '</td>
                                <td>' . $row->keterangan . '</td>
                                <td>' . $row->qty . '</td>
                                <td>' . $row->satuan . '</td>
                                <td>' . $row->pemesan . '</td>
                                <td>' . $row->unit . '</td>
                                <td>' . $row->proses_email . '</td>
                                <td>' . $row->status . '</td>
                            </tr>';
            }

            echo '
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                    ';
        }
    }

    public function cariRiwayatEmail(Request $request)
    {
        if (!empty($request->keyword)) {
            $cari = trim(strip_tags($request->keyword));
            if ($cari == '') {
            } else {

                echo '
                <div class="row" style="color:black">
                    <div class="col-lg-6">
                        <label style="color:black;">Riwayat Email <strong><?= $cari ?></strong></label>
                        <div class="card-body" style="overflow-y: scroll; height: 150px">
                            <table border="1" class="text-nowrap" style="width:100%;color:black;text-transform:uppercase;text-align: center;font-size: 12px">
                                <thead class="bg-dark text-white" style="font-size:12px;">
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Kodeseri</td>
                                        <td>Noform</td>
                                        <td>Barang</td>
                                        <td>Deskripsi</td>
                                        <td>Qty ACC</td>
                                        <td>Satuan</td>
                                        <td>Pemesan</td>
                                        <td>Proses Email</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label style="color:black;">Detail Proses <strong><?= $cari ?></strong> Email</label>
                        <div class="card-body" style="overflow-y: scroll; height: 150px">
                            <table border="1" class="text-nowrap" style="width:100%;color:black;text-transform:uppercase;text-align: center;font-size: 12px">
                                <thead class="bg-dark text-white" style="font-size:12px;">
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Kodeseri</td>
                                        <td>Noform</td>
                                        <td>Barang</td>
                                        <td>Deskripsi</td>
                                        <td>Qty ACC</td>
                                        <td>Satuan</td>
                                        <td>Pemesan</td>
                                        <td>Proses Email</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>';
            }
        }
    }

    public function storeProsesEmail(Request $request)
    {
        // Pastikan kodeseri tidak null
        if (!$request->has('kodeseri') || empty($request->kodeseri)) {
            return response()->json([
                'msg' => 'Kodeseri tidak ditemukan.',
                'status' => false
            ], 400);
        }

        // Pisahkan jika ada multiple kodeseri yang dikirim
        $kodeseriArray = explode(',', $request->kodeseri[0]);

        $successCount = 0;
        $failedCount = 0;

        foreach ($kodeseriArray as $kodeseri) {
            // Update berdasarkan kodeseri
            $check = DB::table('permintaanitm')
                ->where('kodeseri', $kodeseri)
                ->limit(1)
                ->update([
                    'proses_email' => true,
                    'updated_at' => now(),
                ]);

            if ($check) {
                $successCount++;
            } else {
                $failedCount++;
            }
        }

        if ($failedCount > 0) {
            return response()->json([
                'msg' => "$failedCount data gagal diproses. Silahkan coba lagi.",
                'status' => false
            ], 500);
        }

        return response()->json([
            'msg' => 'Semua data telah berhasil diproses.',
            'status' => true
        ]);
    }
}
