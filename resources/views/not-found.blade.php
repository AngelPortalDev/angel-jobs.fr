@extends('layouts.main')
@section('content')

<!-- Content -->
<div class="page-content bg-white">

    <!-- contact area -->
    <div class="section-full content-inner bg-white contact-style-1 main-contact-page">
        <div class="container">
            <!-- Error Page -->
		<div class=" content-inner-3 bg-white">
			<div class="container">
				<div class="row" style="align-items: center">
					<div class="col-md-6 error-page text-center">
                            {{-- <img src="{{ asset('images/page-not-found.png') }}" alt=""> --}}
                            {{-- <img src="{{ asset('images/job-not-found.png') }}" alt=""> --}}
                            <img src="{{ asset('images/jobseeker-not-found.png') }}" alt="">
					</div>
					<div class="col-md-6 error-page text-center mt-md-0 mt-5">
						{{-- <h2 class="dz_error text-secondry">404</h2> --}}
						<h3>OOPS!</h3>
						{{-- <h4 class="text-primary">Page Not Found</h4> --}}
						{{-- <h4 class="text-primary">Job Not Found</h4> --}}
						{{-- <h4 class="text-primary">{Jobseeker Not Found}</h4> --}}
						<h4 class="text-primary">{{  session('msg') }}</h4>
						<a href="{{url('/')}}" class="site-button" style="height: auto;width:auto;">Back To Home</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Error Page END -->
        </div>
    </div>
    <!-- contact area  END -->
</div>
<!-- Content END-->




<!-- Import footer  -->
@endsection()