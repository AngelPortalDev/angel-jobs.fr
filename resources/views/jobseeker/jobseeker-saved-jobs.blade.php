@extends('layouts.main')
@section('content')
    <style>
        input:focus {
            outline: none;
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
							<div class="job-bx save-job table-job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 float-start text-uppercase">
										@if(count($savedJobs) > 0)
										{{count($savedJobs)}} Saved Jobs</h5>
										@else
										No jobs saved yet
										@endif
									{{-- <div class="float-end" style="display: initial!important;">
										<span class="select-title">Sort by</span>
											<select class="">
											<option>Last 2 Months</option>
											<option>Last Months</option>
											<option>Last Weeks</option>
											<option>Last 3 Days</option>
										</select>
									</div> --}}
								</div>
									<ul class="post-job-bx browse-job">
									@foreach ($savedJobs as $data)
												@php
													$id = base64_encode($data->job_id);
												@endphp
								<li>
									<div class="post-bx">
										<div class="job-post-info m-a0">
											<h4><a href='{{ url('job-details-view', $id)}}' target="_blank">{{htmlspecialchars_decode($data->job_title)}}</a></h4>
											<ul>
												<li>{{htmlspecialchars_decode($data->company_name)}}</li>
												<li><i class="fas fa-map-marker-alt"></i> {{htmlspecialchars_decode($data->location_hiring_name)}}</li>
												@if ($data->salary_hide === 'No')
													<li><i class="far fa-money-bill-alt"></i> {{empty($data->job_salary_to_name) ? 'Not Disclosed' :  htmlspecialchars_decode($data->job_salary_to_name)}}</li>
												@endif
											</ul>
											{{-- <div class="job-time m-t15 m-b10">
												<a href="javascript:void(0);"><span>PHP</span></a>
												<a href="javascript:void(0);"><span>Angular</span></a>
												<a href="javascript:void(0);"><span>Bootstrap</span></a>
												<a href="javascript:void(0);"><span>Wordpress</span></a>
											</div> --}}
											<div class="posted-info clearfix d-inline-block">
												<p class="m-tb0 text-primary float-start"><span class="text-black m-r10">Saved On:</span> {{htmlspecialchars_decode($data->saved_on)}}</p>
												

										
											</div>

											<a href="javascript:void(0);" class="site-button button-sm float-end action" data-is_toggle='No' data-posted_by='{{ base64_encode($data->employer_id)}}'
												data-job_action='Saved' data-dashjs='0' data-job_id='{{ base64_encode($data->job_id)}}'>Unsaved</a>


											{{-- Saved jobs Button --}}
											{{-- @php
											$where = ['job_id'=>$data->id,'js_id'=>session('js_user_id'), 'is_saved'=>'Yes'];
											// echo is_exist('jobseeker_viewed_jobs', $where);
											@endphp

											@if (is_exist('jobseeker_viewed_jobs', $where) != 0)
											<label class='like-btn action' data-is_toggle="No" data-posted_by="{{ base64_encode($data->posted_by)}}" data-job_action="Saved"
													data-job_id="{{ base64_encode($data->id)}}">
													<i class="fa fa-bookmark" style="color: #11a1f5;"></i>
												</label>
											@else
											<label class='like-btn action' data-is_toggle="Yes" data-posted_by="{{ base64_encode($data->posted_by)}}"
													data-job_action="Unsaved" data-job_id="{{ base64_encode($data->id)}}">
													<i class="far fa-bookmark" style="color: #11a1f5;"></i>
											</label>
											@endif --}}

										</div>
									</div>
								</li>
									@endforeach
							</ul>
								{{-- <div class="pagination-bx float-end">
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
            </div>
            <!-- Browse Jobs END -->
        </div>
    </div>
    <!-- Content END-->












    <!-- Import footer  -->
@endsection()
