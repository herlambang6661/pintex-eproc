<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada 
        if ($user) {
            // jika user nya memiliki level admin
            if ($user->role == 'admin') {
                // arahkan ke halaman admin ya :P
                return redirect()->intended('dashboard');
            }
            // jika user nya memiliki level user
            else if ($user->role == 'balestore') {
                // arahkan ke halaman user
                return redirect()->intended('dashboard');
            }
        }
        return view('login');
    }
    //
    public function proses_login(Request $request)
    {
        // kita buat validasi pada saat tombol login di klik
        // validas nya username & password wajib di isi 
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Field Username diperlukan, tidak boleh kosong',
                'password.required' => 'Field Password diperlukan, tidak boleh kosong',
            ]
        );


        // ambil data request username & password saja 
        $credential = $request->only('username', 'password');

        // cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($credential)) {
            // kalau berhasil simpan data user ya di variabel $user
            $user =  Auth::user();
            // cek lagi jika level user admin maka arahkan ke halaman admin
            if ($user->role == 'admin') {
                // return redirect()->intended('admin');
                $arr = array('msg' => 'Username dan Password Valid, anda akan segera diarahkan ke halaman Dashboard', 'type' => 'success', 'status' => true);
                return Response()->json($arr);
            }
            // tapi jika level user nya user biasa maka arahkan ke halaman user
            else if ($user->role == 'user') {
                return redirect()->intended('user');
            }
            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesan error juga kalau login gagal ya
        $arr = array('msg' => 'Username atau Password Salah!', 'type' => 'error', 'status' => false);
        return Response()->json($arr);
        // return redirect('login')
        //     ->withInput()
        //     ->withErrors(['login_gagal' => 'These credentials does not match our records']);
    }

    public function logout(Request $request)
    {
        // logout itu harus menghapus session nya 

        $request->session()->flush();

        // jalan kan juga fungsi logout pada auth 

        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('login');
    }
}
