<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class PembeliAuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $rememberedEmail = $request->cookie('remember_email');

        return view('auth.pembeli-login', compact('rememberedEmail'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return DB::transaction(function () use ($request) {

            $user = User::where('email', $request->email)
                        ->where('role', 'pembeli')
                        ->first();

            if (!$user) {

                ActivityLog::create([
                    'user_id' => null,
                    'activity' => 'Login pembeli gagal: akun tidak ditemukan (' . $request->email . ')'
                ]);

                return back()
                    ->withInput()
                    ->with('error', 'Akun tidak ditemukan');
            }

            if (!Hash::check($request->password, $user->password)) {

                ActivityLog::create([
                    'user_id' => $user->id,
                    'activity' => 'Login pembeli gagal: password salah'
                ]);

                return back()
                    ->withInput()
                    ->with('error', 'Password salah');
            }

            // Mencegah Session Fixation
            $request->session()->regenerate();

            session([
                'user' => [
                    'id' => $user->id,
                    'nama' => $user->nama_lengkap,
                    'role' => $user->role
                ]
            ]);

            // Remember Me Cookie
            if ($request->has('remember')) {

                Cookie::queue(
                    'remember_email',
                    $user->email,
                    60 * 24 * 30 // 30 hari
                );

            } else {

                Cookie::queue(
                    Cookie::forget('remember_email')
                );
            }

            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'Login berhasil sebagai pembeli'
            ]);

            return redirect('/pembeli/dashboard');
        });
    }
}