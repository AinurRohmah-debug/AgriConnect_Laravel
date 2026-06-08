<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ActivityLog;

class ProdukController extends Controller
{
    public function index()
    {
        $petaniId = session('user.id');

        $produk = Produk::where('petani_id', $petaniId)->get();

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Melihat daftar produk'
        ]);

        return view('petani.produk.index', compact('produk'));
    }

    public function create()
    {
        return view('petani.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoProduk = $request->hasFile('foto_produk')
            ? $request->file('foto_produk')->store('produk', 'public')
            : null;

        $produk = Produk::create([
            'petani_id' => session('user.id'),
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'deskripsi' => $request->deskripsi,
            'foto_produk' => $fotoProduk,
        ]);

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menambahkan produk: ' . $produk->nama_produk
        ]);

        return redirect('/petani/produk')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_produk','kategori','harga','stok','satuan','deskripsi'
        ]);

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')
                ->store('produk', 'public');
        }

        $produk->update($data);

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Mengupdate produk: ' . $produk->nama_produk
        ]);

        return redirect('/petani/produk')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->detailPesanan()->exists()) {
            return back()->with(
                'error',
                'Produk tidak dapat dihapus karena sudah pernah digunakan dalam transaksi.'
            );
        }

        $nama = $produk->nama_produk;

        $produk->delete();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menghapus produk: ' . $nama
        ]);

        return redirect('/petani/produk')
            ->with('success', 'Produk berhasil dihapus');
    }
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);

        // optional safety: pastikan hanya milik petani yang login
        if ($produk->petani_id !== session('user.id')) {
            abort(403);
        }

        return view('petani.produk.edit', compact('produk'));
    }
}