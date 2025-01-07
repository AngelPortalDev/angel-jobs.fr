@extends('layouts.main')
@section('content')
    <style>
        input:focus {
            outline: none;
        }
    </style>
    <!-- Content -->

    <div class="page-content bg-white">
        {{-- Jobseeker Profile Top  --}}
        @include('layouts/jobseeker-Profile-top')
		
    </div>
	
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full bg-white browse-job p-t50 p-b20">
                <div class="container">
                    <div class="row">
                        {{-- Left Menu --}}
                        <div class="col-xl-3 col-lg-4 m-b30">
                            @include('layouts/jobseeker-left-menu')
                        </div>
                        {{-- Left Menu end --}}
						<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
							<div id="resume_headline_bx" class="job-bx m-b30">
								<div class="d-flex">
									<h5 class="m-b15">Resume Headline</h5>
									<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#resumeheadline" class="site-button add-btn button-sm"><i class="fas fa-pencil-alt m-r5"></i> Edit</a>
								</div>
								<p class="m-b0">Job board currently living in India</p>
								<!-- Modal -->
								<div class="modal fade modal-bx-info editor" id="resumeheadline" tabindex="-1" role="dialog" aria-labelledby="ResumeheadlineModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="ResumeheadlineModalLongTitle">Resume Headline</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>
												<form>
													<div class="row">
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<textarea class="form-control" placeholder="Type Description"></textarea>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="site-button" data-bs-dismiss="modal">Cancel</button>
												<button type="button" class="site-button">Save</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->
								
							</div>


							<div id="attach_resume_bx" class="job-bx m-b30">
								<h5 class="m-b10">Attach Resume</h5>
								<p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
								<form class="attach-resume">
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<div class="custom-file">
													<p class="m-auto align-self-center">
													   <i class="fa fa-upload"></i>
													   Upload Resume File size is 3 MB
													</p>
													<input type="file" class="site-button form-control" id="customFile">
												</div>
											</div>
										</div>
									</div>
								</form>

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
