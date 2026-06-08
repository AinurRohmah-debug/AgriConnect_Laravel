<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\PengajuanMinat;
use App\Models\ChatRoom;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class PengajuanMinatController extends Controller
{
    public function index()
    {
        $petaniId = session('user.id');

        $minat = PengajuanMinat::with(['lahan', 'pembeli'])
            ->whereHas('lahan', function ($q) use ($petaniId) {
                $q->where('petani_id', $petaniId);
            })
            ->latest()
            ->get();

        return view('petani.minat.index', compact('minat'));
    }

    public function accept($id)
    {
        $petaniId = session('user.id');

        try {

            $chatRoom = null;

            DB::transaction(function () use ($id, $petaniId, &$chatRoom) {

                $minat = PengajuanMinat::with('lahan')
                    ->lockForUpdate()
                    ->findOrFail($id);

                // 🔥 CONSISTENCY CHECK
                if ($minat->status !== 'menunggu') {
                    throw new \Exception('Minat sudah diproses sebelumnya');
                }

                if ($minat->lahan->petani_id != $petaniId) {
                    throw new \Exception('Unauthorized');
                }

                // UPDATE STATUS
                $minat->update([
                    'status' => 'diterima'
                ]);

                // LOG
                ActivityLog::create([
                    'user_id' => $petaniId,
                    'activity' => 'Menerima minat lahan ID: ' . $minat->lahan_id
                ]);

                // CHAT ROOM (SAFE UPSERT)
                $chatRoom = ChatRoom::firstOrCreate([
                    'lahan_id' => $minat->lahan_id,
                    'pembeli_id' => $minat->pembeli_id,
                ], [
                    'petani_id' => $petaniId,
                ]);
            });

            return redirect('/chat/' . $chatRoom->id);

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function reject($id)
    {
        $petaniId = session('user.id');

        try {

            DB::transaction(function () use ($id, $petaniId) {

                $data = PengajuanMinat::lockForUpdate()->findOrFail($id);

                // 🔥 CONSISTENCY CHECK
                if ($data->status !== 'menunggu') {
                    throw new \Exception('Minat sudah diproses sebelumnya');
                }

                $data->update([
                    'status' => 'ditolak'
                ]);

                ActivityLog::create([
                    'user_id' => $petaniId,
                    'activity' => 'Menolak minat ID: ' . $id
                ]);
            });

            return back()->with('success', 'Minat ditolak');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}