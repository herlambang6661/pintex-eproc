<?php

namespace App\Http\Controllers\_03Gudang;

use App\Models\Gudang\Transit;
use App\Models\Gudang\TransitItm;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangTransitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Jakarta');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    public function barangTransit()
    {
        return view('products.03_gudang.barang_transit', [
            'active' => 'BarangTransit',
            'judul' => 'Barang Transit',
        ]);
    }

    public function Suplierget(Request $request)
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

    public function getBarang(Request $request)
    {
        $barangQuery = DB::table('transititm')
            ->select('id', 'noform_transit', 'namaBarang')
            ->orderBy('namaBarang', 'ASC');

        if ($request->has('b')) {
            $search = $request->b;
            $barangQuery->where('namaBarang', 'LIKE', "%$search%")
                ->orWhere('noform_transit', 'LIKE', "%$search");
        }

        $barang = $barangQuery->orderBy('namaBarang')->get();

        // Format data untuk Select2
        $formattedBarang = $barang->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => strtoupper($item->namaBarang)
            ];
        });

        return response()->json(['results' => $formattedBarang]);
    }

    public function detailTransit(Request $request)
    {
        $gettransit = DB::table('transititm')->where('id', $request->id)->first();

        if (!$gettransit) {
            return response()->json(['message' => 'Data not found'], 404);
        }

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
                            <div class="card-header">Tanggal & No Form</div>
                            <div class="card-body">
                                <label class="form-label">Tanggal Sampel</label>
                                <div class="input-icon mb-2">
                                    <input name="tanggal" id="tanggal" class="form-control" placeholder="Select a date" id="datepicker-icon"
                                           value="' . Carbon::parse($gettransit->tgl_transit)->format("d/m/Y") . '" disabled />
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
                                    <input type="text" name="noform" id="noform" class="form-control" value="' . $gettransit->noform_transit . '" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Keterangan Tambahan</div>
                            <div class="card-body">
                                <p>' . nl2br(e($gettransit->keterangan)) . '</p>
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
                                <td class="text-center">' . $gettransit->kodeseri . '</td>
                                <td class="text-center">' . $gettransit->namaBarang . '</td>
                                <td class="text-center">' . $gettransit->qty . '</td>
                                <td class="text-center">' . $gettransit->satuan . '</td>
                                <td class="text-center">' . $gettransit->suplier . '</td>
                                <td class="text-center">' . $gettransit->keterangan . '</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        ';

        // Return the generated HTML as JSON
        return response()->json($data);
    }



    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'keteranganform' => 'nullable|string',
            'jenis' => 'required|array',
            'namaBarang' => 'required|array',
            'qty' => 'required|array',
            'satuan' => 'required|array',
            'suplier' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        // Ambil noform terakhir dari tabel transit
        $checknoform = DB::table('transit')->orderBy('noform_transit', 'desc')->first();
        $query = $checknoform ? $checknoform->noform_transit : null;

        // Tentukan nomor urut baru
        $noUrutForm = $query ? (int) substr($query, -5) + 1 : 1;
        $charForm = 'T' . date('y-');
        $noform = $charForm . sprintf("%05s", $noUrutForm);

        // Buat record baru di tabel Transit
        $transit = Transit::create([
            'tgl' => $request->tanggal,
            'noform_transit' => $noform,
            'gaketerangan_global' => $request->keteranganform,
            'dibuat' => auth()->user()->name, // Contoh: set nama pengguna saat ini sebagai pembuat
        ]);

        // Ambil kodeseri terakhir dari tabel transititm
        $getkodeseri = DB::table('transititm')->orderBy('kodeseri', 'desc')->first();
        $kdseri = $getkodeseri ? $getkodeseri->kodeseri : null;

        // Tentukan nomor urut kodeseri baru
        $noUrutKodeseri = $kdseri ? (int) substr($kdseri, -3) + 1 : 1;
        $charKodeseri = 'T' . date('y');

        // Buat record di tabel TransitItm untuk setiap item
        foreach ($request->jenis as $index => $jenisValue) {
            $kodeseriItem = $charKodeseri . sprintf("%03s", $noUrutKodeseri);
            $subkodes = $kodeseriItem . '-01';

            TransitItm::create([
                'noform_transit' => $noform,
                'kodeseri' => $subkodes,
                'tgl_transit' => $request->tanggal,
                'namaBarang' => $request->namaBarang[$index],
                'qty' => $request->qty[$index],
                'satuan' => $request->satuan[$index],
                'suplier' => $request->suplier[$index],
                'keterangan' => $request->keterangan[$index],
                'jenis' => $jenisValue,
                'dibuat' => auth()->user()->name,
            ]);

            // Update nomor urut kodeseri untuk iterasi berikutnya
            $noUrutKodeseri++;
        }

        return response()->json(['success' => true, 'message' => 'Data has been saved']);
    }

    public function viewEditTransit(Request $request)
    {
        $getItem = \App\Models\Gudang\TransitItm::find($request->id);

        if (!$getItem) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        // $actionUrl = route('transit.update', $getItem->id);

        $data = '
       
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="card bg-pink-lt shadow rounded border border-blue">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label class="form-label">Noform</label>
                                    <input type="text" class="form-control border border-blue" disabled value="' . e($getItem->noform_transit) . '">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control border border-blue" name="tanggal" value="' . e($getItem->tgl_transit) . '">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-azure-lt shadow rounded border border-blue">
                    <div class="card-body">
                        <div class="mb-2">
                            <label class="form-label">Kodeseri</label>
                            <input type="text" class="form-control" name="kodeseri" value="' . e($getItem->kodeseri) . '">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="namaBarang" value="' . e($getItem->namaBarang) . '">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="' . e($getItem->keterangan) . '">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-orange-lt shadow rounded border border-blue">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label class="form-label">Qty</label>
                                    <input type="number" class="form-control" name="qty" value="' . e($getItem->qty) . '">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label class="form-label">Jenis</label>
                                    <input type="text" class="form-control" name="expedisi" value="' . e($getItem->jenis) . '">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label class="form-label">Suplier</label>
                                    <select required name="suplier[]" class="form-select elementprm inputNone" style="text-transform: uppercase;">
                                        <option value="' . e($getItem->suplier) . '" selected="selected">' . e($getItem->suplier) . '</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="hr-text text-blue">Keterangan Tambahan</div>
            <div class="control-group col-lg-12">
                <div id="ketTamb" class="shadow rounded border border-blue">
                    <div class="mb-3">
                        <textarea id="tinymce-edit" name="keteranganform">' . e($getItem->keteranganform) . '</textarea>
                    </div>
                </div>
            </div>
        </div>
       <div class="modal-footer">
                    <button type="submit" class="btn btn-primary me-auto" data-bs-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/libs/tinymce/tinymce.min.js" defer></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // Inisialisasi Select2
                $(".elementprm").select2({
                    dropdownParent: $("#modalEdittransit"),
                    language: "id",
                    placeholder: "Pilih Pemesan",
                    ajax: {
                        url: "/Suplierget",
                        dataType: "json",
                        delay: 200,
                        processResults: function(response) {
                            return {
                                results: $.map(response, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.nama.toUpperCase()
                                    }
                                })
                            };
                        },
                        cache: true
                    }
                });
    
                // Inisialisasi TinyMCE
                let options = {
                    selector: "#tinymce-edit",
                    height: 300,
                    menubar: false,
                    statusbar: false,
                    toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent | forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
                    content_style: "body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }"
                };
                if (localStorage.getItem("tablerTheme") === "dark") {
                    options.skin = "oxide-dark";
                    options.content_css = "dark";
                }
                tinyMCE.init(options);
            });
        </script>
        ';

        return response()->json($data);
    }
}
