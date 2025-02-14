@extends('layouts.main')
@section('content')
    <!-- Content -->


    <!-- inner page banner END -->
    <!-- Content -->
    
    <div class="page-content bg-white login-style2 login-top"
        style="background-image: url({{ asset('images/employer-login-bg.jpg') }}); background-size: cover;padding-bottom: 0px;">
        <div class="section-full" style="margin-bottom: 50px;">
            <!-- Login Page -->
            <div class="container">
                <div class="row" style="justify-content: center;">

                    <div class="col-lg-6 col-md-6 login-bg-color">

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Sign Up</button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">



                            <div class="login-2 submit-resume p-a30 seth tab-pane fade show active" style="float: none;"
                                id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="tab-content nav">

                                    <form id="LoginForm" class="tab-pane active col-12 p-a0 ">
                                        <h5 class="font-weight-700 m-b5">EMPLOYER LOGIN</h5>
                                        <p class="font-weight-600">If you have an account with us, please log in.</p>

                                        <div class="form-group">
                                            <input name="username" id="username"  class="form-control"
                                                placeholder="Email Address" type="text">
                                            <span id="login_user_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please provide email. </i>
                                                </small></span>
                                        </div>

                                        <div class="form-group">
                                            <input name="password" id="password" class="form-control"
                                                placeholder="Password" type="password">

                                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>


                                            <span id="login_pass_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please provide password. </i>
                                                </small></span>

                                        </div>
                                        <div class="text-center">
                                            <button class="site-button float-start" id="login">login</button>
                                            <a data-bs-toggle="tab" href="#forgot-password"
                                                class="site-button-link forget-pass m-t15 float-end"><i
                                                    class="fa fa-unlock-alt"></i> Forgot Password</a>
                                        </div>
                                    </form>
                                    <form id="forgot-password" class="tab-pane fade  col-12 p-a0 resetPassData">
                                        <p>We'll send you an email to reset your password. </p>
                                        <div class="form-group">
                                            <label>E-Mail address *</label>
                                            <div class="input-group">
                                               <input name="email" required="" class="form-control"
                                                    placeholder="Your Email Address" type="email">
                                                <input name="passtype" value="{{ base64_encode('emp')}}" type="text" hidden>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <a class="site-button outline gray" data-bs-toggle="tab"
                                                href="#LoginForm">Back</a>
                                            <button class="site-button float-end" type="button" id="resetPass">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="card max-w500 radius-sm m-auto">
                                    <div class="tab-content">
                                        <h5 class="font-weight-700 mb-3">EMPLOYER REGISTRATION</h5>
                                        <div id="registration-form" class="tab-pane fade active show">
                                            
                                            <form class="dez-form " id="regFrom" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input name="com_name"  class="form-control" placeholder="Company Name"
                                                        type="text" id="com_name">
                                                    <span id="bk_com_name_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter your company name. </i>
                                                        </small>
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <input name="fullname"  class="form-control" id="fullname" placeholder="Full Name"
                                                        type="text">
                                                    <span id="bk_fname_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter your full name. </i>
                                                        </small>
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <input name='email' id="email_signup" class="form-control"
                                                        placeholder="Email Address" type="text" >
                                                    <span id="bk_email_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter email id. </i>
                                                        </small>
                                                    </span>
                                                    <span id="bk_email_ptrn_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Email id e.g abc@gmail.com </i>
                                                        </small>
                                                    </span>
                                                      <span id="email_exists_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Email id is already Exist <a href="{{ route('emp_login') }}">Login Now </a> </i>
                                                        </small>
                                                    </span>
                                                </div>


                                                <div class="form-group" style="display:flex">
                                                    <div class="dropdown bootstrap-select job-reg-mobile-code emp-reg-mob-code" >
                                                        <img src='{{ asset('images/France-Flag.png') }}' alt="not found"/>
                                                      <input type="text" class="form-control mob-emp-input" name="mob_code" value="+33" readonly style="right-margin: 1px 2px;">
                                                          <span id="mob_code_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Select contry code.</i>
                                                            </small>
                                                        </span>
                                                    </div>
                                                    <div style="width: 84%;">
                                                        <input type="number" id="contact_no_signup"  name="contact_no"
                                                            class="form-control" placeholder="Mobile No.">
                                                        <span id="contact_no_error" style="color:red;display:none;">
                                                            <small>
                                                                <i>Mobile no should be 9 digits.</i>
                                                            </small>
                                                        </span>
                                                         <span id="mob_exists_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Mobile no is already exist.</i>
                                                        </small>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input name="gst_license" id="gst_license" class="form-control"
                                                        placeholder="gst_license" type="file" placeholder="Upload Licence number" accept=".png,.jpg,.jpeg,.pdf">                                                    
                                                        <label for="gst_license">Upload Licence number</label>
                                                    
                                                    <span id="gst_license_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Upload Licence number </i>
                                                        </small>
                                                    </span>
                                                    <span id="gst_license_file_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Invalid file type! Only PDF, PNG, and JPG are allowed. </i>
                                                        </small>
                                                    </span>
                                                    <span id="gst_license_size_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>File size too large! Maximum allowed size is 2MB. </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input name="owner_id" id="owner_id" class="form-control"
                                                        placeholder="owner_id" type="file" placeholder="Upload Owner Id" accept=".png,.jpg,.jpeg,.pdf">                                                    
                                                        <label for="owner_id">Upload Owner ID</label>
                                                    
                                                    <span id="owner_id_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Upload Owner ID </i>
                                                        </small>
                                                    </span>
                                                    <span id="owner_id_file_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Invalid file type! Only PDF, PNG, and JPG are allowed. </i>
                                                        </small>
                                                    </span>
                                                    <span id="owner_id_size_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>File size too large! Maximum allowed size is 2MB. </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input name="password" id="emp_password" placeholder="Password"
                                                        class="form-control" type="password">
                                                    <span id="password_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Password should be like e.g Abc@1234 </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input name="c_password" id="c_password" class="form-control"
                                                        placeholder="Confirm Password" type="password">

                                                        <span toggle="#c_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                                    <span id="c_password_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter confirm password. </i>
                                                        </small>
                                                    </span>
                                                    <span id="cpassord_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Password not match. </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="m-b30">
                                                    <span class="form-check float-start m-r5">
                                                        <input type="checkbox" class="form-check-input" id="tnc"
                                                            name="tnc" value="Yes">
                                                
                                                    </span>
                                                    <label class="form-check-label log-reg-label" for="tnc">I agree to the<a href="{{ route('terms-and-conditions')}}" target="_blank">Terms of Service </a>&amp; <a
                                                            href="{{ route('privacy-policy')}}" target="_blank">Privacy Policy</a></label><br>
                                                                <span id="tnc_error" style="color:red;display:none;">
                                                        <small>
                                                            <i> Please accept T&C & privacy policies </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                  
                                                <div class="form-group clearfix text-left">
                                                    <button class="site-button " id="regSubmit">Register Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>



                    </div>



                </div>
            </div>
            <!-- Login Page END -->
        </div>


        <!-- Content END -->
    </div>
    <!-- Content END-->
@endsection()
