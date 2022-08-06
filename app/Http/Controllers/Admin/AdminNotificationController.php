<?php
//
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function createMassNotifications()
    {
        return view('admin/notification/form');
    }

    public function storeMassNotifications(NotificationRequest $request)
    {
        $data = $request->validated();
        $users = User::all();
        foreach ($users as $user) {
            $notification = new Notification();
            $notification->fill([
                'user_id' => $user->id,
                'content' => $data['content'],
                'target' => $data['target'],
            ]);
            $notification->save();
        }
        sendMessageToMultipleDevices('CarShare', $data['content'], getDeviceToken());
        return redirect()->route('createMassNotifications')->with('success', 'Notifications sent successfully');
    }

    public function markRead($user_id)
    {
        $notifications = Notification::query()->where('user_id', $user_id)->get();
        foreach ($notifications as $notification) {
            $notification->is_read = true;
            $notification->save();
        }
        return $notifications;
    }
}
