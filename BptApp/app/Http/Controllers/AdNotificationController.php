<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $admin = Auth::user();

        $notificationsAds = $admin->notifications()
                              ->where('type', 'App\Notifications\NewAdPostedNotification')
                              ->latest()
                              ->paginate(15);
        
        return view('admin.notifications.ads.index', compact('notificationsAds'));
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return back()->with('success', 'Notification marquée comme lue.');
    }
}