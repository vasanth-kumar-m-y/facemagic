<?php

namespace App\Notifications\API;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsUuid.
 */
class UserNeedsUuid extends Notification
{
    use Queueable;

    /**
     * @var
     */
    protected $uuid;

    /**
     * UserNeedsConfirmation constructor.
     *
     * @param $uuid
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
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
            ->subject(app_name().': '.__('Your User Id'))
            ->line(__('Please Save Your User Id'))
            ->line(__($this->uuid))
            ->line(__('Thank you for using our application!'));
    }
}
