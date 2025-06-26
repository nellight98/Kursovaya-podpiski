<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SubscriptionCreated extends Notification
{
    use Queueable;

    protected $tariffName;

    public function __construct(string $tariffName)
    {
        $this->tariffName = $tariffName;
    }

    public function via($notifiable)
    {
        return ['database']; // уведомление сохраняется в базу
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Вы подписались на тариф \"{$this->tariffName}\".",
        ];
    }
}
