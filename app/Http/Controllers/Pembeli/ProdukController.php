<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ActivityLog;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $pembeliId = session('user.id');

        // =========================
        // LOG ACTIVITY
        // =========================
        ActivityLog::create([
            'user_id' => $pembeliId,
            'activity' => 'Melihat daftar produk marketplace'
        ]);

        // =========================
        // SEARCH FEATURE
        // =========================
        // Mengunci kondisi awal: Wajib memiliki relasi petani dan stok harus di atas 0
        $query = Produk::with('petani')->where('stok', '>', 0);

        if ($request->filled('search')) {
            // FIX: Menggunakan advanced where grouping agar kondisi 'orWhere' tidak merusak 'where stok > 0'
            $query->where(function ($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
            });

            ActivityLog::create([
                'user_id' => $pembeliId,
                'activity' => 'Mencari produk: ' . $request->search
            ]);
        }

        $produk = $query->latest()->get();

        return view('pembeli.produk.index', compact('produk'));
    }
}