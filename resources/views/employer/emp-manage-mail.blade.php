@extends('layouts.main')
@section('content')

    <!-- Content -->
    <div class="page-content bg-white">
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">

						<div class="col-xl-3 col-lg-3 m-b30">
							@include('layouts/employer-left-menu')
						</div>
						
						<div class="col-xl-9 col-lg-9 m-b30">
							<div class="job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 float-start text-uppercase">Manage Email Templates</h5>
									<div class="float-end" style="display: flex;align-items: center;">
                                    <div class="me-2 btn btn-outline-primary"><a href="{{ route('add-email-template') }}">Add Template</div>
                                    <div class="job-links-email" style="margin-right: 20px;">
                                            <a href="javascript:void(0);"><i class="ti-trash"></i></a>                                        
                                    </div>
                                    <div class="">
										<span class="select-title">Sort by</span>
										<select>
											<option>All</option>
											<option>Accepted</option>
											<option>Rejected</option>

										</select>
                                    </div>

                                        
									</div>
									
								</div>
								<table class="table-job-bx cv-manager company-manage-job">
									<thead>
										<tr>
											<th class="feature">
												<div class="form-check">
													<input type="checkbox" id="check12" class="form-check-input selectAllCheckBox" name="example1">
													<label class="form-check-label" for="check12"></label>
												</div>
											</th>
											<th>Template Name</th>
											{{-- <th>Modified On</th>
											<th>Created On</th> --}}
											<th>Status</th>
											{{-- <th>Share/Unshare</th> --}}
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="feature">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="check1" name="example1">
													<label class="form-check-label" for="check1"></label>
												</div>
											</td>
											<td class="job-name">
												<a href="javascript:void(0);">Social Media Expert</a>
											</td>
											<td > <span class="badge bg-success">Accepted</span></td>
                                        </tr>

                                        
										<tr>
											<td class="feature">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="check1" name="example1">
													<label class="form-check-label" for="check1"></label>
												</div>
											</td>
											<td class="job-name">
												<a href="javascript:void(0);">Social Media Expert</a>
											</td>
											<td> <span class="badge bg-danger"> Rejected</span></td>
                                        </tr>

										<tr>
											<td class="feature">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="check1" name="example1">
													<label class="form-check-label" for="check1"></label>
												</div>
											</td>
											<td class="job-name">
												<a href="javascript:void(0);">Social Media Expert</a>
											</td>
											<td> <span class="badge bg-warning"> Pending</span></td>
                                        </tr>
										
									</tbody>
								</table>
								<div class="pagination-bx m-t30 float-end">
									<ul class="pagination">
										<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
									</ul>
								</div>
								<!-- Modal -->
								<div class="modal fade modal-bx-info" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<div class="logo-img">
													<img alt="" src="images/logo/icon2.png')}}" >
												</div>
												<h5 class="modal-title">Company Name</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<ul>
													<li><strong>Job Title :</strong><p> Web Developer – PHP, HTML, CSS </p></li>
													<li><strong>Experience :</strong><p>5 Year 3 Months</p></li>
													<li><strong>Deseription :</strong>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since.</p></li>
												</ul>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->
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


<script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>