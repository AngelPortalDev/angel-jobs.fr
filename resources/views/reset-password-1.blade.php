@extends('layouts.main')
@section('content')

<!-- Content -->
<div class="page-content bg-white">

        <!-- contact area -->
        <div class="section-full content-inner browse-job bg-white shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
					<div class="col-md-12 m-b30">
						<div class="card max-w500 radius-sm m-auto">
							<div class="tab-content">
								<form id="login" class="tab-pane active">
									<h4 class="font-weight-700 m-b5">FORGOT PASSWORD  </h4>
									<p class="font-weight-600">A password reset link will be sent to the email address registered with your account for your convenience.</p>

									<div class="form-group">
										<label class="font-weight-700">E-MAIL Address*</label>
										<input name="dzName" required="" class="form-control" placeholder="Email Address" type="email">
									</div>

									<div class="text-left">
										<button class="site-button button-lg outline outline-2">Reset</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
		<!-- contact area  END -->



<!-- Import footer  -->
@endsection()