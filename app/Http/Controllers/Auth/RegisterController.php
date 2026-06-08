<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showPetani()
    {
        return view('auth.register-petani');
    }

    public function storePetani(Request $request)
    {
        $request->validate([
            'nama_lengkap'      => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'alamat_pengiriman' => 'required',
            'foto_profil'       => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($request) {

            $foto = null;

            if ($request->hasFile('foto_profil')) {

                $foto = time() . '_' .
                    $request->file('foto_profil')->getClientOriginalName();

                $request->file('foto_profil')->move(
                    public_path('uploads/profil'),
                    $foto
                );
            }

            $user = User::create([
                'nama_lengkap'      => $request->nama_lengkap,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'role'              => 'petani',
                'status_verifikasi' => 'Menunggu',
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'foto_profil'       => $foto
            ]);

            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'Registrasi petani baru (menunggu verifikasi)'
            ]);
        });

        return redirect('/login/petani')
            ->with('success', 'Menunggu verifikasi admin');
    }

    public function showPembeli()
    {
        return view('auth.register-pembeli');
    }

    public function storePembeli(Request $request)
    {
        $request->validate([
            'nama_lengkap'      => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'alamat_pengiriman' => 'required',
            'foto_profil'       => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($request) {

            $foto = null;

            if ($request->hasFile('foto_profil')) {

                $foto = time() . '_' .
                    $request->file('foto_profil')->getClientOriginalName();

                $request->file('foto_profil')->move(
                    public_path('uploads/profil'),
                    $foto
                );
            }

            $user = User::create([
                'nama_lengkap'      => $request->nama_lengkap,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'role'              => 'pembeli',
                'status_verifikasi' => 'Disetujui',
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'foto_profil'       => $foto
            ]);

            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'Registrasi pembeli berhasil'
            ]);
        });

        return redirect('/login/pembeli')
            ->with('success', 'Registrasi berhasil');
    }
}
