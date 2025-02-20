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
						<div class="col-xl-5 col-lg-5 m-b30">
							<div class="job-bx job-profile">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 float-start text-uppercase">Change Password</h5>
								</div>
								<form id="changePassword">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label>Old Password</label>
												<input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Please Enter Old Password">
												<span id="old_pass_error" style="color:red;display:none;">
												<small>
													<i>Please provide required old password </i>
												</small></span>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label>New Password </label>
													<input type="text" name="new_pass" id="new_pass" class="form-control" placeholder="Please Enter New Password">
												<span id="new_pass_error" style="color:red;display:none;">
												<small>
													<i>Please provide new password </i>
												</small></span>
												<span id="new_pass_error2" style="color:red;display:none;">
												<small>
													<i>Password should be atleas 8 character with alphaNumeric & spec.Char (e.g Abc@12345) </i>
												</small>
											</span>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label>Confirm New Password</label>
												<input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Please Enter Confirm New Password">
												<span id="conf_pass_error1" style="color:red;display:none;">
												<small>
													<i>Please provide confirm password </i>
												</small>
											</span>
											<span id="conf_pass_error2" style="color:red;display:none;">
												<small>
													<i>Confirm password doesn't match </i>
												</small>
											</span>
											</div>
										</div>
										<div class="col-lg-12 m-b10">
											<button class="site-button" id="updatePassword">Update Password</button>
										</div>
									</div>
								</form>
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
