<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientAccessConfirmation extends Notification
{
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your DSAM client account is approved')
            ->greeting('Welcome to DSAM Plastic Packaging Manufacturing')
            ->line('Your client account has been approved by the executive administration board.')
            ->line('You can now access the DSAM client dashboard for production telemetry, tooling records, and reorder requests.')
            ->action('Open Client Dashboard', route('client.dashboard'))
            ->line('This confirmation was sent to your registered account email address.');
    }
}

