<!DOCTYPE html>
<html lang="en">
<head>

	<!-- PAGE TITLE HERE -->
	<title>Search Jobs in France, Recruitment France</title>
	
	<!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAVICONS ICON -->

	<link rel="icon" href="{{ asset('images/angel-favicon.png')}}" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	
	<!-- STYLESHEETS -->
	<link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/language.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/templete.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('css/skin/skin-1.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dark-layout.css')}}">
  

	<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="{{ asset('css/google-fonts.css')}}" rel="stylesheet">
	    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js')}}"></script>
		<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
		{{-- <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script> --}}
		<!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
		
	 <script>
      function checkalert(msg) {
        swal({
            title: msg,
            text: "",
            icon: "warning",
        });
    }


	</script>
<style>

.select2-selection, .select2-selection--multiple, .select2-selection--clearable{
	border-width: 0 0 2px 0 !important;
    border-color: var(--primary) !important;
    background-color: transparent !important;
    border-radius: 0;
    min-height: 50px;
    padding: 0 0 0 0;
    font-family: rubik;
    color: #000;
    font-size: 15px;
}
.select2-selection__choice__remove{
	display: block;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: var(--primary) !important;
	color: #fff;
	border: none;
}
.select2-results__options{
	display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}



 .dots-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
	position: fixed;
	z-index: 999;
   background-color: rgba(0, 0, 0, 0.2);
}


.dot {
  height: 20px;
  width: 20px;
  margin-right: 10px;
  border-radius: 10px;
  background-color: #b3e1fc;
  animation: pulse 1.5s infinite ease-in-out;
}

.dot:last-child {
  margin-right: 0;
}

.dot:nth-child(1) {
  animation-delay: -0.3s;
}

.dot:nth-child(2) {
  animation-delay: -0.1s;
}

.dot:nth-child(3) {
  animation-delay: 0.1s;
}
li.site-button{
	background-color: var(--primary)!important;
}
@keyframes pulse {
  0% {
    transform: scale(0.8);
    background-color: #b3dbfc;
    box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
  }

  50% {
    transform: scale(1.2);
    background-color: #67c5fb;
    box-shadow: 0 0 0 10px rgba(178, 212, 252, 0);
  }

  100% {
    transform: scale(0.8);
    background-color: #b3dffc;
    box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
  }
}

.site-button{
	border-radius: 5px;
}
.dropdown.bootstrap-select.ql-header{
	display:none
}
</style>
</head>

<body id="bg">
<div id="loading-area"></div>
<section class="bglaoder">
<div class="dots-container" id="loader" style="display: none;">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</section>
<div class="page-wraper">
	<!-- header -->
    <header class="site-header mo-left header fullwidth">
		<!-- Main Header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- Website Logo -->
                    <div class="logo-header mostion logo-dark">
					@if (session()->has('emp_username') )
					<a href="{{route('employer-home')}}"><img src="{{ asset('images/Angel-Jobs-France-logo-01.svg')}}" alt=""></a>
					@else
					<a href="{{url('/')}}"><img src="{{ asset('images/Angel-Jobs-France-logo-01.svg')}}" alt=""></a>
					@endif
					</div>

                    <div class="logo-header mostion logo-white">
						{{-- <a href="{{url('/')}}"><img src="{{ asset('images/Angel-JIndialogo.svg')}}" alt=""></a> --}}
                    </div>
					
					<!-- Nav Toggle Button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>


                    <!-- Extra Nav main buttons -->
                    <div class="extra-nav">
                        <div class="extra-cell">
							<!-- <a href="javascript:void(0);" class="layout-btn">
								<input type="checkbox">
								<span class="mode-label"></span>
							</a> -->
       <!--                     <a href="#" class="site-button"><i class="fa fa-user" style="pointer-events: none;"></i> Sign Up</a>-->
							<!--<a href="#" title="READ MORE" rel="bookmark" data-bs-toggle="modal" data-bs-target="#car-details" class="site-button" style="pointer-events: none;"><i class="fa fa-lock"></i> login </a>-->
                        </div>
                    </div>


                    <!-- Main Nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start main-header-menu" id="navbarNavDropdown">
						<div class="logo-header logo-dark">
							<a href="index.php"><img src="{{ asset('images/angel-jIndialogo.png')}}" alt=""></a>
						</div>
						<div class="logo-header logo-white">
							<a href="index.php"><img src="{{ asset('images/angel-jIndialogo.png')}}" alt=""></a>
                        </div>
					@if (session()->has('emp_username'))
					{{-- Employer Header --}}
						@include('layouts.employer-header')
					@elseif (session()->has('js_username'))
					{{-- Jobseeker Header --}}
						@include('layouts.jobseeker-header')
					@else
					{{-- Guest Header --}}
						<ul class="nav navbar-nav mob-resp-btn">
							
							<li>
								<a href="javascript:void(0);">Jobs <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu mm-show jobs-top-btn">
									<li>
										<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
										@csrf
										<input name="search_job_type[]" value='{{base64_encode(16)}}' hidden>
										<a class="dez-page"><button class="btn btn-none" type="submit">Internship</button></a>
										</form>
									</li>
									<li class="active">
										<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
										@csrf
										<input name="search_job_type[]" value='{{base64_encode(17)}}' hidden>
										<a class="dez-page"><button class="btn btn-none" type="submit">Part Time</button></a>
										</form>
									</li>
									<li class="active">
											<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
										@csrf
										<input name="search_job_type[]" value='{{base64_encode(19)}}' hidden>
										<a class="dez-page"><button class="btn btn-none" type="submit">Full Time</button></a>
										</form>
									</li>
								</ul>
							</li>
							<li>
							<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET"> 
								@csrf
							<button class="site-button browse-job-btn" type="submit" ><b>Browse Jobs</b></button>
							</form>
							</li>
							<li>
								<a href="{{ route('js_login') }}" class="site-button " style="color:#fff;"><i class="fa-solid fa-briefcase" style="color:#fff;"></i> Jobseeker</a>
							</li>
							<li>
								<a href="{{ route('employer-home') }}" class="site-button" style="color:#fff;"><i class="fa fa-user" style="color:#fff;"></i> Employer</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="site-button plans-btn">Plans<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a class="dez-page" href="{{route('jobseeker-plans')}}">Jobseeker </a></li>
									<li><a class="dez-page" href="{{route('employer-plans')}}">Employer</a></li>
		
								</ul>
							</li>
							<li>
								<a href="https://www.ustudious.com/" class="site-button plans-btn" target="_blank">Study Abroad</a>
							</li>

						</ul>	

					@endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Header END -->
    </header>
    <!-- header END -->