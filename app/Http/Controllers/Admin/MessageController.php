<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $currentPage = $request->get('page', 1);
        
        $messages = Message::latest()
            ->skip(($currentPage - 1) * $perPage)
            ->take($perPage)
            ->get();
            
        $totalMessages = Message::count();
        $totalPages = ceil($totalMessages / $perPage);
        
        return view('admin.messages.index', compact('messages', 'currentPage', 'totalPages'));
    }

    public function show(Message $message)
    {
        if (!$message->is_read) {
            $message->markAsRead();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Mesaj başarıyla silindi.');
    }

    public function markAsRead(Message $message)
    {
        $message->markAsRead();
        return redirect()->back()->with('success', 'Mesaj okundu olarak işaretlendi.');
    }
} 