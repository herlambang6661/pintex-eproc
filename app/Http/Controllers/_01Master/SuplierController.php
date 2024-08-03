<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\SuplierModel;
use App\Models\Master\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SuplierController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('suplier');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-bs-target="#modal-edit" data-bs-toggle="modal" data-id="' . $row->id . '" data-nama="' . $row->nama . '" data-tipe="' . $row->tipe . '" data-jabatan="' . $row->jabatan . '" data-npwp="' . $row->npwp . '" data-alamat="' . $row->alamat . '" data-kopos="' . $row->kopos . '" data-kota="' . $row->kota . '" data-provinsi="' . $row->provinsi . '" data-telp="' . $row->telp . '" data-contact="' . $row->contact . '" data-fax="' . $row->fax . '" data-email="' . $row->email . '" data-website="' . $row->website . '" data-catatan="' . $row->catatan . '" data-uang_id="' . $row->uang_id . '" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteForm = '<form id="deleteForm' . $row->id . '" action="/suplier/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $uang = UangModel::all();
        return view('products.01_master.suplier.index', [
            'judul' => 'Halaman Suplier',
            'active' => 'Suplier',
            'uang' => $uang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'alamat' => 'required',
            'kopos' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'telp' => 'required',
            'contact' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'catatan' => 'required',
            'uang_id' => 'required',
        ]);

        $suplier = new SuplierModel();
        $suplier->uang_id = $request->input('uang_id');
        $suplier->nama = $request->input('nama');
        $suplier->tipe = $request->input('tipe');
        $suplier->jabatan = $request->input('jabatan');
        $suplier->npwp = $request->input('npwp');
        $suplier->alamat = $request->input('alamat');
        $suplier->kopos = $request->input('kopos');
        $suplier->kota = $request->input('kota');
        $suplier->provinsi = $request->input('provinsi');
        $suplier->telp = $request->input('telp');
        $suplier->contact = $request->input('contact');
        $suplier->fax = $request->input('fax');
        $suplier->email = $request->input('email');
        $suplier->website = $request->input('website');
        $suplier->catatan = $request->input('catatan');
        $suplier->dibuat = auth()->user()->name;
        $suplier->save();

        if ($suplier->save()) {
            return redirect('/suplier')->with('success', 'Data suplier berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data suplier gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'jabatan' => 'required',
            'npwp' => 'required',
            'alamat' => 'required',
            'kopos' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'telp' => 'required',
            'contact' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'catatan' => 'required',
            'uang_id' => 'required',
        ]);

        $suplier = SuplierModel::findOrFail($id);
        $suplier->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Suplier updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $suplier = SuplierModel::find($id);
        if ($suplier->delete()) {
            return redirect('/suplier')->with('success', 'Data suplier berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data suplier gagal di hapus, silahkan coba kembali');
        }
    }
}
