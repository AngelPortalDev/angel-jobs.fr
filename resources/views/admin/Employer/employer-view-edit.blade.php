@extends('admin.layouts.main')
@section('content')

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
                                </div>
                                <div class="card-body">
                             
                                    <form action="{{ url('admin/employer-edit') }}" method="POST" enctype="multipart/form-data">
                                        <div class="row g-2">
                                            @csrf
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Full Name<span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Full Name"  value="{{ !empty($empUserData[0]->fullname) ? $empUserData[0]->fullname : '' }}" name="full_name">
                                                      @if ($errors->has('full_name'))
                                                        <div style="color: red;">{{ $errors->first('full_name') }}</div>
                                                    @endif
                                                     <input type="text" name="emp_id" 
                                                    value="{{ base64_encode($empUserData[0]->id)}}" hidden>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Company Name <span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Company Name " name="company_name" value="{{ !empty($empUserData[0]->company_name) ? $empUserData[0]->company_name : '' }}" >
                                                     @if ($errors->has('company_name'))
                                                        <div style="color: red;">{{ $errors->first('company_name') }}</div>
                                                    @endif
                                            </div>



                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Company Type</label>
                                                <select class="form-select mb-2" name="emp_com_type" >
                                                    @if (isset($empUserData[0]->company_type) && !empty($empUserData[0]->company_type))
                                                        <option value="{{$empUserData[0]->company_type}}" selected>{{$empUserData[0]->company_type_name}}</option>
                                                        @else
                                                        <option selected>Select Company Type</option>
                                                    @endif
                                                  	@foreach (getDropDownlist('company_types', ['company_type', 'id']) as $company_types)
                                                    @if ($company_types->id != $empUserData[0]->company_type)
                                                    <option value="{{ $company_types->id}}" >{{ $company_types->company_type}}</option>
                                                    @endif
										            @endforeach 
                                                </select>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Company Size</label>
                                                <select class="form-select mb-2" name="emp_com_size" >
                                                 	@if (!empty($empUserData[0]->company_size))
														<option value="{{ $empUserData[0]->company_size}}" selected>{{ $empUserData[0]->company_size_name}}</option>
													@else
														<option value="" disabled selected>Select Company Size</option>
													@endif
												 @foreach (getDropDownlist('company_sizes', ['company_size', 'id']) as $company_sizes)
                                                  @if ($company_sizes->id != $empUserData[0]->company_size)
                                                   	<option value="{{ $company_sizes->id}}">{{ $company_sizes->company_size}}
                                                    @endif
												@endforeach
                                                </select>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Industry</label>
                                                <select class="form-select mb-2" name="emp_com_indus" >
                                                   	@if (!empty($empUserData[0]->industry))
														<option value="{{ $empUserData[0]->industry}}" selected>{{ $empUserData[0]->industry_name}}</option>
													@else
														<option value="" disabled selected>Select Industry</option>
													@endif
												 @foreach (getDropDownlist('industries', ['id', 'industries_name']) as $industries)
                                                    @if ($industries->id != $empUserData[0]->industry)
												<option value="{{ $industries->id}}">{{ $industries->industries_name}}
												</option>
                                                   @endif
												@endforeach
                                                </select>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Company License Number<span class="imp-field-star"> *</span>
                                                </label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Company License Number" name="license_no"  value="{{ !empty($empUserData[0]->license_no) ? $empUserData[0]->license_no : '' }}">
                                                      @if ($errors->has('license_no'))
                                                        <div style="color: red;">{{ $errors->first('license_no') }}</div>
                                                       
                                                    @endif
                                            </div>

                                            <div class="col-md-2 edit-profile-photo">
                                                <label for="inputAddress" class="form-label">Update Profile Photo
                                                </label>

                                                <div class="" style="position: relative;">
                                                    <a class="me-3" href="#">
                                                        @if (!empty($empUserData[0]->profile_img) && isset($empUserData[0]->profile_img))
                                                   <img class="avatar-md rounded-circle bx-s imagePreview"
                                                            src="{{ Storage::url("employer/profile_image/".$empUserData[0]->profile_img) }}" alt="">
												@else
												 <img class="avatar-md rounded-circle bx-s imagePreview"
                                                            src="{{ Storage::url("no-image.jpg") }}" alt="">
												@endif
                                                    </a>
											<i class="fas fa-pencil-alt"><input type="file"  class="update-flie image profilePic" name='com_logo' id="com_logo" accept=".png,.jpg,.jpeg"></i>
												<input type="text"  class='curr_img' value="{{ !empty($empUserData[0]->profile_img) ? $empUserData[0]->profile_img : ''  }}" name='old_img_name' hidden>
												
                                                </div>
                                            </div>


                                        </div>

                                        <br>
                                        <div class="card-header">
                                            <h4 class="header-title">CONTACT INFORMATION</h4>

                                        </div>
                                        <br>
                                        <div class="row g-2">
                                            <div class="col-md-2">
                                                <label for="inputAddress" class="form-label">Country Code<span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Mobile" value="+356" readonly>
                                            </div>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Mobile<span class="imp-field-star"> *</span></label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Mobile" name="mobile_no"  value="{{ !empty($empUserData[0]->mobile) ? $empUserData[0]->mobile : '' }}" >
                                                    @if ($errors->has('mobile_no'))
                                                        <div style="color: red;">{{ $errors->first('mobile_no') }}</div>
                                                    @endif
                                            </div>
                                            <div class="  col-md-3">
                                                <label for="inputAddress" class="form-label">Email Address<span class="imp-field-star"> *</span></label>
                                                <input type="email" class="form-control" id="inputAddress"
                                                    placeholder="Email Address" name="email" value="{{ !empty($empUserData[0]->email) ? $empUserData[0]->email : '' }}" readonly>
                                                     @if ($errors->has('email'))
                                                        <div style="color: red;">{{ $errors->first('email') }}</div>
                                                    @endif
                                            </div>
                                            <div class="  col-md-5">
                                                <label for="inputAddress" class="form-label">Full Address</label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Full Address" name="emp_com_addrss"  value="{{ !empty($empUserData[0]->address) ? $empUserData[0]->address : '' }}">
                                            </div>
                                            <div class="  col-md-2">
                                                <label for="inputAddress" class="form-label">Postal Code</label>
                                                <input type="text" class="form-control" id="inputAddress"
                                                    placeholder="Postal Code" name="emp_com_zip"  value="{{ !empty($empUserData[0]->zip) ? $empUserData[0]->zip : '' }}">
                                            </div>
                                                <div class="   col-md-2">
                                                <label for="inputAddress" class="form-label">City</label>
                                                <select class="form-select mb-2" name="emp_com_city" >
                                                    	@if (!empty($empUserData[0]->city))
														<option value="{{ $empUserData[0]->city}}" selected>{{ $empUserData[0]->city_name}}</option>
													@else
														<option value="" disabled selected>Select City</option>
													@endif
												 @foreach (getDropDownlist('cities', ['id', 'city_name']) as $cities)
                                                 @if ($cities->id != $empUserData[0]->city)
												<option value="{{ $cities->id}}">{{ $cities->city_name}}
                                                     @endif
												</option>
												@endforeach
                                                </select>
                                            </div>
                                             <div class="col-md-2">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text" class="form-control" value="Malta"  name="com_name"  readonly id="country"
                                                    placeholder="Country">
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
                                                <input type="url" class="form-control" id="inputAddress"
                                                    placeholder="https://www.facebook.com/"  value="{{ !empty($empUserData[0]->facebook) ? $empUserData[0]->facebook : '' }}" name="emp_com_facebook" >
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Instagram</label>
                                                <input type="url" class="form-control" id="inputAddress"
                                                    placeholder="https://www.instagram.com/" value="{{ !empty($empUserData[0]->instagram) ? $empUserData[0]->instagram : '' }}" name="emp_com_insta" >
                                            </div>
                                         

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">LinkedIn</label>
                                                <input type="url" class="form-control" id="inputAddress"
                                                    placeholder="https://www.linkedin.com/" value="{{ !empty($empUserData[0]->linkedin) ? $empUserData[0]->linkedin : '' }}" name="emp_com_linkedin" >
                                            </div>
                                              <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Website</label>
                                                <input type="url" class="form-control" id="inputAddress"
                                                    placeholder="https://www.website.com/" value="{{ !empty($empUserData[0]->website) ? $empUserData[0]->website : '' }}" name="emp_com_web" >
                                            </div>


                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary mb-4" name="submit">Save</button>
                                        
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