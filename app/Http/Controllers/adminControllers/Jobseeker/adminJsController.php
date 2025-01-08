<?php

namespace App\Http\Controllers\adminControllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{jobseeker_profile as JobProfile, jobseeker as Jobseeker, jobseeker_payment as JsPayments, jobseeker_plan as JsPlan};
use Illuminate\Support\Facades\{Session, DB, Validator, Hash, Storage, Crypt};
use Carbon\Carbon;
use App\Http\Controllers\commonController;
use App\Exports\JobseekerDataExport;
use Excel;

class adminJsController extends Controller
{
    public $username;
    public $currentDate;
    public $time;
    public $Jobseeker;
    public $date;
    public $JsPlan;
    public function __construct()
    {
        $this->Jobseeker = new Jobseeker;
        $this->JsPlan = new JsPlan;
        $this->username = session()->get('emp_username');
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }
    public function planDetails(Request $req)
    {
        $id = isset($req->plan_id) ? $req->plan_id : 0;
        $data = DB::table('jobseeker_plan')->select(['plan_amount'])->where(['id' => $id, 'is_deleted' => 'No'])->get();
        if (!empty($data) && count($data) > 0) {
            echo json_encode(array('code' => 200, 'amount' => $data[0]->plan_amount, 'icon' => 'success'));
        } else {
            echo json_encode(['code' => 201, 'message' => 'Plan Not Found', "icon" => "error"]);
        }
    }
    public function getJsProfile()
    {

        if (session()->has('admin_username')) {

            $jobseekerData = Jobseeker::select('jobseekers.*', 'jobseeker_plan.plan_name')->leftJoin('jobseeker_plan', 'jobseeker_plan.id', '=', 'jobseekers.plan_id')->where('jobseekers.is_delete', 'No')->orderBy('id', 'DESC')->get();
           
            return view('admin.jobseeker.Jobseeker-main-view', compact('jobseekerData'));
        }
    }
    public function jsProfileView($js_id)
    {


        if (session()->has('admin_username') && !empty($js_id) && isset($js_id)) {

            $js_id = base64_decode($js_id);
            $jsUserData = DB::table('jobseeker_view')->where('js_id', $js_id)->where('is_delete', 'No')->orderBy('id', 'DESC')->get();


            return view('admin.jobseeker.jobseeker-view', compact('jsUserData'));
        }
    }
    public function jsProfileditView($emp_id)
    {
        if (session()->has('admin_username') && !empty($emp_id) && isset($emp_id)) {

            $emp_id = base64_decode($emp_id);

            $jsUserData = DB::table('jobseeker_view')->where('js_id', $emp_id)->where('is_delete', 'No')->get();


            return view('admin.jobseeker.jobseeker-edit', compact('jsUserData'));
        }
    }

    public function addjobseeker(Request $req)
    {


        if ($req->isMethod('POST') && session()->has('admin_username')) {

            $admin_user_id = Session::get('admin_user_id');
            $name = isset($req->fullname) ? htmlspecialchars($req->input('fullname')) : '';
            $mob_code = isset($req->mob_code) ? htmlspecialchars($req->input('mob_code')) : '';
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $email = isset($req->addemail) ? htmlspecialchars($req->input('addemail')) : '';
            $password = isset($req->password) ? htmlspecialchars($req->input('password')) : '';
            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $time = $booking_date . " " . $booking_time;

            $plan_id = 1; //Free Plan ID
            $plan_end_duration = 90;
            $plan_expired_on = $currentDate->addDays($plan_end_duration)->format('Y-m-d');
            $plan_details = $this->JsPlan->planDetails($plan_id, ['highlight_job_limit']); // 1 Free Welcom Plan


            if (jobseeker::where('email', $email)->count() === 0) {
                if (jobseeker::where('mobile', $contact_no)->where('mob_code', $mob_code)->count() === 0) {
                    $validate_rules = [
                        'fullname' => 'required|string|max:225',
                        'mob_code' => 'required',
                        'contact_no' => 'required|string|max:225',
                        'addemail' => 'required|email|max:225',
                        'password' => 'required|string|max:225',
                    ];


                    $validate = Validator::make($req->all(), $validate_rules);
                  
                   
                    if (!$validate->fails()) {
                      
                        DB::beginTransaction();
                        // print_r($plan_details);
                        // return "ghjdh";
                        try {
                            $user_id = DB::table('jobseekers')->insertGetId([
                                'fullname' => $name,
                                'mobile' => $contact_no,
                                'email' => $email,
                                'mob_code' => $mob_code,
                                'plan_id' => $plan_id,
                                'password' => Hash::make($password),
                                'is_delete' => 'No',
                                'created_at' => $time,
                            ]);;
                            DB::table('jobseeker_profiles')->insert([
                                'js_id' => $user_id,
                                'left_plan_credit_highlight' => 0,
                                'free_assign_highlight' => $plan_details[0]->highlight_job_limit,
                                'assign_by' => $admin_user_id,
                                'plan_start_from' => $this->date,
                                'plan_expired_on' => $plan_expired_on,
                            ]);
                            DB::table('jobseeker_educations')->insert([
                                'js_id' => $user_id,
                            ]);
                            DB::table('jobseeker_exps')->insert([
                                'js_id' => $user_id,
                            ]);
                            DB::commit();

                            // $dyc_id = Crypt::encrypt($user_id);
                            // $link =  env('APP_URL') . "/verfiy-mail/emp/" . $dyc_id;
                            // mail_send(6, ['#Name#', '#Email#', '#Link#'], [ucfirst($name), strtolower($email), $link], $email);
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Signup', 'icon' => 'success'));
                        } catch (\Exception $e) {
                            // return "Gfhfgh";
                            DB::rollback();
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

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }
    public function updateJsProfile(Request $req)
    {

        if ($req->isMethod('POST') && $req->ajax() && session()->has('admin_username') && !empty($req->all())) {

            // Profile Details
            $js_id = isset($req->js_id) ? base64_decode($req->input('js_id')) : '';
            $fullname = isset($req->fullname) ? htmlspecialchars($req->input('fullname')) : 'NA';
            $desig = isset($req->desig) ? htmlspecialchars($req->input('desig')) : '';
            $skill = is_array($req->skill) ? implode(',', $req->skill) : '';
            $pre_loc = isset($req->pre_loc) ? htmlspecialchars($req->input('pre_loc')) : '';
            $texp_year = is_numeric($req->texp_year) ? $req->input('texp_year') : 0;


            $curr_sal = isset($req->curr_sal) ? htmlspecialchars($req->input('curr_sal')) : '';
            $exp_sal = is_numeric($req->exp_sal) ? $req->input('exp_sal') : 0;
            // $indus = isset($req->indus) ? htmlspecialchars($req->input('indus')) : '';
            $func_area = isset($req->func_area) ? htmlspecialchars($req->input('func_area')) : 0;
            $prf_sum = isset($req->prf_sum) ? htmlspecialchars($req->input('prf_sum')) : '';
            $dob = isset($req->dob) ? $req->input('dob') : '';
            $gender = isset($req->gender) ? htmlspecialchars($req->input('gender')) : '';
            $martial_status = isset($req->martial_status) ? htmlspecialchars($req->input('martial_status')) : 0;
            $national = isset($req->national) ? htmlspecialchars($req->input('national')) : '';
            $country = isset($req->country) ? htmlspecialchars($req->input('country')) : '';
            $city = isset($req->city) ? htmlspecialchars($req->input('city')) : '';
            $postalcode = isset($req->postalcode) ? htmlspecialchars($req->input('postalcode')) : '';
            $full_address = isset($req->full_address) ? htmlspecialchars($req->input('full_address')) : '';
            $fbook = isset($req->fbook) ? htmlspecialchars($req->input('fbook')) : '';
            $insta = isset($req->insta) ? htmlspecialchars($req->input('insta')) : '';
            $twitter = isset($req->twitter) ? htmlspecialchars($req->input('twitter')) : '';
            $linkedin = isset($req->linkedin) ? htmlspecialchars($req->input('linkedin')) : '';
            $prefered_job_type = isset($req->prefered_job_type) ? htmlspecialchars($req->input('prefered_job_type')) : 0;
            $prefered_industry = isset($req->prefered_industry) ? htmlspecialchars($req->input('prefered_industry')) : 0;
            $passport_no = isset($req->passport_no) ? htmlspecialchars($req->input('passport_no')) : '';
            $work_permit = isset($req->work_permit) ? htmlspecialchars($req->input('work_permit')) : Null;
            $lang_skills = isset($req->lang) ? implode(',', $req->lang)  : '';
            $notice_period = isset($req->notice_period) ? $req->input('notice_period') : 0;
            $mobile = isset($req->mobile) ? $req->input('mobile') : 0;
            $country_code = isset($req->country_code) ? $req->input('country_code') : 0;

            $profile_image_name = !empty($req->input('prof_old_profile_image')) ? $req->input('prof_old_profile_image') : '';
            $resume_name = !empty($req->input('old_resume_file')) ? $req->input('old_resume_file') : '';

           

            // Update Educ
            $qual_name = isset($req->qual_name) ? htmlspecialchars($req->input('qual_name')) : 0;
            $inst_name = isset($req->inst_name) ? htmlspecialchars($req->input('inst_name')) : '';
            $spec = isset($req->spec) ? htmlspecialchars($req->input('spec')) : '';
            $passing_year = isset($req->passing_year) ? htmlspecialchars($req->input('passing_year')) : Null;


            // Update Expr Details
            $com_name = isset($req->com_name) ? htmlspecialchars($req->input('com_name')) : '';
            $wokr_desig = isset($req->wokr_desig) ? htmlspecialchars($req->input('wokr_desig')) : 0;
            $end_date = isset($req->end_date) ? htmlspecialchars($req->input('end_date')) : Null;
            $jdate = isset($req->jdate) ? htmlspecialchars($req->input('jdate')) : Null;

            $validate_rules = [
                'desig' => 'required|numeric|max:225',
                'lang' => 'array',
                'skill' => 'array',
                'pre_loc' => 'required|string',
                'prefered_job_type' => 'required|string',
                'notice_period' => 'required|string',
                'texp_year' => 'numeric',
                'exp_sal' => 'numeric',
                'city' => 'string',
                'national' => 'string',
                'fullname' => 'required|string|min:3',
                'mob_code' => 'required|numeric',
                'mobile' => 'required',
                'com_name' => 'required',
            ];

            $validate = Validator::make($req->only(['fullname', 'desig', 'lang', 'skill', 'pre_loc', 'prefered_job_type', 'notice_period', 'texp_year', 'exp_sal', 'national', 'city', 'fullname', 'mob_code', 'mobile','com_name']), $validate_rules);


            // return $validate->fails();
            if (!$validate->fails()) {
                // return "ffghfg";

                $exists = Jobseeker::where('id', $js_id)->where('is_delete', 'No')->count();

                if ($exists === 1) {




                    $resume_file_uploaded = TRUE;
                    if ($req->hasFile('resume_file')) {
                        $resume_file = $req->hasFile('resume_file') ? $req->file('resume_file') : '';

                        $resume_name = $req->hasFile('resume_file') ? $js_id . "_" . time() . "." . $resume_file->getClientOriginalExtension() :  $resume_name;
                        $folder = 'storage/jobseeker/resume/';
                        $resume_file_uploaded = file_upload($resume_file, $folder, $resume_name, $req->input('old_resume_file'));
                    }

                    $profile_image_uploaded = TRUE;
                    if ($req->hasFile('profile_image')) {
                        // Profile Image
                        $profile_image = $req->hasFile('profile_image') ? $req->file('profile_image') : '';

                        $profile_image_name = $req->hasFile('profile_image') ? $js_id . "_" . time() . "." . $profile_image->getClientOriginalExtension() :  $profile_image_name;
                        $folder = 'storage/jobseeker/profile_image/';
                        $profile_image_uploaded = file_upload($profile_image, $folder, $profile_image_name, $req->input('prof_old_profile_image'));
                    }

                    $fields =  [
                        'designaiton' => $desig,
                        'skill' => $skill,
                        'prefered_location' => $pre_loc,
                        'total_exp_year' => $texp_year,
                        'curr_salary' => $curr_sal,
                        'expected_salary' => $exp_sal,
                        'functional_area' => $func_area,
                        'proflie_summary' => $prf_sum,
                        'dob' => $dob,
                        'gender' => $gender,
                        'martial_status' => $martial_status,
                        'nationality' => $national,
                        'prefered_job_type' => $prefered_job_type,
                        'prefered_industry' => $prefered_industry,
                        'passport_no' => $passport_no,
                        'work_permit' => $work_permit,
                        'resume_link' => $resume_name,
                        'lang_skills' => $lang_skills,
                        'notice_period' => $notice_period,
                        'country' => $country,
                        'city' => $city,
                        'postal_code' => $postalcode,
                        'full_address' => $full_address,
                        'facebook_link' => $fbook,
                        'insta_link' => $insta,
                        'twitter_link' => $twitter,
                        'linkedin' => $linkedin,
                    ];
                    $work_exp =  [
                        'company_name' => $com_name,
                        'work_industry_id' => 0,
                        'work_desination_id' => $wokr_desig,
                        'annual_salary' => $skill,
                        'joining_date' => $jdate,
                        'ending_date' => $end_date,
                        'is_deleted' => 'No',
                    ];
                    $add_edu =  [
                        'institute_name' => $inst_name,
                        'degree_id' => $qual_name,
                        'specilization' => $spec,
                        'passing_year' => $passing_year,
                        'is_deleted' => 'No',
                    ];
                    $prof_img =  [
                        'profile_img' => $profile_image_name,
                        'fullname' => $fullname,
                    ];


                    $js_id_exist = JobProfile::where('js_id', $js_id)->count();
                    if ($resume_file_uploaded === TRUE && $profile_image_uploaded === TRUE) {
                        DB::beginTransaction();
                        try {

                            if ($js_id_exist != '' && $js_id_exist != 0) {

                                Jobseeker::where('id', $js_id)->update($prof_img);
                                JobProfile::where('js_id', $js_id)->update($fields);
                                DB::table('jobseeker_educations')->where('js_id', $js_id)->update($add_edu);
                                DB::table('jobseeker_exps')->where('js_id', $js_id)->update($work_exp);
                            }

                            DB::commit();
                            // mail_send(9, ['#Name#', '#Cat#'], [ucfirst($fullname), 'Jobseeker'], session()->get('js_username'));
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                        } catch (\Exception $e) {
                          
                            DB::rollBack();
                            echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                        }
                    } else {
                        echo json_encode(['code' => 201, 'message' => 'Unable to Upload Resume', "icon" => "error"]);
                    }
                } else {

                    echo json_encode(['code' => 201, 'message' => 'User Not Exist', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Something Went Wrong', "icon" => "error"]);
        }
    }
    public function jsProfildelete(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $userId = is_array($req->userId) ? $req->input('userId') : [];


            $deleted = 0;
            foreach ($userId as $id) {
                $emp_id = base64_decode($id);
                $exists = is_exist('jobseekers', ['id' => $emp_id, 'is_delete' => 'No']);
                if ($exists) {
                    try {
                        DB::table('jobseekers')->where('id', $emp_id)->update(['is_delete' => 'Yes']);
                        $deleted++;
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully Deleted', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'jobseeker is Already Deleted', "icon" => "error"]);
            }
        }
    }
    public function jsPlanAssign(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $user_id = Session::get('admin_user_id');
            $form = is_array($req->form) ? $req->input('form') : [];
            $plan_id = isset($req->plan_id) ? $req->input('plan_id') : '';
            $amount_recieved = isset($req->amount_recieved) ? $req->input('amount_recieved') : '';
            $trans_id = is_array($req->trans_id) ? $req->input('trans_id') : '';
            $order_id = $this->currentDate->format('YmdHis');

            $deleted = 0;
            foreach ($form as $userId) {
                $js_id = base64_decode($userId['value']);
                $exists = is_exist('jobseekers', ['id' => $js_id, 'is_delete' => 'No']);
                if ($exists) {
                    DB::beginTransaction();
                    try {

                        $plan_details = $this->JsPlan->planDetails($plan_id, ['highlight_job_limit', 'plan_duration']);
                        $plan_end_duration = $plan_details[0]->plan_duration;
                        $highlight_job_limit = $plan_details[0]->highlight_job_limit;
                        $plan_expired_on = $this->currentDate->addDays($plan_end_duration)->format('Y-m-d');

                        $payment_id =  DB::table('jobseeker_payments')->insertGetId([
                            'plan_id' =>
                            $plan_id, 'order_id' => $order_id, 'js_id' => $js_id, 'payment_id' => $trans_id, 'payment_amount' => $amount_recieved, 'pay_method' => 'ADMIN', 'status' => 3, 'confirm_by' => $user_id, 'created_at' => $this->time
                        ]);
                        DB::table('jobseekers')->where('id', $js_id)->update([
                            'plan_id' => $plan_id
                        ]);
                        DB::table('jobseeker_profiles')->where('js_id', $js_id)->update(['left_plan_credit_highlight' => $highlight_job_limit, 'plan_start_from' => $this->date, 'plan_expired_on' => $plan_expired_on, 'last_payment_recieved_id' => $payment_id, 'assign_by' => $user_id, 'last_payment_recieved_on' => $this->date]);


                        DB::commit();
                        $deleted++;
                    } catch (\Throwable $th) {

                        // return $th;
                        DB::rollback();
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => 'Plan Assigned Successfully', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Unable to Assign Check Jobseeker', "icon" => "error"]);
            }
        }
    }
    public  function jsExports()
    {

        return Excel::download(new JobseekerDataExport, 'jobseeker_report.xlsx');
    }
    public function getJsPlans()
    {

        if (session()->has('admin_username')) {

            $jsPlanData = DB::table('jobseeker_plan')->where('is_deleted', 'No')->get();
            return view('admin.jobseeker.jobseeker-plan-list', compact('jsPlanData'));
        }
    }
}