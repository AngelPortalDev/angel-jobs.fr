<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BulkEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $employerName;

    /**
     * Create a new message instance.
     *
     * @param string 
     * @param string 
     * @param string 
     * @return void
     */
    public function __construct($subject, $content, $employerName)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->employerName = $employerName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject, 
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'bulk-email', 
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }

    public function build()
    {
       
        return $this->subject($this->subject)
                    ->view('bulk-email')
                    ->with([
                        'content' => $this->content,
                        'employerName' => $this->employerName,
                    ]);
    }
}