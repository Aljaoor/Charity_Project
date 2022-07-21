<?php
namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class process extends Notification
{
    use Queueable;

    private $details;




    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        $this->details = $details;

    }

    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase($notifiable)
    {



        return [
            'id' => $this->details['id'],
            'data' => $this->details['body'],
            'event' => $this->details['event'],

        ];
    }
}
