@extends('admin.layouts.main')
@section('content')
<style>
    .form-control, .form-select {
        border:none;
    }
    </style>
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
                                                <input type="text" min="1" value="{{$jobDatas->company_name}}"  class="form-control" 
                                                    placeholder="Employer Name" disabled>
                                                     <input type="text" id="emp_id" min="1" name="emp_id" id="emp_id"  value="{{ base64_encode($jobDatas->posted_by)}}"  class="form-control" 
                                                    hidden>
                                
                                     
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Title <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control"  value="{!! htmlspecialchars_decode($jobDatas->job_title) !!}"  id="job_title" name="job_title"
                                                    placeholder="Job Title " disabled>
                                                    <input type="text" class="form-control" value="{{$job_id}}" name="job_id" hidden>
                                                    	
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Job Type <span class="imp-field-star"> *</span></label>
                                                    <input type="text"  value="{{$jobDatas->job_type_name}}"  class="form-control" 
                                                   disabled>
                                            </div>
                                             @php
                                            //  print_r($jobDatas);
													$skill_keyword = explode(',', $jobDatas->required_language);
													$skill_arr = multiSelectDropdown('languages',['skill_language','id'], $skill_keyword);
												@endphp
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Required Language <span class="imp-field-star"> *</span></label>
                                               <br> @if (!empty($skill_arr))
													@foreach ($skill_arr as $skills)
                                                            	{{isset($skills[0]->skill_language) ? $skills[0]->skill_language."," : ''}}
														@endforeach 
														@else
														No Languages Mention
															@endif
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Industry <span class="imp-field-star"> *</span></label>
                                                <input type="text"  value="{{$jobDatas->job_industry_name}}"  class="form-control" 
                                                   disabled>
                                       	        
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Function Area <span class="imp-field-star"> *</span></label>
                                                 <input type="text"  value="{{$jobDatas->functional_name}}"  class="form-control" 
                                                   disabled>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Designation <span class="imp-field-star"> *</span></label>
                                                  <input type="text"  value="{{$jobDatas->job_designation_name}}"  class="form-control" 
                                                   disabled>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Experience <span class="imp-field-star"> *</span></label>
                                                 <input type="text"  value="{{$jobDatas->experiance}}"  class="form-control" 
                                                   disabled>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="job_sal" class="form-label" > Salary Range (Monthly)</label>
                                                 <input type="text"  value="{{$jobDatas->job_salary_to_name}}"  class="form-control" 
                                                   disabled>
											<div class="show-hide-check-emp sal_disply d-none">
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
                                                       <input type="text"  value="{{$jobDatas->location_hiring_name}}"  class="form-control" 
                                                   disabled>
                                            </div>
                                            <div class="   col-md-4">
                                                 @php
                                                $gender = explode(',', $jobDatas->gender);
												@endphp
                                                <label for="inputAddress" class="form-label">Gender</label>
                                                 <input type="text"  value="{{$jobDatas->gender}}"  class="form-control" 
                                                   disabled>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">No. of Vacancies <span class="imp-field-star"> *</span></label>
                                                <input type="number" id="vacancy_count" min="1" name="vacancy_count"  value="{{$jobDatas->no_of_openings}}"  class="form-control" 
                                                    placeholder="No. of Vacancies"disabled>
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
											// print_r($skill_arr);
                                            @endphp
                                                <label for="inputAddress" class="form-label">Skills <span class="imp-field-star"> *</span></label>
                                                <br> @if (!empty($skill_arr))
													@foreach ($skill_arr as $skills)
                                                            	{{isset($skills[0]->key_skill_name) ? $skills[0]->key_skill_name."," : ''}}
														@endforeach 
														@else
														No Languages Mention
															@endif
                                            </div>

                                            <div class="  col-md-12">
                                                <label for="inputAddress" class="form-label">Job Description <span class="imp-field-star"> *</span></label>
                                                	{{-- <textarea class="form-control mb-2"disabled>{{ strip_tags(html_entity_decode($jobDatas->job_description)) }}</textarea> --}}
                                                    <div id="quill-editor" class="mb-3" style="height: 300px;">
														{!! html_entity_decode($jobDatas->job_description) !!}
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
                                                 <input type="text"  value="{{$jobDatas->job_education_name}}"  class="form-control" 
                                                   disabled>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Specialization</label>
                                                <input type="text" class="form-control" value="{{$jobDatas->specialization}}" id="job_spec" name="job_spec"
                                                 readonly>
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
                                                placeholder="Enter Name " readonly>
                                            </div>

                                           <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Mobile No <span class="imp-field-star"> *</span></label>
                                                <div class="input-group">
                                                    <input type="text" disabled id="inputState" class="form-control"  value="+356">
                                                    <input class="form-control" type="number" value="{{$jobDatas->contact_phone}}"  id="job_con_phone" maxlength="8" name="job_con_phone" required="" placeholder="+1234567890" style="width: 50%;" readonly>
                                                </div>
                                            </div>
                                            

                                            <div class="  col-md-4">
                                                <label for="job_con_email" class="form-label">Email <span class="imp-field-star"> *</span></label>
                                                <input type="email" id="job_con_email" value="{{$jobDatas->contact_email}}" name="job_con_email" class="form-control" 
                                                placeholder="email " readonly>
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
                                                <input  type="checkbox" id="job_con_hide" value="Yes" name="job_con_hide" class="form-check-input" id="customCheckcolor1" checked="" style="margin-left: -15px;" @php
														echo $checked_con
													@endphp>
                                                 <label class="form-check-label" for="customCheckcolor1" >&nbsp; Hide Contact Details from Jobseekers</label>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Job Highlighted <span class="imp-field-star"> *</span> : &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="customRadio33">{{$jobDatas->job_highlighted}}</label>
                                                    </div>
                                               
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Status<span class="imp-field-star"> *</span> :  &nbsp;</label>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="customRadio4">{{$jobDatas->approval_status}}</label>
                                                    </div>
                                            </div>


                                        </div>


                                        <br> 
                                        
                    
                                {{-- <button type="button" class="btn btn-primary mb-4" id="postJob">Publish</button> --}}
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
    <script>document.addEventListener('DOMContentLoaded', function() {
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
@endsection