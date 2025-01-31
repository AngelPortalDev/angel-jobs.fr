{{-- <ul class="nav navbar-nav mob-resp-btn">
							<li>
								<a href="javascript:void(0);">Jobs <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu mm-show jobs-top-btn">
								<li>
									<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
									@csrf
									<input name="search_job_type[]" value='16' hidden>
									<a class="dez-page"><button class="btn btn-none" type="submit">Internship</button></a>
									</form>
								</li>
								<li class="active">
									<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
									@csrf
									<input name="search_job_type[]" value='17' hidden>
									<a class="dez-page"><button class="btn btn-none" type="submit">Part Time</button></a>
									</form>
								</li>
								<li class="active">
										<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET">
									@csrf
									<input name="search_job_type[]" value='19' hidden>
									<a class="dez-page"><button class="btn btn-none" type="submit">Full Time</button></a>
									</form>
								</li>
								</ul>
							</li>
							<li>
							<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET"> 
								@csrf
							<button class="site-button browse-job-btn" type="submit" ><b>Browse Jobs</b></button>
							</form>
								
							</li>
						
								<li>
									<a href="javascript:void(0);" class="site-button" style="color:#fff;background-color: #195577;">Profile<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a class="dez-page" href="{{route('js-profile')}}">My Profile </a></li>
									<li><a href="{{route('logout')}}" style="color:#000;"><i class="fa fa-user" style="color:#fff;"></i> Logout</a></li>
								</ul>
							</li> --}}
{{-- @endif --}}
{{-- <li>
								<a href="javascript:void(0);" class="site-button plans-btn">Plans<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a class="dez-page" href="{{route('jobseeker-plans')}}">Jobseeker </a></li>
								</ul>
							</li>
						</ul>	 --}}






@php
    $table = 'jobseeker_view';
    $where = ['email' => Session::get('js_username')];
    $select = [
        'js_id',
        'fullname',
        'country_name',
        'city_name',
        'role_name',
        'work_desination_name',
        'mob_code',
        'mobile',
        'email',
        'profile_img',
        'email_verified',
        'resume_link',
    ];
    $profile = [];
    $profile = getData($table, $select, $where);

@endphp

<ul class="nav navbar-nav mob-resp-btn d-flex align-items-center">
    <li>
        <a href="javascript:void(0);">Jobs <i class="fa fa-chevron-down"></i></a>
        <ul class="sub-menu mm-show jobs-top-btn">
            <li>
                <a href="https://www.ustudious.com/" target="_blank">Study Abroad</a>
            </li>
            <li>
                <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                    @csrf
                    <input name="search_job_type[]" value='{{base64_encode(16)}}' hidden>
                    <a class="dez-page"><button class="btn btn-none" type="submit">Internship</button></a>
                </form>
            </li>
            
            <li class="active">
                <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                    @csrf
                    <input name="search_job_type[]" value='{{base64_encode(17)}}' hidden>
                    <a class="dez-page"><button class="btn btn-none" type="submit">Part Time</button></a>
                </form>
            </li>
            <li class="active">
                <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
                    @csrf
                    <input name="search_job_type[]" value='{{base64_encode(19)}}' hidden>
                    <a class="dez-page"><button class="btn btn-none" type="submit">Full Time</button></a>
                </form>
            </li>
        </ul>
    </li>
    <li>
        <form class="dezPlaceAni" action="{{ url('top-search-bar') }}" method="GET">
            @csrf
            <button class="site-button browse-job-btn" type="submit"><b>Browse Jobs</b></button>
        </form>

    </li>

    <li>
        <a href="javascript:void(0);" class="" style="background: none">
            @if (!empty($profile[0]->profile_img))
                <img src="{{ url('storage/jobseeker/profile_image/' . $profile[0]->profile_img) }}"
                    class="img-fluid object-fit-cover" alt="not found"
                    style="height: 40px; border-radius: 50%; width: 40px;border: 0.5px solid lightgrey;" />
            @else
                <img src="{{ asset('images/user_profile.png') }}" class="img-fluid object-fit-cover" alt="not found"
                    style="height: 40px; border-radius: 50%; width: 40px;border: 0.5px solid lightgrey;" />
            @endif
        </a>
        <ul class="sub-menu">
            <li><a class="dez-page" href="{{ route('js-profile') }}"><i class="bi bi-person me-2 fs-6"></i> My Profile
                </a></li>
            <li><a href="{{ route('logout') }}"><i class="bi bi-power me-2 fs-6"></i> Logout</a></li>
        </ul>
    </li>
    {{-- @endif --}}
    <li>
        <a href="javascript:void(0);" class="site-button plans-btn">Plans<i class="fa fa-chevron-down"></i></a>
        <ul class="sub-menu">
            <li><a class="dez-page" href="{{ route('jobseeker-plans') }}">Jobseeker </a></li>
        </ul>
    </li>
</ul>
