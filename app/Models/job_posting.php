<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class job_posting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'job_title',
        'job_type',
        'job_description',
        'skill_keyword',
        'location_hiring',
        'job_industry',
        'functional_area',
        'job_designation',
        'no_of_openings',
        'work_experience_from',
        'job_salary_to',
        'job_education',
        'salary_hide',
        'posted_by',
        'contact_person',
        'contact_email',
        'contact_phone',
        'hide_contact_details',
        'specialization',
        'experiance',
        'exp_no',
        'gender',
        'posted_on',
        'status',
        'job_expired_on',
        'required_language',
        'start_date',
    ];
    public function jobDetails($table, $select)
    {

        $query = DB::table($table)->select($select)->where('is_deleted', 'No')->orderBy('posted_on', 'DESC');
        if (Session::get('emp_username')) {
            $username =  Session::get('emp_username');
            $postingData =  $query->where('email', $username)->get();
        } else {
            $postingData =  $query->get();
        }
        


        return $postingData;
    }
    public function jobUpdateView($table, $where,$extraFields = [])
    {
        
        $select = ['id', 'job_title', 'job_description', 'no_of_openings','work_mode', 'work_experience_from', 'experiance', 'exp_no',  'salary_hide', 'contact_person', 'contact_email', 'contact_phone', 'hide_contact_details', 'specialization', 'gender', 'posted_by', 'posted_on', 'status', 'job_highlighted', 'job_expired_on', 'required_language', 'start_date',   'location_hiring_name', 'location_hiring', 'job_designation_name', 'job_designation', 'functional_name', 'functional_area', 'job_industry', 'job_industry_name', 'job_type_name', 'job_type', 'key_skill_name', 'required_language_name', 'job_education_name', 'job_education', 'job_salary_to_name', 'job_salary_to', 'mob_code', 'skill_keyword', 'company_name', 'company_type_name', 'address', 'city', 'country', 'zip', 'job_highlighted', 'approval_status','is_deleted'];
        if (!empty($extraFields)) {
            $select = array_merge($select, $extraFields);            
        }
       
        $postingData = DB::table($table)->select($select)->where($where)->where('is_deleted', 'No')->orderBy('posted_on', 'desc')->get();
        return $postingData;
    }
}