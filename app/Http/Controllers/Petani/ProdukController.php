<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\File;

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

        $fotoName = null;

        // SIMPAN KE public/uploads/produk
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $fotoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $fotoName);
        }

        $produk = Produk::create([
            'petani_id' => session('user.id'),
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'deskripsi' => $request->deskripsi,
            'foto_produk' => $fotoName,
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
        $produk = Produk::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'foto_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'nama_produk',
            'kategori',
            'harga',
            'stok',
            'satuan',
            'deskripsi'
        ]);

        // UPDATE FOTO
        if ($request->hasFile('foto_produk')) {

            // HAPUS FOTO LAMA
            if ($produk->foto_produk && File::exists(public_path('uploads/produk/' . $produk->foto_produk))) {
                File::delete(public_path('uploads/produk/' . $produk->foto_produk));
            }

            $file = $request->file('foto_produk');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/produk'), $fileName);

            $data['foto_produk'] = $fileName;
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
        $produk = Produk::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        if ($produk->detailPesanan()->exists()) {
            return back()->with(
                'error',
                'Produk tidak dapat dihapus karena sudah pernah digunakan dalam transaksi.'
            );
        }

        // HAPUS FOTO
        if ($produk->foto_produk && File::exists(public_path('uploads/produk/' . $produk->foto_produk))) {
            File::delete(public_path('uploads/produk/' . $produk->foto_produk));
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
        $produk = Produk::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        return view('petani.produk.edit', compact('produk'));
    }
}