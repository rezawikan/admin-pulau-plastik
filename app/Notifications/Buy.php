<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Buy extends Notification
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
          ->subject($this->request->fullName.' want to buy our merchandise')
          ->line('Full Name :'. $this->request->fullName)
          ->line('Address :'. $this->request->address)
          ->line('Telp :'. $this->request->telp)
          ->line('Email :'. $this->request->email)
          ->line('Product : '.$this->request->product_title)
          ->line('Amount : '.$this->request->numbers)
          ->line($this->request->additional ? 'Additional : '.$this->request->additional : 'Additional : -' )
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
