@extends('layouts.main')
@section('content')

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->



            @foreach ($jobData as $job)
                <div class="section-full content-inner-1 mb-4">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="job-info-box ">

                                    <div class="job-details-top p-4">
                                        <h3 class=" font-weight-700 title-head jd-job-name">
                                            {!! htmlspecialchars_decode($job->job_title) !!}</h3>
                                        <div class="jd-company-name">
                                            <span>
                                                {{ $job->company_name }}
                                            </span>
                                        </div>
                                        <ul class="job-info">
                                            <li><strong>Posted On:</strong> {{ $job->posted_on }}</li>
                                            <li><strong>Openings:</strong> {{ $job->no_of_openings }}</li>
                                            <li><strong>Applicants:</strong>
                                                {{ is_exist('job_application_history', ['job_id' => $job->id]) }}</li>
                                        </ul>
                                    </div>

                                    <div class="job-details-bottom p-4 mt-4 ">

                                        <h5 class="font-weight-600 jd-heading">Job Description</h5>
                                        <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                                        {{-- <ul class="job-description-list">
                                    <li> Designing and implementing web interfaces using HTML, CSS, and JavaScript </li>
                                    <li> Building responsive designs that work on a variety of devices and screen sizes
                                    </li>
                                    <li> Implementing interactive features such as forms, animations, and modals using
                                        JavaScript </li>
                                    <li> Collaborating with back-end developers to integrate with APIs and server-side
                                        functionality </li>
                                    <li> Debugging and fixing cross-browser compatibility issues </li>
                                    <li> Optimizing website performance for speed and scalability </li>
                                    <li> Writing clean, well-documented, and maintainable code </li>
                                    <li> Participating in code reviews and contributing to team processes for continuous
                                        improvement </li>
                                    <li> Should have excellent problem-solving, communication, and collaboration skills
                                    </li>
                                </ul> --}}
                                        @php
                                            echo htmlspecialchars_decode($job->job_description);
                                        @endphp



                                        <h5 class="font-weight-600 more-info jd-heading">More Info</h5>
                                        <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>

                                        <div class="">

                                            <div class="  ">
                                                <label>Job Type: </label>
                                                <span>{{ $job->job_type_name }}</span>
                                            </div>

                                            <div class="  ">
                                                <label>Designation: </label>
                                                <span><a target="_blank">{{ $job->job_designation_name }}</a>

                                                </span>
                                            </div>

                                            <div class="  ">
                                                <label>Industry Type: </label>
                                                <span><a target="_blank">{{ $job->job_industry_name }}</a></span>
                                            </div>

                                            <div class="  ">
                                                <label>Function Area: </label>
                                                <span><a target="_blank">{{ $job->functional_name }}</a>
                                                </span>
                                            </div>

                                            <div class="">
                                                <label>Required Language: </label>
                                                <span>
                                                    @php
                                                        $keys = explode(',', $job->required_language);
                                                        $lang_arr = multiSelectDropdown(
                                                            'languages',
                                                            ['skill_language'],
                                                            $keys,
                                                        );
                                                    @endphp
                                                    @foreach ($lang_arr as $index => $lang)
                                                        @if (isset($lang[0]->skill_language))
                                                        {{ $lang[0]->skill_language }}
                                                        @if ($index < count($lang_arr) - 1),@endif

                                                            
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>

                                            <div class="  ">
                                                <label>Required Gender: </label>
                                                <span><a
                                                        target="_blank">{{ empty($job->gender) ? 'Not Disclosed' : $job->gender }}</a>
                                                </span>
                                            </div>

                                            {{-- <div class="  "><label>Role Category: </label>
                                        <span>Software Development</span>
                                    </div> --}}
                                        </div>


                                        <h5 class="font-weight-600 more-info jd-heading">Education</h5>
                                        <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>

                                        <div class="">
                                            <div class="  ">
                                                <label>Education Qualification: </label>
                                                <span>{{ isset($job->job_education_name) ? $job->job_education_name : 'Not Disclosed' }}</span>
                                            </div>
                                            <div class="  ">
                                                <label>Specialization: </label>
                                                <span>
                                                    @if (!empty($job->specialization))
                                                        {!! htmlspecialchars_decode($job->specialization) !!}
                                                    @else
                                                        {{ 'Not Disclosed' }}
                                                    @endif
                                                </span>
                                                {{-- <span>{{$job->specialization}}</span> --}}
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="font-weight-600 more-info jd-heading">Required Skills</h5>
                                            <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                                            <div class="job-time me-auto">
                                                @php
                                                    $skill = explode(',', $job->skill_keyword);
                                                    $skills = multiSelectDropdown(
                                                        'key_skills',
                                                        ['id', 'key_skill_name'],
                                                        $skill,
                                                    );
                                                @endphp
                                                @foreach ($skills as $key_skill)
                                                    @if (isset($key_skill[0]->key_skill_name))
                                                        <span> {{ $key_skill[0]->key_skill_name }}</span>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <br>
                                        {{-- <div>
                                    <h5 class="font-weight-600 more-info jd-heading">Location for Hiring</h5>
                                    <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                                    <div class="job-time me-auto">
                                        <a href="javascript:void(0);"><span>
                                            {{$job->location_hiring_name}}
                                         </span></a>
                                    </div>

                                </div> --}}
                                        @if ($job->hide_contact_details === 'No')
                                            <div class="company-contact-deatils">
                                                <h5 class="font-weight-600 more-info jd-heading">Contact Details</h5>
                                                <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>
                                                <div class="company-profile-decription">
                                                    <div class="  ">
                                                        <label>Contact Person: </label>
                                                        <span>{{ $job->contact_person }}</span>
                                                    </div>

                                                    <div class="  ">
                                                        <label>Mobile No: </label>
                                                        <span>+33 {{ $job->contact_phone }}</span>
                                                    </div>

                                                    <div class="  ">
                                                        <label>Email: </label>
                                                        <span>{{ $job->contact_email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($job->company_type_name))
                                            <h5 class="font-weight-600 more-info jd-heading">Company Profile</h5>
                                            <div class="dez-divider divider-2px bg-gray-dark mb-2 mt-0"></div>

                                            <div class="company-profile-decription">
                                                <p>{{ $job->company_type_name }}</p>
                                            </div>
                                        @endif

                                        <!-- AddToAny BEGIN -->
                                        @if (isset($job->website) && isset($job->facebook) && isset($job->facebook) && isset($job->linkedin))
                                            {{-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> --}}
                                                <div class=" bg-white radius-sm">
                                                <ul class="list-inline m-a0">
                                                @if (!empty($job->facebook))
                                                        <li><a target="_blank"
                                                                href="{{ !empty($job->facebook) ? url("$job->facebook") : '' }}"
                                                                class="site-button white facebook circle "><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if (!empty($job->linkedin))
                                                        <li><a target="_blank"
                                                                href="{{ !empty($job->linkedin) ? url("$job->linkedin") : '' }}"
                                                                class="site-button white linkedin circle "><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                    @endif
                                                    @if (!empty($job->instagram))
                                                        <li>
                                                            <a target="_blank"
                                                                href="{{ !empty($job->instagram) ? url("$job->instagram") : '' }}"
                                                                class="site-button white instagram circle "><i
                                                                    class="fab fa-instagram"></i></a>
                                                        </li>
                                                    @endif
                                                </ul>
                                                </div>
                                            {{-- </div> --}}
                                        @endif
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-4 job-deatils-right-side mt-md-0 mt-3">
                                <div class="sticky-top">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-6">
                                            <div
                                                class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm job-details-shadow">
                                                <ul>
                                                    <li><i class="fa-solid fa-briefcase"></i><strong
                                                            class="font-weight-700 text-black">Experience</strong>{{ $job->experiance }}
                                                    </li>

                                                    <li><i class="fas fa fa-euro"></i><strong
                                                        class="font-weight-700 text-black">Salary</strong>
                                                        @if ($job->job_salary_to_name != '' && $job->salary_hide === 'No')
                                                        {{ $job->job_salary_to_name }} MONTHLY 
                                                        @else
                                                           
                                                            Not Disclosed
                                                            @endif
                                                </li>
                                                    <li><i class="fa-solid fa-location-dot"></i><strong
                                                            class="font-weight-700 text-black">Location for
                                                            Hiring</strong><span class="text-black-light">
                                                            {{ empty($job->location_hiring_name) ? 'Not Disclosed' : $job->location_hiring_name }}
                                                        </span></li>
                                                    {{-- @if (session()->has('js_username'))
                                                            @php
                                                            $where = ['job_id'=>$job->id,'js_id'=>session('js_user_id')]
                                                            @endphp
                                                            @if (is_exist('job_application_history', $where) > 0)
                                                            <li style="padding-left: 0;"><a href="#" class="site-button">Applied</a></li> 
                                                            @else
                                                                <li style="padding-left: 0;"><button type='button' data-job_action="apply" data-job_id="{{base64_encode($job->id)}}" class="site-button action">Apply Now</button></li> 
                                                            @endif
                                                        
                                                @else
                                                    <li style="padding-left: 0;"><a href="{{route('js_login')}}" class="site-button" >Apply Now</a></li>
                                                @endif
                                 --}}
                                                    @if (!session()->has('emp_username'))
                                                        @if (session()->has('js_username'))
                                                            @php
                                                                $where = [
                                                                    'job_id' => $job->id,
                                                                    'js_id' => session('js_user_id'),
                                                                ];
                                                                $isApplied =
                                                                    is_exist('job_application_history', $where) > 0;
                                                                $select = ['id', 'email_verified'];
                                                                $where = ['id' => session('js_user_id')];
                                                                $emailVerfiy = getData('jobseekers', $select, $where);

                                                            @endphp

                                                            @if ($emailVerfiy[0]->email_verified === 'No')
                                                                <li style="padding-left: 0;">
                                                                    <a href="#" class="site-button not_verify"
                                                                        style="white-space: normal">Apply Now</a>
                                                                </li>
                                                            @elseif (is_exist('jobseeker_view', ['js_id' => session('js_user_id')]) == 0)
                                                                <li style="padding-left: 0;">
                                                                    <a href="#" class="site-button not_updateprofile"
                                                                        style="white-space:nowrap">Apply Now</a>
                                                                </li>
                                                            @elseif($isApplied)
                                                                <li style="padding-left: 0;"><a href="#"
                                                                        class="site-button"
                                                                        style="white-space: normal; cursor: auto">Applied</a>
                                                                </li>
                                                            @else
                                                                <li style="padding-left: 0;">
                                                                    <button type="button" data-job_action="apply"
                                                                        data-job_id="{{ base64_encode($job->id) }}"
                                                                        class="site-button action"
                                                                        style="white-space: normal">Apply Now</button>
                                                                </li>
                                                            @endif
                                                        @else
                                                            <li style="padding-left: 0;">
                                                                <a href="{{ route('js_login') }}" class="site-button"
                                                                    style="white-space: normal">Apply
                                                                    Now</a>
                                                            </li>
                                                        @endif
                                                    @endif


                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Job Detail -->
            @endforeach

            @php
                $table = 'job_posting_view';
                $select = [
                    'job_title',
                    'location_hiring_name',
                    'profile_img',
                    'id',
                    'job_type_name',
                    'posted_on',
                    'posted_by',
                    'company_name',
                    'experiance',
                    'salary_hide',
                    'city',
                    'status',
                    'approval_status',
                    'job_expired_on',
                    'job_designation',
                    'skill_keyword',
                    'work_mode',
                ];
                $getData_jobs = [];
                $getData_jobs = getData(
                    $table,
                    $select,
                    [
                        'job_designation' => $job->job_designation,
                        'status' => 'Live',
                        'is_deleted' => 'No',
                        'approval_status' => 'APPROVED',
                        ['job_expired_on', '>=', now()],
                    ],
                    6,
                    'posted_on',
                    'DESC',
                );

            @endphp
            @if (!session()->has('emp_username'))
                @if (count($getData_jobs) > 1)
                    <!-- Similar Jobs -->
                    <div class="section-full latest-jobs pt-md-5 pt-3 bg-white similar-jobs-section-main">
                        <div class="container">
                            <div class="latest-jobs-inner">
                                <div class="section-head style-1">
                                    <h6>Latest Job</h6>
                                    <h2 class="section-title-3">Similar Jobs</h2>
                                </div>
                                {{-- <a href="javascript:void(0);" class="site-button style-1">Browse Now</a> --}}
                            </div>
                            <div class="row sp20 p-b20">

                                @foreach ($getData_jobs as $lists)
                                @php
                                                        $workmode=explode(',',$lists->work_mode);
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
                                    @if (!empty($getData_jobs) && $lists->id != $job->id)
                                        @php
                                            $id = base64_encode($lists->id);
                                        @endphp
                                        <div class="col-xl-4 col-md-6">
                                            <div class="job-wrapper m-b20">
                                                <div class="jobs-profile d-flex align-items-center">
                                                    <div class="dz-icon">
                                                        @if (!empty($lists->profile_img))
                                                            <img alt=''
                                                                src='{{ Storage::url("employer/profile_image/$lists->profile_img") }}'>
                                                        @else
                                                            <img alt=''
                                                                src='{{ Storage::url('employer/profile_image/employer.png') }}'>
                                                        @endif

                                                    </div>
                                                    <div class="Profile-inner">
                                                        <h5 class="profile-name"><a
                                                                href='{{ url('job-details-view', $id) }}'>{!! htmlspecialchars_decode($lists->job_title) !!}</a>
                                                                @if(isset($lists->work_mode))({{$workModeText}})@endif
                                                        </h5>
                                                        <span class="profile-positions">{{ $lists->company_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="Profile-inner-2">
                                                    {{-- <p>  Designation : {{$lists->job_designation_name}}</p> --}}
                                                    <ul class="Job-info-home-page-1">

                                                        <li><i class='fa-solid fa-briefcase'></i> {{ $lists->experiance }}
                                                        </li>
                                                        {{-- <li><i class='fas fa-map-marker-alt'></i> {{$lists->location_hiring_name}}</li> --}}
                                                        <li><i class='fas fa-map-marker-alt'></i>
                                                            @if (!empty($lists->location_hiring_name))
                                                                {{ $lists->location_hiring_name }}
                                                            @else
                                                                {{ 'Not Disclosed' }}
                                                            @endif
                                                        </li>
                                                        {{-- <li><i class='far fa-bookmark'></i> {{$lists->job_type_name}}</li>  --}}



                                                    </ul>
                                                    <div class="job-time mb-3">
                                                        {{-- <div class="skills-list">
                                                    @php
                                                        $skill = explode(',', $lists->skill_keyword);
                                                        $skills = multiSelectDropdown('key_skills', ['id', 'key_skill_name'], $skill); 
                                                        $maxSkillsToShow=2;                                             
                                                    @endphp

                                                     @foreach ($skills as $index => $key_skill)
                                                        @if ($index < $maxSkillsToShow && isset($key_skill[0]->key_skill_name))
                                                            <span style="margin-right:7px;">{{ $key_skill[0]->key_skill_name }}</span>
                                                        @endif
                                                    @endforeach

                                                    @if (count($skills) > $maxSkillsToShow)
                                                        <span class="show-more-btn">
                                                            <a href="">See More...</a>
                                                        </span>
                                                     @endif                                                 
                                                   
                                                 
                                                   
                                                </div> --}}
                                                    </div>
                                                    <div class="dz-buttons d-flex align-items-center">
                                                        @if (session()->has('js_username'))
                                                            @php
                                                                $where = ['job_id' => $lists->id,'js_id' => session('js_user_id'),];
                                                                $isApplied =is_exist('job_application_history', $where) > 0;
                                                                $select = ['id', 'email_verified'];
                                                                $where = ['id' => session('js_user_id')];
                                                                $emailVerfiy = getData('jobseekers', $select, $where);

                                                            @endphp


                                                            @if ($emailVerfiy[0]->email_verified === 'No')

                                                                <a href="#" class="site-button not_verify" style="white-space: normal">Apply Now</a>

                                                            @elseif (is_exist('jobseeker_view', ['js_id' => session('js_user_id')]) == 0)

                                                            <a href="#" class="site-button not_updateprofile" style="white-space:nowrap">Apply Now</a>

                                                            @elseif($isApplied)
                                                            <a href="#"
                                                                    class="site-button" style="white-space: normal; cursor: auto">Applied</a>
                                                            @else

                                                                <button type="button" data-job_action="apply"
                                                                    data-job_id="{{ base64_encode($job->id) }}"
                                                                    class="site-button action" style="white-space: normal">Apply Now</button>

                                                            @endif
                                                            @else

                                                            <a href="{{ route('js_login') }}" class="site-button" style="white-space: normal">Apply
                                                                Now</a>

                                                            @endif
                                                       
                                    
                                    @if (!empty($lists->job_salary_to_name) && $lists->salary_hide === 'No')
                                        <div class="dz-salary">
                                            <span><small>{{ $lists->job_salary_to_name }}</small></span>
                                        </div>
                                    @endif
                                    @if (session()->has('js_username'))
                                    @php
                                        $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id'), 'is_saved' => 'Yes'];
                                        // echo is_exist('jobseeker_viewed_jobs', $where);
                                    @endphp
                                    @if (is_exist('jobseeker_viewed_jobs', $where) != 0)
                                        <label class='like-btn action' data-is_toggle="No"
                                            data-posted_by="{{ base64_encode($lists->posted_by) }}" data-job_action="Saved"
                                            data-job_id="{{ base64_encode($lists->id) }}" title="Unsave this job" data-bs-toggle="tooltip" data-placement="right">
                                            <i class="fa fa-bookmark" style="color: #11a1f5;"></i>
                                        </label>
                                    @else
                                        <label class='like-btn action' data-is_toggle="Yes"
                                            data-posted_by="{{ base64_encode($lists->posted_by) }}" data-job_action="Unsaved"
                                            data-job_id="{{ base64_encode($lists->id) }}" title="Save this job" data-bs-toggle="tooltip" data-placement="right">
                                            <i class="far fa-bookmark" style="color: #11a1f5;"></i>
                                        </label>
                                    @endif
                                @else
                                    <label class='like-btn jslogincheck'><input type='checkbox' title="Save this job" data-bs-toggle="tooltip" data-placement="right">
                                        {{-- <span class='checkmark '></span> --}}
                                        <i class="far fa-bookmark" aria-hidden="true"></i>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="dz-timing"><span>{{ duration($lists->posted_on) }}</span>
                            {{-- <a href="javascript:void(0);">{{$lists->job_type_name}}</a> --}}
                        </div>
                    </div>
        </div>
        @endif
        @endforeach
    </div>

    </div>
    </div>
    @endif
    @endif
    <!-- Similar Jobs -->



    <!-- Browse Jobs  -->

    {{-- <div class="section-full jobs-category-bx bg-white">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 m-b30">
                        <div class="job-bx">
                            <div class="job-bx-title clearfix">
                                <h6 class="text-uppercase">Jobs by Industries
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <ul class="category-list">
                                        <li><a href="javascript:void(0);">Android Jobs</a></li>
                                        <li><a href="javascript:void(0);">WordPress Jobs</a></li>
                                        <li><a href="javascript:void(0);">eCommerce Jobs</a></li>
                                        <li><a href="javascript:void(0);">Design Jobs</a></li>
                                        <li><a href="javascript:void(0);">Mobile Jobs</a></li>
                                        <li><a href="javascript:void(0);">MySQL Jobs</a></li>
                                        <li><a href="javascript:void(0);">SEO Jobs</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <ul class="category-list">
                                        <li><a href="javascript:void(0);">Website Design</a></li>
                                        <li><a href="javascript:void(0);">Web Development</a></li>
                                        <li><a href="javascript:void(0);">Web Design</a></li>
                                        <li><a href="javascript:void(0);">Programming Jobs</a></li>
                                        <li><a href="javascript:void(0);">JavaScript Jobs</a></li>
                                        <li><a href="javascript:void(0);">Developer Jobs</a></li>
                                        <li><a href="javascript:void(0);">Software Jobs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b30">
                        <div class="job-bx">
                            <div class="job-bx-title clearfix">
                                <h6 class="text-uppercase">Jobs by Functional Areas
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <ul class="category-list">
                                        <li><a href="javascript:void(0);">Email Marketing</a></li>
                                        <li><a href="javascript:void(0);">Lead Generation</a></li>
                                        <li><a href="javascript:void(0);">Public Relations</a></li>
                                        <li><a href="javascript:void(0);">Telemarketing Jobs</a></li>
                                        <li><a href="javascript:void(0);">Display Advertising</a></li>
                                        <li><a href="javascript:void(0);">Marketing Strategy</a></li>
                                        <li><a href="javascript:void(0);">Search Engine Marketing</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <ul class="category-list">
                                        <li><a href="javascript:void(0);">Other - Sales & Marketing</a></li>
                                        <li><a href="javascript:void(0);">Display Advertising</a></li>
                                        <li><a href="javascript:void(0);">Market & Customer</a></li>
                                        <li><a href="javascript:void(0);">Search Engine Optimization</a></li>
                                        <li><a href="javascript:void(0);">Social Media Marketing</a></li>
                                        <li><a href="javascript:void(0);">Search Engine Marketing</a></li>
                                        <li><a href="javascript:void(0);">Marketing Strategy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}





    </div>
    </div>
    <!-- Content END-->

    <!-- Import footer  -->
@endsection()
