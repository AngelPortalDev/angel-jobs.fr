@extends('admin.layouts.main')
@section('content')

        <div class="content-page jobseeker-edit-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @include('admin.layouts.breadcrumb')


                    <!-- end row -->

                    <div class="row my-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">BASIC INFORMATION</h4>

                                </div>
                                <div class="card-body">
                                    <form id="addJobForm">
                                        @foreach ($jobData as $jobDatas)
                                            @php
                                                $job_id = base64_encode($jobDatas->id);
                                            @endphp
                                        <div class="row g-2">
                                     <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Employer<span class="imp-field-star"> *</span></label>
                                                <input type="text" min="1" value="{{$jobDatas->company_name}}"  class="form-control bg-light" 
                                                    placeholder="Employer Name" disabled>
                                                     <input type="text" id="emp_id" min="1" name="emp_id" id="emp_id"  value="{{ base64_encode($jobDatas->posted_by)}}"  class="form-control" 
                                                    hidden>
                                            {{-- <select class="form-select  mb-2" name="emp_id" id="emp_id">
                                               <option value="" selected>Select Employer</option>
										@foreach (getDropDownlist('employers', ['company_name', 'id']) as $employers)
										<option value="{{ base64_encode($employers->id)}}" >{{ $employers->company_name}}</option>
										@endforeach
                                        </select>  --}}
                                        <span id="employer_error" style="color:red;display:none;">
												<small>
													<i>Please Select Employer </i>
												</small>
                                        </span>
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Title <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control"  value="{!! htmlspecialchars_decode($jobDatas->job_title) !!}"  id="job_title" name="job_title"
                                                    placeholder="Job Title ">
                                                    <input type="text" class="form-control" value="{{$job_id}}" name="job_id" hidden>
                                                    	<span id="job_title_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Job Title </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Job Type <span class="imp-field-star"> *</span></label>
                                              <select class="form-select  mb-2" id="job_type" name="job_type">
												@if (isset($jobDatas->job_type))
														<option value="{{ $jobDatas->job_type}}" selected>{{ $jobDatas->job_type_name}}</option>
													@else
														<option value="" disabled selected>Select Job Type</option>
													@endif
												 @foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
												@if ($jobDatas->job_type != $job_type->id)
												<option value="{{ $job_type->id}}">{{ $job_type->job_type}}</option>
												@endif
												@endforeach 
											</select>
											<span id="job_type_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Job Type </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Required Language <span class="imp-field-star"> *</span></label>
                                                @php
													$skill_lang = explode(',', $jobDatas->required_language);
													$lang_arr = multiSelectDropdown('languages',['skill_language','id'], $skill_lang);

												@endphp
                                                 <select class="form-select  mb-2" id="job_lang" name="job_lang[]" multiple>
													 @foreach ($lang_arr as $lang)
														@if (isset($lang[0]->id))
														<option value="{{ $lang[0]->id}}" selected>{{$lang[0]->skill_language}}
														</option>
														@else
														<option value="" disabled>Select Language</option>
														@endif 
													@endforeach 
												 @foreach (getDropDownlist('languages', ['id', 'skill_language']) as $language)
													<option value="{{ $language->id}}">{{ $language->skill_language}}</option>
												@endforeach 
											</select>
											<span id="job_lang_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Required Language </i>
												</small>
											</span>
                                        </div>
											
											<div class="col-md-4">
												@php $workmode = explode(',', $jobDatas->work_mode); @endphp
                                                <label for="inputAddress" class="form-label">Select Work Mode<span class="imp-field-star"> *</span></label>
                                              <select class="form-select  mb-2" id="select_work_mode" name="select_work_mode[]" multiple>
												<option value="1" @if (in_array('1', $workmode)) selected @endif>Remote</option>
												<option value="2" @if (in_array('2', $workmode)) selected @endif>WFO</option>
												<option value="3" @if (in_array('3', $workmode)) selected @endif>Hybrid</option>
											</select>
											<span id="job_type_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Job Type </i>
												</small></span>
                                            </div>


                                           <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Industry <span class=""> *</span></label>
                                       	        <select id="job_indus"  class="form-select  mb-2" name="job_indus">
											{{-- @if (isset($jobDatas->job_industry_name))
														<option value="{{ $jobDatas->job_industry}}" selected>{{ $jobDatas->job_industry_name}}</option>
													@else
														<option value="" disabled selected>Select Industry</option>
													@endif --}}
												 @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $indus)
												<option value="{{ $indus->id}}" @if ($indus->id == $jobDatas->job_industry) selected @endif>{{ $indus->industries_name}}</option>
												@endforeach 
											</select>
											<span id="job_indus_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Industry </i>
												</small></span>
                                                </select>
                                            </div> 




                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Function Area <span class="imp-field-star"> *</span></label>
                                               <select id="job_func_area" class="form-select  mb-2"  name="job_func_area">
											@if (isset($jobDatas->functional_name))
														<option value="{{ $jobDatas->functional_area}}" selected>{{ $jobDatas->functional_name}}</option>
													@else
														<option value="" disabled selected>Select Function Area</option>
													@endif
												 @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_area)
												<option value="{{ $functional_area->id}}">
													{{ $functional_area->functional_name}}</option>
												@endforeach 
											</select>
											<span id="job_func_area_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Function Area </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Designation <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_designation" name="job_designation">
											@if (isset($jobDatas->job_designation))
														<option value="{{ $jobDatas->job_designation}}" selected>{{ $jobDatas->job_designation_name}}</option>
													@else
														<option value="" disabled selected>Select Designation</option>
													@endif
												 @foreach (getDropDownlist('designations', ['id', 'role_name']) as $designation)
												<option value="{{ $designation->id}}">{{ $designation->role_name}}
												</option>
												@endforeach 
											</select>
											<span id="job_designation_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Designation </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Experience <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_expr" name="job_expr">
                                                	@if (isset($jobDatas->work_experience_from))
														<option value="{{ $jobDatas->work_experience_from}}" selected>{{ $jobDatas->experiance}}</option>
													@else
														<option value="" disabled selected>Select Experience</option>
													@endif
												 @foreach (getDropDownlist('experiances', ['experiance', 'id']) as $exp)
												<option value="{{ $exp->id}}">{{ $exp->experiance}}
												</option>
												@endforeach

											</select>
											<span id="job_expr_error" style="color:red;display:none;">
												<small>
													<i>Please Select Experience </i>
												</small></span>
                                                </select>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="job_sal" class="form-label" > Salary Range (Monthly)</label>
                                                <select class="form-select  mb-2" id="job_sal" name="job_sal">
                                                @if (isset($jobDatas->job_salary_to_name))
														<option value="{{ $jobDatas->job_salary_to}}" selected>{{ $jobDatas->job_salary_to_name}}</option>
													@else
														<option value="" disabled selected>Select Salary Range</option>
													@endif
												 @foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $salary_range)
												 @if ($salary_range->id != $jobDatas->job_salary_to)
													<option value="{{ $salary_range->id}}">{{ $salary_range->salary_range}}
												</option>
												 @endif
												@endforeach 
											</select>
											<div class="show-hide-check-emp sal_disply">
                                                @php
													$checked = '';
												@endphp
												@if ($jobDatas->salary_hide === 'Yes')
												@php
													$checked = 'checked';
												@endphp
												@endif
												<input type="checkbox" id="job_sal_hide" name="job_sal_hide"
													value="Yes"  @php
														echo $checked
													@endphp>&nbsp;&nbsp;
												<span>Hide from Job Seekers</span>
											</div>
                                            </div>
                                              <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Hiring Location <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_location" name="job_location">
                                                    @if (isset($jobDatas->location_hiring))
														<option value="{{ $jobDatas->location_hiring}}" selected>{{ $jobDatas->location_hiring_name}}</option>
													@else
														<option value="" disabled selected>Select Location</option>
													@endif
												 @foreach (getDropDownlist('cities', ['id', 'city_name']) as $city)
												<option value="{{ $city->id}}">{{ $city->city_name}}</option>
												@endforeach 
											</select>
											<span id="job_location_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Location </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                 @php
                                                $gender = explode(',', $jobDatas->gender);
												@endphp
                                                <label for="" class="form-label">Gender</label>
                                                    <select class="form-select  mb-2" id="job_gender" name="job_gender[]" multiple>
														 @if (!empty($gender))
												 @foreach ($gender as $genders)
												 <option value="{{ $genders}}" selected>{{ $genders}}</option>
														@if ($genders !== 'Male')
															 <option value="Male">Male</option>
														@endif
														@if ($genders !== 'Female')
															 	<option value="Female">Female</option>
														@endif
                                                  @endforeach
												  	@endif

												 
											
											</select>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">No. of Opening <span class="imp-field-star"> *</span></label>
                                                <input type="number" id="vacancy_count" min="1" name="vacancy_count"  value="{{$jobDatas->no_of_openings}}"  class="form-control" 
                                                    placeholder="No. of Vacancies">
                                                    <span id="vacancy_count_error" style="color:red;display:none;">
												<small>
													<i>Enter No. of Openings Not less then 1 </i>
												</small></span>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="card-header">
                                            <h4 class="header-title">DESIRED CANDIDATE PROFILE</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">

                                           <div class="   col-md-4">
                                            	@php
													$skill_keyword = explode(',', $jobDatas->skill_keyword);
													$skill_arr = multiSelectDropdown('key_skills',['key_skill_name','id'], $skill_keyword);
												@endphp
                                                <label for="inputAddress" class="form-label">Skills <span class="imp-field-star"> *</span></label>
                                                <select  class="form-select  mb-2" id="job_skills" size="3" name="job_skills[]" multiple>
											@foreach ($skill_arr as $skills)
												@if (isset($skills[0]->id))
														<option value="{{ $skills[0]->id}}" selected>{{$skills[0]->key_skill_name}}
													</option>
													@else
														<option value="" disabled>Select Language</option>
													@endif 
													@endforeach 
												 @foreach (getDropDownlist('key_skills', ['id', 'key_skill_name']) as $key_skill)
												<option value="{{ $key_skill->id}}">{{ $key_skill->key_skill_name}}
												</option>
												@endforeach 
											<span id="job_skills_error" style="color:red;display:none;">
												<small>
													<i>Please Select Skills </i>
												</small></span>
                                                </select>
                                            </div>

                                            <div class="  col-md-12">
                                                <label for="inputAddress" class="form-label">Job Description <span class="imp-field-star"> *</span></label>
                                                	{{-- <textarea class="form-control mb-2" value="@php echo $jobDatas->job_description @endphp" id="job_disc" name="job_disc">@php echo $jobDatas->job_description @endphp</textarea> --}}
													<div id="quill-editor" class="mb-3" style="height: 300px;">
														{!! $jobDatas->job_description !!}
													</div>
													
													<input type="hidden" name="job_disc" id="job_disc" value='{!! $jobDatas->job_description !!}'>
											<span id="job_disc_error" style="color:red;display:none;">
												<small>
													<i>Please Job Description </i>
												</small></span>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="card-header">
                                            <h4 class="header-title">QUALIFICATION DETAILS </h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">

                                           <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Required Qualification <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" name="job_educ" id="job_educ">
                                                   <option value="" selected disabled>Select Qualification</option>
											@if (isset($jobDatas->job_education_name))
														<option value="{{ $jobDatas->job_education}}" selected>{{ $jobDatas->job_education_name}}</option>
													@else
														<option value="" disabled selected>Select Rquired Qualification</option>
													@endif
												 @foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $qualification)
												<option value="{{ $qualification->id }}">
													{{ $qualification->educational_qualification}}</option>
												@endforeach 
											</select>
											<span id="job_educ_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Qualification </i>
												</small></span>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Specialization</label>
                                                <input type="text" class="form-control" value="{{$jobDatas->specialization}}" id="job_spec" name="job_spec"
                                                placeholder="Specialization ">
                                            </div>
                                        </div>
                                        <br> 
                                        <br>
                                        <div class="card-header">
                                            <h4 class="header-title">CONTACT DETAILS</h4>
                                        </div>
                                        <br>
                                        <div class="row g-2">
                                            
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Contact Person <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control" value="{{$jobDatas->contact_person}}" id="job_con_person" name="job_con_person"
                                                placeholder="Enter Name ">
                                                	<span id="job_con_person_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Contact Person </i>
												</small>
                                            </span>

                                            </div>

                                           <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Mobile No <span class="imp-field-star"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" disabled id="inputState" class="form-select"  value="+91">
                                                    <input class="form-control" type="number" value="{{$jobDatas->contact_phone}}"  id="job_con_phone" maxlength="8" name="job_con_phone" required="" placeholder="+1234567890" style="width: 50%;">
                                                    <span id="job_con_phone_error" style="color:red;display:none;">
												<small>
													<i>Please Provide 8 Digit Mobile No. </i>
												</small>
											</span>
											<span id="job_con_phone_limit_error" style="color:red;display:none;">
												<small>
													<i>Mobile No. Must be 8 Digit </i>
												</small>

                                                </div>
                                            </div>
                                            

                                            <div class="  col-md-4">
                                                <label for="job_con_email" class="form-label">Email <span class="imp-field-star"> *</span></label>
                                                <input type="email" id="job_con_email" value="{{$jobDatas->contact_email}}" name="job_con_email" class="form-control" 
                                                placeholder="email ">
                                                <span id="job_con_email_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Email </i>
												</small>
											</span>
											<span id="job_con_email_ver_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Valid Email id e.g (abc@test.com) </i>
												</small>
											</span>
                                            </div>
                                            <div class="form-check mb-2">
                                                @php
													$checked_con = '';
												@endphp
												@if ($jobDatas->hide_contact_details === 'Yes')
												@php
													$checked_con = 'checked';
												
												@endphp
													
												@endif
                                                <input  type="checkbox" id="job_con_hide" value="Yes" name="job_con_hide" class="form-check-input" id="customCheckcolor1" style="margin-left: -15px;" @php echo $checked_con @endphp>
                                                 <label class="form-check-label" for="customCheckcolor1">&nbsp; Hide Contact Details from Jobseekers</label>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Highlighted <span class="imp-field-star"> *</span> : &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio33" name="job_highlighted" value="1" class="form-check-input" @if ($jobDatas->job_highlighted === 'Yes')
												{{'checked'}}
												@endif>
                                                        <label class="form-check-label" for="customRadio33">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio4" name="job_highlighted" value="0" class="form-check-input"  @if ($jobDatas->job_highlighted === 'No')
												{{'checked'}}
												@endif>
                                                        <label class="form-check-label" for="customRadio4">No</label>
                                                    </div>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Status<span class="imp-field-star"> *</span> :  &nbsp;</label>

                                                    <div class="form-check form-check-inline">
                                                         @php
													$approve = '';
												@endphp
												@if ($jobDatas->approval_status === 'APPROVED')
												@php
													$approve = 'checked';
												@endphp
												@endif
                                                        <input type="radio" id="customRadio3" name="approval_status" value="1" class="form-check-input" @php
														echo $approve
													@endphp>
                                                        <label class="form-check-label" for="customRadio3">Approved</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                            @php
													$approve = '';
												@endphp
												@if ($jobDatas->approval_status === 'UNAPPROVED')
												@php
													$approve = 'checked';
												@endphp
												@endif
                                                        <input type="radio" id="customRadio4" name="approval_status" value="0" class="form-check-input" @php
														echo $approve
													@endphp>
                                                        <label class="form-check-label" for="customRadio4">Rejected</label>
                                                    </div>
                                            </div>


                                        </div>


                                        <br> 
                                        
                    
                                <button type="button" class="btn btn-primary mb-4" id="postJob">Publish</button>
                                @endforeach
                                    </form>

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>



                  

                   
                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
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
// CKEDITOR.replace('job_disc');
</script>
                    <script src="{{ asset('js/select2.min.js')}}"></script>
                         <script>
$('#job_skills').select2({
  maximumSelectionLength: 3,
  placeholder: 'Select Skills',
  closeOnSelect: false,
  allowClear: true,
});
$('#job_lang').select2({
  maximumSelectionLength: 5,
  placeholder: 'Select Language ',
  closeOnSelect: false,
  allowClear: true,
});
$('#job_gender').select2({ 
  placeholder: 'Select Gender ',
  closeOnSelect: false,
  allowClear: true,
});
$('#select_work_mode').select2({ 
  placeholder: 'Select Work Mode ',
  closeOnSelect: false,
  allowClear: true,
});
</script>
    <!-- END wrapper -->
@endsection