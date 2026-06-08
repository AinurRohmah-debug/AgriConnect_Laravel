<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'petani_id',
        'nama_produk',
        'kategori',
        'harga',
        'stok',
        'satuan',
        'foto_produk',
        'deskripsi',
    ];

    public function petani()
    {
        return $this->belongsTo(User::class, 'petani_id');
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
