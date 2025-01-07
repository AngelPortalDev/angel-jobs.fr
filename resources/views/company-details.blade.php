@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content company-details-page-main">
        <!-- inner page banner -->
        <div class=" profile-edit p-t40 p-b20" style="background-image:url(images/banner/bnr1.jpg);">
            <div class="container">
                <div class="row">

                    @foreach ($empData as $compData)
                        <div class="col-lg-12 col-md-12 candidate-info">
                            <div class="candidate-detail">
                                <div class="canditate-des text-center">
                                    @if (!empty($compData->profile_img))
                                        <img alt=''
                                            src='{{ Storage::url("employer/profile_image/$compData->profile_img") }}'>
                                    @else
                                        <img alt='' src='{{ Storage::url('employer/profile_image/employer.png') }}'>
                                    @endif
                                </div>
                                <div class="browse-job text-left w-100">
                                    <h4 class="m-b0 company-name-top">
                                        {{ !empty($compData->company_name) ? $compData->company_name : '' }} </h4>

                                    @if(isset($compData->about_company))
                                    <p class="mt-2 m-b15">{!! htmlspecialchars_decode($compData->about_company) !!}</p>
                                    @endif
                                    {{-- <div class="job-time me-auto">
                                        @if (!empty($compData->industry_name))
                                            <a><span>{{ !empty($compData->industry_name) ? $compData->industry_name : '' }}</span></a>
                                        @endif
                                    </div> --}}
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- inner page banner END -->


        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->
            <div class="py-3">
                <div class="container">
                    <div class="row">


                        <div class="col-lg-8">
                            <!-- Create Account -->
                            <div class="py-4 browse-job bg-white">
                                <div class="container">
                                    <ul class="nav nav-tabs nav-tabs-1" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link site-button active" id="taboverview" data-bs-toggle="tab"
                                                href="#overview" role="tab" aria-controls="overview"
                                                aria-selected="true">overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link site-button" id="tabjobs" data-bs-toggle="tab"
                                                href="#jobs" role="tab" aria-controls="jobs"
                                                aria-selected="false">jobs</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                            aria-labelledby="taboverview">
                                            <div class="job-info-box">
                                                {{-- 
                                                <h5 class="font-weight-600 company-details-h5">About Company</h5>
                                                <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen book. It has survived not only five
                                                    centuries, but also the leap into electronic typesetting.</p> --}}

                                                <h5 class="font-weight-600 company-details-h5">Basic Information</h5>
                                                <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                                                @foreach ($empData as $compData)
                                                    <div class="">
                                                       @if (!empty($compData->company_type_name))
                                                            <div class="  ">
                                                                <label>Company Type: </label>
                                                                <span>{{ $compData->company_type_name }}</span>
                                                            </div>
                                                            @endif
                                                        @if (!empty($compData->company_size_name))
                                                            <div class="  ">
                                                                <label>Company Size: </label>
                                                                <span><a
                                                                        target="_blank">{{ $compData->company_size_name }}</a>

                                                                </span>
                                                            </div>
                                                        @endif
                                                        @if (!empty($compData->industry_name))
                                                            <div class="  ">
                                                                <label>Industry Name: </label>
                                                                <span><a
                                                                        target="_blank">{{ $compData->industry_name}}</a>
                                                                </span>
                                                            </div>
                                                        @endif

                                                        @if (!empty($compData->city_name))
                                                            <div class="  ">
                                                                <label>City: </label>
                                                                <span><a
                                                                        target="_blank">{{ $compData->city_name}}</a>

                                                                </span>
                                                            </div>
                                                        @endif

                                                        @if (!empty($compData->website))
                                                            <div class="  ">
                                                                <label>Website: </label>
                                                                <span><a target="_blank"
                                                                        href="{{ !empty($compData->website) ? url("$compData->website") : '#' }}">{{ $compData->website }}</a>

                                                                </span>
                                                            </div>
                                                        @endif

                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                        {{-- Jobs Display --}}
                                        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="tabjobs">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="job-bx-title clearfix">
                                                        <h5 class="font-weight-700 float-start text-uppercase">
                                                            {{ count($jobData) }} Jobs
                                                            Posted</h5>
                                                        {{-- <div class="float-end">
                                                            <span class="select-title">Sort by freshness</span>
                                                            <select>
                                                                <option>Last 2 Months</option>
                                                                <option>Last Months</option>
                                                                <option>Last Weeks</option>
                                                                <option>Last 3 Days</option>
                                                            </select>
                                                        </div> --}}
                                                    </div>
                                                    <ul class="post-job-bx">
                                                        @php
                                                            $select = ['id', 'email_verified'];
                                                            $where = ['id' => session('js_user_id')];
                                                            $table = 'jobseekers';
                                                            $emailVerfiy = getData($table, $select, $where);

                                                        @endphp
                                                        @foreach ($jobData as $lists)
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

                                                                                    @if (!empty($empData[0]->profile_img))
                                                                                        <img alt=''
                                                                                            src='{{ Storage::url('employer/profile_image/' . $empData[0]->profile_img) }}'>
                                                                                    @else
                                                                                        <img alt=''
                                                                                            src='{{ Storage::url('employer/profile_image/employer.png') }}'>
                                                                                    @endif


                                                                                </span>
                                                                        </div>
                                                                        <div class='job-post-info'>
                                                                            @php
                                                                                $id = base64_encode($lists->id);
                                                                                $emp_id = base64_encode(
                                                                                    $lists->posted_by,
                                                                                );
                                                                            @endphp
                                                                            <h4><a
                                                                                    href='{{ url('job-details-view', $id) }}'>{!! htmlspecialchars_decode($lists->job_title) !!}</a>
                                                                                    @if(isset($lists->work_mode))({{$workModeText}})@endif
                                                                                </h4>
                                                                            <div class='company-name-url'>
                                                                                <span>{{ htmlspecialchars_decode($lists->company_name) }}</span>
                                                                            </div>
                                                                            <ul>
                                                                                <li><i
                                                                                        class='fa-solid fa-briefcase'></i>{{ htmlspecialchars_decode($lists->experiance) }}
                                                                                </li>
                                                                                <li><i class='fas fa-map-marker-alt'></i>
                                                                                    {{ $lists->location_hiring_name }}
                                                                                </li>
                                                                                <li><i class='fa fa-inr'></i>
                                                                                    {{ empty($lists->job_salary_to_name) ? 'Not Disclosed' : $lists->job_salary_to_name }}
                                                                                </li>
                                                                                <br />
                                                                                {{-- <li><i class='far fa-bookmark'></i>{{$lists->job_type_name}} </li> --}}
                                                                                <li class="mt-2"><i
                                                                                        class='far fa-clock'></i>
                                                                                    Published
                                                                                    {{ duration($lists->posted_on) }} ago
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class='d-flex'>
                                                                        <div class='job-time me-auto'>
                                                                            <span>{{ $lists->job_type_name }}</span>
                                                                        </div>
                                                                        {{-- @if ($lists->salary_hide === 'No')
                                         <div class='salary-bx'><span>{{$lists->job_salary_to_name}}</span></div>  
                                      @endif --}}
                                                                        @if (session()->has('js_username'))
                                                                            @php
                                                                                $where = [
                                                                                    'job_id' => $lists->id,
                                                                                    'js_id' => session('js_user_id'),
                                                                                ];
                                                                            @endphp
                                                                            @if (is_exist('job_application_history', $where) > 0)
                                                                                <a class="site-button style-1"
                                                                                    style="white-space:nowrap">Applied</a>
                                                                            @elseif($emailVerfiy[0]->email_verified === 'No')
                                                                                <a href="#"
                                                                                    class="site-button not_verify"
                                                                                    style="white-space:nowrap">Apply Now</a>
                                                                            @elseif (is_exist('jobseeker_view', ['js_id' => session('js_user_id')]) == 0)

                                                                            <a href="#" class="site-button not_updateprofile" style="white-space:nowrap">Apply Now</a>

                                                                            @else
                                                                                <button type="button"
                                                                                    data-job_action="apply"
                                                                                    data-job_id="{{ base64_encode($lists->id) }}"
                                                                                    class="site-button action"
                                                                                    style="white-space:nowrap">Apply
                                                                                    Now</button>
                                                                            @endif
                                                                        @else
                                                                            <a href="{{ route('js_login') }}"
                                                                                class="site-button"
                                                                                style="white-space:nowrap">Apply
                                                                                Now</a>
                                                                        @endif

                                                                    </div>


                                                                    @if (session()->has('js_username'))
                                                                        @php
                                                                            $where = [
                                                                                'job_id' => $lists->id,
                                                                                'js_id' => session('js_user_id'),
                                                                                'is_saved' => 'Yes',
                                                                            ];
                                                                            // echo is_exist('jobseeker_viewed_jobs', $where);
                                                                        @endphp
                                                                        @if (is_exist('jobseeker_viewed_jobs', $where) != 0)
                                                                            <label class='like-btn action'
                                                                                data-is_toggle="No"
                                                                                data-posted_by="{{ base64_encode($lists->posted_by) }}"
                                                                                data-job_action="Saved"
                                                                                data-job_id="{{ base64_encode($lists->id) }}">
                                                                                <i class="fa fa-bookmark"
                                                                                    style="color: #11a1f5;"></i>
                                                                            </label>
                                                                        @else
                                                                            <label class='like-btn action'
                                                                                data-is_toggle="Yes"
                                                                                data-posted_by="{{ base64_encode($lists->posted_by) }}"
                                                                                data-job_action="Unsaved"
                                                                                data-job_id="{{ base64_encode($lists->id) }}">
                                                                                <i class="far fa-bookmark"
                                                                                    style="color: #11a1f5;"></i>
                                                                            </label>
                                                                        @endif
                                                                    @else
                                                                        <label class='like-btn jslogincheck'><input
                                                                                type='checkbox'>
                                                                            {{-- <span class='checkmark '></span> --}}
                                                                            <i class="far fa-bookmark"
                                                                                aria-hidden="true"></i>
                                                                        </label>
                                                                    @endif

                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    {{-- <div class="pagination-bx style-1 m-t30">
                                                        <ul class="pagination">
                                                            <li class="previous"><a href="javascript:void(0);"><i
                                                                        class="ti-arrow-left"></i> Prev</a></li>
                                                            <li class="active"><a href="javascript:void(0);">1</a></li>
                                                            <li><a href="javascript:void(0);">2</a></li>
                                                            <li><a href="javascript:void(0);">3</a></li>
                                                            <li class="next"><a href="javascript:void(0);">Next <i
                                                                        class="ti-arrow-right"></i></a></li>
                                                        </ul>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                        {{-- Jobs Display end --}}
                                    </div>
                                </div>
                            </div>
                            <!-- Create Account END -->
                        </div>

                        @foreach ($empData as $compData)
                            <div class="col-lg-4">
                                <div class="sticky-top">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                                <ul>
                                                    <li><i class="ti-location-pin"></i>
                                                        <strong class="font-weight-700 text-black">Address</strong>
                                                        <span class="text-black-light">
                                                            {{ !empty($compData->address) ? $compData->address . ',' : '' }}
                                                            {{ !empty($compData->city_name) ? $compData->city_name . ',' : '' }}
                                                            {{ !empty($compData->country_name) ? $compData->country_name : '' }}
                                                        </span>
                                                    </li>
                                                    {{-- <li><i class="ti-money"></i><strong
                                                        class="font-weight-700 text-black">Salary</strong> $800 Monthy</li>
                                                <li><i class="ti-shield"></i><strong
                                                        class="font-weight-700 text-black">Experience</strong>6 Year
                                                    Experience</li> --}}
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class=" bg-white p-lr20 py-3  radius-sm">
                                                <ul class="list-inline m-a0">
                                                    @if (!empty($compData->facebook))
                                                        <li><a target="_blank"
                                                                href="{{ !empty($compData->facebook) ? url("$compData->facebook") : '' }}"
                                                                class="site-button white facebook circle "><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if (!empty($compData->linkedin))
                                                        <li><a target="_blank"
                                                                href="{{ !empty($compData->linkedin) ? url("$compData->linkedin") : '' }}"
                                                                class="site-button white linkedin circle "><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                    @endif
                                                    @if (!empty($compData->instagram))
                                                        <li>
                                                            <a target="_blank"
                                                                href="{{ !empty($compData->instagram) ? url("$compData->instagram") : '' }}"
                                                                class="site-button white instagram circle "><i
                                                                    class="fab fa-instagram"></i></a>
                                                        </li>
                                                    @endif
                                                    {{-- <li><a target="_blank" href="{{ !empty($compData->instagram) ?  url("$compData->instagram") : ''}}" class="site-button white twitter circle "><i class="fab fa-twitter"></i></a></li> --}}
                                                </ul>
                                            </div>

                                        </div>




                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail -->

    </div>
    </div>
    <!-- Content END-->




    <!-- Import footer  -->
@endsection()
