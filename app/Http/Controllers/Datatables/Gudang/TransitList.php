<?php

namespace App\Http\Controllers\Datatables\Gudang;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransitList extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->dari) {
                $dari = $request->dari;
            } else {
                $dari = date('Y-01-01');
            }
            if ($request->sampai) {
                $sampai = $request->sampai;
            } else {
                $sampai = date('Y-m-d');
            }

            $data = DB::table('transititm')
                ->whereBetween('tgl_transit', [$dari, $sampai])
                ->orderBy('tgl_transit', 'desc')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_transit', function ($row) {
                    $tgl = Carbon::parse($row->tgl_transit)->format('d/m/Y');
                    return $tgl;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn-list flex-nowrap">
                                <form method="POST" action="printPermintaan" target="_blank">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button type="submit" class="btn btn-sm btn-link btn-icon">
                                        <i class="fa-solid fa-eye" style="margin-right:5px;"></i>
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-link align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <form method="POST" action="printPermintaan" target="_blank">
                                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                                        <button type="submit" class="dropdown-item">
                                            <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-blue icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                            PRINT
                                        </button>
                                    </form>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalviewtransit" data-id="' . $row->id . '">
                                        <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-green icon-tabler icons-tabler-outline icon-tabler-file-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5" /><path d="M16.5 17.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0" /><path d="M18.5 19.5l2.5 2.5" /></svg>
                                        Lihat
                                    </a> 
                                  <a class="remove dropdown-item" href="javascript:void(0);" data-id="' . $row->noform_transit . '" data-nama="' . $row->namaBarang . '" data-desc="' . $row->keterangan . '">
                                    <svg style="margin-right:5px;" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon text-red icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    Hapus
                                </a>

                                </div>
                            </div>';
                    return $btn;
                })
                ->editColumn('select_orders', function ($row) {
                    return '';
                })
                ->rawColumns(['action', 'select_orders'])
                ->make(true);
        }

        return view('products.03_gudang.barang_transit', [
            'active' => 'BarangTransit',
            'judul' => 'Barang Transit',
        ]);
    }

    public function destroy($noform_transit)
    {
        try {
            DB::beginTransaction();

            // Hapus data dari transititm berdasarkan noform_transit
            DB::table('transititm')->where('noform_transit', $noform_transit)->delete();

            // Hapus data dari transit berdasarkan noform_transit
            DB::table('transit')->where('noform_transit', $noform_transit)->delete();

            DB::commit();
            return response()->json(['message' => 'Record deleted successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to delete record'], 500);
        }
    }
}
