@extends('layouts.main')
@section('content')

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
 @include('layouts.breadcrumb')

                        <div class="row invoice-sec">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Invoice Logo-->
                                        <div class="clearfix">
                                            <div class="float-start mb-3">
                                                <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt="dark logo" height="72">
                                            </div>
                                            <div class="float-end">
                                                <p class="fs-13"><strong>Invoice No: </strong> <span class="float-end">#123456</span></p>
                                                <p class="fs-13"><strong>Employer Id: </strong> <span class="float-end">856</span></p>
                                                <p class="fs-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; Jan 17, 2023</p>
                                                <p class="fs-13"><strong>Payment Mode: </strong> <span class="badge bg-success float-end">Debit Card</span></p>
                                            </div>
                                        </div>

           
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <h6 class="fs-14">FROM,</h6>
                                                <address>
                                                    Angel Jobs Malta<br>
                                                    23 Vincenzo Dimech Street,<br>
                                                    Floriana Malta.<br>
                                                    <abbr title="Mail">E:</abbr>  info@angel-jobs.mt <br>
                                                    <!-- <abbr title="Phone">P:</abbr> (123) 456-7890 -->
                                                </address>
                                            </div> <!-- end col-->
            
                                            <div class="col-6">
                                                <h6 class="fs-14">TO,</h6>
                                                <address>
                                                    Thomson<br>
                                                    795 Folsom Ave, Suite 600<br>
                                                    San Francisco, CA 94107<br>
                                                    <abbr title="Mail">E:</abbr>  thomsan@am-jobs.com <br>
                                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                                </address>
                                            </div> <!-- end col-->
                                        </div>    
                                        <!-- end row -->        
    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-centered table-hover table-borderless mb-0 mt-3">
                                                        <thead class="border-top border-bottom bg-light-subtle border-light">
                                                        <tr><th>#</th>
                                                            <th>Product</th>
                                                            <th>Plan Duration</th>
                                                            <th>Activated On</th>
                                                            <th>Expired On</th>
                                                            <th class="text-end">Total (€)</th>
                                                        </tr></thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="">1</td>
                                                            <td>
                                                                <b>Advanced </b>

                                                            </td>
                                                            <td>3 Months</td>
                                                            <td>2021-09-23</td>
                                                            <td>2021-12-02</td>
                                                            <td class="text-end">€ 40.00</td>
                                                        </tr>

    
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="clearfix pt-3">
                                                    <h6 class="text-muted fs-14">Notes:</h6>
                                                    <small>
                                                        This is a computer generated invoice.
                                                    </small>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-end mt-3 mt-sm-0">
                                                    <!-- <p><b>Sub-total:</b> <span class="float-end">$4120.00</span></p> -->
                                                    <p><b>Service Tax (0%):</b> <span class="float-end">€ 00.00</span></p> <br>
                                                    <h3><b>Grand Total:</b>  € 40.00 </h3>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->
    
                                        <div class="d-print-none mt-4">
                                            <div class="text-center">
                                                <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line"></i> Print</a>
                                                <a href="javascript: void(0);" class="btn btn-info"><i class="ri-send-plane-fill"></i> Send Invoice</a>
                                            </div>
                                        </div>   
                                        <!-- end buttons -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
@endsection