@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full bg-white p-t50 p-b20">
                <div class="container">

                    <div class="row">
                        {{-- Left Menu --}}
                        <div class="col-xl-3 col-lg-4 m-b30">
                            @include('layouts/employer-left-menu')
                        </div>
                        {{-- Left Menu end --}}
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <div class="job-bx clearfix">
                                <div class="job-bx-title clearfix">
                                    @if(count($shortlisted) > 0)
									<h5 class="font-weight-700 float-start text-uppercase">{{$totalCount}} Jobseekers Shortlisted</h5>
									@else
									<h5 class="font-weight-700 float-start text-uppercase">No Shortlisted Jobseekers yet</h5>
									@endif
                                    {{-- <a href="#" class="site-button button-sm float-end "><i class="fas fa-pencil-alt m-r5"></i> Edit</a> --}}
                                </div>
                                <ul class="post-job-bx browse-job-grid post-resume row">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($shortlisted as $shortlist)

                                        @php
                                            $js_id = base64_encode($shortlist->js_id);
                                            $job_id = base64_encode($shortlist->job_id);
                                            $action = base64_encode('No');
                                            // $imagePath = storage_path("jobseeker/profile_image/{$shortlist->profile_img}",);
                                            $imagePath = 'storage/jobseeker/profile_image/' . $shortlist->profile_img;
                                            $duration = duration($shortlist->updated_at);
                                        @endphp
                                        <li class="col-lg-12 col-md-12" id='candidate_{{ $i }}'>
                                            <div class="post-bx">
                                                <div class="d-flex m-b20">
                                                    <div class="jobseeker-photo-for-applied">
                                                        <span>

                                                            @if (Storage::exists($imagePath))
                                                            @if (isset($shortlist->profile_img) && !empty($shortlist->profile_img))
                                                                <img alt=""
                                                                    src="{{ Storage::url('jobseeker/profile_image/' . $shortlist->profile_img) }}">
                                                            @else
                                                                <img alt=""
                                                                    src="{{ asset('images/user_profile.png') }}">
                                                            @endif
                                                        @else
                                                            <img alt=""
                                                                src="{{ asset('images/user_profile.png') }}">
                                                        @endif

                                                        </span>
                                                    </div>
                                                    <div class="job-post-info">
                                                        <h5 class="m-b0"><a
                                                                href="{{ route('emp-js-view', $js_id) }}">{{ $shortlist->fullname }}</a>
                                                                @if (!empty($shortlist->status) && $shortlist->status == 3)
                                                                @php
                                                                    $expiredat = getData('jobseeker_profiles',['js_id', 'plan_expired_on'],['js_id' => base64_decode($js_id)]);
                                                                @endphp
                                                                @if ($expiredat[0]->plan_expired_on >= date('Y-m-d'))
                                                                    <img src= "{{ asset('images/premium_badge_new.svg') }}"
                                                                        alt='Premium Member' class='premium-badge'
                                                                        style='width:25px; height:25px; margin-left: 5px;'>
                                                                @endif
                                                            @endif
                                                        </h5>

                                                        <ul>
                                                            <li><i class='fas fa-map-marker-alt'></i> {{ (!empty($shortlist->prefered_location_name) ? $shortlist->prefered_location_name : 'Not Disclosed') }}</li>
                                                            <li><i class='fa-solid fa-business-time'></i> {{ (!empty($shortlist->experiance_name) ? $shortlist->experiance_name : 'Not Disclosed')  }}</li>
                                                            <li><i class='fas fa-euro-sign'></i> {{(!empty($shortlist->expected_salary_name) ? $shortlist->expected_salary_name : 'Not Disclosed')  }}</li>
                                                             <li><i class='far fa-clock'></i> Active {{  $duration }} ago</li> 
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="job-time m-t15 m-b10">
                                                    <a href="{{ route('emp-js-view', $js_id) }}"><span>Show JobseekerDetails</span></a>
                                                    <a href="javascript:void(0);" data-js_id="{{ $js_id }}" data-short_action="{{ $action }}"data-job_id="{{ $job_id }}" data-row="{{ $i }}"class="shortlist"><span>Reject</span></a></div>
                                                {{-- <a href="files/pdf-sample.pdf" target="blank" class="job-links">
												<i class="fa fa-download"></i>
											</a> --}}
                                            </div>
                                        </li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach

                                </ul>
                                <div class="pagination-bx float-end">
                                    {{$shortlisted->links()}}
								</div>
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
