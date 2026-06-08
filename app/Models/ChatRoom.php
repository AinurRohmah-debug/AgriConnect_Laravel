<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table = 'chat_rooms';
    protected $fillable = [
        'petani_id',
        'pembeli_id',
        'lahan_id',
    ];

    public function petani()
    {
        return $this->belongsTo(User::class, 'petani_id');
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class, 'pembeli_id');
    }

    public function lahan()
    {
        return $this->belongsTo(Lahan::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'room_id');
    }
}
