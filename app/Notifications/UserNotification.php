<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $username, $urltoview , $usermessage;
    public function __construct($username,$urltoview,$usermessage)
    {

        //
        $this->username=$username;
        $this->urltoview=$urltoview;
        $this->usermessage=$usermessage;
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
                    ->greeting('Dear '.$this->username)
                    ->subject('Master Recruit')
                    ->line($this->usermessage)
                    ->action('Click Here', url($this->urltoview))
                    ->line('Thank you for using Master Recruit!');
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

    public function routeNotificationForMail($notification){
        return 'noreply@defemautos.com';
    }
}
