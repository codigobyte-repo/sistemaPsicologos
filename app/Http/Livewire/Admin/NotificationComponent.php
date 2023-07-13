<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $notifications, $count;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }
    
    public function render()
    {
        return view('livewire.admin.notification-component');
    }

    public function resetNotificationCount()
    {
        $user = auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function read($notification_id)
    {
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();
    }
}
