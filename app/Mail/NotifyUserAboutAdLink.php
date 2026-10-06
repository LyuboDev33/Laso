<?php

namespace App\Mail;

use App\Models\User;
use App\Models\UserAd;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyUserAboutAdLink extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param UserAd $ad
     */
    public function __construct(
        public User $user,
        public UserAd $ad
    ) {}

    /**
     * Get the message envelope.
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'noreply@lasoads.com',
            subject: 'LASO | Рекламата е готова',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email-notify-user-about-ad-link',
            with: [
                'user' => $this->user,
                'ad' => $this->ad,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
