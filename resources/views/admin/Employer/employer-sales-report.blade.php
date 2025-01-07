@extends('layouts.main')
@section('content')

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid jobseeker-view-page">

                 @include('layouts.breadcrumb')
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header jobseeker-header">
                                    <div class="btn-group mb-2 jobsee-header-tabs">
<!-- 
                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#signup-modal">
                                            <i class="bi bi-person-plus-fill"></i> Add 
                                        </a> -->
                                        
                                        <!-- <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#delete-selected-modal">
                                            <i class="ri-delete-bin-fill"></i> Delete 
                                        </a>

                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#approve-modal">
                                            <i class="ri-user-follow-line"></i> Approve 
                                        </a>
                                        <a class="btn btn-primary main-button" role="button"
                                            data-bs-toggle="modal" data-bs-target="#reject-modal">
                                            <i class="ri-close-circle-fill"></i> Reject 
                                        </a> -->

                                        <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #03A9F4;"> <i class="ri-file-excel-2-fill"></i> Excel 
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Import</a>
                                                <a class="dropdown-item" href="#">Export</a>
                                            </div>
                                        </div>

                                        <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #03A9F4;"> <i class="ri-filter-2-fill"></i> Filter 
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Approved</a>
                                                <a class="dropdown-item" href="#">Rejected</a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <!-- <table id="alternative-page-datatable" -->
                                    <table id="" class="table table-striped dt-responsive nowrap w-100 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width: 40px;" class="check-box-1"><div class="form-check "> <input type="checkbox" class="form-check-input" id="customCheckcolor1" > </div></th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Plan Name</th>
                                                <th>Plan Duration</th>
                                                <th>Plan Amount</th>
                                                <th>Activated On</th>
                                                <th>Expired On</th>
                                                <th>Payment Method</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                                <td class="check-box-1"><div class="form-check"> 
                                                    <input type="checkbox" class="form-check-input " id="customCheckcolor1" > </div></td>
                                                <td class="jobseeker-profile-photo">
                                                        <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt=""></td>
                                                <td>Angel Portal PVT LTD</td>
                                                <td>Basic Plan</td>
                                                <td>3 Months</td>
                                                <td>40 €</td>
                                                <td> 23/12/2023</td>
                                                <td> 23/3/2024</td>
                                                <td> Credit Card</td>
                                                <td>
                                                    <a href="jobseeker-view-invoice.php" class="text-reset fs-16 px-1" data-bs-toggle="modal" data-bs-target="#view-invoice-modal"> 
                                                        <i class="bi bi-eye-fill"></i></a>
                                                    <a href="employer-send-invoice.php" class="text-reset fs-16 px-1"> 
                                                        <i class="ri-send-plane-fill"></i></a>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="check-box-1"><div class="form-check"> 
                                                    <input type="checkbox" class="form-check-input " id="customCheckcolor1" > </div></td>
                                                <td class="jobseeker-profile-photo">
                                                        <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt=""></td>
                                                <td>Desifood</td>
                                                <td>Advanced Plan</td>
                                                <td>6 Months</td>
                                                <td>70 €</td>
                                                <td> 23/12/2023</td>
                                                <td> 23/3/2024</td>
                                                <td> Credit Card</td>
                                                <td>
                                                    <a href="jobseeker-view-invoice.php" class="text-reset fs-16 px-1" data-bs-toggle="modal" data-bs-target="#view-invoice-modal"> 
                                                        <i class="bi bi-eye-fill"></i></a>
                                                    <a href="employer-send-invoice.php" class="text-reset fs-16 px-1"> 
                                                        <i class="ri-send-plane-fill"></i></a>

                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="check-box-1"><div class="form-check"> 
                                                    <input type="checkbox" class="form-check-input " id="customCheckcolor1" > </div></td>
                                                <td class="jobseeker-profile-photo">
                                                        <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt=""></td>
                                                <td>Oliasi France</td>
                                                <td>Basic Plan</td>
                                                <td>3 Months</td>
                                                <td>40 €</td>
                                                <td> 23/12/2023</td>
                                                <td> 23/3/2024</td>
                                                <td> Credit Card</td>
                                                <td>
                                                    <a href="jobseeker-view-invoice.php" class="text-reset fs-16 px-1" data-bs-toggle="modal" data-bs-target="#view-invoice-modal"> 
                                                        <i class="bi bi-eye-fill"></i></a>
                                                    <a href="employer-send-invoice.php" class="text-reset fs-16 px-1"> 
                                                        <i class="ri-send-plane-fill"></i></a>

                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


 
                    <!-- View Invoice modal content -->
                    <div id="view-invoice-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="topModalLabel">Invoice</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    
                                        <form class="ps-3 pe-3" action="#">
                                            <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Name</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Name</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Plan Name">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Duration</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Plan Duration">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Plan Amount</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Plan Amount">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Activated On</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Activated On">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Expired On</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Expired On">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="username" class="form-label">Payment Method</label>
                                                <input class="form-control" type="email" id="username" required=""
                                                    placeholder="Payment Method">
                                            </div>

                                            


                                        </form>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary">Send</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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