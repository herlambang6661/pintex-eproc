<?php

namespace App\Exports;

use App\Models\LockerModel;
use App\Models\Master\LockerModel as MasterLockerModel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LockerExport implements FromQuery, WithHeadings, WithMapping, WithDrawings, ShouldAutoSize
{
    public function query()
    {
        return MasterLockerModel::query();
    }

    public function map($locker): array
    {
        return [
            $locker->id,
            $locker->qr,
            $locker->inisial,
            $locker->gudang,
            $locker->keterangan,
            Storage::path('qrcodes/' . $locker->inisial . '.png'), // Path to QR code image
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'QR Code',
            'Inisial',
            'Gudang',
            'Keterangan',
            'QR Code Image', // Column for QR code image
        ];
    }

    public function drawings()
    {
        $lockers = MasterLockerModel::all();
        $drawings = [];

        foreach ($lockers as $index => $locker) {
            $imagePath = public_path($locker->qrcode);

            if (file_exists($imagePath)) {
                $drawing = new MemoryDrawing();
                $drawing->setName('QR Code');
                $drawing->setDescription('QR Code');
                $drawing->setImageResource(imagecreatefromstring(file_get_contents($imagePath)));
                $drawing->setRenderingFunction(MemoryDrawing::RENDERING_PNG);
                $drawing->setMimeType(MemoryDrawing::MIMETYPE_PNG);
                $drawing->setCoordinates('F' . ($index + 2));
                $drawing->setHeight(100); // Set the height of the image

                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }
}
