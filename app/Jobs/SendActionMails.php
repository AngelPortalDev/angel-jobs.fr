<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendActionMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $subject;
    protected $content;
    protected $recipient;

    public function __construct($subject, $content, $recipient)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->recipient = $recipient ?? 'test@gmail.com';
    }


    public function handle()
    {
      
        Mail::send('mailBody', ['newContain' => $this->content], function ($message) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            // $message->from('test@gmail.com');
            $message->to($this->recipient);
            $message->subject($this->subject);
        });
    }
}