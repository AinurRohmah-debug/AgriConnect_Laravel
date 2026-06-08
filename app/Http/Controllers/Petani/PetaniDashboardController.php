<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Lahan;
use App\Models\ActivityLog;

class PetaniDashboardController extends Controller
{
    public function index()
    {
        $petaniId = session('user.id');

        $totalProduk = Produk::where('petani_id', $petaniId)->count();
        $totalLahan = Lahan::where('petani_id', $petaniId)->count();

        $produkTerbaru = Produk::where('petani_id', $petaniId)
            ->latest()
            ->take(5)
            ->get();

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Mengakses dashboard petani'
        ]);

        return view('petani.dashboard', compact(
            'totalProduk',
            'totalLahan',
            'produkTerbaru'
        ));
    }
}