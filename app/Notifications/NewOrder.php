<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class NewOrder extends Notification
{
    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        $message = "New order from " . $notifiable->name .
            ".\nContacts: " .
            "\nPhone: " . $notifiable->phone_number .
            "\nEmail: " . $notifiable->email;

        return TelegramMessage::create()
            ->to(config('services.telegram-bot-api.chat_id'))
            ->content($message);
    }

}