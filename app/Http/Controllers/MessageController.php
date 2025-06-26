<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('message.index', compact('users'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_email' => 'required|email|exists:users,email',
            'message' => 'required|string'
        ]);

        $receiver = User::where('email', $request->receiver_email)->first();

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver->id,
            'content' => $request->message,
        ]);

        return back()->with('success', 'Message envoyé !');
    }

    public function reçus()
    {
        $messagesRecus = Message::where('receiver_id', auth()->id())->with('sender')->latest()->get();
        return view('message.reçus', compact('messagesRecus'));
    }

    public function envoyes()
    {
        $messagesEnvoyes = Message::where('sender_id', auth()->id())->with('receiver')->latest()->get();
        return view('message.envoyes', compact('messagesEnvoyes'));
    }

    public function conversation($userId)
    {
        $otherUser = User::findOrFail($userId);

        $messages = Message::where(function ($query) use ($userId) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', auth()->id());
        })->with('sender')->orderBy('created_at')->get();

        return view('message.conversation', compact('messages', 'otherUser'));
    }
}

