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
                                        <form action="{{ route('emp-add-template') }}" method="POST">
                                            @csrf
                                        <div class="row g-2">
                                            <div class="  col-md-6">
                                                <label for="inputAddress" class="form-label">Select Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="1">Employer</option>
                                                    <option value="2">Jobseeker</option>
                                                    <option value="0">Common</option>
                                                </select>
                                                @error('type')
                                                    <span style="color:red;text-transform:capitalize">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="  col-md-6">
                                                <label for="inputAddress" class="form-label">Template Name</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder=""
                                                    name="template_name" value="{{ old('template_name') }}">
                                                @error('template_name')
                                                    <span style="color:red;text-transform:capitalize">{{ $message }}</span>
                                                @enderror
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
                                                <label for="inputAddress" class="form-label">Email Subject</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder=""
                                                    name="email_subject" value="{{ old('email_subject') }}">
                                                @error('email_subject')
                                                    <span style="color:red;text-transform:capitalize">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputAddress" class="form-label">Email Content</label>
                                                <!-- Div for Quill editor -->
                                                {{-- <div id="editor" style="min-height: 80px;"></div> --}}
                                                <div id="quill-editor" class="mb-3" style="height: 300px;">
														
													</div>
													
													<input type="hidden" name="email_content" id="email_content" value=''>
                                            </div>
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary mb-4 me-2">Add</button>
                                                    <a href="{{ route('email-view') }}">
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