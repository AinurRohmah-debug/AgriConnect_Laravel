<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'pembeli_id',
        'total_harga',
        'alamat_tujuan',
        'status_pesanan',
    ];

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    // INI YANG WAJIB ADA DAN HARUS MATCH DENGAN with('detail')
    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }
}