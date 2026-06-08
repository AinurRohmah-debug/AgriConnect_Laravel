<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ChatRoom;

class PengajuanMinat extends Model
{
    protected $table = 'pengajuan_minat';protected $fillable = [
        'lahan_id',
        'pembeli_id',
        'pesan',
        'status',
    ];

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }
    public function chatRoom()
{
    return $this->hasOne(ChatRoom::class, 'lahan_id', 'lahan_id')
        ->whereColumn('pembeli_id', 'pembeli_id');
}
}
