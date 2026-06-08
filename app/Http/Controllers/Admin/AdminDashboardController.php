<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use App\Models\Lahan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ProdukExport;
use App\Exports\LahanExport;
use App\Models\ActivityLog;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPetani = User::where('role', 'petani')->count();
        $totalPembeli = User::where('role', 'pembeli')->count();
        $totalProduk = Produk::count();
        $totalLahan = Lahan::count();

        // DISTRIBUSI USER
        $userDistribution = User::select('role', DB::raw('COUNT(*) as total'))
            ->groupBy('role')
            ->pluck('total', 'role');

        // KATEGORI PRODUK
        $produkKategori = Produk::select('kategori', DB::raw('COUNT(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // PRODUK PER BULAN (tetap dipertahankan, tidak dihapus agar tidak merusak logic lain)
        $produkBulanan = Produk::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // DISTRIBUSI STATUS LAHAN
        $lahanStatus = Lahan::select(
                DB::raw("COALESCE(status, 'unknown') as status"),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('status')
            ->pluck('total', 'status');

        // LOG AKTIVITAS
        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Mengakses dashboard admin'
        ]);

        return view('admin.dashboard', compact(
            'totalPetani',
            'totalPembeli',
            'totalProduk',
            'totalLahan',
            'userDistribution',
            'produkKategori',
            'produkBulanan',
            'lahanStatus'
        ));
    }
    public function exportUsers()
    {
        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Export data users'
        ]);

        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportProduk()
    {
        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Export data produk'
        ]);

        return Excel::download(new ProdukExport, 'produk.xlsx');
    }

    public function exportLahan()
    {
        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Export data lahan'
        ]);

        return Excel::download(new LahanExport, 'lahan.xlsx');
    }
}