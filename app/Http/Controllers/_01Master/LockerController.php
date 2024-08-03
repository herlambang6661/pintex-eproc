<?php

namespace App\Http\Controllers\_01Master;

use App\Models\Master\LockerModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LockerExport;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LockerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('locker')->select('id', 'qr', 'inisial', 'gudang', 'keterangan', 'qrcode');

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $detailBtn = '<a href="javascript:void(0)" data-bs-target="#modal-detail" data-id="' . $row->id . '" data-qrcode="' . $row->qrcode . '" data-inisial="' . $row->inisial . '" data-keterangan="' . $row->keterangan . '" data-bs-toggle="modal" class="btn btn-outline-success btn-sm btn-icon detail-btn"><i class="fa-solid fa-fw fa-eye"></i></a>';
                    $editBtn = '<a href="javascript:void(0)" data-bs-target="#modal-edit" data-id="' . $row->id . '" data-gudang="' . $row->gudang . '" data-inisial="' . $row->inisial . '" data-keterangan="' . $row->keterangan . '" data-bs-toggle="modal" class="btn btn-outline-info btn-sm btn-icon edit-btn"><i class="fa-solid fa-fw fa-edit"></i></a>';
                    $deleteBtn = '<form id="deleteForm' . $row->id . '" action="/locker/destroy/' . $row->id . '" method="POST" class="d-inline">' . csrf_field() . method_field('DELETE') . '<button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="confirmDelete(event, ' . $row->id . ')"><i class="fa-solid fa-fw fa-trash-can"></i></button></form>';
                    return $detailBtn . ' ' . $editBtn . ' ' . $deleteBtn;
                })
                ->addColumn('qrcode', function ($row) {
                    return '<img src="' . asset($row->qrcode) . '" alt="QR Code" width="40" height="40">';
                })
                ->rawColumns(['action', 'qrcode'])
                ->make(true);
        }

        return view('products.01_master.locker.index', [
            'judul' => 'Halaman Locker',
            'active' => 'Locker'
        ]);
    }


    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'inisial' => 'required|string|max:255',
            'gudang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $locker = new LockerModel();
        $locker->gudang = $request->input('gudang');
        $locker->inisial = $request->input('inisial');
        $locker->keterangan = $request->input('keterangan');
        $locker->dibuat = auth()->user()->name;

        // Generate QR code value
        $qrValue = $locker->gudang . '-' . $locker->inisial;

        // Generate QR code using endroid/qr-code
        $result = Builder::create()
            ->data($qrValue)
            ->size(200)
            ->build();

        // Define path for storing the QR code image
        $filename = 'public/qrcodes/' . $locker->inisial . '.png';

        // Log for debugging
        Log::info('QR code generated', ['qrValue' => $qrValue]);
        Log::info('Attempting to save QR code', ['filename' => $filename]);

        // Save QR code to storage
        $saveSuccess = Storage::put($filename, $result->getString());
        if (!$saveSuccess) {
            Log::error('Failed to save QR code to storage', ['filename' => $filename]);
            return redirect()->back()->with('error', 'Failed to save QR code');
        }

        // Set path qrcode in the model
        $locker->qr = $qrValue;
        $locker->qrcode = str_replace('public/', 'storage/', $filename);

        // Save data to database
        if ($locker->save()) {
            return redirect('/locker')->with('success', 'Data locker berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data locker gagal ditambahkan, silakan coba kembali');
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'inisial' => 'required|string|max:255',
            'gudang' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        // Dapatkan data locker yang ingin diperbarui
        $locker = LockerModel::findOrFail($id);

        // Perbarui nilai inisial, gudang, dan keterangan
        $locker->gudang = $request->input('gudang');
        $locker->inisial = $request->input('inisial');
        $locker->keterangan = $request->input('keterangan');
        $locker->dibuat = auth()->user()->name;

        // Generate QR code value
        $qrValue = $locker->gudang . '-' . $locker->inisial;

        // Generate QR code using endroid/qr-code
        $result = Builder::create()
            ->data($qrValue)
            ->size(200)
            ->build();

        // Define path for storing the QR code image
        $filename = 'public/qrcodes/' . $locker->inisial . '.png';

        // Log for debugging
        Log::info('QR code generated', ['qrValue' => $qrValue]);
        Log::info('Attempting to save QR code', ['filename' => $filename]);

        // Save QR code to storage
        Storage::put($filename, $result->getString());

        // Set path qrcode in the model
        $locker->qr = $qrValue;
        $locker->qrcode = str_replace('public/', 'storage/', $filename);

        // Save data to database
        return response()->json([
            'status' => true,
            'msg' => 'Locker updated successfully',
            'data' => $locker
        ]);
    }

    public function destroy($id)
    {
        // Dapatkan data locker yang ingin dihapus
        $locker = LockerModel::findOrFail($id);

        // Hapus file QR code terkait dari storage
        $qrcodePath = str_replace('storage/', 'public/', $locker->qrcode);
        if (Storage::exists($qrcodePath)) {
            Storage::delete($qrcodePath);
        }

        // Hapus entri dari database
        if ($locker->delete()) {
            return redirect('/locker')->with('success', 'Data locker berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data locker gagal dihapus, silakan coba kembali');
        }
    }
}
