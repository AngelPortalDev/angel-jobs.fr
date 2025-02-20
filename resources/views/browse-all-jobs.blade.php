@extends('layouts.main')
@section('content')


<style>
	.showfilter {
		display: none;
	}

	@media (max-width: 767px) {
		.hidefilter {
			display: none;
		}

		.showfilter {
			display: block;
		}

		#paginationLinks {
			width: 100%;
			overflow-x: auto;
			white-space: nowrap;
			display: flex;
			scroll-behavior: smooth;
		}

		.pagination-bx {
			float: none !important
		}

		.job-post-info br {
			display: none
		}

		.filter-sidebar .show-hide-sidebar {
			padding: 10px 30px 10px 20px;
			overflow-y: scroll;
			position: relative;
			width: calc(100% + 17px);
			min-height: 300px;
			display: block;
			height: 100%;
		}

		.page_sidebar {
			position: relative;
			width: 100%;
			margin-bottom: 30px;
			padding: 1rem 1rem;
		}

		.filt-head {
			display: flex;
			padding: 0 1rem 1rem 1.5rem;
			flex-wrap: wrap;
			align-items: center;
		}

		.filt-head .filt-first {
			flex: 1;
			margin: 0;
			font-size: 16px;
			font-weight: 500;
		}

		.filter-sidebar .closebtn {
			position: relative;
			font-size: 36px;
			margin-left: 00px;
			font-weight: 500;
			text-align: center;
			font-size: 14px;
			padding: 0;
			color: #2d4767;
		}

		h6.acod-title {
			font-size: 16px;
			line-height: 5px;
		}

		.filter-sidebar {
			height: 100vh;
			width: 0;
			position: fixed;
			z-index: 1000;
			top: 0;
			left: 0;
			background-color: #fff;
			overflow: hidden;
			transition: 0.5s;
			padding-top: 20px;
			padding-bottom: 2rem;
			box-shadow: 0 0 20px 0 rgba(62, 28, 131, 0.1);
		}
		.pagination {
			display: block;
			text-align: center;
		}
	}
</style>
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