<?php

namespace App\Notifications;

use App\Mention;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMention extends Notification
{
    use Queueable;

    private $mention;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Mention $mention)
    {
        $this->mention = $mention;
//        dd($this->mention);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'sender' => $this->mention->sender_id,
            'recipient' => $this->mention->recipient_id,
            'created_at' => $this->mention->created_at,
        ];
    }
}
