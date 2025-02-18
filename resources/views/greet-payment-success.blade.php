@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- Success Message Section -->
    <section class="py-7 py-lg-8 bg-white">
        <div class="container my-lg-8">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Success Card -->
                    <div class="card mb-4 smooth-shadow-md text-center mt-5">
                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <!-- Icon -->
                                <img src="{{ asset('images/tick-mark-01.png') }}" alt="icon" class="icon-shape icon-xl rounded-circle">
                            </div>
    
                            <!-- Content -->
                            <div class="">
                                <h2 class="fw-bold mb-1 color-blue">
                                    Payment Successful
                                </h2>
                                <h5>Thank you! Your payment has been successfully processed.</h5>
                            </div>
    
                            <!-- Message -->
                            <p class="mb-4">You now have access to all the features and benefits of your plan. Start exploring!.</p>
    
                            <!-- Form -->
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" value="" class="session_id" name="session_id">
                                @if (session()->has('emp_username'))
                                <a href="{{route('post-job')}}" class="btn btn-primary">Go To Post a job</a>
                                @else
                                <a href="/" class="btn btn-primary">Go To HomePage</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
