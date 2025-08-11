<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Ad;

class NewAdPostedNotification extends Notification
{
    use Queueable;

    protected $ad;

    public function __construct(Ad $ad)
    {
        $this->ad = $ad->load('user');
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'new_ad',
            'ad_id' => $this->ad->id,
            'ad_title' => $this->ad->title,
            'message' => 'Une nouvelle annonce (' . $this->ad->title . ') a été postée par ' . $this->ad->user->name . '.',
            'link' => route('admin.ads.show', $this->ad->id),
        ];
    }
}