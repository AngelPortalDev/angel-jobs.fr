@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">

        <!-- contact area -->






        <div class="section-full content-inner-2 bg-white"
            style="background-image:url({{ asset('images/lines.png') }}); background-position:bottom; background-repeat:no-repeat; background-size: 100%;">
            <div class="container">
                <div class="section-head text-black text-center">
                    <h2 class="m-b0">Jobseeker Membership Plans</h2>
                    <p>Registering on Angel-jobs.com gives you access to a wide variety of job opportunities from different
                        industries and companies.</p>
                </div>
                <!-- Pricing table-1 Columns 3 with gap -->
                <div class="section-content box-sort-in button-example mt-md-5 mt-3">
                    <div class="pricingtable-row">
                        <div class="row max-w1000 m-auto">
                            <div class="col-sm-12 col-md-6 p-lr0">
                                <div class="pricingtable-wrapper style2">
                                    <div class="pricingtable-inner">
                                        <div class="pricingtable-price">
                                            @php
                                                $plan = getData(
                                                    'jobseeker_plan',
                                                    ['id', 'plan_amount', 'plan_name', 'plan_duration', 'plan_offers'],
                                                    ['id' => 2, 'is_deleted' => 'No'],
                                                );
                                                $plan_id = $plan[0]->id;
                                                $amount = $plan[0]->plan_amount;
                                                $plan_name = $plan[0]->plan_name;
                                                $plan_offers = $plan[0]->plan_offers;
                                                $plan_duration = ceil($plan[0]->plan_duration / 30);
                                            @endphp
                                            <h4 class="font-weight-300 m-t10 m-b0">{{ $plan_name }}</h4>
                                            <div class="pricingtable-bx"> <i class="fa fa-inr" aria-hidden="true"></i>
                                                <span>{{ $amount }}</span> / {{ $plan_duration }} Months
                                            </div>
                                        </div>
                                        {!! $plan_offers !!}<br>
                                        <div class="m-t20">
                                           
                                            @if (session()->has('js_username'))
                                                @php
                                                    $payment = getData('jobseeker_payments',['id', 'js_id', 'plan_id', 'status'],['js_id' => session()->get('js_user_id'),'plan_id' => $plan_id,'status' => 3,],1,'id','DESC',);
                                                @endphp
                                                <form action="" method="post">
                                                    @csrf

                                                    <div class="card-body text-center">
                                                        <div class="form-group mt-1 mb-1">
                                                            <input type="hidden" name="amount" value="{{ $amount }}"
                                                                class="form-control amount">
                                                            <input type="hidden" name="apikey"
                                                                value="{{ env('RAZORPAY_KEY') }}"
                                                                class="form-control apikey">
                                                            <input type="hidden" name="email" id ="email"
                                                                value="{{ session()->get('js_username') }}"
                                                                class="form-control email">
                                                            <input type="hidden" name="name" id ="name"
                                                                value="{{ session()->get('js_name') }}"
                                                                class="form-control name">
                                                            <input type="hidden" name="plan" id ="plan"
                                                                value="{{ $plan_id }}" class="form-control plan">
                                                        </div>

                                                        @if (!empty($payment[0]->status))
                                                            @if ($payment[0]->status == 3)
                                                                <a class="site-button radius-xl">Purchased</a>
                                                            @endif
                                                        @else
                                                            <button id="rzp-button1"
                                                                class="site-button radius-xl rzp-button1">Buy Now</button>
                                                        @endif
                                                    </div>
                                                </form>
                                                {{-- <a class="site-button radius-xl" href="{{ route('js_buy_plan', ['plan_id' => $plan_id, 'amount' => $amount])}}"><span class="p-lr30">Buy Now</span></a> --}}
                                            @else
                                                <a class="site-button radius-xl" style="white-space: normal;" href="{{ route('js_login') }}"><span
                                                        class="p-lr30">Buy Now</span></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 p-lr0">
                                <div class="pricingtable-wrapper style2 text-white active">
                                    <div class="pricingtable-inner">
                                        <div class="pricingtable-price">
                                            @php
                                                $plan = getData('jobseeker_plan',['id', 'plan_amount', 'plan_name', 'plan_duration', 'plan_offers'],['id' => 4, 'is_deleted' => 'No'],);
                                                $plan_id = $plan[0]->id;
                                                $amount = $plan[0]->plan_amount;
                                                $plan_name = $plan[0]->plan_name;
                                                $plan_offers = $plan[0]->plan_offers;
                                                $plan_duration = ceil($plan[0]->plan_duration / 30);
                                                @endphp
                                            <h4 class="font-weight-300 m-t10 m-b0">{{ $plan_name }}</h4>
                                            <div class="pricingtable-bx"> <i class="fa fa-inr" aria-hidden="true"></i>
                                                <span>{{ $amount }}</span> / {{ $plan_duration }} Months
                                            </div>
                                        </div>
                                        {!! $plan_offers !!}<br>
                                        <div class="m-t20">
                                            @if (session()->has('js_username'))
                                                @php
                                                    $payment = getData('jobseeker_payments',['id', 'js_id', 'plan_id', 'status'],['js_id' => session()->get('js_user_id'),'plan_id' => $plan_id,'status' => 3,],1,'id','DESC',);
                                                @endphp
                                                <form action="" method="post">

                                                    @csrf

                                                    <div class="card-body text-center">
                                                        <div class="form-group mt-1 mb-1">
                                                            <input type="hidden" name="amount"
                                                                value="{{ $amount }}" class="form-control amount">
                                                            <input type="hidden" name="apikey"
                                                                value="{{ env('RAZORPAY_KEY') }}"
                                                                class="form-control apikey">
                                                            <input type="hidden" name="email" id ="email"
                                                                value="{{ session()->get('js_username') }}"
                                                                class="form-control email">
                                                            <input type="hidden" name="name" id ="name"
                                                                value="{{ session()->get('js_name') }}"
                                                                class="form-control name">
                                                            <input type="hidden" name="plan" id ="plan"
                                                                value="{{ $plan_id }}" class="form-control plan">
                                                        </div>
                                                        @if (!empty($payment[0]->status))
                                                            @if ($payment[0]->status == 3)
                                                                <a class="site-button radius-xl"
                                                                    style="background: white;color: #3a9df1;">Purchased</a>
                                                            @endif
                                                        @else
                                                            <button id="rzp-button1"
                                                                class="site-button radius-xl rzp-button1"
                                                                style="background: white;color: #3a9df1;white-space: normal;">Buy Now</button>
                                                        @endif
                                                    </div>
                                                </form>
                                                {{-- <a class="site-button radius-xl" href="{{ route('js_buy_plan', ['plan_id' => $plan_id, 'amount' => $amount])}}" ><span class="p-lr30">Buy Now</span></a> --}}
                                            @else
                                                <a class="site-button radius-xl" href="{{ route('js_login') }}"
                                                    style="background: white;color: #3a9df1;white-space: normal;"><span class="p-lr30">Buy
                                                        Now</span></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>


        <!-- contact area  END -->
    </div>
    <!-- Content END-->




    <!-- Import footer  -->
@endsection()
