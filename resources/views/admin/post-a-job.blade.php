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
                                        <div class="row g-2">
                                     <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Employer<span class="imp-field-star"> *</span></label>
                                            <select class="form-select  mb-2" name="emp_id" id="emp_id">
                                               <option value="" selected>Select Employer</option>
										@foreach (getDropDownlist('employers', ['company_name', 'id']) as $employers)
                                        @if (isset($employers->company_name) && !empty($employers->company_name))
										<option value="{{ base64_encode($employers->id)}}" >{{ $employers->company_name}}</option>
                                        @endif
										@endforeach
                                        </select> 
                                        <span id="employer_error" style="color:red;display:none;">
												<small>
													<i>Please Select Employer </i>
												</small></span>
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Title <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control"  id="job_title" name="job_title"
                                                    placeholder="Job Title ">
                                                    	<span id="job_title_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Job Title </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Job Type <span class="imp-field-star"> *</span></label>
                                                    <select class="form-select  mb-2" id="job_type" name="job_type">
                                               <option value="" selected>Select Job Type</option>
										@foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
										<option value="{{ $job_type->id}}" >{{ $job_type->job_type}}</option>
										@endforeach 
											</select>
											<span id="job_type_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Job Type </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Required Language <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_lang"  name="job_lang[]" multiple>
                                                    @foreach (getDropDownlist('languages', ['id', 'skill_language']) as $language)
												<option value="{{ $language->id}}">{{ $language->skill_language}}
												</option>
												@endforeach 
											</select>
											<span id="job_lang_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Required Language </i>
												</small>
											</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Industry <span class="imp-field-star">*</span></label>
                                                <select class="form-select mb-2" id="job_indus" name="job_indus" required>
                                                    <option value="" selected disabled>Select Industry...</option>
                                                    <!-- Add options dynamically using PHP foreach loop -->
                                                    @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $indus)
                                                        <option value="{{ $indus->id }}">{{ $indus->industries_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span id="job_indus_error" style="color:red;display:none;">
                                                    <small><i>Please Provide Industry</i></small>
                                                </span>
                                            </div>
                                            
                                            {{-- <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Industry <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2"  id="job_indus" name="job_indus" required >
                                        @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $indus)
												<option value="{{ $indus->id}}">{{ $indus->industries_name}}</option>
												@endforeach 
											</select>
											<span id="job_indus_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Industry </i>
												</small></span>
                                                </select>
                                            </div> --}}

                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Function Area <span class="imp-field-star">*</span></label>
                                                <select class="form-select mb-2" id="job_func_area" name="job_func_area" required>
                                                    <option value="" selected disabled>Select Function Area...</option> <!-- Placeholder option -->
                                                    <!-- Add options dynamically using PHP foreach loop -->
                                                    @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_area)
                                                        <option value="{{ $functional_area->id }}">{{ $functional_area->functional_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span id="job_func_area_error" style="color:red;display:none;">
                                                    <small><i>Please Provide Function Area</i></small>
                                                </span>
                                            </div>
                                            

                                            {{-- <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Function Area <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_func_area" name="job_func_area" required>
                                                    @foreach (getDropDownlist('functional_areas', ['id', 'functional_name']) as $functional_area)
												<option value="{{ $functional_area->id}}">
													{{ $functional_area->functional_name}}</option>
												@endforeach 
											</select>
											<span id="job_func_area_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Function Area </i>
												</small></span>
                                            </div> --}}

                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Designation <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_designation" name="job_designation">
												<option value="" selected disabled>Select Designation</option>
												@foreach (getDropDownlist('designations', ['id','role_name']) as $designations)
												<option value="{{ $designations->id}}" >{{ $designations->role_name}}</option>
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
                                                   <option value="" selected disabled>Select Experience</option>
										@foreach (getDropDownlist('experiances', ['experiance','id']) as $experiance)
										<option value="{{ $experiance->id}}" >{{ $experiance->experiance}}</option>
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
                                                   <option value="" selected>Select Salary Range</option>
												 @foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $salary_range)
												<option value="{{ $salary_range->id}}">{{ $salary_range->salary_range}}
												</option>
												@endforeach 
											</select>
											<div class="show-hide-check-emp sal_disply d-none">
												<input type="checkbox" id="job_sal_hide" name="job_sal_hide"
													value="Yes">&nbsp;&nbsp;
												<span>Hide from Job Seekers</span>
											</div>
                                            </div>
                                              <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Hiring Location <span class="imp-field-star"> *</span></label>
                                                <select class="form-select  mb-2" id="job_location" name="job_location">
                                                    <option value="" selected disabled>Select Location</option>
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
                                                <label for="inputAddress" class="form-label">Gender<span class="imp-field-star"> *</span></label>
                                                    <select class="form-select  mb-2" id="job_gender" name="job_gender[]" multiple>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">No. of Vacancies <span class="imp-field-star"> *</span></label>
                                                <input type="number" id="vacancy_count" min="1" name="vacancy_count" class="form-control" 
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
                                                <label for="inputAddress" class="form-label">Skills <span class="imp-field-star"> *</span></label>
                                                <select  class="form-select  mb-2" id="job_skills" size="3" name="job_skills[]" multiple>
											 @foreach (getDropDownlist('key_skills', ['id', 'key_skill_name']) as $key_skill)
												<option value="{{ $key_skill->id}}">{{ $key_skill->key_skill_name}}
												</option>
												@endforeach 
											</select>
											<span id="job_skills_error" style="color:red;display:none;">
												<small>
													<i>Please Select Skills </i>
												</small></span>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
											
                                                <label for="inputAddress" class="form-label">Select Work Mode<span class="imp-field-star"> *</span></label>
                                              <select class="form-select  mb-2" id="select_work_mode" name="select_work_mode[]" multiple>
												<option value="1">Remote</option>
												<option value="2">WFO</option>
												<option value="3">Hybrid</option>
											</select>
											<span id="job_type_error" style="color:red;display:none;">
												<small>
													<i>Please provide job type </i>
												</small></span>
                                            </div>
                                            <div class="  col-md-12">
                                                <label for="inputAddress" class="form-label">Job Description <span class="imp-field-star"> *</span></label>
                                                	{{-- <textarea class="form-control mb-2" id="job_disc" name="job_disc"></textarea> --}}
                                                    <div id="quill-editor" class="mb-3" style="height: 300px;">
														
													</div>
													
													<input type="hidden" name="job_disc" id="job_disc" value=''>
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
                                                <input type="text" class="form-control"  id="job_spec" name="job_spec"
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
                                                <input type="text" class="form-control" id="job_con_person" name="job_con_person"
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
                                                    <input type="text" disabled id="inputState" class="form-select"  value="+33">
                                                    <input class="form-control" type="number" id="job_con_phone" maxlength="8" name="job_con_phone" required="" placeholder="+1234567890" style="width: 50%;">
                                                    <span id="job_con_phone_error" style="color:red;display:none;">
												<small>
													<i>Please Provide 9 Digit Mobile No. </i>
												</small>
											</span>
											<span id="job_con_phone_limit_error" style="color:red;display:none;">
												<small>
													<i>Mobile No. Must be 9 Digit </i>
												</small>

                                                </div>
                                            </div>
                                            

                                            <div class="  col-md-4">
                                                <label for="job_con_email" class="form-label">Email <span class="imp-field-star"> *</span></label>
                                                <input type="email" id="job_con_email" name="job_con_email" class="form-control" 
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
                                                <input  type="checkbox" id="job_con_hide" value="Yes" name="job_con_hide" class="form-check-input" id="customCheckcolor1" checked="" style="margin-left: -15px;">
                                                 <label class="form-check-label" for="customCheckcolor1">&nbsp; Hide Contact Details from Jobseekers</label>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Highlighted <span class="imp-field-star"> *</span> : &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio33" name="job_highlighted" value="1" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio33">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio4" name="job_highlighted" value="0" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio4">No</label>
                                                    </div>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Status<span class="imp-field-star"> *</span> :  &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio3" name="approval_status" value="1" class="form-check-input" checked>
                                                        <label class="form-check-label" for="customRadio3">Approved</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="customRadio4" name="approval_status" value="0" class="form-check-input">
                                                        <label class="form-check-label" for="customRadio4">Rejected</label>
                                                    </div>
                                            </div>


                                        </div>


                                        <br> 
                                        
                    
                                <button type="button" class="btn btn-primary mb-4" id="postJob">Publish</button>
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
    <!-- END wrapper -->
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
  maximumSelectionLength: 5,
  placeholder: 'Select Gender ',
  closeOnSelect: false,
  allowClear: true,
});
</script>
@endsection