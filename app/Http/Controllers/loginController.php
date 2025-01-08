<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\{Hash, Validator, Session, DB, Crypt};
use Illuminate\Support\Str;
use App\Models\{employer as Employer, jobseeker as Jobseeker, employer_plan as EmpPlan, admin_user as AdminUser};
use Exception;

class loginController extends Controller
{
    public $EmpPlan;
    public function __construct()
    {
        $this->EmpPlan = new EmpPlan;
    }
    public function employerEmailExist($email)
    {
        if (!empty($email)) {
            $count = Employer::where('email', $email)->count();


            echo json_encode(array('count' => $count));
        }
    }
    public function employerMobExist(Request $req)
    {
        if (!empty($req->all()) && $req->isMethod('POST') && $req->ajax()) {
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $mob_code = isset($req->mob_code) ? htmlspecialchars($req->input('mob_code')) : '';


            $count = Employer::where('mobile', $contact_no)->where('mob_code', $mob_code)->count();

            echo json_encode(array('count' => $count));
        }
    }
    public function employerSignup(Request $req)
    {
        
        if ($req->isMethod('POST') && $req->ajax()) {

           
            $name = isset($req->fullname) ? htmlspecialchars($req->input('fullname')) : '';
            $com_name = isset($req->com_name) ? htmlspecialchars($req->input('com_name')) : '';
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $email = isset($req->email) ? htmlspecialchars($req->input('email')) : '';
            $password = isset($req->c_password) ? htmlspecialchars($req->input('c_password')) : '';
            $tnc = isset($req->tnc) ? htmlspecialchars($req->input('tnc')) : '';
            $mob_code = isset($req->mob_code) ? htmlspecialchars($req->input('mob_code')) : '';
            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $time = $booking_date . " " . $booking_time;

            $plan_id = 1; //Free Plan ID
            $plan_end_duration = 90;
            $plan_expired_on = $currentDate->addDays($plan_end_duration)->format('Y-m-d');
            $plan_details = $this->EmpPlan->planDetails($plan_id, ['job_post_limit']); // 1 Free Welcom Plan

            if (Employer::where('email', $email)->count() === 0) {
                if (Employer::where('mobile', $contact_no)->where('mob_code', $mob_code)->count() === 0) {
            $validate_rules = [
                'fullname' => 'required|string|max:225',
                'com_name' => 'required|string|max:225',
                'contact_no' => 'required|string|max:225',
                'email' => 'required|email|max:225',
                'c_password' => 'required|string|max:225',
                'tnc' => 'required|string|max:225',
                'mob_code' => 'string|max:225',
            ];

         
            $validate = Validator::make($req->all(), $validate_rules);


                    if (!$validate->fails()) {
                        // return $req->all();
                try {

                    $user_id = Employer::create([
                        'fullname' => $name,
                        'mobile' => $contact_no,
                        'email' => $email,
                                'mob_code' => $mob_code,
                                'plan_id' => $plan_id,
                                'plan_start_from' => $booking_date,
                                'plan_expired_on' => $plan_expired_on,
                                'free_assign_job_posting' => $plan_details[0]->job_post_limit,
                                'company_name' => $com_name,
                        'password' => Hash::make($password),
                        'is_deleted' => 'No',
                        'register_date' => $time,
                    ]);
   
                            $emp_id = $user_id->id;
                            Session::put('user_id', $emp_id);
                            $dyc_id = Crypt::encrypt($emp_id);
                            $link =  env('APP_URL') . "/verfiy-mail/emp/" . $dyc_id;
                            mail_send(6, ['#Name#', '#Email#', '#Link#'], [ucfirst($name), strtolower($email), $link], $email);
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Signup', 'icon' => 'success'));
                        } catch (\Exception $e) {
                            echo json_encode(['code' => 201, 'message' => 'Credentials Invalid Or Already Exist', "icon" => "error"]);
                }
            } else {
                        echo json_encode(['code' => 201, 'message' => 'Mandatory Feilds are Missing', "icon" => "error"]);
            }
        } else {
                    echo json_encode(['code' => 201, 'message' => 'Phone No. is Already Exists', "icon" => "error"]);
                }
            } else {
                echo json_encode(['code' => 201, 'message' => 'Email id is Already Exist', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Something Went Wronge', "icon" => "error"]);
        }
    }
    // Employer Login
    public function employerLogin(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax() && !session()->has('emp_username')) {
            $username = isset($req->username) ? htmlspecialchars($req->input('username')) : '';
            $password = isset($req->password) ? htmlspecialchars($req->input('password')) : '';
            $rules = [
                "username" => "required|string|min:3",
                "password" => "required|string|min:3"
            ];
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {

                try {

                    $auth = Employer::where('email', $username)->where('is_deleted', 'No')->count();


                    if ($auth ===  1) {
                        $auth = Employer::where('email', $username)->get();
                        $dbpassword = $auth[0]['password'];
                        $name = $auth[0]['fullname'];
                        $user_id = $auth[0]['id'];



                        if (Hash::check($password, $dbpassword)) {
                            Session::put('emp_username', $username);
                            Session::put('emp_name', $name);
                            Session::put('emp_user_id', $user_id);
                            echo json_encode(['code' => 200]);
                        } else {
                            echo json_encode(['code' => 404, 'message' => 'Incorrect Username or Password']);
                        }
                    } else {
                        echo json_encode(['code' => 404, 'message' => 'Your are not Registered']);
                    }
                } catch (\Throwable $th) {
                    echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Invalid Credentials']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
            return;
        }
    }

    public function jobseekerEmailExist($email)
    {
        if (!empty($email)) {
            $count = Jobseeker::where('email', $email)->count();
            echo json_encode(array('count' => $count));
        }
    }
    public function jobseekerMobExist(Request $req)
    {
        if (!empty($req->all()) && $req->isMethod('POST') && $req->ajax()) {
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $mob_code = isset($req->mob_code) ? htmlspecialchars($req->input('mob_code')) : '';


            $count = Jobseeker::where('mobile', $contact_no)->where('mob_code', $mob_code)->count();

            echo json_encode(array('count' => $count));
        }
    }
    // Jobseeker Signup
    public function jobseekerSignup(Request $req)
    {

        if ($req->isMethod('POST') && $req->ajax()) {
           

            $name = isset($req->name) ? htmlspecialchars($req->input('name')) : '';
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $email = isset($req->email) ? htmlspecialchars($req->input('email')) : '';
            $password = isset($req->c_password) ? htmlspecialchars($req->input('c_password')) : '';
            $tnc = isset($req->tnc) ? htmlspecialchars($req->input('tnc')) : '';
            $mob_code = isset($req->mob_code) ? htmlspecialchars($req->input('mob_code')) : '';
            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $time = $booking_date . " " . $booking_time;
            $validate_rules = [
                'name' => 'required|string|max:225',
                'contact_no' => 'required|string|max:225',
                'email' => 'required|email|max:225',
                'c_password' => 'required|string|max:225',
                'tnc' => 'required|string|max:225',
                'mob_code' => 'required|string|max:225',
            ];

            $validate = Validator::make($req->all(), $validate_rules);

            if (Jobseeker::where('email', $email)->count() === 0) {
                if (Jobseeker::where('mobile', $contact_no)->where('mob_code', $mob_code)->count() === 0) {
                   
            if (!$validate->fails()) {

                try {
                    $user_id = Jobseeker::create([
                        'fullname' => $name,
                        'mob_code' => $mob_code,
                        'mobile' => $contact_no,
                        'email' => $email,
                        'email_verified' => 'No',
                        'password' => Hash::make($password),
                        'is_deleted' => 'No',
                        'register_date' => $time,
                    ]);
                            $js_id = $user_id->id;
                            Session::put('user_id', $js_id);
                            $dyc_id = Crypt::encrypt($js_id);
                            // Mail Verification Link
                            $dyc_id =  env('APP_URL') . "/verfiy-mail/js/" . $dyc_id;
                            mail_send(1, ['#Name#', '#Email#', '#Link#'], [ucfirst($name), strtolower($email), $dyc_id], $email);
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Signup', 'icon' => 'success'));
                        } catch (\Exception $e) {
                    echo json_encode(['code' => 201, 'message' => 'Credentials Invalid Or Already Exist 1', "icon" => "error"]);
                }
            } else {
                echo json_encode(['code' => 201, 'message' => 'Credentials Invalid Or Already Exist 2', "icon" => "error"]);
            }
                } else {
                    echo json_encode(['code' => 201, 'message' => 'Phone No. is Already Exists', "icon" => "error"]);
                }
            } else {
                echo json_encode(['code' => 201, 'message' => 'Email id is Already Exist', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Something Went Wrong', "icon" => "error"]);
        }
    }
    // Jobseeker Login
    public function jobseekerLogin(Request $req)
    {
        if ($req->isMethod('POST')) {
            $username = isset($req->username) ? htmlspecialchars($req->input('username')) : '';
            $password = isset($req->password) ? htmlspecialchars($req->input('password')) : '';
            $rules = [
                "username" => "required|string|min:3",
                "password" => "required|string|min:3"
            ];


            $validate = validator::make($req->all(), $rules);


            
            if (!$validate->fails()) {

                try {

                    $auth = Jobseeker::where('email', $username)->where('is_delete','No')->count();

                    if ($auth ===  1) {
                        $auth = Jobseeker::where('email', $username)->get();
                        $dbpassword = $auth[0]['password'];
                        $name = $auth[0]['fullname'];
                        $user_id = $auth[0]['id'];

                        if (Hash::check($password, $dbpassword)) {
                            Session::put('js_username', $username);
                            Session::put('js_name', $name);
                            Session::put('js_user_id', $user_id);
                            echo json_encode(['code' => 200, 'message' => 'Successfully Login']);
                            // return back();
                        } else {
                            echo json_encode(['code' => 404, 'message' => 'Incorrect Username or Password']);
                        }
                    } else {
                        echo json_encode(['code' => 404, 'message' => 'Your are not Registered']);
                    }
                } catch (\Throwable $th) {
                    echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Invalid Credentials']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
            return;
        }
    }
    public function employerExists($username)
    {
        $emailCount = Employer::where('email', $username)->count();

        echo json_encode(array('emailCount' => $emailCount));
    }
    public function jopseekerExists($username)
    {
        $emailCount = Jobseeker::where('email', $username)->count();

        echo json_encode(array('emailCount' => $emailCount));
    }
    public function changePassword(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username') || session()->has('js_username')) {

            // $dd = session()->has('emp_username');
            // dd($dd.'won');
            if (session()->has('js_username')) {
                $username = session()->get('js_username');
                $cate='login-jobseeker';
                $table = 'jobseekers';
                $cat = "Jobseeker";
            } elseif (session()->has('emp_username')) {
                $username = session()->get('emp_username');
                $cate='login-employer';
                $table = 'employers';
                $cat = "Employer";
                // dd($username.'won');
            } else {
                echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong ']);
                return;
            }
           
            $old_pass = isset($req->old_pass) ? htmlspecialchars($req->input('old_pass')) : '';
            $confirm_pass = isset($req->confirm_pass) ? htmlspecialchars($req->input('confirm_pass')) : '';
            $rules = [
                "old_pass" => "required",
                "confirm_pass" => "required|string|min:8|regex:/^(?=.*[a-zA-Z0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]+$/"
            ];
            $validate = validator::make($req->only(['old_pass', 'confirm_pass']), $rules);
            if ($old_pass != $confirm_pass) {

                if (!$validate->fails()) {

                    try {
                        $auth = DB::table($table)->where('email', $username)->count();

                        if ($auth ===  1) {
                            $auth = DB::table($table)->select(['fullname', 'password'])->where('email', $username)->get();
                            $dbpassword = $auth[0]->password;
                            $name = $auth[0]->fullname;

                            if (Hash::check($old_pass, $dbpassword)) {
                               $check  = DB::table($table)->where('email', $username)->update(['password' => Hash::make($confirm_pass)]);
                               $link= env('APP_URL') . "/".$cate;
                                mail_send(17, ['#Name#', '#Cat#','#Link#'], [ucfirst($name), $cat,$link], $username);
                                echo json_encode(['code' => 200, 'message' => 'Password has been changed']);
                            } else {
                                echo json_encode(['code' => 404, 'message' => 'Incorrect Old Password']);
                            }
                        } else {
                            echo json_encode(['code' => 404, 'message' => 'Your are not Registered']);
                        }
                    } catch (\Exception $th) {
                        echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong ']);
                    }
                } else {
                    echo json_encode(['code' => 404, 'message' => 'Invalid Credentials']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'New Password is Same as Old']);
                return;
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }
    public function verifyMail($cat, $id)
    {
       
        if (!empty($cat) && !empty($id)) {
           
            $id =  Crypt::decrypt($id);
           
            if ($cat === 'js') {
                $is_exist =   is_exist('jobseekers', ['id' => $id, 'email_verified' => 'Yes']);
                if ($is_exist === 0) {
                    $verifid =   Jobseeker::where(['id' => $id])->update(['email_verified' => 'Yes']);

                    
                    if ($verifid === 1) {
                        return redirect('verified-mail')->with('msg', 'You are Successfully Verified')->with('status', 'true');
                    } else {
                        return redirect('verified-mail')->with('msg', 'Unable to Verify')->with('status', 'false');
                    }
                } else {
                    return redirect('verified-mail')->with('msg', 'Someting Went Wrong')->with('status', 'false');
                }
            } elseif ($cat === 'emp') {

                $is_exist =   is_exist('employers', ['id' => $id, 'email_verified' => 'Yes']);
                if ($is_exist === 0) {
                    $verifid =   Employer::where(['id' => $id])->update(['email_verified' => 'Yes']);

                    
                    if ($verifid === 1) {
                        return redirect('verified-mail')->with('msg', 'You are Successfully Verified')->with('status', 'true');
                    } else {
                        return redirect('verified-mail')->with('msg', 'Unable to Verify')->with('status', 'false');
                    }
                } else {
                    return redirect('verified-mail')->with('msg', 'Someting Went Wrong')->with('status', 'false');
                }
            }
        } else {
            return redirect('verified-mail')->with('msg', 'Link has been Expired')->with('status', 'false');
        }
    }
    public function emailVerifyLinkResend(Request $req)
    {

        // dump(session()->get('js_name'));
       
        if ($req->isMethod('POST') && session()->has('emp_username') || session()->has('js_username')) {
            if (session()->has('js_username')) {
                $email = session()->get('js_username');
                $name = Session::get('js_name');
                $id = Session::get('js_user_id');
                $cat = "js";
                $tempt_id = 1;
               
            } elseif (session()->has('emp_username')) {
                $email = session()->get('emp_username');
                $name = Session::get('emp_name');
                $id = Session::get('emp_user_id');
                $cat = "emp";
                $tempt_id = 6;
            } else {
                echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
                return;
            }

            $dyc_id = Crypt::encrypt($id);
            
            // dump($email.'<=email'.$name.'<=name'.$id.'<=id'.$cat.'<=cat');
            $link =  env('APP_URL') . "/verfiy-mail/$cat/" . $dyc_id;
           
            try {                                   
              $mail_send =   mail_send($tempt_id, ['#Name#', '#Email#', '#Link#'], [ucfirst($name), strtolower($email), $link], $email);
                
                echo json_encode(['code' => 200, 'message' => 'Verification Link Send']);
            }
             catch (Exception $e) {
                // dump($mail_send);
                echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
            }

        } else {
            echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
            // dump('check-2');
        }
    }


    // Forgot Password 
    public function resetPassLinkSend(Request $req)
    {


        if ($req->isMethod('POST') && !session()->has('emp_username') || !session()->has('js_username') && is_array($req->all())) {


            $email = isset($req->email) ? htmlspecialchars($req->input('email')) : '';
            $cat = isset($req->passtype) ? base64_decode($req->input('passtype')) : '';

            if ($cat === 'js') {
                $tempt_id = 16;
                $table = 'jobseekers';
                $where = ['email' => $email, 'is_delete' => 'No'];
                $cate = "Jobseeker";
            } elseif ($cat === 'emp') {
                $table = 'employers';
                $where = ['email' => $email, 'is_deleted' => 'No'];
                $tempt_id = 8;
                $cate = "Employer";
            } else {
                echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong', 'text' => 'Inavalid Account']);
                return;
            }

            $token = Str::random(64);

            $validate_rules = [
                'email' => 'required|email|max:225',
                'passtype' => 'required|string|max:225',
            ];

            $validate = Validator::make($req->all(), $validate_rules);

            if (!$validate->fails() && !empty($email) && !empty($cat) && isset($email) && isset($cat) && isset($token) && !empty($token)) {
                $is_exist =   is_exist($table, $where);
                if ($cat === 'js' && $is_exist > 0) {
                    $id =   Jobseeker::select('id')->where($where)->get();
                } elseif ($cat === 'emp' && $is_exist > 0) {
                    $id =   Employer::select('id')->where($where)->get();
                }

                // return $cat;
                if (isset($id[0]) && count($id) > 0) {
                    DB::beginTransaction();
                    try {
                        DB::table($table)->where($where)->update(['reset_token' => $token]);
                        $email_enc = base64_encode($email);
                        $cat_enc = base64_encode($cat);
                        $link =  env('APP_URL') . "/reset-password-form/$cat_enc/$email_enc/" . $token;
                        mail_send($tempt_id, ['#Link#','#Cat#'], [$link,$cate], $email);
                        DB::commit();
                        echo json_encode(['code' => 200, 'message' => 'Reset Link Sent Successfully']);
                    } catch (Exception $e) {
                        DB::rollback();
                        echo json_encode(['code' => 404, 'message' => 'Somthing Went Wrong', 'text' => 'Unble to Send Mail.']);
                    }
                } else {
                    echo json_encode(['code' => 404, 'message' => 'Email ID Not Registered', 'text' => 'No Account Associate With This Email.']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Field Missing', 'text' => 'Inavalid Entery.']);
            }
        }
    }
    public function resetpasswordForm($enc_cat, $enc_email, $token)
    {

        if (isset($enc_cat) && !empty($enc_cat) && isset($enc_email) && !empty($enc_email) && isset($token) && !empty($token)) {

            $cat = base64_decode($enc_cat);
            $email = base64_decode($enc_email);

            if ($cat === 'js') {
                $tempt_id = 7;
                $table = 'jobseekers';
                $where = ['email' => $email, 'reset_token' => $token, 'is_delete' => 'No'];
            } elseif ($cat === 'emp') {
                $table = 'employers';
                $where = ['email' => $email, 'reset_token' => $token, 'is_deleted' => 'No'];
                $tempt_id = 8;
            } else {
                echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong', 'text' => 'Inavalid Account']);
                return;
            }
            try {
                $exists = DB::table($table)->where($where)->count();

                if ($exists === 1) {
                    $data['enc_cat'] = $enc_cat;
                    $data['enc_email'] = $enc_email;
                    $data['token'] = $token;

                    return view('reset-password-form', compact('data'));
                } else {
                    return view('not-found')->with('msg', 'User Not Found Or Link Expired');
                    // echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
                }
            } catch (\Exception $e) {

                return  view('not-found')->with('msg', 'Unable to Open');
                // echo json_encode(['code' => 201, 'message' => 'Unable to Open', "icon" => "error"]);
            }
        } else {

            return redirect()->back()->with('msg', 'Job Not Exist');
            // echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
        }
    }

    public function resetPassword(Request $req)
    {

        if ($req->isMethod('POST') && !session()->has('emp_username') && !session()->has('js_username') && is_array($req->all())) {

            $cat = isset($req->passType1) ? base64_decode($req->input('passType1')) : '';
            $email = isset($req->passType2) ? base64_decode($req->input('passType2')) : '';
            $token = isset($req->passType3) ? $req->input('passType3') : '';
            $newpass = isset($req->newpass) ? $req->input('newpass') : '';
            $newpasscon = isset($req->newpasscon) ? $req->input('newpasscon') : '';
            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $datetime = $booking_date . " " . $booking_time;

            $validate_rules = [
                'newpass' => 'required|min:8|max:15',
                'newpasscon' => 'required|min:8|max:15',
            ];

            $validate = Validator::make($req->all(), $validate_rules);



            if (!$validate->fails() && !empty($email) && !empty($cat) && isset($email) && isset($cat) && isset($token) && !empty($token)) {
                if ($cat === 'js') {
                    $table = 'jobseekers';
                    $cat_name = 'Jobseeker';
                    $url = '/login-jobseeker';
                    $where = ['email' => $email, 'reset_token' => $token, 'is_delete' => 'No'];
                } elseif ($cat === 'emp') {
                    $url = '/login-employer';
                    $table = 'employers';
                    $cat_name = 'Employer';
                    $where = ['email' => $email, 'reset_token' => $token, 'is_deleted' => 'No'];
                } else {
                    echo json_encode(['code' => 404, 'message' => 'Something Went Wrong', 'text' => 'Inavalid Account']);
                    return;
                }

                $is_exist =   is_exist($table, $where);

                if ($is_exist === 1) {
                    
                    DB::beginTransaction();
                    try {
                        $currentPassword = DB::table($table)->where($where)->value('password');        
                        
                        if (Hash::check($newpasscon, $currentPassword)) {
                            echo json_encode(['code' => 400,'message' => 'Password Not Reset.','text' => 'Please use a different password']);
                            return; 
                        }
                        $updatedData = DB::table($table)->select('fullname')->where($where)->first();
                        DB::table($table)->where($where)->update(['password' => Hash::make($newpasscon), 'reset_token' => $datetime]);
                        $name = $updatedData->fullname;
                        mail_send(17, ['#Name#', '#Cat#'], [ucfirst($name), ucfirst($cat_name)], $email);
                        echo json_encode(['code' => 200, 'message' => 'New Password Reset Successfully', 'url' => $url]);
                        DB::commit();
                    } catch (Exception $e) {
                        DB::rollback();
                        echo json_encode(['code' => 404, 'message' => 'Password Not Reset', 'text' => 'Unable to Reset New Password.']);
                    }
                } else {
                    echo json_encode(['code' => 404, 'message' => 'Email ID Not Registered', 'text' => 'No Account Associate With This Email.']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Field Missing', 'text' => 'Inavalid Entry.']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Someting Went Wrong', 'text' => 'Inavalid Entry.']);
        }
    }
    public function logout()
    {
        session()->flush();
         return redirect('/')->with('successlogout', 'Successfully Logged Out');
        //return redirect('/');
    }


    // Admin Section 
    public function adminLogin(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax() && !session()->has('admin_username')) {
            $username = isset($req->username) ? htmlspecialchars($req->input('username')) : '';
            $password = isset($req->password) ? htmlspecialchars($req->input('password')) : '';
            $rules = [
                "username" => "required|string|min:3",
                "password" => "required|string|min:3"
            ];
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {

                try {

                    $auth = AdminUser::where('email', $username)->count();

                    if ($auth ===  1) {
                        $auth = AdminUser::where('email', $username)->get();
                        $dbpassword = $auth[0]['password'];
                        $name = $auth[0]['fullname'];
                        $user_id = $auth[0]['id'];


                        if (Hash::check($password, $dbpassword)) {
                            Session::put('admin_username', $username);
                            Session::put('admin_name', $name);
                            Session::put('admin_user_id', $user_id);
                            echo json_encode(['code' => 200]);
                        } else {
                            echo json_encode(['code' => 404, 'message' => 'Incorrect Username or Password']);
                        }
                    } else {
                        echo json_encode(['code' => 404, 'message' => 'Your are not Registered']);
                    }
                } catch (\Throwable $th) {
                    echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Invalid Credentials']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Something Went Wrong']);
            return;
        }
    }
}