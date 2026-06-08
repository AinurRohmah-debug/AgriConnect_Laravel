<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';
    protected $fillable = [
        'room_id',
        'pengirim_id',
        'pesan',
        'is_read',
    ];

    public function room()
    {
        return $this->belongsTo(ChatRoom::class);
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }
}
