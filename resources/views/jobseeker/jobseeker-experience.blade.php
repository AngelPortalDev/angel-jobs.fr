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
                            <div class="job-bx job-profile">
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 float-start text-uppercase">Work Experience</h5>
                                     <a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_edit"><i
                                        class="fas fa-pencil-alt m-r5"></i> Edit</a>
                                <a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_view" style="display: none;"><i
                                class="fas fa-pencil-alt m-r5"></i> View</a>
                                </div>
                                @php
                                    $getfersherinfo =  is_exist('jobseeker_view',['js_id'=> session()->get('js_user_id'),'experiance_name'=> 'Fresher']);
                                @endphp
                                @if ($getfersherinfo === 0)
                                 @foreach ($expDetails as $expDetail)
                                <form id="addExpDetails">
                                    <div class="row m-b30">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Company Name<span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" value="{{ isset($expDetail->company_name) ? $expDetail->company_name : '' }}"  name="com_name" id="com_name" value="" placeholder="Company Name" readonly>
                                                <span id="com_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Company Name </i>
												</small>
											</span>
                                            </div>
                                        </div>
										<div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Designation </label>
                                                <select class="slec d-none" name="desig" id="desig">
                                                    @if (isset($expDetail->work_desination_id))
			<option value="{{ $expDetail->work_desination_id }}" selected>{{ isset($expDetail->work_desination_name) ? $expDetail->work_desination_name : '' }}</option>
													@else
														<option value="" disabled selected>Select Designation</option>
													@endif
													@foreach ($desig as $desigs)
												        <option value='{{ $desigs->id}}'>{{ $desigs->role_name}}</option>
													@endforeach
                                                </select>
                                    <input type="text" class="form-control-plaintext textveiw" value="{{ isset($expDetail->work_desination_name) ? $expDetail->work_desination_name : '' }}" placeholder="Select Designation"  readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Monthly Salary (&#8364;)<span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" name="annual_sal" id="annual_sal" value="{{ isset($expDetail->annual_salary) ? $expDetail->annual_salary : 'NA' }}" placeholder="Enter Salary">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Joining Date </label>
                                                <input type="date" class="form-control-plaintext" name="jdate" id="jdate" value="{{ isset($expDetail->joining_date) ? $expDetail->joining_date : 'NA' }}" placeholder="Select Date" readonly>
                                                <span id="jdate_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Joining Date should be less than today date </i>
                                                    </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Ending Date </label>
                                                <input type="date" class="form-control-plaintext" name="end_date" id="end_date" value="{{ isset($expDetail->ending_date) ? $expDetail->ending_date : 'NA' }}" placeholder="Select Date" readonly>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <button class="site-button m-b30 submitButton d-none" id="expSubmit">Submit</button>
                                </form>
                                    @endforeach
                                     @else
                                    <h4>Fresher</h4>
                                @endif
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
