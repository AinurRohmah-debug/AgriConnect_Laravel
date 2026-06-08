<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    // TAMPIL CHAT BERDASARKAN ROOM
    public function show($roomId)
    {
        $room = ChatRoom::findOrFail($roomId);

        $messages = ChatMessage::where('room_id', $roomId)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat.room', compact('room', 'messages'));
    }

    // KIRIM PESAN
    public function send(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:chat_rooms,id',
            'pesan' => 'required|string'
        ]);

        ChatMessage::create([
            'room_id' => $request->room_id,
            'pengirim_id' => session('user.id'),
            'pesan' => $request->pesan,
            'is_read' => false
        ]);

        return back();
    }
}