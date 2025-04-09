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
                            <div class="job-bx job-profile">
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 float-start text-uppercase">Education</h5>
                                      <a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_edit"><i
                                        class="fas fa-pencil-alt m-r5"></i> Edit</a>
                                <a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_view" style="display: none;"><i
                                class="fas fa-pencil-alt m-r5"></i> View</a>
                                </div>
                                @foreach ($eduDetails as $eduDetail)
                                  
                               
                                <form id="eduDetails">
                                    <div class="row m-b30">
										<div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Qualification<span class="imp-field-star"> *</span></label>
                                                 <select class="slec d-none" id="qual_name" name="qual_name">
                                                     @if (!empty($eduDetail->qul_id))

                                                    <option value="{{ $eduDetail->qul_id }}" selected>{{ isset($eduDetail->qual_name) ? $eduDetail->qual_name : '' }}</option>
													@else
														<option value="" selected>Select Qualification</option>
													@endif

                                                   
                                               
													@foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $qual)
												        <option value='{{ $qual->id}}'>{{ $qual->educational_qualification}}</option>
													@endforeach
                                                </select>
                                                  <input type="text" class="form-control-plaintext textveiw" value="{{ isset($eduDetail->qual_name) ? $eduDetail->qual_name : '' }}" placeholder="Select Qualification"  readonly>
                                                <span id="qual_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Qualification </i>
												</small>
											</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Institute/University </label>
                                                <input type="text" class="form-control-plaintext" id="inst_name" name="inst_name" value="{{ isset($eduDetail->institute_name) ? $eduDetail->institute_name : ''   }}" placeholder="Enter Name" readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Professional Title <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" id="prof_tile" name="prof_tile" value="{{ isset($eduDetail->professional_title) ? $eduDetail->professional_title : 'NA'   }}" placeholder="Professional Title">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Specialization </label>
                                                <input type="text" class="form-control-plaintext" id="spec" name="spec" value="{{ isset($eduDetail->specilization) ? $eduDetail->specilization : ''   }}" placeholder="Enter Specialization" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Passing Year</label>
                                                 <input type="date" class="form-control-plaintext" id="passing_year" name="passing_year" value="{{ isset($eduDetail->passing_year) ? $eduDetail->passing_year : ''   }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="site-button m-b30 d-none submitButton" type="button" id="eduSubmit">Submit</button>
                                </form>
                                 @endforeach
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
