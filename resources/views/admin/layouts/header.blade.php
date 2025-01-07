<!DOCTYPE html>
<html lang="en">

<head>

    <!-- PAGE TITLE HERE -->
    <title>Admin Panel | Malta</title>

    <!-- All Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/angel-favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />


    <!-- Icons css -->

    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Datatables css -->
    <link href="{{ asset('admin/assets/css/vendor/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/responsive.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Quill css -->
    <link href="{{ asset('admin/assets/css/vendor/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/vendor/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- FAVICONS ICON -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <!-- Theme Config Js -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
    <!-- Datatables js -->



    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        function checkalert(msg) {
            swal({
                title: msg,
                text: "",
                icon: "warning",
            });
        }
    </script>
    <style>
        .select2-selection,
        .select2-selection--multiple,
        .select2-selection--clearable {
            border-width: 0 0 2px 0 !important;
            border-color: #000 !important;
            background-color: transparent !important;
            border-radius: 0;
            min-height: 50px;
            padding: 0 0 0 0;
            font-family: rubik;
            color: #fff;
            font-size: 15px;
        }

        .select2-selection__choice__remove {
            display: block;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #000;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #2ab1dc !important;
            color: #fff;
            border: none;
        }

        .select2-results__options {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 400;
            line-height: 1.42857143;
            color: #000;
            white-space: nowrap;
        }



        .dots-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.2);
        }


        .dot {
            height: 20px;
            width: 20px;
            margin-right: 10px;
            border-radius: 10px;
            background-color: #b3e1fc;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .dot:last-child {
            margin-right: 0;
        }

        .dot:nth-child(1) {
            animation-delay: -0.3s;
        }

        .dot:nth-child(2) {
            animation-delay: -0.1s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.1s;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                background-color: #b3dbfc;
                box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
            }

            50% {
                transform: scale(1.2);
                background-color: #67c5fb;
                box-shadow: 0 0 0 10px rgba(178, 212, 252, 0);
            }

            100% {
                transform: scale(0.8);
                background-color: #b3dffc;
                box-shadow: 0 0 0 0 rgba(178, 212, 252, 0.7);
            }
        }

        .site-button {
            border-radius: 5px;
        }
    </style>
</head>

<body id="bg">

    <!-- Begin page -->
    <div class="wrapper">
        <div id="loading-area"></div>
        <section class="bglaoder">
            <div class="dots-container" id="loader" style="display: none;">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
        </section>
        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.php" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{ asset('admin/assets/images/logo.png') }}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.php" class="logo-dark">
                            <span class="logo-lg">
                                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    {{-- <div class="app-search d-none d-lg-block">
                <form>
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search...">
                        <span class="ri-search-line search-icon text-muted"></span>
                    </div>
                </form>
            </div> --}}
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                {{-- <img src="{{ asset('admin/assets/images/logo.png')}}" alt="user-image" width="32" class="rounded-circle"> --}}
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal text-capitalize">Hello, {{ session()->get('admin_name') }}
                                    <i class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            {{-- <a href="my-account.php" class="dropdown-item">
                        <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="auth-reset-password.php" class="dropdown-item">
                        <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                        <span>Reset Password</span>
                    </a> --}}

                            <!-- item-->
                            <a href="{{ route('admin-logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.php" class="logo logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png') }}" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png') }}" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.php" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png') }}" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png') }}" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="{{ route('admin-dashboard') }}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>

                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false"
                            aria-controls="sidebarPages" class="side-nav-link">
                            <i class="ri-pages-line"></i>
                            <span> Site Setting </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPages">
                            <ul class="side-nav-second-level">

                                <li>
                                    <a href="{{ route('admin-seo-page') }}">SEO Pages</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin-site-setting') }}">Google Analytics Code</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                            aria-controls="sidebarPagesAuth" class="side-nav-link">
                            <i class="ri-group-2-line"></i>
                            <span> Add New Details </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPagesAuth">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('admin-country') }}">Country</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-state') }}">State</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-city') }}">City and Pincode</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-education-qualification') }}">Educational
                                        Qualification</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-marital-status') }}">Marital Status</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-designation') }}">Designation</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-skills') }}">Skills</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-languages') }}">Languages</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-job-type') }}">Job Type</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-notice-period') }}">Notice Period</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-total-experience-year') }}">Total Experience Year </a>
                                </li>

                                <li>
                                    <a href="{{ route('admin-industries') }}">Industries</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin-functional-area') }}">Functional Area</a>
                                </li>

                                {{-- <li>
                            <a href="{{route('admin-gender')}}">Gender</a>
                        </li> --}}
                                <li>
                                    <a href="{{ route('admin-company-type') }}">Company Type</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-company-size') }}">Company Size</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin-salary-range') }}">Salary Range</a>
                                </li>






                            </ul>
                        </div>
                    </li>



                    <li class="side-nav-title">Components</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false"
                            aria-controls="sidebarBaseUI" class="side-nav-link">
                            <i class="ri-briefcase-line"></i>
                            <span> Jobseeker </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBaseUI">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('get-js-datalist') }}">All Jobseekers</a>
                                </li>
                                {{-- <li>
                            <a href="jobseeker-active.php">Active to Paid</a>
                        </li>
                        <li>
                            <a href="jobseeker-paid.php">Paid Jobseekers</a>
                        </li>
                        <li>
                            <a href="jobseeker-expired.php">Expired Jobseekers</a>
                        </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                            aria-controls="sidebarExtendedUI" class="side-nav-link">
                            <i class="ri-compasses-2-line"></i>
                            <span> Employer </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExtendedUI">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('get-emp-datalist') }}">All Employer</a>
                                </li>
                                {{-- <li>
                            <a href="{{url('extended-scrollbar')}}">Active to Paid</a>
                        </li> --}}
                                {{-- <li>
                            <a href="{{url('extended-range-slider')}}">Paid Employer</a>
                        </li>
                        <li>
                            <a href="{{url('extended-scrollspy')}}">Expired Employer</a>
                        </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('get-job-listing') }}" class="side-nav-link">
                            <i class="ri-compasses-2-line"></i>
                            <span> Job Listing </span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false"
                            aria-controls="sidebarCharts" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Member Plan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCharts">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('jobseeker-plan-list') }}">Job Seeker Plan</a>
                                </li>
                                {{-- <li>
                            <a href="jobseeker-plan-features.php">Jobseeker Plan Features</a>
                        </li> --}}
                                <li>
                                    <a href="{{ route('employer-plan-list') }}">Employer Plan</a>
                                </li>
                                {{-- <li>
                            <a href="employer-plan-features.php">Employer Plan Features</a>
                        </li> --}}
                            </ul>
                        </div>
                    </li>



                    {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#SalesReport" aria-expanded="false" aria-controls="SalesReport" class="side-nav-link">
                    <i class="ri-survey-line"></i>
                    <span>  Sales Report </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="SalesReport">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="jobseeker-sales-report.php">JobSeeker Sales Report</a>
                        </li>
                        <li>
                            <a href="employer-sales-report.php">Employer Sales Report</a>
                        </li>

                    </ul>
                </div>
            </li> --}}
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#emails" aria-expanded="false" aria-controls="emails"
                            class="side-nav-link">
                            <i class="ri-survey-line"></i>
                            <span> Email</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="emails">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('email-view') }}">Email Templates</a>
                                </li>
                                <li>
                                    <a href="{{ route('email-send') }}">Send Email</a>
                                </li>

                            </ul>
                        </div>
                    </li>



                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>


        <!-- ========== Left Sidebar End ========== -->

        <!-- header END -->
