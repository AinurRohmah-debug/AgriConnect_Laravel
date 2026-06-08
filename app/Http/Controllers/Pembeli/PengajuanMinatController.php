<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanMinat;
use App\Models\Lahan;
use App\Models\ChatRoom;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class PengajuanMinatController extends Controller
{
    public function store(Request $request, $lahanId)
    {
        $request->validate([
            'pesan' => 'required|string'
        ]);

        $pembeliId = session('user.id');

        try {

            DB::transaction(function () use ($request, $lahanId, $pembeliId) {

                $lahan = Lahan::where('id', $lahanId)
                    ->where('status', 'diterima')
                    ->lockForUpdate()
                    ->firstOrFail();

                $existing = PengajuanMinat::where('lahan_id', $lahanId)
                    ->where('pembeli_id', $pembeliId)
                    ->lockForUpdate()
                    ->first();

                if ($existing) {

                    ActivityLog::create([
                        'user_id' => $pembeliId,
                        'activity' => 'Gagal kirim minat (duplikat) pada lahan ID ' . $lahanId
                    ]);

                    throw new \Exception('Sudah mengajukan minat');
                }

                PengajuanMinat::create([
                    'lahan_id' => $lahanId,
                    'pembeli_id' => $pembeliId,
                    'pesan' => $request->pesan,
                    'status' => 'menunggu'
                ]);

                ChatRoom::firstOrCreate(
                    [
                        'lahan_id' => $lahanId,
                        'pembeli_id' => $pembeliId,
                    ],
                    [
                        'petani_id' => $lahan->petani_id,
                    ]
                );

                ActivityLog::create([
                    'user_id' => $pembeliId,
                    'activity' => 'Mengirim minat ke lahan ID ' . $lahanId
                ]);
            });

            return back()->with('success', 'Minat berhasil dikirim');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function indexPembeli()
    {
        $pembeliId = session('user.id');

        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Melihat daftar pengajuan minat'
        ]);

        $minat = PengajuanMinat::with('lahan')
            ->where('pembeli_id', $pembeliId)
            ->latest()
            ->get();

        return view('pembeli.minat.index', compact('minat'));
    }

    public function accept($id)
    {
        $petaniId = session('user.id');

        $minat = PengajuanMinat::whereHas('lahan', function ($q) use ($petaniId) {
                $q->where('petani_id', $petaniId);
            })
            ->findOrFail($id);

        $minat->update(['status' => 'diterima']);

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Menerima minat pembeli ID ' . $minat->pembeli_id
        ]);

        return back();
    }

    public function reject($id)
    {
        $petaniId = session('user.id');

        $minat = PengajuanMinat::whereHas('lahan', function ($q) use ($petaniId) {
                $q->where('petani_id', $petaniId);
            })
            ->findOrFail($id);

        $minat->update(['status' => 'ditolak']);

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Menolak minat pembeli ID ' . $minat->pembeli_id
        ]);

        return back();
    }
}