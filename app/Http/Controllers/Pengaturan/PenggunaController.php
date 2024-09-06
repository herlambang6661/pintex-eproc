<?php

namespace App\Http\Controllers\Pengaturan;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('products.06_pengaturan.index', [
            'judul' => 'Halaman Pengguna',
            'users' => $users,
            'active' => 'Pengguna'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $users = new User();

        $users->name = $request->input('name');
        $users->username = $request->input('username');
        $users->password = Hash::make($request->password);
        $users->role = $request->input('role');
        $users->save();

        if ($users->save()) {
            return redirect('/pengguna')->with('success', 'Data pengguna berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Data pengguna gagal ditambahkan, silahkan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required'
        ]);

        $users = User::find($id);

        $users->name = $request->input('name');
        $users->username = $request->input('username');
        $users->role = $request->input('role');
        $users->save();

        if ($users->save()) {
            return redirect('/pengguna')->with('success', 'Data pengguna berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data pengguna gagal diupdate, silahkan coba kembali');
        }
    }

    public function reset(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:5|confirmed',
        ]);
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->save()) {
            return redirect('/pengguna')->with('success', 'Data password pengguna berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Data password pengguna gagal diupdate, silahkan coba kembali');
        }
    }

    public function destroy($id)
    {
        $users = User::find($id);
        if ($users->delete()) {
            return redirect('/pengguna')->with('success', 'Data pengguna berhasil di hapus');
        } else {
            return redirect()->back()->with('error', 'Data pengguna gagal di tambahkan, silahkan coba kembali');
        }
    }

    public function checklistUpdate(Request $request, $id)
    {
        $request->validate([
            'p_pengadaan' => 'nullable|boolean',
            'c_permintaan' => 'nullable|boolean',
            'c_persetujuan' => 'nullable|boolean',
            'c_email' => 'nullable|boolean',
            'c_pembelian' => 'nullable|boolean',
            'c_status' => 'nullable|boolean',
            'p_gudang' => 'nullable|boolean',
            'c_stock' => 'nullable|boolean',
            'c_penerimaan' => 'nullable|boolean',
            'c_pengiriman' => 'nullable|boolean',
            'c_sample' => 'nullable|boolean',
            'c_transit' => 'nullable|boolean',
            'c_mutasi' => 'nullable|boolean',
            'p_teknik' => 'nullable|boolean',
            'c_servis' => 'nullable|boolean',
            'c_retur' => 'nullable|boolean',
            'c_pengambilan' => 'nullable|boolean',
            'p_laporan' => 'nullable|boolean',
            'c_lap_pemakaian' => 'nullable|boolean',
            'c_lap_pembelian' => 'nullable|boolean',
            'c_lap_stock' => 'nullable|boolean',
            'p_pengaturan' => 'nullable|boolean',
            'c_pengguna' => 'nullable|boolean',
        ]);

        $user = User::findOrFail($id);

        $updateFields = [
            'p_pengadaan',
            'c_permintaan',
            'c_persetujuan',
            'c_email',
            'c_pembelian',
            'c_status',
            'p_gudang',
            'c_stock',
            'c_penerimaan',
            'c_pengiriman',
            'c_sample',
            'c_transit',
            'c_mutasi',
            'p_teknik',
            'c_servis',
            'c_retur',
            'c_pengambilan',
            'p_laporan',
            'c_lap_pemakaian',
            'c_lap_pembelian',
            'c_lap_stock',
            'p_pengaturan',
            'c_pengguna',
        ];

        foreach ($updateFields as $field) {
            $user->$field = $request->has($field) ? 1 : 0;
        }

        $user->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
