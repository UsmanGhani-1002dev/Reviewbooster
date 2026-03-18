<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Review;

class ReviewContactedMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $review;

    /**
     * Create a new message instance.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Get the message envelope.
     */
   public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for your feedback - We\'d like to help!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
          return new Content(
            view: 'emails.review-contacted',
            with: [
                'customerName' => $this->review->name,
                'reviewText' => $this->review->review,
                'rating' => $this->review->rating,
                'reviewDate' => $this->review->created_at->format('F j, Y'),
            ]
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
