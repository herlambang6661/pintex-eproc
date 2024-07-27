<?php

namespace App\Http\Controllers\_02Pengadaan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Pengadaan\Pembelian;
use App\Models\Pengadaan\PermintaanItm;
use Yajra\DataTables\Facades\DataTables;

class PersetujuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function persetujuan()
    {
        return view(
            'products.02_pengadaan.persetujuan',
            [
                'active' => 'Persetujuan',
                'judul' => 'Persetujuan',
            ]
        );
    }

    public function checkAccQty(Request $request)
    {
        if (empty($request->id)) {
            echo '<center><iframe src="https://lottie.host/embed/94d605b9-2cc4-4d11-809a-7f41357109b0/OzwBgj9bHl.json" width="300px" height="300px"></iframe></center>';
            echo "<center>Tidak ada data yang dipilih</center>";
        } else {
            $jml = count($request->id);

            echo '
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tglwawancara" value="' . date("Y-m-d") . '">
                        </div>
                        <div class="col-lg-8 col-md-12">
                                <label class="form-label">Pembeli</label>
                                <input type="text" class="form-control" name="user" placeholder="User yang ikut mewawancarai" value="Kartika Dewi, ">
                        </div>
                    </div>
                    <hr>
                    <div class="space-y">
                    ';

            for ($i = 0; $i < $jml; $i++) {
                $data = DB::table('permintaanitm')->where('id', $request->id[$i])->get();
                foreach ($data as $u) {
                    echo  '<input type="hidden" name="idlamaran[]" value="' . $u->id . '" >';
                    echo  '<input type="hidden" name="kodeseri[]" value="' . $u->kodeseri . '" >';
                    echo '
                        <div class="card shadow border-green">
                            <div class="row g-0">
                                <div class="col-auto">
                                <div class="card-body">
                                    <div class="avatar avatar-md shadow" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                                </div>
                                </div>
                                <div class="col">
                                <div class="card-body ps-0">
                                    <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0"><a href="#">' . $u->namaBarang . '</a></h3>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md">
                                        <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                            <div class="list-inline-item">
                                                <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                                                ' . $u->keterangan . '
                                            </div>
                                            <div class="list-inline-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                                ' . $u->katalog . '
                                            </div>
                                            <div class="list-inline-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" /></svg>
                                                ' . $u->part . '
                                            </div>
                                            </div>
                                            <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                            <div class="list-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                                ' . $u->keterangan . '
                                            </div>
                                            <div class="list-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                                ' . $u->keterangan . '
                                            </div>
                                            <div class="list-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                                ' . $u->keterangan . '
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="mt-3 badges">
                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">' . $u->keterangan . '</a>
                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">' . $u->keterangan . '</a>
                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Tinggi: ' . $u->keterangan . '</a>
                                            <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Berat: ' . $u->keterangan . '</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        ';
                }
            }
            echo '      </div>';
        }
    }
}
