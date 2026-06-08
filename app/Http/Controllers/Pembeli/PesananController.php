<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\ActivityLog;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    public function index()
    {
        $pembeliId = session('user.id');

        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Melihat daftar pesanan'
        ]);

        $pesanan = Pesanan::with(['detail.produk'])
            ->where('pembeli_id', $pembeliId)
            ->latest()
            ->get();

        return view('pembeli.pesanan.index', compact('pesanan'));
    }

    public function show($id)
    {
        $pembeliId = session('user.id');

        $pesanan = Pesanan::with(['detail.produk'])
            ->where('id', $id)
            ->where('pembeli_id', $pembeliId)
            ->firstOrFail();

        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Melihat detail pesanan ID ' . $id
        ]);

        return view('pembeli.pesanan.show', compact('pesanan'));
    }
     public function downloadNota($id)
    {
        $pembeliId = session('user.id');

        $pesanan = Pesanan::with([
            'detail',
            'pembeli'
        ])
        ->where('id', $id)
        ->where('pembeli_id', $pembeliId)
        ->firstOrFail();

        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Mengunduh nota pesanan ID ' . $id
        ]);

        $pdf = Pdf::loadView(
            'pembeli.pesanan.nota',
            compact('pesanan')
        );

        /**
         * Mengubah ukuran canvas kertas PDF ke 58mm (dalam satuan Point/pt)
         * Rumus konversi mm ke pt: mm * 2.83465
         * Lebar: 58mm  -> 164.41 pt
         * Tinggi: 140mm -> 396.85 pt (Bisa dinaikkan jika produk belanjaan sangat banyak)
         */
        $pdf->setPaper([0, 0, 164.41, 396.85], 'portrait');

        return $pdf->download(
            'nota-pesanan-' . $pesanan->id . '.pdf'
        );
    }
}