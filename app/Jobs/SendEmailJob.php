<?php

namespace App\Jobs;

use App\Mail\BulkEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Mail;
use SendGrid;
use SendGrid\Mail\Mail as SendGridMail;
use SendGrid\Mail\Mail;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $subject;
    public $content;
    public $employerName;
    public $email;
    public $Emailfrom;
    public $Emailcc;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $employerName, $email,$Emailfrom,$Emailcc)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->employerName = $employerName;
        $this->email = $email;
        $this->Emailfrom = $Emailfrom;
        $this->Emailcc = $Emailcc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        $sendgridApiKey = env('SENDGRID_API_KEY');
      
        $email = new SendGridMail();
        $email->setFrom('noreply@angel-jobs.com', $this->Emailfrom);
        $email->setSubject($this->subject);
        $email->addTo($this->email, $this->employerName);     
        $email->addCc($this->Emailcc); 
        $email->setReplyTo($this->Emailcc);            
        $email->addContent("text/html", $this->content );
        $sendgrid = new \SendGrid($sendgridApiKey);
        $response = $sendgrid->send($email);  
       
        // \Log::info('SendGrid Response Status Code: ' . $response->statusCode());
        // \Log::info('SendGrid Response Body: ' . $response->body());
        // \Log::info('SendGrid Response Headers: ' . json_encode($response->headers()));
    }
   
}
