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
          ->greeting('Hi')
          ->subject('Request Host A Screening From '. $this->request->fullName)
          ->line('You get an email from '. $this->request->fullName)
          ->line('Community : '.$this->request->community)
          ->line('As a : '.$this->request->as)
          ->line('Contact Person : '.$this->request->phone)
          ->line('Date of Event : '.$this->request->date)
          ->line('Time of Event : '.$this->request->time)
          ->line('Event Description : '.$this->request->eventDecription)
          ->line('location : '.$this->request->location)
          ->line('Episode : '.$this->request->episode)
          ->line('Audience Profile : '.$this->request->audienceProfile)
          ->line('Numbers of Audience : '.$this->request->numbersOfAudience)
          ->line('Age of Audience : '.$this->request->ageOfAudience)
          ->line('Email : '.$this->request->email)
          ->line('Short Description About Pulau Plastik : '.$this->request->shortDescription_1)
          ->line('I want to say : '.$this->request->shortDescription_2)
          ->markdown('mail.contact-us');
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
            //
        ];
    }
}
