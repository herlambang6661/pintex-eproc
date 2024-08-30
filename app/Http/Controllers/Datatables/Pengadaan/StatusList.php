<?php

namespace App\Http\Controllers\Datatables\Pengadaan;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StatusList extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('permintaanitm')->get();
            return DataTables::of($data)
                ->addColumn('status', function ($itmdata) {
                    $timeline = '';

                    if ($itmdata->status == "PROSES PERSETUJUAN") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Menunggu ACC</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">ACC</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Dibeli</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Diterima</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "MENUNGGU ACC") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Menunggu ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_qty_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">ACC</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Dibeli</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Diterima</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "PROSES PEMBELIAN") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Menunggu ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_qty_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Dibeli</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Diterima</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "DIBELI") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Menunggu ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_qty_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Dibeli</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle-undone"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Diterima</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "DITERIMA") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Menunggu ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_qty_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">ACC</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl_acc)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Dibeli</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="timeline-content">
                                    <div class="inner-circle"></div>
                                    <p class="h6 mt-3 mb-1" style="font-size: 11px;">Diterima</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "REJECT") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle-reject"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    } elseif ($itmdata->status == "HOLD") {
                        $timeline = '
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                            <div class="timeline-step">
                                <div class="timeline-content" data-toggle="tooltip" data-placement="top" title="Permintaan">
                                    <div class="inner-circle-hold"></div>
                                    <p class="mt-3 mb-1" style="font-size: 11px;">PERMINTAAN</p>
                                    <p class="text-muted mb-0 mb-lg-0" style="font-size: 10px;">' . date('d/m/Y', strtotime($itmdata->tgl)) . '</p>
                                </div>
                            </div>
                        </div>
                        <br>';
                    }

                    return $timeline;
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.product.02_pengadaan.status_barang');
    }
}
