<?php

namespace App\Http\Controllers\Jobseeker;


use App\Http\Controllers\Controller;
use App\Http\Controllers\commonController;
use App\Models\jobseeker as Jobseeker;
use App\Models\jobseeker_profile as JobProfile;
use App\Models\jobseeker_education as JobEdu;
use App\Models\jobseeker_exps as JobExp;
use App\Models\jobseeker_plan;
use App\Models\employer_plan as EmpPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

use Exception;

use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class jobSeekerProfile extends Controller
{
    public $commonController;
    public $Jobseeker;
    public $username;
    public $desig;
    public $industry;
    public $qualifications;
    public $city_name;
    public $martial_status;
    public $key_skills;
    public $country_master;
    public $planData;
    public $functional_areas;
    public $EmpPlan;
    public function __construct()
    {
        $this->commonController = new commonController;
        $this->Jobseeker = new Jobseeker;
        $this->planData = new jobseeker_plan;
        $this->EmpPlan = new EmpPlan;
        $this->username = Session::get('js_username');
        $where = ['id', 'role_name'];
        $this->desig = $this->commonController->getDropDownlist('designations', $where);
        $where = ['id', 'industries_name'];
        $this->industry = $this->commonController->getDropDownlist('industries', $where);
        $where = ['id', 'educational_qualification'];
        $this->qualifications = $this->commonController->getDropDownlist('qualifications', $where);
        $where = ['id', 'city_name'];
        $this->city_name = $this->commonController->getDropDownlist('cities', $where);
        $where = ['id', 'marital_status'];
        $this->martial_status = $this->commonController->getDropDownlist('martial_status', $where);
        $where = ['id', 'key_skill_name'];
        $this->key_skills = $this->commonController->getDropDownlist('key_skills', $where);
        $where = ['id', 'country_name', 'country_code'];
        $this->country_master = $this->commonController->getDropDownlist('country_master', $where);
        $where = ['id', 'functional_name'];
        $this->functional_areas = $this->commonController->getDropDownlist('functional_areas', $where);
    }

    public function getjsProfileView()
    {




        if (session()->has('js_username')) {
            $profileDetails = $this->Jobseeker->profileDetails();
            $industry = $this->industry;
            $desig = $this->desig;
            $city_name = $this->city_name;
            $martial_status = $this->martial_status;
            $key_skills = $this->key_skills;
            $country_master = $this->country_master;
            $functional_areas = $this->functional_areas;

            return view('jobseeker.jobseeker-profile', compact('profileDetails', 'city_name', 'martial_status', 'industry', 'desig', 'key_skills', 'country_master', 'functional_areas'));
        }
    }
    public function getjseEduView()
    {
        $qualifications = $this->qualifications;
        $eduDetails = $this->Jobseeker->eduDetails();
        return view('jobseeker.jobseeker-education', compact('eduDetails', 'qualifications'));
    }
    public function getjseExpView()
    {
        $industry = $this->industry;
        $desig = $this->desig;
        $expDetails = $this->Jobseeker->expDetails();
        return view('jobseeker.jobseeker-experience', compact('expDetails', 'industry', 'desig'));
    }
    public function addJsProfile(Request $req)
    {


        if ($req->isMethod('POST') && $req->ajax() && session()->has('js_username') && !empty($req->all())) {

          
            $fullname = isset($req->fullname) ? htmlspecialchars($req->input('fullname')) : '';
            $desig = isset($req->desig) ? htmlspecialchars($req->input('desig')) : '';
            $skill = is_array($req->skill) ? implode(',', $req->skill) : '';
            $pre_loc = isset($req->pre_loc) ? htmlspecialchars($req->input('pre_loc')) : '';
            $texp_year = isset($req->texp_year) ? htmlspecialchars($req->input('texp_year')) : 0;
            // $texp_month = isset($req->texp_month) ? htmlspecialchars($req->input('texp_month')) : '';
            $curr_sal = isset($req->curr_sal) ? htmlspecialchars($req->input('curr_sal')) : '';
            $exp_sal = isset($req->exp_sal) ? htmlspecialchars($req->input('exp_sal')) : '';
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
            $work_mode = is_array($req->select_work_mode)  ? implode(',', $req->select_work_mode) : 0;
            $prefered_industry = isset($req->prefered_industry) ? htmlspecialchars($req->input('prefered_industry')) : 0;
            $passport_no = isset($req->passport_no) ? htmlspecialchars($req->input('passport_no')) : '';
            $work_permit = isset($req->work_permit) ? htmlspecialchars($req->input('work_permit')) : Null;
            $is_hadicaped = isset($req->is_hadicaped) ? htmlspecialchars($req->input('is_hadicaped')) : '';
            $lang_skills = isset($req->lang) ? implode(',', $req->lang)  : '';
            $notice_period = isset($req->notice_period) ? $req->input('notice_period') : 0;
            $js_user_id = session()->get('js_user_id');


            $resume_file = $req->hasFile('resume_file') ? $req->file('resume_file') : '';
            $old_img_name = !empty($req->input('old_resume_file')) ? $req->input('old_resume_file') : '';
            $resume_name = $req->hasFile('resume_file') ? $js_user_id . "_" . time() . "." . $resume_file->getClientOriginalExtension() :  $old_img_name;

        
            $validate_rules = [
                'desig' => 'required|numeric',
                'lang' => 'required|array',
                'skill' => 'required|array',
                'pre_loc' => 'required|string',
                'prefered_job_type' => 'required|string',
                'notice_period' => 'required|string',
                'texp_year' => 'required|string',
                'exp_sal' => 'required',
                'city' => 'required',
                // 'national' => 'required',
            ];

            $validate = Validator::make($req->only(['desig', 'lang', 'skill', 'pre_loc', 'prefered_job_type', 'notice_period', 'texp_year', 'exp_sal', 'national', 'city']), $validate_rules);


            if (!$validate->fails()) {
                  
                $exists = Jobseeker::where('email', session()->get('js_username'))->where('is_delete', 'No')->count();


                if ($exists === 1) {
                    $logo_uploaded = TRUE;
                    if ($req->hasFile('resume_file')) {
                        $folder = 'storage/jobseeker/resume/';
                        $logo_uploaded = file_upload($resume_file, $folder, $resume_name, $req->input('old_resume_file'));
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
                        'work_mode'=> $work_mode,
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


                    $js_id_exist = JobProfile::where('js_id', session()->get('js_user_id'))->count();
                    if ($logo_uploaded === TRUE) {
                        try {
                           
                            if ($js_id_exist != '' && $js_id_exist != 0) {
                                $user_id = JobProfile::where('js_id', $js_user_id)->update($fields);
                            } else {

                                $fields = array_merge($fields, ['js_id' => $js_user_id]);
                                $user_id = JobProfile::insertGetId($fields);
                            }
                            $link= env('APP_URL')."/login-empolyer";
                             mail_send(9, ['#Name#', '#Cat#','#Link#'], [ucfirst(session()->get('js_name')), 'Jobseeker',$link], session()->get('js_username'));
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                        } catch (\Exception $e) {
                            return $e;
                            echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                        }
                    } else {
                        echo json_encode(['code' => 201, 'message' => ' ume', "icon" => "error"]);
                    }
                } else {

                    echo json_encode(['code' => 201, 'message' => 'User Not Exist', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }
    public function addJsEdu(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax() && session()->has('js_username') && !empty($req->all())) {


            $qual_name = isset($req->qual_name) ? htmlspecialchars($req->input('qual_name')) : 0;
            $inst_name = isset($req->inst_name) ? htmlspecialchars($req->input('inst_name')) : '';
            $spec = isset($req->spec) ? htmlspecialchars($req->input('spec')) : '';
            $passing_year = isset($req->passing_year) ? htmlspecialchars($req->input('passing_year')) : Null;
            $js_user_id = session()->get('js_user_id');


            $validate_rules = [
                'qual_name' => 'required|numeric|min:1',
            ];

            $validate = Validator::make($req->only(['qual_name']), $validate_rules);

            if (!$validate->fails()) {
                $exists = Jobseeker::where('email', session()->get('js_username'))->where('is_delete', 'No')->count();


                if ($exists === 1) {
                    $fields =  [
                        'institute_name' => $inst_name,
                        'degree_id' => $qual_name,
                        'specilization' => $spec,
                        'passing_year' => $passing_year,
                        'is_deleted' => 'No'
                    ];
                    $js_id_exist = JobEdu::where('js_id', session()->get('js_user_id'))->count();
                    try {

                        if ($js_id_exist != '' && $js_id_exist != 0) {
                            $user_id = JobEdu::where('js_id', $js_user_id)->update($fields);
                        } else {
                            $fields = array_merge($fields, ['js_id' => $js_user_id]);
                            $user_id = JobEdu::insertGetId($fields);
                        }
                        $fullname = session()->get('js_name');
                        //  mail_send(9, ['#Name#', '#Cat#'], [ucfirst($fullname), 'Jobseeker Education'], session()->get('js_username'));
                         $link=env('APP_URL')."/jobseeker/jobseeker-education";
                        mail_send(24, ['#Name#', '#Link#'], [ucfirst($fullname), $link], session()->get('js_username'));
                        echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                    } catch (\Exception $e) {

                        return $e;
                        echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                    }
                } else {

                    echo json_encode(['code' => 201, 'message' => 'User Not Exist', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }
    public function addJsExp(Request $req)
    {



        if ($req->isMethod('POST') && $req->ajax() && session()->has('js_username') && !empty($req->all())) {


            $com_name = isset($req->com_name) ? htmlspecialchars($req->input('com_name')) : '';
            $desig = isset($req->desig) ? htmlspecialchars($req->input('desig')) : 0;
            $end_date = isset($req->end_date) ? htmlspecialchars($req->input('end_date')) : Null;
            $jdate = isset($req->jdate) ? htmlspecialchars($req->input('jdate')) : Null;
            $js_user_id = session()->get('js_user_id');


            $validate_rules = [
                'com_name' => 'required|string|min:2',
                'desig' => 'integer',
            ];


            $validate = Validator::make($req->only(['com_name', 'desig']), $validate_rules);

            if (!$validate->fails()) {
                $exists = Jobseeker::where('email', session()->get('js_username'))->where('is_delete', 'No')->count();


                if ($exists === 1) {
                    $fields =  [
                        'company_name' => $com_name,
                        'work_desination_id' => $desig,
                        'joining_date' => $jdate,
                        'ending_date' => $end_date,
                        'is_deleted' => 'No'
                    ];
                    $js_id_exist = JobExp::where('js_id', session()->get('js_user_id'))->count();
                    try {

                        if ($js_id_exist != '' && $js_id_exist != 0) {
                            $user_id = JobExp::where('js_id', $js_user_id)->update($fields);
                        } else {
                            $fields = array_merge($fields, ['js_id' => $js_user_id]);
                            $user_id = JobExp::insertGetId($fields);
                        }
                        $fullname = session()->get('js_name');
                        //  mail_send(9, ['#Name#', '#Cat#'], [ucfirst($fullname), 'Jobseeker Experiance'], session()->get('js_username'));
                        $link=env('APP_URL')."/jobseeker/jobseeker-experience";
                        mail_send(25, ['#Name#', '#Link#'], [ucfirst($fullname), $link], session()->get('js_username'));
                        echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                    } catch (\Exception $e) {

                        return $e;
                        echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                    }
                } else {

                    echo json_encode(['code' => 201, 'message' => 'User Not Exist', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }
    public function savedJobs()
    {

        if (session()->has('js_username')) {
            $username = Session::get('js_username');

            $savedJobs = DB::table('jobseeker_viewed_jobs')->select('jobseeker_viewed_jobs.js_id', 'jobseeker_viewed_jobs.job_id', 'jobseeker_viewed_jobs.saved_on', 'jobseeker_viewed_jobs.employer_id', 'job_posting_view.job_title', 'jobseekers.fullname', 'job_posting_view.company_name', 'job_posting_view.location_hiring_name', 'job_posting_view.salary_hide', 'job_posting_view.job_type_name')->leftJoin('job_posting_view', 'jobseeker_viewed_jobs.job_id', '=', 'job_posting_view.id')->join('jobseekers', 'jobseekers.id', '=', 'jobseeker_viewed_jobs.js_id')->where('jobseekers.email', $username)->where('jobseeker_viewed_jobs.is_saved', 'Yes')->orderBy('jobseeker_viewed_jobs.saved_on', 'DESC')->get();
            return view('jobseeker.jobseeker-saved-jobs', compact('savedJobs'));
        }
        return redirect()->back();
    }

    public function appliedJobs()
    {
        if (session()->has('js_username')) {
            $username = Session::get('js_username');
            $appliedJobs = DB::table('job_application_history')
            ->select('job_application_history.js_id', 'job_application_history.job_id', 'job_posting_view.job_title', 'jobseekers.fullname', 'job_application_history.is_shortlisted', 'job_posting_view.company_name', 'job_posting_view.location_hiring_name', 'job_posting_view.salary_hide', 'job_application_history.applied_on', 'job_posting_view.job_type_name')
            ->leftJoin('job_posting_view', 'job_application_history.job_id', '=', 'job_posting_view.id')
            ->join('jobseekers', 'jobseekers.id', '=', 'job_application_history.js_id')
            ->where('jobseekers.email', $username)
            ->whereNotNull('job_application_history.applied_on')
            ->orderBy('job_application_history.applied_on', 'DESC')
            ->get();
        }
        return view('jobseeker.jobseeker-applied-jobs', compact('appliedJobs'));
    }

    public function jsPaymentsData()
    {
        if (session()->has('js_username')) {
            $user_id = session()->get('js_user_id');
            $data = DB::table('jobseeker_payments')->select('jobseeker_payments.*', 'jobseeker_plan.plan_name')->leftJoin('jobseeker_plan', 'jobseeker_payments.plan_id', '=', 'jobseeker_plan.id')->where('jobseeker_payments.js_id', $user_id)->orderBy('jobseeker_payments.created_at', 'DESC')->get();

            return view('jobseeker.jobseeker-transactions', compact('data'));
        }
    }
    public function downloadInvoice($id)
    {

        $id = base64_decode($id);
       
        if (session()->has('js_username')) {
            $InvoiceData = DB::table('jobseeker_payments')->where('id', $id)->first();
            $plan_id = $InvoiceData->plan_id;
            $select = ['*'];
            $planData = $this->planData->planDetails($plan_id, $select);
            $data = DB::table('jobseeker_view')->where('js_id', $InvoiceData->js_id)->first();
        } else {
            
            $InvoiceData = DB::table('employer_payments')->where('id', $id)->first();                
            $plan_id = $InvoiceData->plan_id;           
            $select = ['*'];
            $planData = $this->EmpPlan->planDetails($plan_id, $select);           
            $data = DB::table('employer_view')->where('id', $InvoiceData->emp_id)->first();
           
        }

        if (!$InvoiceData) {
            return response()->json(['error' => 'Invoice not found'], 404);
        }
        return view('invoice', compact('data', 'planData', 'InvoiceData'));
    }
}
