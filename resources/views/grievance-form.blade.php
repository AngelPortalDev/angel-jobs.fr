@extends('layouts.main')
@section('content')

<!-- Content -->
<div class="page-content bg-white">

    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1 main-contact-page terms-and-conditions-page">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12">
            
                    <h1 class="about-h1">Grievance Form</h1>
                    <div class="text"><a href="{{url('/')}}">Home</a> / Grievance Form</div> <br>

                    <p class="m-b15">
                        
                        Welcome to Angel-Jobs India! We're super excited to have you on our website (www.angel-jobs.in). <br><br>
                        Whether you're searching for a job or have concerns about scams, our team is here to help and keep you safe online.<br><br>
                        Do you have questions? Check out our 'Help Desk' for easy-to-understand answers to common questions. Need more information or help? Just fill out the form below, and we'll email you back within 48 hours.<br><br>
                        If you have any complaints, use the 'Grievance Form' to let us know and help us help you better!
                        </p>
            
                </div>

                 @if (session()->get('code') === 200)
                        <div class="page-content bg-white">
                        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
                        {{session()->get('message')}}
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                        </div>
                       
                    @endif

                <div class="col-md-6 col-lg-6">
                        <div class="job-bx job-profile">
                            {{-- <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 float-start text-uppercase">Grievance Form</h5>
                            </div> --}}
                            <form id="grievanceForm" action="{{url('/grivance')}}" method="POST">
                                @csrf
                                <div class="row m-b30">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Your Name:</label>
                                            <input type="text" name='name' class="form-control" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                                    
                                        <label>Contact Number:</label>
                                        <div class="row">
                                            <div class="col-4 col-md-3" style="padding-right: 0;">
                                                <div class="form-group">
                                                    <div class="dropdown bootstrap-select mob-code">
                                                        <div class="dropdown bootstrap-select">
                                                            <select class="" name="country_code" required>
                                                                  {{-- <option value="">Select Code</option> --}}
                                                                {{-- @foreach (getDropDownlist('country_master', ['country_code']) as $country_master)
                                                                    <option value="{{$country_master->country_code}}">{{$country_master->country_code}}</option>
                                                                @endforeach --}}
                                                                <option value="1" data-content='<img src="{{ asset('images/india.png') }}" style="width: 20px; height: 15px; margin-right:5px; border-radius:0px">  +91'></option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-8 col-md-9">
                                                <div class="form-group">
                                                    <input type="text" name='contact_no' class="form-control" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email Address:</label>
                                            <input type="email" name='email' class="form-control" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" name='address' class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Please share the link (URL) of the Page which you are reporting against:</label>
                                            <input type="url" name='report_url' class="form-control" placeholder="www.angel-jobs.in">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Date of Occurrence:</label>
                                            <input type="date" name='date_oc' class="form-control" placeholder="Date" required>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Description of Grievance</label>
                                            <textarea class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 mb-2">
                                        <div class="form-group">
                                            <label>Attach any relevant documents or screenshots supporting your grievance:</label>
                                            <input type="file" class="form-control" placeholder="Date" name="grfile">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 grievance-checkbox">
                                                <div class="form-check">
                                                    <input class="form-check-input filled" id="companies1" type="checkbox" name="confirm" required>
                                                    <label class="form-check-label" for="companies1">I affirm the accuracy of the information I provided.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input filled" id="companies2" type="checkbox" name="tnc" required>
                                                    <label class="form-check-label" for="companies2">I accept the terms and conditions.</label>
                                                </div>

                                        
                                    </div>
                                    
                                </div>
                                <button class="site-button m-b30" type="submit">Submit</button>
                            </form>
                        </div>    
                    </div>
                </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
<!-- Content END-->




<!-- Import footer  -->
@endsection()