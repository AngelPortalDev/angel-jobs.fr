@extends('layouts.main')
@section('content')


<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/about-bg.jpg')}});">
		<div class="container">
			<div class="dez-bnr-inr-entry">
				<h1 class="text-white">About Us</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="index.php">Home</a></li>
						<li>About Us</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<div class="content-block about-page-section">
		<div class="section-full content-inner">
			<div class="container">
				<div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <h6 class=" m-b0">About Us</h6>
                
                        <h1 class="about-h1">Welcome to Angel-Jobs for India - your guide for shaping your professional journey!</h1>
                
                        <p class="m-b15">
                            Are you ready to explore job opportunities in India? Angel-Jobs is your dedicated partner in connecting
                            employers with job seekers and fostering meaningful interactions for success. </p>
                
                    </div>
                </div>
                
                
                <div class="row mb-md-5 mb-3 about-list-sec">
                    <div class="col-md-7 mb-3 ">
                        <div class="row about-list-sec">
                
                            <div class="col-md-12">
                                <p>
                                    <strong>Here's What We Offer:</strong><br>
                                    We are your trusted companions in navigating the job market and securing exciting opportunities on
                                    the beautiful island of India.
                                </p>
                            </div>
                
                
                            <div class="col-md-6 mb-3 ">
                                <strong>Personal Career Advisor:</strong>
                                <ol>
                                    <li>Tailored guidance just for you
                                    <li>Pro tips for acing interviews
                                    <li>Customized career strategies
                                </ol>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Priority Application Processing:</strong>
                                <ol>
                                    <li>Fast-track your applications.</li>
                                    <li>Get priority consideration from employers.</li>
                                </ol>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Precision-Matched Job Recommendations:</strong>
                                <ol>
                                    <li>Jobs that fit your skills and preference.</li>
                                    <li>Say goodbye to endless job searches.</li>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Exclusive Networking Events:</strong>
                                <ol>
                                    <li>Connect with industry leaders.</li>
                                    <li>Rub shoulders with professionals.</li>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Real-Time Job Notifications:</strong>
                                <ol>
                                    <li>Premium job are delivered instantly.</li>
                                    <li>Aligned with your preference.</li>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Professional Resume Service:</strong>
                                <ol>
                                    <li>Stand out from the crowd.</li>
                                    <li>Leave a lasting impression.</li>
                            </div>
                        </div>
                    </div>
                
                
                    <!-- <a href="javascript:void(0);" class="site-button">Read More</a> -->
                
                    <div class="col-md-12 col-lg-5">
                        <img src="{{ asset('images/our-work/about-us-page-middle-img.jpg')}}" alt="" 

						
                            style="object-fit: cover; height: 100%;border-radius: 4px;">
                    </div>
                </div>
				
                <div class="row sp20 wrapper-spacing">
                    
                    <div class="col-md-8 m-b20 job-wraper" style="display: flex;">
                        <a class="job-bx-wraper" style="display: flex;">
                            <div class="icon-content" >
                                <h5 class="job-name">Mission</h5>
                                <span>
                                    <p>Our mission at Angel-Jobs India is to redefine job placement by matching skills, opportunities, and careers. We serve as more than a bridge between employers and job seekers; we are dedicated to:</p>
                                    <ol style="margin-left: 15px;">
                                    <li>Empowering job seekers to reach their full potential.</li>
                                    <li>Facilitating smooth transitions from job search to settling in India.</li>
                                    <li>Providing comprehensive solutions for worry-free experiences.</li>
                                    <li>Offering personalized support for uniquely tailored success.</li>
                                     </ol>
                                    
                                    <p>Our commitment lies in making the job-seeking process genuine, simple, and effective for both employers and individuals seeking opportunities in India.</p>
                                    
                                   
                                    </span>
                            </div>
                        </a>				
                    </div>
                    <div class="col-md-4 m-b20 job-wraper" style="display: flex;">
                        <a class="job-bx-wraper" style="display: flex;">
                            <div class="icon-content">
                                <h5 class="job-name">Vision</h5>
                                <span>Empowering individuals to build successful careers and creating a dynamic ecosystem where talent finds opportunities seamlessly. 
                                We see angel-jobs as a catalyst that propels professionals towards their aspirations, fostering a thriving community where every career journey is a path to success.</span>
                            </div>
                        </a>				
                    </div>
                
                </div>
				
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20">
								<img src="{{ asset('images/about-icons-01.png')}}" alt="" srcset="">
							 </div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Our Reputation</h5>
								<p>Our reputation stands as a beacon of trust, built on a foundation of quality service, reliability, and the lasting relationships we have built with our community and partners.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-02.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Teamwork</h5>
								<p>We work together, celebrate diverse talent, and leverage cutting-edge technology to connect candidates with ideal positions. We ensure perfect matching for a seamless fit.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-03.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Leadership</h5>
								<p>Our leaders act swiftly, engage effectively, and with determination to ensure flawless execution to achieve success. They promote teamwork to prioritize innovation.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-04.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Positive Impact</h5>
								<p>We are committed to making a positive impact by empowering job seekers to connect to opportunities for a better world.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-05.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Speedy Service</h5>
								<p>We act immediately upon receiving your inquiry, rapidly beginning to explore your best opportunities to ensure prompt and efficient service.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-06.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Great Support</h5>
								<p>Our team is ready to help. With advanced automation and personalized profiles, we ensure you get the support you deserve from our dedicated team.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Why Chose Us -->
		<!-- Call To Action -->
		<div class="section-full content-inner-2 call-to-action overlay-black-dark text-white text-center bg-img-fix"
			style="background-image: url({{ asset('images/background/resume-section-bg.jpg')}});">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="m-b10">Elevate Your Career Journey with Jobseeker Plan!</h2>
						<p class="m-b0">Ready to take your career to new heights? Join Jobseeker Plan now! With personalized alerts, standout profiles, valuable connections, and seamless applications, let us navigate your path to success together. Buckle up!</p>
						{{-- <a  class="site-button m-t20 outline outline-2 radius-xl">Create an Account</a> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- Call To Action END -->

	</div>
	<!-- contact area END -->
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