
@extends('layouts.main')
@section('content')

<style>

	input:focus {
    outline: none;
}



</style>

	
    <!-- Content -->
    <div class="page-content bg-white emp-profile-main-section">
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
									<h5 class="font-weight-700 float-start text-uppercase">Company Profile</h5>
									<a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_view" style="display: none;"><i class="fas fa-eye m-r5"></i> View</a>
									<a href="javascript:void(0);" class="site-button button-sm float-end" id="emp_profile_edit"><i class="fas fa-pencil-alt m-r5"></i> Edit</a>
								</div>

								@foreach ($employerData as $empData)
								<form id="comProfile" enctype="multipart/form-data">
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Full Name <span class="imp-field-star">*</span></label>
												<input type="text" class="form-control-plaintext" value="{{ $empData->fullname}}" placeholder="Enter Full Name" name="full_name" id="full_name" readonly>
											<span id="fullname_error" style="color:red;display:none;">
												<small>
													<i>Please provide full name </i>
												</small>
											</span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Company Name <span class="imp-field-star">*</span></label>
												<input type="text" class="form-control-plaintext" value="{{ $empData->company_name}}" placeholder="Enter Company Name" disabled>
												<input type="text"  value="{{ $empData->company_name}}" name="emp_com_name"  hidden>
											<span id="com_name_error" style="color:red;display:none;">
												<small>
													<i>Please provide company name </i>
												</small>
											</span>
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Company Type</label>
												<select class="slec d-none" name="emp_com_type" id="emp_com_type">
													@if (!empty($empData->company_type))
														<option value="{{ $empData->company_type}}" selected>{{ $empData->company_type_name}}</option>
													@else
														<option value="" disabled selected>Select Company Type</option>
													@endif
												 @foreach (getDropDownlist('company_types', ['id', 'company_type']) as $company_types)
												<option value="{{ $company_types->id}}">{{ $company_types->company_type}}
												</option>
												@endforeach
												</select>
												<input type="text" class="form-control-plaintext textveiw" placeholder="Select Company Type" value="{{ $empData->company_type_name}}"  readonly>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Company Size</label>
												<select class="slec d-none" name="emp_com_size" id="emp_com_size" style="display: block;">
													@if (!empty($empData->company_size))
														<option value="{{ $empData->company_size}}" selected>{{ $empData->company_size_name}}</option>
													@else
														<option value="" disabled selected>Select Company Size</option>
													@endif
												 @foreach (getDropDownlist('company_sizes', ['company_size', 'id']) as $company_sizes)
												<option value="{{ $company_sizes->id}}">{{ $company_sizes->company_size}}
												</option>
												@endforeach
												</select>
												<input type="text" class="form-control-plaintext textveiw" placeholder="Select Company Size" value="{{ $empData->company_size_name}}" readonly>
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6">
											<div class="form-group"  >
												<label>Industry</label>
												<select class="slec d-none" name="emp_com_indus" id="emp_com_indus" style="display: none;">
														@if (!empty($empData->industry))
														<option value="{{ $empData->industry}}" selected>{{ $empData->industry_name}}</option>
													@else
														<option value="" disabled selected>Select Industry</option>
													@endif
												 @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $industries)
												<option value="{{ $industries->id}}">{{ $industries->industries_name}}
												</option>
												@endforeach
												</select>
												<input type="text" class="form-control-plaintext textveiw" placeholder="Select Industry"  value="{{ $empData->industry_name}}"  readonly>
											</div>
											
										</div>

										
										{{-- <div class="col-lg-6 col-md-6">
												<label>Company Logo </label>
										<div class="col-lg-12 col-md-12 slec d-none">
											<div class="form-group">
												<div class="custom-file">
													<p class="m-auto align-self-center">
													   <i class="fa fa-upload"></i> Upload Company Logo  Max.Size 3MB</p>
													<input type="file" name='com_logo' id="com_logo" class="site-button form-control image" id="customFile">
												
												</div>
											<span id="img_size_error" style="color:red;display:none;">
												<small>Min.Size Should be 200px X 200px & Not More then 3 MB</small>
											</span>
													
											</div>
										</div>
											<div class="col-lg-2 col-md-2">
												@if (isset($empData->profile_img))
												<img class="imagePreview" src="{{ asset('images/uploaded_logo/'.$empData->profile_img)}}"  style="min-height: 78px;min-width: 78px;margin: 1px;border-radius:100%;object-fit: contain;">
												
												@else
												<img class="imagePreview" src="{{ asset('images/no-image.png')}}"  style="min-height: 78px;min-width: 78px;margin: 1px;border-radius:100%;object-fit: contain;">
												@endif
												<input type='text' value="{{$empData->profile_img}}" name="old_img_name" hidden>
										</div>

									</div> --}}
									

									{{-- <div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Company GST Number</label>
											<input type="text" class="form-control-plaintext" value="{{$empData->license_no}}" placeholder="Enter GST Number" name="license_no" id="license_no" readonly>
										<span id="license_no_error" style="color:red;display:none;">
											<small>
												<i>Please provide company license number </i>
											</small>
										</span>
										</div>
									</div> --}}
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label>Company Licence Number <span class="imp-field-star">*</span></label>
											<input type="text" class="form-control-plaintext" value="{{$empData->pan_no}}" placeholder="Enter Licence Number" name="pan_no" id="pan_no" readonly>
										<span id="pan_no_error" style="color:red;display:none;">
											<small>
												<i>Please provide licence number </i>
											</small>
										</span>
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label>About Company <span class="imp-field-star">*</span></label>
											{{-- <input type="text" class="form-control-plaintext" value="{{$empData->pan_no}}" placeholder="Enter Pan Number" name="pan_no" id="pan_no" readonly> --}}
											<textarea class="form-control-plaintext" id="about_company" name="about_company" placeholder="Please enter about company" readonly>{!! htmlspecialchars_decode($empData->about_company) !!}</textarea>
										<span id="about_company_error" style="color:red;display:none;">
											<small>
												<i>Please write something about compnay Only 500 character </i>
											</small>
										</span>
										</div>
									</div>
								</div>

									<!-- Contact Information -->
									<div class="job-bx-title clearfix">
										<h5 class="font-weight-700 float-start text-uppercase" >Contact Information</h5>
									</div>
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Mobile</label>
												<input type="text" class="form-control-plaintext" value="+33 {{ $empData->mobile}}"  placeholder="+33 123 456 7890" disabled>
														
												</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Email</label>

												@if ($empData->email_verified === 'Yes')
													<input type="email" disabled class="form-control-plaintext is-valid" value="{{ $empData->email}}" placeholder="exemple@gmail.com">
												<div class="valid-feedback">
													Email Id Verified.
												  </div>
												@elseif ($empData->email_verified === 'No')
													<input type="email" disabled class="form-control-plaintext is-invalid" value="{{ $empData->email}}" placeholder="exemple@gmail.com">
												<div class="invalid-feedback ">
													Not Verified 
													<a href="javascript:void(0)" class="verify"><i>Verify Now</i></a>
												  </div>
												@endif
												
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Address</label>
												<input type="text" name="emp_com_addrss" id="emp_com_addrss"  class="form-control-plaintext" value="{{ $empData->address}}" placeholder="Address">
												<input type="text" hidden name="emp_id" value="{{ $empData->id}}">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>City</label>
												<select class="slec d-none" name="emp_com_city" id="emp_com_city" style="display: none;">
														@if (!empty($empData->city))
														<option value="{{ $empData->city}}" selected>{{ $empData->city_name}}</option>
													@else
														<option value="" disabled selected>Select City</option>
													@endif
												 @foreach (getDropDownlist('cities', ['id', 'city_name']) as $cities)
												<option value="{{ $cities->id}}">{{ $cities->city_name}}
												</option>
												@endforeach
												</select>
												<input type="text" class="form-control-plaintext textveiw" placeholder="Select City"  value="{{ $empData->city_name}}"  readonly>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Country</label>
												<input type="text" disabled class="form-control-plaintext" value="{{ $empData->country_name}}">
												{{-- <select class="slec d-none" name="emp_com_country" id="emp_com_country" style="display: none;">
														@if (!empty($empData->country))
														<option value="{{ $empData->country}}" selected>{{ $empData->country}}</option>
													@else
														<option value="" disabled selected>Select Country</option>
													@endif
												 @foreach (getDropDownlist('country_master', ['id', 'country_name']) as $country_master)
												<option value="{{ $country_master->country_name}}">{{ $country_master->country_name}}
												</option>
												@endforeach
												</select> --}}
												<input type="text" class="form-control-plaintext textveiw"  value="{{ $empData->country_name}}"  hidden>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Postal Code</label>
												<input type="text" name="emp_com_zip" id="emp_com_zip" class="form-control-plaintext" value="{{ $empData->zip}}" placeholder="Postal Code">
											</div>
										</div>
										

									</div>
									<!-- Social Link -->
									<div class="job-bx-title clearfix">
										<h5 class="font-weight-700 float-start text-uppercase">Social links</h5>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Website</label>
												<input type="text" class="form-control-plaintext" name="emp_com_web" id="emp_com_web" value="{{ $empData->website}}" placeholder="https://www.website.com/">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Facebook</label>
												<input type="text" class="form-control-plaintext" name="emp_com_facebook" id="emp_com_facebook" value="{{ $empData->facebook}}" placeholder="https://www.facebook.com/">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Instagram</label>
												<input type="text" class="form-control-plaintext" name="emp_com_insta" id="emp_com_insta" value="{{ $empData->instagram}}" placeholder="https://www.instagram.com/">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Linkedin</label>
												<input type="email" class="form-control-plaintext" name="emp_com_linkedin" id="emp_com_linkedin" value="{{ $empData->linkedin}}" placeholder="https://www.linkedin.com/">
											</div>
										</div>
									</div>
									
									<button type="button" class="site-button m-b30 d-none" id="ProfileSubmit">Update Profile</button>
								</form>
								@endforeach
							</div>
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
