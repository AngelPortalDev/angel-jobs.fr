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
                                      
                                        {{-- <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#add-plan-modal">
                                            <i class="bi bi-person-plus-fill"></i> Add 
                                        </a>

                                        <a class="btn btn-primary main-button" role="button" data-bs-toggle="modal"
                                            data-bs-target="#delete-selected-modal">
                                            <i class="ri-delete-bin-fill"></i> Delete
                                        </a>

                                        <a class="btn btn-primary main-button" role="button" data-bs-toggle="modal"
                                            data-bs-target="#approve-modal">
                                            <i class="ri-user-follow-line"></i> Approve
                                        </a>
                                        <a class="btn btn-primary main-button" role="button" data-bs-toggle="modal"
                                            data-bs-target="#reject-modal">
                                            <i class="ri-close-circle-fill"></i> Reject
                                        </a> --}}
{{-- 
                                        <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: #03A9F4;"> <i class="ri-file-excel-2-fill"></i> Excel
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Import</a>
                                                <a class="dropdown-item" href="#">Export</a>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: #03A9F4;"> <i class="ri-filter-2-fill"></i> Filter
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
                                                    <div class="form-check ">
                                                         {{-- <input type="checkbox"
                                                            class="form-check-input" id="customCheckcolor1"> --}}
                                                         </div>
                                                </th>
                                                <th>Plan Name</th>
                                                <th>Plan Amount</th>
                                                <th>Duration (Days) </th>
                                                <th>Plan Currency</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($jsPlanData as $data)
                                            <tr>
                                                  <td class="check-box-1"><div class="form-check"> 
                                                     <form class="actionId">
                                                    <input type="checkbox" class="form-check-input" value="{{base64_encode($data->id)}}" name="userId[]" id="{{'customCheckcolor'.base64_encode($data->id)}}" >
                                                         <input type="text" value="1" name="cat[]" hidden>
                                                      </form>
                                                </div></td>

                                                <td>{{$data->plan_name}}</td>
                                                <td>{{$data->plan_amount}}</td>
                                                <td>{{$data->plan_duration}}</td>
                                                <td>{{$data->plan_currency}}</td>

                                                <td><i class="ri-user-follow-line"></i> {{$data->status}}</td>
                                                <td>
                                                    <a href="jobseeker-view.php" class="text-reset fs-16 px-1"
                                                        data-bs-toggle="modal" data-bs-target="#view-plan-modal{{base64_encode($data->id)}}">
                                                        <i class="bi bi-eye-fill"></i></a>
                                                    <a href="#" class="text-reset fs-16 px-1 editPlan"
                                                        data-bs-toggle="modal" data-bs-target="#edit-plan-modal" data-plan_id="{{base64_encode($data->id)}}">
                                                        <i class="mdi mdi-pencil"></i></a>
                                                    {{-- <a href="javascript: void(0);" class="text-reset fs-16 px-1">
                                                        <i class="ri-delete-bin-2-line" data-bs-toggle="modal"
                                                            data-bs-target="#delete-single-modal"></i></a> --}}
                                                </td>

                                            </tr>
                                      @endforeach
                                           


                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->
                      <div id="add-plan-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Add New Plan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                        <form class="ps-3 pe-3 planAdd">
                                            <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Name</label>
                                                <input class="form-control plan_name" type="text" name="plan_name"
                                                    placeholder="Plan Name" >
                                                      <span class="plan_name_error" style="color:red;display:none;">
                                                        <input  type="text" name="plan_id" class="plan_id" hidden>
                                                      <span class="plan_name_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Name </i>
												</small>
											</span>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Currency</label>
                                                <div class="input-group">
                                                    <select id="plan_currency" class="form-select plan_currency"
                                                        style="padding: 5px 0px 5px 5px;" name="plan_currency">
                                                        <option>Euro</option>
                                                        <option>Indian Rupee</option>
                                                        <option>US Dollar</option>
                                                        <option>Pound</option>
                                                    </select>
                                                    <span class="plan_currency_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Currency </i>
												</small>
											</span>

                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Amount</label>
                                                <input class="form-control plan_amount" type="number" id="plan_amount" name="plan_amount" 
                                                    placeholder="Amount" >
                                                     <span class="plan_amount_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Amount </i>
												</small>
											</span>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Duration (No. of Days)</label>
                                                <div class="input-group">
                                                      <input class="form-control plan_duration" type="number" id="plan_duration" name="plan_duration" 
                                                    placeholder="No. of Days" >
                                                    <span class="plan_duration_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Duration </i>
												</small>
											</span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Highlight Application</label>
                                                <div class="input-group">
                                                      <input class="form-control highlight" type="number" id="highlight" name="highlight" 
                                                    placeholder="No. of Highlight" >
                                                </div>
                                                  <span class="highlight_error" style="color:red;display:none;">
												<small>
													<i>Please Provide No. of Highlight Application </i>
												</small>
											</span>
                                            </div>
                                          
                                                
                                           
                                            <div class="mb-3 col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="staus" value="1" class="form-check-input validated approved">
                                                <label class="form-check-label" for="customRadio3">Approved</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="staus" value="0" class="form-check-input validated reject" >
                                                <label class="form-check-label" for="customRadio4">Rejected</label>
                                            </div>
                                             <span class="validated_error" style="color:red;display:none;">
												<small>
													<i>Please Set Status </i>
												</small>
											</span>
                                            </div>



                                    
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary addPlan">Save</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                                    </form>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Edit Plan modal content -->
                    <div id="edit-plan-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Edit Plan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                        <form class="ps-3 pe-3 planUpdateJs">
                                            <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Name</label>
                                                <input class="form-control plan_name" type="text" name="plan_name"
                                                    placeholder="Plan Name" >
                                                      <span class="plan_name_error" style="color:red;display:none;">
                                                        <input  type="text" name="plan_id" class="plan_id" hidden>
                                                      <span class="plan_name_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Name </i>
												</small>
											</span>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Currency</label>
                                                <div class="input-group">
                                                    <select id="plan_currency" class="form-select plan_currency"
                                                        style="padding: 5px 0px 5px 5px;" name="plan_currency">
                                                        <option>Euro</option>
                                                        <option>Indian Rupee</option>
                                                        <option>US Dollar</option>
                                                        <option>Pound</option>
                                                    </select>
                                                    <span class="plan_currency_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Currency </i>
												</small>
											</span>

                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Amount</label>
                                                <input class="form-control plan_amount" type="number" id="plan_amount" name="plan_amount" 
                                                    placeholder="Amount" >
                                                     <span class="plan_amount_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Amount </i>
												</small>
											</span>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Duration (No. of Days)</label>
                                                <div class="input-group">
                                                    <input class="form-control plan_duration" type="number" id="plan_duration" name="plan_duration" 
                                                    placeholder="No. of Days" >
                                                    <span class="plan_duration_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Plan Duration </i>
												</small>
											</span>
                                                </div>
                                            </div>
                                             <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Highlight Application</label>
                                                <div class="input-group">
                                                      <input class="form-control highlight" type="number" id="highlight" name="highlight" 
                                                    placeholder="No. of Highlight" >
                                                </div>
                                                  <span class="highlight_error" style="color:red;display:none;">
												<small>
													<i>Please Provide No. of Highlight Application </i>
												</small>
											</span>
                                            </div>
                                            {{-- <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Relevant Jobs </label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Performance Report</label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div> --}}
                                            {{-- <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Job Post Notification</label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div> --}}
                                           
                                                
                                           
                                            <div class="mb-3 col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="staus" value="1" class="form-check-input validated approved">
                                                <label class="form-check-label" for="customRadio3">Approved</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="staus" value="0" class="form-check-input validated reject" >
                                                <label class="form-check-label" for="customRadio4">Rejected</label>
                                            </div>
                                             <span class="validated_error" style="color:red;display:none;">
												<small>
													<i>Please Set Status </i>
												</small>
											</span>
                                            </div>



                                    
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary updatePlanJs">Save</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                                    </form>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                  


  @foreach ($jsPlanData as $data)
                    <!-- Edit Plan modal content -->
                    <div id="view-plan-modal{{base64_encode($data->id)}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">View Plan Details</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    
                                        <form class="ps-3 pe-3" action="#">
                                            <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Name</label><br>
                                                <label for="username" class="form-label">{{$data->plan_name}}</label>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Currency</label><br>
                                                <label for="mobile-number" class="form-label">{{$data->plan_currency}}</label>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Amount</label><br>
                                                <label for="username" class="form-label">{{$data->plan_amount}}</label>
                                               
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Plan Duration (Days)</label><br>
                                                <label for="mobile-number" class="form-label">{{$data->plan_duration}}</label>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Highlight Application</label><br>
                                                <label for="mobile-number" class="form-label">{{$data->highlight_job_limit}}</label>
                                            </div>
                                            {{-- <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Relevant Jobs </label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Performance Report</label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div> --}}
                                            {{-- <div class="mb-3 col-md-6">
                                                <label for="mobile-number" class="form-label">Job Post Notification</label>
                                                <div class="input-group">
                                                    <select id="inputState" class="form-select"
                                                        style="padding: 5px 0px 5px 5px;">
                                                        <option>Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>

                                                </div>
                                            </div> --}}
                                           
                                                
                                           
                                            <div class="mb-3 col-md-12">
                                        <label class="form-check-label" for="customRadio3">Status : </label>
                                                @if ($data->status === 'APPROVED')
                                                      <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="customRadio3">Approved</label>
                                            </div>
                                                @endif
                                                
                                            <div class="form-check form-check-inline">
                                                @if ($data->status === 'UNAPPROVED')
                                                     <label class="form-check-label" for="customRadio4">Rejected</label>
                                                @endif
                                            </div>
                                            </div>



                                        </form>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

@endforeach
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
                                        <p class="mt-3">Are you sure you want to Delete this Plan ?</p>
                                        <button type="button" class="btn btn-info my-2 deletePlan"
                                            >Delete</button>
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
                                        {{-- <p class="mt-3">Are you sure ?</p> --}}
                                        <button type="button" class="btn btn-info my-2 statusUpdate" data-action="1" data-cat="1">Approve</button>
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
                                        <h4 class="mt-2">Reject Plan?</h4>
                                        {{-- <p class="mt-3">Are you sure ?</p> --}}
                                        <button type="button" class="btn btn-info my-2 statusUpdate" data-action="0" data-cat="1">Reject</button>
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                </div> <!-- container -->

            </div> <!-- content -->

       

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
 @endsection
