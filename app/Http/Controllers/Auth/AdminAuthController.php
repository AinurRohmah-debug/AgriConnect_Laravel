<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AdminAuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $rememberedEmail = $request->cookie('remember_email_admin');

        return view('auth.admin-login', compact('rememberedEmail'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return DB::transaction(function () use ($request) {

            $user = User::where('email', $request->email)
                        ->where('role', 'admin')
                        ->first();

            if (!$user) {

                ActivityLog::create([
                    'user_id' => null,
                    'activity' => 'Login admin gagal: akun tidak ditemukan (' . $request->email . ')'
                ]);

                return back()
                    ->withInput()
                    ->with('error', 'Akun admin tidak ditemukan');
            }

            if (!Hash::check($request->password, $user->password)) {

                ActivityLog::create([
                    'user_id' => $user->id,
                    'activity' => 'Login admin gagal: password salah'
                ]);

                return back()
                    ->withInput()
                    ->with('error', 'Password salah');
            }

            // SECURITY: prevent session fixation
            $request->session()->regenerate();

            session([
                'user' => [
                    'id'   => $user->id,
                    'nama' => $user->nama_lengkap,
                    'role' => $user->role
                ]
            ]);

            // COOKIE (remember email admin)
            if ($request->has('remember')) {

                Cookie::queue(
                    'remember_email_admin',
                    $user->email,
                    60 * 24 * 30 // 30 hari
                );

            } else {

                Cookie::queue(Cookie::forget('remember_email_admin'));
            }

            ActivityLog::create([
                'user_id' => $user->id,
                'activity' => 'Login berhasil sebagai admin'
            ]);

            return redirect('/admin/dashboard');
        });
    }
}