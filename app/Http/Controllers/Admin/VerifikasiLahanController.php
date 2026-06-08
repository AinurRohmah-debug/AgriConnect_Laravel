<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lahan;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class VerifikasiLahanController extends Controller
{
    public function index()
    {
        $lahanPending = Lahan::where('status', 'menunggu')->get();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Melihat daftar verifikasi lahan'
        ]);

        return view('admin.lahan.index', compact('lahanPending'));
    }

    public function approve($id)
    {
        DB::transaction(function () use ($id) {

            $lahan = Lahan::where('id', $id)
                ->lockForUpdate()
                ->firstOrFail();

            // CEK STATE (Consistency guard)
            if ($lahan->status !== 'menunggu') {
                throw new \Exception('Lahan sudah diproses sebelumnya');
            }

            $lahan->update([
                'status' => 'diterima',
            ]);

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Menyetujui lahan ID ' . $id
            ]);
        });

        return redirect('/admin/lahan')
            ->with('success', 'Lahan berhasil disetujui');
    }

    public function reject($id)
    {
        DB::transaction(function () use ($id) {

            $lahan = Lahan::where('id', $id)
                ->lockForUpdate()
                ->firstOrFail();

            // CEK STATE
            if ($lahan->status !== 'menunggu') {
                throw new \Exception('Lahan sudah diproses sebelumnya');
            }

            $lahan->update([
                'status' => 'ditolak',
            ]);

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Menolak lahan ID ' . $id
            ]);
        });

        return redirect('/admin/lahan')
            ->with('success', 'Lahan ditolak');
    }
}