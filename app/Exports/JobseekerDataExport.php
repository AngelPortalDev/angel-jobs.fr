<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\{DB};


class JobseekerDataExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return DB::table('jobseeker_view')->select('js_id as id','fullname', 'profile_img', 'email', 'mob_code', 'mobile', 'role_name', 'experiance_name', 'pref_job_type_name', 'created_at',  'updated_at')->where(['is_delete' => 'No'])->whereNotNull('js_id')->orderByDesc('created_at')->get();
        //return DB::table('job_posting_view')->select('approval_status', 'job_title', 'key_skill_name', 'location_hiring_name', 'no_of_openings', 'job_industry_name', 'functional_name', 'job_designation_name', 'experiance', 'job_salary_to_name', 'salary_hide', 'job_type_name', 'job_education_name', 'contact_person', 'contact_email', 'contact_phone', 'hide_contact_details', 'specialization', 'gender', 'posted_on', 'status', 'job_highlighted', 'start_date', 'job_expired_on', 'fullname', 'email', 'mob_code', 'mobile', 'company_name', 'company_type', 'company_size', 'industry', 'address', 'zip')->where('is_deleted', 'No')->get();
    }
    public function headings(): array
    {
        return ['js_id as id','fullname', 'profile_img', 'email', 'mob_code', 'mobile', 'role_name', 'experiance_name', 'pref_job_type_name', 'created_at',  'updated_at'];
    }
}
