<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ListingContactCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $listing, $sender, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($listing, $sender, $message)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->message = $message;
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
                    ->line(__('contact_message_sent', ['sender_name' => $this->sender->name]))
                    ->action('See contact message', route('listings.show', [$this->listing->area, $this->listing->slug]))
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
            'link' => route('listings.show', [$this->listing->area, $this->listing->slug]),
            'message' => __('contact_message_sent', ['sender_name' => $this->sender->name]),
        ];
    }
}
