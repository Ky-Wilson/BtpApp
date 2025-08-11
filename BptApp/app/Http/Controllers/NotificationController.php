<?php
// app/Http/Controllers/NotificationController.php
// app/Http/Controllers/NotificationController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin = Auth::user();
        $notifications = $admin->notifications()
                               ->where('type', 'App\Notifications\NewUserRegisteredNotification')
                               ->paginate(15);
        $unreadCount = $admin->unreadNotifications()->where('type', 'App\Notifications\NewUserRegisteredNotification')->count();
        
        return view('admin.notifications.users', compact('notifications', 'unreadCount'));
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        
        return back()->with('success', 'Notification marquée comme lue.');
    }
}