<?php
namespace App\Http\Controllers;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $notifications = Notification::where('user_id', auth()->id())->latest()->get();

        return response()->json($notifications);
    }
}
?>