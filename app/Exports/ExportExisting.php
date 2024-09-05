<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;

class ExportExisting implements FromQuery, ShouldQueue, WithHeadings, WithCustomChunkSize
{

    use Exportable;
    // protected $dari, $sampai;

    // function __construct($dari, $sampai)
    // {
    //     $this->dari = $dari;
    //     $this->sampai = $sampai;
    // }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Entitas',
            'Kodeseri',
            'NamaBarang',
            'Jenis',
            'Noform',
            'Deskripsi',
            'Katalog',
            'Part',
            'Qty',
            'Qty ACC',
            'Satuan',
            'Pemesan',
            'Unit',
            'Peruntukan',
            'Dibeli',
            'Status',
            'Urgent',
            'Tgl Qty Acc',
            'Tgl Acc',
            'Dibuat',
        ];
    }

    public function query()
    {
        return DB::table('permintaanitm as p')
            // ->join('penerimaan_karyawan as k', 'a.userid', '=', 'k.userid')
            ->select('p.tgl', 'p.entitas', 'p.kodeseri', 'p.namaBarang', 'p.jenis', 'p.noform', 'p.keterangan', 'p.katalog', 'p.part', 'p.qty', 'p.qtyacc', 'p.satuan', 'p.pemesan', 'p.unit', 'p.peruntukan', 'p.dibeli', 'p.status', 'p.urgent', 'p.tgl_qty_acc', 'p.tgl_acc', 'p.dibuat')
            ->where('p.tgl', '>=', now()->subMonths(24))
            ->where('p.status', "=", 'PROSES PERSETUJUAN')
            ->orWhere('p.status', "=", 'ACC')
            ->orWhere('p.status', "=", 'MENUNGGU ACC')
            ->orWhere('p.status', "=", 'PROSES PEMBELIAN')
            ->orderBy('p.tgl');
        // return $data;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
