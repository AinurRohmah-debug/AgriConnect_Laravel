<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Lahan extends Model
{
    protected $table = 'lahan';
    protected $fillable = [
        'petani_id',
        'komoditas',
        'luas_lahan',
        'estimasi_panen',
        'deskripsi',
        'alamat_lahan',
        'harga_min',
        'harga_max',
        'bisa_nego',
        'foto_lahan',
        'status',
    ];

    public function petani()
    {
        return $this->belongsTo(User::class, 'petani_id');
    }

    public function pengajuanMinat()
    {
        return $this->hasMany(PengajuanMinat::class);
    }

    public function chatRooms()
    {
        return $this->hasMany(ChatRoom::class);
    }
}