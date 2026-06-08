<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama_lengkap' => 'Admin AgriConnect',
            'email' => 'admin@agri.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status_verifikasi' => 'Disetujui'
        ]);
    }
}