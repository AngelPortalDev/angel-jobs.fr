<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Exception;

class mailController extends Controller
{
    public function mailEnqiry(Request $req)
    {
        try {



            $name = isset($req->name) ? $req->input('name') : '';
            $email = isset($req->email) ? $req->input('email') : '';
            $cat = isset($req->cat) ? $req->input('cat') : '';
            $message2 = isset($req->message) ? $req->input('message') : '';

            $data = ['cat' => htmlspecialchars($cat), 'name' => htmlspecialchars($name), 'email' => htmlspecialchars($email),  'message2' => htmlspecialchars($message2)];
            $user['to'] = $email;
            // Test
            // $user['to'] = 'aftab@angel-portal.com';
            $send = Mail::send('mail', $data, function ($message) use ($user, $email, $name) {
                $message->from('amservices12info@gmail.com');
                $message->to($user['to']);
                $message->subject('Enquiry Recieve from Angel-jobs.in');
                $message->replyTo($email, $name);
            });
            echo json_encode(array('code' => 200, 'remark' => 'send'));
        } catch (Exception $error) {

            return $error;
            echo json_encode(array('code' => 400, 'remark' => $error));
        }
    }
}