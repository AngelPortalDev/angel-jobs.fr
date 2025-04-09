<?php

namespace App\Exports;

use App\Models\job_posting_view as JobPosting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\{DB};

class JobPostingExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return JobPosting::select('approval_status', 'job_title', 'key_skill_name', 'location_hiring_name', 'no_of_openings', 'job_industry_name', 'functional_name', 'job_designation_name', 'experiance', 'job_salary_to_name', 'salary_hide', 'job_type_name', 'job_education_name', 'contact_person', 'contact_email', 'contact_phone', 'hide_contact_details', 'specialization', 'gender', 'posted_on', 'status', 'job_highlighted', 'start_date', 'job_expired_on', 'fullname', 'email', 'mob_code', 'mobile', 'company_name', 'company_type', 'company_size', 'industry', 'address', 'zip')
            ->where('is_deleted', 'No')
            ->cursor(); 
    }

    public function headings(): array
    {
        return ['Approval Status', 'Job Title', 'Key Skills', 'Hiring Location', 'No. of Openings', 'Job Industry', 'Functional Area Name', 'Job Designation', 'Experience', 'Monthly Salary', 'Salary Hide', 'Job Type', 'Qualification Required', 'Contact Person', 'Contact Email', 'Contact No.', 'Details Hide from JS', 'Specialization', 'Gender', 'Posted On', 'Status', 'Job Highlighted', 'Start Date', 'Job Expired on', 'Full Name', 'Email', 'Country Code', 'Mobile', 'Company Name', 'Company Type', 'Company Size', 'Industry', 'Address', 'Zip'];
    }
}
