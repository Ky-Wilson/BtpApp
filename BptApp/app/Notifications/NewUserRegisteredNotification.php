<?php
// app/Notifications/NewUserRegisteredNotification.php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewUserRegisteredNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'new_user',
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'message' => 'Un nouvel utilisateur (' . $this->user->name . ') s\'est inscrit.',
            'link' => route('admin.users.show', $this->user->id),
        ];
    }
}