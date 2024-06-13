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
}
