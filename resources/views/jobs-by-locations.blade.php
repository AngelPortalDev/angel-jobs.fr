@extends('layouts.main')
@section('content')

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/browse-all-jobs-top-bg.jpg') }})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Jobs by Locations</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="index.html">Home</a></li>
							<li>Jobs by Locations</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<!-- Filters Search -->
		<div class="section-full browse-job-find">
			<div class="container">
				<div class="find-job-bx">
					<form class="dezPlaceAni">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Job Title, Keywords, or Phrase</label>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fa fa-search"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label>City, State or ZIP</label>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<select>
										<option>Select Sector</option>
										<option>Construction</option>
										<option>Corodinator</option>
										<option>Employer</option>
										<option>Financial Career</option>
										<option>Information Technology</option>
										<option>Marketing</option>
										<option>Quality check</option>
										<option>Real Estate</option>
										<option>Sales</option>
										<option>Supporting</option>
										<option>Teaching</option> 
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<button type="submit" class="site-button btn-block">Find Job</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Filters Search END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full content-inner jobs-category-bx bg-white">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 m-b30">
							<div class="job-bx">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Browse Jobs by Locations
								</div>
								<div class="row">
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/valletta.jpg') }});">
												<div class="city-info">
													<h5>Valletta</h5>
													<span>765 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/victoria.jpg') }});">
												<div class="city-info">
													<h5>Saint Julian</h5>
													<span>352 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/marsaxlokk.jpg') }});">
												<div class="city-info">
													<h5>Zabbar</h5>
													<span>893 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/Sliema.jpg') }});">
												<div class="city-info">
													<h5>Senglea</h5>
													<span>502 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/St-Julians.jpg') }});">
												<div class="city-info">
													<h5>Sliema</h5>
													<span>765 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/Marsaskala.jpg') }});">
												<div class="city-info">
													<h5>Qormi</h5>
													<span>352 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/Floriana.jpg') }});">
												<div class="city-info">
													<h5>Vittoriosa</h5>
													<span>893 Jobs</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="javascript:void(0);">
											<div class="city-bx align-items-end  d-flex"
												style="background-image:url({{ asset('images/city/Melliea.jpg') }});">
												<div class="city-info">
													<h5>Birkirkara</h5>
													<span>502 Jobs</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>    
						</div>

					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->



<!-- Import footer  -->
@endsection()