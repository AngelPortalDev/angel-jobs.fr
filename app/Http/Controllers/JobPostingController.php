<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{job_posting as JobPosting};
use Carbon\Carbon;
use Illuminate\Support\Facades\{Session, DB, Validator};

class JobPostingController extends Controller
{
    public $JobPosting;
    public $username;
    public $commonController;
    public $Jobseeker;
    public $js_user_id;
    public $currentDate;
    public $time;
    public $date;
    // public $plan_details;
    public function __construct()
    {
        // $select = ['free_assign_job_posting', 'left_credit_job_posting_plan', 'plan_id', 'plan_start_from', 'plan_expired_on'];
        // $this->plan_details = getData('employers', $select, ['email' => session()->get('emp_username')]);
        $this->JobPosting = new JobPosting;
        $this->username = Session::get('js_username');
        $this->js_user_id = Session::get('js_user_id');
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }

    // Add Post a Jobs
    public function addJobPost(Request $req)
    {
       
        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username') || session()->has('admin_username')) {
           
            $job_lang = array();
            $job_skills = array();
            $select_work_mode = array();
            $job_title = isset($req->job_title) ? htmlspecialchars($req->input('job_title')) : '';
            $job_type = isset($req->job_type) ? htmlspecialchars($req->input('job_type')) : 0;
            $job_indus = isset($req->job_indus) ? htmlspecialchars($req->input('job_indus')) : 0;
            $job_func_area = isset($req->job_func_area) ? htmlspecialchars($req->input('job_func_area')) : 0;
            $job_designation = isset($req->job_designation) ? htmlspecialchars($req->input('job_designation')) : 0;
            $job_expr = isset($req->job_expr) ? htmlspecialchars($req->input('job_expr')) : 0;
            $job_location = isset($req->job_location) ? htmlspecialchars($req->input('job_location')) : 0;
            $job_gender = isset($req->job_gender) ? implode(',', $req->job_gender) : '';
            $job_skills_str = is_array($req->job_skills)  ? implode(',', $req->job_skills) : 0;
            $work_mode = is_array($req->select_work_mode)  ? implode(',', $req->select_work_mode) : 0;
            $job_disc = isset($req->job_disc) ? $req->input('job_disc') : '';
            $job_educ = isset($req->job_educ) ? htmlspecialchars($req->input('job_educ')) : 0;
            $job_con_person = isset($req->job_con_person) ? htmlspecialchars($req->input('job_con_person')) : '';
            $job_con_phone = is_numeric($req->job_con_phone) ? htmlspecialchars($req->input('job_con_phone')) : '';
            $job_con_email = isset($req->job_con_email) ? htmlspecialchars($req->input('job_con_email')) : '';
            $job_lang_str = is_array($req->job_lang) ? implode(',', $req->job_lang) : 0; 

         
            $job_sal_hide = isset($req->job_sal_hide) ? htmlspecialchars($req->input('job_sal_hide')) : 'No';
            $job_con_hide = isset($req->job_con_hide) ? htmlspecialchars($req->input('job_con_hide')) : 'No';
            $vacancy_count = isset($req->vacancy_count) ? htmlspecialchars($req->input('vacancy_count')) : 'No';


            $job_spec = !empty($req->job_spec) ? htmlspecialchars($req->input('job_spec')) : '';
            $job_sal = isset($req->job_sal) ? $req->input('job_sal') : 0;
            $job_id = isset($req->job_id) ? base64_decode($req->input('job_id')) : '';
            
            $approval_status = 'UNAPPROVED';
            $job_highlighted = 'No';
            $admin_posted = 'No';

            if (session()->has('emp_user_id')) {
                
                $emp_id = session('emp_user_id');
                $where = ['email' => session()->get('emp_username')];
                $sendto = array_unique([trim(strtolower($job_con_email))]);
                $sendcc=array_unique([trim(strtolower(session()->get('emp_username')))]);
            } elseif (session()->has('admin_user_id')) {
                $admin_posted = session()->has('admin_username') ? session()->get('admin_username') : 'No';
                $emp_id = isset($req->emp_id) ? base64_decode($req->input('emp_id')) : 0;
                $where = ['id' => $emp_id];
                $sendto = array_unique([ trim(strtolower($job_con_email))]);
                $approval_status = $req->approval_status === "1" ? 'APPROVED' : 'UNAPPROVED';
                $job_highlighted = $req->job_highlighted === "1" ? 'Yes' : 'No';
                $sendcc=array_unique([trim(strtolower(session()->get('admin_username')))]);
            }

            

            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $time = $booking_date . " " . $booking_time;
            $job_end = $currentDate->addDays(30)->format('Y-m-d');
            $exists =   is_exist('employers', ['id' => $emp_id,  'is_deleted' => 'No']);
               
            if ($exists === 1) {

                $creditAvailable = is_JpPlanActive('employers', ['id' => $emp_id]);
              
                if ($creditAvailable === 1) {

                    $validate_rules = [
                        'job_title' => 'required|string|max:225',
                        'job_type' => 'required|numeric|min:1',
                        'job_func_area' => 'required|numeric|min:1',
                        'job_expr' => 'required|numeric|min:1',
                        // 'job_sal' => 'numeric',
                        'job_location' => 'required|numeric|min:1',
                        'job_designation' => 'required|numeric|min:1',
                        'job_gender' => 'array|max:225',
                        'job_skills' => 'required|array|max:225',
                        'job_disc' => 'required|string',
                        'job_educ' => 'required|numeric',
                        'vacancy_count' => 'required|numeric|min:1',
                        'job_con_person' => 'required|string|max:225',
                        'job_con_phone' => 'required|string|max:10|min:8',
                        'job_con_email' => 'required|email|max:225',
                        'job_indus' => 'required|numeric|min:1',
                        'job_lang' => 'required|array|min:1|max:5',
                        'job_con_hide' => 'string|max:225',
                        'select_work_mode' => 'required|array|max:25',
                        // 'job_spec' => 'string|min:225',
                    ];
                   
                    $validate = Validator::make($req->all(), $validate_rules);
                  
                    if (!$validate->fails()) {
                        $select = [
                            'approval_status' => $approval_status,
                            'job_title' => $job_title,
                            'job_description' => $job_disc,
                            'skill_keyword' => $job_skills_str,
                            'work_mode'=> $work_mode,
                            'location_hiring' => $job_location,
                            'job_industry' => $job_indus,
                            'functional_area' => $job_func_area,
                            'job_designation' => $job_designation,
                            'work_experience_from' => $job_expr,
                            'job_salary_to' => $job_sal,
                            'no_of_openings' => $vacancy_count,
                            'job_type' => $job_type,
                            'job_highlighted' => $job_highlighted,
                            'job_education' => $job_educ,
                            'salary_hide' => $job_sal_hide,
                            'posted_by' => $emp_id,
                            'contact_person' => $job_con_person,
                            'contact_email' => $job_con_email,
                            'contact_phone' => $job_con_phone,
                            'hide_contact_details' => $job_con_hide,
                            'specialization' => $job_spec,
                            'gender' => $job_gender,
                            'required_language' => $job_lang_str,
                            'admin_posted' => $admin_posted,
                            'is_deleted' => 'No',
                        ];
                        
                        try {
                               
                            // Mails Defualt Settings
                            if (isset($job_id) && !empty($job_id) && is_numeric($job_id) && !is_array($job_id)) {
                                $exists =   is_exist('job_postings', ['id' => $job_id, 'posted_by' => $emp_id, 'is_deleted' => 'No']);
                                if ($exists === 1) {
                                    if (session()->has('emp_user_id')) {
                                        $approval_status="Updated sucessfull";
                                    }
                                    $jobexpire = is_exist('job_postings', ['id' => $job_id, 'posted_by' => $emp_id, 'is_deleted' => 'No', ['job_expired_on', '>', $this->date]]);
                                    if (isset($jobexpire) && $jobexpire === 0) {
                                        $select_arr = ['free_assign_job_posting', 'left_credit_job_posting_plan', 'plan_id', 'plan_start_from', 'plan_expired_on'];
                                        $plan_detail = getData('employers', $select_arr, $where);
                                        $free_limit = $plan_detail[0]->free_assign_job_posting;
                                        $plan_limit =  $plan_detail[0]->left_credit_job_posting_plan;
                                        $select = array_merge($select, ['start_date' => $time, 'job_expired_on' => $job_end, 'posted_on' => $time]);
                                        $postingID = JobPosting::where('id', $job_id)->update($select);
                                        if (is_numeric($postingID) && $postingID != 0) {
                                            $query = DB::table('employers')->where('id', $emp_id);

                                            if ($free_limit != 0) {
                                                $updated_limit = $free_limit - 1;
                                                $query->update(['free_assign_job_posting' => $updated_limit]);
                                            } else {
                                                $updated_limit = $plan_limit - 1;
                                                $query->update(['left_credit_job_posting_plan' => $updated_limit]);
                                            }
                                        }
                                    } else {
                                        JobPosting::where('id', $job_id)->update($select);
                                    }


                                    // JobPosting::where('id', $job_id)->update($select);
                                    $jobtitle = JobPosting::select('id','job_title')->where('id', $job_id)->first();
                                    
                                    $dyc_id = base64_encode($job_id);
                                    $link =  env('APP_URL') . "/job-details-view/" . $dyc_id;
                                    if($approval_status === 'APPROVED'){
                                        mail_send(31, ['#Name#', '#Link#','#Job_title#','#Cate#'], [ucfirst($job_con_person), $link, $jobtitle->job_title,$approval_status], $sendto,$sendcc);
                                    }else{
                                     mail_send(23, ['#Name#', '#Link#','#Job_title#','#Cate#'], [ucfirst($job_con_person), $link, $jobtitle->job_title,$approval_status], $sendto,$sendcc);
                                    }
                                    echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                                } else {

                                    echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
                                }
                            } else {
                               
                                $select_arr = ['free_assign_job_posting', 'left_credit_job_posting_plan', 'plan_id', 'plan_start_from', 'plan_expired_on'];
                                $plan_detail = getData('employers', $select_arr, $where);
                               
                                $free_limit = $plan_detail[0]->free_assign_job_posting;
                                $plan_limit =  $plan_detail[0]->left_credit_job_posting_plan;
                                $newSelect = array_merge($select, ['start_date' => $time, 'job_expired_on' => $job_end, 'posted_on' => $time]);
                               
                                $postingID =  JobPosting::insertGetId($newSelect);
                              
                                if (is_numeric($postingID) && $postingID != 0) {
                                    $query =   DB::table('employers')->where('id', $emp_id);

                                    if ($free_limit != 0) {
                                        $updated_limit = $free_limit - 1;
                                        $query->update(['free_assign_job_posting' => $updated_limit]);
                                    } else {
                                        $updated_limit = $plan_limit - 1;
                                        $query->update(['left_credit_job_posting_plan' => $updated_limit]);
                                    }
                                }

                                $dyc_id = base64_encode($postingID);
                                
                                $link =  env('APP_URL') . "/job-details-view/" . $dyc_id;
                                mail_send(19, ['#Name#', '#Link#'], [ucfirst($job_con_person), $link], $sendto);
                                echo json_encode(array('code' => 200, 'message' => 'Successfully Posted', 'icon' => 'success'));
                            }
                        } catch (\Exception $e) {
                            echo json_encode([
                                'code' => 500,  // Use 500 for general server error
                                'message' => 'Error: ' . $e->getMessage(),
                                'icon' => 'error'
                            ]);
                            //echo json_encode(['code' => 201, 'message' => 'Unable to Add', "icon" => "error"]);
                        }
                    } else {
                        return $validate->errors();
                        echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
                    }
                } else {
                    echo json_encode(['code' => 202, 'message' => 'Job Posting Limit Expired', "icon" => "error"]);
                }
            } else {
                echo json_encode(['code' => 201, 'message' => 'Employer Not Exists', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
        }
    }

    public function deleteJob(Request $req)
    {

        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username')) {



            $enc_id = isset($req->enc_id) ? base64_decode($req->input('enc_id')) : '';
            $exists = JobPosting::where('id', $enc_id)->count();
            $PostingDetails = getData('job_posting_view', ['fullname', 'email', 'contact_email','Job_title'], ['is_deleted' => 'No', 'id' => $enc_id]);


            $fullname = $PostingDetails[0]->fullname;
            $email = $PostingDetails[0]->email;
            $contact_email = $PostingDetails[0]->contact_email;
            $Job_title=$PostingDetails[0]->Job_title;
            $link='#';

            if ($exists === 1) {
                try {
                    JobPosting::where('id', $enc_id)->update([
                        'is_deleted' => 'Yes',
                    ]);

                    $sendto = array_unique([trim(strtolower($email)), trim(strtolower($contact_email))]);
                    // $draftData = mail_send(23, ['#Name#', '#Link#','#Job_title#','#Cate#'], [ucfirst($fullname), $link, $Job_title,'Deleted'], $sendto);
                    echo json_encode(array('code' => 200, 'message' => 'Successfully Deleted', 'icon' => 'success'));
                } catch (\Exception $e) {
                    echo json_encode(['code' => 201, 'message' => 'Unble to Deleted Details', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        }
    }


    public function inactiveJob(Request $req)
    {

        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username')) {

            $enc_id = isset($req->enc_id) ? base64_decode($req->input('enc_id')) : '';
            $status = !empty($req->status) ? htmlspecialchars($req->input('status')) : 'Inactive';

            $emp_user_id = session()->get('emp_user_id');
            $exists = JobPosting::where('id', $enc_id)->where('posted_by', $emp_user_id)->count();
            $PostingDetails = getData('job_posting_view', ['fullname', 'email', 'contact_email','job_title'], ['is_deleted' => 'No', 'id' => $enc_id]);
           
            $fullname = $PostingDetails[0]->fullname;
            $email = $PostingDetails[0]->email;
            $contact_email = $PostingDetails[0]->contact_email;
           $job_title = $PostingDetails[0]->job_title;
           
            $link='#';
            if ($exists === 1) {
                try {
                    JobPosting::where('id', $enc_id)->update([
                        'status' => $status,
                    ]);
                    $sendto = array_unique([trim(strtolower($email)), trim(strtolower($contact_email))]);
                    //  mail_send(23, ['#Name#', '#Link#','#Job_title#','#Cate#'], [ucfirst($fullname),$link, $job_title, ucfirst($status)], $sendto);
                    echo json_encode(array('code' => 200, 'message' => $status, 'icon' => 'success'));
                } catch (\Exception $e) {
                    echo json_encode(['code' => 201, 'message' => 'Unble to Change Status', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        }
    }
    public function postJobs()
    {

        if (session()->has('emp_username')) {


            $select = ['free_assign_job_posting', 'left_credit_job_posting_plan', 'plan_id', 'plan_start_from', 'plan_expired_on','license_no','pan_no','cv_access_limit','gst_license' ,'owner_id', 'document_verification'];
            $plan_details = getData('employers', $select, ['email' => session()->get('emp_username')]);
            // 1 Free Welcom Plan
         
            return view('employer.emp-post-a-job', compact('plan_details'));
        }
    }
    public function manageJobs()
    {

        if (session()->has('admin_username') || session()->has('emp_username')) {

            $table = 'job_posting_view';
            if (session()->has('admin_username')) {
                $select = [
                    'id', 'job_title', 'status', 'location_hiring_name', 'posted_by', 'approval_status', 'experiance', 'job_salary_to_name'
                ];
                $query = DB::table($table)->select($select);

                $jobData = $this->JobPosting->jobDetails($table, $select);

                return view('admin.job-posting-list', compact('jobData'));
            } elseif (session()->has('emp_username')) {

                $select = ['id', 'job_title', 'job_description', 'no_of_openings', 'work_experience_from', 'work_experience_to', 'salary_hide', 'contact_person', 'contact_email', 'contact_phone', 'hide_contact_details', 'specialization', 'gender', 'posted_on', 'status', 'job_highlighted', 'job_expired_on', 'required_language', 'start_date',  'location_hiring_name', 'job_designation_name', 'functional_name', 'job_industry_name', 'job_type_name', 'key_skill_name', 'required_language_name', 'job_education_name', 'job_salary_to_name', 'posted_by', 'approval_status'];

                $query = DB::table($table)->select($select);
            
                $jobData = $this->JobPosting->jobDetails($table, $select);
                    
                return view('employer.emp-manage-job', compact('jobData'));
                
            }
        }

        return view('not-found');

       
    }

    // public function manageJobs()
    // {
    //     if (session()->has('admin_username') || session()->has('emp_username')) {
    //         $table = 'job_posting_view';
    //         if (session()->has('admin_username')) {
    //             $select = [
    //                 'id', 'job_title', 'status', 'location_hiring_name', 'posted_by', 'approval_status', 'experiance', 'job_salary_to_name'
    //             ];
    //             $query = DB::table($table)->select($select);
    //             // $jobData = $this->JobPosting->jobDetails($table, $select);
    //             $jobData = $query->paginate(10); // Assuming you want 10 items per page
    //             return view('admin.job-posting-list', compact('jobData'));
    //         } elseif (session()->has('emp_username')) {

    //             $select = ['id', 'job_title', 'job_description', 'no_of_openings', 'work_experience_from', 'work_experience_to', 'salary_hide', 'contact_person', 'contact_email', 'contact_phone', 'hide_contact_details', 'specialization', 'gender', 'posted_on', 'status', 'job_highlighted', 'job_expired_on', 'required_language', 'start_date',  'location_hiring_name', 'job_designation_name', 'functional_name', 'job_industry_name', 'job_type_name', 'key_skill_name', 'required_language_name', 'job_education_name', 'job_salary_to_name', 'posted_by', 'approval_status'];
    //             $query = DB::table($table)->select($select)->where('approval_status', 'APPROVED');
    //             // $jobData = $this->JobPosting->jobDetails($table, $select);
    //             $jobData = $query->paginate(10); // Assuming you want 10 items per page
    //             return view('employer.emp-manage-job', compact('jobData'));
                
    //         }
    //     }

    //     return view('not-found');

       
    // }
    public function updateViewJob($id)
    {


        if (isset($id) && !empty($id) && !is_numeric($id) && session()->has('emp_username') || session()->has('admin_username')) {

            $enc_id = base64_decode($id);
            $exists =  is_exist('job_postings', ['id' => $enc_id]);
// ram


            if ($exists === 1) {
                try {
                    $table = 'job_posting_view';

                    
                    $jobData = $this->JobPosting->jobUpdateView($table, ['id' => $enc_id]);
                    if (session()->has('emp_username')) {
                        return view('employer.emp-post-a-job-update', compact('jobData'));
                    } elseif (session()->has('admin_username')) {
                        return view('admin.post-a-job-edit', compact('jobData'));
                    }
                } catch (\Exception $e) {
                    redirect()->back();
                    // echo json_encode(['code' => 201, 'message' => 'Unble to Change Status', "icon" => "error"]);
                }
            } else {
                redirect()->back();
                // echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        }
    }
    public function adminViewJob($id)
    {


        if (isset($id) && !empty($id) && !is_numeric($id) && session()->has('emp_username') || session()->has('admin_username')) {

            $enc_id = base64_decode($id);
            $exists =  is_exist('job_postings', ['id' => $enc_id]);
            if ($exists === 1) {
                try {
                    $table = 'job_posting_view';
                    $jobData = $this->JobPosting->jobUpdateView($table, ['id' => $enc_id]);
                    return view('admin.post-a-job-view', compact('jobData'));
                } catch (\Exception $e) {
                    redirect()->back();
                    // echo json_encode(['code' => 201, 'message' => 'Unble to Change Status', "icon" => "error"]);
                }
            } else {
                redirect()->back();
                // echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        }
    }
    public function adminJobsAction(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $form = is_array($req->form) ? $req->input('form') : [];
            $action = isset($req->action) ? $req->input('action') : '';

            $deleted = 0;

            foreach ($form as $id) {
                $job_id = base64_decode($id['value']);

                $exists = is_exist('job_postings', ['id' => $job_id, 'is_deleted' => 'No']);

                $action_perform = [];
                if ($action === 'delete') {
                    $action_perform = [
                        'is_deleted' => 'Yes',
                    ];
                } elseif ($action === 'approve') {
                    $action_perform = [
                        'approval_status' => 'APPROVED',
                    ];
                } elseif ($action === 'reject') {
                    $action_perform = [
                        'approval_status' => 'UNAPPROVED',
                    ];
                }

                if ($exists > 0 && is_array($action_perform) && !empty($action_perform)) {
                    try {

                        JobPosting::where('id', $job_id)->update($action_perform);
                        $deleted++;
                    } catch (\Throwable $th) {

                        continue;
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully ' . ucfirst($action), 'icon' => 'success', 'action' => $action));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Something Went Wrong', "icon" => "error"]);
            }
        }
    }
    public function jobDetailsView($id,$action = null)
    {
     
     
        if (isset($id) && !empty($id) && !is_numeric($id)) {

            $enc_id = base64_decode($id);         
            $exists = JobPosting::where('id', $enc_id)->count();
           
            if ($exists === 1) {
                try {
                    $table = 'job_posting_view';
                    $extraFields=['website','facebook','instagram','linkedin'];                    
                    $jobData = $this->JobPosting->jobUpdateView($table, ['id' => $enc_id],$extraFields);
                    
                    if (!empty(Session::get('js_user_id'))) {
                       
                        $where = ['js_id' => Session::get('js_user_id'), 'job_id' => $enc_id];
                        $data = ['js_id' => Session::get('js_user_id'), 'job_id' => $enc_id, 'update_on' => $this->time];

                        jobseekerAction('jobseeker_viewed_jobs', $data, $where);
                    }
                    // dd($jobData);
                    return view('job-details', compact('jobData','action'));
                } catch (\Exception $e) {
                    
                    return redirect('top-search-bar')->with('msg', 'Unable to Open');
                    // echo json_encode(['code' => 201, 'message' => 'Unable to Open', "icon" => "error"]);
                }
            } else {

                return redirect()->back()->with('msg', 'Job Not Exist');
                // echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        } else {

            return redirect()->back()->with('msg', 'Something Went Wrong');
            // echo json_encode(['code' => 201, 'message' => 'Something Went Wrong', "icon" => "error"]);
        }
    }
    public function jobAction(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax() && session()->has('js_username')) {
    
            $job_id = isset($req->job_id) ? base64_decode($req->input('job_id')) : '';
            $posted_by = isset($req->posted_by) ? base64_decode($req->input('posted_by')) : '';
            $toggle_name = $req->is_toggle === 'Yes' ? $req->input('is_toggle') : 'No';
            $action = !empty($req->action) ? $req->input('action') : '';
            $table = 'job_postings';
            $where = ['id' => $job_id, 'is_deleted' => 'No', 'status' => 'Live', 'approval_status' => 'APPROVED'];
            $exists = is_exist($table, $where);
            $remark = '';
            
            if ($action === 'apply') {
                $table = 'job_application_history';
                $data = ['job_id' => $job_id, 'js_id' => Session::get('js_user_id'), 'applied_on' => $this->time];
                $where = ['job_id' => $job_id, 'js_id' => Session::get('js_user_id')];
                $remark = 'Applied';
                
            }
            if ($action === 'Saved' or $action === 'Unsaved') {
               
                $table = 'jobseeker_viewed_jobs';
                $data = ['job_id' => $job_id, 'employer_id' => $posted_by, 'js_id' => Session::get('js_user_id'), 'saved_on' => $this->time, 'is_saved' => $toggle_name];
                $where = ['job_id' => $job_id, 'js_id' => Session::get('js_user_id')];
                $remark = $action === 'Saved' ? 'Unsaved' : 'Saved';
                
            }
       
            if ($exists === 1) {
                try {
                    // return $table.''.$data.''.$where;
                   // jobseekerAction($table,$data, $where);
                    //return "fshg";
                    if ($action === 'apply') {
                        $username = Session::get('js_name');
                        $jobdata = getData('job_posting_view', ['id', 'job_title', 'is_deleted', 'status', 'approval_status', 'contact_email', 'contact_person', 'company_name'], ['id' => $job_id, 'is_deleted' => 'No', 'status' => 'Live', 'approval_status' => 'APPROVED']);
                        $result = jobseekerAction($table, $data, $where);
                        if (isset($result) && $result === true) {
                            mail_send(40, ['#Name#', '#Job_title#', '#contact_person#', '#company_name#'], [$username, $jobdata[0]->job_title, $jobdata[0]->contact_person, $jobdata[0]->company_name], $jobdata[0]->contact_email);
                        }
                    } else {
                        jobseekerAction($table, $data, $where);
                    }
                    echo json_encode(array('code' => 200, 'message' => 'Successfully ' . $remark, 'icon' => 'success', 'lable' => $remark, 'newAction' => $remark));
                } catch (\Exception $e) {
                   
                    echo json_encode(['code' => 201, 'message' => 'Unable to ' . $remark, "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'Job Not Exist', "icon" => "error"]);
            }
        }
    }

    public function applied_shortlist(Request $req)
    {
      
        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username')) {

            $js_id = isset($req->js_id) ? base64_decode($req->input('js_id')) : '';
            $job_id = isset($req->job_id) ? base64_decode($req->input('job_id')) : 0;
            $action = isset($req->short_action) ? base64_decode($req->input('short_action')) : '';
            $emp_user_id = session()->get('emp_user_id');
            $msg = '';
            if ($action === 'Yes') {
                $msg = 'Shortlisted';
            } else {
                $msg = 'Removed';
            }

          
            $msg_alert = '';
            if ($job_id != 0) {
                $exists = JobPosting::where(['posted_by' => $emp_user_id, 'id' => $job_id, 'is_deleted' => 'No', 'status' => 'Live'])->where('job_expired_on', '>=', $this->date)->count();
                $data = ['is_shortlisted' => $action];
                $where = ['job_id' => $job_id, 'js_id' => $js_id];
                $msg_alert = 'Job Not Exist';
            } else {
              
                $exists = is_exist('jobseekers', ['is_delete' => 'No', 'id' => $js_id]);
                $data = ['is_shortlisted' => $action, 'js_id' => $js_id, 'job_id' => 0, 'employer_id' => $emp_user_id,'update_at'=> $this->time];
                $where = ['js_id' => $js_id,'job_id' => 0,];
                $msg_alert = 'Jobseeker Not Exist';
            }

            if ($exists != 0) {
                $table = 'job_application_history';
                try {
                    
                    // jobseekerAction($table, $data, $where);
                    // echo json_encode(array('code' => 200, 'message' =>  $msg, 'icon' => 'success', 'msg' => $action));
                    if ($job_id != 0 && $action === 'Yes') {
                       
                        $jsdta = getData('jobseekers',['id', 'fullname', 'email','is_delete' ] ,['is_delete' => 'No', 'id' => $js_id]);
                        $jobdata = getData('job_posting_view', ['id', 'job_title', 'is_deleted', 'status', 'approval_status', 'company_name'], ['id' => $job_id, 'is_deleted' => 'No', 'status' => 'Live', 'approval_status' => 'APPROVED']);
                       
                        $result = jobseekerAction($table, $data, $where);
                        if (isset($result) && $result != 0) {
                            mail_send(41, ['#Name#', '#Job_title#', '#company_name#'], [$jsdta[0]->fullname, $jobdata[0]->job_title, $jobdata[0]->company_name], $jsdta[0]->email);
                        }
                       
                    } else {
                        jobseekerAction($table, $data, $where);
                    }
                    echo json_encode(array('code' => 200, 'message' =>  $msg, 'icon' => 'success', 'msg' => $action));
                } catch (\Exception $e) {
                    
                    echo json_encode(['code' => 201, 'message' => 'Unble to ' . $msg, "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => $msg_alert, "icon" => "error"]);
            }
        }
    }
}