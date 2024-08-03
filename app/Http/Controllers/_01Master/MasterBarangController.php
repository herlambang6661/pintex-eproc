<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\MasterBarangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MasterBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('masterbarang');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-bs-target="#modal-edit" data-id_masterbarang="' . $row->id_masterbarang . '" data-kodebarang="' . $row->kodebarang . '" data-nama="' . $row->nama . '"
                    data-bs-toggle="modal" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteForm = '<form id="deleteForm' . $row->id_masterbarang . '" action="/masterBarang/destroy/' . $row->id_masterbarang . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id_masterbarang . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.01_master.barang.index', [
            'judul' => 'Halaman Master Barang',
            'active' => 'Barang'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodebarang' => 'required',
            'nama' => 'required',
            'inisial' => 'required',
            'tipe' => 'required',
        ]);

        $barang = new MasterBarangModel();
        $barang->kodebarang = strtoupper($request->input('kodebarang'));
        $barang->nama = strtoupper($request->input('nama'));
        $barang->inisial = strtoupper($request->input('inisial'));
        $barang->tipe = $request->input('tipe');
        $barang->dibuat = auth()->user()->name;

        $barang->save();

        if ($barang->save()) {
            return redirect('/masterBarang')->with('success', 'Data master barang berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data master barang gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kodebarang' => 'required',
        ]);

        $barang =  MasterBarangModel::findOrFail($id);
        $barang->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Master barang updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $barang = MasterBarangModel::find($id);

        if ($barang->delete()) {
            return redirect('/masterBarang')->with('success', 'Data master barang berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data master barang gagal di hapus, silahkan coba kembali');
        }
    }
}
