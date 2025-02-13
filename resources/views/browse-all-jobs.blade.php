@extends('layouts.main')
@section('content')



<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	{{-- <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/browse-all-jobs-top-bg.jpg') }})">
	<div class="container">
		<div class="dez-bnr-inr-entry">
			<h1 class="text-white">Browse Jobs</h1>
			<!-- Breadcrumb row -->
			<div class="breadcrumb-row">
				<ul class="list-inline">
					<li><a href="index.html">Home</a></li>
					<li>Browse All Jobs</li>
				</ul>
			</div>
			<!-- Breadcrumb row END -->
		</div>
	</div>
</div> --}}
<!-- inner page banner END -->
<!-- Filters Search -->
<div class="section-full browse-job-find">
	<div class="container">
		<div class="find-job-bx">
			{{-- @include('browse-all-jobs.top-search-header') --}}
		</div>
	</div>
</div>

<!-- Filters Search END -->
<!-- contact area -->
<div class="content-block">

	<!-- Browse Jobs -->
	<div class="section-full browse-job p-b50 pt-4">
		<div class="container">
			
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5 m-b30">
					{{-- Jobs Filter Sections --}}
					@include('browse-all-jobs.left-filters')
					{{-- Jobs Filter Sections end --}}
				</div>

				{{-- Jobs Card Display section --}}
				{{-- @include('browse-all-jobs.jobs-display-section', ['pages'=>$page]) --}}
				@include('browse-all-jobs.jobs-display-section')
				{{-- Jobs Card Display section end --}}
			</div>
		</div>
	</div>
	<!-- Browse Jobs END -->
</div>
<?php 


?>
</div>
<!-- Content END-->
@endsection()