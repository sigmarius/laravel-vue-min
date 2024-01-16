<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AddCommentForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $postTitle;
    protected $comment;

    protected $user;

    /**
     * Create a new message instance.
     */
    public function __construct($postTitle, $comment, $user)
    {
        $this->postTitle = $postTitle;
        $this->comment = $comment;

        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Add Comment Form',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.comment_form',
            with: [
                'postTitle' => $this->postTitle,
                'comment' => $this->comment,
                'userName' => $this->user->name,
                'userEmail' => $this->user->email,
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
