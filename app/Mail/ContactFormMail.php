<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactSubmission;
use Illuminate\Mail\Mailables\Address;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;
    public $isConfirmation;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactSubmission $submission, bool $isConfirmation = false)
    {
        $this->submission = $submission;
        $this->isConfirmation = $isConfirmation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
{
    $fromAddress = new Address(
        config('mail.from.address'),
        config('mail.from.name', 'ReviewBoost')
    );

    $replyToAddress = new Address(
        $this->submission->email,
        $this->submission->first_name . ' ' . $this->submission->last_name
    );

    if ($this->isConfirmation) {
        return new Envelope(
            subject: 'Thank you for contacting ReviewBoost - We\'ll be in touch soon!',
            from: $fromAddress,
            replyTo: [$replyToAddress]
        );
    }

    return new Envelope(
        subject: 'New Contact Form Submission: ' . $this->submission->subject,
        from: $fromAddress,
        replyTo: [$replyToAddress]
    );
}


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->isConfirmation) {
            return new Content(
                view: 'emails.contact-confirmation',
                with: [
                    'submission' => $this->submission,
                ],
            );
        }

        return new Content(
            view: 'emails.contact-notification',
            with: [
                'submission' => $this->submission,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}