<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\PajakModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TarifPajakController extends Controller
{
    public function index()
    {
        $pajak = PajakModel::all();
        return view('products.01_master.tarif-pajak.index', [
            'judul' => 'Halaman Tarif Pajak',
            'pajak' => $pajak,
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
        $request->validate([
            'tax_code' => 'required',
            'jenis_pajak' => 'required',
            'rate' => 'required',
        ]);

        $pajak = PajakModel::find($id);
        $pajak->tax_code = $request->input('tax_code');
        $pajak->jenis_pajak = $request->input('jenis_pajak');
        $pajak->rate = $request->input('rate');
        $pajak->save();

        if ($pajak->save()) {
            return redirect('/pajak')->with('success', 'Data tarif pajak berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data tarif pajak gagal di update, silahkan coba kembali');
        }
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
