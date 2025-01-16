<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class JobSeekerUpdateProfile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobSeekerUpdateProfile {--limit= : Number of emails to send in one batch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send update profile emails to jobseekers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = $this->option('limit');

        $jobseekers = getData('jobseekers', ['id', 'fullname', 'email', 'password'], ['update_profile_email_sent' => 0], env('SEND_EMAIL_LIMIT'));

        if (!isset($jobseekers) || empty($jobseekers)) {
            $this->info('No jobseekers left to send emails.');
            return 0;
        }

        foreach ($jobseekers as $jobseeker) {

            try {
                $name = ucfirst($jobseeker->fullname);
                
                $email = $jobseeker->email;
                $password = substr(Hash::make($jobseeker->email), 0, 10);
                $hashedPassword = Hash::make($password);
                $sendTo = $jobseeker->email;

                $select = [
                    'password' => $hashedPassword,
                    'update_profile_email_sent' => 1
                ];

                $where = ['id' => $jobseeker->id];

                $jobSeeker = processData(['jobseekers', 'id'], $select, $where);

                if (isset($jobSeeker) && $jobSeeker['status'] === true) {
                    mail_send(
                        39, 
                        ['#Name#', '#Email#', '#Password#'], 
                        [$name, $email, $password], 
                        $sendTo
                    );
                    $this->info("Email sent to: {$sendTo}");
                }
                
            } catch (\Exception $e) {
                $this->error("Failed to send email to: {$jobseeker->email}. Error: " . $e->getMessage());
            }
        }

        return 0;
    }
}
