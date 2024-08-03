<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\PajakModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TarifPajakController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pajak');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" 
                                data-bs-target="#modal-edit"
                                data-bs-toggle="modal" 
                                class="btn btn-outline-info btn-sm btn-icon edit-btn" 
                                data-id="' . $row->id . '" 
                                data-tax_code="' . $row->tax_code . '" 
                                data-jenis_pajak="' . $row->jenis_pajak . '" 
                                data-rate="' . $row->rate . '">
                                <i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteForm = '<form id="deleteForm' . $row->id . '" action="/pajak/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.01_master.tarif-pajak.index', [
            'judul' => 'Halaman Tarif Pajak',
            'active' => 'Pajak'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tax_code' => 'required',
            'jenis_pajak' => 'required',
            'rate' => 'required',
        ]);

        $pajak = new PajakModel();
        $pajak->tax_code = $request->input('tax_code');
        $pajak->jenis_pajak = $request->input('jenis_pajak');
        $pajak->rate = $request->input('rate');
        $pajak->pembuat = auth()->user()->name;
        $pajak->save();

        if ($pajak->save()) {
            return redirect('/pajak')->with('success', 'Data tarif pajak berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data tarif pajak gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tax_code' => 'required',
            'jenis_pajak' => 'required',
            'rate' => 'required',
        ]);

        $pajak = PajakModel::findOrFail($id);
        $pajak->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Pajak updated successfully',
            'redirect' => route('pajak.index'),
        ]);
    }

    public function destroy($id)
    {
        $pajak = PajakModel::find($id);

        if ($pajak->delete()) {
            return redirect('/pajak')->with('success', 'Data tarif pajak berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data tarif pajak gagal di hapus, silahkan coba kembali');
        }
    }
}
