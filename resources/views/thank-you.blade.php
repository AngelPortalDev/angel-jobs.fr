@extends('layouts.main')
@section('content')

<style>
    .payment-done-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;  
    background-color: #f9f9f9;  
    padding: 20px;
}

.payment-done-box {
    text-align: center;
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;  
}

.payment-icon {
    width: 80px;  
    margin-bottom: 20px;
}

.thank-you-text {
    font-size: 2em;
    font-weight: 600;
    color: #28a745;  
    margin-bottom: 10px;
}

.payment-successful-text {
    font-size: 1.2em;
    color: #555;
    margin-bottom: 20px;
}

.redirect-text {
    font-size: 1em;
    color: #777;
}

.home-link {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.home-link:hover {
    text-decoration: underline;
}

</style>

<!-- Content -->
<div class="container payment-done-container">
    <div class="payment-done-box">
        <img src="{{ asset('images/payment_done.svg') }}" alt="Payment Successful" class="payment-icon">
        <h3 class="thank-you-text">Thank You!</h3>
        <h6 class="payment-successful-text">Payment Done Successfully</h6>
        <p class="redirect-text">You will be redirected to the home page shortly. <br /> or 
            @if(session()->has('js_username'))<a href="{{ url('/') }}" class="home-link"> click here to return to the home page</a> 
            @else <a href="{{ route('post-job') }}" class="home-link"> Return to Post Jobs</a>
                @endif </p>
                </div>
</div>
<!-- Content END -->

@endsection()

