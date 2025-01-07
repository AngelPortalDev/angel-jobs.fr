@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- Section Banner -->
        <div class="dez-bnr-inr dez-bnr-inr-md main-slider"
            style="background-image:url({{ asset('images/france-city-bg.jpg') }});">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m">
                    <div class="find-job-bx">
                        <h2 class="hero-sect-top-text main-heading-home-page">Find jobs in <span
                                class="text-primary">France</span></h2>

                        <!--<h2>Search among over <span class="text-primary">50,000</span> <br/>  open job opportunities in <span class="text-primary">Malta.</span></h2>-->

                        {{-- <form class="dezPlaceAni" action="#">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label>Job Title, Keywords, or Phrase</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label>City, State or ZIP</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                             <select>
                                            <option>Select Sector</option>
                                            <option>Construction</option>
                                            <option>Corodinator</option>
                                            <option>Employer</option>
                                            <option>Financial Career</option>
                                            <option>Information Technology</option>
                                            <option>Marketing</option>
                                            <option>Quality check</option>
                                            <option>Real Estate</option>
                                            <option>Sales</option>
                                            <option>Supporting</option>
                                            <option>Teaching</option>
                                        </select>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <select>
                                            <option>Select Sector</option>
                                            <option>Construction</option>
                                            <option>Corodinator</option>
                                            <option>Employer</option>
                                            <option>Financial Career</option>
                                            <option>Information Technology</option>
                                            <option>Marketing</option>
                                            <option>Quality check</option>
                                            <option>Real Estate</option>
                                            <option>Sales</option>
                                            <option>Supporting</option>
                                            <option>Teaching</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <button type="submit" class="site-button btn-block">Find Job</button>
                                </div>
                            </div>
                        </form> --}}
                        @include('browse-all-jobs.top-search-header')
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Banner END -->

        <!-- Partners -->
        <!--<div class="section-full content-inner-1 partners bg-white style-1">-->
        <!--	<div class="container">-->
        <!--		<div class="our-partners item-center owl-loaded owl-theme owl-carousel owl-none mfp-gallery owl-dots-none">-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner1.svg') }}" alt=""> -->
        <!--				</a>-->
        <!--			</div>-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner2.svg') }}" alt="">-->
        <!--				</a>-->
        <!--			</div>-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner3.svg') }}" alt="">-->
        <!--				</a>-->
        <!--			</div>-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner4.svg') }}" alt="">-->
        <!--				</a>-->
        <!--			</div>-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner5.svg') }}" alt="">-->
        <!--				</a>-->
        <!--			</div>-->
        <!--			<div class="item">-->
        <!--				<a href="javascript:void(0);" class="partners-media">-->
        <!--					<img src="{{ asset('images/svg/partner6.svg') }}" alt="">-->
        <!--				</a>-->
        <!--			</div>-->
        <!--		</div>-->
        <!--	</div>-->
        <!--</div>-->
        <!-- Partners End-->

        <!-- About Us -->
        <div class="section-full job-categories content-inner-2 bg-white">
            <div class="container">
                <div class="section-head head-counter clearfix text-center">
                    <div class="">
                        <h2 class="m-b5">Job by Industries</h2>
                        <h6 class="fw3">Discover a variety of job openings across different categories in France.</h6>
                    </div>
                    {{-- @php
                        $jobountlist = [];
                        $jobcountlist = getData('designations', ['id', 'role_name'], []);

                    @endphp --}}
                    {{-- <div class="head-counter-bx">
                    <span class="">+</span>
                    <h2 class="m-b5 counter" style="display: inline-block;">1800</h2>
                    <h6 class="fw3">Jobs</h6>
                </div>
                <div class="head-counter-bx">
                    <span class="">+</span>
                    <h2 class="m-b5 counter" style="display: inline-block;">4500</h2>
                    <h6 class="fw3">Resumes</h6>
                </div>
                <div class="head-counter-bx">
                    <span class="">+</span>
                    <h2 class="m-b5 counter" style="display: inline-block;">1050</h2>
                    <h6 class="fw3">Companies</h6>
                </div> --}}
                </div>
                <div class="row sp20">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-microchip"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('164')}}">IT and Technology</a>
                                {{-- <p class="m-a0">198 Open Positions</p> --}}
                            <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 164, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-file-invoice"></i>
                                </div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('165')}}">Banking, Financial Services, and Insurance (BFSI)</a>
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 165, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-suitcase-medical"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('166')}}">Healthcare and Pharmaceuticals</a>
                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 166, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                <div class="rotate-icon"><i class="fa-solid fa-suitcase-medical"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-chart-simple"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('167')}}">Retail and E-Commerce</a>
                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 167, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                <div class="rotate-icon"><i class="fa-solid fa-chart-simple"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-van-shuttle"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('168')}}">Manufacturing and Engineering</a>
                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 168, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                <div class="rotate-icon"><i class="fa-solid fa-van-shuttle"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-user-tie"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('169')}}">Construction and Real Estate</a>
                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 169, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                <div class="rotate-icon"><i class="fa-solid fa-user-tie"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-phone-volume"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('170')}}">Telecommunications</a>
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 170, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <div class="rotate-icon"><i class="fa-solid fa-phone-volume"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper">
                            <div class="icon-content">
                                <div class="icon-md text-primary m-b20"><i class="fa-solid fa-truck-fast"></i></div>
                                <a class="dez-tilte" href="{{url('top-search-bar')}}?search_industry%5B%5D={{base64_encode('171')}}">Logistics and Supply Chain</a>
                                <p class="m-a0">
                                    {{ jobCount('job_posting_view', ['job_industry' => 171, 'is_deleted' => 'No', 'status' => 'Live','approval_status'=>'APPROVED']) }}
                                     openings</p>

                                {{-- <p class="m-a0">198 of openings</p> --}}
                                <div class="rotate-icon"><i class="fa-solid fa-truck-fast"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-12 text-center m-t30">
                              <a href="category-all-jobs.html" class="site-button radius-xl">All Categories</a>
                             </div> -->
                </div>
            </div>
        </div>
        <!-- About Us END -->
        <!-- Call To Action -->
        <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 section-head text-center">
                        <h2 class="m-b5">French Job Hubs</h2>
                        <h6 class="fw4 m-b0">Explore skill-match job opportunities in France's dynamic cities! Lyon is renowned for biotech; Paris offers global career prospects; Bordeaux boasts a vibrant student scene; Toulouse is a hub for aerospace; Nantes thrives in technology; Strasbourg is a center for manufacturing; Rennes specializes in automotive and electronics; and Marseille provides coastal career possibilities.
                        </h6>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @php
                        $citycountlist = [];
                        $citycountlist = getData('cities', ['city_name', 'id'], ['country_id' => 31]);
                        // print_r($citycountlist);
                        // exit;
                    @endphp
                    @if(isset($citycountlist[1]) && $citycountlist[1]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <a href="{{url('top-search-bar')}}?search_city%5B%5D={{base64_encode($citycountlist[1]->id)}}">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/paris.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[1]->city_name }}</h5>
                                <span>{{ jobCount('job_posting_view', ['location_hiring' => $citycountlist[1]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($citycountlist[0]) && $citycountlist[0]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <a href="{{url('top-search-bar')}}?search_city%5B%5D={{base64_encode($citycountlist[0]->id)}}">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/lyon.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[0]->city_name }}</h5>
                                <span>{{ jobCount('job_postings', ['location_hiring' => $citycountlist[0]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    {{-- @if(isset($citycountlist[3]) && $citycountlist[3]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/banglore.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[3]->city_name }}</h5>
                                <span>{{ jobCount('job_postings', ['location_hiring' => $citycountlist[3]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($citycountlist[0]) && $citycountlist[0]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <a href="{{url('top-search-bar')}}?search_city%5B%5D={{base64_encode($citycountlist[0]->id)}}">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/hyderabad.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[0]->city_name }}</h5>
                                <span>{{ jobCount('job_postings', ['location_hiring' => $citycountlist[0]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($citycountlist[8]) && $citycountlist[8]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <a href="{{url('top-search-bar')}}?search_city%5B%5D={{base64_encode($citycountlist[8]->id)}}">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/pune.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[8]->city_name }}</h5>
                                <span>{{ jobCount('job_postings', ['location_hiring' => $citycountlist[8]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($citycountlist[4]) && $citycountlist[4]->city_name)
                    <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
                        <a href="{{url('top-search-bar')}}?search_city%5B%5D={{base64_encode($citycountlist[4]->id)}}">
                        <div class="city-bx align-items-end  d-flex"
                            style="background-image:url({{ asset('images/city/chennai.jpg') }});">
                            <div class="city-info">
                                <h5>{{ $citycountlist[4]->city_name }}</h5>
                                <span>{{ jobCount('job_postings', ['location_hiring' => $citycountlist[4]->id, 'is_deleted' => 'No', 'status' => 'Live','approval_status' => 'APPROVED']) }}
                                    Jobs</span>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
        <!-- Call To Action END -->
        <!-- Our Job -->
        <div class="section-full bg-white content-inner-2">
            <div class="container">
                <div class="d-flex job-title-bx section-head">
                    <div class="me-auto">
                        <h2 class="m-b5">Jobs in France</h2>
                        <h6 class="fw4 m-b0">5+ Recently Added Jobs</h6>
                    </div>
                    {{-- <div class="align-self-end">
                    <form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="POST">
                                @csrf
                                <button class="site-button button-sm" type="submit"><b>Browse Now</b></button>
                            </form>
                </div> --}}
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <ul class="post-job-bx browse-job">
                            @php
                                $select = ['id', 'email_verified'];
                                $where = ['id' => session('js_user_id')];
                                $table = 'jobseekers';
                                $emailVerfiy = getData($table, $select, $where);

                            @endphp
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
                                    'job_salary_to_name',
                                    'salary_hide',
                                    'city',
                                    'skill_keyword',
                                    'job_industry_name',
                                    'facebook',
                                    'linkedin',
                                    'instagram',
                                    'approval_status',
                                    'status',
                                    'is_deleted',
                                    'work_mode'
                                ];

                                $getData_jobs = []; // Initialize the variable                          
                              
                                    
                                    $getData_jobs = jobList($table,$select,['approval_status' => 'APPROVED','status' => 'Live','is_deleted' => 'No',],5,'posted_on','DESC',);
                                   

                            @endphp


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
                                <li>
                                    <div class='post-bx'>
                                        <div class='d-flex m-b30'>
                                            <div class='job-post-company'><a><span>

                                                        @if (!empty($lists->profile_img))
                                                            <img alt=''
                                                                src='{{ Storage::url("employer/profile_image/$lists->profile_img") }}'>
                                                        @else
                                                            <img alt=''
                                                                src="{{ asset('images/company_profile.png') }}"
                                                                {{-- src='{{ Storage::url("no-image.jpg")}}' --}}>
                                                        @endif


                                                    </span>
                                            </div>
                                            <div class='job-post-info'>
                                                @php
                                                    $id = base64_encode($lists->id);
                                                    $emp_id = base64_encode($lists->posted_by);
                                                @endphp
                                                <h4><a
                                                        href='{{ url('job-details-view', $id) }}'>{!! htmlspecialchars_decode($lists->job_title) !!}</a> @if(isset($lists->work_mode))({{$workModeText}})@endif
                                                </h4>
                                                <div class='company-name-url'>
                                                    <span><a
                                                            href='{{ url('emp-details-view', $emp_id) }}'>{{ htmlspecialchars_decode($lists->company_name) }}</a></span>
                                                </div>
                                                <ul>
                                                    <li><i
                                                            class='fa-solid fa-briefcase'></i>{{ htmlspecialchars_decode($lists->experiance) }}
                                                    </li>
                                                    <li><i class='fas fa-map-marker-alt'></i>
                                                        {{ empty($lists->location_hiring_name) ? 'Not Disclosed' : $lists->location_hiring_name }}
                                                    </li>
                                                    {{-- <li><i class='far fa-bookmark'></i>{{$lists->job_type_name}} </li> --}}
                                                    <li>
                                                        @if ($lists->salary_hide === 'No')
                                                            <span> <i class="fa fa-inr"></i>
                                                                {{ empty($lists->job_salary_to_name) ? 'Not Disclosed' : $lists->job_salary_to_name }}</span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-tasks" ></i>{{ isset($lists->job_type_name) ? $lists->job_type_name : 'Not Disclosed' }}</span>
                                                    </li>
                            @endif
                            <br>
                            <li class="mt-2"><i class='far fa-clock'></i>
                                Published {{ duration($lists->posted_on) }} ago</li>
                        </ul>
                    </div>
                </div>
                <div class='d-flex'>
                    <div class='job-time me-auto'>

                        @php
                            $skill = explode(',', $lists->skill_keyword);
                            $skills = multiSelectDropdown('key_skills', ['id', 'key_skill_name'], $skill);
                            $totalSkills = count($skills);
                            $maxSkillsToShow = 3;
                        @endphp
                        {{-- @foreach ($skills as $key_skill)
                            @if (isset($key_skill[0]->key_skill_name))
                                <span> {{ $key_skill[0]->key_skill_name }}</span>
                            @endif
                        @endforeach --}}
                        <div class="skills-list">
                            @foreach ($skills as $index => $key_skill)
                                @if (isset($key_skill[0]->key_skill_name))
                                    @if ($index < $maxSkillsToShow)
                                        <span>{{ $key_skill[0]->key_skill_name }}</span>
                                    @else
                                        <span class="more-skill" style="display: none;">{{ $key_skill[0]->key_skill_name }}</span>
                                    @endif
                                @endif
                            @endforeach
                        
                            @if ($totalSkills > $maxSkillsToShow)
                            <span class="show-more-btn">
                                <a href="{{ url('job-details-view', $id) }}">See More...</a>
                            </span>
                            @endif
                        </div>
                        {{-- <br><span>{{ isset($lists->functional_name) ? $lists->functional_name : 'Not Disclosed'}}</span> --}}
                        {{-- <span>{{$lists->functional_name}}</span> --}}


                        {{-- <div class="m-t20">
                                        <ul class="dez-social-icon dez-social-icon-lg">
                                            <li><a target="_blank" href="{{$lists->facebook}}" class="fab fa-facebook-f bg-primary"></a></li>
                                            <li><a target="_blank" href="{{$lists->linkedin}}" class="fab fa-linkedin bg-primary"></a></li>
                                            <li><a target="_blank" href="{{$lists->instagram}}" class="fab fa-instagram bg-primary"></a></li>
                                        </ul>
                                    </div> --}}
                        {{-- <div class="m-t20">
                                        <ul class="dez-social-icon dez-social-icon-lg">
                                            @if (isset($lists->facebook))
                                                <li><a target="_blank" href="{{ $lists->facebook }}" class="fab fa-facebook-f bg-primary"></a></li>
                                            @endif
                                            @if (isset($lists->linkedin))
                                                <li><a target="_blank" href="{{ $lists->linkedin }}" class="fab fa-linkedin bg-primary"></a></li>
                                            @endif
                                            @if (isset($lists->instagram))
                                                <li><a target="_blank" href="{{ $lists->instagram }}" class="fab fa-instagram bg-primary"></a></li>
                                            @endif
                                        </ul>
                                    </div> --}}


                    </div>
                    <div class='salary-bx'>
                        @if (session()->has('js_username'))
                            @php $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id')]; @endphp
                            @if (is_exist('job_application_history', $where) > 0)
                                <a class="site-button style-1" style="white-space:nowrap">Applied</a>
                            @elseif($emailVerfiy[0]->email_verified === 'No')
                                <a href="#" class="site-button not_verify" style="white-space:nowrap">Apply Now</a>
                            @elseif( is_exist('jobseeker_view', ['js_id' => session('js_user_id')]) == 0)
                            <a href="#" class="site-button not_updateprofile" style="white-space:nowrap">Apply Now</a>
                            @else
                                <button type="button" data-job_action="apply"
                                    data-job_id="{{ base64_encode($lists->id) }}" class="site-button action"
                                    style="white-space:nowrap">Apply Now</button>
                            @endif
                        @else
                            <a href="{{ route('js_login') }}" class="site-button" style="white-space:nowrap">Apply
                                Now</a>
                        @endif
                    </div>
                </div>


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

            </li>
            @endforeach
            </ul>
            <div class="m-t30 mb-3">
                <div class="d-flex" style="justify-content: flex-end">
                    <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                        @csrf
                        <button class="site-button button-sm fs-6" type="submit"
                            style="padding: 8px 16px;white-space:nowrap">Browse More</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sticky-top">
                <!--<div class="candidates-are-sys m-b30">-->
                <!--	<div class="candidates-bx">-->
                <!--		<div class="testimonial-pic radius"><img src="{{ asset('images/testimonial-human-04.png') }}" alt="" width="100" height="100"></div>-->
                <!--		<div class="testimonial-text">-->
                <!--			<p>Outstanding experience with Angel Malta Jobs! Their commitment and user-centric design led me to the perfect job match.  Highly recommended!</p>-->
                <!--		</div>-->
                <!--		<div class="testimonial-detail"> <strong class="testimonial-name">Richard Anderson</strong> <span class="testimonial-position">Jobseeker</span> </div>-->
                <!--	</div>-->
                <!--</div>-->
                <div class="quote-bx">
                    <div class="quote-info">
                        <h4>Upgrade Your Job Search Today!</h4>
                        <p>Get personalized job alerts and boost your job search with the jobseeker plan!</p>
                        {{-- <a href="javascript:void(0);" class="site-button">Create an Account</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Our Job END -->
    <!-- Internship -->
    <div class="section-full latest-jobs content-inner-1 bg-white intership-section-main d-none">
        <div class="container">
            <div class="latest-jobs-inner">
                <div class="section-head style-1">
                    <h6>Latest Job</h6>
                    <h2 class="section-title-3">Internship</h2>
                </div>
                <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                    @csrf
                    <input name="search_job_type[]" value='{{ base64_encode(16) }}' hidden>
                    <button class="site-button style-1" type="submit"><b>Browse More</b></button>
                </form>
            </div>
            <div class="row sp20 p-b20">
                @php

                    $getData_jobs = [];
                    $getData_jobs = jobList(
                        $table,
                        $select,
                        ['job_type' => 16, 'status' => 'Live', 'is_deleted' => 'No'],
                        6,
                        'posted_on',
                        'DESC',
                    );
                @endphp

                @foreach ($getData_jobs as $lists)
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
                                        <img alt='' src='{{ Storage::url('no-image.jpg') }}'>
                                    @endif
                                    {{-- <img src="{{Storage::url("employer/profile_image/$lists->profile_img") }}" alt=""> --}}
                                </div>

                                <div class="Profile-inner">
                                    <h5 class="profile-name"><a
                                            href='{{ url('job-details-view', $id) }}'>{!! $lists->job_title !!}</a></h5>
                                    <span class="profile-positions">{{ $lists->company_name }}</span>
                                </div>
                            </div>
                            <div class="Profile-inner-2">


                                <ul class="Job-info-home-page-1">

                                    <li><i class='fa-solid fa-briefcase'></i> {{ $lists->experiance }} </li>
                                    <li><i class='fas fa-map-marker-alt'></i> {{ $lists->location_hiring_name }}</li>
                                    <!-- <li><i class='far fa-bookmark'></i>" . $lists->job_type_name . " </li> -->
                                </ul>



                                <div class="dz-buttons d-flex align-items-center">
                                    @if (session()->has('js_username'))
                                        @php

                                            $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id')];
                                        @endphp
                                        @if (is_exist('job_application_history', $where) > 0)
                                            <a class="site-button style-1">Applied</a>
                                        @else
                                            <button type='button' data-job_action="apply"
                                                data-job_id="{{ base64_encode($lists->id) }}"
                                                class="site-button style-1 action">Apply</button>
                                        @endif
                                    @else
                                        <a href="{{ route('js_login') }}"
                                            class="site-button style-1"><small>Apply</small></a>
                                    @endif
                                    @if ($lists->salary_hide === 'No')
                                        <div class="dz-salary">
                                            <span><small>{{ isset($lists->job_salary_to_name) ? $lists->job_salary_to_name . '/ Month' : '' }}</small></span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="dz-timing"><span>{{ duration($lists->posted_on) }}</span>
                                {{-- <a >{{$lists->job_type_name}}</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Internship -->

    <!-- Part Time Jobs -->
    <div class="section-full latest-jobs content-inner-1 bg-white part-time-job-section d-none">
        <div class="container">
            <div class="latest-jobs-inner">
                <div class="section-head style-1">
                    <h6>Latest Job</h6>
                    <h2 class="section-title-3">Part Time</h2>
                </div>
                <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                    @csrf
                    <input name="search_job_type[]" value='{{ base64_encode(17) }}' hidden>
                    <button class="site-button style-1" type="submit"><b>Browse More</b></button>
                </form>
                {{-- <a href="javascript:void(0);" class="site-button style-1">Browse Now</a> --}}
            </div>
            <div class="row sp20 p-b20">
                @php

                    $getData_jobs = [];
                    $getData_jobs = jobList(
                        $table,
                        $select,
                        ['job_type' => 17, 'status' => 'Live', 'is_deleted' => 'No'],
                        6,
                        'posted_on',
                        'DESC',
                    );
                @endphp

                @foreach ($getData_jobs as $lists)
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
                                        <img alt='' src='{{ Storage::url('no-image.jpg') }}'>
                                    @endif

                                </div>
                                <div class="Profile-inner">
                                    <h5 class="profile-name"><a
                                            href='{{ url('job-details-view', $id) }}'>{{ $lists->job_title }}</a></h5>
                                    <span class="profile-positions">{{ $lists->company_name }}</span>
                                </div>
                            </div>
                            <div class="Profile-inner-2">
                                {{-- <p>  Designation : {{$lists->job_designation_name}}</p> --}}
                                <ul class="Job-info-home-page-1">

                                    <li><i class='fa-solid fa-briefcase'></i> {{ $lists->experiance }} </li>
                                    <li><i class='fas fa-map-marker-alt'></i> {{ $lists->location_hiring_name }}</li>
                                    <!-- <li><i class='far fa-bookmark'></i>" . $lists->job_type_name . " </li> -->
                                </ul>

                                <div class="dz-buttons d-flex align-items-center">
                                    @if (session()->has('js_username'))
                                        @php
                                            $where = ['job_id' => $lists->id, 'js_id' => session('js_user_id')];
                                        @endphp
                                        @if (is_exist('job_application_history', $where) > 0)
                                            <a href="#" class="site-button style-1">Applied</a>
                                        @else
                                            {{-- <a href="javascript:void(0)" data-action="apply" data-job_id="{{base64_encode($lists->id)}}" class="site-button style-1 action">Apply</a> --}}
                                            <button type='button' data-job_action="apply"
                                                data-job_id="{{ base64_encode($lists->id) }}"
                                                class="site-button style-1 action">Apply</button>
                                        @endif
                                    @else
                                        <a href="{{ route('js_login') }}"
                                            class="site-button style-1"><small>Apply</small></a>
                                    @endif
                                    @if ($lists->salary_hide === 'No')
                                        <div class="dz-salary">
                                            <span><small>{{ isset($lists->job_salary_to_name) ? $lists->job_salary_to_name . '/ Month' : '' }}</small></span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="dz-timing"><span>{{ duration($lists->posted_on) }}</span>
                                {{-- <a href="javascript:void(0);">{{$lists->job_type_name}}</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{-- <div class="jobs-btn">
					<a href="javascript:void(0);" class="site-button style-1">Load More</a>
				</div> --}}
        </div>
    </div>
    <!-- Part Time Jobs -->



    <!-- About Work -->
    <div class="section-full about-work content-inner-1 bg-white pb-5">
        <div class="container">
            <div class="section-head text-center style-1">
                <h6>How to Approach Job Search in France?</h6>
                <h2 class="section-title">Four Simple Steps to Secure a Job in France</h2>
                <p>Explore your desired job with Angel-Jobs France: Create a profile, discover opportunities, showcase your skills, and apply seamlessly. Embark on your path to the desired job today.</p>
            </div>
            <div class="row sp20  about-work-inner">

                <div class="col-lg-3 col-md-6 col-sm-6 m-b20 icon-wrapper" style="display: flex;">
                    <div class="icon-bx-wraper style-1">
                        <div class="icon-content">
                            <a class="icon-box text-white m-b20">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_27_56)">
                                        <path
                                            d="M25.1269 17.5621C24.4543 17.2424 23.768 16.967 23.0697 16.7363C25.3313 15.0388 26.7969 12.3358 26.7969 9.29688C26.7969 4.17061 22.6263 0 17.5 0C12.3737 0 8.20313 4.17061 8.20313 9.29688C8.20313 12.3391 9.67204 15.0448 11.9378 16.742C9.86187 17.4254 7.91397 18.4889 6.20909 19.8912C3.08288 22.4627 0.909252 26.0494 0.0887347 29.9908C-0.168433 31.2258 0.139662 32.4943 0.933862 33.4709C1.72416 34.4427 2.89605 35 4.14894 35H20.9863C21.7414 35 22.3535 34.3879 22.3535 33.6328C22.3535 32.8777 21.7414 32.2656 20.9863 32.2656H4.14894C3.56529 32.2656 3.21317 31.9398 3.05526 31.7457C2.78257 31.4104 2.67703 30.9739 2.76569 30.5481C4.18449 23.733 10.1957 18.7547 17.1376 18.5868C17.2578 18.5914 17.3786 18.5938 17.5 18.5938C17.6226 18.5938 17.7446 18.5914 17.866 18.5866C19.9933 18.6365 22.0393 19.122 23.953 20.0318C24.635 20.3558 25.4505 20.0659 25.7747 19.3838C26.0989 18.7019 25.8089 17.8863 25.1269 17.5621ZM17.8335 15.851C17.7225 15.849 17.6114 15.848 17.5 15.848C17.3897 15.848 17.2793 15.8491 17.1691 15.8511C13.7037 15.6782 10.9375 12.8045 10.9375 9.29688C10.9375 5.67827 13.8814 2.73438 17.5 2.73438C21.1186 2.73438 24.0625 5.67827 24.0625 9.29688C24.0625 12.8036 21.2977 15.6768 17.8335 15.851Z"
                                            fill="white" />
                                        <path
                                            d="M33.6328 27.1387H29.873V23.3789C29.873 22.6238 29.261 22.0117 28.5059 22.0117C27.7508 22.0117 27.1387 22.6238 27.1387 23.3789V27.1387H23.3789C22.6238 27.1387 22.0117 27.7508 22.0117 28.5059C22.0117 29.261 22.6238 29.873 23.3789 29.873H27.1387V33.6328C27.1387 34.3879 27.7508 35 28.5059 35C29.261 35 29.873 34.3879 29.873 33.6328V29.873H33.6328C34.3879 29.873 35 29.261 35 28.5059C35 27.7508 34.3879 27.1387 33.6328 27.1387Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_27_56">
                                            <rect width="35" height="35" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a class="dez-tilte">Create Account</a>
                            <p class="dz-text">Sign up on Angel-Jobs France to explore job opportunities, show off your skills, and apply hassle-free.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 m-b20 icon-wrapper">
                    <div class="icon-bx-wraper style-1">
                        <div class="icon-content">
                            <a class="icon-box text-white m-b20">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M30.2807 28.9357L22.7865 21.1419C24.7134 18.8515 25.7691 15.9697 25.7691 12.9695C25.7691 5.96007 20.0659 0.257202 13.056 0.257202C6.04609 0.257202 0.342865 5.96007 0.342865 12.9695C0.342865 19.979 6.04609 25.6819 13.056 25.6819C15.6876 25.6819 18.1954 24.8882 20.3395 23.3815L27.8906 31.2344C28.2062 31.5622 28.6307 31.7429 29.0856 31.7429C29.5162 31.7429 29.9247 31.5788 30.2348 31.2803C30.8937 30.6463 30.9147 29.5951 30.2807 28.9357ZM13.056 3.57347C18.2374 3.57347 22.4527 7.78844 22.4527 12.9695C22.4527 18.1507 18.2374 22.3656 13.056 22.3656C7.87457 22.3656 3.65934 18.1507 3.65934 12.9695C3.65934 7.78844 7.87457 3.57347 13.056 3.57347Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a class="dez-tilte">Search Jobs</a>
                            <p class="dz-text">Start a Job Hunt! Discover your desired roles on Angel-Jobs France. Your perfect job is waiting for you.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 m-b20 icon-wrapper">
                    <div class="icon-bx-wraper style-1">
                        <div class="icon-content">
                            <a class="icon-box text-white m-b20">
                                <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M37.8429 12.621L27.4057 2.18384C27.3186 2.09369 27.2138 2.0224 27.098 1.9744C26.9822 1.92639 26.8577 1.9027 26.7324 1.90479H9.68476C8.67441 1.90479 7.70544 2.30615 6.99102 3.02057C6.2766 3.735 5.87524 4.70396 5.87524 5.71431V38.2857C5.87524 39.2961 6.2766 40.2651 6.99102 40.9795C7.70544 41.6939 8.67441 42.0953 9.68476 42.0953H34.3124C35.3227 42.0953 36.2917 41.6939 37.0061 40.9795C37.7205 40.2651 38.1219 39.2961 38.1219 38.2857V13.2943C38.1211 13.0419 38.0209 12.8 37.8429 12.621ZM34.8705 12.3419H29.1133C28.7345 12.3419 28.3711 12.1914 28.1032 11.9235C27.8353 11.6556 27.6848 11.2922 27.6848 10.9134V5.15622L34.8705 12.3419ZM34.3124 40.1905H9.68762C9.18244 40.1905 8.69796 39.9898 8.34075 39.6326C7.98354 39.2754 7.78286 38.7909 7.78286 38.2857V5.71431C7.78286 5.20914 7.98354 4.72466 8.34075 4.36744C8.69796 4.01023 9.18244 3.80955 9.68762 3.80955H25.7829V10.9134C25.7829 11.7974 26.134 12.6453 26.7592 13.2704C27.3843 13.8955 28.2321 14.2467 29.1162 14.2467H36.22V38.2857C36.22 38.5361 36.1706 38.784 36.0747 39.0153C35.9788 39.2466 35.8383 39.4567 35.6611 39.6336C35.4839 39.8105 35.2736 39.9508 35.0422 40.0463C34.8108 40.1419 34.5628 40.1909 34.3124 40.1905Z"
                                        fill="white" />
                                    <path
                                        d="M18.1743 16.5715C18.9372 16.5715 19.6829 16.3452 20.3172 15.9214C20.9515 15.4976 21.4459 14.8952 21.7378 14.1904C22.0298 13.4856 22.1061 12.71 21.9573 11.9618C21.8085 11.2136 21.4411 10.5263 20.9017 9.98691C20.3623 9.44748 19.675 9.08012 18.9268 8.93129C18.1786 8.78246 17.403 8.85885 16.6982 9.15079C15.9934 9.44272 15.391 9.9371 14.9672 10.5714C14.5434 11.2057 14.3171 11.9515 14.3171 12.7143C14.3184 13.7369 14.7252 14.7173 15.4483 15.4403C16.1714 16.1634 17.1517 16.5702 18.1743 16.5715ZM18.1743 10.7619C18.5604 10.7619 18.9379 10.8764 19.259 11.091C19.58 11.3055 19.8303 11.6104 19.9781 11.9672C20.1258 12.3239 20.1645 12.7165 20.0892 13.0952C20.0138 13.4739 19.8279 13.8218 19.5548 14.0949C19.2818 14.3679 18.9339 14.5539 18.5552 14.6292C18.1765 14.7045 17.7839 14.6659 17.4271 14.5181C17.0704 14.3703 16.7655 14.1201 16.5509 13.799C16.3364 13.4779 16.2219 13.1005 16.2219 12.7143C16.2227 12.1968 16.4286 11.7006 16.7946 11.3346C17.1606 10.9686 17.6567 10.7627 18.1743 10.7619Z"
                                        fill="white" />
                                    <path
                                        d="M12.5924 23.9524C12.845 23.9524 13.0872 23.852 13.2658 23.6734C13.4444 23.4948 13.5448 23.2526 13.5448 23V22.419C13.546 21.4833 13.9183 20.5863 14.5799 19.9247C15.2416 19.263 16.1386 18.8908 17.0743 18.8895H19.2743C20.21 18.8908 21.107 19.263 21.7686 19.9247C22.4303 20.5863 22.8025 21.4833 22.8038 22.419V23C22.8038 23.2526 22.9041 23.4948 23.0828 23.6734C23.2614 23.852 23.5036 23.9524 23.7562 23.9524C24.0088 23.9524 24.251 23.852 24.4296 23.6734C24.6082 23.4948 24.7086 23.2526 24.7086 23V22.419C24.7068 20.9783 24.1337 19.5971 23.115 18.5784C22.0962 17.5596 20.715 16.9865 19.2743 16.9847H17.0743C15.6336 16.9865 14.2524 17.5596 13.2336 18.5784C12.2149 19.5971 11.6418 20.9783 11.64 22.419V23C11.64 23.2526 11.7403 23.4948 11.9189 23.6734C12.0976 23.852 12.3398 23.9524 12.5924 23.9524Z"
                                        fill="white" />
                                    <path
                                        d="M12.0619 30.921H23.6191C23.8716 30.921 24.1139 30.8207 24.2925 30.642C24.4711 30.4634 24.5714 30.2212 24.5714 29.9686C24.5714 29.716 24.4711 29.4738 24.2925 29.2952C24.1139 29.1166 23.8716 29.0162 23.6191 29.0162H12.0619C11.8093 29.0162 11.5671 29.1166 11.3885 29.2952C11.2099 29.4738 11.1095 29.716 11.1095 29.9686C11.1095 30.2212 11.2099 30.4634 11.3885 30.642C11.5671 30.8207 11.8093 30.921 12.0619 30.921Z"
                                        fill="white" />
                                    <path
                                        d="M30.1571 34.0314H12.0619C11.8093 34.0314 11.5671 34.1317 11.3885 34.3103C11.2099 34.4889 11.1095 34.7312 11.1095 34.9838C11.1095 35.2363 11.2099 35.4786 11.3885 35.6572C11.5671 35.8358 11.8093 35.9361 12.0619 35.9361H30.1571C30.4097 35.9361 30.652 35.8358 30.8306 35.6572C31.0092 35.4786 31.1095 35.2363 31.1095 34.9838C31.1095 34.7312 31.0092 34.4889 30.8306 34.3103C30.652 34.1317 30.4097 34.0314 30.1571 34.0314Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a class="dez-tilte">Send Your Resume</a>
                            <p class="dz-text">Once you find your preferred job, effortlessly submit your resume via the website. <br><br></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 m-b20 icon-wrapper">
                    <div class="icon-bx-wraper style-1">
                        <div class="icon-content">
                            <a class="icon-box text-white m-b20">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M31.6207 16.8638C31.5825 16.334 31.1227 15.9363 30.5921 15.9736C30.0623 16.0118 29.6637 16.4723 29.7018 17.0021C29.7255 17.3294 29.7374 17.6653 29.7374 17.9999C29.7374 25.6683 23.4989 31.9068 15.8306 31.9068C8.1623 31.9068 1.92375 25.6682 1.92375 17.9999C1.92375 10.3317 8.1623 4.09311 15.8306 4.09311C18.8675 4.09311 21.7517 5.05414 24.1711 6.87222C24.5959 7.19129 25.1987 7.10572 25.5179 6.68111C25.8371 6.25642 25.7515 5.65342 25.3268 5.33434C22.5714 3.26385 19.2876 2.16943 15.8306 2.16943C7.10163 2.16936 0 9.271 0 17.9999C0 26.7289 7.10163 33.8304 15.8306 33.8304C24.5597 33.8304 31.6612 26.729 31.6612 17.9999C31.6612 17.6193 31.6474 17.2371 31.6207 16.8638Z"
                                        fill="white" />
                                    <path
                                        d="M34.9028 4.34322C33.4397 2.88022 31.0591 2.88022 29.596 4.34322L15.7367 18.2024L10.8237 13.2893C9.36065 11.8263 6.98001 11.8263 5.51694 13.2893C4.05388 14.7523 4.05388 17.133 5.51694 18.5961L13.9784 27.0575C14.4632 27.5423 15.1 27.7847 15.7367 27.7847C16.3735 27.7847 17.0103 27.5423 17.4951 27.0575L34.9028 9.64984C36.3657 8.18685 36.3657 5.80635 34.9028 4.34322ZM33.5425 8.28965L16.1348 25.6975C15.9154 25.9168 15.5582 25.9168 15.3388 25.6975L6.87735 17.2359C6.16431 16.5229 6.16431 15.3628 6.87735 14.6498C7.23383 14.2931 7.70205 14.115 8.1704 14.115C8.63875 14.115 9.10703 14.2932 9.46344 14.6498L14.5176 19.704C14.8433 20.0296 15.2764 20.2089 15.7368 20.2089C16.1974 20.2089 16.6305 20.0295 16.9561 19.7039L30.9564 5.70348C31.6692 4.99044 32.8295 4.99044 33.5425 5.70348C34.2555 6.41652 34.2555 7.57661 33.5425 8.28965Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a class="dez-tilte">Apply Easily</a>
                            <p class="dz-text">Once your account is set up and your resume is submitted, applying for jobs becomes a breeze.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="back-circle"></div>
    </div>
    <!-- About Work END -->

    </div>

    <!-- Content END-->


    <!-- Import footer  -->
@endsection()
