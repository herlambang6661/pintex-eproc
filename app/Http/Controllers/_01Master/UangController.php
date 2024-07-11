<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\UangModel as MasterUangModel;
use App\Models\UangModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UangController extends Controller
{
    public function index()
    {
        $uang = MasterUangModel::all();
        return view('products.01_master.uang.index', [
            'judul' => 'Halaman Kelola Mata Uang',
            'uang' => $uang,
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
        $request->validate([
            'inisial' => 'required',
            'kurs' => 'required',
            'negara' => 'required',
            'simbol' => 'required',
        ]);

        $uang = MasterUangModel::find($id);
        $uang->inisial = $request->input('inisial');
        $uang->kurs = $request->input('kurs');
        $uang->negara = $request->input('negara');
        $uang->simbol = $request->input('simbol');

        $uang->save();

        if ($uang->save()) {
            return redirect('/uang')->with('success', 'Data uang berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data uang gagal di update, silahkan coba kembali');
        }
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
