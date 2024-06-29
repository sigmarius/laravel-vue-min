<?php

namespace App\Utilities\Notification;

class TelegramNotificator implements MessengerNotificationInterface
{

    public function send($message): bool
    {
        return true;
    }
}
