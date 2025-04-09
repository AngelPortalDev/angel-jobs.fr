@php
	$route= \Route::currentRouteName();
@endphp 
<div class="sticky-top">
								<div class="candidate-info company-info">
									<div class="candidate-detail text-center">
										<div class="canditate-des">
											<a>
												@php
												$file_name = getData('employers',['profile_img', 'company_name'],['email' => Session::get('emp_username')]);
											
												@endphp
													@if (!empty($file_name[0]->profile_img))
												<img class="imagePreview" src="{{ Storage::url("employer/profile_image/".$file_name[0]->profile_img) }}"  style="height: 140px;width: 140px;margin: 3px;object-fit: contain;">
												@else
												<img class="imagePreview" src="{{ asset('images/company_profile.png')}}"  style="height: 140px;width: 140px;margin: 3px;object-fit: contain;">
												@endif
											
											</a>
											<div class="upload-link" title="update" data-bs-toggle="tooltip" data-placement="right">
												<form class="proflilImage" enctype="multipart/form-data">
												<input type="file" class="update-flie image profilePic" name='com_logo' id="com_logo" accept=".png,.jpg,.jpeg">
												<input type="text"  class='curr_img' value="{{ isset($file_name[0]->profile_img) ? $file_name[0]->profile_img : ''  }}" name='old_img_name' hidden>
												<i class="fas fa-pencil-alt"></i>
												</form>
											</div>
										</div>
										<div class="candidate-title">
											@if (!empty($file_name[0]->company_name))
											<h4 class="m-b5 com_name_keyup"><a >{{$file_name[0]->company_name}}</a></h4>
											@endif
										</div>
									</div>
									<ul class="d-none d-lg-block">
						
						<li><a href="{{route('company-profile')}}"  @if ($route == 'company-profile')
							class="active"
						@endif>
							<i class="far fa-user" aria-hidden="true"></i> 
							<span>Company Profile</span></a></li>

						<li><a href="{{route('post-job')}}" @if ($route == 'post-job')
							class="active"
						@endif>
							<i class="far fa-file-alt" aria-hidden="true"></i> 
							<span>Post A Job</span></a></li>
							<li><a href="{{route('manage-job')}}" @if ($route == 'manage-job')
							class="active"
						@endif>
							<i class="fa fa-briefcase" aria-hidden="true"></i> 
							<span>Manage Jobs</span></a></li>

						<li><a href="{{route('applied-jobseeker')}}" @if ($route == 'applied-jobseeker')
							class="active"
						@endif>
							<i class="far fa-id-card" aria-hidden="true"></i>
							<span>Applied Jobseekers</span></a></li>

						<li><a href="{{route('shortlisted-jobseeker')}}" @if ($route == 'shortlisted-jobseeker')
							class="active"
						@endif>
							<i class="far fa-id-card" aria-hidden="true"></i>
							<span>Shortlisted Jobseekers</span></a></li>

							<li><a href="{{route('emp-trans')}}" @if ($route == 'emp-trans')
								class="active"
						@endif>
								<i class="fa fa-random" aria-hidden="true"></i>
								<span>Transactions</span></a></li>
								
<li class="side-nav-item">
	<a data-bs-toggle="collapse" href="#emails" aria-expanded="false" aria-controls="emails" class="side-nav-link collapsed">
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<span> Email</span>
		<span class="fa fa-angle-down float-end"></span>
	</a>
	<div class="collapse" id="emails" style="">
		<ul class="side-nav-second-level">
			<li>
				<a href="{{route('manage-mails')}}" class="px-xl-5"><i class="fa fa-envelope-open" aria-hidden="true"></i>Email Templates</a>
			</li>
			<li>
				<a href="{{route('sendmail')}}" class="px-xl-5"><i class="fa fa-envelopes-bulk" aria-hidden="true"></i>Send Bulk Email</a>
			</li>

		</ul>
	</div>
</li>

							{{-- <li><a href="{{route('manage-mails')}}" @if ($route == 'manage-mails')
							class="active"
						@endif>
							<i class="fa fa-paper-plane" aria-hidden="true"></i>
							<span>Email Template</span></a></li> --}}

						<li><a href="{{route('emp-change-password')}}" @if ($route == 'emp-change-password')
							class="active"
						@endif>
							<i class="fa fa-key" aria-hidden="true"></i> 
							<span>Change Password</span></a></li>

						<li><a href="{{route('logout')}}">
							<i class="fas fa-sign-out-alt" aria-hidden="true"></i> 
							<span>Log Out</span></a></li>
					</ul>
				</div>
			</div>