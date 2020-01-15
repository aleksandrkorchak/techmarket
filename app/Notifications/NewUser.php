<?php

namespace App\Notifications;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification
{
    use Queueable;


    private $user;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
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
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        $role = $this->user->role_id;
        switch ($role) {
            case 1:
                $text = 'Создан новый покупатель';
                break;

            case 2:
                $text = 'Создан новый продавец';
                break;

            default:
                $text = 'Тип пользователя не определен';
                break;
        }


        return [
            'text' => $text,
            'user_login' => $this->user->login,
            'user_id' => $this->user->id,
            'user_created_at' => $this->user->created_at,
        ];
    }


//    public function toDatabase($notifiable)
//    {
//        return [
//
//        ];
//    }

}
