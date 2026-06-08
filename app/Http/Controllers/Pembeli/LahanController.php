<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lahan;
use App\Models\ActivityLog;

class LahanController extends Controller
{
    public function index(Request $request)
    {
        $pembeliId = session('user.id');

        // =========================
        // LOG VIEW
        // =========================
        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Melihat daftar lahan marketplace'
        ]);

        // =========================
        // BASE QUERY
        // =========================
        $query = Lahan::where('status', 'diterima');

        // =========================
        // SEARCH FEATURE
        // =========================
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {
                $q->where('komoditas', 'like', '%' . $request->search . '%')
                  ->orWhere('alamat_lahan', 'like', '%' . $request->search . '%');
            });

            ActivityLog::create([
                'user_id' => $pembeliId,
                'activity' => 'Mencari lahan: ' . $request->search
            ]);
        }

        $lahan = $query->latest()->get();

        return view('pembeli.lahan.index', compact('lahan'));
    }
}