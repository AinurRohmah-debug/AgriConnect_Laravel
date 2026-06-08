<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class VerifikasiPetaniController extends Controller
{
    public function index()
    {
        $petaniPending = User::where('role', 'petani')
            ->where('status_verifikasi', 'Menunggu')
            ->get();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Melihat daftar verifikasi petani'
        ]);

        return view('admin.petani.index', compact('petaniPending'));
    }

    public function approve($id)
    {
        DB::transaction(function () use ($id) {

            $petani = User::where('id', $id)
                ->where('role', 'petani')
                ->lockForUpdate()
                ->firstOrFail();

            $petani->update([
                'status_verifikasi' => 'Disetujui'
            ]);

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Menyetujui petani ID ' . $id
            ]);
        });

        return redirect('/admin/dashboard')
            ->with('success', 'Petani berhasil disetujui');
    }

    public function reject($id)
    {
        DB::transaction(function () use ($id) {

            $petani = User::where('id', $id)
                ->where('role', 'petani')
                ->lockForUpdate()
                ->firstOrFail();

            $petani->update([
                'status_verifikasi' => 'Ditolak'
            ]);

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Menolak petani ID ' . $id
            ]);
        });

        return redirect('/admin/dashboard')
            ->with('success', 'Petani ditolak');
    }
}