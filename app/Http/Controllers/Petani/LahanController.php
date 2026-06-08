<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lahan;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\File;

class LahanController extends Controller
{
    public function index()
    {
        $petaniId = session('user.id');

        $lahan = Lahan::where('petani_id', $petaniId)->get();

        ActivityLog::create([
            'user_id' => $petaniId,
            'activity' => 'Melihat daftar lahan'
        ]);

        return view('petani.lahan.index', compact('lahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'komoditas' => 'required',
            'luas_lahan' => 'required|numeric',
            'alamat_lahan' => 'required',
            'harga_min' => 'required|numeric',
            'harga_max' => 'required|numeric|gte:harga_min',
            'estimasi_panen' => 'required|date',
            'deskripsi' => 'required',
            'foto_lahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fotoName = null;

        if ($request->hasFile('foto_lahan')) {
            $file = $request->file('foto_lahan');

            $fotoName = time() . '_' . $file->getClientOriginalName();

            // SIMPAN KE public/uploads/lahan
            $file->move(public_path('uploads/lahan'), $fotoName);
        }

        $lahan = Lahan::create([
            'petani_id' => session('user.id'),
            'komoditas' => $request->komoditas,
            'luas_lahan' => $request->luas_lahan,
            'estimasi_panen' => $request->estimasi_panen,
            'alamat_lahan' => $request->alamat_lahan,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
            'deskripsi' => $request->deskripsi,
            'bisa_nego' => $request->bisa_nego ? 1 : 0,
            'status' => 'menunggu',
            'foto_lahan' => $fotoName,
        ]);

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menambahkan lahan: ' . $lahan->komoditas
        ]);

        return redirect('/petani/lahan')
            ->with('success', 'Lahan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $lahan = Lahan::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        $request->validate([
            'komoditas' => 'required',
            'luas_lahan' => 'required|numeric',
            'alamat_lahan' => 'required',
            'harga_min' => 'required|numeric',
            'harga_max' => 'required|numeric|gte:harga_min',
            'estimasi_panen' => 'required|date',
            'deskripsi' => 'required',
            'foto_lahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only([
            'komoditas',
            'luas_lahan',
            'alamat_lahan',
            'harga_min',
            'harga_max',
            'estimasi_panen',
            'deskripsi',
        ]);

        $data['bisa_nego'] = $request->bisa_nego ? 1 : 0;

        // UPDATE FOTO
        if ($request->hasFile('foto_lahan')) {

            // HAPUS FOTO LAMA
            if ($lahan->foto_lahan && File::exists(public_path('uploads/lahan/' . $lahan->foto_lahan))) {
                File::delete(public_path('uploads/lahan/' . $lahan->foto_lahan));
            }

            $file = $request->file('foto_lahan');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/lahan'), $fileName);

            $data['foto_lahan'] = $fileName;
        }

        $lahan->update($data);

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Mengupdate lahan: ' . $lahan->komoditas
        ]);

        return redirect('/petani/lahan')
            ->with('success', 'Lahan berhasil diupdate');
    }

    public function destroy($id)
    {
        $lahan = Lahan::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        if ($lahan->pengajuanMinat()->exists()) {

            ActivityLog::create([
                'user_id' => session('user.id'),
                'activity' => 'Gagal menghapus lahan: ' . $lahan->komoditas
            ]);

            return redirect('/petani/lahan')
                ->with('error', 'Lahan tidak dapat dihapus karena sudah memiliki pengajuan minat.');
        }

        // HAPUS FOTO
        if ($lahan->foto_lahan && File::exists(public_path('uploads/lahan/' . $lahan->foto_lahan))) {
            File::delete(public_path('uploads/lahan/' . $lahan->foto_lahan));
        }

        $nama = $lahan->komoditas;

        $lahan->delete();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Menghapus lahan: ' . $nama
        ]);

        return redirect('/petani/lahan')
            ->with('success', 'Lahan berhasil dihapus');
    }

    public function create()
    {
        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Membuka form tambah lahan'
        ]);

        return view('petani.lahan.create');
    }

    public function edit($id)
    {
        $lahan = Lahan::where('id', $id)
            ->where('petani_id', session('user.id'))
            ->firstOrFail();

        ActivityLog::create([
            'user_id' => session('user.id'),
            'activity' => 'Membuka form edit lahan: ' . $lahan->komoditas
        ]);

        return view('petani.lahan.edit', compact('lahan'));
    }
}