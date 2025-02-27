<?php

namespace App\Http\Controllers\adminControllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{employer as Employer, job_posting as JobPosting, jobseeker as Jobseeker, employer_payment as EmpPayments, employer_plan as EmpPlan};
use Illuminate\Support\Facades\{Session, DB, Validator, Hash, Storage, Crypt};
use Carbon\Carbon;
use App\Http\Controllers\commonController;
use App\Exports\EmployerDataExport;
use Excel;
class adminEmployerController extends Controller
{
    public $username;
    public $currentDate;
    public $time;
    public $JobPosting;
    public $Employer;
    public $date;
    public $EmpPlan;
    public function __construct()
    {
        $this->Employer = new employer;
        $this->JobPosting = new JobPosting;
        $this->EmpPlan = new EmpPlan;
        $this->username = session()->get('emp_username');
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }
    public function planDetails(Request $req)
    {
        $id = isset($req->plan_id) ? $req->plan_id : 0;
        $data = DB::table('employer_plan')->select(['plan_amount'])->where(['id' => $id, 'is_deleted' => 'No'])->get();
        if (!empty($data) && count($data) > 0) {
            echo json_encode(array('code' => 200, 'amount' => $data[0]->plan_amount, 'icon' => 'success'));
        } else {
            echo json_encode(['code' => 201, 'message' => 'Plan Not Found', "icon" => "error"]);
        }
    }
    public function getEmpProfile()
    {

        if (session()->has('admin_username')) {

            $employerData = Employer::select('employers.*', 'employer_plan.plan_name', 'employer_plan.job_post_limit', 'employer_payments.payment_amount', 'employer_payments.status')->leftJoin('employer_plan', 'employer_plan.id', '=', 'employers.plan_id')->leftJoin('employer_payments', 'employer_payments.id', '=', 'employers.last_payment_recieved_id')->where('employers.is_deleted', 'No')->orderBy('id', 'DESC')->get();
            return view('admin.Employer.employer-main-view', compact('employerData'));
        }
    }
    public function empProfileView($emp_id)
    {
        if (session()->has('admin_username') && !empty($emp_id) && isset($emp_id)) {

           
            $emp_id = base64_decode($emp_id);
            $empUserData = DB::table('employer_view')->where('id', $emp_id)->where('is_deleted', 'No')->orderBy('id', 'DESC')->get();
            $appliedcount=$query = DB::table('job_application_history')
            ->select(
                'job_application_history.js_id',
                'job_application_history.job_id',
                'job_application_history.applied_on',)
                ->leftJoin('job_posting_view', 'job_application_history.job_id', '=', 'job_posting_view.id')
                ->where('job_posting_view.posted_by', $emp_id)
                ->whereNotNull('job_application_history.applied_on')
                ->count();
$Shortappliedcount=$query = DB::table('job_application_history')
            ->select(
                'job_application_history.js_id',
                'job_application_history.job_id',
                'job_application_history.job_id',
                'job_application_history.is_shortlisted',)
                ->leftJoin('job_posting_view', 'job_application_history.job_id', '=', 'job_posting_view.id')
                ->where('job_posting_view.posted_by', $emp_id)
                ->where('job_application_history.is_shortlisted', 'Yes')
                ->whereNotNull('job_application_history.applied_on')
                ->count();                            

return view('admin.Employer.employer-view', compact('empUserData','appliedcount','Shortappliedcount'));

        }
    }
    public function empProfileditView($emp_id)
    {
        if (session()->has('admin_username') && !empty($emp_id) && isset($emp_id)) {

            $emp_id = base64_decode($emp_id);
            $empUserData = DB::table('employer_view')->where('id', $emp_id)->where('is_deleted', 'No')->get();

            return view('admin.Employer.employer-view-edit', compact('empUserData'));
        }
    }

    public function empProfiledit(Request $req)
    {
        
        
       if ($req->isMethod('POST') && session()->has('admin_username')) {

            $enc_id = $req->input('emp_id');
            $emp_com_name = isset($req->company_name) ? htmlspecialchars($req->input('company_name')) : '';
            $full_name = isset($req->full_name) ? htmlspecialchars($req->input('full_name')) : '';
            $emp_com_type = is_numeric($req->emp_com_type) ? $req->input('emp_com_type') : 0;
            $emp_com_size = is_numeric($req->emp_com_size) ? $req->input('emp_com_size') : 0;
            $emp_com_indus = is_numeric($req->emp_com_indus) ? $req->input('emp_com_indus') : 0;
            $emp_com_city = is_numeric($req->emp_com_city) ? $req->input('emp_com_city') : 0;
            $emp_com_zip = isset($req->emp_com_zip) ? htmlspecialchars($req->input('emp_com_zip')) : '';
            $emp_com_web = isset($req->emp_com_web) ? htmlspecialchars($req->input('emp_com_web')) : '';
            $emp_com_facebook = isset($req->emp_com_facebook) ? htmlspecialchars($req->input('emp_com_facebook')) : '';
            $emp_com_insta = isset($req->emp_com_insta) ? htmlspecialchars($req->input('emp_com_insta')) : '';
            $emp_com_linkedin = isset($req->emp_com_linkedin) ? htmlspecialchars($req->input('emp_com_linkedin')) : '';
            $emp_com_addrss = isset($req->emp_com_addrss) ? htmlspecialchars($req->input('emp_com_addrss')) : '';
            $mobile_no = isset($req->mobile_no) ? htmlspecialchars($req->input('mobile_no')) : '';
            $license_no = isset($req->license_no) ? htmlspecialchars($req->input('license_no')) : '';
            $emp_id = isset($req->emp_id) ? base64_decode($req->input('emp_id')) : 0;
            $com_logo = $req->hasFile('com_logo') ? $req->file('com_logo') : '';
            $old_img_name = !empty($req->input('old_img_name')) ? $req->input('old_img_name') : '';
            $logo_name = $req->hasFile('com_logo') ? $emp_id . "_" . time() . "." . $com_logo->getClientOriginalExtension() :  $old_img_name;

            $rules = [
                "full_name" => "required|string|min:3",
                "company_name" => "required",
                "emp_id" => "required",
                "mobile_no" => "required|numeric|min:9",
                // "license_no" => "required",
                // "mobile_no" => "required|string|max:225",
            ];


            $validate = Validator::make($req->only(['full_name', 'company_name', 'emp_id', 'license_no', 'mobile_no']), $rules);
            $exists = is_exist('employers', ['id' => $emp_id, 'is_deleted' => 'No']);

            $logo_uploaded = TRUE;
            if ($req->hasFile('com_logo')) {
                $folder = 'storage/employer/profile_image/';
                $logo_uploaded = file_upload($com_logo, $folder, $logo_name, $req->input('old_img_name'));
            }
            if ($exists === 1) {
                if (!$validate->fails()) {
                    if ($logo_uploaded === TRUE) {
                     
                        try {
                            $user_id = Employer::where('id', $emp_id)->update([
                                'fullname' => $full_name,
                                'company_name' => $emp_com_name,
                                'mob_code' => '+33',
                                'mobile' => $mobile_no,
                                'company_type' => $emp_com_type,
                                'company_size' => $emp_com_size,
                                'industry' => $emp_com_indus,
                                'address' => $emp_com_addrss,
                                // 'license_no' => $license_no,
                                'city' => $emp_com_city,
                                'profile_img' => $logo_name,
                                'website' => $emp_com_web,
                                'facebook' => $emp_com_facebook,
                                'instagram' => $emp_com_insta,
                                'linkedin' => $emp_com_linkedin,
                                'zip' => $emp_com_zip,
                                'is_deleted' => 'No',
                            ]);
                      
                            if ($user_id > 0 && $logo_uploaded === TRUE) {
                                // mail_send(9, ['#Name#', '#Cat#'], [ucfirst($full_name), 'Employer'], session()->get('emp_username'));
                                return  redirect('admin/get-employer-data')->with('msgs', 'Successfully Updated');
                            } else {
                                return  redirect('admin/get-employer-data')->with('msgf', 'Unable to Add Details');
                            }
                        } catch (\Exception $e) {
                            return  redirect('admin/get-employer-data')->with('msgf', 'Unable to Add Details');
                        }
                    } else {
                        return  redirect('admin/get-employer-data')->with('msgf', 'Unable to Upload Profile');
                    }
                } else {
                    return  redirect("admin/employer-edit-view/$enc_id")->withErrors($validate)->withInput();
                }
            } else {
                return  redirect('admin/get-employer-data')->with('msgf', 'User Not Exist');
            }
        } else {
            return  redirect('admin/get-employer-data')->with('msgf', 'Something Went Wrong');
        }
    }
    public function addEmployer(Request $req)
    {


        if ($req->isMethod('POST') && session()->has('admin_username')) {


            $name = isset($req->fullname) ? htmlspecialchars($req->input('fullname')) : '';
            $com_name = isset($req->com_name) ? htmlspecialchars($req->input('com_name')) : '';
            $contact_no = isset($req->contact_no) ? htmlspecialchars($req->input('contact_no')) : '';
            $email = isset($req->addemail) ? htmlspecialchars($req->input('addemail')) : '';
            $password = isset($req->password) ? htmlspecialchars($req->input('password')) : '';
            $gst_license = $req->hasFile('gst_license') ? $req->file('gst_license') : '';
            $owner_id = $req->hasFile('owner_id') ? $req->file('owner_id') : '';
            $mob_code = "+33";
            $currentDate = Carbon::now('Europe/Paris');
            $booking_date = $currentDate->format('Y-m-d');
            $booking_time = $currentDate->format('H:i:s');
            $time = $booking_date . " " . $booking_time;

            $plan_id = 1; //Free Plan ID
            $plan_end_duration = 90;
            $plan_expired_on = $currentDate->addDays($plan_end_duration)->format('Y-m-d');
            $plan_details = $this->EmpPlan->planDetails($plan_id, ['job_post_limit','cv_access_limit']); // 1 Free Welcom Plan

            if (Employer::where('email', $email)->count() === 0) {
                if (Employer::where('mobile', $contact_no)->where('mob_code', $mob_code)->count() === 0) {
                    $validate_rules = [
                        'fullname' => 'required|string|max:225',
                        'com_name' => 'required|string|max:225',
                        'contact_no' => 'required|string|max:225',
                        'addemail' => 'required|email|max:225',
                        'password' => 'required|string|max:225',
                        'mob_code' => 'string|max:225',
                        'gst_license' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
                        'owner_id'    => 'nullable|file|mimes:jpg,png,pdf|max:2048',
                    ];


                    $validate = Validator::make($req->all(), $validate_rules);


                    if (!$validate->fails()) {

                        try {
                            $id = Session::has('emp_user_id') ? Session::get('emp_user_id') : 0;
                        
                            $gst_license_filename = null;
                            $owner_id_filename = null;
                            if ($req->hasFile('gst_license')) {
                                $file = $req->file('gst_license');
                                $gst_license_filename = 'gst_' . time() . '_' . $id . '.' . $file->getClientOriginalExtension();
                                $gst_license = file_upload($file, 'storage/employer/gst_license/', $gst_license_filename);
                                if (!$gst_license) {
                                    echo json_encode(['code' => 201, 'message' => 'GST License upload failed!', "icon" => "error"]);
                                }   
                            }
                            if ($req->hasFile('owner_id')) {
                                $file = $req->file('owner_id');
                                $owner_id_filename = 'ownerid_' . time() . '_' . $id . '.' . $file->getClientOriginalExtension();
                                $owner_id = file_upload($file, 'storage/employer/owner_id/', $owner_id_filename);
                                if (!$owner_id) {
                                    echo json_encode(['code' => 201, 'message' => 'Owner Id upload failed!', "icon" => "error"]);
                                }
                            }
                            $user_id = Employer::create([
                                'fullname' => $name,
                                'mobile' => $contact_no,
                                'email' => $email,
                                'mob_code' => $mob_code,
                                'plan_id' => $plan_id,
                                'plan_start_from' => $booking_date,
                                'plan_expired_on' => $plan_expired_on,
                                'free_assign_job_posting' => $plan_details[0]->job_post_limit,
                                'cv_access_limit' => $plan_details[0]->cv_access_limit,
                                'cv_access_total' => $plan_details[0]->cv_access_limit,
                                'company_name' => $com_name,
                                'password' => Hash::make($password),
                                'is_deleted' => 'No',
                                'register_date' => $time,
                                'gst_license' => $gst_license_filename,
                                'owner_id' => $owner_id_filename,
                            ]);

                            $emp_id = $user_id->id;
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

            echo json_encode(['code' => 201, 'message' => 'Someting Went Wronge', "icon" => "error"]);
        }
    }
    public function empProfildelete(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $userId = is_array($req->userId) ? $req->input('userId') : [];


            $deleted = 0;
            foreach ($userId as $id) {
                $emp_id = base64_decode($id);
                $exists = is_exist('employers', ['id' => $emp_id, 'is_deleted' => 'No']);
                if ($exists) {
                    try {
                        DB::table('employers')->where('id', $emp_id)->update(['is_deleted' => 'Yes']);
                        DB::table('job_postings')->where('posted_by', $emp_id)->update(['is_deleted' => 'Yes']);//job_postings

                        $deleted++;
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully Deleted', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Employer is Already Deleted', "icon" => "error"]);
            }
        }
    }
    public function empPlanAssign(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $user_id = Session::get('admin_user_id');
            $form = is_array($req->form) ? $req->input('form') : [];
            $plan_id = isset($req->plan_id) ? $req->input('plan_id') : '';
            $amount_recieved = isset($req->amount_recieved) ? $req->input('amount_recieved') : 0;
            $trans_id = is_array($req->trans_id) ? $req->input('trans_id') : '';
            $order_id = $this->currentDate->format('YmdHis');

            $deleted = 0;
            foreach ($form as $userId) {
                $emp_id = base64_decode($userId['value']);
                $exists = is_exist('employers', ['id' => $emp_id, 'is_deleted' => 'No']);
                if ($exists) {
                    DB::beginTransaction();
                    try {

                        $currentLeftCredit = getData('employers', ['left_credit_job_posting_plan','cv_access_limit','cv_access_total'], ['id' => $emp_id]);

                        $plan_details = $this->EmpPlan->planDetails($plan_id, ['job_post_limit', 'plan_duration','cv_access_limit']);
                        $plan_end_duration = $plan_details[0]->plan_duration;
                        $posting_limit = $currentLeftCredit[0]->left_credit_job_posting_plan + $plan_details[0]->job_post_limit;
                        
                        $cv_access_limit = $currentLeftCredit[0]->cv_access_limit + $plan_details[0]->cv_access_limit;
                        $plan_expired_on = $this->currentDate->addDays($plan_end_duration)->format('Y-m-d');
                        $cv_access_total =$currentLeftCredit[0]->cv_access_total + $plan_details[0]->cv_access_limit;
                      


                        $payment_id =  DB::table('employer_payments')->insertGetId([
                            'plan_id' =>
                            $plan_id, 'order_id' => $order_id, 'emp_id' => $emp_id, 'payment_id' => $trans_id, 'payment_amount' => $amount_recieved, 'pay_method' => 'ADMIN', 'status' => 3, 'confirm_by' => $user_id, 'created_at' => $this->time
                        ]);

                        DB::table('employers')->where('id', $emp_id)->update(['plan_id' => $plan_id, 'left_credit_job_posting_plan' => $posting_limit, 'plan_start_from' => $this->date,'cv_access_limit' => $cv_access_limit ,'cv_access_total' => $cv_access_total, 'plan_expired_on' => $plan_expired_on, 'last_payment_recieved_id' => $payment_id, 'assign_by' => $user_id, 'last_payment_recieved_on' => $this->date]);


                        DB::commit();
                        $deleted++;
                    } catch (\Throwable $th) {
                        DB::rollback();
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => 'Plan Assigned Successfully', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Plan Unable to Assign', "icon" => "error"]);
            }
        }
    }
    public  function empExports()
    {

        return Excel::download(new EmployerDataExport, 'employer_report.xlsx');
    }
    public function getEmpPlans()
    {

        if (session()->has('admin_username')) {

            $EmpPlanData = DB::table('employer_plan')->where('is_deleted', 'No')->get();
            return view('admin.Employer.employer-plan-list', compact('EmpPlanData'));
        }
    }
    
}