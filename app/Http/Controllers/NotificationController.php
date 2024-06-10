<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications ;
        
        $notifications->markAsRead();

        return view("notifications.index", [
            'notifications' => $notifications
        ]);
    }
}
