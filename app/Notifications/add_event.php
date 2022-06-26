<?php


namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class add_event extends Notification
{
    use Queueable;

    private $event_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($event_id)
    {
        $this->event_id = $event_id;
    }

    public function via($notifiable)
    {

        return ['database'];

    }



    public function toDatabase($notifiable)
    {
        return [

            'id'=> $this->event_id,
            'data'=>'An event has been added by :',
            'user'=> Auth::user()->name,
        ];
    }
}
