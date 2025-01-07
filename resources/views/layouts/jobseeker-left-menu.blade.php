@php
	$route= \Route::currentRouteName();
@endphp 
<div class="sticky-top">
    <div class="candidate-info company-info">
        {{-- <div class="candidate-detail text-center">
            <div class="canditate-des">
                <a href="javascript:void(0);">
                    <img alt="" src="images/team/pic1.jpg')}}>
                </a>
                <div class="upload-link" title="" data-bs-toggle="tooltip" data-placement="right"
                    data-bs-original-title="update">
                    <input type="file" class="update-flie">
                    <i class="fa fa-camera"></i>
                </div>
            </div>
            <div class="candidate-title">
                <div class="">
                    <h4 class="m-b5"><a href="javascript:void(0);">David Matin</a></h4>
                    <p class="m-b0"><a href="javascript:void(0);">Web developer</a></p>
                </div>
            </div>
        </div> --}}
        <ul>
            <li><a href="{{ route('js-profile') }}"  @if ($route == 'js-profile')
							class="active"
						@endif>
                    <i class="far fa-user" aria-hidden="true"></i>
                    <span>Profile</span></a></li>

            <li><a href="{{ route('js-education') }}"  @if ($route == 'js-education')
							class="active"
						@endif>
                    <i class="far fa-file-alt" aria-hidden="true"></i>
                    <span>Education Qualification</span></a></li>

            <li><a href="{{ route('js-experience') }}"  @if ($route == 'js-experience')
							class="active"
						@endif>
                    <i class="fa fa-random" aria-hidden="true"></i>
                    <span>Work Experience</span></a></li>

            <li><a href="{{ route('js-applied-jobs') }}"  @if ($route == 'js-applied-jobs')
							class="active"
						@endif>
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span>Applied Jobs</span></a></li>

            <li><a href="{{ route('js-saved-jobs') }}"  @if ($route == 'js-saved-jobs')
							class="active"
						@endif>
                    <i class="far fa-id-card" aria-hidden="true"></i>
                    <span>Saved Jobs</span></a></li>


            <li><a href="{{ route('js-transactions') }}"  @if ($route == 'js-transactions')
							class="active"
						@endif>
                    <i class="far fa-user" aria-hidden="true"></i>
                    <span>Transaction Report</span></a>
                </li>


            <li><a href="{{ route('js-change-password') }}"  @if ($route == 'js-change-password')
							class="active"
						@endif>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change Password</span></a></li>

            <li><a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                    <span>Log Out</span></a></li>
        </ul>
    </div>
</div>
