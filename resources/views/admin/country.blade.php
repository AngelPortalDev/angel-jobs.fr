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

                                        <a class="btn btn-primary main-button editElement" role="button" data-bs-toggle="modal"
                                            data-bs-target="#add-modal" data-modal_cat='add'>
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
                                        </a>

                                        {{-- <div class="dropdown jobsee-dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                style="color: #03A9F4;"> <i class="ri-file-excel-2-fill"></i> Excel
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Import</a>
                                                <a class="dropdown-item" href="#">Export</a>
                                            </div>
                                        </div>

                                        <div class="dropdown jobsee-dropdown">
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
                                                    {{-- <div class="form-check "> <input type="checkbox"
                                                            class="form-check-input" id="customCheckcolor1">
                                                         </div> --}}
                                                </th>
                                                <th>Sr. No.</th>
                                                <th>Country Name</th>
                                                <th>Country Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="country_list">
                                        </tbody>
                                    </table>
                                    <p id="total"><i>Total 0 Records Found</i></p>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                    <!-- add-modal content -->
                    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title modal_head" id="topModalLabel">Add Country</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form class="ps-3 pe-3" id="dataUpdate">

                                        <div class="mb-3">
                                            <label for="companyname" class="form-label">Country Name</label>
                                            <input class="form-control" type="text" id="element1" name="element1" required=""
                                                placeholder="">
                                                 <span id="element1_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Country Name </i>
												</small></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Country Code</label>
                                            <input class="form-control" type="text" id="element2" name="element2" required=""
                                                placeholder="">
                                                <input type="text"  name="type"  value="country" id="type" hidden>
                                                <input type="text"  name="element_id" id="element_id" hidden>
                                                 <span id="element2_error" style="color:red;display:none;">
												<small>
													<i>Please Provide Country Name</i>
												</small></span>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio3" name="status"
                                                    class="form-check-input status" value="1">
                                                <label class="form-check-label" for="customRadio3">Approved</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadio4" name="status"
                                                    class="form-check-input reject" value="0">
                                                <label class="form-check-label" for="customRadio4">Rejected</label>
                                            </div>
                                             <span id="status_error" style="color:red;display:none;">
												<small>
													<i>Please Select Status</i>
												</small></span>
                                        </div>
                                 

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-primary addElement">Add</button>
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                        </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                @include('admin.modal')


                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
<script>
    //$(document).ready(function () {
         var type = "country";
             $.ajax({
           url: "{{route('get-element')}}",
            type: "POST",
            data: {type:type},
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#loader").fadeOut();
                if (response.code == 200) {
                   $("#country_list").empty();
                    var i = 1;
                        $.each(response.data['data'], function (index, item) {
                            $("#country_list").append("<tr><td class='check-box-1'><form class='actionId'><input type='checkbox' class='form-check-input' value="+btoa(item.id)+" name='userId[]' id='customCheckcolor"+i+"'><div class='form-check'></div></form></td><td>"+i+"</td><td>"+item.country_name+"</td><td>"+item.country_code+"</td><td><i class='ri-user-follow-line'></i> <span class='badge bg-primary rounded-pill'>"+item.status+"</span></td><td><a href='javascript: void(0);' class='text-reset fs-16 px-1 editElement' data-element_id="+btoa(item.id)+" data-modal_cat='view'><i class='bi bi-eye-fill' data-bs-toggle='modal' data-bs-target='#edit-country-modal'></i></a><a href='javascript: void(0);' class='text-reset fs-16 px-1 editElement' data-element_id="+btoa(item.id)+" data-modal_cat='edit'><i class='mdi mdi-pencil' ></i></a></td></tr>");
                            i++;
                        });
                        $('#total').html("<i>Total " +response.data['total']+" Records Found</i>");
                } 
            },
            error: function (xhr) {
                // Handle the error response
                console.log(xhr.responseText);
                // alert('An error occurred while inserting data.');
            },
             });

    //});
    </script>
@endsection