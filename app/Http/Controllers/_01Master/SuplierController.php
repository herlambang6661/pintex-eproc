<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\SuplierModel;
use App\Models\Master\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SuplierController extends Controller
{
    public function index()
    {
        $suplier = SuplierModel::all();
        $uang = UangModel::all();
        return view('products.01_master.suplier.index', [
            'judul' => 'Halaman Suplier',
            'suplier' => $suplier,
            'uang' => $uang,
            'active' => 'Suplier'
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

        $suplier = SuplierModel::find($id);
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
        $suplier->dibuat = auth()->user()->id;
        $suplier->save();

        if ($suplier->save()) {
            return redirect('/suplier')->with('success', 'Data suplier berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data suplier gagal di update, silahkan coba kembali');
        }
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
