<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->take(20)->get();
        return view('chat.index', compact('messages'));
    }
    
    public function sendMessage(Request $request)
    {
        $request->validate(['message' => 'required|string|max:255']);  // إضافة تحقق من طول الرسالة
    
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => $message->message,
            'user' => Auth::user()->name,
            'created_at' => $message->created_at->format('H:i'),
        ]);
    }
    public function send(Request $request)
{
    $user = auth()->user();
    $message = new Message();
    $message->user_id = $user->id;
    $message->message = $request->message;
    $message->save();

    return response()->json([
        'success' => true,
        'message' => $message->message,
        'user' => [
            'name' => $user->name,
            'avatar' => $user->avatar, // تأكد من أن الحقل موجود
        ],
        'created_at' => $message->created_at->format('H:i'), // تنسيق الوقت
    ]);
}

}    
