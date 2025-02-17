<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\{Hash, Validator, Session, DB,};
use App\Models\{admin_user as AdminUser, jobseeker as Jobseeker, employer as Employer};
use App\Exports\JobPostingExport;
use App\Exports\PagesDataExport;
use Excel;

class adminCommonController extends Controller
{
    public $username;
    public $currentDate;
    public $time;
    public $date;
    public function __construct()
    {

        $this->username = session()->get('admin_username');
        $this->currentDate = Carbon::now('Europe/Paris');
        $this->time = $this->currentDate->format('Y-m-d H:i:s');
        $this->date = $this->currentDate->format('Y-m-d');
    }
    public function index()
    {

        if (session()->has('admin_username')) {
            $jobSeekerData = DB::table('jobseeker_view')->select('fullname', 'profile_img', 'email', 'mob_code', 'mobile', 'role_name', 'experiance_name', 'pref_job_type_name', 'created_at',  'updated_at')->where(['is_delete' => 'No'])->orderByDesc('updated_at')->limit(5)->get();
            $empData = DB::table('employer_view')->select('fullname', 'company_name', 'profile_img', 'email', 'mob_code', 'mobile', 'industry_name', 'plan_name', 'created_at', 'updated_at')->where(['is_deleted' => 'No'])->orderByDesc('updated_at')->limit(5)->get();
            return view('admin.index', compact('jobSeekerData', 'empData'));
        }
    }
    // Seo Page Data
    public function seoPageList()
    {

        if (session()->has('admin_username')) {

            $pagesData = DB::table('web_pages')->select('web_pages.*', 'admin_users.fullname')->leftJoin('admin_users', 'admin_users.id', '=', 'web_pages.last_update_by')->where('is_deleted', 'No')->get();
            return view('admin.seo', compact('pagesData'));
        }
    }
    public function seoPageUpdateView($id)
    {

        if (session()->has('admin_username')) {


            $id = base64_decode($id);
            $pagesData = DB::table('web_pages')->where(['is_deleted' => 'No', 'id' => $id])->get();
            return view('admin.seo-page-update', compact('pagesData'));
        }
    }
    public function seoPageView($id)
    {

        if (session()->has('admin_username')) {


            $id = base64_decode($id);
            $pagesData = DB::table('web_pages')->where(['is_deleted' => 'No', 'id' => $id])->get();
            return view('admin.seo-page-update', compact('pagesData'));
        }
    }
    // Add SEO Page
    public function updateSeoPage(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $page_name = isset($req->page_name) ? htmlspecialchars($req->input('page_name')) : '';
            $page_url = isset($req->page_url) ? htmlspecialchars($req->input('page_url')) : '';
            $slug = isset($req->slug) ? htmlspecialchars($req->input('slug')) : '';
            $keywords = isset($req->keywords) ? htmlspecialchars($req->input('keywords')) : '';
            $h_tag = isset($req->h_tag) ? htmlspecialchars($req->input('h_tag')) : '';
            $title = isset($req->title) ? htmlspecialchars($req->input('title')) : '';
            $meta_disc = isset($req->meta_disc) ? htmlspecialchars($req->input('meta_disc')) : '';
            $meta_tags = isset($req->meta_tags) ? htmlspecialchars($req->input('meta_tags')) : '';
            $live = $req->live === 'Yes'  ? 'Live' : 'Inactive';
            $page_id = isset($req->page_id) ? base64_decode($req->input('page_id')) : 0;

            $rules = [
                "page_name" => "required|string|min:3",
                "page_url" => "required|string|min:3",
                "slug" => "required|string|min:3",
                "keywords" => "required|string|min:3",
                "h_tag" => "required|string|min:3",
                "title" => "required|string|min:3",
                "meta_disc" => "required|string|min:3",
                "meta_tags" => "required|string|min:3"
            ];
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {
                try {

                    $data = ['page_name' => $page_name, 'page_title' => $title, 'page_content' => $meta_disc, 'slug' => $slug, 'keywords' => $keywords, 'h1_tag' => $h_tag, 'meta_tags' => $meta_tags, 'page_status' => $live, 'page_url' => $page_url, 'last_update_by' => session()->get('admin_user_id')];
                    if (isset($page_id) && is_numeric($page_id) && $page_id != 0) {
                        DB::table('web_pages')->where(['is_deleted' => 'No', 'id' => $page_id])->update($data);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted']);
                    } else {
                        $newData = array_merge($data, ['created_on' => $this->time]);
                        DB::table('web_pages')->insertGetId($newData);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted']);
                    }
                } catch (\Throwable $th) {
                    return $th;
                    echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Mandatory Fields Missing']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }

    // google analytic code
    public function updateSiteConfig(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $google_code = isset($req->google_code) ? htmlspecialchars($req->input('google_code')) : '';

            $rules = [
                "google_code" => "required|string|min:3",
            ];
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {
                try {

                    $data = ['google_analytics_code' => $google_code, 'last_update_by' => session()->get('admin_user_id'), 'created_at' => $this->time];

                    DB::table('site_configs')->where(['is_deleted' => 'No', 'id' => 1])->update($data);
                    echo json_encode(['code' => 200, 'message' => 'Successfully Submitted']);
                } catch (\Throwable $th) {
                    return $th;
                    echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Mandatory Fields Missing']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }

    public function siteConfig()
    {

        if (session()->has('admin_username')) {
            $siteConfig = DB::table('site_configs')->where(['is_deleted' => 'No'])->get();
            return view('admin.google-analytics-code', compact('siteConfig'));
        }
    }

    // seo page Delete
    public function pageDelete(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $userId = is_array($req->userId) ? $req->input('userId') : [];

            $deleted = 0;
            $table = '';
            $exists = '';
            $where = '';
            foreach ($userId as $id) {



                $page_id = base64_decode($id);
                $table = 'web_pages';
                $planwhere = ['id' => $page_id, 'is_deleted' => 'No'];

                $paln_exists = is_exist($table, $planwhere);
                if ($table != '') {
                    if ($paln_exists > 0) {
                        try {
                            DB::table($table)->where($planwhere)->update(['is_deleted' => 'Yes']);
                            $deleted++;
                        } catch (\Throwable $th) {
                            continue;
                        }
                    }
                }
            }

            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully Deleted', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Template is Already Deleted', "icon" => "error"]);
            }
        } else {
            echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
        }
    }
    public  function pageDataExports()
    {

        return Excel::download(new PagesDataExport, 'seo-page-data.xlsx');
    }

    // Get Update
    public function getElementList(Request $req)
    {

        $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
        if (session()->has('admin_username')) {
            $where = ['is_deleted' => 'No'];
            if ($type === 'country') {
                $cols_selected = ['id', 'country_name', 'country_code', 'status'];
                $table = 'country_master';
            } elseif ($type === 'state') {
                $table = 'state_masters';
                $cols_selected = ['state_masters.*', 'country_master.country_name'];
            } elseif ($type === 'martial_status') {
                $table = 'martial_status';
                $cols_selected = ['id', 'status', 'marital_status'];
            } elseif ($type === 'designation') {
                $table = 'designations';
                $cols_selected = ['id', 'status', 'role_name'];
            } elseif ($type === 'skills') {
                $table = 'key_skills';
                $cols_selected = ['id', 'status', 'key_skill_name'];
            } elseif ($type === 'lang') {
                $table = 'languages';
                $cols_selected = ['id', 'status', 'skill_language'];
            } elseif ($type === 'job_type') {
                $table = 'job_types';
                $cols_selected = ['id', 'status', 'job_type'];
            } elseif ($type === 'notice') {
                $table = 'notice_periods';
                $cols_selected = ['id', 'status', 'notice'];
            } elseif ($type === 'exp') {
                $table = 'experiances';
                $cols_selected = ['id', 'status', 'experiance'];
            } elseif ($type === 'indus') {
                $table = 'industries';
                $cols_selected = ['id', 'status', 'industries_name'];
            } elseif ($type === 'func') {
                $table = 'functional_areas';
                $cols_selected = ['id', 'status', 'functional_name'];
            } elseif ($type === 'com_type') {
                $table = 'company_types';
                $cols_selected = ['id', 'status', 'company_type'];
            } elseif ($type === 'com_size') {
                $table = 'company_sizes';
                $cols_selected = ['id', 'status', 'company_size'];
            } elseif ($type === 'sal_range') {
                $table = 'salary_ranges';
                $cols_selected = ['id', 'status', 'salary_range'];
            } elseif ($type === 'qual') {
                $table = 'qualifications';
                $cols_selected = ['qualifications.id', 'qualifications.status', 'educational_qualification', 'qualification_level_id', 'qualification_name'];
            }
            
            $query = DB::table($table)->select($cols_selected);
            if ($type === 'state') {
                $query->leftJoin('country_master', 'state_masters.country_id', '=', 'country_master.id');
                $where = ['state_masters.is_deleted' => 'No'];
            }
            if ($type === 'qual') {
                $query->leftJoin('jobseeker_qualification_level', 'qualifications.qualification_level_id', '=', 'jobseeker_qualification_level.id');
                $where = ['qualifications.is_deleted' => 'No'];
            }
            $elementData =  $query->where($where)->paginate(1000);

            echo  json_encode(['code' => 200, 'data' => $elementData]);
        }
    }
    //  Elements Update
    public function updateElement(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
            $element1 = isset($req->element1) ? htmlspecialchars($req->input('element1')) : '';
            $element2 = isset($req->element2) ? htmlspecialchars($req->input('element2')) : '';
            $element_id = isset($req->element_id) ? base64_decode($req->input('element_id')) : '';
            $status = $req->status === '1'  ? 'APPROVED' : 'UNAPPROVED';

            $cols = [];
            $rules = [
                "element1" => "required",
            ];
            if ($type === 'country') {
                $table = 'country_master';
                $cols = ['country_name' => $element1, 'country_code' => $element2];
                $rules = [
                    "element1" => "required|string|min:3",
                    "element2" => "required|string|min:3",
                ];
            }
            if ($type === 'state') {
                $table = 'state_masters';
                $cols = ['state_name' => $element1, 'country_id' => $element2];
                $rules = [
                    "element1" => "required|string|min:3",
                    "element2" => "required",
                ];
            }
            if ($type === 'qual') {
                $table = 'qualifications';
                $cols = ['qualification_level_id' => $element1, 'educational_qualification' => $element2];
                $rules = [
                    "element1" => "required",
                    "element2" => "required|string|min:3",
                ];
            }
            if ($type === 'martial_status') {
                $table = 'martial_status';
                $cols = ['marital_status' => $element1];
            }
            if ($type === 'designation') {
                $table = 'designations';
                $cols = ['role_name' => $element1];
            }
            if ($type === 'skills') {
                $table = 'key_skills';
                $cols = ['key_skill_name' => $element1];
            }
            if ($type === 'lang') {
                $table = 'languages';
                $cols = ['skill_language' => $element1];
            }
            if ($type === 'job_type') {
                $table = 'job_types';
                $cols = ['job_type' => $element1];
            }
            if ($type === 'notice') {
                $table = 'notice_periods';
                $cols = ['notice' => $element1];
            }
            if ($type === 'exp') {
                $table = 'experiances';
                $cols = ['experiance' => $element1];
            }
            if ($type === 'indus') {
                $table = 'industries';
                $cols = ['industries_name' => $element1];
            }
            if ($type === 'func') {
                $table = 'functional_areas';
                $cols = ['functional_name' => $element1];
            }
            if ($type === 'com_type') {
                $table = 'company_types';
                $cols = ['company_type' => $element1];
            }
            if ($type === 'com_size') {
                $table = 'company_sizes';
                $cols = ['company_size' => $element1];
            }
            if ($type === 'sal_range') {
                $table = 'salary_ranges';
                $cols = ['salary_range' => $element1];
            }
            $validate = validator::make($req->all(), $rules);
         
            if (!$validate->fails()) {
                if (is_exist($table, $cols) === 0) {

                try {

                    if (isset($element_id) && is_numeric($element_id) && $element_id != 0) {
                        $is_exits = is_exist($table, ['id' => $element_id]);
                        if ($is_exits > 0) {
                                $newData = array_merge($cols, ['status' => $status]);
                                DB::table($table)->where(['is_deleted' => 'No', 'id' => $element_id])->update($newData);
                            echo json_encode(['code' => 200, 'message' => 'Successfully Updated']);
                        } else {
                            echo json_encode(['code' => 201, 'message' => 'No Records Found']);
                        }
                    } else {
                            $newData = array_merge($cols, ['status' => $status]);
                            DB::table($table)->insertGetId($newData);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted']);
                    }
                } catch (\Throwable $th) {
                    return $th;
                    echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
                }
            } else {
                    echo json_encode(['code' => 404, 'message' => 'Already Exists']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Mandatory Fields Missing']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }
    public function editelementModalView(Request $req)
    {
        $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
        $id = isset($req->id) ? base64_decode($req->input('id')) : '';
        if (session()->has('admin_username') && !empty($id) && isset($id)) {

            if ($type === 'country') {
                $table = 'country_master';
            } elseif ($type === 'state') {
                $table = 'state_masters';
            } elseif ($type === 'martial_status') {
                $table = 'martial_status';
            } elseif ($type === 'designation') {
                $table = 'designations';
            } elseif ($type === 'skills') {
                $table = 'key_skills';
            } elseif ($type === 'lang') {
                $table = 'languages';
            } elseif ($type === 'job_type') {
                $table = 'job_types';
            } elseif ($type === 'notice') {
                $table = 'notice_periods';
            } elseif ($type === 'exp') {
                $table = 'experiances';
            } elseif ($type === 'indus') {
                $table = 'industries';
            } elseif ($type === 'func') {
                $table = 'functional_areas';
            } elseif ($type === 'com_type') {
                $table = 'company_types';
            } elseif ($type === 'com_size') {
                $table = 'company_sizes';
            } elseif ($type === 'sal_range') {
                $table = 'salary_ranges';
            } elseif ($type === 'qual') {
                $table = 'qualifications';
            }

            $query = DB::table($table);

            if ($type === 'qual') {
                $templData =  $query->leftJoin('jobseeker_qualification_level', 'qualifications.qualification_level_id', '=', 'jobseeker_qualification_level.id')->where('qualifications.id', $id)->where(['qualifications.is_deleted' => 'No'])->get();
            } else {
                $templData = $query->where('id', $id)->where('is_deleted', 'No')->get();
            }
            return json_encode(['data' => $templData, 'code' => 200]);
        }
    }
    public function elementStatusUpdate(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $form = is_array($req->form) ? $req->input('form') : [];
            $action = isset($req->action) ? $req->input('action') : '';
            $type = isset($req->type) ? $req->input('type') : '';


            // return $action;
            // return  $form[0]['value'];
            $status = 0;
            $table = '';
            $exists = '';
            $msg = '';
            $planwhere = '';
            $action_perform = [];
            foreach ($form as $id) {

                $el_id = base64_decode($id['value']);
                $planwhere = ['id' => $el_id, 'is_deleted' => 'No'];
                if ($type === "country") {
                    $table = 'country_master';
                } elseif ($type === "state") {
                    $table = 'state_masters';
                } elseif ($type === "martial_status") {
                    $table = 'martial_status';
                } elseif ($type === "designation") {
                    $table = 'designations';
                } elseif ($type === "skills") {
                    $table = 'key_skills';
                } elseif ($type === "lang") {
                    $table = 'languages';
                } elseif ($type === "job_type") {
                    $table = 'job_types';
                } elseif ($type === "notice") {
                    $table = 'notice_periods';
                } elseif ($type === "exp") {
                    $table = 'experiances';
                } elseif ($type === 'func') {
                    $table = 'functional_areas';
                } elseif ($type === 'com_type') {
                    $table = 'company_types';
                } elseif ($type === 'com_size') {
                    $table = 'company_sizes';
                } elseif ($type === 'sal_range') {
                    $table = 'salary_ranges';
                } elseif ($type === 'qual') {
                    $table = 'qualifications';
                }
            

                
                if ($action === '1') {
                    $msg = 'Approved';
                    $action_perform = [
                        'status' => 'APPROVED',
                    ];
                } elseif ($action === '0') {
                    $msg = 'Reject';
                    $action_perform = [
                        'status' => 'UNAPPROVED',
                    ];
                } elseif ($action === '2') {
                    $msg = 'Deleted';
                    $action_perform = [
                        'is_deleted' => 'Yes',
                    ];
                } else {
                    echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
                    return;
                }
                $exists = is_exist($table, $planwhere);
                if ($exists > 0 && is_array($action_perform) && !empty($action_perform)) {
                    try {

                        DB::table($table)->where('id', $el_id)->update($action_perform);
                        $status++;
                    } catch (\Throwable $th) {

                        continue;
                    }
                }
            }

            if ($status > 0) {
                echo json_encode(array('code' => 200, 'message' => $status . ' Records Successfully ' . $msg, 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Select Valid Entry ' . $msg, "icon" => "error"]);
            }
        } else {
            echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
        }
    }
    public  function jobsExports()
    {

        return Excel::download(new JobPostingExport, 'job_posting_report.xlsx');
    }

   
    public function logout()
    {
        session()->flush();
        return redirect('/admin-login');
    }
    
    public function addEmailTemplate(Request $req)
    {
      
        if ($req->isMethod('POST') && session()->has('admin_username') || session()->has('emp_username')) {
            
            $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
            $template_name = isset($req->template_name) ? htmlspecialchars($req->input('template_name')) : '';
            $email_subject = isset($req->email_subject) ? htmlspecialchars($req->input('email_subject')) : '';
            $email_content = isset($req->email_content) ? htmlspecialchars($req->input('email_content')) : '';
           
            $rules = [
                "type" => "required|numeric|min:1",
                "template_name" => "required|string|min:3",
                "email_subject" => "required|string|min:3",
                "email_content" => "required|string|min:3"
            ];
            if(session()->has('admin_username')){
                $status='APPROVED';
                $addedvy=session()->has('admin_user_id');
                $redirect='admin/email-view';
            }
           else{
                $status='UNAPPROVED';
                $addedvy=Session::get('emp_user_id');
                $redirect='employer/add-email-template';
               
               
           }
        
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {
                try {
                    
                    // DB::table('email_templates')->insert(['status' => $status, 'template_name' => $template_name, 'email_subject' => $email_subject, 'email_content' => $email_content, 'type' => $type, 'added_by' => $addedvy]);
                    // return redirect($redirect)->with('msg', 'Succefully Added');
                    
                    $data=DB::table('email_templates')->insert(['status' => $status, 'template_name' => $template_name, 'email_subject' => $email_subject, 'email_content' => $email_content, 'type' => $type, 'added_by' => $addedvy]);
                    if(isset($data) && $data === true){
                        if(session()->has('admin_username')){
                     return redirect($redirect)->with('msg', 'Succefully Added');
                        }else{
                            return response()->json(['code' => 200,'message' => 'Successfully updated','icon' => 'success',]);
                     }
                 }

                } catch (\Exception $th) {
                    return redirect()->back()->with('msg', 'Unable to Create');
                }
            } else {
                return redirect()->back()->withErrors($validate);
            }
        } else {
            return redirect()->back()->with('msg', 'Something Went Wrong');
        }
    }


    public function updateEmailTemplate(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username') || session()->has('emp_username')) {
            $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
            $template_name = isset($req->template_name) ? htmlspecialchars($req->input('template_name')) : '';
            $email_subject = isset($req->email_subject) ? htmlspecialchars($req->input('email_subject')) : '';
            $email_content = isset($req->email_content) ? htmlspecialchars($req->input('email_content')) : '';
            $temp_id = isset($req->temp_id) ? base64_decode($req->input('temp_id')) : '';
           

            $rules = [
                "type" => "required|numeric|min:1",
                "template_name" => "required|string|min:3",
                "email_subject" => "required|string|min:3",
                "email_content" => "required|string|min:3"
            ];
            $validate = validator::make($req->all(), $rules);
            if(session()->has('admin_username')){
                $status='APPROVED';
            }
            else{
                $status='UNAPPROVED';
            }
            if (!$validate->fails()) {
                try {
                    // $insert = DB::table('email_templates')->where('id', $temp_id)->update(['status' => $status, 'template_name' => $template_name, 'email_subject' => $email_subject, 'email_content' => $email_content, 'type' => $type]);

                    // if(session()->has('admin_username')){
                        
                    //     return redirect('admin/email-view')->with('msg', 'Successfully Updated');

                    // }else{
                    //     echo json_encode(array('code' => 200, 'message' => 'Successfully update', 'icon' => 'success'));

                    // }
                    
                    $insert = DB::table('email_templates')->where('id', $temp_id)->update(['status' => $status,'template_name' => $template_name,'email_subject' => $email_subject,'email_content' => $email_content,'type' => $type,]);

                    if (session()->has('admin_username')) {
                        
                        if ($insert > 0) { 
                            return redirect('admin/email-view')->with('msg', 'Successfully Updated');
                        } else {
                            return redirect()->back()->with('error', 'Unable to update');
                        }
                    } else {
                        
                        if ($insert > 0) {
                            return response()->json(['code' => 200,'message' => 'Successfully updated','icon' => 'success',]);}
                            else {
                                return response()->json(['code' => 201,'message' => 'Not updated','icon' => 'warning',]);
                        }
                    }

                } catch (\Exception $th) {

                    return redirect()->back()->with('error', 'Unable to Create');
                }
            } else {
                return redirect()->back()->withErrors($validate);
            }
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
    public function emailTemplDelete(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $userId = is_array($req->userId) ? $req->input('userId') : [];


            $deleted = 0;
            foreach ($userId as $id) {
                $emp_id = base64_decode($id);
                $exists = is_exist('email_templates', ['id' => $emp_id, 'is_deleted' => 'No']);
                if ($exists) {
                    try {
                        DB::table('email_templates')->where('id', $emp_id)->update(['is_deleted' => 'Yes']);
                        $deleted++;
                    } catch (\Throwable $th) {
                        continue;
                    }
                }
            }
            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully Deleted', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Template is Already Deleted', "icon" => "error"]);
            }
        }
    }
    public function sendMails(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $type = isset($req->type) ? htmlspecialchars($req->input('type')) : '';
            $status_type = isset($req->status_type) ? htmlspecialchars($req->input('status_type')) : '';
            $bulk_cat = isset($req->bulk_cat) ? htmlspecialchars($req->input('bulk_cat')) : '';
            $email_template = isset($req->email_template) ? htmlspecialchars($req->input('email_template')) : '';
            $selected_emails = isset($req->selected_emails) ? $req->input('selected_emails') : [];
            $emails_subject = isset($req->emails_subject) ? htmlspecialchars($req->input('emails_subject')) : '';
            $email_content = isset($req->email_content) ? htmlspecialchars($req->input('email_content')) : '';

            $rules = [
                "type" => "required|numeric|min:1",
                "status_type" => "required",
                "bulk_cat" => "required",
                "email_template" => "required",
                // "selected_emails" => "required|string|min:3",
                "email_content" => "required|string|min:3"
            ];


            $sendemails = [];
            if ($bulk_cat === "1" && isset($type) && !empty($type) && isset($status_type) && !empty($status_type)) {

                if ($type === "1") {
                    $query = DB::table('employers')->select('email');
                    if ($status_type === "2") {
                        $query->where('is_deleted', 'No')->whereNotNull('last_payment_recieved_id');
                    } elseif ($type === "3") {
                        $query->where('is_deleted', 'No')->where('last_payment_recieved_id', Null);
                    } else {
                        $query->where('is_deleted', 'No');
                    }
                } elseif ($type === "2") {
                    $query = DB::table('jobseekers')->select('email');
                    if ($status_type === "2") {
                        $query->where('is_delete', 'No')->where('plan_id', '>', 1);;
                    } elseif ($type === "3") {
                        $query->where('is_delete', 'No')->where('plan_id', '=', 1);
                    } else {
                        $query->where('is_delete', 'No');
                    }
                }

                $sendemails = $query->get();
            } else {
           
                $sendemails = $selected_emails;
            }

            // return $selected_emails;
            $validate = validator::make($req->all(), $rules);

            if (!$validate->fails()) {
                try {

                    // return $sendemails;
                    foreach ($sendemails as $to) {
                        // send($emails_subject, $email_content, 'test@gmail.com');
                        send($emails_subject, $email_content, $to);
                    }
                    echo json_encode([
                        'code' => 200,
                        'message' => 'Successfully Sent',
                    ]);
                } catch (\Exception $th) {
                    // return $th;
                    echo json_encode([
                        'code' => 201,
                        'message' => 'Unable to Sent',
                    ]);
                }
            } else {
                echo json_encode([
                    'code' => 202,
                    'message' => 'Mandatory Fields Missing',
                ]);
            }
        } else {
            echo json_encode([
                'code' => 203, 'message' => 'Something Went Wrong',
            ]);
        }
    }
    
    public function templateContent(Request $req)
    {
        
        if (session()->has('admin_username') || session()->has('emp_username') ) {
            $tempalte_id = isset($req->tempalte_id) ? base64_decode($req->input('tempalte_id')) : '';
            
            if ($tempalte_id != '0') {
                $templateData = DB::table('email_templates')->select('email_subject', 'email_content')->where(['is_deleted' => 'No', 'id' => $tempalte_id])->get();
                echo json_encode([
                    'subject' => $templateData[0]->email_subject, 'containt' => $templateData[0]->email_content, 'code' => 200
                ]);
            } else {
                echo json_encode([
                    'code' => 201
                ]);
            }
        } else {
            echo json_encode([
                'code' => 400
            ]);
        }
    }

    public function fetchMailersList(Request $req)
    {
        if (session()->has('admin_username')) {
            $status_id = isset($req->status_id) ? $req->input('status_id') : '';
            $cat_id = isset($req->cat_id) ? $req->input('cat_id') : '';


            // $query = Employer::crossJoin('jobseekers')->select('employers.email', 'jobseekers.email')->where(['employers.is_deleted' => 'No', 'jobseekers.is_delete' => 'No']);

            if ($cat_id != '' && isset($cat_id)) {
                if (
                    $cat_id === '1'
                ) {
                    $query = Employer::select('email')->where(['is_deleted' => 'No']);
                    if ($status_id === '2') {
                        $query->whereNotNull('last_payment_recieved_id');
                    } elseif ($status_id === '3') {
                        $query->where('last_payment_recieved_id', Null);
                    }
                } elseif ($cat_id === '2') {
                    $query = Jobseeker::select('email')->where(['is_delete' => 'No']);
                    if ($status_id === '2') {
                        $query->where('plan_id', '>', 1);
                    } elseif ($status_id === '3') {
                        $query->where('plan_id', '=', 1);
                    }
                }
                $templateData =  $query->get();
                echo json_encode([
                    'data' => $templateData, 'code' => 200
                ]);
            } else {
                echo json_encode([
                    'code' => 201
                ]);
            }
        } else {
            echo json_encode([
                'code' => 400
            ]);
        }
    }
    public function getEmailTemplate(Request $req)
    {

        if (session()->has('admin_username')) {

            $emailTem = DB::table('email_templates')->where('is_deleted', 'No')->get();
            return view('admin.email-view', compact('emailTem'));
        }
        if(session()->has('emp_username')){
            $id=session()->get('emp_user_id');
            $emailTem = DB::table('email_templates')->where('is_deleted', 'No')->where('added_by',$id)->get();
            
            return view('employer/emp-manage-mail', compact('emailTem'));
        }
    }
    public function editTemplate($temp_id)
    {
        if (session()->has('admin_username') && !empty($temp_id) && isset($temp_id)) {

            $temp_id = base64_decode($temp_id);

            $templData = DB::table('email_templates')->where('id', $temp_id)->where('is_deleted', 'No')->get();


            return view('admin.email-update', compact('templData'));
        }
    }
    public function editPlanModalView(Request $req)
    {
        $plan_id = !empty($req->plan_id) ? base64_decode($req->input('plan_id')) : '';
        if (session()->has('admin_username') && !empty($plan_id) && isset($plan_id)) {

            $templData = DB::table('jobseeker_plan')->where('id', $plan_id)->where('is_deleted', 'No')->get();


            return json_encode(['data' => $templData, 'code' => 200]);
        }
    }

    // Plan 
    public function UpdatePlanTemplate(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $plan_name = isset($req->plan_name) ? htmlspecialchars($req->input('plan_name')) : '';
            $plan_currency = isset($req->plan_currency) ? htmlspecialchars($req->input('plan_currency')) : '';
            $plan_amount = isset($req->plan_amount) ? htmlspecialchars($req->input('plan_amount')) : '';
            $plan_duration = isset($req->plan_duration) ? htmlspecialchars($req->input('plan_duration')) : '';
            $highlight = isset($req->highlight) ? htmlspecialchars($req->input('highlight')) : '';
            $status = $req->status === '1'  ? 'APPROVED' : 'UNAPPROVED';
            $plan_id = isset($req->plan_id) ? base64_decode($req->input('plan_id')) : 0;

            // return $plan_duration;
            $rules = [
                "plan_name" => "required|string|min:3",
                "plan_currency" => "required|string|min:3",
                "plan_amount" => "required",
                "plan_duration" => "required",
                "highlight" => "required",
                "staus" => "required"
            ];
            $validate = validator::make($req->all(), $rules);
            if (!$validate->fails()) {
                try {

                    $data = ['status' => $status, 'plan_name' => $plan_name, 'plan_type' => 'Paid', 'plan_currency' => $plan_currency, 'plan_amount' => $plan_amount, 'plan_duration' => $plan_duration, 'highlight_job_limit' => $highlight];
                    if (isset($plan_id) && is_numeric($plan_id) && $plan_id != 0) {
                        DB::table('jobseeker_plan')->where(['is_deleted' => 'No', 'id' => $plan_id])->update($data);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted', 'modal' => $req->input('plan_id')]);
                    } else {
                        $newData = array_merge($data, ['created_at' => $this->time]);
                        DB::table('jobseeker_plan')->insertGetId($newData);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted', 'modal' => $req->input('plan_id')]);
                    }
                } catch (\Throwable $th) {
                    return $th;
                    echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Mandatory Fields Missing']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }
    public function planDelete(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $userId = is_array($req->userId) ? $req->input('userId') : [];
            $cat = is_array($req->cat) ? $req->input('cat') : [];

            $deleted = 0;
            $table = '';
            $exists = '';
            $where = '';
            foreach ($userId as $id) {

                $emp_id = base64_decode($id);
                if ($cat[0] === "0") {
                    $table = 'employer_plan';
                    $planwhere = ['id' => $emp_id, 'is_deleted' => 'No'];
                } elseif ($cat[0] === "1") {
                    $table = 'jobseeker_plan';
                    $planwhere = ['id' => $emp_id, 'is_deleted' => 'No'];
                }

                $paln_exists = is_exist($table, $planwhere);
                if ($table != '') {
                    if ($paln_exists > 0) {
                        try {

                            DB::table($table)->where('id', $emp_id)->update(['is_deleted' => 'Yes']);
                            $deleted++;
                        } catch (\Throwable $th) {
                            continue;
                        }
                    }
                }
            }

            if ($deleted > 0) {
                echo json_encode(array('code' => 200, 'message' => $deleted . ' Records Successfully Deleted', 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Template is Already Deleted', "icon" => "error"]);
            }
        } else {
            echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
        }
    }
    public function planStatusUpdate(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $form = is_array($req->form) ? $req->input('form') : [];
            $action = isset($req->action) ? $req->input('action') : '';
            $cat = isset($req->cat) ? $req->input('cat') : '';

            // return  $form[1]['value'];
            $status = 0;
            $table = '';
            $exists = '';
            $msg = '';
            $planwhere = '';
            foreach ($form as $id) {

                $plan_id = base64_decode($id['value']);
                if ($cat === "0") {
                    $table = 'employer_plan';
                    $planwhere = ['id' => $plan_id, 'is_deleted' => 'No'];
                } elseif ($cat === "1") {
                    $table = 'jobseeker_plan';
                    $planwhere = ['id' => $plan_id, 'is_deleted' => 'No'];
                }

                $exists = is_exist($table, $planwhere);

                $action_perform = [];
                if ($action === '1') {
                    $msg = 'Approved';
                    $action_perform = [
                        'status' => 'APPROVED',
                    ];
                } elseif ($action === '0') {
                    $msg = 'Reject';
                    $action_perform = [
                        'status' => 'UNAPPROVED',
                    ];
                }

                if ($exists > 0 && is_array($action_perform) && !empty($action_perform)) {
                    try {

                        DB::table($table)->where('id', $plan_id)->update($action_perform);
                        $status++;
                    } catch (\Throwable $th) {

                        continue;
                    }
                }
            }

            if ($status > 0) {
                echo json_encode(array('code' => 200, 'message' => $status . ' Records Successfully ' . $msg, 'icon' => 'success'));
            } else {
                echo json_encode(['code' => 201, 'message' => 'Plan Status is Already Changed', "icon" => "error"]);
            }
        } else {
            echo json_encode(['code' => 201, 'message' => 'Someting Went Wrong', "icon" => "error"]);
        }
    }

    // Employer Plan 
    public function UpdateEmpPlanTemplate(Request $req)
    {
        if ($req->isMethod('POST') && session()->has('admin_username')) {
            $plan_name = isset($req->plan_name) ? htmlspecialchars($req->input('plan_name')) : '';
            $plan_currency = isset($req->plan_currency) ? htmlspecialchars($req->input('plan_currency')) : '';
            $plan_amount = isset($req->plan_amount) ? htmlspecialchars($req->input('plan_amount')) : '';
            $plan_duration = isset($req->plan_duration) ? htmlspecialchars($req->input('plan_duration')) : '';
            $highlight = isset($req->highlight) ? htmlspecialchars($req->input('highlight')) : '';
            $job_post = isset($req->job_post) ? htmlspecialchars($req->input('job_post')) : '';
            $cv_access = isset($req->cv_access) ? htmlspecialchars($req->input('cv_access')) : '';
            $status = $req->status === '1'  ? 'APPROVED' : 'UNAPPROVED';
            $plan_id = isset($req->plan_id) ? base64_decode($req->input('plan_id')) : 0;


            $rules = [
                "plan_name" => "required|string|min:3",
                "plan_currency" => "required|string|min:3",
                "plan_amount" => "required",
                "plan_duration" => "required",
                "highlight" => "required",
                "job_post" => "required",
                "cv_access" => "required",
                "status" => "required"
            ];

            $validate = validator::make($req->all(), $rules);

            if (!$validate->fails()) {
                try {

                    $data = ['status' => $status, 'plan_name' => $plan_name, 'plan_type' => 'Paid', 'plan_currency' => $plan_currency, 'plan_amount' => $plan_amount, 'plan_duration' => $plan_duration, 'job_post_limit' => $job_post, 'cv_access_limit' => $cv_access, 'highlight_job_limit' => $highlight];
                    if (isset($plan_id) && is_numeric($plan_id) && $plan_id != 0) {
                        DB::table('employer_plan')->where(['is_deleted' => 'No', 'id' => $plan_id])->update($data);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted', 'modal' => $req->input('plan_id')]);
                    } else {
                        $newData = array_merge($data, ['created_on' => $this->time]);
                        DB::table('employer_plan')->insertGetId($newData);
                        echo json_encode(['code' => 200, 'message' => 'Successfully Submitted', 'modal' => $req->input('plan_id')]);
                    }
                } catch (\Throwable $th) {
                    return $th;
                    echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
                }
            } else {
                echo json_encode(['code' => 404, 'message' => 'Mandatory Fields Missing']);
            }
        } else {
            echo json_encode(['code' => 404, 'message' => 'Somting Went Wrong']);
            return;
        }
    }
    public function editPlanModalViewEmp(Request $req)
    {
        $plan_id = !empty($req->plan_id) ? base64_decode($req->input('plan_id')) : '';
        if (session()->has('admin_username') && !empty($plan_id) && isset($plan_id)) {

            $templData = DB::table('employer_plan')->where('id', $plan_id)->where('is_deleted', 'No')->get();

            return json_encode(['data' => $templData, 'code' => 200]);
        }
    }



    
}