<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return User::select(
            'id',
            'nama_lengkap',
            'email',
            'role',
            'alamat_pengiriman',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Email',
            'Role',
            'Alamat Pengiriman',
            'Tanggal Dibuat'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Baris pertama
                'font' => [
                    'bold' => true,
                ],
            ],
        ];
    }
}