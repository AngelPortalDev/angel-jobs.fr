@extends('admin.layouts.main')
@section('content')

        <div class="content-page jobseeker-edit-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                        @include('admin.layouts.breadcrumb')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <form id="EmailForm">
                                        <div class="row g-2">
                                               <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">All or single </label>
                                                <select class="form-select  mb-2" name="bulk_cat" id="bulk_cat">
                                                    <option selected  value="">Select</option>
                                                    <option value="1">All</option>
                                                    <option value="2">Single</option>

                                                </select>
                                                <span id="bulk_cat_error" style="color:red;display:none;">
												<small>
													<i>Please Select All or single </i>
												</small></span>
                                            </div>
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Type </label>
                                                <select class="form-select  mb-2" name="type" id="type">
                                                    <option selected  value="">Select</option>
                                                    {{-- <option value="0">All</option> --}}
                                                    <option value="1">Employer</option>
                                                    <option value="2">Jobseeker</option>
                                                </select>
                                                        <span id="type_error" style="color:red;display:none;">
												<small>
													<i>Please Select Type </i>
												</small></span>
                                            </div>
                                    
                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Status Type </label>
                                                <select class="form-select  mb-2" name="status_type" id="status_type">
                                             <option selected value="">Select</option>
                                                    <option value="1">All</option>
                                                    <option value="2">Paid</option>
                                                    <option value="3">Free</option>
                                                </select>
                                                <span id="status_type_error" style="color:red;display:none;">
												<small>
													<i>Please Select Status Type </i>
												</small></span>
                                            </div>

                                         

                                            <div class="   col-md-4">
                                                <label for="inputAddress" class="form-label">Select Email Template</label>
                                                <select class="form-select  mb-2" name="email_template" id="email_template">
                                                     <option selected  value="">Select</option>
                                                     <option value="{{base64_encode('0')}}">Custom</option>
                                                 @foreach (getDropDownlist('email_templates', ['id', 'template_name']) as $email_templates)
												<option value="{{ base64_encode($email_templates->id)}}">{{ $email_templates->template_name}}
												</option>
												@endforeach 
                                                </select>
                                                <span id="email_template_error" style="color:red;display:none;">
												<small>
													<i>Please Select Email Template </i>
												</small></span>
                                            </div>

                                            <div class="  col-md-4 multipleMails d-none">
                                                <label for="inputAddress" class="form-label">Select Multiple Email
                                                </label>
                                                     <select class="form-select  mb-2" name="selected_emails[]" id="selected_emails" multiple>
                                                     <option selected  disabled value="">Select Mails</option>
                                                </select>
                                                    <span id="selected_emails_error" style="color:red;display:none;">
												<small>
													<i>Please Select atleast 1 Email </i>
												</small></span>
                                            </div>

                                              <div class="col-md-12">
                                                <label for="emails_subject" class="form-label">Email Subject</label>
                                               <input type="text" class="form-control"
                                                    placeholder="" id="emails_subject" name="emails_subject">
                                                <span id="emails_subject_error" style="color:red;display:none;">
												<small>
													<i>Please Select Email Subject </i>
												</small></span>
                                            </div>
                                            <div class="  col-md-12">
                                                <label for="email_content" class="form-label">Email Content</label>
                                                <textarea type="text" class="form-control" id="email_content" name="email_content"></textarea>
                                                <span id="email_content_error" style="color:red;display:none;">
												<small>
													<i>Please Select Email Content </i>
												</small></span>
                                            </div>


                                        </div>

                                        <br>

                    <button type="button" class="btn btn-primary mb-4 me-2" id="mailsend">Send</button>
                    <button type="button" class="btn btn-secondary mb-4">Back</button>
                                    </form>

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>




                   
                </div> <!-- container -->

            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
      <script>
// $('.selected_emails').select2({
// placeholder: 'Choose Mails',
// allowClear: true
// });
CKEDITOR.replace('email_content');
</script>
    <!-- END wrapper -->
@endsection