<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class jobseeker extends Model
{

    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'email_verified',
        'mob_code',
        'mobile',
        'reset_token',
        'password',
        'created_at'
    ];

    public function profileDetails($job_id = '')
    {


        $username =  Session::has('js_username') ? Session::get('js_username') : $job_id;
        $select = [
            'id',
            'fullname',
            'email',
            'mob_code',
            'mobile',
            'curr_salary',
            'role_name',
            'skill',
            'prefered_location',
            'prefered_location_name',
            'total_exp_year',
            'total_exp_month',
            'functional_area',
            'functional_name',
            'proflie_summary',
            'dob',
            'gender',
            'martial_status_name',
            'martial_status',
            'nationality',
            'country_name',
            'country',
            'city_name',
            'city',
            'postal_code',
            'full_address',
            'facebook_link',
            'insta_link',
            'twitter_link',
            'linkedin',
            'expected_salary',
            'industries_name',
            'industry',
            'designaiton',
            'passport_no',
            'pref_job_type_name',
            'pref_indus_name',
            'work_permit',
            'lang_skills',
            'notice_name',
            'is_hadicaped',
            'prefered_job_type',
            'notice_period',
            'prefered_industry',
            'prefered_industry',
            'resume_link',
            'profile_img',
            'expected_salary_name',
            'experiance_name',
            'work_desination_name',
            'work_mode'
        ];
        $query = DB::table('jobseeker_view')->select($select);

        if (isset($job_id) && !empty($job_id)) {
            $query->where('js_id', $job_id);
        } else {
            $query->where('email', $username);
        }

        $jobseekerData =  $query->get();
        return $jobseekerData;
    }
    public function eduDetails($job_id = '')
    {
        $username =  Session::has('js_username') ? Session::get('js_username') : $job_id;
        $select = ['qul_id', 'professional_title', 'specilization', 'passing_year', 'qual_name', 'institute_name'];
        $query = DB::table('jobseeker_view')->select($select);
        if (isset($job_id) && !empty($job_id)) {
            $query->where('js_id', $username);
        } else {
            $query->where('email', $username);
        }
        $jobseekerData =  $query->get();
        return $jobseekerData;
    }

    public function expDetails($job_id = '')
    {
        $username =  Session::has('js_username') ? Session::get('js_username') : $job_id;
        $select = ['company_name', 'annual_salary', 'joining_date', 'ending_date', 'work_industry_id', 'work_industry_name', 'work_desination_id', 'work_desination_name', 'total_exp_year'];
        $query = DB::table('jobseeker_view')->select($select);
        if (isset($job_id) && !empty($job_id)) {
            $query->where('js_id', $username);
        } else {
            $query->where('email', $username);
        }
        $jobseekerData =  $query->get();
        
        return $jobseekerData;
    }
    public function searchJobseeker($curr_date, $req, $filters = '',$page, $perPage)
    {

        $select = [
            'jobseeker_view.js_id',
            'jobseeker_view.fullname',
            'jobseeker_view.email',
            'jobseeker_view.mob_code',
            'jobseeker_view.mobile',
            'jobseeker_view.curr_salary',
            'jobseeker_view.role_name',
            'jobseeker_view.skill',
            'jobseeker_view.email_verified',
            'jobseeker_view.prefered_location',
            'jobseeker_view.prefered_location_name',
            'jobseeker_view.total_exp_year',
            'jobseeker_view.total_exp_month',
            'jobseeker_view.functional_area',
            'jobseeker_view.functional_name',
            'jobseeker_view.proflie_summary',
            'jobseeker_view.dob',
            'jobseeker_view.gender',
            'jobseeker_view.martial_status_name',
            'jobseeker_view.martial_status',
            'jobseeker_view.nationality',
            'jobseeker_view.country_name',
            'jobseeker_view.country',
            'jobseeker_view.city_name',
            'jobseeker_view.city',
            'jobseeker_view.postal_code',
            'jobseeker_view.full_address',
            'jobseeker_view.facebook_link',
            'jobseeker_view.insta_link',
            'jobseeker_view.twitter_link',
            'jobseeker_view.linkedin',
            'jobseeker_view.expected_salary',
            'jobseeker_view.industries_name',
            'jobseeker_view.industry',
            'jobseeker_view.designaiton',
            'jobseeker_view.passport_no',
            'jobseeker_view.pref_job_type_name',
            'jobseeker_view.pref_indus_name',
            'jobseeker_view.work_permit',
            'jobseeker_view.lang_skills',
            'jobseeker_view.notice_name',
            'jobseeker_view.is_hadicaped',
            'jobseeker_view.prefered_job_type',
            'jobseeker_view.notice_period',
            'jobseeker_view.prefered_industry',
            'jobseeker_view.resume_link',
            'jobseeker_view.profile_img',
            'jobseeker_view.expected_salary_name',
            'jobseeker_view.experiance_name',
            'jobseeker_view.work_desination_name',
            'jobseeker_view.company_name',
            'jobseeker_view.updated_at',
            'jobseeker_payments.*', 
        ];
        
        $query = DB::table('jobseeker_view')
            ->select('jobseeker_view.*', 'jobseeker_payments.status','jobseeker_payments.plan_id') 
            ->leftJoin('jobseeker_payments', function ($join) {
                $join->on('jobseeker_view.js_id', '=', 'jobseeker_payments.js_id')
                    ->where('jobseeker_payments.id', '=', function ($subQuery) {
                        $subQuery->from('jobseeker_payments')
                                ->select('id')
                                ->whereColumn('jobseeker_view.js_id', 'jobseeker_payments.js_id')
                                ->orderBy('jobseeker_payments.created_at', 'DESC') 
                                ->limit(1);
                    });
            })

          
            ->where('jobseeker_view.is_delete', 'No') 
            ->where('jobseeker_view.email_verified', 'Yes') 
            ->whereNotNull('jobseeker_view.js_id') 
            ->orderByRaw('jobseeker_payments.status = 3 DESC')  
            ->orderBy('jobseeker_view.updated_at', 'DESC');     
        
           
        if (session()->get('emp_user_id')) {
            $js_username = session()->get('emp_user_id');
            $job_skills = $this->getJobSkills($js_username);                
            if (empty($filters)) {
            if ($job_skills) {                
                $query->where(function ($q) use ($job_skills) {
                    foreach ($job_skills as $skill) {
                        $q->orWhere('skill', 'like', "%{$skill}%");
                    }
                });
            }
             $query->whereNotNull('skill');
        }
        }
    
        // // Main Filters Search Bar
        // if (isset($req->search_skills) && is_array($req->search_skills)) {
        //     $query->where(function ($q) use ($req) {
        //         foreach ($req->search_skills as $searchSkill) {
        //             $q->orWhere('skill_keyword', 'like', '%' . $searchSkill . '%');
        //         }
        //     });
        // } else {
        //     $query->whereNotNull('skill_keyword');
        // }

        // if (isset($req->search_city) && is_array($req->search_city)) {
        //     // $query->where('location_hiring', $search_city);
        //     $query->whereIn(
        //         'location_hiring',
        //         $req->search_city
        //     );
        // } else {
        //     $query->whereNotNull('location_hiring');
        // }

        // if (isset($req->search_job_type) && is_array($req->search_job_type)) {
        //     $query->whereIn('job_type', $req->search_job_type);
        // } else {
        //     $query->whereNotNull('job_type');
        // }

        // // Left Filters


        // Job Type Filter
        if (isset($filters['job_type_fil']) && $filters['job_type_fil'] != 0) {
            $query->whereIn('prefered_job_type', $filters['job_type_fil']);
        } else {
            $query->whereNotNull('prefered_job_type');
        }


        // Educations filter
        if (isset($filters['edu_fil']) &&  $filters['edu_fil'] != 0) {

            $edu_fil[] = $filters['edu_fil'];
            foreach ($edu_fil as $key) {
                $query->whereIn('qul_id', $key);
            }
        } else {
            $query->whereNotNull('qul_id');
        }

        // Notice Period Filter 

        if (isset($filters['notice_fil']) &&  $filters['notice_fil'] != 0) {

            $indus_fil[] = $filters['notice_fil'];
            foreach ($indus_fil as $key) {
                $query->whereIn('notice_period', $key);
            }
        } else {
            $query->whereNotNull('notice_period');
        }
        // Location filter
        if (isset($filters['loc_fil']) && !empty($filters['loc_fil'])) {
            $query->whereIn('prefered_location', $filters['loc_fil']);
        } else {
            $query->whereNotNull('prefered_location');
        }



        // Expriance Filter
        if (isset($filters['exp_fil']) && $filters['exp_fil'] != 0) {
            $query->where('total_exp_year', $filters['exp_fil']);
        } else {
            $query->whereNotNull('total_exp_year');
        }
        // Salary Filter
        if (isset($filters['sal_fil']) && $filters['sal_fil'] != 0) {
            $query->whereIn('expected_salary', $filters['sal_fil']);
        }
        $total=$query->count();
        $offset = ($page - 1) * $perPage;

        return [
            'query' => $query->offset($offset)->limit($perPage)->get(),
            'total'=> $total ];
    
        // return  $query;
    }

    function getJobSkills($js_username) {
        
        $job_posting = DB::table('job_posting_view')->where('posted_by', $js_username)->where('is_deleted','No')->where('approval_status','APPROVED')->get();
      
        $skills = [];
        foreach ($job_posting as $job) {
            $skills = array_merge($skills, explode(',', $job->skill_keyword));
        }       
        return $skills ? array_unique($skills) : null; 
    }
}
