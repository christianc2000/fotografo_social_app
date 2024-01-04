<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class InviteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $evento;
    /**
     * Create a new message instance.
     */
    public function __construct($details, $evento)
    {
        $this->details = $details;
        $this->evento = $evento;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('infodevdevs@gmail.com', 'Fotografia Social'),
            subject: 'Correo de invitación',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.mail',
            with: [
                'evento' => $this->evento,
                'details' => $this->details,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
