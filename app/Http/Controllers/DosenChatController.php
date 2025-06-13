<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DosenChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'sender_type' => 'required|string',
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'room' => 'required|string'
        ]);

        // Verify that the authenticated user is the sender
        $user = Auth::user();
        if ($user->role !== 'dosen' || $user->dosen->id_dosen != $request->sender_id) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        $messageData = [
            'message' => $request->message,
            'sender_type' => $request->sender_type,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'room' => $request->room,
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('chat_messages')->insert($messageData);

        return response()->json(['status' => 'success', 'message' => 'Message sent successfully']);
    }

    public function getMessages($room)
    {
        // Verify that the authenticated user has access to this chat room
        $user = Auth::user();
        if ($user->role !== 'dosen') {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        // Extract bimbingan ID from room name (format: chat_{id_bimbingan})
        $bimbinganId = str_replace('chat_', '', $room);
        
        // Check if the dosen is part of this bimbingan
        $bimbingan = DB::table('bimbingan_magang')
            ->where('id_bimbingan', $bimbinganId)
            ->where('id_dosen', $user->dosen->id_dosen)
            ->first();

        if (!$bimbingan) {
            return response()->json(['status' => 'error', 'message' => 'Access denied'], 403);
        }

        $messages = DB::table('chat_messages')
            ->where('room', $room)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($message) {
                return [
                    'id' => $message->id,
                    'message' => $message->message,
                    'sender_type' => $message->sender_type,
                    'sender_id' => $message->sender_id,
                    'receiver_id' => $message->receiver_id,
                    'timestamp' => $message->created_at,
                    'room' => $message->room
                ];
            });

        return response()->json(['messages' => $messages]);
    }
}
