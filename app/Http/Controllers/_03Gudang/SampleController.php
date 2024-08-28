<?php

namespace App\Http\Controllers\_03Gudang;

use App\Models\Gudang\Sample;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    public function sample()
    {
        return view('products.03_gudang.sample', [
            'active' => 'Sample',
            'judul' => 'Sample'
        ]);
    }

    public function getMasterSuplier(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $pemesan = DB::table('person')
                ->select(DB::raw('id, nama, jabatan'))
                ->where('tipe', '=', "INDIVIDU")
                ->where('nama', 'LIKE', "%$search%")
                ->orWhere('jabatan', 'LIKE', "%$search%")
                ->orderBy('nama', 'ASC')
                ->get();
        } else {
            $pemesan = DB::table('person')
                ->select(DB::raw('id, nama, jabatan'))
                ->where('tipe', '=', "INDIVIDU")
                ->orderBy('nama', 'ASC')
                ->get();
        }
        return Response()->json($pemesan);
    }

    public function getSample(Request $request)
    {
        $sample = DB::table('sample')
            ->select('id', 'noform', 'expedisi');

        if ($request->has('s')) {
            $search = $request->s;
            $sample->where('noform', 'LIKE', "%$search%")
                ->orWhere('expedisi', 'LIKE', "%$search%");
        }

        $sample = $sample->orderBy('noform', 'ASC')->get();

        return response()->json($sample);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'namaBarang.*' => 'required|string',
            'qty.*' => 'required|integer',
            'keterangan.*' => 'nullable|string',
            'suplier.*' => 'nullable|string',
            'expedisi.*' => 'nullable|string',
        ]);

        $checknoform = DB::table('sample')->orderBy('noform', 'desc')->first();
        $query = $checknoform ? $checknoform->noform : null;
        $noUrutForm = $query ? (int) substr($query, -5) : 0;
        $noUrutForm++;
        $charForm = 'L' . date('y-');
        $noform = $charForm . sprintf("%05d", $noUrutForm);

        $getkodeseri = DB::table('sample')->orderBy('kodeseri', 'desc')->first();
        $kdseri = $getkodeseri ? $getkodeseri->kodeseri : 'L' . date('y') . '000';
        $noUrutKodeseri = (int) substr($kdseri, -3);
        $noUrutKodeseri++;
        $charKodeseri = 'L' . date('y');
        $kodeseriItem = $charKodeseri . sprintf("%03d", $noUrutKodeseri);
        $subkodes = $kodeseriItem . '-01';

        foreach ($request->namaBarang as $index => $namaBarang) {
            Sample::create([
                'tanggal' => $request->tanggal,
                'noform' => $noform,
                'kodeseri' => $subkodes,
                'namaBarang' => strtoupper($namaBarang),
                'qty' => $request->qty[$index],
                'keterangan' => strtoupper($request->keterangan[$index] ?? ''),
                'suplier' => strtoupper($request->suplier[$index] ?? ''),
                'expedisi' => strtoupper($request->expedisi[$index] ?? ''),
            ]);
        }

        return response()->json([
            'success' => 'Data sample berhasil ditambahkan.',
        ]);
    }

    public function viewSample(Request $request)
    {
        // Validasi input
        $request->validate([
            'noform' => 'required|string',
        ]);

        // Ambil data sample berdasarkan noform
        $getsample = Sample::where('noform', $request->noform)->first();

        if (!$getsample) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        // Kirim data ke view dalam bentuk HTML
        $data = '
            <style>
                .stamp {
                    transform: rotate(12deg);
                    color: #555;
                    font-size: 2rem;
                    font-weight: 600;
                    border: 0.25rem solid #555;
                    display: inline-block;
                    padding: 0.25rem 1rem;
                    text-transform: uppercase;
                    border-radius: 1rem;
                    font-family: "Courier";
                    -webkit-mask-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/8399/grunge.png");
                    -webkit-mask-size: 944px 604px;
                    mix-blend-mode: multiply;
                }

                .is-nope {
                    color: #D23;
                    border: 0.5rem double #D23;
                    transform: rotate(3deg);
                    -webkit-mask-position: 2rem 3rem;
                    font-size: 2rem;
                }

                .is-approved {
                    color: #0A9928;
                    border: 0.5rem solid #0A9928;
                    -webkit-mask-position: 13rem 6rem;
                    transform: rotate(-14deg);
                    border-radius: 0;
                }

                .is-draft {
                    color: #C4C4C4;
                    border: 1rem double #C4C4C4;
                    transform: rotate(-5deg);
                    font-size: 6rem;
                    font-family: "Open sans", Helvetica, Arial, sans-serif;
                    border-radius: 0;
                    padding: 0.5rem;
                }
            </style>
             <div class="modal-body" style="color: black;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Tanggal & No Form
                        </div>
                        <div class="card-body">
    <label class="form-label">Tanggal Sampel</label>
    <div class="input-icon mb-2">
        <input name="tanggal" id="tanggal" class="form-control" placeholder="Select a date" id="datepicker-icon"
               value="' . Carbon::parse($getsample->tanggal)->format("d/m/Y") . '" disabled />
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                <path d="M16 3v4" />
                <path d="M8 3v4" />
                <path d="M4 11h16" />
                <path d="M11 15h1" />
                <path d="M12 15v3" />
            </svg>
        </span>
    </div>
    <label class="form-label">No. Form</label>
    <div class="input-icon mb-2">
        <input type="text" name="noform" id="noform" class="form-control" value="' . $getsample->noform . '" disabled />
    </div>
</div>

                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Keterangan Tambahan
                        </div>
                        <div class="card-body">
                            <p>' . nl2br(e($getsample->keteranganform)) . '</p>
                        </div>
                    </div>
                </div>
                </div>
                <hr>
                <div class="container">
                    <table class="table table-sm table-bordered table-hover"
                        style="color: black; border-color: black; text-transform: uppercase; font-size: 10px;">
                        <thead class="text-black" style="border-color: black;">
                            <tr>
                                <th style="border-color: black;" class="text-center">#</th>
                                <th style="border-color: black;" class="text-center">Kodeseri</th>
                                <th style="border-color: black;" class="text-center">Barang</th>
                                <th style="border-color: black;" class="text-center">QTY</th>
                                <th style="border-color: black;" class="text-center">Deskripsi</th>
                                <th style="border-color: black;" class="text-center">Suplier</th>
                                <th style="border-color: black;" class="text-center">Expedisi</th>
                            </tr>
                        </thead>
                        <tbody class="text-black" style="border-color: black;">
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">' . $getsample->kodeseri . '</td>
                                <td class="text-center">' . $getsample->namaBarang . '</td>
                                <td class="text-center">' . $getsample->qty . '</td>
                                <td class="text-center">' . $getsample->keterangan . '</td>
                                <td class="text-center">' . $getsample->suplier . '</td>
                                <td class="text-center">' . $getsample->expedisi . '</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        ';

        return response()->json($data);
    }


    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:samples,id',
            'tanggal' => 'required|date',
            'kodeseri.*' => 'required|string',
            'namaBarang.*' => 'required|string',
            'qty.*' => 'required|integer',
            'keterangan.*' => 'nullable|string',
            'supplier.*' => 'nullable|string',
            'expedisi.*' => 'nullable|string',
        ]);

        // Temukan data sample yang akan diperbarui
        $sample = Sample::find($request->id);

        if (!$sample) {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.'], 404);
        }

        // Perbarui data sample
        $sample->tanggal = $request->tanggal;
        // Perbarui kolom lain jika diperlukan

        // Hapus item lama terkait sample jika diperlukan
        // Contoh jika Anda menyimpan item terkait dalam tabel terpisah:
        // $sample->items()->delete();

        // Tambahkan item baru atau perbarui item yang ada
        foreach ($request->kodeseri as $index => $kodeseri) {
            // Update atau buat item baru
            $item = $sample->items()->updateOrCreate(
                ['kodeseri' => strtoupper($kodeseri)], // Gunakan kunci unik atau identifier lain
                [
                    'namaBarang' => strtoupper($request->namaBarang[$index]),
                    'qty' => $request->qty[$index],
                    'keterangan' => strtoupper($request->keterangan[$index] ?? ''),
                    'suplier' => strtoupper($request->supplier[$index] ?? ''),
                    'expedisi' => strtoupper($request->expedisi[$index] ?? ''),
                ]
            );
        }

        // Simpan data sample
        $sample->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data sample berhasil diperbarui.'
        ]);
    }
}
