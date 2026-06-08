<?php

namespace App\Exports;

use App\Models\Lahan;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LahanExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    public function collection()
    {
        return Lahan::select(
            'id',
            'komoditas',
            'luas_lahan',
            'estimasi_panen',
            'deskripsi',
            'alamat_lahan',
            'harga_min',
            'harga_max',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Komoditas',
            'Luas Lahan',
            'Estimasi Panen',
            'Deskripsi',
            'Alamat Lahan',
            'Harga Minimum',
            'Harga Maksimum',
            'Tanggal Dibuat'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'D9D9D9',
                ],
            ],
        ]);
    }
}