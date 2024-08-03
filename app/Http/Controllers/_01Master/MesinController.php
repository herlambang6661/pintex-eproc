<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\MesinItmModel;
use App\Models\Master\MesinModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MesinController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('model') && $request->model === 'mesin') {
                $mesin = MesinModel::all();
                return DataTables::of($mesin)
                    ->addColumn('action', function ($row) {
                        $editBtn = '<a href="javascript:void(0)" data-bs-target="#modal-edit-mesin"  data-bs-toggle="modal" data-id="' . $row->id . '" data-mesin="' . $row->mesin . '" data-unit="' . $row->unit . '" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                        $deleteForm = '<form id="deleteForm' . $row->id . '" action="/mesin/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                        return $editBtn . ' ' . $deleteForm;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            if ($request->has('model') && $request->model === 'mesinitm') {
                $mesinitm = MesinItmModel::with('mesin')->get();
                return DataTables::of($mesinitm)
                    ->addColumn('action', function ($row) {
                        $editBtn = '<a href="javascript:void(0)" data-bs-target="#modal-edit-mesinitm" data-id_itm="' . $row->id_itm . '" data-id_mesin="' . $row->id_mesin . '" data-merk="' . $row->merk . '" data-kode_nomor="' . $row->kode_nomor . '" data-bs-toggle="modal" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                        $deleteForm = '<form id="deleteForm' . $row->id_itm . '" action="/itm/destroy/' . $row->id_itm . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id_itm . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                        return $editBtn . ' ' . $deleteForm;
                    })
                    ->addColumn('mesin_nama', function ($row) {
                        return $row->mesin->mesin;
                    })
                    ->addColumn('mesin_unit', function ($row) {
                        return $row->mesin->unit;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        // Pass the required data to the view
        return view('products.01_master.mesin.index', [
            'judul' => 'Halaman Mesin',
            'active' => 'Mesin',
            'mesin' => MesinModel::all() // Add this line to ensure $mesin is available in the view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mesin' => 'required',
            'unit' => 'required',
        ]);

        $mesin = new MesinModel();
        $mesin->mesin = $request->input('mesin');
        $mesin->unit = $request->input('unit');
        $mesin->dibuat = auth()->user()->name;
        $mesin->save();

        if ($mesin->save()) {
            return redirect('/mesin')->with('success', 'Data mesin berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data mesin gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mesin' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

        $mesin = MesinModel::findOrFail($id);
        $mesin->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Mesin updated successfully!',
        ]);
    }



    public function destroy($id)
    {
        $mesin = MesinModel::find($id);
        if ($mesin->delete()) {
            return redirect('/mesin')->with('success', 'Data mesin berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data mesin gagal di hapus , silahkan coba kembali');
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------MASTER MESIN ITM--------------------------------------------------------------//

    public function itmStore(Request $request)
    {
        $request->validate([
            'id_mesin' => 'required',
            'merk' => 'required',
            'kode_nomor' => 'required',
        ]);

        $id_mesin = $request->input('id_mesin');
        $merk = strtoupper($request->input('merk'));
        $kode_nomor = strtoupper($request->input('kode_nomor'));

        // Menggabungkan id_mesin dan merk untuk id_mesinitm
        $id_mesinitm = strtoupper($id_mesin . $merk);

        $mesinitm = new MesinItmModel();
        $mesinitm->id_mesin = $id_mesin;
        $mesinitm->merk = $merk;
        $mesinitm->kode_nomor = $kode_nomor;
        $mesinitm->id_mesinitm = $id_mesinitm; // Assign id_mesinitm
        $mesinitm->dibuat = auth()->user()->name;
        $mesinitm->save();

        if ($mesinitm->save()) {
            return redirect('/mesin')->with('success', 'Data mesinItm berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data mesinItm gagal ditambahkan, silakan coba kembali');
        }
    }

    public function itmUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_mesin' => 'required',
            'merk' => 'required',
            'kode_nomor' => 'required',
        ]);

        $mesinitm =  MesinItmModel::findOrFail($id);
        $mesinitm->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Mesinitm updated successfully'
        ]);
    }

    public function itmDestroy($id)
    {
        $mesinitm = MesinItmModel::find($id);
        if ($mesinitm->delete()) {
            return redirect('/mesin')->with('success', 'Data mesinItm berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data mesinItm gagal di hapus , silahkan coba kembali');
        }
    }
}
