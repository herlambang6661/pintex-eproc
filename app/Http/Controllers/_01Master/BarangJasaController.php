<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\BarangJasaModel;
use App\Models\Master\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BarangJasaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('barangjasa');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $viewBtn = ' <a href="javascript:void(0)" data-id="' . $row->id . '" data-keterangan="' . $row->keterangan . '" data-satuan="' . $row->satuan . '" data-jurnal="' . $row->jurnal . '" data-persediaan="' . $row->persediaan . '" data-penjualan="' . $row->penjualan . '" data-pembelian="' . $row->pembelian . '" data-penerimaan="' . $row->penerimaan . '" data-pembayaran="' . $row->pembayaran . '" class="btn btn-outline-success btn-sm btn-icon view-btn"><i class="fa-solid fa-fw fa-eye"></i></a>';
                    $editBtn = ' <a href="javascript:void(0)" data-id="' . $row->id . '" data-keterangan="' . $row->keterangan . '" data-satuan="' . $row->satuan . '" data-jurnal="' . $row->jurnal . '" data-persediaan="' . $row->persediaan . '" data-penjualan="' . $row->penjualan . '" data-pembelian="' . $row->pembelian . '" data-penerimaan="' . $row->penerimaan . '" data-pembayaran="' . $row->pembayaran . '" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteForm = '<form id="deleteForm' . $row->id . '" action="/barang/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $viewBtn  . ' ' .  $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.01_master.barang&jasa.index', [
            'judul' => 'Halaman Barang & Jasa',
            'active' => 'BarangJasa'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            // 'satuan' => 'required',
            'jurnal' => 'required',
            'persediaan' => 'required',
            'penjualan' => 'required',
            'pembelian' => 'required',
        ]);

        $barang = new BarangJasaModel();
        $barang->keterangan = $request->input('keterangan');
        $barang->satuan = 'UNIT';
        $barang->jurnal = $request->input('jurnal');
        $barang->persediaan = $request->input('persediaan');
        $barang->penjualan = $request->input('penjualan');
        $barang->pembelian = $request->input('pembelian');
        $barang->penerimaan = $request->input('penerimaan');
        $barang->pembayaran = $request->input('pembayaran');
        $barang->catatan = $request->input('catatan');
        $barang->dibuat = auth()->user()->name;
        $barang->save();

        if ($barang->save()) {
            return redirect('/barang')->with('success', 'Data barang jasa berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data barang jasa gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'jurnal' => 'required',
            'persediaan' => 'required',
            'penjualan' => 'required',
            'pembelian' => 'required',
        ]);

        $barang = BarangJasaModel::findOrFail($id);
        $barang->update($validatedData);

        return response()->json([
            'status' => true,
            'msg' => 'Barang jasa updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $barang = BarangJasaModel::find($id);

        if ($barang->delete()) {
            return redirect('/barang')->with('success', 'Data barang jasa berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data barang jasa gagal di hapus, silahkan coba kembali');
        }
    }
}
