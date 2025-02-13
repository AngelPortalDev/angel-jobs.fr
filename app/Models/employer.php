<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Session, DB};

class employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
        'email_verified',
        'mob_code',
        'mobile',
        'company_name',
        'company_type',
        'company_size',
        'about_compnay',
        'pan_no',
        'profile_img',
        'plan_id',
        'plan_start_from',
        'plan_expired_on',
        'left_credit_job_posting_plan',
        'free_assign_job_posting',
        'assign_by',
        'last_payment_recieved_id',
        'last_payment_recieved',
        'last_payment_recieved_on',
        'cv_access_limit',
        'industry',
        'address',
        'country',
        'city',
        'zip',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'instagram',
        'password',
        'reset_token',
        'created_at',
        'updated_at',
    ];

    public function empProfileDetails($emp_id = '')
    {

        $username =  Session::has('emp_username') ? Session::get('emp_username') : '';
        if (!empty($username) && !is_array($username) || !empty($emp_id) && !is_array($emp_id)) {
            $select = ['*'];
         
            $query = DB::table('employer_view')->select($select);
           
            if (isset($emp_id) && !empty($emp_id)) {
                $query->where('id', $username);
            } else {
                $query->where('email', $username);
            }
            $jobseekerData =  $query->get();
          
           
            return $jobseekerData;
        }
    }
}