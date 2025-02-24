@extends('admin.layouts.main')
@section('content')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @include('admin.layouts.breadcrumb')

                    <div class="row">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-pink">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-user-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Registered Job Seekers</h6>
                                    <h2 class="my-2">{{ is_exist('jobseekers', ['is_delete'=>'No']) }}</h2>
                                    <p class="mb-0">
                                        <!-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span> -->
                   
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-purple">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class=" ri-user-2-fill widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Registered Employers</h6>
                                    <h2 class="my-2">{{ is_exist('employers', ['is_deleted'=>'No']) }}</h2>
                                    <p class="mb-0">
                                        <!-- <span class="badge bg-white bg-opacity-10 me-1">18.25%</span> -->
                                       
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-info">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="ri-list-check widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Jobs Listing</h6>
                                 

                                    <h2 class="my-2">{{ is_exist('job_postings', ['is_deleted'=>'No']) }}</h2>
                                    <p class="mb-0">
                                        <!-- <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span> -->
                                
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-3 col-sm-6">
                            <div class="card widget-flat text-bg-primary">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class=" ri-thumb-up-line widget-icon"></i>
                                    </div>
                                    <h6 class="text-uppercase mt-0" title="Customers">Total Shortlisted</h6>
                                    <h2 class="my-2">{{ is_exist('job_application_history', ['is_shortlisted'=>'No']) }}</h2>
                                    <p class="mb-0">
                                        <!-- <span class="badge bg-white bg-opacity-10 me-1">8.21%</span> -->
                                     
                                    </p>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div>


                    <div class="row">
                    

                        <div class="col-xl-12 jobseeker-view-page">
                            <!-- Todo-->
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                            <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                            <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">LATEST JOBSEEKER</h5>
                                    </div>

                                    <div id="yearly-sales-collapse" class="collapse show">

                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 40px;">Sr.</th>
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Designation</th>
                                                        <th>Expriance</th>
                                                        <th>Job Type</th>
                                                         <th>Registered On</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp

                                                    @foreach ($jobSeekerData as $jsData)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="jobseeker-profile-photo">
                                              @if (Storage::disk('public')->exists("jobseeker/profile_image/".$jsData->profile_img) && isset($jsData->profile_img))
                                                <img src="{{ Storage::disk('public')->url("jobseeker/profile_image/".$jsData->profile_img) }}" alt="">
                                            @else
                                                <img src="{{ asset('images/user_profile.png') }}" alt="">
                                            @endif
                                                        </td>
                                                        <td>{{ isset($jsData->fullname) ? $jsData->fullname : ''}}</td>
                                                        <td>{{ isset($jsData->email) ? $jsData->email : ''}}</td>
                                                        <td>{{ isset($jsData->mobile) ? $jsData->mob_code." ".$jsData->mobile : ''}}</td>                                            
                                                        <td>{{ isset($jsData->role_name) ? $jsData->role_name : ''}}</td>                                            
                                                        <td>{{ isset($jsData->experiance_name) ? $jsData->experiance_name : ''}}</td>
                                                        <td><span class="badge bg-primary rounded-pill">{{ isset($jsData->pref_job_type_name) ? $jsData->pref_job_type_name : ''}}</span></td>
                                                        <td>{{ isset($jsData->created_at) ? $jsData->created_at : ''}}</td> 
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                      @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    <div class="row">
                    

                    <div class="col-xl-12">
                        <!-- Todo-->
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="p-3">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse2" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse2"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0">LATEST EMPLOYER</h5>
                                </div>

                                <div id="yearly-sales-collapse2" class="collapse show">

                                    <div class="table-responsive jobseeker-view-page">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Company Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Industry Name</th>
                                                    <th>Plan</th>
                                                      <th>Registered On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($empData as $emp_Data)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="jobseeker-profile-photo">
                                            @if (Storage::disk('public')->exists("employer/profile_image/".$emp_Data->profile_img) && isset($emp_Data->profile_img))
                                                <img src="{{ Storage::disk('public')->url("employer/profile_image/".$emp_Data->profile_img) }}" alt="">
                                            @else
                                                <img src="{{ Storage::url('employer/profile_image/employer.png') }}" alt="">
                                            @endif
                                                        </td>
                                                        <td>{{ isset($emp_Data->fullname) ? $emp_Data->fullname : ''}}</td>
                                                        <td>{{ isset($emp_Data->company_name) ? $emp_Data->company_name : ''}}</td>   
                                                        <td>{{ isset($emp_Data->email) ? $emp_Data->email : ''}}</td>
                                                        <td>{{ isset($emp_Data->mobile) ? $emp_Data->mob_code." ".$jsData->mobile : ''}}</td>                                            
                                                        <td>{{ isset($emp_Data->industry_name) ? $emp_Data->industry_name : ''}}</td>
                                                        <td><span class="badge bg-primary rounded-pill">{{ isset($emp_Data->plan_name) ? $emp_Data->plan_name : ''}}</span></td>
                                                        <td>{{ isset($emp_Data->created_at) ? $emp_Data->created_at : ''}}</td> 
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                      @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                </div>
                <!-- container -->

            </div>
            <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->



    <!-- Daterangepicker js -->
    <script src="{{ asset('admin/assets/js/vendor/moment.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/vendor/daterangepicker.js')}}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('admin/assets/js/vendor/apexcharts.min.js')}}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('admin/assets/js/pages/dashboard.js')}}"></script>


    <!-- App js -->
    <script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
@endsection