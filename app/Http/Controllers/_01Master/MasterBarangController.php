<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\MasterBarangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function index()
    {
        $masterbarang = MasterBarangModel::all();
        return view('products.01_master.barang.index', [
            'judul' => 'Halaman Master Barang',
            'masterbarang' => $masterbarang,
            'active' => 'Barang'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'inisial' => 'required',
        ]);

        $barang = new MasterBarangModel();
        $barang->nama = $request->input('nama');
        $barang->inisial = $request->input('inisial');
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
        $request->validate([
            'nama' => 'required',
            // 'inisial' => 'required',
        ]);

        $barang =  MasterBarangModel::find($id);
        $barang->nama = $request->input('nama');
        // $barang->inisial = $request->input('inisial');
        $barang->dibuat = auth()->user()->name;

        $barang->save();

        if ($barang->save()) {
            return redirect('/masterBarang')->with('success', 'Data master barang berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data master barang gagal di update, silahkan coba kembali');
        }
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
