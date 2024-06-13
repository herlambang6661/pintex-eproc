<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\LockerModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LockerExport;

class LockerController extends Controller
{
    public function index()
    {
        $locker = LockerModel::all();
        return view('products.01_master.locker.index', [
            'judul' => 'Halaman Locker',
            'locker' => $locker,
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
            return redirect('/locker')->with('success', 'Data locker berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data locker gagal diperbarui, silakan coba kembali');
        }
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

    public function download()
    {
        return Excel::download(new LockerExport, 'Data Locker.xlsx');
    }
}
