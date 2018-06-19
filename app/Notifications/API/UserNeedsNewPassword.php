<?php

namespace App\Notifications\API;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsNewPassword.
 */
class UserNeedsNewPassword extends Notification
{
    use Queueable;

    /**
     * @var
     */
    protected $password;

    /**
     * UserNeedsConfirmation constructor.
     *
     * @param $password
     */
    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(app_name().': '.__('Your New Password'))
            ->line(__('Please Save Your New Password'))
            ->line(__($this->password))
            ->line(__('Thank you for using our application!'));
    }
}
