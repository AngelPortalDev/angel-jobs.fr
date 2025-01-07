<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobseeker_profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'js_id',
        'designaiton',
        'skill',
        'prefered_location',
        'total_exp_year',
        'total_exp_month',
        'curr_salary',
        'expected_salary',
        'industry',
        'functional_area',
        'proflie_summary',
        'dob',
        'gender',
        'martial_status',
        'prefered_job_type',
        'prefered_industry',
        'passport_no',
        'work_permit',
        'resume_name',
        'lang_skills',
        'notice_period',
        'nationality',
        'country',
        'city',
        'postal_code',
        'full_address',
        'facebook_link',
        'insta_link',
        'twitter_link',
        'linkedin'
    ];
}