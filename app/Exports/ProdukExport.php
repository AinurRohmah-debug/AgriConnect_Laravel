<?php

namespace App\Exports;

use App\Models\Produk;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProdukExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    public function collection()
    {
        return Produk::select(
            'id',
            'nama_produk',
            'kategori',
            'harga',
            'stok',
            'satuan',
            'deskripsi',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Produk',
            'Kategori',
            'Harga',
            'Stok',
            'Satuan',
            'Deskripsi',
            'Tanggal Dibuat'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->applyFromArray([
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