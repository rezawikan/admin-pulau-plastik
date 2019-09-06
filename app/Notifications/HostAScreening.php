<?php

namespace App\Notifications;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class HostAScreening extends Notification
{
    use Queueable;

    protected $request;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
          ->greeting('Request Host A Screening From '. $this->request->fullName)
          ->subject('Request Host A Screening From '. $this->request->fullName)
          ->markdown('mail.screenings', [
            'email' => $this->request->email,
            'name' => $this->request->fullName,
            'community' => $this->request->community,
            'as' => $this->request->as,
            'date' => $this->request->date,
            'phone' => $this->request->phone,
            'time' => $this->request->time,
            'eventDecription' => $this->request->eventDecription,
            'location' => $this->request->location,
            'episode' => $this->request->episode,
            'audienceProfile' => $this->request->audienceProfile,
            'numbersOfAudience' => $this->request->numbersOfAudience,
            'ageOfAudience' => $this->request->ageOfAudience,
            'shortDescription_1' => $this->request->shortDescription_1,
            'shortDescription_2' => $this->request->shortDescription_2
          ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}
