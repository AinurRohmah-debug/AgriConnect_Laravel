<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $petaniId = session('user.id');

        $pesanan = DetailPesanan::with(['produk', 'pesanan.pembeli'])
            ->whereHas('produk', function ($q) use ($petaniId) {
                $q->where('petani_id', $petaniId);
            })
            ->latest()
            ->get();

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Melihat daftar pesanan'
        ]);

        return view('petani.pesanan.index', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pesanan' => 'required|in:menunggu_diproses,dikemas,dikirim,selesai'
        ]);

        try {

            DB::transaction(function () use ($request, $id) {

                $petaniId = session('user.id');

                // 🔥 LOCK + VALIDATE OWNERSHIP
                $pesanan = Pesanan::where('id', $id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // 🔥 OPTIONAL SAFETY CHECK (CONSISTENCY)
                $hasProdukPetani = DetailPesanan::where('pesanan_id', $id)
                    ->whereHas('produk', function ($q) use ($petaniId) {
                        $q->where('petani_id', $petaniId);
                    })
                    ->exists();

                if (!$hasProdukPetani) {
                    throw new \Exception('Unauthorized access to pesanan');
                }

                // 🔥 UPDATE STATUS
                $pesanan->update([
                    'status_pesanan' => $request->status_pesanan
                ]);

                // 🔥 LOG
                ActivityLog::create([
                    'user_id' => $petaniId,
                    'activity' => 'Update status pesanan ID ' . $id .
                                  ' menjadi ' . $request->status_pesanan
                ]);
            });

            return back()->with('success', 'Status berhasil diupdate');

        } catch (\Exception $e) {

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Gagal update status pesanan ID ' . $id .
                              ' error: ' . $e->getMessage()
            ]);

            return back()->with('error', 'Gagal update status');
        }
    }
}