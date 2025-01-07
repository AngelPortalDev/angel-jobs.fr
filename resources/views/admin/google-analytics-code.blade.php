@extends('admin.layouts.main')
@section('content')
        <div class="content-page jobseeker-edit-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
 @include('admin.layouts.breadcrumb')
                    <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <form id="addSiteConfig">
                                        @foreach ($siteConfig as $data)
                                            
                                       
                                        <div class="row g-2">
                                            <div class="  col-md-12">
                                                <label for="google_code" class="form-label">Google Analytics Code</label>
                                                <textarea class="form-control" id="google_code" rows="15" spellcheck="false"  name="google_code" value='{{$data->google_analytics_code}}'>{{$data->google_analytics_code}}</textarea>

                                            </div>
                                        </div>
                                   
                                </div> <!-- end card-body -->
                                
                            </div> <!-- end card-->
                             @endforeach
                                  <button type="button" class="btn btn-primary mb-4 me-2 addConfig">Add</button>
                    <button type="button" class="btn btn-secondary mb-4">Back</button>
                                    </form>
                        </div> <!-- end col -->
                    </div>
                   
                </div> <!-- container -->
            </div> <!-- content -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
@endsection