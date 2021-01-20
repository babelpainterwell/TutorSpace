<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InviteToBeTutorNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $inviteCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inviteCode, User $user)
    {
        $this->user = $user;
        $this->inviteCode = $inviteCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->greeting('Dear ' . $notifiable->first_name)
                    ->line($this->user->first_name . ' ' . $this->user->last_name . ' invited you to be a tutor.')
                    ->line('Your referral code is ' . $this->inviteCode)
                    // todo: 具体化bonus是多少
                    ->line('Please register to be a tutor and earn your bonus!')
                    ->action('Register Now', url('/'))
                    ->line('Thank you for using TutorSpace!');
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
            'user' => $this->user,
            'inviteCode' => $this->inviteCode
        ];
    }
}
