<?php

namespace App\Console\Commands;
use App\Models\{employer as Employer};
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SubsubscriptionCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:mail';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * The console command description. 
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expirationDate = Carbon::now()->addDays(2)->toDateString();
        $empolyerdata=Employer::select('fullname','email','plan_expired_on')->whereDate('plan_expired_on', $expirationDate)->get();

        if ($empolyerdata->isEmpty()) {
            $this->info("No employers found whose plans will expire in 2 days.");           
           
            $adminEmail = 'admin@example.com';
            $adminSubject = 'No Expiring Plans Found';
            $adminMessage = 'There were no employers found with plans expiring in 2 days.';
            
            // mail_send($templateId, ['#Name#'], [$adminMessage], $adminEmail);
        } else {
            foreach ($empolyerdata as $empolyer) {
                
             
                $templateId = 32;
                $placeholders = ['#Name#', '#Planlink#', '#days#'];
                $values = [ucfirst($empolyer->fullname), route('employer-plans'), '2'];
                $sendTo = $empolyer->email;               
               
                mail_send($templateId, $placeholders, $values, $sendTo);                
              
                $this->info("Reminder email sent to: {$empolyer->email}");
            }
        }

    }
}
