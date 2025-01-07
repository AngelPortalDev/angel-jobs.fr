@extends('layouts.main')
@section('content')
    <!-- Content -->


    <!-- inner page banner END -->
    <!-- Content -->
    <div class="page-content bg-white login-style2 login-top"
        style="background-image: url({{ asset('images/jobseeker-login-bg.jpg') }}); background-size: cover;padding-bottom: 0px;">
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

                                    <form id="js_LoginForm" class="tab-pane active col-12 p-a0 ">
                                        {{-- <form id="js_LoginForm" action="{{url('jobseeker-login')}}" method="POST" class="tab-pane active col-12 p-a0 "> --}}
                                        <h5 class="font-weight-700 m-b5">JOBSEEKER LOGIN</h5>
                                        <p class="font-weight-600">If you have an account with us, please log in.</p>
                                        {{-- @csrf    --}}
                                        <div class="form-group">
                                            <input name="username" id="js_username" class="form-control"
                                                placeholder="Email Address" type="text">
                                            <span id="js_login_user_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please provide email </i>
                                                </small></span>
                                        </div>

                                        <div class="form-group" style="position: relative;">
                                            <input name="password" id="js_password" class="form-control"
                                                placeholder="Password" type="password">

                                            <span toggle="#js_password"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>


                                            <span id="js_login_pass_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please provide password </i>
                                                </small></span>
                                        </div>



                                        <div class="text-center">
                                            <button class="site-button float-start" id="login_js">login</button>
                                            {{-- <button class="site-button float-start" type="submit">login</button> --}}
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
                                                <input name="passtype" value="{{ base64_encode('js') }}" type="text"
                                                    hidden>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <a class="site-button outline gray" data-bs-toggle="tab"
                                                href="#js_LoginForm">Back</a>
                                            <button class="site-button float-end" type="button"
                                                id="resetPass">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">


                                <div class="card max-w500 radius-sm m-auto jobsee-card">
                                    <div class="tab-content">
                                        <h5 class="font-weight-700 mb-3">JOBSEEKER REGISTRATION</h5>

                                        <div id="registration-form" class="tab-pane fade active show">
                                            <form class="dez-form" id="js_regFrom">


                                                <div class="form-group">
                                                    <input name="name" id="js_name" class="form-control"
                                                        placeholder="Full Name" type="text">
                                                    <span id="js_fname_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter your full name </i>
                                                        </small>
                                                    </span>
                                                </div>

                                                <div class="form-group">
                                                    <input name='email' id="js_email" class="form-control"
                                                        placeholder="Email Address" type="text">
                                                    <span id="js_email_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter email id </i>
                                                        </small>
                                                    </span>
                                                    <span id="js_email_ptrn_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Email id e.g abc@gmail.com </i>
                                                        </small>
                                                    </span>
                                                    <span id="email_exists_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Email id is already Exist <a
                                                                    href="{{ route('js_login') }}">Login Now </a> </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                {{-- <img src="{{ Storage::url('country_flags/afganistan.png') }}" alt=""> --}}
                                                {{-- <div class="form-group" style="display:flex">
                                                    <div class="dropdown bootstrap-select job-reg-mobile-code"  style="width: 30%;">
                                                        <select class="" name="mob_code" id="mob_code">
                                                            <option value="" selected>Select</option>
                                                            <option value="+356">+356</option>
                                                              @foreach (getDropDownlist('country_master', ['id', 'country_code', 'country_flag']) as $countylist)
                                                            
                                                            <option value="{{$countylist->country_code}}"><img src="{{ Storage::url('country_flags/'.$countylist->country_flag)}}">
                                                                 @php
                                                                echo '<pre>';
                                                                print_r($countylist);
                                                            @endphp 
                                                                {{$countylist->country_code}}</option>
                                                             @endforeach ()
                                                        </select>
                                            <span id="mob_code_error" style="color:red;display:none;">
                                                <small>
                                                    <i>Please Select Country code. </i>
                                                </small></span>
                                                    </div> --}}
                                                <?php
                                                $countryData = getCountryCodeByIp();
                                                $country_code = $countryData['country_code'];
                                                $country_flag = $countryData['country_flag'];
                                                
                                                ?>
                                               <div class="form-group" style="display:flex">
                                                <div class="dropdown bootstrap-select job-reg-mobile-code emp-reg-mob-code" style="width: 40%;">
                                                    <img src="{{ asset('images/india.png') }}" alt="not found" style="width: 30px; height: auto; margin-right: 0px; border-radius: 0px;"/>
                                                    <input type="text" class="form-control mob-emp-input" name="mob_code" value="+91" readonly style="right-margin: 1px 2px;">
                                                    <span id="mob_code_error" style="color:red;display:none;">
                                                        <small><i>Please select country code.</i></small>
                                                    </span>
                                                </div>
                                            
                                                <div style="width: 80%;">
                                                    <input type="tel" id="js_contact_no" name="contact_no" class="form-control" placeholder="Mobile No." maxlength="10">
                                                    <span id="js_contact_no_error" style="color:red;display:none;">
                                                        <small><i>Please provide mobile no.</i></small>
                                                    </span>
                                                    <span id="mob_exists_error" style="color:red;display:none;">
                                                        <small><i>Mobile no is already exist</i></small>
                                                    </span>
                                                </div>
                                            </div>
                                            

                                                <div class="form-group">
                                                    <input name="password" id="reg_js_password" class="form-control"
                                                        placeholder="Password" type="password">
                                                    <span id="js_password_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Password should be like e.g Abc@1234 </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <input name="c_password" id="reg_js_c_password" class="form-control"
                                                        placeholder="Confirm Password" type="password">

                                                    <span toggle="#reg_js_c_password"
                                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>


                                                    <span id="js_c_password_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please enter confirm password </i>
                                                        </small>
                                                    </span>
                                                    <span id="js_cpassord_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Password not match. </i>
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="m-b30">
                                                    <span class="form-check float-start m-r5">
                                                        <input type="checkbox" class="form-check-input" id="js_tnc"
                                                            name="tnc" value="Yes">
                                                        <label class="form-check-label log-reg-label" for="js_tnc">I
                                                            agree to the</label>

                                                    </span>
                                                    <label class="log-reg-label"><a
                                                            href="{{ route('terms-and-conditions') }}"
                                                            target="_blank">Terms of Service </a>&amp; <a
                                                            href="{{ route('privacy-policy') }}" target="_blank">Privacy
                                                            Policy</a></label>
                                                    <br>
                                                    <span id="js_tnc_error" style="color:red;display:none;">
                                                        <small>
                                                            <i> Please accept T&C & privacy policies </i>
                                                        </small>
                                                    </span>
                                                </div>

                                                <div class="form-group clearfix text-left">
                                                    <button class="site-button " id="jsregSubmit" type="button" style="white-space:nowrap">Register
                                                        Now</button>
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
