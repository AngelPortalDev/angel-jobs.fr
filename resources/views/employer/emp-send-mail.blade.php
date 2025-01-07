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
						
						<div class="col-xl-12 col-lg-12 m-b30">
							<div class="job-bx job-profile">
                                <div class="col-lg-12 col-md-12" id="myDIV" style="">
                                    <div class="form-group">
                                        <select id="job_location" name="job_location">
                                            <option value="" selected disabled>Select Existing Template</option>

                                        </select>
                                    </div>
                                </div>

								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 float-start text-uppercase">Send Email</h5>
								</div>
								<form>
									<div class="row m-b30">

                                        <div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Your Email Address <span class="imp-field-star">*</span></label>
												<input type="text" class="form-control" placeholder="info@example.com">
											</div>
										</div>


										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Subject Line <span class="imp-field-star">*</span></label>
												<input type="text" class="form-control" placeholder="Subject Line">
											</div>
										</div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email Body <span class="imp-field-star">*</span></label>
                                                <textarea class="form-control" id="job_disc" name="job_disc"></textarea>
                                                <span id="job_disc_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please write mail body </i>
                                                    </small></span>

                                                    <span style="display: block;padding-top: 5px;">(Max. Char 4000)</span>
                                            </div>
                                            
                                        </div>


									</div>



									<div class="job-bx-title clearfix">
										<h5 class="font-weight-700 float-start text-uppercase">Job Details</h5>
									</div>
									<div class="row">
                                        
										<div class="col-lg-12 col-md-12" >
											<div class="form-group">
                                                <div class="show-hide-check-emp">
                                                    <input type="checkbox" id="job_sal_hide" name="job_sal_hide"
                                                        value="Yes" onclick="myFunction()"> &nbsp;&nbsp;
                                                    <span>Send an Existing Job</span>
                                                </div>
											</div>
										</div>
                                        
                                        <div class="col-lg-12 col-md-12" id="myDIV" style="display: none">
                                            <div class="form-group">
                                                <select id="job_location" name="job_location">
                                                    <option value="" selected disabled>Select Existing Job</option>

                                                </select>
                                            </div>
                                        </div>

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Job Title <span class="imp-field-star">*</span></label>
												<input type="text" class="form-control" placeholder="Job Title">
											</div>
										</div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Experience <span class="imp-field-star">*</span></label>
                                                <select id="job_expr" name="job_expr">
                                                    @foreach (getDropDownlist('experiances', ['id','experiance']) as $experiance)
                                            <option value="{{ $experiance->experiance}}" >{{ $experiance->experiance}}</option>
                                            @endforeach 
    
                                                </select>
                                                <span id="job_expr_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please Select Experience </i>
                                                    </small></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Hiring Location <span class="imp-field-star">*</span></label>
                                                <select id="job_location" name="job_location">
                                                    <option value="" selected disabled>Select Location</option>

                                                </select>
                                                <span id="job_location_error" style="color:red;display:none;">
                                                    <small>
                                                        <i>Please Provide Location </i>
                                                    </small></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Salary Range (Monthly) <span class="imp-field-star">*</span></label>
                                                <select id="job_sal" name="job_sal">
                                                    <option value="" selected>Select Salary Range</option>

                                                </select>

                                            </div>
                                        </div>

										
									</div>
									<button class="site-button m-b30">Preview and Send</button>
                                    <input type="reset" name="" id="" class="site-button m-b30">
									<button class="site-button m-b30">Cancel</button>
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