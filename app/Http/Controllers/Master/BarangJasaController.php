<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\BarangJasaModel;
use App\Models\Master\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BarangJasaController extends Controller
{
    public function index()
    {
        $barang = BarangJasaModel::all();
        return view('products.01_master.barang&jasa.index', [
            'judul' => 'Halaman Barang & Jasa',
            'barang' => $barang,
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
        $request->validate([
            'keterangan' => 'required',
            // 'satuan' => 'required',
            'jurnal' => 'required',
            'persediaan' => 'required',
            'penjualan' => 'required',
            'pembelian' => 'required',
        ]);

        $barang = BarangJasaModel::find($id);
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
            return redirect('/barang')->with('success', 'Data barang jasa berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data barang jasa gagal di update, silahkan coba kembali');
        }
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
