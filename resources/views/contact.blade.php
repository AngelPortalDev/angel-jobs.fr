@extends('layouts.main')
@section('content')

<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle"
        style="background-image:url({{ asset('images/banner/contact-bg.jpg')}});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Contact Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1 main-contact-page">
        <div class="container">
            <div class="row">
                
                <!-- Left part start -->
                <div class="col-lg-6 col-md-6">
                    <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
                        <h4>Send Message Us</h4>
                        <div class="dzFormMsg"></div>
                        <form id="contactForm" class="dzForm">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="dropdown bootstrap-select mob-code">
                                    <select name="cat" id="cat" class="form-group">
                                        <option value="" selected>Select Category...</option>
                                        <option value="Jobseeker">Jobseeker</option>
                                        <option value="Employer">Employer</option>
                                    </select></div>
                                    <span id="cat_error" style="color:red;display:none; margin-bottom: 5px;">
                                        <small>
                                            <i>Please select category </i>
                                        </small>
                                    </span>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="name" id="name" type="text" class="form-control"
                                                placeholder="Your Name">

                                        </div>
                                        <span id="name_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please enter your name </i>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input name="email" id="email" type="email" class="form-control"
                                                placeholder="Your Email Address">
                                        </div>
                                        <span id="email_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please enter email id </i>
                                            </small>
                                        </span>
                                        <span id="email_ptrn_error" style="color:red;display:none;">
                                            <small>
                                                <i>Email id e.g abc@gmail.com </i>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-4" style="padding-right: 0;">
                                            <div class="form-group">
                                                <div class="dropdown bootstrap-select mob-code">
                                                    <select class="" id="contry_contact_no" name="contry_contact_no">
                                                        {{-- <option value="" >Select Country Code</option> --}}
                                                    {{-- @foreach (getDropDownlist('country_master', ['id','country_code','country_name'],'1') as $code) --}}
                                                    {{-- @if($code->id == '') --}}
                                                        {{-- <option value="1" data-content="{{Storage::url('app/flags/india.png')}}">+91</option> --}}

                                                        <option value="1" data-content='<img src="{{ asset('images/india.png') }}" style="width: 20px; height: 15px; margin-right:5px; border-radius:0px">  +91'></option>
                                                    {{-- @endif --}}
                                                    {{-- @endforeach  --}}
                                                    </select>
                                                </div>
                                                     <span id="code_contact_no_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Select code</i>
                                                    </small>
                                                </span>
                                                
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="form-group">
                                                <input type="tel" id="contact_no" name="contact_no" class="form-control"
                                                    placeholder="Enter your Mobile No.">
                                                <span id="contact_no_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please Provide Contact No.</i>
                                                    </small>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="message" id="message" rows="4" class="form-control"
                                                placeholder="Your Message..."></textarea>

                                        </div>
                                        <span id="message_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please enter message </i>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="recaptcha-bx">
                                        <div class="input-group">
                                            <div class="g-recaptcha" data-sitekey="<!-- Put reCaptcha Site Key -->"
                                                data-callback="verifyRecaptchaCallback"
                                                data-expired-callback="expiredRecaptchaCallback"></div>
                                            <input class="form-control d-none" style="display:none;"
                                                data-recaptcha="true" required data-error="Please complete the Captcha">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button name="submit" type="button" value="Submit" class="site-button"
                                        id="submitcontact"> <span>Submit</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- right part start -->
                <div class="col-lg-6 col-md-6 ">
                    <div class="p-a30 border-1  m-b30 contact-area border-1 align-self-stretch radius-sm">
                        <h4 class="m-b10">Quick Contact</h4>
                        <p>If you have any questions simply use the following contact details.</p>
                        <ul class="no-margin">
                            {{-- <li class="icon-bx-wraper left m-b30">
                                <div class="icon-bx-xs border-1"> <a class="icon-cell"><i
                                            class="ti-location-pin"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
                                    <p>23 Vincenzo Dimech Street, Floriana Malta.</p>
                                </div>
                            </li> --}}
                            <li class="icon-bx-wraper left  m-b30">
                                <div class="icon-bx-xs border-1"> <a class="icon-cell"><i
                                            class="ti-email"></i></a> </div>
                                <div class="icon-content">
                                    <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                                    <p><a href="mailto:info@angel-jobs.com">info@angel-jobs.com</p>
                                </div>
                            </li>
                            <!-- <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
                                        <p>+91 987 654 3210</p>
                                    </div>
                                </li> -->
                        </ul>
                        <div class="m-t20">
                            <ul class="dez-social-icon dez-social-icon-lg">
                                <li><a href="https://www.facebook.com/angeljobsdotcom/" target="_blank" class="fab fa-facebook-f bg-primary"></a></li>
                                <li><a href="https://www.instagram.com/angeljobsdotcom/" target="_blank" class="fab fa-instagram bg-primary"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- right part END -->

            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
<!-- Content END-->
<!-- Modal Box -->
<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body row m-a0 clearfix">
                <div class="col-lg-6 col-md-6 d-flex p-a0"
                    style="background-image: url({{ asset('images/background/bg3.jpg')}});  background-position:center; background-size:cover;">

                </div>
                <div class="col-lg-6 col-md-6 p-a0">
                    <div class="lead-form browse-job text-left">
                        <form>
                            <h3 class="m-t0">Personal Details</h3>
                            <div class="form-group">
                                <input value="" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input value="" class="form-control" placeholder="Mobile Number" />
                            </div>
                            <div class="clearfix">
                                <button type="button" class="btn-primary site-button btn-block">Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Box End -->



<!-- Import footer  -->
@endsection()