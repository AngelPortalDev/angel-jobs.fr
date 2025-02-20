@extends('layouts.main')
@section('content')
    <style>
        input:focus {
            outline: none;
        }
		@media only screen and (max-width: 767px) {
		.section-full:last-child{
			padding-top: 0px;
		}
	}
    </style>
    <!-- Content -->

    <div class="page-content bg-white">
        {{-- Jobseeker Profile Top  --}}
        @include('layouts/jobseeker-Profile-top')
		
    </div>
	
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full bg-white browse-job p-t50 p-b20">
                <div class="container">
                    <div class="row">
                        {{-- Left Menu --}}
                        <div class="col-xl-3 col-lg-4 m-b30">
                            @include('layouts/jobseeker-left-menu')
                        </div>
                        {{-- Left Menu end --}}
						<div class="col-xl-9 col-lg-8 m-b30">
							<div class="job-bx-title clearfix">
								<h5 class="font-weight-700 float-start text-uppercase">
									@if(count($appliedJobs) > 0)
										{{count($appliedJobs)}} Applied Jobs</h5>
										@else
										No jobs applied yet
										@endif
									
									
								{{-- <div class="float-end">
									<span class="select-title">Sort by</span>
									<select>
										<option>Last 2 Months</option>
										<option>Last Months</option>
										<option>Last Weeks</option>
										<option>Last 3 Days</option>
									</select>
								</div> --}}
							</div>
							<ul class="post-job-bx browse-job">
									@foreach ($appliedJobs as $data)
												@php
													$id = base64_encode($data->job_id);
												@endphp
								<li>
									<div class="post-bx">
										<div class="job-post-info m-a0">
											@if($data->is_deleted == 'Yes')
												<h4>{!! htmlspecialchars_decode($data->job_title) !!}  <span style="color: red; font-size: 14px; margin-left: 10px;">(Job No Longer Available)</span></h4>
											@else
												<h4><a href='{{ url('job-details-view', $id)}}' target="_blank">{!! htmlspecialchars_decode($data->job_title) !!}</a></h4>
											@endif
											<ul>
												<li>{{htmlspecialchars_decode($data->company_name)}}</li>
												<li><i class="fas fa-map-marker-alt"></i> {{htmlspecialchars_decode($data->location_hiring_name)}}</li>
												@if (isset($data->job_type_name) && !empty($data->job_type_name) )
													<li> <i class='fas fa-tasks'></i><span>{{ $data->job_type_name}}</span></li>
												@endif
											</ul>
											{{-- <div class="job-time m-t15 m-b10">
												<a href="javascript:void(0);"><span>PHP</span></a>
												<a href="javascript:void(0);"><span>Angular</span></a>
												<a href="javascript:void(0);"><span>Bootstrap</span></a>
												<a href="javascript:void(0);"><span>Wordpress</span></a>
											</div> --}}
											<div class="posted-info clearfix d-inline-block">
												<p class="m-tb0 text-primary float-start"><span class="text-black m-r10">Applied On:</span> {{htmlspecialchars_decode($data->applied_on)}}</p>
												{{-- <a href="jobs-my-resume.html" class="site-button button-sm float-end">Apply Job</a> --}}
											</div>
										</div>



									</div>
								</li>
									@endforeach
							</ul>
							{{-- <div class="pagination-bx m-t30">
								<ul class="pagination">
									<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
									<li class="active"><a href="javascript:void(0);">1</a></li>
									<li><a href="javascript:void(0);">2</a></li>
									<li><a href="javascript:void(0);">3</a></li>
									<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
								</ul>
							</div> --}}
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
