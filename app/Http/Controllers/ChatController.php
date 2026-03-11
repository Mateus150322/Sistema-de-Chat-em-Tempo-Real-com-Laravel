<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->orderBy('id')->get();
        return view('chat', compact('messages'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        $message->load('user');

        broadcast(new MessageSent($message));

        return response()->json([
            'id' => $message->id,
            'user' => $message->user->name,
            'message' => $message->message,
            'time' => $message->created_at->format('H:i:s')
        ]);
    }
}