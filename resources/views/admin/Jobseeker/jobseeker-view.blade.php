@extends('admin.layouts.main')
@section('content')
<style>
    .form-control,
    .form-select {
        border: none;
    }
</style>
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
                            <form>
                                <div class="row g-2">


                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->fullname) ? $jsUserData[0]->fullname : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Designation </label><br>
                                        {{-- <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->work_desination_name) ? $jsUserData[0]->work_desination_name : '' }}"disabled> --}}
                                        @if (isset($jsUserData[0]->designaiton))
                                        @php
                                          
                                        $designations = explode(',', $jsUserData[0]->designaiton);
                                        $designations_arr = multiSelectDropdown('designations',['role_name','id'], $designations);
                                        @endphp
                                         @foreach ($designations_arr as $designations)
                                        @if (!empty($designations[0]->id))
                                        {{$designations[0]->role_name.","}}
                                        @endif 
                                        @endforeach 
                                        @else
                                        NA
                                    @endif
                                    </div>
                                    
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Skills</label><br>
                                        @if (isset($jsUserData[0]->skill))
                                            @php
                                            $skils = isset($jsUserData[0]->skill) ? $jsUserData[0]->skill : '';
                                        $skill = explode(',', $skils);
                                        $skill_arr = multiSelectDropdown('key_skills',['key_skill_name','id'], $skill);
                                            @endphp
                                             @foreach ($skill_arr as $skills)
                                            @if (!empty($skills[0]->id))
                                            {{$skills[0]->key_skill_name.","}}
                                            @endif 
                                            @endforeach 
                                    </div>
                                    <div class="col-md-4">
                                         <label for="inputAddress" class="form-label">Language Known </label><br>
                                      
                                         @if (isset($jsUserData[0]->lang_skills))
                                             @php
                                        $skill_lang = explode(',',$jsUserData[0]->lang_skills);
                                        $lang_arr = multiSelectDropdown('languages',['skill_language','id'], $skill_lang);
                                            @endphp
                                             @foreach ($lang_arr as $lang)
                                            @if (!empty($lang[0]->id))
                                            {{$lang[0]->skill_language.","}}
                                            @endif 
                                            @endforeach 
                                         @else
                                             NA
                                         @endif
                                          
                                      
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Preferred Location </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->prefered_location_name) ? $jsUserData[0]->prefered_location_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Preferred Job Type </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->pref_job_type_name) ? $jsUserData[0]->pref_job_type_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Notice Period </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->notice_name) ? $jsUserData[0]->notice_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Total Experience
                                            Year </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->experiance_name) ? $jsUserData[0]->experiance_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputEmail4" class="form-label">Current Salary (<i class="fas fa-euro-sign" style="font-size: 12px"></i>)
                                            (Annualy) </label>
                                        <input type="text" class="form-control" id="inputEmail4"
                                            placeholder="Current Salary (Annualy)" value="{{ !empty($jsUserData[0]->curr_salary) ? $jsUserData[0]->curr_salary : 'NA' }}"disabled>
                                    </div>
                                    <div class=" mb-2 col-md-4">
                                        <label for="inputEmail4" class="form-label">Expected Salary (<i class="fas fa-euro-sign" style="font-size: 12px"></i>)
                                            (Annualy) </label>
                                        <input type="text" class="form-control" id="inputEmail4"
                                            placeholder="Expected Salary (Annualy)" value="{{ !empty($jsUserData[0]->expected_salary_name) ? $jsUserData[0]->expected_salary_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Preferred Industry </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->pref_indus_name) ? $jsUserData[0]->pref_indus_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Functional Area </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->functional_name) ? $jsUserData[0]->functional_name : 'NA' }}"disabled>
                                    </div>
                                    <div class=" mb-2  col-md-10">
                                        <label for="floatingTextarea">Profile Summary </label>
                                        <div class="form-floating">

                                            <textarea class="form-control" placeholder="" id="floatingTextarea"
                                                style="height: 100px">{{ !empty($jsUserData[0]->proflie_summary) ? $jsUserData[0]->proflie_summary : 'NA' }}</textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-2 pt-3 edit-profile-photo">

                                        <div class="" style="position: relative;">
                                           @if (Storage::disk('public')->exists("jobseeker/profile_image/".$jsUserData[0]->profile_img) && isset($jsUserData[0]->profile_img))
												
                                                   <img class="avatar-md rounded-circle bx-s imagePreview"
                                                            src="{{ Storage::url("jobseeker/profile_image/".$jsUserData[0]->profile_img) }}" alt="">
												@else
												 <img class="avatar-md rounded-circle bx-s"
                                                            src="{{ Storage::url("no-image.jpg") }}" alt="">
												@endif
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
                                        <label for="example-date" class="form-label">Date of Birth </label>
                                        <input class="form-control" id="example-date" type="text" name="date" value="{{ !empty($jsUserData[0]->dob) ? $jsUserData[0]->dob : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Gender</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->gender) ? $jsUserData[0]->gender : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Marital Status </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->martial_status_name) ? $jsUserData[0]->martial_status_name : 'NA' }}"disabled>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Nationality </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Nationality" value="{{ !empty($jsUserData[0]->nationality) ? $jsUserData[0]->nationality : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Passport No. </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Passport No." value="{{ !empty($jsUserData[0]->passport_no) ? $jsUserData[0]->passport_no : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Have Work Permit? </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->work_permit) ? $jsUserData[0]->work_permit : 'NA' }}"disabled>
                                    </div>

                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="header-title">CONTACT INFORMATION</h4>

                                </div>
                                <br>
                                <div class="row g-2">

                                    <div class="  col-md-1">
                                        <label for="inputAddress" class="form-label">Country Code </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Mobile" value="{{ !empty($jsUserData[0]->mob_code) ? $jsUserData[0]->mob_code : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-3">
                                        <label for="inputAddress" class="form-label">Mobile </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Mobile" value="{{ !empty($jsUserData[0]->mobile) ? $jsUserData[0]->mobile : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Email Address </label>
                                        <input type="email" class="form-control" id="inputAddress"
                                            placeholder="Email Address" value="{{ !empty($jsUserData[0]->email) ? $jsUserData[0]->email : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Country </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->country_name) ? $jsUserData[0]->country_name : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">City </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->city_name) ? $jsUserData[0]->city_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Postal Code </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Postal Code" value="{{ !empty($jsUserData[0]->postal_code) ? $jsUserData[0]->postal_code : 'NA' }}"disabled>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Full Address </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Full Address" value="{{ !empty($jsUserData[0]->full_address) ? $jsUserData[0]->full_address : 'NA' }}"disabled>
                                    </div>

                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="header-title">Education Qualification</h4>

                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Qualification </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->qual_name) ? $jsUserData[0]->qual_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Institute/University </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Institute/University" value="{{ !empty($jsUserData[0]->institute_name) ? $jsUserData[0]->institute_name : 'NA' }}"disabled>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Specialization </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Specialization" value="{{ !empty($jsUserData[0]->specilization) ? $jsUserData[0]->specilization : 'NA' }}"disabled>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Passing Year </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Passing Year" value="{{ !empty($jsUserData[0]->passing_year) ? $jsUserData[0]->passing_year : 'NA' }}"disabled>
                                    </div>

                                </div>
                                <br>

                                <div class="card-header">
                                    <h4 class="header-title">WORK EXPERIENCE</h4>

                                </div>
                                <br>
                                <div class="row g-2">
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Company Name </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Institute/University" value="{{ !empty($jsUserData[0]->company_name) ? $jsUserData[0]->company_name : 'NA' }}"disabled>
                                    </div>

                                    <div class="   col-md-4">
                                        <label for="inputAddress" class="form-label">Work Designation </label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="" value="{{ !empty($jsUserData[0]->work_desination_name) ? $jsUserData[0]->work_desination_name : 'NA' }}"disabled>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Joining Date </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Joining Date" value="{{ !empty($jsUserData[0]->joining_date) ? $jsUserData[0]->joining_date : 'NA' }}"disabled>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Ending Date </label>
                                        <input type="text" class="form-control" id="inputAddress"
                                            placeholder="Ending Date" value="{{ !empty($jsUserData[0]->ending_date) ? $jsUserData[0]->ending_date : 'NA' }}"disabled>
                                    </div>

                                </div>

                                <br>
                                <div class="card-header">
                                    <h4 class="header-title">SOCIAL LINKS</h4>

                                </div>
                                <br>
                                <div class="row g-2">

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Facebook</label><br>
                                         <a href="{{ !empty($jsUserData[0]->facebook_link) ? $jsUserData[0]->facebook_link : '' }}" target="_blank">{{ !empty($jsUserData[0]->facebook_link) ? $jsUserData[0]->facebook_link : 'NA' }}</a>
                                    </div>

                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Instagram</label><br>
                                         <a href="{{ !empty($jsUserData[0]->insta_link) ? $jsUserData[0]->insta_link : '' }}" target="_blank">{{ !empty($jsUserData[0]->insta_link) ? $jsUserData[0]->insta_link : 'NA' }}</a>
                                    </div>
                                    <div class="  col-md-4">
                                        <label for="inputAddress" class="form-label">Twitter</label><br>
                                             <a href="{{ !empty($jsUserData[0]->twitter_link) ? $jsUserData[0]->twitter_link : '' }}" target="_blank">{{ !empty($jsUserData[0]->twitter_link) ? $jsUserData[0]->twitter_link : 'NA' }}</a>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <label for="inputAddress" class="form-label">Linkedin</label>
                                    </div>
                                     <a href="{{ !empty($jsUserData[0]->linkedin) ? $jsUserData[0]->linkedin : '#' }}" target="_blank">{{ !empty($jsUserData[0]->linkedin) ? $jsUserData[0]->linkedin : 'NA' }}</a>
                                </div>

                                <br>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>

            <!-- Resume Upload  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                                 <label for="inputAddress" class="form-label">Resume Download</label><br>
                                 @if (!empty($jsUserData[0]->resume_link))
                                        <a href="{{ Storage::url('jobseeker/resume/'.$jsUserData[0]->resume_link) }}"  download="{{$jsUserData[0]->fullname."_Resume"}}">{{ !empty($jsUserData[0]->resume_link) ? $jsUserData[0]->resume_link : 'NA' }}</a>
                                 @else
                                    <h5>No Resume Uploaded</h5>
                                 @endif
                              
                            <!-- Preview -->
                            {{-- <div class="dropzone-previews mt-3" id="file-previews"></div> --}}

                        </div>
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

            {{-- <button type="submit" class="btn btn-primary mb-4">Save</button> --}}

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

@endsection