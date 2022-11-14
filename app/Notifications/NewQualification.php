<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQualification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $practitioner;
    protected $practitioner_qualification;
    protected $comment;

    public function __construct($practitioner, $practitioner_qualification, $comment)
    {
        //
        $this->practitioner = $practitioner;
        $this->practitioner_qualification = $practitioner_qualification;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->replyTo('nigel@leadingdigital.africa')
            ->from('admin@ehpcz.co.zw')
            ->subject('Practitioner qualification - ' . $this->practitioner->first_name . ' ' .
                $this->practitioner->last_name)
            ->line('Practitioner qualification has been submitted, requires your attention.')
            ->line('You can view application on the link below.')
            ->action('View Application Details', url('/admin/practitioner_qualifications/' .
                $this->practitioner_qualification->id . '/show'));

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->practitioner->id,
            'comment' => $this->comment,
            'title' => 'New Application - ' . $this->practitioner->first_name . ' '
                . $this->practitioner->last_name,
            'sender' => 'admin@ehpcz.co.zw',
        ];
    }
}
