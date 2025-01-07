<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\{DB};


class EmployerDataExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return DB::table('employer_view')->select('fullname', 'email', 'mob_code', 'mobile', 'company_name', 'company_type_name', 'company_size_name', 'industry_name', 'license_no','pan_no', 'address', 'city_name', 'country_name', 'zip', 'plan_name', 'left_credit_job_posting_plan', 'job_post_limit', 'free_assign_job_posting', 'plan_start_from', 'plan_expired_on', 'last_payment_recieved_on', 'payment_amount', 'pay_method', 'website', 'facebook', 'instagram', 'linkedin', 'profile_img', 'created_at', 'updated_at')->where('is_deleted', 'No')->get();
    }
    public function headings(): array
    {
        return ['Fullname', 'Email', 'Country Code', 'Mobile', 'Company Name', 'Company Type', 'Company Size', 'Industry', 'Address', 'City Name', 'Country Name', 'Zip', 'Plan Name', 'Left Job Posting', 'Free Assign Job Post', 'Plan Stat From', 'Plan Expired On', 'Last Payment Recieved On', 'Amount', 'Pay Method', 'Web Link', 'FB Link', 'Insta Link', 'Linkedin Link', 'Profile Image', 'Registered On', 'Last Update On'];
    }
}
