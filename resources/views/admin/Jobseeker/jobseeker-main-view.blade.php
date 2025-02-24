@extends('admin.layouts.main')
@section('content')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid jobseeker-view-page">

                @include('admin.layouts.breadcrumb')
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header jobseeker-header">
                                    <div class="btn-group mb-2 jobsee-header-tabs">

                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                                            <i class="bi bi-person-plus-fill"></i> Add 
                                        </a>
                                        
                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#delete-selected-modal">
                                            <i class="ri-delete-bin-fill"></i> Delete 
                                        </a>

                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#assing-plan-modal">
                                            <i class="ri-user-follow-line"></i> Assign Plan 
                                        </a>
                                        {{-- <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#approve-modal">
                                            <i class="ri-user-follow-line"></i> Approve 
                                        </a>
                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#reject-modal">
                                            <i class="ri-close-circle-fill"></i> Reject 
                                        </a> --}}

                                        <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #03A9F4;"> <i class="ri-file-excel-2-fill"></i> Excel 
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('js-export')}}">Export</a>
                                            </div>
                                        </div>

                                        {{-- <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #03A9F4;"> <i class="ri-filter-2-fill"></i> Filter 
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Approved</a>
                                                <a class="dropdown-item" href="#">Rejected</a>
                                            </div>
                                        </div> --}}
                                        
                                        
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <!-- <table id="alternative-page-datatable" -->
                                    <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 40px;" class="check-box-1">
                                                    {{-- <div class="form-check "> <input type="checkbox" class="form-check-input" id="customCheckcolor1" > </div> --}}
                                                </th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Plan</th>
                                                {{-- <th>Status</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                         @foreach ($jobseekerData as $jsData)
                                            @php
                                                $id = base64_encode($jsData->id);
                                            @endphp
                                            <tr>
                                                <td class="check-box-1"><div class="form-check"> 
                                                     <form class="actionId">
                                                    <input type="checkbox" class="form-check-input" value="{{$id}}" name="userId[]" id="{{'customCheckcolor'.$id}}" >
                                                      </form>
                                                </div></td>
                                                <td class="jobseeker-profile-photo">
                                                  
                                                @if (Storage::exists("jobseeker/profile_image/".$jsData->profile_img) || !empty($jsData->profile_img))
                                                   <img class="avatar-md rounded-circle bx-s imagePreview"
                                                            src="{{ Storage::url("jobseeker/profile_image/".$jsData->profile_img) }}" alt="" style="height:110%;width:100%;">
												@else
												 <img class="avatar-md rounded-circle bx-s"
                                                            src="{{ asset('images/user_profile.png') }}" alt="">
												@endif
                                                <td>{{ !empty($jsData->fullname) ? $jsData->fullname : '' }}</td>
                                                <td>{{ !empty($jsData->email) ? $jsData->email : '' }}</td>
                                                <td>{{ !empty($jsData->mob_code) ? $jsData->mob_code : '' }} {{ !empty($jsData->mobile) ? $jsData->mobile : '' }}</td>
                                                <td><i class="ri-shield-star-fill"></i> {{ !empty($jsData->plan_name) ? $jsData->plan_name : '' }}</td>
                                                {{-- <td><i class="ri-user-follow-line"></i> Approved</td> --}}
                                                <td>
                                                    <a href="{{url('admin/jobseeker-view', $id)}}" class="text-reset fs-16 px-1"> 
                                                        <i class="bi bi-eye-fill" ></i></a>
                                                    <a href="{{url('admin/jobseeker-edit-view', $id)}}" class="text-reset fs-16 px-1"> 
                                                        <i class="mdi mdi-pencil" ></i></a>
                                                    {{-- <a href="javascript: void(0);" class="text-reset fs-16 px-1"> 
                                                        <i class="ri-delete-bin-2-line " data-bs-toggle="modal" data-bs-target="#delete-single-modal"></i></a> --}}
                                                </td>

                                            </tr>
                                             @endforeach

                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                     <!-- Add Jobseeker modal content -->
                     <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">

                             <div class="modal-header">
                                 <h4 class="modal-title" id="topModalLabel">Add Jobseeker</h4>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>

                             <div class="modal-body">

                                 <form class="ps-3 pe-3" id="addJobseeker">

                                     <div class="mb-3">
                                         <label for="username" class="form-label">Full Name</label>
                                         <input class="form-control" type="text" name="fullname" id="fullname"
                                             required="" placeholder="Full Name">
                                             <span id="bk_fname_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please Enter Your Full Name </i>
                                                        </small>
                                                    </span>
                                     </div>

                                     <div class="mb-3">
                                         <label for="emailaddress" class="form-label">Email Address</label>
                                         <input class="form-control" type="email" name="addemail" id="email_signup"
                                             required="" placeholder="Email Address">
                                             <span id="bk_email_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please Enter Email id </i>
                                            </small>
                                        </span>
                                            <span id="bk_email_ptrn_error" style="color:red;display:none;">
                                            <small>
                                                <i>Email id e.g abc@gmail.com </i>
                                            </small>
                                        </span>
                                            <span id="email_exists_error" style="color:red;display:none;">
                                            <small>
                                                <i>Email id is already Exist </i>
                                            </small>
                                        </span>
                                     </div>

                                     <div class="mb-3">
                                         <label for="mobile-number" class="form-label">Mobile Number</label>
                                         <div class="input-group">
                                            <select class="form-select" style="padding: 5px 0px 5px 5px;" name="mob_code" id="mob_code">
                                            <option value="" selected>Select</option>
                                            <option value="+356">+356</option>
                                                @foreach (getDropDownlist('country_master',['id','country_code']) as $countylist)
                                            <option value="{{$countylist->country_code}}">{{$countylist->country_code}}</option>
                                                @endforeach ()
                                            </select>
                                            <input class="form-control" type="email" name="contact_no" id="contact_no_signup"
                                             required="" placeholder="+1234567890" style="width: 50%;">
                                              
                                        </div>
                                        <span id="contact_no_error" style="color:red;display:none;">
                                            <small>
                                                <i>Please Provide Mobile No. </i>
                                            </small>
                                        </span>
                                            <span id="mob_exists_error" style="color:red;display:none;">
                                        <small>
                                            <i>Mobile No is already Exist</i>
                                        </small>
                                    </span>
                                    <span id="mob_code_error" style="color:red;display:none;">
                                    <small>
                                        <i>Please Select Country code. </i>
                                    </small>
                                </span>
                                     </div>

                                     <div class="mb-3">
                                         <label for="password" class="form-label">Password</label>
                                         <input class="form-control" type="password" required=""
                                             id="password" placeholder="Enter Password" name="password">
                                             <span id="password_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Password should be Like e.g Abc@1234 </i>
                                                        </small>
                                                    </span>
                                     </div>


                                 </form>

                             </div>

                             <div class="modal-footer">
                                 
                                 <button type="button" class="btn btn-primary addJobseeker">Add</button>
                                 <button type="button" class="btn btn-light"
                                     data-bs-dismiss="modal">Close</button>
                             </div>

                         </div><!-- /.modal-content -->
                     </div><!-- /.modal-dialog -->
                 </div><!-- /.modal -->


                 <!-- Delete manually Modal  -->
                <div id="delete-selected-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-2">
                            <div style="float: right;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <i class="ri-information-line h1 text-info"></i>
                                <h5 class="mt-2">Delete records?</h5>
                                <p class="mt-3">Are you sure you want to Delete this Jobseeker?</p>
                                <button type="button" class="btn btn-info my-2 deleteJs" >Delete</button>
                                <button type="button" class="btn btn-light"
                                     data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->            

                <!-- Delete Single Modal  -->
            <div id="delete-single-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-2">
                        <div style="float: right;">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-center">
                            <i class="ri-information-line h1 text-info"></i>
                            <h4 class="mt-2">Delete record?</h4>
                            <p class="mt-3">Are you sure you want to Delete this Jobseeker?</p>
                            <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Delete</button>
                            <button type="button" class="btn btn-light"
                                    data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->      
        
        

        <!-- Approve Modal  -->
        <div id="approve-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div style="float: right;">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="text-center">
                        <i class="ri-information-line h1 text-info"></i>
                        <h4 class="mt-2">Approve records?</h4>
                        <p class="mt-3">Are you sure to approve?</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Delete</button>
                        <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->   
    
    
    <!-- Reject Modal  -->
    <div id="reject-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-2">
                <div style="float: right;">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="text-center">
                    <i class="ri-information-line h1 text-info"></i>
                    <h4 class="mt-2">Reject records?</h4>
                    <p class="mt-3">Are you sure to reject?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   

     <!-- Add Assign Plan modal -->
                     <div id="assing-plan-modal" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">

                             <div class="modal-header">
                                 <h4 class="modal-title" id="topModalLabel">Assign Plan</h4>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                             </div>

                             <div class="modal-body">
                                 <form class="ps-3 pe-3" class="assingPlan">
                                     <div class="mb-3">
                                         <label for="plan_id" class="form-label">Plan :</label>
                                        <select class="form-select mb-2" name="plan_id" id="plan_id">
                                            @foreach (getDropDownlist('jobseeker_plan', ['plan_name', 'id']) as $plan)
                                            <option value="{{ $plan->id}}" >{{ $plan->plan_name}}</option>
                                            @endforeach 
                                        </select>
                                             <span id="plan_id_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please Select Plan </i>
                                                        </small>
                                                    </span>
                                     </div>
                                       <div class="mb-3">
                                         <label for="amount_recieved" class="form-label">Amount Recieved:</label>
                                         <input class="form-control" type="text" name="amount_recieved" id="amount_recieved"
                                             required="" placeholder="Amount Recieved" >
                                             <span id="amount_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please Enter Amount Recieved or 0 </i>
                                                        </small>
                                                    </span>
                                     </div>
                                      <div class="mb-3">
                                         <label for="companyname" class="form-label">Transaction ID:</label>
                                         <input class="form-control" type="text" name="trans_id" id="trans_id"
                                             required="" placeholder="Transaction ID">
                                             <span id="transc_error" style="color:red;display:none;">
                                                        <small>
                                                            <i>Please Enter Transaction ID </i>
                                                        </small>
                                                    </span>
                                     </div>
                                     
                                 </form>

                             </div>

                             <div class="modal-footer">
                                 
                                 <button type="button" class="btn btn-primary planAdd">Add</button>
                                 <button type="button" class="btn btn-light"
                                     data-bs-dismiss="modal">Close</button>
                             </div>

                         </div><!-- /.modal-content -->
                     </div><!-- /.modal-dialog -->
                 </div>
                 {{-- Add Assign Plan modal --}}


                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

@endsection