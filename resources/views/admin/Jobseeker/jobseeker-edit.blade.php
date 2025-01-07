@extends('admin.layouts.main')
@section('content')

        <div class="content-page jobseeker-edit-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

          @include('admin.layouts.breadcrumb')


                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">BASIC INFORMATION</h4>
                                     <button style="float: right;right-margin: -23px;margin: -17px;width: 68px;">
                                            <a href="{{ route('get-js-datalist') }}">Back</a>
                                        </button>
                                </div>
                                <div class="card-body">
                                    @foreach ($jsUserData as $jsData)
                                   <form id="jsProfile" enctype="multipart/form-data">
                                <div class="row g-2">


                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Full Name<span class="imp-field-star"> *</span></label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="{{ !empty($jsData->fullname) ? $jsData->fullname : 'NA' }}">
                                        <input type="text"  name="js_id"  value="{{  base64_encode($jsData->js_id) }}" hidden>
                                         <span id="fullname_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please Provide Full Name </i>
                                            </small>
											</span>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Designation <span class="imp-field-star"> *</span></label>
                                             <select class="form-select mb-2"   id="desig" name="desig">
                                                @if (isset($jsData->designaiton))
														<option value="{{ $jsData->designaiton}}" selected>{{ $jsData->role_name
                                                        }}</option>
													@else
														<option value=""  disabled selected>Select Designation</option>
													@endif
												 @foreach (getDropDownlist('designations', ['id', 'role_name']) as $designations)
                                                @if ($designations->id != $jsData->designaiton)
                                                    <option value="{{ $designations->id}}">{{ $designations->role_name}}
												</option>
                                                @endif
												@endforeach 
                                            </select>
                                        <span id="job_designation_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Designation </i>
												</small>
											</span>
                                    </div>
                                    
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Skills <span class="imp-field-star"> *</span></label><br>

                                        @php 
                                        $skill = explode(',',$jsData->skill);
                                        $skill_arr = multiSelectDropdown('key_skills',['id','key_skill_name'], $skill);
                                            @endphp
                                            <select class="form-select mb-2"  id="skill" name="skill[]" multiple>
                                                @foreach ($skill_arr as $skill)
                                          
												@if (isset($skill[0]->id))
                                                <option value="{{ $skill[0]->id}}" selected>{{$skill[0]->key_skill_name}}
                                                </option>
                                                @endif
                                                 @endforeach 
                                                 @foreach (getDropDownlist('key_skills', ['id', 'key_skill_name']) as $key_skill)
                                                 <option value="{{ $key_skill->id}}">{{ $key_skill->key_skill_name}}
												</option>
												@endforeach 
                                            </select>
                                        

                                    
                                    </div>

                                    <div class="col-md-4">
                                         <label for="inputAddress" class="form-label">Language Known <span class="imp-field-star"> *</span></label><br>
                                             @php
                                        $skill_lang = explode(',',$jsData->lang_skills);
                                        $lang_arr = multiSelectDropdown('languages',['skill_language','id'], $skill_lang);
                                            @endphp
                                                <select class="form-select mb-2"  id="lang" name="lang[]" multiple>
                                                @foreach ($lang_arr as $lang)
												@if (isset($lang[0]->id))
                                                <option value="{{ $lang[0]->id}}" selected>{{$lang[0]->skill_language}}
                                                </option>
                                                @endif
                                                 @endforeach 
                                               @foreach (getDropDownlist('languages', ['id', 'skill_language']) as $language)
												<option value="{{ $language->id}}">{{ $language->skill_language}}
												</option>
												@endforeach 
                                            </select>
                                          
                                      
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Preferred Location <span class="imp-field-star"> *</span></label>
                                           <select class="form-select mb-2"  id="pre_loc" name="pre_loc">
												@if (!empty($jsData->prefered_location))
                                                <option value="{{ $jsData->prefered_location}}" selected>{{$jsData->prefered_location_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Location</option>
                                                @endif
                                               
                                                 @foreach (getDropDownlist('cities', ['id', 'city_name']) as $cities)
                                                @if ( $jsData->prefered_location != $cities->id) 
                                               <option value="{{ $cities->id}}">{{ $cities->city_name}}
                                                </option>
                                               @endif
                                               @endforeach 
                                               
                                            </select>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Preferred Job Type <span class="imp-field-star"> *</span></label>
                                         <select class="form-select mb-2"  id="prefered_job_type" name="prefered_job_type">
												@if (!empty($jsData->prefered_job_type))
                                                <option value="{{ $jsData->prefered_job_type}}" selected>{{$jsData->pref_job_type_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Job Type</option>
                                                @endif
                                         @foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
                                                @if ( $jsData->prefered_job_type != $job_type->id) 
                                               <option value="{{ $job_type->id}}">{{ $job_type->job_type}}
                                                </option>
                                               @endif
                                               @endforeach 
                                               </select>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Notice Period <span class="imp-field-star"> *</span></label>
                                        <select class="form-select mb-2"  id="notice_period" name="notice_period" >
                                            @if (!empty($jsData->notice_periods))
                                                <option value="{{ $jsData->notice_period}}" selected>{{$jsData->notice_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Notice Period</option>
                                                @endif
                                                 @foreach (getDropDownlist('notice_periods', ['id', 'notice']) as $notice_periods)
                                                @if ($jsData->notice_period != $notice_periods->id) 
                                               <option value="{{ $notice_periods->id}}">{{ $notice_periods->notice}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Total Experience
                                            Year<span class="imp-field-star"> *</span> </label>
                                         <select class="form-select mb-2"  id="texp_year" name="texp_year">
                                            @if (!empty($jsData->total_exp_year))
                                                <option value="{{ $jsData->total_exp_year}}" selected>{{$jsData->experiance_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Total Experience</option>
                                                @endif
                                                 @foreach (getDropDownlist('experiances', ['experiance', 'id']) as $experiance)
                                                @if ( $jsData->total_exp_year != $experiance->id) 
                                               <option value="{{ $experiance->id}}">{{ $experiance->experiance}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="texp_year" class="form-label">Total Experience Year<span class="imp-field-star">*</span></label>
                                        <select class="form-select mb-2" id="texp_year" name="texp_year">
                                            @if (!empty($jsData->total_exp_year))
                                            <option value="{{ $jsData->total_exp_year }}" selected>{{ $jsData->experiance_name }}</option>
                                            @else
                                            <option value="" disabled selected>Select Total Experience</option>
                                            @endif
                                            @foreach (getDropDownlist('experiances', ['experiance', 'id']) as $experiance)
                                            @if ($jsData->total_exp_year != $experiance->id) 
                                            <option value="{{ $experiance->id }}">{{ $experiance->experiance }}</option>
                                            @endif
                                            @endforeach 
                                        </select>
                                    </div> --}}
                                    <div class="  col-md-4">
                                        <label for="inputEmail4" class="form-label">Current Salary (<i class="fas fa-rupee-sign" style="font-size: 12px"></i>)
                                            (Annualy) </label>
                                        <input type="text" class="form-control" id="inputEmail4"
                                            placeholder="Current Salary" value="{{ !empty($jsData->curr_salary) ? $jsData->curr_salary : 0 }}" name="curr_sal">
                                    </div>
                                    <div class=" mb-2 col-md-4">
                                        <label for="exp_sal" class="form-label">Expected Salary (<i class="fas fa-rupee-sign" style="font-size: 12px"></i>)
                                            (Annualy) <span class="imp-field-star"> *</span></label>
                                       
                                             <select class="form-select mb-2" name="exp_sal" id="exp_sal" >
                                                @if (!empty($jsData->expected_salary))
                                                <option value="{{ $jsData->expected_salary}}" selected>{{$jsData->expected_salary_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Expected Salary</option>
                                                @endif
                                                 @foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $salary_ranges)
                                                @if ($jsData->expected_salary != $salary_ranges->id) 
                                               <option value="{{ $salary_ranges->id}}">{{ $salary_ranges->salary_range}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="prefered_industry" class="form-label">Preferred Industry<span class="imp-field-star"> *</span> </label>
                                        <select class="form-select mb-2"  name="prefered_industry" id="prefered_industry" >
                                                @if (!empty($jsData->Preferred_industry))
                                                <option value="{{ $jsData->prefered_industry}}" selected>{{$jsData->pref_indus_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Preferred Industry</option>
                                                @endif
                                                 @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $industries)
                                                @if ($jsData->prefered_industry != $industries->id) 
                                               <option value="{{ $industries->id}}">{{ $industries->industries_name}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="func_area" class="form-label">Functional Area<span class="imp-field-star"> *</span> </label>
                                         <select class="form-select mb-2"  id="func_area" name="func_area">
                                                @if (!empty($jsData->functional_area))
                                                <option value="{{ $jsData->functional_area}}" selected>{{$jsData->functional_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Functional Area</option>
                                                @endif
                                                 @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_areas)
                                                @if (isset($jsData->functional_area) && $jsData->functional_area != $functional_areas->functional_name) 
                                               <option value="{{ $functional_areas->id}}">{{ $functional_areas->functional_name}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    
                                    <div class=" mb-2  col-md-10">
                                        <label for="prf_sum">Profile Summary </label>
                                        <div class="form-floating">

                                            <textarea class="form-control" placeholder="" name="prf_sum" id="prf_sum"
                                                style="height: 100px">{{ !empty($jsData->proflie_summary) ? $jsData->proflie_summary : '' }}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-2 pt-3 edit-profile-photo">
                                          <label for="inputAddress" class="form-label">Update Profile Photo
                                                </label>

                                                <div class="" style="position: relative;">
                                                    <a class="me-3" href="#">
                                                            @if (Storage::disk('public')->exists("jobseeker/profile_image/".$jsData->profile_img) && isset($jsData->profile_img))
                                                    <img class="avatar-md rounded-circle bx-s imagePreview"
                                                                src="{{ Storage::url("jobseeker/profile_image/".$jsData->profile_img) }}" alt="">
                                                    @else
                                                    <img class="avatar-md rounded-circle bx-s imagePreview"
                                                                src="{{ Storage::url("no-image.jpg") }}" alt="">
                                                    @endif
                                                    </a>
											<i class="fas fa-pencil-alt"><input type="file"  class="update-flie image profilePic" name='profile_image' id="profile_image" accept=".png,.jpg,.jpeg"></i>
												<input type="text"  class='curr_img' value="{{ !empty($jsData->profile_img) ? $jsData->profile_img : ''  }}" name='prof_old_profile_image' hidden>
												
                                                </div>

                                    </div>

                                </div>

                                <br>
                                <div class="card-header">
                                    <h4 class="header-title">PERSONAL INFORMATION</h4>

                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="  col-md-4">
                                        <label for="dob" class="form-label">Date of Birth </label>
                                        <input class="form-control" id="dob" type="date" name="dob" value="{{ !empty($jsData->dob) ? $jsData->dob : 'NA' }}">
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="gender" class="form-label">Gender</label>
                                         <select class="form-select mb-2"  id="gender" name="gender">
                                                <option value="{{ $jsData->gender}}" selected>{{$jsData->gender}}
                                                </option>
                                                @if ($jsData->gender != 'Female')
                                                      <option value="Female">Female</option>
                                                @endif
                                                    @if ($jsData->gender != 'Male')
                                                      <option value="Male">Male</option>
                                                @endif
                                            </select>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="martial_status" class="form-label">Marital Status </label>
                                           <select class="form-select mb-2"  id="martial_status" name="martial_status">
                                                @if (!empty($jsData->functional_area))
                                                <option value="{{ $jsData->martial_status}}" selected>{{$jsData->martial_status_name}}
                                                </option>
                                                {{-- @else
                                                <option value="" disabled selected>Select Marital Status</option> --}}
                                                @endif
                                                 @foreach (getDropDownlist('martial_status', ['id', 'marital_status']) as $marital_status)
                                                @if ($jsData->martial_status != $marital_status->id) 
                                               <option value="{{ $marital_status->id}}">{{ $marital_status->marital_status}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="national" class="form-label">Nationality <span class="imp-field-star"> *</span></label>
                                        <input type="text" class="form-control" id="national" name="national"
                                            placeholder="Nationality" value="{{ !empty($jsData->nationality) ? $jsData->nationality : '' }}">
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="passport_no" class="form-label">Passport No. </label>
                                        <input type="text" class="form-control" id="passport_no" name="passport_no"
                                            placeholder="Passport No." value="{{ !empty($jsData->passport_no) ? $jsData->passport_no : '' }}">
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="work_permit" class="form-label">Have Work Permit? </label>
                                         <select class="form-select mb-2"  id="work_permit" name="work_permit">
                                                <option value="{{ $jsData->work_permit}}" selected>{{$jsData->work_permit}}
                                                </option>
                                                @if ($jsData->work_permit != 'Yes')
                                                      <option value="Yes">Yes</option>
                                                @endif
                                                    @if ($jsData->work_permit != 'No')
                                                      <option value="No">No</option>
                                                @endif
                                            </select>
                                    </div>

                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="header-title">CONTACT INFORMATION</h4>

                                </div>
                                <br>
                                <div class="row g-2">

                                    <div class="  col-md-2">
                                        <label for="country_code" class="form-label">Country Code </label>
                                            <select class="form-select mb-2"  id="mob_code" name="mob_code">
                                                <option value="{{ $jsData->mob_code}}" selected>{{$jsData->mob_code}}
                                                </option>
                                                 @foreach (getDropDownlist('country_master', ['id', 'country_code']) as $country_master)
                                                @if (isset($jsData->mob_code) && $jsData->mob_code != $country_master->country_code) 
                                               <option value="{{ $country_master->id}}">{{ $country_master->country_code}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                             <span id="mob_code_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please Provide Country Code </i>
                                            </small>
											</span>
                                        
                                    </div>
                                     <div class="  col-md-3">
                                        <label for="mobile" class="form-label">Mobile <span class="imp-field-star"> *</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ !empty($jsData->mobile) ? $jsData->mobile : 'NA' }}">
                                         <span id="mobile_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please Provide Mobile</i>
                                            </small>
											</span>
                                    </div> 
                                    {{-- {{--<div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Email Address </label>
                                        <input type="email" class="form-control" id="inputAddress"
                                            placeholder="Email Address" value="{{ !empty($jsData->email) ? $jsData->email : 'NA' }}">
                                    </div> --}}

                                    <div class="   col-md-3">
                                        <label for="country" class="form-label">Country <span class="imp-field-star"> *</span></label>
                                        <select class="form-select mb-2" id="country" name="country" >
                                                @if (!empty($jsData->country))
                                                <option value="{{ $jsData->country}}" selected>{{$jsData->country_name}}
                                                </option>
                                                @else
                                                <option value="" disabled selected>Select Country</option>
                                                @endif
                                                 @foreach (getDropDownlist('country_master', ['id', 'country_name']) as $country_master)
                                                @if ($jsData->country != $country_master->id) 
                                               <option value="{{ $country_master->id}}">{{ $country_master->country_name}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="city" class="form-label">City <span class="imp-field-star"> *</span></label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="{{ !empty($jsData->city_name) ? $jsData->city_name : '' }}">
                                    </div>
                                    <div class="  col-md-2">
                                        <label for="postalcode" class="form-label">Postal Code </label>
                                        <input type="text" class="form-control" id="postalcode" name="postalcode"
                                            placeholder="Postal Code" value="{{ !empty($jsData->postal_code) ? $jsData->postal_code : '' }}">
                                    </div>

                                    <div class="  col-md-10">
                                        <label for="full_address" class="form-label">Full Address </label>
                                        <input type="text" class="form-control" id="full_address" name="full_address"
                                            placeholder="Full Address" value="{{ !empty($jsData->full_address) ? $jsData->full_address : '' }}">
                                    </div>

                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="header-title">Education Qualification</h4>

                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="   col-md-4">
                                        <label for="qual_name" class="form-label">Qualification </label>
                                         <select class="form-select mb-2" id="qual_name" name="qual_name" >
                                                <option value="{{ $jsData->qul_id}}" selected>{{$jsData->qual_name}}
                                                </option>
                                                 @foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $qualifications)
                                                @if (isset($jsData->qul_id) && $jsData->qul_id != $qualifications->id) 
                                               <option value="{{ $qualifications->id}}">{{ $qualifications->educational_qualification}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inst_name" class="form-label">Institute/University </label>
                                        <input type="text" class="form-control" id="inst_name" name="inst_name"
                                            placeholder="Institute/University" value="{{ !empty($jsData->institute_name) ? $jsData->institute_name : '' }}">
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="spec" class="form-label">Specialization </label>
                                        <input type="text" class="form-control" id="spec"
                                            placeholder="Specialization" value="{{ !empty($jsData->specilization) ? $jsData->specilization : '' }}">
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="passing_year" class="form-label">Passing Year </label>
                                        <input type="date" class="form-control" id="passing_year" name="passing_year"
                                            placeholder="Passing Year" value="{{ !empty($jsData->passing_year) ? $jsData->passing_year : '' }}">
                                    </div>

                                </div>
                                <br>

                                <div class="card-header work_experience">
                                    <h4 class="header-title">WORK EXPERIENCE</h4>

                                </div>
                                <br>
                                <div class="row g-2 work_experience">
                                    <div class="  col-md-4">
                                        <label for="com_name" class="form-label">Company Name <span class="imp-field-star"> *</span></label>
                                        <input type="text" class="form-control" id="com_name" name="com_name"
                                            placeholder="Company Name" value="{{ !empty($jsData->company_name) ? $jsData->company_name : '' }}">
                                            <span id="com_name_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please Provide Full Name </i>
                                                </small>
                                                </span>
                                    </div>

                                    {{-- <div class="card-header">
                                        <h4 class="header-title">WORK EXPERIENCE</h4>
                                    </div>
                                    <br>
                                    <div class="row g-2" id="work_experience_fields" style="display:{{ !empty($jsData->total_exp_year) && $jsData->total_exp_year != 0 ? 'block' : 'none' }}">
                                        <!-- Your work experience fields here -->
                                        <div class="col-md-4">
                                            <label for="com_name" class="form-label">Company Name <span class="imp-field-star">*</span></label>
                                            <input type="text" class="form-control" id="com_name" name="com_name" placeholder="Company Name" value="{{ !empty($jsData->company_name) ? $jsData->company_name : '' }}">
                                            <span id="com_name_error" style="color:red;display:none;">
                                                <small><i>Please Provide Full Name</i></small>
                                            </span>
                                        </div>
                                        <!-- Add other work experience fields here -->
                                    </div> --}}
                                    <div class="   col-md-4">
                                        <label for="wokr_desig" class="form-label">Work Designation </label>
                                        <select class="form-select mb-2" id="wokr_desig" name="wokr_desig" >
                                                <option value="{{ $jsData->work_desination_id}}" selected>{{$jsData->work_desination_name}}
                                                </option>
                                                 @foreach (getDropDownlist('designations', ['id', 'role_name']) as $designations)
                                                @if (isset($jsData->work_desination_id) && $jsData->work_desination_id != $designations->id) 
                                               <option value="{{ $designations->id}}">{{ $designations->role_name}}
                                                </option>
                                               @endif
                                                   @endforeach 
                                            </select>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="jdate" class="form-label">Joining Date </label>
                                        <input type="date" class="form-control" id="jdate" name="jdate"
                                            placeholder="Joining Date" value="{{ !empty($jsData->joining_date) ? $jsData->joining_date : 'NA' }}">
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="end_date" class="form-label">Ending Date </label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            placeholder="Ending Date" value="{{ !empty($jsData->ending_date) ? $jsData->ending_date : 'NA' }}">
                                    </div>

                                </div>
                                <br>
                                <div class="card-header">
                                    <h4 class="header-title">SOCIAL LINKS</h4>

                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="  col-md-4">
                                        <label for="fbook" class="form-label">Facebook</label><br>
                                          <input type="url" class="form-control" id="fbook"
                                                    placeholder="https://www.facebook.com/"  value="{{ !empty($jsData->facebook_link) ? $jsData->facebook_link : '' }}" name="fbook" >
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="insta" class="form-label">Instagram</label><br>
                                          <input type="url" class="form-control" id="insta"
                                                    placeholder="https://www.instagram.com/"  value="{{ !empty($jsData->insta_link) ? $jsData->insta_link : '' }}" name="insta" >
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="twitter" class="form-label">Twitter</label><br>
                                              <input type="url" class="form-control" id="twitter"
                                                    placeholder="https://www.twitter.com/"  value="{{ !empty($jsData->twitter_link) ? $jsData->twitter_link : '' }}" name="twitter" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                    </div>
                                      <input type="url" class="form-control" id="linkedin"
                                                    placeholder="https://www.linkedin.com/"  value="{{ !empty($jsData->linkedin) ? $jsData->linkedin : '' }}" name="linkedin" >
                                </div>
                                <br>


                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>

                    <!-- Resume Upload  -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                   
                                    <div class="dz-preview dz-file-preview">
                                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                                        data-upload-preview-template="#uploadPreviewTemplate">
                                        <div class="fallback">
                                            <input name="resume_file" type="file"  />
                                        </div>

                                        <div class="dz-message needsclick">
                                            <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                            <h3>Upload Resume Here.</h3>
                                            <span class="text-muted fs-13">(Resume File Should be PDF, JPG, PNG & Less than 5 MB)</span>
                                        </div>
                                    </form>
                                  
                                    <!-- Preview -->
                                    <div class="dropzone-previews mt-3" id="file-previews"></div>  
                                         <a href="{{$jsData->resume_link}}" download="Resume">{{!empty($jsData->resume_link) ? 'Downlaod Resume' : ''}}</a>
                                </div>
                                <div class="dz-preview dz-file-preview">
                                   
                                <!-- end card-body -->
                            </div>
                            <!-- end card-->
                        </div>
                       
                        <!-- end col-->
                    </div>


                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col ps-0">
                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-danger" data-dz-remove>
                                            <i class="ri-close-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="button" class="btn btn-primary mb-4" id="ProfileSubmit">Save</button>
                                        </form>
   @endforeach
                   
                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
        <!-- File Upload Demo js -->
        <script src="{{ asset('admin/assets/js/pages/fileupload.init.js')}}"></script>
                <!-- Dropzone File Upload js -->
       
                <script src="{{ asset('admin/assets/js/vendor/dropzone.min.js')}}"></script>
                <script src="{{ asset('js/select2.min.js')}}"></script>
<script>
  $(document).ready(function() {
    // Add change event listener to the element with id 'texp_year'
    $(document).on('change', '#texp_year', function() {
        // Check if the value of the element with id 'texp_year' is equal to 1
        if ($('#texp_year').val() == 1) {
            // If the value is 1, hide elements with class 'work_experience'
            $('.work_experience').hide();
        } else {
            // If the value is not 1, show elements with class 'work_experience'
            $('.work_experience').show();
        }
    });
});
$('#skill').select2({
  maximumSelectionLength: 3,
  placeholder: 'Select Skills',
  closeOnSelect: false,
  allowClear: true,
});
$('#lang').select2({
  maximumSelectionLength: 5,
  placeholder: 'Select Language ',
  closeOnSelect: false,
  allowClear: true,
});
</script>
       
@endsection