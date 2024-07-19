<?php

namespace App\Http\Controllers\_02Pengadaan;

use App\Models\Pengadaan\Pembelian;
use App\Models\Pengadaan\PermintaanItm;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PersetujuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function persetujuan()
    {
        return view('products.02_pengadaan.persetujuan', [
            'active' => 'Persetujuan',
            'judul' => 'Persetujuan',
        ]);
    }

    public function ajax_list_prosesQTY(Request $request)
    {
        error_reporting(0);
        $list = $this->pembelian->get_datatables_check();
        $data = [];
        $no = $request->input('start');

        foreach ($list as $itmdata) {
            $no++;
            $row = [];
            $hari = date('D', strtotime($itmdata->tanggal));

            // Translate day names
            $hari_indo = match ($hari) {
                'Sun' => "Minggu",
                'Mon' => "Senin",
                'Tue' => "Selasa",
                'Wed' => "Rabu",
                'Thu' => "Kamis",
                'Fri' => "Jumat",
                'Sat' => "Sabtu",
                default => "Tidak di ketahui",
            };

            $row[] = $itmdata->kodeseri;
            $row[] = $hari_indo;
            $row[] = date('d/m/Y', strtotime($itmdata->tanggal));
            $row[] = $itmdata->kodeseri;
            $row[] = $itmdata->noform;
            $row[] = $itmdata->namaBarang;
            $row[] = $itmdata->qty;
            $row[] = $itmdata->satuan;
            $row[] = $itmdata->pemesan;
            $row[] = $this->permintaan->getMesinBaru($itmdata->mesin) . " - " . $this->permintaan->getMerkBaru($itmdata->mesin);

            $data[] = $row;
        }

        $output = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $this->pembelian->count_all_check(),
            "recordsFiltered" => $this->pembelian->count_filtered_check(),
            "data" => $data,
        ];

        // Output to JSON format
        return response()->json($output);
    }
}
