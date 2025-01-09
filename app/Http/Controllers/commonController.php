<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{job_posting_view as Jobs,employer_plan as EmpPlan,jobseeker_plan as JsPlan, employer as Employer, employer_payment as EmpPayments, jobseeker_profile as JobseekerProf, jobseeker_payment as JsPayement};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Session, Http, DB, Validator, Storage, Log};
use Carbon\Carbon;
use Razorpay\Api\Api;

use Exception;
use Illuminate\Pagination\Paginator;


class commonController extends Controller
{
    public $JobView;
    public $currentDate;
    public $time;
    public $date;
    public $EmpPlan;
    public $JsPlan;
    
    public function __construct()
    {
        $this->JobView = new Jobs;
        $this->EmpPlan = new EmpPlan;
        $this->JsPlan = new JsPlan;
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }
    public function getDropDownlist($table, $select)
    {
        $data = DB::table($table)->select($select)->where('is_deleted', 'No')->get();
        return $data;
    }
    public function profilImageUpload(Request $req)
    {
        if (
            $req->isMethod('POST') && $req->ajax() && session()->has('emp_username') ||
            session()->has('js_username')
        ) {

            if (session()->has('emp_username')) {
                $id = Session::has('emp_user_id') ? Session::get('emp_user_id') : 0;
                $where = ['id' => $id];
                $folder = 'storage/employer/profile_image/';
                $table = 'employers';
                $cat = 'Employer';
            } elseif (session()->has('js_username')) {
                $id = Session::has('js_user_id') ? Session::get('js_user_id') : 0;
                $table = 'jobseekers';
                $where = ['id' => $id];
                $folder = 'storage/jobseeker/profile_image/';
                $cat = 'Jobseeker';
            }



            $com_logo = $req->hasFile('com_logo') ? $req->file('com_logo') : '';
            $old_img_name = !empty($req->input('old_img_name')) ? $req->input('old_img_name') : '';
            $logo_name = $req->hasFile('com_logo') ? $id . "_" . time() . "." . $com_logo->getClientOriginalExtension() :  $old_img_name;
            if ($req->hasFile('com_logo')) {
                $rules = [
                    'com_logo' => 'required|mimes:jpeg,png,jpg,svg|max:3072',
                ];

                $validate = Validator::make($req->only(['com_logo']), $rules);
                if (!$validate->fails()) {


                    $logo_uploaded = file_upload($com_logo, $folder, $logo_name, $req->input('old_img_name'));



                    if ($logo_uploaded === TRUE && !empty($id) && is_numeric($id)) {
                        try {

                            DB::table($table)->where($where)->update(['profile_img' => $logo_name]);
                            // mail_send(9, ['#Name#', '#Cat#'], ['', $cat], session()->get('emp_username'));
                            echo json_encode(['code' => 200, 'message' => 'Successfully Uploaded', 'text' => "", "icon" => "error", 'new' => $logo_name]);
                        } catch (\Exception $e) {
                            echo json_encode(['code' => 201, 'message' => 'Unable to Upload1', 'text' => "Try Again", "icon" => "error", 'old' => $old_img_name]);
                        }
                    } else {
                        echo json_encode(['code' => 202, 'message' => 'Unable to Upload2', 'text' => "Try Again", "icon" => "error", 'old' => $old_img_name]);
                    }
                } else {

                    echo json_encode(['code' => 203, 'message' => 'Invalid File', 'text' => "File Should be JPG, PNG & Less then 3MB", "icon" => "error", 'old' => $old_img_name]);
                }
            } else {

                echo json_encode(['code' => 204, 'message' => 'No Image', 'text' => "", "icon" => "error", 'old' => $old_img_name]);
            }
        } else {

            echo json_encode(['code' => 205, 'message' => 'Someting Went Wronge', 'text' => "", "icon" => "error"]);
        }
    }
    // public function searchJobs(Request $req)
    // {
    //     $curr_date = $this->date;
    //     $data = [];
    //     if (
    //         isset($req->left_jtype_fil) ||
    //         isset($req->left_edu_fil) || isset($req->left_indus_fil) || isset($req->left_exp_fil) || isset($req->left_sal_fil)
    //         || isset($req->date_sort) || isset($req->left_loc_fil)
    //     ) {
    //         $filter['start_date'] =  $this->currentDate->format('Y-m-d');
    //         $filter['job_type_fil'] = isset($req->left_jtype_fil) ? $req->input('left_jtype_fil') : 0;
    //         $filter['edu_fil'] = isset($req->left_edu_fil) ? $req->input('left_edu_fil') : 0;
    //         $filter['indus_fil'] = isset($req->left_indus_fil) ? $req->input('left_indus_fil') : 0;
    //         $filter['loc_fil'] = isset($req->left_loc_fil) ? $req->input('left_loc_fil') : '';
    //         $filter['exp_fil'] = isset($req->left_exp_fil) ? $req->input('left_exp_fil') : 0;
    //         $filter['sal_fil'] = isset($req->left_sal_fil) ? $req->input('left_sal_fil') : 0;
    //         $filter['date_sort'] = isset($req->date_sort) ? Carbon::now()->subDays($req->date_sort)->format('Y-m-d') : $filter['start_date'];

    //         $query = $this->JobView->topSearchJobs($curr_date, '', $filter);
    //     } else {
    //         $query = $this->JobView->topSearchJobs($curr_date, $req, '');
    //     }

    //     $data['perPage'] = 5; // Number of items per page
    //     $data['page'] = request()->get('page') ?: 1;

    //     $data['offset'] = ($data['page'] - 1) * $data['perPage'];

    //     $data['total_count'] = $query->count();
    //     // if (!empty($req->page_no) && is_numeric($req->page_no) && isset($req->page_no)) {
    //     //     $page = 10 * $req->page_no;
    //     //     // $data['paginate'] = $query->skip($page)->take(10);
    //     //     $data['paginate'] = $query->paginate(1000);
    //     // } else {
    //     //     $data['paginate'] = $query->paginate(1000);
    //     // }
    //     $data['list'] = $query->skip($data['offset'])->take($data['perPage'])->get();
    //      // echo "<pre>";
    //     // print_r($data['list']);
    //     // die;

    //       $data['count'] = $data['total_count'] ?? 0;
    //     // $data['page'] =  ceil($data['count'] / 10);
    //     $data['html'] = '';
    //     $saved = '';

    //     if (count($data['list']) > 0) {
    //         foreach ($data['list'] as $lists) {

    //             $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id'), 'is_saved' => 'Yes'];
    //             $id = base64_encode($lists->id);
    //             $posted_by = base64_encode($lists->posted_by);
    //             if (session()->has('js_username')) {

    //                 if (is_exist('jobseeker_viewed_jobs', $where) != 0) {
    //                     $saved =  "<label class='like-btn action' data-is_toggle='No' data-posted_by='$posted_by' data-job_action='Saved'
    //                                     data-job_id='$id'>
    //                                     <i class='fa fa-bookmark' style='color: #11a1f5;'></i>
    //                                 </label>";
    //                 } else {
    //                     $saved = "<label class='like-btn action' data-is_toggle='Yes' data-posted_by='$posted_by'
    //                                     data-job_action='Unsaved' data-job_id='$id)'>
    //                                     <i class='far fa-bookmark' style='color: #11a1f5;'></i>
    //                                     </label> 
    //                                     ";
    //                 }
    //             } else {

    //                 $saved = "<label class='like-btn jslogincheck'><input type='checkbox'>
    //                               <i class='far fa-bookmark' aria-hidden='true'></i>
    //                             </label>";
    //             }


    //             $img = "<img alt='' src='" . Storage::url('storage/no-image.png') . "'>";
    //             if (!empty($lists->profile_img)) {
    //                 $img = "<img alt='' src='" . Storage::url("employer/profile_image/$lists->profile_img") . "'>";
    //             } else {
    //                 $img = "<img alt='' src='" . Storage::url('jobseeker/no-image.jpg') . "'>";
    //             }
    //             $sal = '';
    //             if (!empty($lists->salary_hide === 'No')) {
    //                 $sal = "<div class='salary-bx'><span>" . $lists->job_salary_to_name . "</span></div>";
    //             }
    //             $duration = duration($lists->posted_on);

    //             $data['html'] .= "<li>
    // 		<div class='post-bx'>
    // 			<div class='d-flex m-b30'>
    // 	<div class='job-post-company'><a ><span>
    // 	" . $img .
    //                 "

    // 	</span></a>
    // 				</div>
    // 				<div class='job-post-info'>
    // 					<h4><a href='" . url('job-details-view', $id) . "' target='_blank'>" . htmlspecialchars_decode($lists->job_title) . "</a></h4>
    //                     <div class='company-name-url'>
    //                         <span>" . htmlspecialchars_decode($lists->company_name) . "</span>
    //                     </div>

    // 					<ul>

    // 						<li><i class='fa-solid fa-briefcase'></i>" . $lists->experiance . " </li>
    // 						<li><i class='fas fa-map-marker-alt'></i>" . $lists->location_hiring_name . "</li>
    // 						<!-- <li><i class='far fa-bookmark'></i>" . $lists->job_type_name . " </li> -->
    // 						<li><i class='far fa-clock'></i> Published " . $duration . " ago</li>
    // 					</ul>
    // 				</div>
    // 			</div>
    // 			<div class='d-flex'>
    // 				<div class='job-time me-auto'><a><span>" . $lists->job_type_name . "</span></a></div>
    // 				<div class='salary-bx'><span>" . $sal . "</span></div>
    // 			</div>
    //             " . $saved . "
    // 		</div>
    // 	</li>";
    //         }
    //     } else {
    //         $data['html'] .= "<li>
    // 		<div class='post-bx'>
    // 			<div class='d-flex m-b30'>
    // 				<div class='job-post-info'>
    // 					<ul>
    // 						<li><h4>No Jobs Found</h4></li>
    // 					</ul>
    // 				</div>
    // 			</div>
    // 		</div>
    // 	</li>";
    //     }

    //     if ($req->ajax()) {
    //         return $data;
    //     } else {
    //         return view('browse-all-jobs', $data);
    //     }
    // }
    public function searchJobs(Request $req)
    {
        $curr_date = $this->date;
        $data = [];
        
        
        if (
            isset($req->left_jtype_fil) ||
            isset($req->left_edu_fil) || isset($req->left_indus_fil) || isset($req->left_exp_fil) || isset($req->left_sal_fil)
            || isset($req->date_sort) || isset($req->left_loc_fil) || isset($req->left_desig_fil)
        ) {
            $filter['start_date'] =  $this->currentDate->format('Y-m-d');
            $filter['job_type_fil'] = isset($req->left_jtype_fil) ? $req->input('left_jtype_fil') : 0;
            $filter['edu_fil'] = isset($req->left_edu_fil) ? $req->input('left_edu_fil') : 0;
            $filter['indus_fil'] = isset($req->left_indus_fil) ? $req->input('left_indus_fil') : 0;
            $filter['loc_fil'] = isset($req->left_loc_fil) ? $req->input('left_loc_fil') : 0;
            $filter['exp_fil'] = isset($req->left_exp_fil) ? $req->input('left_exp_fil') : 0;
            $filter['sal_fil'] = isset($req->left_sal_fil) ? $req->input('left_sal_fil') : 0;
            $filter['desig_fil'] = isset($req->left_desig_fil) ? $req->input('left_desig_fil') : 0;
            $filter['date_sort'] = isset($req->date_sort) ? Carbon::now()->subDays($req->date_sort)->format('Y-m-d') : $filter['start_date'];

            $query = $this->JobView->topSearchJobs($curr_date, '', $filter);
        } else {
            //cotrol + hover on topsearchjobs get view code and table code select query you can print that page 
            $query = $this->JobView->topSearchJobs($curr_date, $req, '');
        }
        $perPage = 5;
        $data['total_count'] = $query->count();
    $data['paginate'] = $query->paginate($perPage);
    $data['list'] = $data['paginate']->items();
    $data['page'] = $data['paginate']->currentPage();
    $data['last_page'] = $data['paginate']->lastPage();

    $data['count'] = $data['total_count'] ?? 0;
    $data['html'] = '';
       
        $saved = '';
       
        if (count($data['list']) > 0) {

            $select = ['id', 'email_verified'];
            $where = ['id' => session('js_user_id')];
            $table = 'jobseekers';
            $emailVerfiy = getData($table, $select, $where);

            foreach ($data['list'] as $lists) {
                $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id'), 'is_saved' => 'Yes'];
                $id = base64_encode($lists->id);
                $posted_by = base64_encode($lists->posted_by);
                if (session()->has('js_username')) {
            

                    if (is_exist('jobseeker_viewed_jobs', $where) != 0) {

                        
                        $saved =  "<label class='like-btn action' data-is_toggle='No' data-posted_by='$posted_by' data-job_action='Saved' data-job_id='$id' title='Unsave this job' data-bs-toggle='Unsave this job' data-placement='right'>
                                        <i class='fa fa-bookmark' style='color: #11a1f5;'></i>
                                    </label>";
                    } else {
                        $saved = "<label class='like-btn action' data-is_toggle='Yes' data-posted_by='$posted_by' data-job_action='Unsaved' data-job_id='$id' title='Save this job' data-bs-toggle='Save this job' data-placement='right'>
                                        <i class='far fa-bookmark' style='color: #11a1f5;'></i>
                                    </label>";
                    }

               
                } else {
                    $saved = "<label class='like-btn jslogincheck'><input type='checkbox'>
                                    <i class='far fa-bookmark' aria-hidden='true'></i>
                                </label>";
                }

                $img = "<img alt='' src='" . Storage::url('employer/profile_image/employer.png') . "'>";
                if (!empty($lists->profile_img)) {
                    $img = "<img alt='' src='" . Storage::url("employer/profile_image/$lists->profile_img") . "'>";
                }

                $sal = '';
                if ($lists->salary_hide === 'No' && isset($lists->job_salary_to_name)) {
                    $sal =  "<li><i class='fas fa-euro-sign'></i>".$lists->job_salary_to_name."</li>";
                }

                $duration = duration($lists->posted_on);
                $emp_id = base64_encode($lists->posted_by);
                $workmode=explode(',',$lists->work_mode);
                $workModeText = '';
                foreach ($workmode as $index => $mode) {
                    switch ($mode) {
                        case '1':
                            $workModeText .= 'Remote ';  
                            break;
                        case '2':
                            $workModeText .= 'WFO ';    
                            break;
                        case '3':
                            $workModeText .= 'Hybrid '; 
                            break;
                        default:
                            $workModeText .= ''; 
                    }
                    if ($index < count($workmode) - 1) {
                        $workModeText .= ', ';
                    }
                } 
               
                $workModetext = trim($workModeText);
               if(!empty($workModetext)){
                $workModetext= '('.$workModetext.')';
               }else{
                $workModetext='';
               }
                $data['html'] .= "<li>
                    <div class='post-bx'>
                        <div class='d-flex m-b30'>
                            <div class='job-post-company'><a ><span>{$img}</span></a></div>
                            <div class='job-post-info'>
                                <h4><a href='" . url('job-details-view', $id) . "' target='_blank'>" . htmlspecialchars_decode($lists->job_title) . "</a> ". $workModetext ."</h4>
                                <div class='company-name-url'>

                                    <a href='" . url('emp-details-view', $emp_id) . "' target='_blank'>" . htmlspecialchars_decode($lists->company_name) . "</a>
                                </div>
                                <ul>
                                    <li><i class='fa-solid fa-briefcase'></i>" . $lists->experiance . " </li>
                                    {$sal}
                                   <li>
                                        <i class='fas fa-map-marker-alt mt-2'></i> 
                                        " . (empty($lists->location_hiring_name) ? 'Not Disclosed' : htmlspecialchars($lists->location_hiring_name)) . "
                                    </li>
                                     <li>
                                        <i class='fas fa-tasks'></i><span>" . $lists->job_type_name . "</span>
                                    </li>
                                    <br/>
                                    <li><i class='far fa-clock mt-2'></i> Published " . $duration . " ago</li>
                                </ul>
                            </div>
                        </div>
                        <div class='d-flex justify-content-between'>
                            <div class='job-time'>
                            <a style='d-none'></a>  ";

                // Skills
                $skill = explode(',', $lists->skill_keyword);
                $skills = multiSelectDropdown('key_skills', ['id', 'key_skill_name'], $skill);
                $totalSkills = count($skills);
                $maxSkillsToShow = 3;
                $emppf=is_exist('jobseeker_view', ['js_id' => session('js_user_id')]);
                // foreach ($skills as $key_skill) {
                //     if (isset($key_skill[0]->key_skill_name)) {
                //         $data['html'] .= "<span style='margin-right: 7px;'>{$key_skill[0]->key_skill_name}</span>";
                //     }
                // }

                $data['html'] .= "<div class='skills-list'>";
                foreach ($skills as $index => $key_skill) {
                    if (isset($key_skill[0]->key_skill_name)) {
                        if ($index < $maxSkillsToShow) {
                            // If the index is less than maxSkillsToShow, show the skill normally
                            $data['html'] .= "<span style='margin-right:7px;'>" . e($key_skill[0]->key_skill_name) . "</span>";
                        } else {
                            // Otherwise, hide the skill with the 'more-skill' class
                            $data['html'] .= "<span class='more-skill' style='display: none;'>" . e($key_skill[0]->key_skill_name) . "</span>";
                        }
                    }
                }

                // Add "See More" button if total skills exceed maxSkillsToShow
                if ($totalSkills > $maxSkillsToShow) {
                    $data['html'] .= "<span class='show-more-btn'>
                                        <a href='" . url('job-details-view', $id) . "'>See More...</a>
                                    </span>";
                }

                $data['html'] .= "</div>";
                $data['html'] .= "</div>";
                if (session()->has('js_username')) {
                    $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id')];
                    if (is_exist('job_application_history', $where) > 0) {
                        $data['html'] .= "<a class='btn btn-primary' style='height:fit-content'>
                     Applied
                </a>
                </div>";
                    } elseif ($emailVerfiy[0]->email_verified === 'No') {
                        $data['html'] .= "<a  class='btn btn-primary not_verify' style='height: fit-content;'>
                    Apply Now
               </a>
               </div>";
                    } elseif($emppf == 0) {
                        $data['html'] .= "<a  class='btn btn-primary not_updateprofile' style='height: fit-content;'>
                    Apply Now
               </a>
               </div>";
                    }else{
                       $data['html'].="<button type='button' data-job_action='apply'
                       data-job_id='". base64_encode($lists->id) ."' class='site-button action'
                       style='white-space:nowrap'>Apply Now</button>"; 
                    }
                } else {
                    $data['html'] .= "<a href='" . url('login-jobseeker') . "' target='_blank' class='btn btn-primary'style='height: fit-content;'>
                Apply Now
           </a>
           </div>";
                }
                $data['html'] .= "{$saved}
                    </div>
                </li>";
            }
        } else {

            $data['html'] .= "<li>
			<div class='post-bx'>
				<div class='d-flex m-b30'>
					<div class='job-post-info'>
						<ul>
							<li><h4>No Jobs Found</h4></li>
						</ul>
					</div>
				</div>
			</div>
		</li>";
        }

        if ($req->ajax()) {

            return $data;
        } else {

            return view('browse-all-jobs', $data);
        }
    }


    public function buy_plan($plan, $amount)
    {
        if (isset($plan) && !empty($plan) && isset($amount) && !empty($plan) && session()->has('emp_username') || session()->has('js_username')) {


            if (session()->has('js_username')) {
                $username = session()->get('js_username');
                $table = 'jobseeker_view';
                $select = ['js_id', 'fullname', 'dob'];
                $where = ['email' => $username, 'is_delete' => 'No'];
            } elseif (session()->has('emp_username')) {
                $username = session()->get('emp_username');
                $table = 'employer_view';
                $select = ['id', 'fullname'];
                $where = ['email' => $username, 'is_deleted' => 'No'];
            } else {

                return redirect()->back()->with('msg', 'Someting Went Wrong');
            }

            $userData = getData($table, $select, $where);
            
            $id = !empty($userData[0]->id) ? base64_encode($userData[0]->id) : base64_encode($userData[0]->js_id);
            $fullname = $userData[0]->fullname;
            $dob = isset($userData[0]->dob) ? $userData[0]->dob : 'NA';
            $order_id = $this->currentDate->format('YmdHis');
            try {
                $payex = $amount * 100;
                $data = [
                    "provider" => "ajf",
                    "payment_destination" => env('PAYMENT_DESTINATION'),
                    "amount" => $payex,
                    "currency" => 'EUR', 
                    "country" => 'FR',
                    "callback_url" => env('APP_URL').'/process_callback'.'/'.$order_id,
                    "callback_version"=> 2,
                    "callback_id" => $order_id,
                    "return_cta" => env('APP_URL'),
                    "return_cta_name" => "Return to angel-jobs.fr",
                    "dynamic_fields" => [
                        "id" => $id,
                        "first_name" => $fullname,
                        "last_name" => ' ',
                        "date_of_birth" => $dob,
                        "email" => $username,
                    ]

                ];

                $headers = Http::withHeaders([
                    'X-Flywire-Digest' => 'G6kcHrGlKQGepZMsQ5IVfaykeLW5cwSgGmbz5HMwYHM=',
                    'Content-Type' => 'application/json',
                ]);
                $dataresps = $headers->post(env('PAYMENT_URL'), $data);

                $url = $dataresps->json();
                $pay_url =  $dataresps['url'];

                if (isset($pay_url) && !empty($pay_url)) {

                    try {

                        $user_id = session()->get('emp_user_id') ?? session()->get('js_user_id');
                        $exists = is_exist($table, $where);


                        if ($exists === 1 && session()->has('js_username')) {

                            $data = ['order_id' => $order_id, 'js_id' => $user_id, 'plan_id' => $plan, 'pay_method' => 'Flywire', 'payment_amount' => $amount, 'status' => 1, 'created_at' => $this->time];

                            $create = JsPayement::insertGetId($data);
                        } elseif (
                            $exists === 1 && session()->has('emp_username')
                        ) {

                            $data = ['order_id' => $order_id, 'emp_id' => $user_id, 'plan_id' => $plan, 'pay_method' => 'Flywire', 'payment_amount' => $amount, 'status' => 1, 'created_at' => $this->time];
                            $create = EmpPayments::insertGetId($data);
                        }

                        if (isset($create) && $create > 0) {
                            return redirect($pay_url);
                        } else {
                            return redirect()->back()->with('msg', 'Something Went Wrong1');
                        }
                    } catch (\Throwable $th) {
                        // return "Someting Went Wrong" . $th;
                        return redirect()->back()->with('msg', 'Something Went Wrong');
                    }
                }
            } catch (\Throwable $th) {
                // return "Someting Went Wrong" . $th;
                // return "1 ";
                redirect()->back()->with('msg', 'Something Went Wrong3');
            }
        } else {
            // return "2";
            redirect()->back()->with('msg', 'Something Went Wrong4');
        }
    }
    
    public function processCallback(Request $request, $order_id)
    {
        Log::info('Callback received');
        // Log::info('Callback received', $request->all());
        
        $callbackData = $request->all();   
        $eventType = $callbackData['event_type'] ?? null;
        $status = $callbackData['data']['status'] ?? null;

        // Get additional data fields
        $paymentId = $callbackData['data']['payment_id'] ?? null;
        $amountFrom = $callbackData['data']['amount_from'] ?? null;
        $currencyFrom = $callbackData['data']['currency_from'] ?? null;
        $amountTo = $callbackData['data']['amount_to'] ?? null;
        $currencyTo = $callbackData['data']['currency_to'] ?? null;
        $reason = $callbackData['data']['reason'] ?? null;
        $clientReason = $callbackData['data']['client_reason'] ?? null;
        $studentFirstName = $callbackData['data']['fields']['student_first_name'] ?? null;
        $studentLastName = $callbackData['data']['fields']['student_last_name'] ?? null;
        $studentEmail = $callbackData['data']['fields']['student_email'] ?? null;
        $passportNumber = $callbackData['data']['fields']['passport_number'] ?? null;

        // Log the extracted data for debugging
        Log::info("Event Type: $eventType");
        Log::info("Status: $status");
        Log::info("Payment ID: $paymentId");
        Log::info("Amount From: $amountFrom $currencyFrom");
        Log::info("Amount To: $amountTo $currencyTo");
        Log::info("Reason: $reason");
        Log::info("Client Reason: $clientReason");
        Log::info("Student: $studentFirstName $studentLastName, Email: $studentEmail, Passport: $passportNumber");
        $status = $callbackData['data']['status'];
        $checkoutSessionId = $paymentId;

        try{

            switch ($eventType) {
                case 'initiated':
                    Log::info("Event Type: $eventType");
                    Log::info('Payment Initiated', $request->all());

                    break;
                case 'processed':
                    Log::info("Event Type: $eventType");
                    Log::info('Payment Processed', $request->all());

                    break;
                case 'guaranteed':
                    Log::info("Event Type: $eventType");
                    Log::info('Payment Guaranteed', $request->all());
                    
                    if (session()->has('js_username')) {
                        $table = 'jobseeker_payments';
                    } elseif (session()->has('emp_username')) {
                        $table = 'employer_payments';
                    }
                    
                    $payment = DB::table($table)
                    ->where('status', '1')
                    ->where('order_id', $order_id)
                    ->latest()
                    ->first();

                    $carbonDate = Carbon::now();
                    $formattedDate = $carbonDate->format('Y-m-d');
                    $currentDate = Carbon::parse($formattedDate);
                    $addedDays = 0;
                    while ($addedDays < 7) {
                        $currentDate->addDay();
                        if ($currentDate->isWeekday()) {
                            $addedDays++;
                        }
                    }
                    $transaction = '';
                    $type = '';
                    $brand = '';
                    $exp_month = '';
                    $exp_year = '';

                    $paymentMethod = $callbackData['data']['payment_method'];

                    $transaction = '';
                    
                    if($paymentMethod['type']){
                        $type = $paymentMethod['type'];
                    }
                    $where = ['order_id' => $payment->order_id];
                    $select = [
                        'status' => '0',
                        'transaction_id' => $transaction,
                        'payment_type' => $type,
                        'card_type' => $brand,
                        'exp_month' => $exp_month,
                        'exp_year' => $exp_year,
                        'payment_intent_id' => $paymentId,
                        'payment_status' => '0',
                        'pay_date' => $formattedDate,
                        'hold_date' => $currentDate->toDateString()

                    ];  

                    $updatePayment = processData([$table, 'id'], $select, $where);

                    return $this->success();
                    break;
                case 'delivered':
        
                    $payment = DB::table($table)
                    ->where('status', '1')
                    ->where('order_id', $order_id)
                    ->latest()
                    ->first();
                                

                    $carbonDate = Carbon::now();
                    $formattedDate = $carbonDate->format('Y-m-d');
                    $currentDate = Carbon::parse($formattedDate);
                    $addedDays = 0;
                    while ($addedDays < 7) {
                        $currentDate->addDay();
                        if ($currentDate->isWeekday()) {
                            $addedDays++;
                        }
                    }
                    $transaction = '';
                    $type = '';
                    $brand = '';
                    $exp_month = '';
                    $exp_year = '';

                    $paymentMethod = $callbackData['data']['payment_method'];
                    $transaction = '';
                    
                    if($paymentMethod['type']){
                        $type = $paymentMethod['type'];
                    }
                    $where = ['order_id' => $payment->order_id];
                    $select = [
                        'status' => '0',
                        'transaction_id' => $transaction,
                        'payment_type' => $type,
                        'card_type' => $brand,
                        'exp_month' => $exp_month,
                        'exp_year' => $exp_year,
                        'payment_intent_id' => $paymentId,
                        'payment_status' => '0',
                        'pay_date' => $formattedDate,
                        'hold_date' => $currentDate->toDateString()

                    ];  

                    $updatePayment = processData([$table, 'id'], $select, $where);

                    return $this->success();
                        
                    break;
                case 'failed':
                    Log::error('Failed to update payment or order status for failed payment.');
                    return $this->success();

                    break;
                case 'cancelled':
                    $where = ['order_id' => $order_id];
                    $select = [
                        'status' => '1',
                    ];
                    $updatePayment = processData([$table, 'id'], $select, $where);
                    if(isset($updatePayment) && $updatePayment['status'] == TRUE){
                        return redirect()->route('payment-unsuccessful');
                    }
                    Log::error('Failed to update payment or order status for cancelled payment.');
                    return $this->success();
                    
                    break;
                default:
                    Log::info("Unknown Event Type: $eventType");
                    break;
            }
        
        } catch (\Exception $e) {
            \Log::error("Payment processing error: " . $e->getMessage());
            return view('frontend.payment.payment-unsuccessful', ['message' => $e->getMessage()]);
        }
    }


    public function filter_list(Request $req)
    {
        if (!empty($req->all())) {


            if ($req->list === '1') {
                $query =  DB::table('qualifications')->select('educational_qualification', 'id')->where('educational_qualification', 'like', '%' . $req->keyup_val . '%');
            }

            if ($req->list === '2') {
                $query =  DB::table('industries')->select('industries_name', 'id')->where('industries_name', 'like', '%' . $req->keyup_val . '%');
            }
            if ($req->list === '3') {
                $query =  DB::table('cities')->select('city_name', 'id')->where('city_name', 'like', '%' . $req->keyup_val . '%');
            }

            if ($req->list === '4') {
                $query =  DB::table('designations')->select('role_name', 'id')->where('role_name', 'like', '%' . $req->keyup_val . '%');
            }

            $data = $query->get();


            $html = '';
            $class = '';
            foreach ($data as $list) {
                if ($req->list === '1') {
                    $class = 'main_edu_list';
                    $html .= "<div class='form-check old_list'>
						<input class='form-check-input edu_fil' name='left_edu_fil[]' id='education$list->id'
							type='checkbox' value='$list->id'>
						<label class='form-check-label' for='education$list->id'
							id='left_edu_fil'>$list->educational_qualification
						</label>
					</div>";
                }
                if ($req->list === '2') {
                    $class = 'main_indus_list';
                    $html .= "<div class='form-check old_list'>
						<input class='form-check-input indus_fil' name='left_indus_fil[]' id='industry$list->id'
							type='checkbox' value='$list->id'>
						<label class='form-check-label' for='industry$list->id'
							id='left_indus_fil'>$list->industries_name
						</label>
					</div>";
                }

                if ($req->list === '3') {
                    $class = 'main_city_list';
                    $html .= "<div class='form-check old_list'>
						<input class='form-check-input loc_fil' name='left_loc_fil[]' id='location$list->id'
							type='checkbox' value='$list->id'>
						<label class='form-check-label' for='location$list->id'
							id='left_loc_fil'>$list->city_name
						</label>
					</div>";
                }

                if ($req->list === '4') {
                    $class = 'main_desig_list';
                    $html .= "<div class='form-check old_list'>
						<input class='form-check-input desig_fil' name='left_desig_fil[]' id='desig$list->id'
							type='checkbox' value='$list->id'>
						<label class='form-check-label' for='desig$list->id'
							id='left_desig_fil'>$list->role_name
						</label>
					</div>";
                }
            }

            return json_encode(['code' => 200, 'html' => $html, 'class' => $class]);
        }
    }
    public function newLetter(Request $req)
    {
        if ($req->isMethod('POST') && $req->ajax()) {
            $email = isset($req->email) ? $req->email : 'Invalid';
            $exists = DB::table('newsletter')->where('mail', $email)->count();


            if ($exists === 0) {
                try {
                    $mail = DB::table('newsletter')->insert(['mail' => $email]);
                    echo json_encode(['code' => 200, 'message' => 'Successfully Subscribed',  "icon" => "success"]);
                } catch (\Exception $e) {
                    echo json_encode(['code' => 205, 'message' => 'Unable to Subscribe', 'text' => "", "icon" => "error"]);
                }
            } else {

                echo json_encode(['code' => 205, 'message' => 'Invalid OR Duplicate Email', 'text' => "", "icon" => "error"]);
            }
        }
    }
    public function grivance(Request $req)
    {

        if ($req->isMethod('POST') && !empty($req->all())) {

            $name = isset($req->name) ? $req->input('name') : '';
            $country_code = isset($req->country_code) ? $req->input('country_code') : '';
            $contact_no = isset($req->contact_no) ? $req->input('contact_no') : '';
            $email = isset($req->email) ? $req->input('email') : '';
            $address = isset($req->address) ? $req->input('address') : '';
            $report_url = isset($req->report_url) ? $req->input('report_url') : '';
            $date_oc = isset($req->date_oc) ? $req->input('date_oc') : '';
            $confirm = isset($req->confirm) ? $req->input('confirm') : 'No';
            $message = isset($req->message) ? $req->input('message') : '';
            $tnc = isset($req->tnc) ? $req->input('tnc') : 'No';


            $grfile = $req->has('grfile') ? $req->file('grfile') : '';
            $grfile_name = $req->hasFile('grfile') ? time() . "." . $grfile->getClientOriginalExtension() :  'NA';

            $rules = [
                'name' => 'required|min:3',
                'country_code' => 'required',
                'contact_no' => 'required',
                'grfile' => 'max:3072',
            ];

            $validate = Validator::make($req->only(['name', 'country_code', 'contact_no', 'grfile']), $rules);
            if (!$validate->fails()) {

                if ($req->hasFile('grfile')) {
                    $logo_uploaded = file_upload($req->file('grfile'), 'storage/grivance_doc', $grfile_name, '');
                }
                // if ($logo_uploaded === TRUE) {
                try {
                    DB::table('grievance')->insert(['name' => $name, 'country_code' => $country_code, 'contact_no' => $contact_no, 'email' => $email, 'address' => $address, 'report_url' => $report_url, 'date_oc' => $date_oc, 'confirm' => $confirm, 'message' => $message, 'tnc' => $tnc]);


                    // mail_send(9, ['#Name#', '#Cat#'], ['', $cat], session()->get('emp_username'));
                    return  redirect()->back()->with(['code' => 200, 'message' => 'Successfully Submitted']);
                } catch (\Exception $e) {
                    return  redirect()->back()->with(['code' => 201, 'message' => 'Unable to Upload', 'text' => "Try Again", "icon" => "error"]);
                }
            } else {
                return redirect()->back()->with(['code' => 203, 'message' => 'Invalid File', 'text' => "File Should be JPG, PNG & Less then 3MB", "icon" => "error"]);
            }
        }
    }
}
