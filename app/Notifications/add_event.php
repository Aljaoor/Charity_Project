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
//        return ['mail','database'];
        return ['database'];

    }

//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//            ->greeting($this->details['greeting'])
//            ->line($this->details['body'])
//            ->line($this->details['thanks']);
//
//    }

    public function toDatabase($notifiable)
    {
        return [
//            'data' => $this->details['body']
            'id'=> $this->event_id,
            'title'=>'An event has been added by :',
            'user'=> Auth::user()->name,
        ];
    }
}
