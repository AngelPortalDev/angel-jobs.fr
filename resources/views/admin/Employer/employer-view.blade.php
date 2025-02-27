@extends('admin.layouts.main')
@section('content')
<style>
    .form-control, .form-select {
        border:none;
    }
    </style>
        <div class="content-page employer-pages">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                     @include('admin.layouts.breadcrumb')


                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">COMPANY PROFILE</h4>
                                    <button style="float: right;right-margin: -23px;margin: -17px;width: 68px;">
                                        <a href="{{ route('get-emp-datalist') }}">Back</a>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row g-2">

                                            <div class="col-md-4">
                                                <label for="inputAddress" class="form-label">Full Name</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Full Name" value="{{ !empty($empUserData[0]->fullname) ? $empUserData[0]->fullname : 'NA' }}">
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Company Name </label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Company Name " value="{{ !empty($empUserData[0]->company_name) ? $empUserData[0]->company_name : 'NA' }}">
                                            </div>



                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Company Type</label>
                                                 <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->company_type_name) ? $empUserData[0]->company_type_name : 'NA' }}" readonly>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Company Size</label>
                                                 <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Company Type " value="{{ !empty($empUserData[0]->company_size_name) ? $empUserData[0]->company_size_name : 'NA' }}" readonly>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Industry</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->industry_name) ? $empUserData[0]->industry_name : 'NA' }}" readonly>
                                            </div>

                                            {{-- <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Company License Number
                                                </label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Company License Number" value="{{ !empty($empUserData[0]->license_no) ? $empUserData[0]->license_no : 'NA' }}">
                                            </div> --}}

                                            <div class="col-md-2 edit-profile-photo">
                                                <label for="inputAddress" class="form-label">Update Profile Photo
                                                </label>

                                                <div class="" style="position: relative;">
                                                @if (Storage::disk('public')->exists("employer/profile_image/".$empUserData[0]->profile_img))
												
                                                   <img class="avatar-md rounded-circle bx-s imagePreview"
                                                            src="{{ Storage::url("employer/profile_image/".$empUserData[0]->profile_img) }}" alt="">
												@else
												 <img class="avatar-md rounded-circle bx-s"
                                                            src="{{ Storage::url("no-image.jpg") }}" alt="">
												@endif
                                                </div>



                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Current GST License:</label>
                                                @if(isset($empUserData[0]->gst_license) && !empty($empUserData[0]->gst_license))
                                                <p><a href="{{ Storage::url('employer/gst_license/' . $empUserData[0]->gst_license) }}" target="_blank">View File</a></p>
                                                @else
                                                <p>Not Upload GST </p>
                                                @endif
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Current Owner ID: </label>
                                                @if(isset($empUserData[0]->owner_id) && !empty($empUserData[0]->owner_id))
												<p><a href="{{ Storage::url('employer/owner_id/' . $empUserData[0]->owner_id) }}" target="_blank">View File</a></p>
												@else
												<p>Not upload owner ID</p>
												@endif
                                            </div>

                                        </div>

                                        <br>
                                        <div class="card-header">
                                            <h4 class="header-title">CONTACT INFORMATION</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">
                                            <div class="col-md-1">
                                                <label for="inputAddress" class="form-label">Code</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Mobile" value="+33" readonly>
                                            </div>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Mobile</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Mobile" value="{{ !empty($empUserData[0]->mobile) ? $empUserData[0]->mobile : 'NA' }}">
                                            </div>
                                            <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="inputAddress"
                                                    placeholder="Email Address" value="{{ !empty($empUserData[0]->email) ? $empUserData[0]->email : 'NA' }}" readonly>
                                            </div>
                                            <div class="  col-md-6">
                                                <label for="inputAddress" class="form-label">Full Address</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="Full Address" value="{{ !empty($empUserData[0]->address) ? $empUserData[0]->address : 'NA' }}">
                                            </div>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Postal Code</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->zip) ? $empUserData[0]->zip : 'NA' }}">
                                            </div>
                                                <div class="   col-md-2">
                                                <label for="inputAddress" class="form-label">City</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->city_name) ? $empUserData[0]->city_name : 'NA' }}" readonly>
                                            </div>
                                             <div class="col-md-2">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text" readonly class="form-control" value="Malta" readonly id="country"
                                                    placeholder="Country">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="card-header">
                                            <h4 class="header-title">Plan Details</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">

                                            <div class="  col-md-2">
                                                
                                                <label for="inputAddress" class="form-label">Plan Name</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                   value="{{ !empty($empUserData[0]->plan_name) ? $empUserData[0]->plan_name : 'NA' }}" readonly>
                                            </div>
                                             <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Plan Job Postings</label>
                                               
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->job_post_limit) ? $empUserData[0]->job_post_limit : 'NA' }}" readonly>
                                            </div>
                                              <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Job Posting Left</label>
                                               
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->left_credit_job_posting_plan) ? $empUserData[0]->left_credit_job_posting_plan : 'NA' }}" readonly>
                                            </div>
                                            <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Start Date</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                     value="{{ !empty($empUserData[0]->plan_start_from) ? $empUserData[0]->plan_start_from : 'NA' }}" readonly>
                                            </div>

                                            <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">End Date</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ !empty($empUserData[0]->plan_expired_on) ? $empUserData[0]->plan_expired_on : 'NA' }}" readonly>
                                            </div>
                                            <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Last Payment Amount</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"  value="{{ !empty($empUserData[0]->payment_amount) ? $empUserData[0]->payment_amount : 0 }}">
                                            </div>
                                             <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Last Payment Recieved On</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"  value="{{ !empty($empUserData[0]->last_payment_recieved_on) ? $empUserData[0]->last_payment_recieved_on : 'NA' }}">
                                            </div>
                                             <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Payment Confirmation Status </label>
                                            @if (!empty($empUserData[0]->payment_status) && $empUserData[0]->payment_status === 1)
                                                  <input type="text" readonly class="form-control" id="inputAddress"  value="Pending">
                                            @elseif (!empty($empUserData[0]->payment_status) && $empUserData[0]->payment_status === 2)
                                                <input type="text" readonly class="form-control" id="inputAddress"  value="Rejected">
                                            @elseif (!empty($empUserData[0]->payment_status) && $empUserData[0]->payment_status === 3)
                                              <input type="text" readonly class="form-control" id="inputAddress"  value="Confirmed">
                                                   @endif
                                            </div>
                                        </div>
                                        <br>


                                        <div class="card-header">
                                            <h4 class="header-title">Jobs Count</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">



                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Posted Jobs</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ is_exist('job_postings', ['posted_by'=>$empUserData[0]->id])}}" readonly>
                                            </div>

                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Approved Jobs</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                     value="{{ is_exist('job_postings', ['posted_by'=>$empUserData[0]->id,'status'=>'APPROVED' ])}}" readonly>
                                            </div>
                                            
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Highlighted Jobs</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="07-02-2024" value="{{ is_exist('job_postings', ['posted_by'=>$empUserData[0]->id,'job_highlighted'=>'Yes' ])}}" readonly>
                                            </div>

                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Applied Jobseekers</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="07-02-2024" value="{{$appliedcount}}">
                                            </div>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label"> Shortlisted Applications</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{$Shortappliedcount}}" readonly>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Shortlisted Jobseekers</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    value="{{ is_exist('job_application_history', ['employer_id'=>$empUserData[0]->id, 'is_shortlisted'=>'Yes'])}}" readonly>
                                            </div>



                                        </div>
                                        
                                        <br>

                                        <div class="card-header">
                                            <h4 class="header-title">SOCIAL LINKS</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">



                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Facebook</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="https://www.facebook.com/"  value="{{ !empty($empUserData[0]->facebook) ? $empUserData[0]->facebook : 'NA' }}">
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Instagram</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="https://www.instagram.com/" value="{{ !empty($empUserData[0]->instagram) ? $empUserData[0]->instagram : 'NA' }}">
                                            </div>
                                         

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Linkedin</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="https://www.linkedin.com/" value="{{ !empty($empUserData[0]->linkedin) ? $empUserData[0]->linkedin : 'NA' }}">
                                            </div>
                                              <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Website</label>
                                                <input type="text" readonly class="form-control" id="inputAddress"
                                                    placeholder="https://www.twitter.com/" value="{{ !empty($empUserData[0]->website) ? $empUserData[0]->website : 'NA' }}">
                                            </div>


                                        </div>
                                        <br>
                                        
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
    <!-- END wrapper -->
@endsection