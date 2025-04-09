<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Exception;
use Illuminate\Support\Facades\Http;

class mailController extends Controller
{
    public function mailEnqiry(Request $req)
    {
        if ((request()->getHost() === 'www.angel-jobs.fr') && env('GOOGLE_SECRET_KEY')) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('GOOGLE_SECRET_KEY'),
                'response' => $req->input('g-recaptcha-response'),
            ]);
    
            $responseBody = json_decode($response->getBody());
    
            if (!$responseBody->success) {
     
                echo json_encode(array('code'=> 400, 'remark'=>'ReCAPTCHA verification failed. Please try again.'));
                
            }

        } else {
            $responseBody = (object)['success' => true];
        }
        if ($responseBody->success) {
            try {
                $name = isset($req->name) ? $req->input('name') : '';
                $email = isset($req->email) ? $req->input('email') : '';
                $cat = isset($req->cat) ? $req->input('cat') : '';
                $message2 = isset($req->message) ? $req->input('message') : '';

                $data = ['cat' => htmlspecialchars($cat), 'name' => htmlspecialchars($name), 'email' => htmlspecialchars($email),  'message2' => htmlspecialchars($message2)];
                $user['to'] = 'info@angel-jobs.fr';
                // Test
                // $user['to'] = 'aftab@angel-portal.com';
                $send = Mail::send('mail', $data, function ($message) use ($user, $email, $name) {
                    // $message->from('abdullah@angel-portal.com');
                    $message->from(env('MAIL_FROM_ADDRESS'));
                    $message->to($user['to']);
                    $message->subject('Enquiry Recieve from Angel-jobs.fr');
                    $message->replyTo($email, $name);
                });
                echo json_encode(array('code' => 200, 'remark' => 'send'));
            } catch (Exception $error) {

                return $error;
                echo json_encode(array('code' => 400, 'remark' => $error));
            }
        }
    }
}