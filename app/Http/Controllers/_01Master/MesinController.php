<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\MesinItmModel;
use App\Models\Master\MesinModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        $mesin = MesinModel::all();
        $mesinitm = MesinItmModel::all();

        return view('products.01_master.mesin.index', [
            'judul' => 'Halaman Mesin',
            'mesin' => $mesin,
            'mesinitm' => $mesinitm,
            'active' => 'Mesin'
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
        $request->validate([
            'mesin' => 'required',
            'unit' => 'required',
        ]);

        $mesin = MesinModel::find($id);
        $mesin->mesin = $request->input('mesin');
        $mesin->unit = $request->input('unit');
        $mesin->save();

        if ($mesin->save()) {
            return redirect('/mesin')->with('success', 'Data mesin berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data mesin gagal di update , silahkan coba kembali');
        }
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
        $request->validate([
            'id_mesin' => 'required',
            'merk' => 'required',
            'kode_nomor' => 'required',
        ]);

        $mesinitm =  MesinItmModel::find($id);
        $mesinitm->id_mesin = $request->input('id_mesin');
        $mesinitm->merk = $request->input('merk');
        $mesinitm->kode_nomor = $request->input('kode_nomor');
        $mesinitm->save();

        if ($mesinitm->save()) {
            return redirect('/mesin')->with('success', 'Data mesinItm berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data mesinItm gagal di tambahkan, silahkan coba kembali');
        }
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
