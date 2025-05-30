<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $storageFile;

    public function __construct()
    {
        $this->storageFile = storage_path('app/public/chat_messages.json');
    }

    public function index()
    {
        $messages = $this->getMessages();
        return view('dosen.bimbingan_magang.chat', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $message = [
            'id' => uniqid(),
            'sender_id' => auth()->id(),
            'sender_name' => auth()->user()->name,
            'sender_role' => 'dosen',
            'message' => $request->message,
            'timestamp' => now()->format('Y-m-d H:i:s'),
        ];

        $this->saveMessage($message);
        broadcast(new NewChatMessage($message))->toOthers();

        return response()->json($message);
    }

    private function saveMessage($message)
    {
        $messages = $this->getMessages();
        $messages[] = $message;
        $data = ['messages' => $messages];
        file_put_contents($this->storageFile, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function getMessages()
    {
        if (!file_exists($this->storageFile)) {
            return [];
        }
        $content = file_get_contents($this->storageFile);
        return json_decode($content, true)['messages'] ?? [];
    }
}
