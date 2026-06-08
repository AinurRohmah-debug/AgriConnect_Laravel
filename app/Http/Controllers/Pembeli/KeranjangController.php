<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;

class KeranjangController extends Controller
{
    public function store($produkId)
    {
        $produk = Produk::findOrFail($produkId);

        if ($produk->stok <= 0) {
            return back()->with('error', 'Stok produk habis.');
        }

        $keranjang = Keranjang::where('pembeli_id', session('user.id'))
            ->where('produk_id', $produkId)
            ->first();

        if ($keranjang) {

            if (($keranjang->jumlah + 1) > $produk->stok) {
                return back()->with('error', 'Jumlah melebihi stok.');
            }

            $keranjang->increment('jumlah');

        } else {

            Keranjang::create([
                'pembeli_id' => session('user.id'),
                'produk_id' => $produkId,
                'jumlah' => 1,
            ]);
        }

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menambahkan produk ke keranjang (ID: ' . $produkId . ')'
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function index()
    {
        $keranjang = Keranjang::with('produk.petani')
            ->where('pembeli_id', session('user.id'))
            ->get();

        return view('pembeli.keranjang.index', compact('keranjang'));
    }

    public function tambah($id)
    {
        $item = Keranjang::with('produk')->findOrFail($id);

        if ($item->jumlah < $item->produk->stok) {
            $item->increment('jumlah');
        }

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menambah jumlah keranjang (ID keranjang: ' . $id . ')'
        ]);

        return back();
    }

    public function kurang($id)
    {
        $item = Keranjang::findOrFail($id);

        if ($item->jumlah > 1) {
            $item->decrement('jumlah');
        }

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Mengurangi jumlah keranjang (ID keranjang: ' . $id . ')'
        ]);

        return back();
    }

    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menghapus item keranjang (ID: ' . $id . ')'
        ]);

        return back()->with('success', 'Produk dihapus dari keranjang');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'keranjang' => 'required|array'
        ]);

        $pembeliId = session('user.id');

        try {

            DB::transaction(function () use ($request, $pembeliId) {

                // =========================
                // LOCK KERANJANG + PRODUK (ACID ISOLATION)
                // =========================
                $items = Keranjang::with(['produk' => function ($q) {
                        $q->lockForUpdate();
                    }])
                    ->whereIn('id', $request->keranjang)
                    ->where('pembeli_id', $pembeliId)
                    ->lockForUpdate()
                    ->get();

                if ($items->isEmpty()) {
                    throw new \Exception('Tidak ada produk dipilih.');
                }

                // =========================
                // VALIDASI STOK (CONSISTENCY CHECK)
                // =========================
                foreach ($items as $item) {
                    if ($item->jumlah > $item->produk->stok) {
                        throw new \Exception(
                            $item->produk->nama_produk . ' stok tidak mencukupi.'
                        );
                    }
                }

                // =========================
                // HITUNG TOTAL
                // =========================
                $total = $items->sum(function ($item) {
                    return $item->produk->harga * $item->jumlah;
                });

                // =========================
                // CREATE PESANAN (ATOMIC STEP 1)
                // =========================
                $pesanan = Pesanan::create([
                    'pembeli_id' => $pembeliId,
                    'total_harga' => $total,
                    'alamat_tujuan' => 'Alamat belum diisi',
                    'status_pesanan' => 'menunggu_diproses'
                ]);

                // =========================
                // DETAIL + STOCK UPDATE (ATOMIC STEP 2)
                // =========================
                foreach ($items as $item) {

                    DetailPesanan::create([
                        'pesanan_id' => $pesanan->id,
                        'produk_id' => $item->produk_id,
                        'nama_produk_saat_beli' => $item->produk->nama_produk,
                        'jumlah' => $item->jumlah,
                        'harga_saat_beli' => $item->produk->harga,
                    ]);

                    // aman karena sudah lockForUpdate
                    $item->produk->decrement('stok', $item->jumlah);

                    $item->delete();
                }

                // =========================
                // LOG (INSIDE TRANSACTION = SAFE)
                // =========================
                ActivityLog::create([
                    'user_id' => $pembeliId,
                    'activity' => 'Checkout berhasil (Total: Rp ' . $total . ')'
                ]);
            });

            return redirect('/pembeli/pesanan')
                ->with('success', 'Checkout berhasil.');

        } catch (\Exception $e) {

            ActivityLog::create([
                'user_id' => $pembeliId,
                'activity' => 'Checkout gagal: ' . $e->getMessage()
            ]);

            return back()->with('error', 'Checkout gagal: ' . $e->getMessage());
        }
    }
}