<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyNewLeadsMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public int $leadsCount
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'noreply@lasoads.com',
            subject: 'Имате ' . $this->leadsCount . ' нови запитвания в LASO!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email-notify-new-leads',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
