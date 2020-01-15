<?php

namespace App\Notifications;

use App\Offer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewDeal extends Notification
{
    use Queueable;

    private $offer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
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
//        dump('Автор заявки ' . $this->offer->search->user->id . ' ' . $this->offer->search->user->login);
//        dump('Сделал предложение ' . $this->offer->user->id . ' ' . $this->offer->user->login);
//        dump('ID предложения ' . $this->offer->id);
//        dd('ID заявки ' . $this->offer->search->id);

        return [
            'customer' => $this->offer->search->user->login,
            'seller' => $this->offer->user->login,
//            'offer_id' => $this->offer->id,
            'search_id' => $this->offer->search->id,
            'accepted_at' => $this->offer->search->offer_accepted_at
        ];
    }
}
