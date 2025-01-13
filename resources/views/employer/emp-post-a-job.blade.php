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
                            <div class="job-bx submit-resume">
                                <div class="job-bx-title clearfix">

                                    @foreach ($plan_details as $plan_detail)
                                        @php

                                            if ($plan_detail->plan_expired_on >= date('Y-m-d')) {
                                                $totalposting =
                                                    $plan_detail->free_assign_job_posting +
                                                    $plan_detail->left_credit_job_posting_plan;
                                                $tooltip = "Free Credit : $plan_detail->free_assign_job_posting, Plan Credit : $plan_detail->left_credit_job_posting_plan";
                                            } else {
                                                $tooltip = 'Free Credit : 0, Plan Credit : 0';
                                                $totalposting = '0';
                                            }
                                        @endphp
                                        <h5 class="font-weight-700 float-start text-uppercase">Post A Job</h5>
                                        <p class="site-button button-sm float-end btn-success" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ $tooltip }}" style="white-space: normal">
                                            {{ $totalposting }} Job
                                            Posting Left</p>
                                    @endforeach
                                </div>
                                @if (is_exist('employers', ['id' => Session::get('emp_user_id'), 'email_verified' => 'Yes']) != 0)
                                    @if ($totalposting > 0 && $plan_detail->plan_expired_on >= date('Y-m-d'))
                                    @if ($plan_detail->pan_no != '')
                                        <form id="addJobForm">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Job Title <span class="imp-field-star">*</span></label>
                                                        <input type="text" class="form-control" id="job_title"
                                                            name="job_title" placeholder="Enter Job Title">
                                                        <span id="job_title_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please enter job title </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Job Type <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_type" name="job_type">
                                                            <option value="" selected>Select Job Type</option>
                                                            @foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
                                                                <option value="{{ $job_type->id }}">
                                                                    {{ $job_type->job_type }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_type_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select job type </i>
                                                            </small></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Required Language <span
                                                                class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_lang" name="job_lang[]" size="3" multiple data-live-search="true">
                                                            @foreach (getDropDownlist('languages', ['id', 'skill_language']) as $language)
                                                                <option value="{{ $language->id }}">
                                                                    {{ $language->skill_language }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_lang_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select required language </i>
                                                            </small>
                                                        </span>
                                                        <span id="language_error_limit" style="color:red;display:none;">
                                                            <small>
                                                                <i>You can only select up to 3 language.</i>
                                                            </small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Industry <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_indus" name="job_indus" data-live-search="true">
                                                            <option value="" selected disabled>Select Industry
                                                            </option>
                                                            @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $indus)
                                                                <option value="{{ $indus->id }}" >
                                                                    {{ $indus->industries_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_indus_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select industry </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Function Area <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_func_area" name="job_func_area" data-live-search="true">
                                                            <option value="" selected disabled>Select Function Area
                                                            </option>
                                                            @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_area)
                                                                <option value="{{ $functional_area->id }}">
                                                                    {{ $functional_area->functional_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_func_area_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select function area </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Designation <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_designation" name="job_designation" data-live-search="true">
                                                            <option value="" selected disabled>Select Designation
                                                            </option>
                                                            @foreach (getDropDownlist('designations', ['id', 'role_name']) as $designations)
                                                                <option value="{{ $designations->id }}">
                                                                    {{ $designations->role_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_designation_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select designation </i>
                                                            </small></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label>Experience <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_expr" name="job_expr" data-live-search="true">
                                                            <option value="" selected disabled>Select Experience
                                                            </option>
                                                            @foreach (getDropDownlist('experiances', ['experiance', 'id']) as $experiance)
                                                                <option value="{{ $experiance->id }}">
                                                                    {{ $experiance->experiance }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_expr_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please Select experience </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label>Salary Range (Monthly)</label>
                                                        <select class="slec" id="job_sal" name="job_sal" data-live-search="true">
                                                            <option value="" selected>Select Salary Range</option>
                                                            @foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $salary_range)
                                                                <option value="{{ $salary_range->id }}">
                                                                    {{ $salary_range->salary_range }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="show-hide-check-emp sal_disply d-none">
                                                            <input type="checkbox" id="job_sal_hide" name="job_sal_hide"
                                                                value="Yes">&nbsp;&nbsp;
                                                            <span>Hide from Job Seekers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Hiring Location <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_location" name="job_location" data-live-search="true">
                                                            @foreach (getDropDownlist('cities', ['id', 'city_name']) as $city)
                                                                <option value="{{ $city->id }}">{{ $city->city_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_location_error_limit"
                                                            style="color:red;display:none;">
                                                            <small>
                                                                <i>You can only select up to 3 locations.</i>
                                                            </small>
                                                        </span>
                                                        <span id="job_location_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select location </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Shift Time <span class="imp-field-star">*</span></label>
											<select id="job_shift" name="job_shift">
												<option value="">Select Shift Time</option>
												@foreach ($shift_types as $shift_type)
												<option value="{{ $shift_type->id}}">{{ $shift_type->shift_type}}
												</option>
												@endforeach
											</select>
											<span id="job_shift_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Shift Time </i>
												</small></span>
										</div>
									</div> --}}
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="slec" id="job_gender" name="job_gender[]" multiple >
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        {{-- <span id="job_gender_error" style="color:red;display:none;">
												<small>
													<i>Please Select Gender </i>
												</small></span> --}}
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Vacancy Open From </label>
											<input type="date" id="job_start" name="job_start" class="form-control">
										</div>
									</div> --}}
                                                {{-- <div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Vacancy Expired On </label>
											<input type="date" id="job_end"  name="job_end" class="form-control">
											
										</div>
									</div> --}}
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>No. of Vacancies <span
                                                                class="imp-field-star">*</span></label>
                                                        <input type="number" id="vacancy_count" min="1"
                                                            name="vacancy_count" class="form-control"
                                                            placeholder="No of Vacancies">
                                                        <span id="vacancy_count_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Enter No. of Openings Not less then 1 </i>
                                                            </small></span>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Select  Work Mode <span
                                                                class="imp-field-star">*</span></label>
                                                        <select class="slec" id="select_work_mode" name="select_work_mode[]" multiple>
                                                            <option value="1">Remote</option>
                                                            <option value="2">WFO</option>
                                                            <option value="3">Hybrid</option>
                                                        </select>
                                                        <span id="select_work_mode_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Select Work Mode Not less then 1 </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Desired Candidate Profile -->
                                            <div class="job-bx-title clearfix">
                                                <h5 class="font-weight-700 float-start text-uppercase">Desired Candidate
                                                    Profile
                                                </h5>
                                            </div>
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Skills <span class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_skills" size="3" name="job_skills[]"
                                                            multiple data-live-search="true">
                                                            @foreach (getDropDownlist('key_skills', ['id', 'key_skill_name']) as $key_skill)
                                                                <option value="{{ $key_skill->id }}">{{ $key_skill->key_skill_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_skills_error_limits"
                                                            style="color:red;display:none;">
                                                            <small>
                                                                <i>You can only select up to 8 skills.</i>
                                                            </small>
                                                        </span>
                                                        <span id="job_skills_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select skills </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Job Description: <span
                                                                class="imp-field-star">*</span></label>
                                                        {{-- <textarea class="form-control" id="job_disc" name="job_disc" placeholder="Please enter job description"></textarea> --}}
                                                        <div id="quill-editor" class="mb-3" style="height: 300px;">
                                                           
                                                        </div>
                                                        <input type="hidden" name="job_disc" id="job_disc">
                                                        <span id="job_disc_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please Job Description </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Qualification Details -->
                                            <div class="job-bx-title clearfix">
                                                <h5 class="font-weight-700 float-start text-uppercase">Qualification
                                                    Details</h5>
                                            </div>
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Required Qualification <span
                                                                class="imp-field-star">*</span></label>
                                                        <select class="slec" id="job_educ" name="job_educ">
                                                            <option value="" selected disabled>Select Qualification
                                                            </option>
                                                            @foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $qualification)
                                                                <option value="{{ $qualification->id }}">
                                                                    {{ $qualification->educational_qualification }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span id="job_educ_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select qualification </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label> Specialization <span class="imp-field-star"></span></label>
                                                        <input type="text" id="job_spec" name="job_spec"
                                                            class="form-control" placeholder="Enter Specialization">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Qualification Details -->
                                            <div class="job-bx-title clearfix">
                                                <h5 class="font-weight-700 float-start text-uppercase">Contact Details</h5>
                                            </div>
                                            <div class="row m-b30">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Contact Person <span class="imp-field-star">*</span></label>
                                                        <input type="text" id="job_con_person" name="job_con_person"
                                                            class="form-control" placeholder="Enter Name">
                                                        <span id="job_con_person_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please select contact person </i>
                                                            </small></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Mobile No <span class="imp-field-star">*</span></label>
                                                        <div class="row m-b30">
                                                            <div class="col-2 " style="padding-right: 0;">
                                                                <input type="text" disabled
                                                                    class="form-control-plaintext " value="+33"
                                                                    maxlength="10">
                                                                {{-- <div class="dropdown bootstrap-select">
														<select class="" tabindex="null">
															@foreach (getDropDownlist('country_master', ['id', 'country_code', 'country_name']) as $code)
														<option value="{{ $code->id}}" >{{ $code->country_code}}</option>
														@endforeach 
														</select>
													</div> --}}
                                                            </div>
                                                            <div class="col-10">
                                                                <input type="number" id="job_con_phone" maxlength="9"
                                                                    name="job_con_phone" class="form-control"
                                                                    placeholder="Enter 9 Digit Mobile No.">
                                                                <span id="job_con_phone_error"
                                                                    style="color:red;display:none;">
                                                                    <small>
                                                                        <i>Please Enter 9 Digit Mobile No. </i>
                                                                    </small>
                                                                </span>
                                                                <span id="job_con_phone_limit_error"
                                                                    style="color:red;display:none;">
                                                                    <small>
                                                                        <i>Mobile no. must be 9 Digits. </i>
                                                                    </small>
                                                                </span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="imp-field-star">*</span></label>
                                                        <input type="email" id="job_con_email" name="job_con_email"
                                                            class="form-control" placeholder="Enter Email Id">
                                                        <span id="job_con_email_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Please enter email </i>
                                                            </small>
                                                        </span>
                                                        <span id="job_con_email_ver_error"
                                                            style="color:red;display:none;">
                                                            <small>
                                                                <i>Please provide valid email id e.g (abc@test.com) </i>
                                                            </small>
                                                        </span>
                                                        <div class="show-hide-check-emp">
                                                            <input type="checkbox" id="job_con_hide" value="Yes"
                                                                name="job_con_hide"
                                                                data-gtm-form-interact-field-id="0">&nbsp;&nbsp;
                                                            <span>Hide Contact Details from Job Seekers</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="site-button m-b30"
                                                id="postJob">Publish</button>
                                        </form>
                                        @else
                                        <div class="container">
                                            First Update Linence Number <a href="{{ route('company-profile') }}"
                                                target="blank"> Click Here </a>
                                        </div>
                                        @endif
                                    @else
                                        <div class="container">
                                            No Credit Jobs are Available: <a href="{{ route('employer-plans') }}"
                                                target="blank"> Renew Now </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="container">
                                        Your Registered Email id is not Verified <a href="javascript:void(0)"
                                            class="verify"> Verify Now </a>
                                    </div>
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
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- File Upload Demo js -->
    <script src="{{ asset('admin/assets/js/pages/fileupload.init.js') }}"></script>
    <!-- Dropzone File Upload js -->

    <script src="{{ asset('admin/assets/js/vendor/dropzone.min.js') }}"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('job_disc')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('job_disc');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });
    </script>
    {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}

    {{-- <script>
        CKEDITOR.replace('job_disc');
    </script> --}}
    <!-- Import footer  -->
@endsection()
