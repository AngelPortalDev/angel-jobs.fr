                {{-- <ul class="nav navbar-nav mob-resp-btn">
							<li>
							<a class="dez-page" href="{{route('browse-jobseeker')}}">Browse Jobseeker </a>
							</li>
								<li>
									<a href="javascript:void(0);" class="site-button" style="color:#fff;background-color: #195577;">Profile<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a class="dez-page" href="{{route('company-profile')}}">My Profile </a></li>
									<li><a href="{{route('logout')}}" style="color:#000;"><i class="fa fa-user" style="color:#fff;"></i> Logout</a></li>
								</ul>
							</li>
								<li>
								<a href="javascript:void(0);" class="site-button plans-btn">Plans<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a class="dez-page" href="{{route('employer-plans')}}">Employer</a></li>
								</ul>
							</li>
						</ul>	 --}}

                <style>
                    .notification_icon .badge {
                        right: -20px;
                        height: 20px;
                        width: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 10px;
                        font-weight: 400;
                        top: 2px;
                        padding: 12px;
                    }

                    .notification-item-number {
                        background: #11a1f5;
                    }
                </style>

                <ul class="nav navbar-nav mob-resp-btn d-flex align-items-center">
                    <li>
                        <a class="dez-page" href="{{ route('browse-jobseeker') }}">Browse Jobseeker </a>
                    </li>
                    <li class="notification_icon d-none" style="position: relative;">
                        <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary position-relative"
                            href="#" role="button" id="dropdownNotificationSecond" aria-haspopup="true"
                            aria-expanded="false"
                            style="height: 40px; width: 40px; display: flex; justify-content: center; align-items: center; background: #f1f5f9; color: #000;">
                            <i class="fa-solid fa-bell" style="font-size: 16px;"></i>
                            <!-- Notification Badge -->
                            <span
                                class="position-absolute translate-middle badge rounded-circle notification-item-number">
                                12
                            </span>
                        </a>

                        <!-- Dropdown Notification Menu -->
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-sm-1 mx-3 my-0 dropdown-notification-menu sub-menu"
                            aria-labelledby="dropdownNotificationSecond"
                            style="width: 350px; height: 300px; overflow-y: auto; overflow-x: hidden">
                            <!-- Notification Header -->
                            <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                <span class=" mb-0 text-capitalize fs-6">Notifications</span>
                            </div>

                            <!-- Notifications List -->
                            <ul class="list-group list-group-flush" style="height: 200px" data-simplebar>
                                <!-- Notification Item -->
                                <li class="list-group-item bg-light p-0">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body text-decoration-none mark-as-read"
                                                data-notification-id="67">
                                                <div class="d-flex align-items-center text-capitalize">
                                                    <!-- Avatar -->
                                                    <img src="{{ asset('images/user_profile.png') }}"
                                                        alt="Student Avatar" class="avatar-md rounded-circle img-fluid"
                                                        style="height: 50px" />
                                                    <div class="ms-3">
                                                        <span><strong>Vishal</strong> has changed their
                                                            <strong>profile</strong> photo.</span>
                                                        <div class="fs-6 text-muted">
                                                            <span>
                                                                <span class="bi bi-clock text-success me-0"></span>
                                                            </span>

                                                            <span class="ms-0 " style="font-size: 12px">2:04 PM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-light  p-0">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body text-decoration-none mark-as-read"
                                                data-notification-id="67">
                                                <div class="d-flex align-items-center text-capitalize">
                                                    <!-- Avatar -->
                                                    <img src="{{ asset('images/user_profile.png') }}"
                                                        alt="Student Avatar" class="avatar-md rounded-circle img-fluid"
                                                        style="height: 50px" />
                                                    <div class="ms-3">
                                                        <span><strong>Vishal</strong> has changed their
                                                            <strong>profile</strong> photo.</span>
                                                        <div class="fs-6 text-muted">
                                                            <span>
                                                                <span class="bi bi-clock text-success me-0"></span>
                                                            </span>

                                                            <span class="ms-0 " style="font-size: 12px">2:04 PM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item bg-light  p-0">
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="text-body text-decoration-none mark-as-read"
                                                data-notification-id="67">
                                                <div class="d-flex align-items-center text-capitalize">
                                                    <!-- Avatar -->
                                                    <img src="{{ asset('images/user_profile.png') }}"
                                                        alt="Student Avatar" class="avatar-md rounded-circle img-fluid"
                                                        style="height: 50px" />
                                                    <div class="ms-3">
                                                        <span><strong>Vishal</strong> has changed their
                                                            <strong>profile</strong> photo.</span>
                                                        <div class="fs-6 text-muted">
                                                            <span>
                                                                <span class="bi bi-clock text-success me-0"></span>
                                                            </span>

                                                            <span class="ms-0 " style="font-size: 12px">2:04 PM</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Additional notification items can go here -->
                            </ul>
                        </div>
                    </li>
                    @php
                        $file_name = getData(
                            'employers',
                            ['profile_img', 'company_name'],
                            ['email' => Session::get('emp_username')],
                        );

                    @endphp
                    <li>
                        <a href="javascript:void(0);" class="" style="background: none">
                            @if (!empty($file_name[0]->profile_img))
                                <img src="{{ url('storage/employer/profile_image/' . $file_name[0]->profile_img) }}"
                                    class="img-fluid object-fit-cover" alt="not found"
                                    style="height: 40px; border-radius: 50%; width: 40px;border: 0.5px solid lightgrey; object-fit: cover;" />
                            @else
                                <img src="{{ asset('images/company_profile.png') }}" class="img-fluid object-fit-cover"
                                    alt="not found"
                                    style="height: 40px; border-radius: 50%; width: 40px;border: 0.5px solid lightgrey; object-fit: cover;" />
                            @endif
                        </a>
                        <ul class="sub-menu">
                            <li><a class="dez-page" href="{{ route('company-profile') }}"><i
                                        class="bi bi-person me-2 fs-6"></i> My Profile
                                </a></li>
                            <li><a href="{{ route('logout') }}"><i class="bi bi-power me-2 fs-6"></i> Logout</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="site-button plans-btn">Plans<i
                                class="fa fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li><a class="dez-page" href="{{ route('employer-plans') }}">Employer</a></li>
                        </ul>
                    </li>
                </ul>