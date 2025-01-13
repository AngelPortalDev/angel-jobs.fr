<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\BulkEmail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $subject;
    public $content;
    public $employerName;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $employerName, $email)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->employerName = $employerName;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Mail::to($this->email)->send(new BulkEmail($this->subject, $this->content, $this->employerName));
    }
}
