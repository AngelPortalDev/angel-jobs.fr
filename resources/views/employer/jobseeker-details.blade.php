@extends('layouts.main')
@section('content')

    <style>
        /* .student_profile_icons_insta{
        text-decoration: none;
        color: #f700bd !important;
        background: #fff;
        padding: 2px;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .student_profile_icons_fb{
        text-decoration: none;
        color: #3b5998 !important;
        background: #fff;
        padding: 2px;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .student_profile_icons_twitter{
        text-decoration: none;
        color: #5d8cf3 !important;
        background: #fff;
        padding: 2px;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .student_profile_icons_linkdin{
        text-decoration: none;
        color: #007bb5 !important;
        background: #fff;
        padding: 2px;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    } */
    </style>

    <!-- Content -->
    <div class="page-content">

        <!-- inner page banner -->
        <div class="overlay-black-dark profile-edit p-t30 p-b20"
            style="background-image:url({{ asset('images/jobseeker-profile-bg.jpg') }})">
            <div class="container">
                <div class="row">
                    @php
                        $select = ['id', 'plan_id', 'plan_start_from', 'plan_expired_on'];
                        $plan_details = getData('employers', $select, ['id' => session()->get('emp_user_id')]);

                    @endphp

                    <div class="col-lg-12 candidate-info">
                        <div class="candidate-detail candidate-detail-main-sec">
                            <div class="canditate-des text-center">
                                <a href="javascript:void(0);">
                                    @if (isset($data[0]->profile_img) && !empty($data[0]->profile_img))
                                        <img alt=""
                                            src="{{ Storage::url('jobseeker/profile_image/' . $data[0]->profile_img) }}"
                                            style="height: 100%;">
                                    @else
                                        <img class="imagePreview" src="{{ asset('images/user_profile.png') }}"
                                            style="height: 100px;width: 100px;margin: 1px;object-fit: contain; cursor: auto">
                                    @endif
                                </a>

                            </div>
                            {{-- resume_link --}}
                            @if ($plan_details[0]->plan_id != 1 && $plan_details[0]->plan_expired_on >= date('Y-m-d'))
                                @foreach ($data as $header)
                                    <div class="text-white browse-job text-left">
                                        <h4 class="m-b0">{{ isset($header->fullname) ? $header->fullname : '' }}
                                        </h4>
                                        <p class="m-b15">{{ isset($header->role_name) ? $header->role_name : '' }}</p>
                                        <ul class="clearfix">
                                            <li><i class="ti-location-pin"></i>
                                                {{ isset($header->city) ? $header->city : '' }},
                                                {{ isset($header->country_name) ? $header->country_name : '' }}</li>
                                            <a href="tel:{{ $header->mob_code . $header->mobile }}"
                                                style="text-decoration: none;color:white;">
                                                <li><i class="ti-mobile"></i>
                                                    {{ isset($header->mob_code) ? $header->mob_code : '' }}
                                                    {{ isset($header->mobile) ? $header->mobile : '' }}</li>
                                            </a>
                                            <li><i class="ti-briefcase"></i>
                                                {{ isset($header->experiance_name) ? $header->experiance_name : '' }}</li>
                                            <a href="mailto:{{ $header->email }}"
                                                style="text-decoration: none;color:white;">
                                                <li><i class="ti-email"></i>
                                                    {{ isset($header->email) ? $header->email : '' }}</li>
                                            </a>

                                        </ul>
                                        <div class="m-t20">
                                            <ul class="dez-social-icon dez-social-icon-lg"
                                                style="list-style: none; padding: 0; margin: 0;">


                                                @if (isset($header->resume_link) && !empty($header->resume_link))
                                                    <a href="{{ Storage::url('jobseeker/resume/' . $header->resume_link) }}"
                                                        download="{{ $header->fullname }}_Resume"><button type="button"
                                                            class="btn btn-primary btn-sm rounded-pill"
                                                            style="padding: 7px 15px;">Download Resume</button></a>
                                                @endif
                                                @if (isset($header->facebook_link) && !empty($header->facebook_link))
                                                    <div style="display: inline-block; margin-right: 10px;">
                                                        <a target="_blank" href="{{ $header->facebook_link }}"
                                                            style="text-decoration: none;color:white;"
                                                            class="student_profile_icons_fb"><i
                                                                class="fab fa-facebook-f "></i></a>
                                                    </div>
                                                @endif


                                                @if (isset($header->insta_link) && !empty($header->insta_link))
                                                    <div style="display: inline-block; margin-right: 10px;">
                                                        <a target="_blank" href="{{ $header->insta_link }}"
                                                            style="text-decoration: none;color:white;"
                                                            class=".student_profile_icons_insta"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </div>
                                                @endif

                                                @if (isset($header->linkedin) && !empty($header->linkedin))
                                                    <div style="display: inline-block; margin-right: 10px;">
                                                        <a target="_blank" href="{{ $header->linkedin }}"
                                                            style="text-decoration: none;color:white;"
                                                            class="student_profile_icons_linkdin"><i
                                                                class="fab fa-linkedin-in "></i></a>
                                                    </div>
                                                @endif

                                                @if (isset($header->twitter_link) && !empty($header->twitter_link))
                                                    <div style="display: inline-block; margin-right: 10px;">
                                                        <a target="_blank" href="{{ $header->twitter_link }}"
                                                            style="text-decoration: none;color:white;"
                                                            class="student_profile_icons_twitter"><i
                                                                class="fab fa-twitter"></i></a>
                                                    </div>
                                                @endif
                                                {{-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
											
											<a class="a2a_button_whatsapp"></a> --}}
                                                {{-- <a class="a2a_button_telegram"></a> --}}
                                                {{-- <script async src="https://static.addtoany.com/menu/page.js"></script>
											</div> --}}
                                            </ul>
                                        </div>
									</div>
                                @endforeach
                            @else

							@foreach ($data as $header)
							<div class="text-white browse-job text-left">
								<h4 class="m-b0">{{ isset($header->fullname) ? $header->fullname : '' }}
								</h4>
								<p class="m-b15">{{ isset($header->role_name) ? $header->role_name : '' }}</p>
								<ul class="clearfix">
									<li><i class="ti-location-pin"></i>
										{{ isset($header->city) ? $header->city : '' }},
										{{ isset($header->country_name) ? $header->country_name : '' }}</li>
									<a style="text-decoration: none;color:white;">
										<li><i class="ti-mobile"></i>
											{{ isset($header->mob_code) ? $header->mob_code : '' }}
											XXXXXX</li>
									</a>
									<li><i class="ti-briefcase"></i>
										{{ isset($header->experiance_name) ? $header->experiance_name : '' }}</li>
									<a style="text-decoration: none;color:white;">
										<li><i class="ti-email"></i>
											XXXXXXX.com</li>
									</a>

								</ul>
								<div class="m-t20">
									<ul class="dez-social-icon dez-social-icon-lg"
										style="list-style: none; padding: 0; margin: 0;">


										{{-- @if (isset($header->resume_link) && !empty($header->resume_link))
											<a href="{{ Storage::url('jobseeker/resume/' . $header->resume_link) }}"
												download="{{ $header->fullname }}_Resume"><button type="button"
													class="btn btn-primary btn-sm rounded-pill"
													style="padding: 7px 15px;">Download Resume</button></a>
										@endif --}}
										@if (isset($header->facebook_link) && !empty($header->facebook_link))
											<div style="display: inline-block; margin-right: 10px;">
												<a style="text-decoration: none;color:white;"
													class="student_profile_icons_fb"><i
														class="fab fa-facebook-f "></i></a>
											</div>
										@endif


										@if (isset($header->insta_link) && !empty($header->insta_link))
											<div style="display: inline-block; margin-right: 10px;">
												<a style="text-decoration: none;color:white;"
													class=".student_profile_icons_insta"><i
														class="fab fa-instagram"></i></a>
											</div>
										@endif

										@if (isset($header->linkedin) && !empty($header->linkedin))
											<div style="display: inline-block; margin-right: 10px;">
												<a style="text-decoration: none;color:white;"
													class="student_profile_icons_linkdin"><i
														class="fab fa-linkedin-in "></i></a>
											</div>
										@endif

										@if (isset($header->twitter_link) && !empty($header->twitter_link))
											<div style="display: inline-block; margin-right: 10px;">
												<a style="text-decoration: none;color:white;"
													class="student_profile_icons_twitter"><i
														class="fab fa-twitter"></i></a>
											</div>
										@endif
										{{-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
									
									<a class="a2a_button_whatsapp"></a> --}}
										{{-- <a class="a2a_button_telegram"></a> --}}
										{{-- <script async src="https://static.addtoany.com/menu/page.js"></script>
									</div> --}}
									</ul>
								</div>
							</div>
						@endforeach
                            @endif

                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Browse Jobs -->
        <div class="section-full browse-job py-5 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 m-b30">
                        <div class="sticky-top bg-white">
                            <div class="candidate-info onepage">
                                <ul>
                                    <li><a class="scroll-bar nav-link active basic">
                                            <span>Basic Information</span></a></li>

                                    <li><a class="scroll-bar nav-link education">
                                            <span>Education</span></a></li>

                                    <li><a class="scroll-bar nav-link experience">
                                            <span>Experience</span></a></li>

                                    <li><a class="scroll-bar nav-link profile-summary">
                                            <span>Profile Summary</span></a></li>

                                    <li><a class="scroll-bar nav-link personal_details">
                                            <span>Personal Details</span></a></li>


                                    {{-- <li><a class="scroll-bar nav-link" href="#resume">
											<span>Resume</span></a></li> --}}


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

                        <div id="basic-information" class="job-bx m-b30 basics">
                            <div class="d-flex">
                                <h5 class="m-b30">Basic Information</h5>
                            </div>


                            <!-- Details -->
                            <div class="row">
                                @if (count($data) != 0)
                                    @foreach ($data as $basic)
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Industry</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($basic->pref_indus_name) ? $basic->pref_indus_name : '' }}</span>
                                            </div>

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Job Type</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($basic->pref_job_type_name) ? $basic->pref_job_type_name : '' }}</span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Availability to Join</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($basic->notice_name) ? $basic->notice_name : '' }}</span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Preferred Location</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($basic->prefered_location_name) ? $basic->prefered_location_name : 'Not Disclosed' }}</span>
                                            </div>
                                           @if (isset($basic->work_mode) && !empty($basic->work_mode))
                                           @php
                                           $workmode=explode(',',$basic->work_mode);
                                           $workModeText = '';
                                           foreach ($workmode as $index => $mode) {
                                               switch ($mode) {
                                                   case '1':
                                                       $workModeText .= 'Remote ';  
                                                       break;
                                                   case '2':
                                                       $workModeText .= 'WFO ';    
                                                       break;
                                                   case '3':
                                                       $workModeText .= 'Hybrid '; 
                                                       break;
                                                   default:
                                                       $workModeText .= ''; 
                                               }
                                               if ($index < count($workmode) - 1) {
                                                   $workModeText .= ', ';
                                               }
                                           }                              
                                           $workModeText = trim($workModeText);
                                          
                                           @endphp
                                           <div class="clearfix m-b20">
                                            <label class="m-b0">Preferred Location</label>
                                            <span
                                                class="clearfix font-13">{{ $workModeText }}</span>
                                            </div>
                                               
                                           @endif
                                            
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Functional Area</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($basic->functional_name) ? $basic->functional_name : '' }}</span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Key Skills</label>
                                                @php

                                                    $skill_keyword = explode(',', $basic->skill);
                                                    $skill_arr = multiSelectDropdown(
                                                        'key_skills',
                                                        ['key_skill_name', 'id'],
                                                        $skill_keyword,
                                                    );

                                                @endphp
                                                <span class="clearfix font-13">
                                                    @if (!empty($skill_arr))
                                                        @foreach ($skill_arr as $index => $skills)
                                                        {{ $skills[0]->key_skill_name }}
                                                        @if ($index < count($skill_arr) - 1),@endif
                                                        @endforeach
                                                    @else
                                                        No Skills Mention
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Expected Salary  (Monthly)</label>
                                                <span
                                                    class="clearfix font-13">{{ !empty($basic->expected_salary_name) ? $basic->expected_salary_name : '' }}</span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0"> Known Languages</label>
                                                @php
                                                    $skill_lang = explode(',', $basic->lang_skills);
                                                    $lang_arr = multiSelectDropdown(
                                                        'languages',
                                                        ['skill_language', 'id'],
                                                        $skill_lang,
                                                    );
                                                @endphp
                                                <span class="clearfix font-13">
                                                    @if (!empty($skill_lang))
                                                        @foreach ($lang_arr as $index => $skills)
                                                            @if (!empty($skills[0]->skill_language))
                                                                {{ $skills[0]->skill_language }}
                                                                @if ($index < count($lang_arr) - 1),@endif
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        No Languages Mention
                                                    @endif
                                                </span>
                                            </div>
                                            {{-- <div class="clearfix m-b20">
											<label class="m-b0">Desired Industry</label>
											<span class="clearfix font-13">{{$basic->industries_name}}***</span>
										</div> --}}
                                        </div>
                                    @endforeach
                                @else
                                    <h5> Basic Details are not Provided </h5>
                                @endif
                            </div>
                            <!-- Details End -->
                        </div>

                        <div id="education" class="job-bx m-b30 d-none educations">
                            @if (count($jsEdu) != 0)
                                @foreach ($jsEdu as $educ)
                                    <div class="d-flex">
                                        <h5 class="m-b15">Education</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="clearfix m-b20 ">
                                                <span class="clearfix font-14" style="line-height: 24px"><b>Qualificaton
                                                        :</b>{{ isset($educ->qual_name) ? $educ->qual_name : 'Not Disclosed' }}</span>
                                                <span class="clearfix font-14"
                                                    style="line-height: 24px"><b>Institute/University :</b>
                                                    @if (!empty($educ->institute_name))
                                                        {{ $educ->institute_name }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                                <span class="clearfix font-14" style="line-height: 24px"><b>Specialization
                                                        :</b>
                                                    @if (!empty($educ->specilization))
                                                        {{ $educ->specilization }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                                <span class="clearfix font-14" style="line-height: 24px"><b>Passing Year
                                                        :</b>{{ isset($educ->passing_year) ? $educ->passing_year : 'Not Disclosed' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5> Educational Details are not Provided
                            @endif
                        </div>

                        <div id="experience" class="job-bx m-b30 d-none experiences">
                            <div class="d-flex">
                                <h5 class="m-b15">Experience</h5>
                            </div>
                            @if (isset($jsExp[0]->total_exp_year) && $jsExp[0]->total_exp_year != 1)
                                @if (count($jsExp) != 0)
                                    @foreach ($jsExp as $exp)
                                        <h6 class="font-14 m-b0">
                                            {{ isset($exp->work_industry_name) ? $exp->work_industry_name : '' }}</h6>
                                        <p class="m-b0"><b>Company Name</b>
                                            @if (!empty($exp->company_name))
                                                {{ $exp->company_name }}
                                            @else
                                                : {{ 'Not Disclosed' }}
                                            @endif
                                        </p>
                                        <p class="m-b0"><b>Joining Date :</b>
                                            {{ isset($exp->joining_date) ? $exp->joining_date : 'Not Disclosed' }}</p>
                                        <p class="m-b0"><b>End Date :</b>
                                            {{ isset($exp->ending_date) ? $exp->ending_date : 'Not Disclosed' }}</p>
                                        <p class="m-b0"><b>Designation
                                                :</b>{{ isset($exp->work_desination_name) ? $exp->work_desination_name : 'Not Disclosed' }}
                                        </p>
                                    @endforeach
                                @endif
                            @else
                                <h5> Fresher </h5>
                            @endif
                        </div>

                        <div id="profile-summary" class="job-bx m-b30 d-none profiles">

                            @if (isset($data) && count($data) != 0)
                                @foreach ($data as $profilesum)
                                    <div class="d-flex">
                                        <h5 class="m-b15">Profile Summary</h5>
                                    </div>
                                    <p class="m-b0">
                                        @if (!empty($profilesum->proflie_summary))
                                            {!! htmlspecialchars_decode($profilesum->proflie_summary) !!}
                                        @else
                                            {{ 'Not Disclosed' }}
                                        @endif
                                    </p>
                                @endforeach
                            @else
                                <h5> Profile Summary Not Provided</h5>
                            @endif
                        </div>
                        <div id="personal_details" class="job-bx m-b30 d-none personal_detailss">


                            <!-- Details -->
                            <div class="row">
                                @if (isset($data) && count($data) != 0)
                                    @foreach ($data as $personal)
                                        <div class="d-flex">
                                            <h5 class="m-b30">Personal Details</h5>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Date of Birth</label>
                                                <span class="clearfix font-13">
                                                    @if (!empty($personal->dob))
                                                        {{ $personal->dob }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Gender</label>
                                                <span class="clearfix font-13">
                                                    @if (!empty($personal->gender))
                                                        {{ $personal->gender }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Marital Status</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($personal->martial_status_name) ? $personal->martial_status_name : 'Not Disclosed' }}</span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Passport Number</label>
                                                <span class="clearfix font-13">
                                                    @if (!empty($personal->passport_no))
                                                        {{ $personal->passport_no }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                            </div>


                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Permanent Address</label>
                                                <span class="clearfix font-13">
                                                    @if (!empty($personal->full_address))
                                                        {{ $personal->full_address }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Postal Code</label>
                                                <span class="clearfix font-13">
                                                    @if (!empty($personal->postal_code))
                                                        {{ $personal->postal_code }}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="clearfix m-b20">
                                                <label class="m-b0">Work permit of other country</label>
                                                <span
                                                    class="clearfix font-13">{{ isset($personal->work_permit) ? $personal->work_permit : 'Not Disclosed' }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h5> Personal Details Not Provided</h5>
                                @endif
                            </div>
                            <!-- Details End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Browse Jobs END -->
    </div>
    </div>
    <!-- Content END-->

    <!-- Import footer  -->
@endsection()
