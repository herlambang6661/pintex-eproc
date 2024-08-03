<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\UangModel as MasterUangModel;
use App\Models\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('uang');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editBtn = ' <a href="javascript:void(0)" data-id="' . $row->id . '" data-inisial="' . $row->inisial . '" data-kurs="' . $row->kurs . '" data-negara="' . $row->negara . '" data-simbol="' . $row->simbol . '" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteForm = '<form id="deleteForm' . $row->id . '" action="/uang/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.01_master.uang.index', [
            'judul' => 'Halaman Kelola Mata Uang',
            'active' => 'Uang'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'inisial' => 'required',
            'kurs' => 'required',
            'negara' => 'required',
            'simbol' => 'required',
        ]);

        $uang = new MasterUangModel();
        $uang->inisial = $request->input('inisial');
        $uang->kurs = $request->input('kurs');
        $uang->negara = $request->input('negara');
        $uang->simbol = $request->input('simbol');
        $uang->pembuat = auth()->user()->name;
        $uang->save();

        if ($uang->save()) {
            return redirect('/uang')->with('success', 'Data uang berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data uang gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'inisial' => 'required',
            'kurs' => 'required',
            'negara' => 'required',
            'simbol' => 'required',
        ]);

        $uang = MasterUangModel::findOrFail($id);
        $uang->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Uang updated successfully',
            'redirect' => route('uang.index')
        ]);
    }

    public function destroy($id)
    {
        $uang = MasterUangModel::find($id);

        if ($uang->delete()) {
            return redirect('/uang')->with('success', 'Data uang berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data uang gagal di hapus, silahkan coba kembali');
        }
    }
}
