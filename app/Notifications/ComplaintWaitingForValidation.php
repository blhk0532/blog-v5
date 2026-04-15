<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Builds the complaint waiting for validation notification.
 */
class ComplaintWaitingForValidation extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Post $post) {}

    public function via(User $user) : array
    {
        return ['mail'];
    }

    public function toMail(User $user) : MailMessage
    {
        return (new MailMessage)
            ->subject('A complaint is waiting for validation')
            ->greeting('Heads up!')
            ->line("A complaint about {$this->post->company_name} from {$this->post->user->name} is waiting for validation.")
            ->action('Check', route('filament.admin.resources.posts.index'));
    }
}
