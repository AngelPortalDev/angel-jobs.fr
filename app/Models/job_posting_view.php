<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class job_posting_view extends Model
{
    use HasFactory;
    public $table = 'job_posting_view';

    public function topSearchJobs($curr_date, $req, $filters = '',$page, $perPage)
    {

        $query = DB::table('job_posting_view')->select('id', 'job_title', 'location_hiring', 'job_type_name', 'start_date', 'location_hiring_name', 'country', 'job_salary_to_name', 'profile_img', 'company_name', 'experiance', 'posted_on', 'salary_hide', 'posted_by', 'key_skill_name', 'skill_keyword','status','job_expired_on','work_mode')->where('approval_status', 'APPROVED')->where('status', 'Live')->where('is_deleted', 'No')->whereDate('job_expired_on', '>=', now())->orderBy('posted_on', 'DESC');
      

        if (empty($filters)) {
            if (session()->has('js_username')) {
                $js_data = getData('jobseeker_view', ['id', 'js_id', 'skill'], ['js_id' => session('js_user_id')],);
                if (!empty($js_data[0]->skill)) {                
                    $skills = explode(',', $js_data[0]->skill);
                    $query->where(function ($q) use ($skills) {
                        foreach ($skills as $skill) {
                            $q->orWhereRaw('FIND_IN_SET(?, `skill_keyword`)', [intval($skill)]);
                        }
                    });                    
                }
                
            }
        }
   
        if (isset($req->search_skills) && is_array($req->search_skills)) {
            $query->where(function ($q) use ($req) {
                foreach ($req->search_skills as $searchSkill) {                
                    $q->orWhere('skill_keyword', 'like', '%' . base64_decode($searchSkill) . '%');
                }
            });
        } else {
            $query->whereNotNull('skill_keyword');
        }
        if (isset($req->search_city) && is_array($req->search_city)) {
            // $query->where('location_hiring', $search_city);
            $decodedJobcity = array_map('base64_decode',$req->search_city);
            $query->whereIn('location_hiring', $decodedJobcity);
        } else {
            $query->whereNotNull('location_hiring');
        }
        if (isset($req->search_industry) && is_array($req->search_industry)) {
            
            $decodedJobindustry = array_map('base64_decode',$req->search_industry);
            $query->whereIn('job_industry', $decodedJobindustry);
        } else {
            $query->whereNotNull('job_industry');
        }

        if (isset($req->search_job_type) && is_array($req->search_job_type)) {              
            $decodedJobTypes = array_map('base64_decode',$req->search_job_type);
            $query->whereIn('job_type', $decodedJobTypes);  
        } else {
            $query->whereNotNull('job_type');
        }

        // Left Filters


        // Job Type Filter
        if (isset($filters['job_type_fil']) && $filters['job_type_fil'] != 0) {
            if (is_array($filters['job_type_fil'])) {
                $decodedJobTypes = array_map('base64_decode', $filters['job_type_fil']);
                $query->whereIn('job_type', $decodedJobTypes);
            } else {
                
                $decodedJobTypes = base64_decode($filters['job_type_fil']);
                $query->whereIn('job_type', [$decodedJobTypes]);
            }
        } else {
            $query->whereNotNull('job_type');
        }


        // Educations filter
        if (isset($filters['edu_fil']) &&  $filters['edu_fil'] != 0) {

            $edu_fil[] = $filters['edu_fil'];
            foreach ($edu_fil as $key) {
                $query->whereIn('job_education', $key);
            }
        } else {
            $query->whereNotNull('job_education');
        }

        // Industry Filter 

        if (isset($filters['indus_fil']) &&  $filters['indus_fil'] != 0) {
          
            $indus_fil[] = $filters['indus_fil'];            
            foreach ($indus_fil as $key) {
                $query->whereIn('job_industry', $key);
            }
        } else {
            $query->whereNotNull('job_industry');
        }
        // Location filter
        if (isset($filters['loc_fil']) && !empty($filters['loc_fil'])) {
            $query->whereIn('location_hiring', $filters['loc_fil']);
        } else {
            $query->whereNotNull('location_hiring');
        }

        // designation Filter
        // if (isset($filters['desig_fil']) && $filters['desig_fil'] != 0) {
        //     $query->where('job_designation', $filters['desig_fil']);
        // } else {
        //     $query->whereNotNull('job_designation');
        // }

        // Expriance Filter
        if (isset($filters['exp_fil']) && $filters['exp_fil'] != 0) {
            $query->where('work_experience_from', $filters['exp_fil']);
        } else {
            $query->whereNotNull('work_experience_from');
        }

        // Salary Filter
        if (isset($filters['sal_fil']) && $filters['sal_fil'] != 0) {
            $query->whereIn('job_salary_to', $filters['sal_fil'])->where('salary_hide', 'No');
        }


        // designation Filter
        if (isset($filters['desig_fil']) && $filters['desig_fil'] != 0) {
            $query->whereIn('job_designation', $filters['desig_fil']);
        }
        $total=$query->count();
        $offset = ($page - 1) * $perPage;
       
        //$query->offset($offset)->limit($perPage)->get();
        // dd($query->offset($offset)->limit($perPage)->get());
        return [
            'query' => $query->offset($offset)->limit($perPage)->get(),
            'total'=> $total ];
        // return  $query;
    }
}
