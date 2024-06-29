<?php

namespace App\Utilities\Notification;

interface MessengerNotificationInterface
{
    public function send($message): bool;
}
