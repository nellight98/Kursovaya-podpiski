<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Получаем уведомления пользователя, сортируем по дате создания (новые сверху)
        $notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        // Находим уведомление по id для текущего пользователя или кидаем 404
        $notification = Auth::user()->notifications()->where('id', $id)->firstOrFail();

        $notification->markAsRead();

        return redirect()->route('notifications.index')->with('success', 'Notification marked as read.');
    }
}
