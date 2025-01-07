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
                
                        <h1 class="about-h1">Welcome to Angel-Jobs France - where we help shape your career journey!</h1>
                
                        <p class="m-b15">
                            Looking for jobs in France? Angel-Jobs is here to bring together employers and jobseekers, making meaningful connections for success. We're like matchmakers for jobs, linking great companies with talented individuals like yourself. Think of us as your career cupid, ensuring you find the job that truly inspires you.</p>
                
                    </div>
                </div>
                
                
                <div class="row mb-md-5 mb-3 about-list-sec">
                    <div class="col-md-7 mb-3 ">
                        <div class="row about-list-sec">
                
                            <div class="col-md-12">
                                <p>
                                    <strong>What We Offer:</strong><br>
									We are here to help you navigate the job market and find preferred opportunities in France. You can trust us to be your companions throughout the job search journey.
                                </p>
                            </div>
                
                
                            <div class="col-md-6 mb-3 ">
                                <strong>Your Career Guide:</strong>
                                <ol>
                                    <li>Personalized advice just for you.
                                    <li>Pro tips for acing interviews.
                                    <li>Customized career strategies.
                                </ol>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Priority Application Processing:</strong>
                                <ol>
                                    <li>Speed up your applications.</li>
                                    <li>Get priority consideration from employers.</li>
                                </ol>
                            </div>
                
                            <div class="col-md-6 mb-3">
                                <strong>Precision-Matched Job Recommendations:</strong>
                                <ol>
                                    <li>Discover jobs that fit you perfectly.</li>
                                    <li>No more endless job searches.</li>
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
                                    <li>Premium jobs are delivered instantly.</li>
                                    <li>Aligned with your preferences.</li>
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
                    
                    <div class="col-md-6 m-b20 job-wraper" style="display: flex;">
                        <a class="job-bx-wraper" style="display: flex;">
                            <div class="icon-content" >
                                <h5 class="job-name">Mission</h5>
                                <span>
                                    <p>At Angel-Jobs France, our mission is clear: we want to help you discover a job that makes you happy. Everyone deserves work they love and eagerly anticipate. We aim to link you with opportunities that suit your skills and preferences, making the job hunt simple and enjoyable. We're on a mission to ensure you discover a job that fits you perfectly!</p>
									
									<p>Join Angel-Jobs today for a job journey you'll truly enjoy!</p>
                                    
                                   
                                    </span>
                            </div>
                        </a>				
                    </div>
                    <div class="col-md-6 m-b20 job-wraper" style="display: flex;">
                        <a class="job-bx-wraper" style="display: flex;">
                            <div class="icon-content">
                                <h5 class="job-name">Vision</h5>
                                <span><p>We have a vision at Angel-Jobs France to help people make their careers awesome and create a place where skills meet opportunities easily. We want to connect people with jobs that match their skills and bring them happiness. We dream of a future where you can easily find a job and everyone can happily follow their passions. Join Angel-Jobs today, and let's build a happy community where every career journey leads to success!</p></span>
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
								<p>Our good reputation is like a trust beacon. We built it on providing quality service, offering a reliable service, and forming lasting connections with our community and partners.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-02.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Teamwork</h5>
								<p>At Angel-Jobs France, we're like a big family using awesome technology to help you find the preferred job. We work together to discover the job that fits your requirements and skill set and make your desired job a reality.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-03.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Leadership</h5>
								<p>Our leaders at Angel-Jobs France act quickly, communicate well, and provide expert guidance for your career journey. They prioritize teamwork and innovation to ensure your success.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-04.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Positive Impact</h5>
								<p>Our commitment is to empower jobseekers for a better world. Explore diverse roles, build valuable skills, and join a supportive community for growth and success.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-05.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Quality Service</h5>
								<p>We provide excellent service, ensuring a smooth job journey. Offering personalized guidance and quick responses, we prioritize your success with genuine care.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30" style="display: flex;">
						<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
							<div class="icon-md text-primary m-b20"><img src="{{ asset('images/about-icons-06.png')}}" alt="" srcset=""></div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Great Support</h5>
								<p>Our team is here to assist with advanced automation and personalized profiles. Expect reliable support as we navigate your career path together. Feel the warmth of genuine assistance.</p>
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