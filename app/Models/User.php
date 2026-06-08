<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'role',
        'foto_profil',
        'alamat_pengiriman',
        'status_verifikasi',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // PRODUK (PETANI)
    public function produk()
    {
        return $this->hasMany(Produk::class, 'petani_id');
    }

    // LAHAN (PETANI)
    public function lahan()
    {
        return $this->hasMany(Lahan::class, 'petani_id');
    }

    // KERANJANG (PEMBELI)
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'pembeli_id');
    }

    // PESANAN (PEMBELI)
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pembeli_id');
    }

    // PENGAJUAN MINAT
    public function pengajuanMinat()
    {
        return $this->hasMany(PengajuanMinat::class, 'pembeli_id');
    }

    // CHAT AS PETANI
    public function chatAsPetani()
    {
        return $this->hasMany(ChatRoom::class, 'petani_id');
    }

    // CHAT AS PEMBELI
    public function chatAsPembeli()
    {
        return $this->hasMany(ChatRoom::class, 'pembeli_id');
    }
}