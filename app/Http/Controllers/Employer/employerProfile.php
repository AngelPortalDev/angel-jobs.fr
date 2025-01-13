<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{employer as Employer, job_posting as JobPosting, jobseeker as Jobseeker, employer_payment as EmpPayments};
use Illuminate\Support\Facades\{Session, DB, Validator, View, Storage, Crypt};
use Carbon\Carbon;



class employerProfile extends Controller
{
    public $username;
    public $currentDate;
    public $time;
    public $JobPosting;
    public $Jobseeker;
    public $Employer;
    public $date;
    public function __construct()
    {
        $this->Jobseeker = new Jobseeker;
        $this->Employer = new employer;
        $this->JobPosting = new JobPosting;
        $this->username = session()->get('emp_username');
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }

    public function getDropDownlist($table, $select)
    {

        $data = DB::table($table)->select($select)->where('is_deleted', 'No')->get();
        return $data;
    }



    public function getEmpProfile()
    {
        
        if (session()->has('emp_username')) {

            $employerData = $this->Employer->empProfileDetails();

            
            return view('employer.emp-company-profile', compact('employerData'));
        }
    }



    public function addEmpProfile(Request $req)
    {

        if ($req->isMethod('POST') && $req->ajax() && session()->has('emp_username')) {


            $emp_com_name = isset($req->emp_com_name) ? htmlspecialchars($req->input('emp_com_name')) : '';
            $full_name = isset($req->full_name) ? htmlspecialchars($req->input('full_name')) : '';
            $emp_com_type = is_numeric($req->emp_com_type) ? $req->input('emp_com_type') : 0;
            $emp_com_size = is_numeric($req->emp_com_size) ? $req->input('emp_com_size') : 0;
            $emp_com_indus = is_numeric($req->emp_com_indus) ? $req->input('emp_com_indus') : 0;
            $emp_com_city = is_numeric($req->emp_com_city) ? $req->input('emp_com_city') : 0;
            $about_company = isset($req->about_company) ? htmlspecialchars($req->input('about_company')) : '';
            $emp_com_zip = isset($req->emp_com_zip) ? htmlspecialchars($req->input('emp_com_zip')) : '';
            $emp_com_web = isset($req->emp_com_web) ? htmlspecialchars($req->input('emp_com_web')) : '';
            $emp_com_facebook = isset($req->emp_com_facebook) ? htmlspecialchars($req->input('emp_com_facebook')) : '';
            $emp_com_insta = isset($req->emp_com_insta) ? htmlspecialchars($req->input('emp_com_insta')) : '';
            $emp_com_linkedin = isset($req->emp_com_linkedin) ? htmlspecialchars($req->input('emp_com_linkedin')) : '';
            $emp_com_addrss = isset($req->emp_com_addrss) ? htmlspecialchars($req->input('emp_com_addrss')) : '';
            $license_no = isset($req->license_no) ? htmlspecialchars($req->input('license_no')) : '';
            $pan_no = isset($req->pan_no) ? htmlspecialchars($req->input('pan_no')) : '';
            $emp_id = is_numeric($req->emp_id) ? $req->input('emp_id') : 0;
            $rules = [
                "full_name" => "required|string|min:2",
                "emp_com_name" => "required|string",
                "emp_id" => "required",
            ];

            $validate = Validator::make($req->only(['full_name', 'emp_com_name', 'emp_id']), $rules);


            $exists = Employer::where('email', session()->get('emp_username'))->count();
            if ($exists === 1) {
                if (!$validate->fails()) {
                    try {

                        $user_id = Employer::where('id', $emp_id)->update([
                            'fullname' => $full_name,
                            'company_name' => $emp_com_name,
                            'company_type' => $emp_com_type,
                            'company_size' => $emp_com_size,
                            'industry' => $emp_com_indus,
                            'address' => $emp_com_addrss,
                            'pan_no' => $pan_no,
                            'license_no' => $license_no,
                            'city' => $emp_com_city,
                            'about_company'=> $about_company,
                            'website' => $emp_com_web,
                            'facebook' => $emp_com_facebook,
                            'instagram' => $emp_com_insta,
                            'linkedin' => $emp_com_linkedin,
                            'zip' => $emp_com_zip,
                            'is_deleted' => 'No',
                        ]);
                        if ($user_id > 0) {
                             mail_send(9, ['#Name#', '#Cat#'], [ucfirst(session()->get('emp_name')), 'Employer'], session()->get('emp_username'));
                            echo json_encode(array('code' => 200, 'message' => 'Successfully Updated', 'icon' => 'success'));
                        } else {
                            echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                        }
                    } catch (\Exception $e) {
                        return $e;
                        echo json_encode(['code' => 201, 'message' => 'Unble to Add Details', "icon" => "error"]);
                    }
                } else {
                    echo json_encode(['code' => 201, 'message' => 'Mandatory Field Missing', "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 201, 'message' => 'User Not Exist', "icon" => "error"]);
            }
        } else {

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }

    public function jobApplications($job_id = "")
    {
        
        if (session()->has('emp_username')) {
            $username = Session::get('emp_username');
            $query = DB::table('job_application_history')
            ->select('job_application_history.js_id', 'job_application_history.job_id', 'job_application_history.applied_on', 'job_posting_view.job_title',  'jobseeker_view.profile_img', 'jobseeker_view.fullname', 'jobseeker_view.notice_name', 'job_application_history.is_shortlisted')
            ->leftJoin('job_posting_view', 'job_application_history.job_id', '=', 'job_posting_view.id')
            ->leftJoin('jobseeker_view', 'jobseeker_view.js_id', '=', 'job_application_history.js_id')
            ->where('job_posting_view.email', $username)
            ->whereNotNull('job_application_history.applied_on')
            ->orderBy('job_application_history.applied_on', 'DESC');
           
            if (isset($job_id) && !empty($job_id) && !is_numeric($job_id)) {
                $job_id =  base64_decode($job_id);
                $query->where('job_posting_view.id', $job_id);
            }
            $query1 = DB::table('job_application_history')->where('employer_id',$username)->get();
          
            $appliedData = $query->get();
           
            return view('employer.emp-applied-jobseeker', compact('appliedData'));
        }
    }
    public function shortlisted()
    {

        if (session()->has('emp_username')) {

            $emp_user_id = Session::get('emp_user_id');
            $username = Session::get('emp_username');

            $query = DB::table('job_application_history')
                ->select('job_application_history.js_id', 'job_application_history.job_id', 'jobseeker_view.fullname', 'jobseeker_view.profile_img','jobseeker_view.updated_at', 'jobseeker_view.prefered_location_name','jobseeker_view.experiance_name','jobseeker_view.expected_salary_name','job_application_history.is_shortlisted')
                ->leftJoin('job_posting_view', 'job_application_history.employer_id', '=', 'job_posting_view.id')
                ->join('jobseeker_view', 'jobseeker_view.js_id', '=', 'job_application_history.js_id')
                ->where('job_application_history.employer_id', $emp_user_id)
                ->where('job_application_history.is_shortlisted', 'Yes');
            
            
            $shortlisted = $query->get();
            
          
            // return $shortlisted;
            return view('employer.emp-shortlisted-jobseeker', compact('shortlisted'));
        }
    }
    public function empJobseekerVeiw($js_id)
    {


        if (isset($js_id) && !empty($js_id) && $js_id != '') {
            $js_id = base64_decode($js_id);
            $data = $this->Jobseeker->profileDetails($js_id);
            $jsEdu = $this->Jobseeker->eduDetails($js_id);
            $jsExp = $this->Jobseeker->expDetails($js_id);

            return view('employer.jobseeker-details', compact('data', 'jsEdu', 'jsExp'));
        }
    }
    public function empPaymentsData()
    {
        if (session()->has('emp_username')) {
            $user_id = session()->get('emp_user_id');
            $data = DB::table('employer_payments')->select('employer_payments.*', 'employer_plan.plan_name')->leftJoin('employer_plan', 'employer_payments.plan_id', '=', 'employer_plan.id')->where('employer_payments.emp_id', $user_id)->orderBy('employer_payments.created_at', 'DESC')->get();

            return view('employer.emp-transactions', compact('data'));
        }
    }
    public function empDetailsView($id)
    {

        if (isset($id) && !empty($id) && !is_numeric($id)) {

            $enc_id = base64_decode($id);


            $exists = Employer::where('id', $enc_id)->count();
            if ($exists === 1) {
                try {
                    $select = ['id', 'company_name', 'profile_img', 'website', 'facebook', 'instagram', 'linkedin', 'industry_name', 'company_type_name', 'company_size_name', 'license_no', 'pan_no', 'city_name', 'country_name', 'address', 'zip','about_company'];
                    $empData = DB::table('employer_view')->select($select)->where(['id' => $enc_id, 'is_deleted' => 'No'])->get();
                    $table = 'job_posting_view';

                    $jobData = $this->JobPosting->jobUpdateView($table, ['posted_by' => $empData[0]->id, 'approval_status' => 'APPROVED','status' => 'Live']);

                    return view('company-details', compact('empData', 'jobData'));
                } catch (\Exception $e) {
                    return $e;
                    return redirect('not-found')->with('msg', 'Compant Details Not Found');
                }
            } else {

                return redirect('not-found')->with('msg', 'Compant Details Not Found');
            }
        } else {

            return redirect('not-found')->with('msg', 'Something Went Wrong');
        }
    }

    public function getJobseekers(Request $req)
    {
        $curr_date = $this->date;
        $data = [];

        if (
            isset($req->left_jtype_fil) ||
            isset($req->left_edu_fil) || isset($req->notice_type_fil) || isset($req->left_exp_fil) || isset($req->left_sal_fil)
            || isset($req->date_sort) || isset($req->left_loc_fil)
        ) {
            $filter['start_date'] =  $this->currentDate->format('Y-m-d');
            $filter['job_type_fil'] = isset($req->left_jtype_fil) ? $req->input('left_jtype_fil') : 0;
            $filter['edu_fil'] = isset($req->left_edu_fil) ? $req->input('left_edu_fil') : 0;
            $filter['notice_fil'] = isset($req->notice_type_fil) ? $req->input('notice_type_fil') : 0;
            $filter['loc_fil'] = isset($req->left_loc_fil) ? $req->input('left_loc_fil') : '';
            $filter['exp_fil'] = isset($req->left_exp_fil) ? $req->input('left_exp_fil') : 0;
            $filter['sal_fil'] = isset($req->left_sal_fil) ? $req->input('left_sal_fil') : 0;
            $filter['date_sort'] = isset($req->date_sort) ? Carbon::now()->subDays($req->date_sort)->format('Y-m-d') : $filter['start_date'];

            $query = $this->Jobseeker->searchJobseeker($curr_date, '', $filter);
        } else {
            $query = $this->Jobseeker->searchJobseeker($curr_date, $req, '');
        }

        // $data['perPage'] = 2; // Number of items per page
        // $data['page'] = !empty(request()->get('page')) ? request()->get('page') : 1;
        // $data['offset'] = ($data['page'] - 1) * $data['perPage'];
        //  $data['total_count'] = $query->count();       
        // // if (!empty($req->page_no) && is_numeric($req->page_no) && isset($req->page_no)) {
        // //     $page = 10 * $req->page_no;
        // //     // $data['paginate'] = $query->skip($page)->take(10);
        // //     $data['paginate'] = $query->paginate(1000);
        // // } else {
        // //     $data['paginate'] = $query->paginate(1000);
        // // }
        $perPage = 5;
        $data['total_count'] = $query->count();
        $data['paginate'] = $query->paginate($perPage);
        $data['list'] = $data['paginate']->items();
        $data['page'] = $data['paginate']->currentPage();
        $data['last_page'] = $data['paginate']->lastPage();

        // return $data['list'];

        $data['count'] = $data['total_count'] ?? 0;
        // $data['page'] =  ceil($data['count'] / 10);
        $data['html'] = '';
        $saved = '';

        if (count($data['list']) > 0) {
            $select = ['id', 'email_verified'];
            $where = ['id' => session('emp_user_id')];
            $table = 'employers';
            $emailVerfiy = getData($table, $select, $where);
            foreach ($data['list'] as $lists) {

                $where = ['js_id' => $lists->js_id, 'employer_id' => session('emp_user_id'), 'is_shortlisted' => 'Yes'];
                $id = base64_encode($lists->js_id);


                // if (session()->has('js_username')) {
                $saved = '';
                $action = '';
                if($emailVerfiy[0]->email_verified === 'Yes'){
                if (is_exist('job_application_history', $where) != 0) {
                    $action = base64_encode('No');
                    $saved =  "<label class='like-btn shortlist' data-is_toggle='No' data-short_action=" . $action . "
                                        data-js_id='$id' data-job_id='' title='Not Shortlist' data-bs-toggle='tooltip' data-placement='right'>
                                        <i class='fa fa-bookmark' style='color: #11a1f5;'></i>
                                    </label>";
                } else {
                    $action = base64_encode('Yes');
                    $saved = "<label class='like-btn shortlist' data-is_toggle='Yes'
                                        data-short_action=" . $action . " data-js_id='$id' data-job_id='' title='Shortlist' data-bs-toggle='tooltip' data-placement='right'>
                                        <i class='far fa-bookmark' style='color: #11a1f5;'></i>
                                        </label> 
                                        ";
                }
            }else{
                $saved = "<label class='like-btn not_verify' data-username=". session('emp_user_id') ."><input type='checkbox'>
                <i class='far fa-bookmark' aria-hidden='true'></i>
            </label>";
                }
                // } else {

                //     $saved = "<label class='like-btn jslogincheck'><input type='checkbox'>
                //                   <i class='far fa-bookmark' aria-hidden='true'></i>
                //                 </label>";
                // }


                // $img = "<img alt='' src='" . Storage::url('images/user_profile.png') . "'>";
                if (!empty($lists->profile_img) && $lists->profile_img !== '') {
                    
                    $imagePath = Storage::path("storage/jobseeker/profile_image/{$lists->profile_img}");
                  
                    if (file_exists($imagePath)) {
                        // If the image exists, display it
                        $img = "<img alt='' src='" . Storage::url("jobseeker/profile_image/{$lists->profile_img}") . "'>";
                    } else {
                        // If the image doesn't exist, show default image
                        $img = "<img alt='' src='" . asset('images/user_profile.png') . "'>";
                    }
                } else {
                    // If no image is available or it is 'Null', show default image
                    $img = "<img alt='' src='" . asset('images/user_profile.png') . "'>";
                }
                
                
                // $sal = '';
                // if (!empty($lists->salary_hide === 'No')) {
                //     $sal = "<div class='salary-bx'><span>" . $lists->job_salary_to_name . "</span></div>";
                // }

                $duration = duration($lists->updated_at);

                $data['html'] .= "<li>
									<div class='post-bx'>
										<div class='d-flex mb-4'>
											<div class='job-post-company'>
												<a href='javascript:void(0);'><span>
													" . $img . "
												</span></a>
											</div>
											<div class='job-post-info'>
												<h4>
                    <a href='" . route('emp-js-view', $id) . "' class='js-name'>" . $lists->fullname . "</a>";

                                    if (!empty($lists->status) && $lists->status == 3) {
                                        $data['html'] .= "<img src='" . asset('images/premium_badge_new.svg') . "' alt='Premium Member' class='premium-badge' style='width:25px; height:25px; margin-left: 5px;'>";
                                    }
                                    $data['html'] .= "</h4>
												<p class='m-b5 font-13'>
													<a href='javascript:void(0);' class='text-primary text-decoration-none' style='cursor: auto;'>" . $lists->role_name . " </a>
													
												</p>
												<ul>
													<li><i class='fas fa-map-marker-alt'></i> " . (!empty($lists->prefered_location_name) ? $lists->prefered_location_name : 'Not Disclosed') . "</li>
													<li><i class='fa-solid fa-business-time'></i> " . (!empty($lists->experiance_name) ? $lists->experiance_name : 'Not Disclosed')  . "</li>
													<li><i class='fas fa-euro-sign'></i> " .(!empty($lists->expected_salary_name) ? $lists->expected_salary_name : 'Not Disclosed')  . "</li>
													 <li><i class='far fa-clock'></i> Active " .  $duration . " ago</li> 
												</ul>
											</div>
										</div>
										<div class='d-flex'>
											<div class='job-time me-auto'>
												<a href='javascript:void(0);'><span>" . $lists->pref_job_type_name . "</span></a>
												<a href='javascript:void(0);'><span>" . $lists->notice_name . "</span></a>
											</div>

										</div>
										" . $saved . "
									</div>
								</li>";
            }
        } else {
            $data['html'] .= "<li>
			<div class='post-bx'>
				<div class='d-flex m-b30'>
					<div class='job-post-info'>
						<ul>
							<li><h4>No Jobseeker Found</h4></li>
						</ul>
					</div>
				</div>
			</div>
		</li>";
        }

        if ($req->ajax()) {
            return $data;
            //return response()->json($data); 

        } else {
            // dd('No ajax');
            return view('employer/browse-jobseeker', $data);
        }
    }
    
    public function sendmail(Request $req){
        if (session()->has('emp_username')) {
            $id=session()->get('emp_user_id');       
            
            $templateData=getData('email_templates',['id','template_name'],['is_deleted' => 'No', 'added_by' => $id,'status' =>'APPROVED']);
           
            $query = DB::table('job_application_history')
            ->select('jobseeker_view.fullname', 'jobseeker_view.email','jobseeker_view.js_id') 
            ->leftJoin('job_posting_view', 'job_application_history.job_id', '=', 'job_posting_view.id')
            ->leftJoin('jobseeker_view', 'jobseeker_view.js_id', '=', 'job_application_history.js_id')
            ->where(function($query) {
                $query->whereNotNull('job_application_history.applied_on') 
                      ->orWhere('job_application_history.is_shortlisted', 'Yes'); 
            })
            ->where('job_application_history.employer_id', $id) 
            ->orderBy('job_application_history.applied_on', 'DESC')
            ->get();  
                   
           return view('employer.send-bulk-mail',compact('templateData','query'));
        }
    }

    public function bulkmail(Request $req){
        
      
        if ($req->isMethod('POST') && session()->has('emp_username')) {
                    
            $selected_emails = is_array($req->select_user) ? implode(',', $req->select_user) : '';
            $emails_subject = isset($req->email_subject) ? htmlspecialchars($req->input('email_subject')) : '';
            $email_content = isset($req->email_content) ? htmlspecialchars_decode($req->input('email_content')) : '';
            $ids = explode(',', $selected_emails);
           
            $employer_data = getEmails('jobseeker_view', ['js_id', 'fullname', 'email'], ['js_id', 'IN', $ids]);
           
            if (isset($employer_data) && !empty($employer_data)) {
                foreach ($employer_data as $employer) {
                   
                    $personalized_content = str_replace('#Name#', $employer->fullname, $email_content);
        
                    SendEmailJob::dispatch($emails_subject, $personalized_content, $employer->fullname, $employer->email);
                }
        
                return response()->json(['code' => 200, 'message' => 'Emails are being sent.']);
            } else {
                return response()->json(['code' => 203, 'message' => 'Employer data not found.']);
            }

        } else {
            echo json_encode([
                'code' => 203, 'message' => 'Something Went Wrong',
            ]);
        }

    }


}
