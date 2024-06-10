<?php

namespace App\Notifications;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public string $offer_id,
        public string $offer_title,
        public string $candidate_id,
        public string $candidate_name,
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/candidates/' . $this->offer_id);

        return (new MailMessage)
            ->subject(__('New candidate'))
            ->line(__("New registered candidate") . " !")
            ->line(__("In your offer") . ": " . $this->offer_title)
            ->line(__("Candidate") . ": " . $this->candidate_name)
            ->action(__("See candidates"), $url)
            ->line(__("Thanks for using")  . " " . config('app.name'));
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'offer_id' => $this->offer_id,
            'offer_title' => $this->offer_title,
            'candidate_id' => $this->candidate_id
        ];
    }
}
