<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Lahan;
use App\Models\ActivityLog;

class PembeliDashboardController extends Controller
{
    public function index()
    {
        $pembeliId = session('user.id');

        $totalKeranjang = Keranjang::where('pembeli_id', $pembeliId)->count();
        $totalPesanan = Pesanan::where('pembeli_id', $pembeliId)->count();

        // FIX: Menyaring produk agar hanya menampilkan yang stoknya di atas 0
        $produkTerbaru = Produk::where('stok', '>', 0)
            ->latest()
            ->take(6)
            ->get();

        $lahanTerbaru = Lahan::where('status', 'diterima')
            ->latest()
            ->take(3)
            ->get();

        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Mengakses dashboard pembeli'
        ]);

        return view('pembeli.dashboard', compact(
            'totalKeranjang',
            'totalPesanan',
            'produkTerbaru',
            'lahanTerbaru'
        ));
    }
}