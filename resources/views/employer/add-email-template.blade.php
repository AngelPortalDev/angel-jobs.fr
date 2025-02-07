@extends('layouts.main')
@section('content')
<style>
    .quill-editor {
    border: 1px solid #ccc;
    padding: 10px;
    background-color: #fff;
    height: auto;
}
.ql-header {
    font-size: 16px;
    color: #007bff;
}

.ql-header .ql-picker-item {
    padding: 5px 10px;
}
.dropdown.bootstrap-select.ql-header{
    display:none;
}
/* .job-bx{
    height:600px;
} */
    </style>

    <!-- Content -->
    <div class="page-content bg-white">
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">

						<div class="col-xl-3 col-lg-3 m-b30">
							@include('layouts/employer-left-menu')
						</div>
						
						<div class="col-xl-9 col-lg-9 m-b30">
							<div class="job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 float-start text-uppercase">All Email Templates</h5>
									<div class="float-end" style="display: flex;align-items: center;"></div>
								</div>
								<div class="form">
                                   
                                    <div class="container">
                                        <form id="addtemplate">
                                          
                                        <div class="row g-2">
                                            <input type="text" value="2" hidden name="type" id="type">
                                            <div class="  col-md-6">
                                                <label for="inputAddress" class="form-label">Template Name<span class="imp-field-star">*</span></label>
                                                <input type="text" class="form-control" placeholder="Please enter template name"
                                                    name="template_name" id="template_name" value="{{ old('template_name') }}">
                                              
                                                    <span id="template_name_error" style="color:red;display:none">Please enter template name</span>
                                             
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label for="inputAddress" class="form-label">Select Jobseekers <span class="imp-field-star"> *</span></label>
                                                <select class=" mb-2" id="job_type" name="job_type" multiple>
                                                          <option value="" disabled selected>Select jobseekers</option>
                                                            <option value="one">one@gmail.com</option>
                                                            <option value="one">two@gmail.com</option>
                                                            <option value="one">three@gmail.com</option>
                                              </select>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <label for="inputAddress" class="form-label">Email Subject<span class="imp-field-star">*</span></label>
                                                <input type="text" class="form-control" placeholder="Please enter subject"
                                                    name="email_subject"  id="email_subject" value="{{ old('email_subject') }}">
                                               
                                                    <span id ="email_subject_error" style="color:red;display:none">Please enter subject</span>
                                              
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputAddress" class="form-label">Email Content</label>
                                                <!-- Div for Quill editor -->
                                                {{-- <div id="editor" style="min-height: 80px;"></div> --}}
                                                <div id="quill-editor" class="mb-3" style="height: 300px;">
														
													</div>
													
													<input type="hidden" name="email_content" id="email_content" value=''>
                                            </div>
                                            
                                            <span id ="email_content_error" style="color:red;display:none">Please enter content</span>
                                                <div class="">
                                                    <button  id="add_template" class="btn btn-primary mb-4 me-2">Add</button>
                                                    <a href="{{ route('emp-manage-mails') }}">
                                                        <button type="button" class="btn btn-secondary mb-4">Back</button>
                                                    </a>
                                                </div>
                                        </div>
                                    </form>
                                    </div>
                                  
                                </div>
								{{-- <div class="pagination-bx m-t30 float-end">
									<ul class="pagination">
										<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
									</ul>
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->




    <script>
    
        function myFunction() {
          var x = document.getElementById("myDIV");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('email_content')) {
                var editor = new Quill('#quill-editor', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('email_content');
                editor.on('text-change', function() {
                    quillEditor.value = editor.root.innerHTML;
                });
    
                quillEditor.addEventListener('input', function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
    
    
    </script>
<!-- Import footer  -->
@endsection()