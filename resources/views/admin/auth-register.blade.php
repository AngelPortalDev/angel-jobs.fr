<!DOCTYPE html>
<html lang="en">
<head>

	<!-- PAGE TITLE HERE -->
	<title>Admin Pane | Recruitment in Malta</title>
	
	<!-- All Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('images/angel-favicon.png')}}" type="image/x-icon">



<!-- Icons css -->

<link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Datatables css -->
    <link href="{{asset('admin/assets/css/vendor/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Quill css -->
    <link href="{{asset('admin/assets/css/vendor/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/quill.snow.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/vendor/quill.bubble.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

	<!-- FAVICONS ICON -->
	<link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />
		<!-- Theme Config Js -->
	<script src="{{asset('admin/assets/js/config.js')}}"></script>

	
	 <script>
      function checkalert(msg) {
        swal({
            title: msg,
            text: "",
            icon: "warning",
        });
    }


	</script>
<style>

.select2-selection, .select2-selection--multiple, .select2-selection--clearable{
	border-width: 0 0 2px 0 !important;
    border-color: var(--primary) !important;
    background-color: transparent !important;
    border-radius: 0;
    min-height: 50px;
    padding: 0 0 0 0;
    font-family: rubik;
    color: #000;
    font-size: 15px;
}
.select2-selection__choice__remove{
	display: block;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: var(--primary) !important;
	color: #fff;
	border: none;
}
.select2-results__options{
	display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}



 .dots-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
	position: fixed;
	z-index: 999;
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

.site-button{
	border-radius: 5px;
}
</style>
</head>
<body class="authentication-bg position-relative">
<div id="loading-area"></div>
<section class="bglaoder">
<div class="dots-container" id="loader" style="display: none;">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</section>


    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden bg-opacity-25">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('admin/assets/images/register-bg.png')}}"  alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.php" class="logo-light">
                                            <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt="logo" height="80">
                                        </a>
                                        <a href="index.php" class="logo-dark">
                                            <img src="{{ asset('admin/assets/images/angel-jobs-malta-logo.png')}}"  alt="dark logo" height="80">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Free Sign Up</h4>
                                        <p class="text-muted mb-3">Enter your email address and password to access
                                            account.</p>

                                        <!-- form -->
                                        <form action="#">
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Full Name</label>
                                                <input class="form-control" type="text" id="fullname"
                                                    placeholder="Enter your name" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required=""
                                                    placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control" type="password" required="" id="password"
                                                    placeholder="Enter your password">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="checkbox-signup">
                                                    <label class="form-check-label" for="checkbox-signup">I accept <a
                                                            href="javascript: void(0);" class="text-muted">Terms and
                                                            Conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="mb-0 d-grid text-center">
                                                <button class="btn btn-primary fw-semibold" type="submit" style="background-color: #03A9F4;">Sign
                                                    Up</button>
                                            </div>

                                        </form>
                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-dark-emphasis">Already have account? <a href="auth-login.php"
                            class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Log In</b></a>
                    </p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
 <!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Angel Jobs Malta
            </div>
        </div>
    </div>
</footer>
<!-- Vendor js -->
<script src="{{ asset('admin/assets/js/vendor.min.js')}}"></script>
<!-- Datatables js -->
<script src="{{ asset('admin/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/fixedColumns.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.php5.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.flash.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/vendor/dataTables.select.min.js')}}"></script>

<!-- Dropzone File Upload js -->
<script src="{{ asset('admin/assets/js/vendor/dropzone.min.js')}}"></script>

<!-- File Upload Demo js -->
<script src="{{ asset('admin/assets/js/pages/fileupload.init.js')}}"></script>

<!-- Datatable Demo Aapp js -->
<script src="{{ asset('admin/assets/js/pages/datatable.init.js')}}"></script>

<!-- Quill Editor js -->
<script src="{{ asset('admin/assets/js/vendor/quill.min.js')}}"></script>

<!-- Quill Demo js -->
<script src="{{ asset('admin/assets/js/pages/quilljs.init.js')}}"></script>


<!-- App js -->
<script src="{{ asset('admin/assets/js/app.min.js')}}"></script>
</body>
</html>
<!-- end Footer -->