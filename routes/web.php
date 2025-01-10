<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Employer\employerProfile,
    Jobseeker\jobSeekerProfile,
    adminControllers\adminCommonController as AdminCommon,
    adminControllers\Employer\adminEmployerController,
    adminControllers\Jobseeker\adminJsController,
};
use App\Http\Controllers\{
    loginController,
    mailController,
    JobPostingController,
    commonController
};



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::view('contact-us', 'contact')->name('contact');
Route::view('about-us', 'about-us')->name('about');
Route::view('terms-and-conditions', 'terms-and-conditions')->name('terms-and-conditions');
Route::view('privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('faqs-jobseeker', 'faqs-jobseeker')->name('faqs-jobseeker');
Route::view('faqs-employer', 'faqs-employer')->name('faqs-employer');
Route::view('grievance-form', 'grievance-form')->name('grievance-form');
Route::view('security-center', 'security-center')->name('security-center');
Route::view('employer-plans', 'employer-plans')->name('employer-plans');
Route::view('jobseeker-plans', 'jobseeker-plans')->name('jobseeker-plans');
Route::view('employer-home', 'index-employer')->name('employer-home');
Route::view('reset-password-1', 'reset-password-1')->name('reset-password-1');
Route::view('reset-password-2', 'reset-password-2')->name('reset-password-2');
Route::view('verified-mail', 'verified-mail')->name('verified-mail');
Route::view('not-found', 'not-found');
Route::view('thank-you', 'thank-you')->name('thank-you');
Route::view('invoice', 'invoice')->name('invoice');


Route::view('registration', 'frontend/emails/registration')->name('registration');
Route::view('login', 'frontend/emails/login')->name('login');
Route::view('emp-registration', 'frontend/emails/emp-registration')->name('emp-registration');
Route::view('password-changed', 'frontend/emails/password-changed')->name('password-changed');
Route::view('emp-login', 'frontend/emails/emp-login')->name('emp-login');
Route::view('forgot-password', 'frontend/emails/forgot-password')->name('forgot-password');
Route::view('emp-job-post', 'frontend/emails/emp-job-post')->name('emp-job-post');
Route::view('profile-sortlisted', 'frontend/emails/profile-sortlisted')->name('profile-sortlisted');
Route::view('plan-expired', 'frontend/emails/plan-expired')->name('plan-expired');
Route::view('expiring-soon', 'frontend/emails/expiring-soon')->name('expiring-soon');
Route::view('job-post-approval', 'frontend/emails/job-post-approval')->name('job-post-approval');


Route::view('jobseeker-company-details', 'jobseeker-company-details')->name('jobseeker-company-details');

Route::view('jobseeker-profile', 'jobseeker-profile')->name('js-profile');
Route::view('jobseeker-education', 'jobseeker-education')->name('js-education');
Route::view('jobseeker-experience', 'jobseeker-experience')->name('js-experience');
Route::view('jobseeker-applied-jobs', 'jobseeker-applied-jobs')->name('js-applied-jobs');
Route::view('jobseeker-saved-jobs', 'jobseeker-saved-jobs')->name('js-saved-jobs');
Route::view('jobseeker-resume', 'jobseeker-resume')->name('js-resume');
Route::view('browse-all-jobs', 'browse-all-jobs')->name('browse-jobs');
Route::view('jobs-by-locations', 'jobs-by-locations')->name('jobs-locations');




// Guest Users Routes
Route::middleware(['guest'])->group(function () {
    Route::view('login-employer', 'login-employer')->name('emp_login');
    Route::post('employer-Signup', [loginController::class, 'employerSignup'])->name('company-profile');
    Route::post('employer-Login', [loginController::class, 'employerLogin']);
    // Jobseeker Login & Signup
    Route::view('login-jobseeker', 'login-jobseeker')->name('js_login');
    Route::post('jobseeker-Signup', [loginController::class, 'jobseekerSignup']);
    Route::post('jobseeker-login', [loginController::class, 'jobseekerLogin']);
    Route::get('emp-mail-exist/{email}',[loginController::class, 'employerEmailExist']);
    Route::post('emp-mobile-exist',[loginController::class, 'employerMobExist']);
    Route::get('js-mail-exist/{email}',[loginController::class, 'jobseekerEmailExist']);
    Route::post('js-mobile-exist',[loginController::class, 'jobseekerMobExist']
    );
});



//   Employer Middelware Routes
Route::group(['prefix' => 'employer', 'middleware' => 'EmpAuth'], function () {
    Route::get('get-employer-profile', [employerProfile::class, 'getEmpProfile'])->name('company-profile');
    Route::post('addemp-profiledata', [employerProfile::class, 'addEmpProfile']);
    Route::post('add-profile-image', [commonController::class, 'profilImageUpload']);
    Route::get('emp-post-a-job', [JobPostingController::class, 'postJobs'])->name('post-job');
    Route::post('add-jobs-post', [JobPostingController::class, 'addJobPost']);  
    Route::post('emp-job-inactiveJob', [JobPostingController::class, 'inactiveJob']);
    Route::get('emp-manage-job', [JobPostingController::class, 'manageJobs'])->name('manage-job');
    Route::get('emp-applied-jobseeker/{job_id?}', [employerProfile::class, 'jobApplications'])->name('applied-jobseeker');
    Route::get('emp-shortlisted-jobseeker', [employerProfile::class, 'shortlisted'])->name('shortlisted-jobseeker');
    Route::get('emp-browse-jobseeker', [employerProfile::class, 'getJobseekers'])->name('browse-jobseeker');
    Route::get('job-details-update/{enc_id}', [JobPostingController::class, 'updateViewJob'])->name('job-update');
    Route::post('emp-job-delete', [JobPostingController::class, 'deleteJob'])->name('job-delete');
    Route::post('emp-job-shortlist', [JobPostingController::class, 'applied_shortlist']);
    Route::get('emp-jobseeker-view/{job_id}', [employerProfile::class, 'empJobseekerVeiw'])->name('emp-js-view');
    Route::get('buy-now/{plan_id}/{amount}', [commonController::class, 'buy_plan'])->name('emp_buy_plan');
    Route::get('emp-transactions', [employerProfile::class, 'empPaymentsData'])->name('emp-trans');
    Route::view('employer-change-password', 'employer/emp-change-password')->name('emp-change-password');
    Route::get('emp-logout', [loginController::class, 'logout'])->name('logout');
    Route::view('emp-create-mail', 'employer/emp-create-mail');
    Route::view('emp-send-mail', 'employer/emp-send-mail');
    Route::view('emp-manage-mail', 'employer/emp-manage-mail')->name('manage-mails');
    Route::get('receipt/{id}', [jobSeekerProfile::class,'downloadInvoice'])->name('receiptemp');
    Route::view('add-email-template', 'employer/add-email-template')->name('add-email-template');
    //Route::post('add-email-template',[AdminCommon::class, 'addEmailTemplate'])->name('emp-add-template');
 
});
Route::post('payment', [commonController::class,'payment'])->name('payment');
Route::post('process_callback/{order_id}/{session}', [commonController::class, 'processCallback']);
Route::get('/payment_response/{order_id}/{plantable}', [commonController::class, 'paymentResponse'])->name('payment.response');
// Jobseeker Middelware Routes
Route::group(['prefix' => 'jobseeker', 'middleware' => 'jobSeekerAuth'], function () {
    Route::get('jobseeker-profile', [jobSeekerProfile::class, 'getjsProfileView'])->name('js-profile');
    Route::get('jobseeker-education', [jobSeekerProfile::class, 'getjseEduView'])->name('js-education');
    Route::get('jobseeker-experience', [jobSeekerProfile::class, 'getjseExpView'])->name('js-experience');
    Route::post('add-js-profiledata', [jobSeekerProfile::class, 'addJsProfile']);
    Route::post('add-js-education', [jobSeekerProfile::class, 'addJsEdu']);
    Route::post('add-js-experiance', [jobSeekerProfile::class, 'addJsExp']);
    Route::post('job-action', [JobPostingController::class, 'jobAction']);
    Route::get('buy-now/{plan}', [commonController::class, 'buy_plan'])->name('js_buy_plan');
    Route::get('jobseeker-applied-jobs', [jobSeekerProfile::class, 'appliedJobs'])->name('js-applied-jobs');
    Route::get('jobseeker-saved-jobs', [jobSeekerProfile::class, 'savedJobs'])->name('js-saved-jobs');
    Route::view('jobseeker-change-password', 'jobseeker/jobseeker-change-password')->name('js-change-password');    
    Route::post('add-profile-image', [commonController::class, 'profilImageUpload']);
    Route::get('buy-now/{plan_id}/{amount}', [commonController::class, 'buy_plan'])->name('js_buy_plan');
    Route::get('jobseeker-transactions', [jobSeekerProfile::class, 'jsPaymentsData'])->name('js-transactions');
    Route::get('receipt/{id}', [jobSeekerProfile::class,'downloadInvoice'])->name('receipt');

});
// Logout
Route::get('logout', [loginController::class, 'logout'])->name('logout');
Route::post('pass-change', [loginController::class, 'changePassword']);

// js & Emp Common Route
Route::get('verfiy-mail/{cat}/{id}', [loginController::class, 'verifyMail']);
Route::post('verfiy-resend', [loginController::class, 'emailVerifyLinkResend']);


// Reset Passwords
Route::post('reset-password-link', [loginController::class, 'resetPassLinkSend']);
Route::get('reset-password-form/{cat}/{email}/{token}', [loginController::class, 'resetpasswordForm']);
Route::post('reset-password', [loginController::class, 'resetPassword'])->name('reset-password');

// Filters Routeemp-details-view

Route::get('top-search-bar', [commonController::class, 'searchJobs']);
Route::post('filter_list', [commonController::class, 'filter_list']);

// Job Details Page
Route::get('job-details-view/{enc_id}', [JobPostingController::class, 'jobDetailsView']);
Route::get('emp-details-view/{id}', [employerProfile::class, 'empDetailsView']);




// Contact us Mail Enquiry
Route::post('mailEnqiry', [mailController::class, 'mailEnqiry']);
Route::post('newLetter', [commonController::class, 'newLetter']);
Route::post('grivance', [commonController::class, 'grivance']);



// Admin Section Routes Start
Route::view('admin-login', 'admin.auth-login');
Route::post('admin-user-login', [loginController::class, 'adminLogin']);
Route::view('company-size', 'admin.company-size');



Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'], function () {
    // Admin Common Contoller
    // Route::view('admin-dashboard', 'admin.index')->name('admin-dashboard');
    Route::get('admin-dashboard', [AdminCommon::class, 'index'])->name('admin-dashboard');


    // New Seo & Pages Add
    Route::get('admin-seo-page', [AdminCommon::class, 'seoPageList'])->name('admin-seo-page');
    Route::get('admin-site-setting',[AdminCommon::class, 'siteConfig'])->name('admin-site-setting');
    Route::view('seo-page-edit', 'admin.seo-page-edit')->name('seo-page-edit');
    Route::get('seo-page-update/{id}', [AdminCommon::class, 'seoPageUpdateView'])->name('seo-page-update');
    Route::get('seo-page-view/{id}',[AdminCommon::class, 'seoPageView'])->name('seo-page-view');
    Route::post('update-seo-page',[AdminCommon::class, 'updateSeoPage']);

    Route::post('page-delete',[AdminCommon::class, 'pageDelete']);
    Route::get('page-export',[AdminCommon::class, 'pageDataExports'])->name('page-export');
    Route::post('update-site-config',[AdminCommon::class, 'updateSiteConfig']);


    Route::view('admin-country', 'admin.country')->name('admin-country');
    Route::view('admin-state', 'admin.state')->name('admin-state');
    Route::view('admin-city', 'admin.city')->name('admin-city');
    Route::view('admin-marital-status', 'admin.marital-status')->name('admin-marital-status');
    Route::view('admin-education-qualification', 'admin.education-qualification')->name('admin-education-qualification');
    Route::view('admin-designation', 'admin.designation')->name('admin-designation');
    Route::view('admin-skills', 'admin.skills')->name('admin-skills');
    Route::view('admin-languages', 'admin.languages')->name('admin-languages');
    Route::view('admin-job-type', 'admin.job-type')->name('admin-job-type');
    Route::view('admin-notice-period', 'admin.notice-period')->name('admin-notice-period');
    Route::view('admin-functional-area', 'admin.functional-area')->name('admin-functional-area');
    Route::view('admin-total-experience-year', 'admin.total-experience-year')->name('admin-total-experience-year');
    Route::view('admin-industries', 'admin.industries')->name('admin-industries');
    Route::view('admin-gender', 'admin.gender')->name('admin-gender');
    Route::view('admin-company-type', 'admin.company-type')->name('admin-company-type');
    Route::view('admin-company-size', 'admin.company-size')->name('admin-company-size');
    Route::view('admin-experience', 'admin.experience')->name('admin-experience');
    Route::view('admin-salary-range', 'admin.salary-range')->name('admin-salary-range');

    Route::post('get-element-list', [AdminCommon::class, 'getElementList'])->name('get-element');
    Route::post('update-elements', [AdminCommon::class, 'updateElement']);
    Route::post('element-modal-view', [AdminCommon::class, 'editelementModalView'])->name('edit-get-element');
    Route::post('element-status-update', [AdminCommon::class, 'elementStatusUpdate'])->name('status-update-element');
    // Employer Section 

    Route::view('post-a-job','admin.post-a-job')->name('admin-post-job');
    Route::view('email-send','admin.email-send')->name('email-send');
    // Employer Controllers Admin
    Route::get('get-employer-data', [adminEmployerController::class, 'getEmpProfile'])->name('get-emp-datalist');
    Route::get('employer-view/{emp_id}', [adminEmployerController::class, 'empProfileView'])->name('get-emp-view');
    Route::get('employer-edit-view/{emp_id}', [adminEmployerController::class, 'empProfileditView'])->name('get-emp-edit-view');
    Route::post('employer-add', [adminEmployerController::class, 'addEmployer']);
    Route::post('employer-edit', [adminEmployerController::class, 'empProfiledit']);
    Route::post('employer-delete', [adminEmployerController::class, 'empProfildelete']);
    Route::post('employer-plan-check', [adminEmployerController::class, 'planDetails']);
    Route::post('employer-plan-assign', [adminEmployerController::class, 'empPlanAssign']);
    Route::get('admin-emp-export',[adminEmployerController::class, 'empExports'])->name('emp-export');
    // Job Listing
    Route::get('job-posting-list',[JobPostingController::class, 'manageJobs'])->name('get-job-listing');
    Route::post('admin-jobs-post',[JobPostingController::class, 'addJobPost']);
    Route::get('admin-job-details-update/{enc_id}',[JobPostingController::class, 'updateViewJob'])->name('admin-job-update');
    Route::get('admin-job-details-view/{enc_id}', [JobPostingController::class, 'adminViewJob'])->name('admin-job-view');
    Route::post('admin-jobs-action',[JobPostingController::class, 'adminJobsAction']);
    Route::get('admin-jobs-export',[adminEmployerController::class, 'empExports'])->name('jobs-export');

    
    // Js Controller Admin
    Route::get('get-jobseeker-data',[adminJsController::class, 'getJsProfile'])->name('get-js-datalist');
    Route::get('jobseeker-view/{js_id}', [adminJsController::class, 'jsProfileView'])->name('get-js-view');
    Route::get('jobseeker-edit-view/{js_id}', [adminJsController::class,'jsProfileditView'])->name('get-js-edit-view');
    Route::post('jobseeker-add', [adminJsController::class, 'addjobseeker']);
    Route::post('jobseeker-edit', [adminJsController::class, 'updateJsProfile']);

    Route::post('jobseeker-delete',[adminJsController::class, 'jsProfildelete']);
    Route::post('jobseeker-plan-check', [adminJsController::class, 'planDetails']);
    Route::post('jobseeker-plan-assign', [adminJsController::class, 'jsPlanAssign']);
    Route::get('admin-js-export', [adminJsController::class, 'jsExports'])->name('js-export');


    // Email Template

    Route::get('email-view', [AdminCommon::class, 'getEmailTemplate'])->name('email-view');

    Route::view('email-edit', 'admin.email-edit')->name('email-edit');
    Route::get('jobseeker-edit-view/{js_id}', [
        adminJsController::class, 'jsProfileditView'
    ])->name('get-js-edit-view');
    Route::get('email-edit-view/{temp_id}', [AdminCommon::class, 'editTemplate'])->name('edit-template-view');
    Route::post(
        'update-email-template',
        [AdminCommon::class, 'updateEmailTemplate']
    )->name('update-template');

    Route::post('add-email-template',[AdminCommon::class, 'addEmailTemplate'])->name('add-template');
    Route::post('email-temp-delete',[AdminCommon::class, 'emailTemplDelete']);
    Route::post('template-content',[AdminCommon::class, 'templateContent']);
    Route::post('fetch-mailers-list', [AdminCommon::class, 'fetchMailersList']);
    Route::post('send-mails', [AdminCommon::class, 'sendMails']);


    //  Member Plans Controller
    Route::view(
        'jobseeker-plan-list',
        [AdminCommon::class, 'getEmailTemplate']
    )->name('jobseeker-plan-list');
    Route::get(
        'jobseeker-plan-list',
        [adminJsController::class, 'getJsPlans']
    )->name('jobseeker-plan-list');
    Route::post(
        'plan-modal-view',
        [AdminCommon::class, 'editPlanModalView']
    );
    Route::post(
        'update-plan-template',
        [AdminCommon::class, 'updatePlanTemplate']
    );
    Route::post(
        'plan-delete',
        [AdminCommon::class, 'planDelete']
    );
    Route::post(
        'plan-status-update',
        [AdminCommon::class, 'planStatusUpdate']
    );

    // Plan Employer
    Route::get(
        'emplpoyer-plan-list',
        [
            adminEmployerController::class, 'getEmpPlans'
        ]
    )->name('employer-plan-list');
    Route::post(
        'update-emp-plan-template',
        [AdminCommon::class, 'UpdateEmpPlanTemplate']
    );
    Route::post(
        'emp-plan-modal-view',
        [AdminCommon::class, 'editPlanModalViewEmp']
    );
});
Route::get('admin-logout', [AdminCommon::class, 'logout'])->name('admin-logout');