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
                                <!-- <div class="card-header">
                                    <h4 class="header-title">BASIC INFORMATION</h4>

                                </div> -->
                                <div class="card-body">
                                    @foreach ($pagesData as $data)
                                    <form id="seoAdd">
                                        <div class="row g-2">

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Page Name</label>
                                                <input type="text" class="form-control" name="page_name" id="page_name"
                                                    placeholder="Eg.  About Us" value="{{ isset($data->page_name) ?  $data->page_name : "" }}" hidden>
                                            </div>

                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">Slug</label>
                                                <input type="text" class="form-control" name="slug"  id="slug"
                                                    placeholder="Slug" value="{{ isset($data->slug) ?  $data->slug : "" }}" hidden>
                                                    
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="keywords" class="form-label">Keywords</label>
                                                <input type="text" class="form-control" name="keywords" id="keywords"
                                                    placeholder="Keywords" value="{{ isset($data->keywords) ?  $data->keywords : "" }}" hidden>
                                                   
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="inputAddress" class="form-label">H1 Tag	</label>
                                                <input type="text" class="form-control" id="h_tag" name="h_tag"
                                                    placeholder="H1 Tag	" value="{{ isset($data->h1_tag) ?  $data->h1_tag : "" }}" hidden>
                                                   
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title" value="{{ isset($data->page_title) ?  $data->page_title : "" }}" hidden>
                                                   
                                            </div>
                                            <div class="  col-md-4">
                                                <label for="meta_disc" class="form-label">Meta Discription</label>
                                                <input type="text" class="form-control" id="meta_disc" name="meta_disc"
                                                    placeholder="Meta Discription" value="{{ isset($data->page_content) ?  $data->page_content : "" }}" hidden>
                                                   
                                            </div>
                                            <div class=" mb-2  col-md-4">
                                                <label for="meta_tags" class="form-label">Meta Tags</label>
                                                <input type="text" class="form-control" id="meta_tags" name="meta_tags"
                                                    placeholder="Meta Tags" value="{{ isset($data->meta_tags) ?  $data->meta_tags : "" }}" hidden>
                                                   
                                            </div>
                                             <div class="  col-md-8">
                                                <label for="meta_disc" class="form-label">Page Url</label>
                                                <input type="text" class="form-control" id="page_url" name="page_url"
                                                    placeholder="https://angel-jobs.mt/page-name" value="{{ isset($data->page_url) ?  $data->page_url : "" }}">
                                                   
                                            </div>
                                            
                                            
                                            <div class=" mb-2  col-md-12">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="live" name="live" value="Yes" @if ($data->page_status === 'Live')
                                                        {{ 'checked'}}
                                                    @endif>
                                                    <label class="form-check-label" for="customSwitch1">Live</label>
                                                
                                                </div>
                                            </div>

                                        </div>

                                        <br>
                                        
             

                   
                                  <button type="button" class="btn btn-primary mb-4 addPage">Add</button>

                                    </form>
                                      @endforeach
                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
@endsection