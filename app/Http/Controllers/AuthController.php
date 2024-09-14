<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('login');
    }

    /**  
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            if (Auth::attempt($request->only(["username", "password"]))) {
                if (Auth::user()->entitas_all == 1) {
                    session(['entitas' => ""]);
                    return response()->json([
                        "status" => true,
                        "redirect" => url("dashboard")
                    ]);
                    // return response()->json([
                    //     "status" => true,
                    //     "redirect" => url("landing")
                    // ]);
                } else {
                    if (Auth::user()->entitas_pintex == 1) {
                        $ent = "PINTEX";
                    } elseif (Auth::user()->entitas_tfi == 1) {
                        $ent = "TFI";
                    }
                    session(['entitas' => $ent]);
                    return response()->json([
                        "status" => true,
                        "redirect" => url("dashboard")
                    ]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "header" => "Invalid credentials",
                    "errors" => ["Cek Username & Password Anda"],
                ]);
            }
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        }

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $countPermintaan = DB::table('permintaanitm')->count();
            $countHold = DB::table('permintaanitm')->where('status', 'like', '%HOLD%')->count();
            $countReject = DB::table('permintaanitm')->where('status', 'like', '%REJECT%')->count();
            $countServis = DB::table('servisitm')->count();
            $qtyPermintaan = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PERSETUJUAN')
                ->orWhere('status', "=", 'ACC')
                ->orWhere('status', "=", 'MENUNGGU ACC')
                ->orWhere('status', "=", 'PROSES PEMBELIAN')
                ->count();
            $permintaan = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PERSETUJUAN')
                ->orWhere('status', "=", 'ACC')
                ->orWhere('status', "=", 'MENUNGGU ACC')
                ->orWhere('status', "=", 'PROSES PEMBELIAN')
                ->orderBy('tgl', 'asc')
                ->limit('50')
                ->get();
            $qtyPembelian = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PEMBELIAN')
                ->orderBy('tgl', 'asc')
                ->limit('50')
                ->count();
            $pembelian = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PEMBELIAN')
                ->orderBy('tgl', 'asc')
                ->limit('50')
                ->get();

            return view('products.dashboard', [
                'active' => 'Dashboard',
                'judul' => 'Dashboard',

                'countPermintaan' => $countPermintaan,
                'countHold' => $countHold,
                'countReject' => $countReject,
                'countServis' => $countServis,
                'permintaan' => $permintaan,
                'qtyPermintaan' => $qtyPermintaan,
                'pembelian' => $pembelian,
                'qtyPembelian' => $qtyPembelian,
            ]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function setSession(Request $request)
    {
        if (Auth::check()) {
            $countPermintaan = DB::table('permintaanitm')->count();
            $countHold = DB::table('permintaanitm')->where('status', 'like', '%HOLD%')->count();
            $countReject = DB::table('permintaanitm')->where('status', 'like', '%REJECT%')->count();
            $countServis = DB::table('servisitm')->count();
            $qtyPermintaan = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PERSETUJUAN')
                ->orWhere('status', "=", 'ACC')
                ->orWhere('status', "=", 'MENUNGGU ACC')
                ->orWhere('status', "=", 'PROSES PEMBELIAN')
                ->count();
            $permintaan = DB::table('permintaanitm')
                ->where('tgl', '>=', now()->subMonths(24))
                ->where('status', "=", 'PROSES PERSETUJUAN')
                ->orWhere('status', "=", 'ACC')
                ->orWhere('status', "=", 'MENUNGGU ACC')
                ->orWhere('status', "=", 'PROSES PEMBELIAN')
                ->orderBy('tgl', 'asc')
                ->limit('50')
                ->get();

            if ($request->entitas == 'ALL') {
                session(['entitas' => '']);
            } else {
                session(['entitas' => $request->entitas]);
            }
            // pemanggilan : Session::get('entitas') 
            return view('products.dashboard', [
                'active' => 'Dashboard',
                'judul' => 'Dashboard',

                'countPermintaan' => $countPermintaan,
                'countHold' => $countHold,
                'countReject' => $countReject,
                'countServis' => $countServis,
                'permintaan' => $permintaan,
                'qtyPermintaan' => $qtyPermintaan,
            ]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
