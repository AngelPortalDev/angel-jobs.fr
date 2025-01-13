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
                                <h5 class="font-weight-700 float-start text-uppercase">Basic Information</h5>

                                <a href="javascript:void(0);" class="site-button button-sm float-end"
                                    id="emp_profile_edit"><i class="fas fa-pencil-alt m-r5"></i> Edit</a>
                                <a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_view"
                                    style="display: none;"><i class="fas fa-pencil-alt m-r5"></i> View</a>
                            </div>
                            {{-- {{$profileDetails}} --}}


                            @foreach ($profileDetails as $data)
                                <form id="jsProfile" enctype="multipart/form-data">
                                    <div class="row m-b30">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Full Name <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" name="fullname"
                                                    id="fullname"
                                                    value="{{ isset($data->fullname) ? $data->fullname : '' }}"
                                                    placeholder="Full Name" disabled>
                                                <span id="fullname_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please provide full name </i>
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Designation <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="desig" name="desig">
                                                    @if (isset($data->role_name))
                                                        <option value="{{ $data->designaiton }}" selected>
                                                            {{ $data->role_name }}</option>
                                                    @else
                                                        <option value="" disabled selected>Select Designation</option>
                                                    @endif
                                                    @foreach (getDropDownlist('designations', ['id', 'role_name']) as $designations)
                                                        <option value="{{ $designations->id }}">
                                                            {{ $designations->role_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="job_designation_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select designation </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->role_name }}" placeholder="Select Designation"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Skills <span class="imp-field-star"> *</span></label>
                                                {{-- <input type="text" class="form-control-plaintext" value="{{$data->skill}}" placeholder="Skills"> --}}
                                                @php
                                                    $skill_keyword = explode(',', $data->skill);
                                                    $skill_arr = multiSelectDropdown('key_skills',['key_skill_name', 'id'],$skill_keyword,);
                                                    $key_skills = getDropDownlist('key_skills', ['id','key_skill_name',]);

                                                @endphp
                                                <select class="slec d-none" id="skill" name="skill[]" multiple
                                                    data-live-search="true">                                                
                                                   
                                                    @foreach ($key_skills as $skills)                                                        
                                                    <option value="{{ $skills->id }}"@if (in_array($skills->id, $skill_keyword)) selected @endif>{{ $skills->key_skill_name }}</option>
                                                @endforeach
                                                </select>
                                                <span id="job_skills_error_limit" style="color:red;display:none;">
                                                    <small>
                                                        <i>You can only select up to 8 skills.</i>
                                                    </small>
                                                </span>
                                                <span id="job_skills_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select skills </i>
                                                    </small>
                                                </span>
                                                <span class="clearfix font-13 textveiw">
                                                    @if (count($skill_arr[0]) != 0)
                                                        @foreach ($skill_arr as $index => $skills)
                                                            {{ $skills[0]->key_skill_name }}
                                                            @if ($index < count($skill_arr) - 1),@endif
                                                        @endforeach
                                                    @else
                                                        Please Select Skills
                                                    @endif
                                                </span>
                                                {{-- <input type="text" class="form-control-plaintext textveiw" value="{{$newSkill}}"  readonly> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Language Known <span class="imp-field-star"> *</span></label>
                                                {{-- <input type="text" class="form-control-plaintext" value="{{$data->skill}}" placeholder="Skills"> --}}
                                                @php
                                                    $skill_keyword = explode(',', $data->lang_skills);
                                                    $skill_arr = getDropDownlist('languages', ['skill_language', 'id']);
                                                @endphp
                                                <select class="slec d-none" id="lang" name="lang[]" multiple
                                                    data-live-search="true">
                                                    @foreach ($skill_arr as $skills)                                                        
                                                        <option value="{{ $skills->id }}"@if (in_array($skills->id, $skill_keyword)) selected @endif>{{ $skills->skill_language }}</option>
                                                    @endforeach
                                                   
                                                </select>
                                                <span id="language_error_limit" style="color:red;display:none;">
                                                    <small>
                                                        <i>You can only select up to 3 language.</i>
                                                    </small>
                                                </span>
                                                <span id="job_lang_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select known language </i>
                                                    </small>
                                                </span>
                                                <span class="clearfix font-13 textveiw">
                                                    @if (!empty($skill_keyword))
                                                    @php                                                       
                                                    $filteredSkills = $skill_arr->filter(function($skills) use ($skill_keyword) {
                                                            return in_array($skills->id, $skill_keyword);})->values(); 
                                                    @endphp                                                
                                                    @foreach ($filteredSkills as $index => $skills)
                                                        {{ $skills->skill_language }}
                                                        @if ($index < $filteredSkills->count() - 1)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                @else
                                                    No Languages Mention
                                                @endif
                                                </span>
                                                {{-- <input type="text" class="form-control-plaintext textveiw" value="{{ $skill_language->skill_language}}" placeholder="Select Select Language"  readonly> --}}

                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Preferred Location <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="pre_loc" name="pre_loc">
                                                    @if (!empty($data->prefered_location))
                                                        <option value="{{ $data->prefered_location }}" selected>
                                                            {{ $data->prefered_location_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Preferred Location</option>
                                                    @endif
                                                    @foreach (getDropDownlist('cities', ['id', 'city_name']) as $cities)
                                                        @if ($cities->id != $data->prefered_location)
                                                            <option value="{{ $cities->id }}">{{ $cities->city_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach


                                                </select>
                                                <span id="job_location_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select preferred location </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->prefered_location_name }}"
                                                    placeholder="Select Preferred Location" readonly>
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Preferred Location <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="pre_loc" name="pre_loc">
                                                {{-- @if (!empty($data->prefered_location))
                                            <option value="{{ $data->prefered_location }}" selected>{{ $data->prefered_location_name }}</option>
                                                        @else --}}
                                                {{-- <option value="" selected>Select Preferred Location</option>
                                                @endif
                                                            @foreach (getDropDownlist('cities', ['id', 'city_name']) as $cities)
                                                @if ($cities->id != $data->prefered_location)
                                                <option value="{{ $cities->id }}">{{ $cities->city_name }}</option>
                                                @endif
                                                @endforeach --}}
                                                                                                    </select>
                                                                                                    <span id="job_location_error" style="color:red;display:none;">
                                                            <small>
                                                            <i>Please Provide Preferred Location </i>
                                                            </small>
                                                        </span>
                                           {{-- <input type="text" class="form-control-plaintext textveiw" value="{{ $data->prefered_location_name }}"  readonly> --}}
                                            </div>
                                        </div> -->


                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Preferred Job Type <span class="imp-field-star"> *</span></label>
                                                {{-- <input type="text" class="form-control-plaintext" value="{{$data->prefered_location}}" placeholder="Preferred Location"> --}}
                                                <select class="slec d-none" id="prefered_job_type"
                                                    name="prefered_job_type">
                                                    @if (isset($data->prefered_job_type))
                                                        <option value="{{ $data->prefered_job_type }}" selected>
                                                            {{ $data->pref_job_type_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Preferred Job Type</option>
                                                    @endif
                                                    @foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
                                                        @if ($job_type->id != $data->prefered_job_type)
                                                            <option value="{{ $job_type->id }}">{{ $job_type->job_type }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span id="job_type_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please provide preferred job type </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    placeholder="Select Preferred Job Type"
                                                    value="{{ $data->pref_job_type_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Notice Period <span class="imp-field-star"> *</span></label>
                                                {{-- @foreach(getDropDownlist('notice_periods', ['id', 'notice']) as $notice)      
                                                    {{$notice->notice}}
                                                @endforeach --}}
                                                {{-- <input type="text" class="form-control-plaintext" value="{{$data->prefered_location}}" placeholder="Preferred Location"> --}}
                                                <select class="slec d-none" id="notice_period" name="notice_period" data-live-search="true">
                                                    {{-- @if (isset($data->notice_period))
                                                        <option value="{{ $data->notice_period }}" selected>
                                                            {{ $data->notice_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Notice</option>
                                                    @endif --}}
                                                    @foreach(getDropDownlist('notice_periods', ['id', 'notice']) as $notice)                                                            
                                                        <option value="{{ $notice->id }}" @if($data->notice_period == $notice->id) selected @endif>{{ $notice->notice }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="notice_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please provide notice period </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->notice_name }}" placeholder="Select Notice Period"
                                                    readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Prefered Industry</label>
                                        
                                            <select class="slec d-none" id="pre_loc" name="pre_loc">
                                            @if (isset($data->prefered_industry))
														<option value="{{ $data->prefered_industry}}" selected>{{ $data->pref_indus_name}}</option>
													@else
														<option value="" disabled>Select Preferred Location</option>
													@endif
													 @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $industries)
												<option value="{{ $industries->id}}">{{ $industries->industries_name}}
												</option>
												@endforeach
                                                     </select>
                                                     <input type="text" class="form-control-plaintext textveiw" value="{{ $data->pref_indus_name}}"  readonly>
                                        </div>
                                    </div> --}}

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Total Experience Year <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="texp_year" name="texp_year">
                                                    @if (!empty($data->experiance_name))
                                                        <option value="{{ $data->total_exp_year }}">
                                                            {{ $data->experiance_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Experience Year</option>
                                                    @endif
                                                    @foreach (getDropDownlist('experiances', ['experiance', 'id']) as $exp)
                                                        <option value="{{ $exp->id }}">{{ $exp->experiance }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="job_expr_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select experience</i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->experiance_name }}"
                                                    placeholder="Select Total Experience" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Current Salary (<i class="fa fa-euro" aria-hidden="true"
                                                        style="font-size: 10px"></i>) (Monthly) </label>
                                                <input type="text" class="form-control-plaintext" name="curr_sal"
                                                    id="curr_sal" value="{{ $data->curr_salary }}"
                                                    placeholder="Current Salary">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Expected Salary (<i class="fa fa-euro" aria-hidden="true"
                                                        style="font-size: 10px"></i>) (Monthly) <span
                                                        class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="exp_sal" name="exp_sal">
                                                    @if (!empty($data->expected_salary))
                                                        <option value="{{ $data->expected_salary }}" selected>
                                                            {{ $data->expected_salary_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Expected Salary </option>
                                                    @endif
                                                    @foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $salary_range)
                                                        @if ($data->expected_salary != $salary_range->id)
                                                            <option value="{{ $salary_range->id }}">
                                                                {{ $salary_range->salary_range }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span id="exp_sal_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please provide expected salary </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->expected_salary_name }}"
                                                    placeholder="Select Expected Salary" readonly>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Preferred Industry <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="prefered_industry"
                                                    name="prefered_industry">
                                                    @if (!empty($data->prefered_industry))
                                                        <option value="{{ $data->prefered_industry }}" selected>
                                                            {{ $data->pref_indus_name }}</option>
                                                    @else
                                                        <option value="" selected>Select Industry</option>
                                                    @endif
                                                    @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $industries)
                                                        @if ($industries->id != $data->prefered_industry)
                                                            <option value="{{ $industries->id }}">
                                                                {{ $industries->industries_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span id="job_indus_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select preferred industry </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->pref_indus_name }}" placeholder="Select Industry"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Functional Area <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="func_area" name="func_area">
                                                    @if (!empty($data->functional_area))
                                                        <option value="{{ $data->functional_area }}" selected>
                                                            {{ $data->functional_name }}</option>
                                                    @else
                                                        <option value="" disabled selected>Select Functional Area
                                                        </option>
                                                    @endif
                                                    @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_areas)
                                                        @if ($data->functional_area != $functional_areas->id)
                                                            <option value="{{ $functional_areas->id }}">
                                                                {{ $functional_areas->functional_name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <span id="job_func_area_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please provide functional area </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->functional_name }}"
                                                    placeholder="Select Functional Area" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                @php
                                                $workmode=explode(',',$data->work_mode);
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
                                                <label>Preferred Work Mode</label>
                                                
                                                <select class="slec d-none" id="select_work_mode" name="select_work_mode[]" multiple>
                                                    <option value="1" @if (in_array('1', $workmode)) selected @endif>Remote</option>
                                                    <option value="2" @if (in_array('2', $workmode)) selected @endif>WFO</option>
                                                    <option value="3" @if (in_array('3', $workmode)) selected @endif>Hybrid</option>
                                                </select>
                                                <span id="work_mode_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select Preferred work mode</i>
                                                    </small>
                                                </span>
                                               
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{$workModeText}}" placeholder="Select Work Mode" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Profile Summary </label>
                                                <textarea class="form-control-plaintext" name="prf_sum" id="prf_sum" placeholder="Enter your Profile Summary">{!! htmlspecialchars_decode($data->proflie_summary) !!}</textarea>

                                            </div>
                                        </div>

                                    </div>


                                    <!-- Personal Information -->
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 float-start text-uppercase">Personal Information</h5>
                                    </div>
                                    <div class="row m-b30">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth </label>
                                                <input type="date" class="form-control-plaintext" name="dob"
                                                    id="dob" value="{{ $data->dob }}"
                                                    placeholder="Date of Birth">
                                                <span id="dob_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>DOB should be less than today date. </i>
                                                    </small>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="slec d-none" id="gender" name="gender">
                                                    @if (!empty($data->gender))
                                                        <option value="{{ $data->gender }}" selected>{{ $data->gender }}
                                                        </option>
                                                    @else
                                                        <option value="" disabled selected>Select Gender</option>
                                                    @endif
                                                    <option value='Male'>Male</option>
                                                    <option value='Female'>Female</option>

                                                </select>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->gender }}" placeholder="Select Gender" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Marital Status</label>
                                                <select class="slec d-none" id="martial_status" name="martial_status">
                                                    @if (!empty($data->martial_status))
                                                        <option value="{{ $data->martial_status }}" selected>
                                                            {{ $data->martial_status_name }}</option>
                                                    @else
                                                        <option value="" disabled selected>Select Marital Status
                                                        </option>
                                                    @endif
                                                    @foreach ($martial_status as $martial)
                                                        <option value='{{ $martial->id }}'>
                                                            {{ $martial->marital_status }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->martial_status_name }}"
                                                    placeholder="Select Marital Status" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Nationality <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" name="national"
                                                    id="national" value="{{ $data->nationality }}"
                                                    placeholder="Nationality">
                                                <span id="national_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select nationality </i>
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Passport No / National ID proof no</label>
                                                <input type="text" class="form-control-plaintext" name="passport_no"
                                                    id="passport_no" value="{{ $data->passport_no }}"
                                                    placeholder="Passport No.">
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Is Handicaped ?</label>
                                            <select class="slec d-none" id="is_hadicaped" name="is_hadicaped">
                                                 @if (isset($data->is_hadicaped))
														<option value="{{ $data->is_hadicaped}}" selected>{{ $data->is_hadicaped}}</option>
													@else
														<option value="" disabled selected>Select</option>
													@endif
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Have Work Permit ?</label>
                                                <select class="slec d-none" id="work_permit" name="work_permit">
                                                    @if ($data->work_permit != null)
                                                        <option value="{{ $data->work_permit }}" selected>
                                                            {{ $data->work_permit }}</option>
                                                    @else
                                                        <option value="" selected>Select Work Permit</option>
                                                    @endif
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->work_permit }}" placeholder="Select Work permit"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Contact Information -->
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 float-start text-uppercase">Contact Information</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Mobile<span class="imp-field-star"> *</span></label>
                                                <div class="row m-b30">
                                                    <div class="col-12" style="padding-right: 0;">
                                                        <div class="dropdown bootstrap-select">
                                                            <input type="text" class="form-control-plaintext"
                                                                value="{{ $data->mob_code }} {{ $data->mobile }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email Address </label>
                                                <input type="text" class="form-control-plaintext"
                                                    value="{{ $data->email }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Full Address </label>
                                                <input type="text" class="form-control-plaintext" name="full_address"
                                                    id="full_address" value="{{ $data->full_address }}"
                                                    placeholder="Enter Address">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>City <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control-plaintext" name="city"
                                                    id="city" placeholder="Enter City"
                                                    value="{{ !empty($data->city) ? $data->city : '' }}">
                                                {{-- <select class="slec d-none" id="city" name="city">
                                              @if (isset($data->city_name))
														<option value="{{ $data->city}}" selected>{{ $data->city_name}}</option>
													@else
														<option value="" disabled selected>Select City</option>
													@endif
													  @foreach (getDropDownlist('cities', ['city_name', 'id']) as $cities)
												<option value="{{ $cities->id}}">{{ $cities->city_name}}
												</option>
												@endforeach
                                            </select>  --}}
                                                <span id="city_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select city </i>
                                                    </small>
                                                </span>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Country <span class="imp-field-star"> *</span></label>
                                                <select class="slec d-none" id="country" name="country">
                                                    @if (isset($data->country_name))
                                                        <option value="{{ $data->country }}" selected>
                                                            {{ $data->country_name }}</option>
                                                    @else
                                                        <option value="" disabled selected>Select Country</option>
                                                    @endif
                                                    @foreach ($country_master as $country)
                                                        <option value='{{ $country->id }}'>{{ $country->country_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span id="country_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please select country </i>
                                                    </small>
                                                </span>
                                                <input type="text" class="form-control-plaintext textveiw"
                                                    value="{{ $data->country_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" class="form-control-plaintext" name="postalcode"
                                                    id="postalcode" value="{{ $data->postal_code }}"
                                                    placeholder="Postal Code">
                                            </div>
                                        </div>

                                        
                                    </div>


                                    <!-- Social Links -->
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 float-start text-uppercase">Social Links</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="url" class="form-control-plaintext" name="fbook"
                                                    id="fbook" value="{{ $data->facebook_link }}"
                                                    placeholder="https://www.facebook.com/">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="url" class="form-control-plaintext" name="insta"
                                                    id="insta" value="{{ $data->insta_link }}"
                                                    placeholder="https://www.instagram.com/">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="url" class="form-control-plaintext" name="twitter"
                                                    id="twitter" value="{{ $data->twitter_link }}"
                                                    placeholder="https://www.twitter.com/">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="url" class="form-control-plaintext" name="linkedin"
                                                    id="linkedin" value="{{ $data->linkedin }}"
                                                    placeholder="https://www.linkedin.com/">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-bx-title clearfix">
                                        <h5 class="font-weight-700 float-start text-uppercase">Resume Upload</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <p class="m-auto align-self-center cvInfo">
                                                        <i class="fa fa-upload "></i>
                                                        Click on Edit to Upload Resume
                                                    </p>
                                                    <input type="file" name="resume_file"
                                                        class="site-button form-control-plaintext slec d-none cvUploade"
                                                        id="customFile" accept=".pdf,jpg,.png">
                                                    <input type="text" name="old_resume_file"
                                                        value="{{ $data->resume_link }}" hidden>

                                                </div>
                                                <span><i>
                                                        <small>Resume File Should be PDF, JPG, PNG & Less then 3
                                                            MB</small></i>
                                                </span><br>
                                                <span id="cvUp_error" style="color:green;display:none;">
                                                    <span id="error-message" style="color: red; display: none;"></span>
                                                    <span id="show_message" style="color: green; display: none;"></span>
                                                    <small>
                                                        {{-- <i>Successfully Attached !!!</i> --}}
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- {{$data->resume_link}} --}}
                                        @if (!empty($data->resume_link) && isset($data->resume_link))
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <a href="{{ Storage::url('jobseeker/resume/' . $data->resume_link) }}"
                                                            download="My Resume">
                                                            <p class="m-auto align-self-center cvInfo">
                                                                <i class="fa fa-download "></i>
                                                                Download My Resume
                                                            </p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>


                                    <button class="site-button m-b30 d-none submitButton" type="button"
                                        id="ProfileSubmit">Save Profile</button>
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

<!-- Write a PHP function to find the largest number in an array without using built-in functions.
                                    2. Write a PHP function to sum all elements of an array.
                                    3. Write a PHP function to reverse an array.
                                    4. Write a PHP function to check if an array is associative.
                                    5. Write a PHP function to merge two arrays without using built-in functions.
 -->
