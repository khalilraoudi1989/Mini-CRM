<?php

// app/Notifications/InvitationNotification.php

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\InvitationMail;

class InvitationNotification extends Notification
{
    // ...

    public function toMail($notifiable)
    {
        return (new InvitationMail($this->invitation))
            ->to($this->invitation->email);
    }

    // ...
}