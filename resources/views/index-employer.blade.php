@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- Section Banner -->
        <div class="content-inner-1 main-bnr emp-hero-banner">
            <div class="bg-circle-bx"></div>
            <div class="container">
                <div class="row" style="justify-content: space-between;">
                    <div class="col-lg-7">
                        <div class="banner-content ">
                            <h1> <span class="text-primary">Recruit Smarter:</span> <br> Your Gateway to Top Talent.</h1>
                            <a href="{{ session()->has('emp_username') ? route('post-job') : route('emp_login') }}">
                                <button class="site-button style-1" type="button"><b>Post a Job for Free*</b></button>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-5 mb-3">
                        <div class="banner-media">
                            <div class="banner-main-media banner-main-media-emp">
                                <img src="{{ asset('images/employer-hero-section.png') }}" alt="">

                            </div>
                            {{-- <div class="banner-media-bg">
                        <div class="bnr-circle1">
                            <img src="images/banner/microsoft.svg" class="banner-icon1" alt="">
                        </div>
                        <div class="bnr-circle2">
                            <img src="images/banner/google.svg" class="banner-icon1" alt="">
                            <img src="images/banner/logo.svg" class="banner-icon2" alt="">
                            <img src="images/banner/amazon.svg" class="banner-icon3" alt="">
                        </div>
                        <div class="bnr-circle3"></div>
                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="back-circle"></div>
            <div class="back-circle2"></div>
        </div>
        <!-- Section Banner END -->


        <!-- Partners -->
        <div class="section-full content-inner-partner-1 partners bg-white style-1">
            <div class="container">
                <div class="our-partners item-center owl-loaded owl-theme owl-carousel owl-none mfp-gallery owl-dots-none">
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/icici.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/jio.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/tech_mahindra.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/genpact.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/lti_mindtree.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/hindustan.png') }}" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="javascript:void(0);" class="partners-media">
                            <img src="{{ asset('images/hiring_companies/adani.png') }}" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- Partners End-->


        <!-- Latest jobs -->
        <div class="section-full latest-jobs content-inner-1 bg-white pb-5">
            <div class="container">
                <div class="latest-jobs-inner">
                    <div class="section-head style-1">
                        <h6>Candidates</h6>
                        <h2 class="section-title-3">Featured Candidates</h2>
                        <p class="dz-text-2">More Than 500+ Jobseekers Everyday</p>
                    </div>
                    {{-- <a href="javascript:void(0);" class="site-button style-1">Post a Job</a>	 --}}
                </div>
                <div class="row sp20 m-b20">
                    <div class="col-md-12">
                        <ul class="post-job-bx browse-job-grid post-resume row">
                            @php
                            
                            $paymentData = getData('jobseeker_payments', ['js_id'], ['status' => '3']);
                            $paymentJsIds = collect($paymentData)->pluck('js_id')->toArray();                      
                           
                            $jsData = getData('jobseeker_view', ['js_id', 'is_delete', 'experiance_name', 'skill', 'email_verified', 'fullname', 'role_name', 
                                'company_name', 'prefered_location_name', 'expected_salary_name', 'pref_job_type_name', 'notice_name'], 
                                ['email_verified' => 'Yes','is_delete' => 'No',['skill', '!=', null],['prefered_job_type', '!=', null],['qul_id', '!=', null],['notice_period', '!=', null],['prefered_location', '!=', null],['total_exp_year', '!=', null]], 6, 'updated_at', $order_dirc = 'DESC');
                            
                            $jsDataWithPayment3 = $jsData->filter(function($item) use ($paymentJsIds) {
                                return in_array($item->js_id, $paymentJsIds);
                            });                        
                            $jsDataWithoutPayment3 = $jsData->filter(function($item) use ($paymentJsIds) {
                                return !in_array($item->js_id, $paymentJsIds);
                            });                       
                            
                            $sortedJsData = $jsDataWithPayment3->merge($jsDataWithoutPayment3);
                        @endphp
                           
                            @foreach ($sortedJsData as $data)
                            
                                @if ($data->email_verified == 'Yes')
                                    <li class="col-lg-4 col-md-4">
                                        <div class="post-bx">
                                            <div class="d-flex m-b20">
                                                <div class="job-post-info">
                                                    <h5 class="m-b0">
                                                        @if (session()->has('emp_username'))
                                                        <a
                                                            href="{{route('emp-js-view', base64_encode($data->js_id))}}">{{ isset($data->fullname) ? $data->fullname : '' }}</a>
                                                        @else
                                                        <a>{{ isset($data->fullname) ? $data->fullname : '' }}</a>
                                                          @endif
                                                          @if (in_array($data->js_id, $paymentJsIds))
                                                          <img src="{{asset('images/premium_badge_new.svg')}}" alt="Premium Member" class="premium-badge" style="width:25px; height:25px; margin-left: 5px;">
                                                          @endif
                                                        </h5>

                                                    @if ($data->experiance_name !== 'Fresher')
                                                        <p class="m-b5 font-13">
                                                            <a class="text-primary" class="inactiveLink"
                                                                style=" text-decoration: none;">
                                                                <i class="fa-solid fa-user me-1"></i> {{ isset($data->role_name) ? $data->role_name : 'Not Disclosed' }}
                                                            </a>
                                                            @if(!empty($data->company_name))
                                                              at  {{$data->company_name}}
                                                              @endif
                                                           
                                                        </p>
                                                    @else
                                                        <p class="m-b5 font-13">
                                                            <a class="text-primary" class="inactiveLink"
                                                                style=" text-decoration: none;">
                                                                {{ isset($data->role_name) ? $data->role_name : '' }}
                                                            </a>

                                                            {{ $data->experiance_name !== 'Fresher' ? $data->company_name : 'Fresher' }}
                                                        </p>
                                                    @endif

                                                    <ul>
                                                        <li><i
                                                                class="fas fa-map-marker-alt"></i>
                                                                {{ isset($data->prefered_location_name) && $data->prefered_location_name ? $data->prefered_location_name . ', India' : 'Not Disclosed' }}</li>
                                                        <li> <i class="fas fa-euro-sign" style="font-size: 12px"></i>
                                                            {{ isset($data->expected_salary_name) ? $data->expected_salary_name : 'Not Disclosed' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="job-time m-t15 m-b10">
                                                <a><span>{{ isset($data->pref_job_type_name) ? $data->pref_job_type_name : '' }}</span></a>
                                                <a><span>{{ isset($data->notice_name) ? $data->notice_name : '' }}</span></a>
                                            </div>
                                            {{-- <a href="files/pdf-sample.pdf" target="blank" class="job-links">
                                        <i class="fa fa-download"></i>
                                    </a> --}}
                                            @php
                                                $where = [
                                                    'js_id' => $data->js_id,
                                                    'employer_id' => session('emp_user_id'),
                                                    'is_shortlisted' => 'Yes',
                                                ];

                                            @endphp

                                            @if (is_exist('job_application_history', $where) != 0)
                                                <label class="like-btn shortlist" data-is_toggle="No"
                                                    data-short_action="{{ base64_encode('No') }}"
                                                    data-js_id="{{ base64_encode($data->js_id) }}" data-job_id=""
                                                    title="" data-bs-toggle="tooltip" data-placement="right"
                                                    data-bs-original-title="Not Shortlist">
                                                    <i class="fa fa-bookmark" style="color: #11a1f5;"></i>

                                                </label>
                                            @else
                                                @if(session()->has('emp_username'))
                                                    <label class="like-btn shortlist" data-is_toggle="Yes"
                                                        data-short_action="{{ base64_encode('Yes') }}"
                                                        data-js_id="{{ base64_encode($data->js_id) }}" data-job_id=""
                                                        title="" data-bs-toggle="tooltip" data-placement="right"
                                                        data-bs-original-title="Shortlist">
                                                        <i class="far fa-bookmark" style="color: #11a1f5;"></i>
                                                    </label>
                                                @else
                                                        <label class="like-btn shortlist jsloginempcheck" data-is_toggle="Yes"
                                                        data-short_action=""
                                                        data-js_id="" data-job_id=""
                                                        title="" data-bs-toggle="tooltip" data-placement="right"
                                                        data-bs-original-title="Shortlist">
                                                        <i class="far fa-bookmark" style="color: #11a1f5;"></i>
                                                    </label>
                                                @endif
                                            @endif

                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="jobs-btn">
                    @if (session()->has('emp_username'))
                        <a href="{{ route('browse-jobseeker') }}" class="site-button style-1">All Candidates</a>
                    @else
                        <a href="{{ route('emp_login') }}" class="site-button style-1">All Candidates</a>
                    @endif

                </div>
            </div>
        </div>
        <!-- Latest jobs END -->









    </div>
    <!-- Content END-->


    <!-- Import footer  -->
@endsection()
