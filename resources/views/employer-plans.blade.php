@extends('layouts.main')
@section('content')

    <!-- Content -->

    <!-- contact area -->

    <div class="section-full content-inner-2 bg-white"
        style="background-image:url({{ asset('images/lines.png') }}); background-position:bottom; background-repeat:no-repeat; background-size: 100%; margin-bottom:0px">
        <div class="container">

            <div class="section-head text-black text-center">
                @if (session()->has('msg'))
                    <div class="page-content bg-white">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
                <h2 class="m-b0">Employer Membership Plans</h2>
                {{-- <p>Join the angel-jobs Malta portal in Malta for expert job help, standout profiles, quick access to new
                            jobs, direct chats with recruiters, and your dedicated manager. Paid profiles get extra visibility
                            and job opportunities or interviews. We're here to make your job hunt smooth and successful!</p> --}}
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
                                                'employer_plan',
                                                ['id', 'plan_amount', 'plan_name', 'plan_duration'],
                                                ['id' => 2, 'is_deleted' => 'No'],
                                            );
                                            $plan_id = $plan[0]->id;
                                            $amount = $plan[0]->plan_amount;
                                            $plan_name = $plan[0]->plan_name;
                                            $plan_duration = ceil($plan[0]->plan_duration / 30);
                                        @endphp
                                        <h4 class="font-weight-300 m-t10 m-b0">{{ $plan_name }}</h4>
                                        <div class="pricingtable-bx"> <i class="fa fa-inr" aria-hidden="true"></i>
                                            <span>{{ $amount }}</span> / {{ $plan_duration }} Months </div>
                                    </div>
                                    Quick & Easy Job Posting <br>
                                    Detailed Job Description <br>
                                   15 Job Postings <br>
                                    Advanced Candidate Filtering <br>
                                    Featured Employer Spotlight <br>
                                    <div class="m-t20">
                                        @if (session()->has('emp_username'))
                                        @php
                                        $payment = getData('employer_payments',['id', 'emp_id', 'plan_id', 'status'],['emp_id' => session()->get('emp_user_id'),'plan_id' => $plan_id,'status' => 3,],1,'id','DESC',);
                                        $userdata = is_exist('employers',['id' => session()->get('emp_user_id'),['plan_expired_on', '>=', date('Y-m-d')]]);
                                    @endphp
                                        @if ($userdata != 0 && !empty($payment[0]->status) && $payment[0]->status == 3)
                                        <a class="site-button radius-xl"
                                            style="background: white;color: #3a9df1;">Purchased</a>
                                          @else                                  
                                            <form action="" method="post">
                                                @csrf

                                                <div class="card-body text-center">
                                                    <div class="form-group mt-1 mb-1">
                                                        <input type="hidden" name="amount" value="{{ $amount }}"
                                                            class="form-control amount">
                                                        <input type="hidden" name="apikey"
                                                            value="{{ env('RAZORPAY_KEY') }}" class="form-control apikey">
                                                        <input type="hidden" name="email" id ="email"
                                                            value="{{ session()->get('emp_username') }}"
                                                            class="form-control email">
                                                        <input type="hidden" name="name" id ="name"
                                                            value="{{ session()->get('emp_name') }}"
                                                            class="form-control name">
                                                        <input type="hidden" name="plan" id ="plan"
                                                            value="{{ $plan_id }}" class="form-control plan">
                                                    </div>
                                                    <button id="rzp-button1" class="site-button radius-xl rzp-button1" style="white-space: normal;">Buy
                                                        Now</button>
                                                </div>
                                            </form>
                                            @endif
                                            {{-- <a class="site-button radius-xl" href="{{ route('emp_buy_plan', ['plan_id' => $plan_id, 'amount' => $amount])}}"><span class="p-lr30">Buy Now</span></a> --}}
                                        @else
                                            <a class="site-button radius-xl" href="{{ route('emp_login') }}"><span
                                                    class="p-lr30" style="white-space: normal;">Buy Now</span></a>
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
                                            $plan = getData(
                                                'employer_plan',
                                                ['id', 'plan_amount', 'plan_name', 'plan_duration'],
                                                ['id' => 3, 'is_deleted' => 'No'],
                                            );
                                            $plan_id = $plan[0]->id;
                                            $amount = $plan[0]->plan_amount;
                                            $plan_name = $plan[0]->plan_name;
                                            $plan_duration = ceil($plan[0]->plan_duration / 30);

                                        @endphp
                                        <h4 class="font-weight-300 m-t10 m-b0">{{ $plan_name }}</h4>
                                        <div class="pricingtable-bx"> <i class="fa fa-inr" aria-hidden="true"></i>
                                            <span>{{ $amount }}</span> / {{ $plan_duration }} Months </div>
                                    </div>
                                    Quick & Easy Job Posting <br>
                                    Detailed Job Description <br>
                                    50 Job Postings <br>
                                    Advanced Candidate Filtering <br>
                                    Featured Employer Spotlight <br>



                                    <div class="m-t20">

                                        @if (session()->has('emp_username'))
                                            @php
                                                $payment = getData('employer_payments',['id', 'emp_id', 'plan_id', 'status'],['emp_id' => session()->get('emp_user_id'),'plan_id' => $plan_id,'status' => 3,],1,'id','DESC',);
                                                $userdata = is_exist('employers',['id' => session()->get('emp_user_id'),['plan_expired_on', '>=', date('Y-m-d')]]);
                                               
                                            @endphp
                                          
                                             @if ($userdata != 0 && !empty($payment[0]->status) && $payment[0]->status == 3)
                                                 <a class="site-button radius-xl"
                                                     style="background: white;color: #3a9df1;">Purchased</a>
                                            @else
                                            <form action="" method="post">
                                                @csrf

                                                <div class="card-body text-center">
                                                    <div class="form-group mt-1 mb-1">
                                                        <input type="hidden" name="amount" value="{{ $amount }}"
                                                            class="form-control amount">
                                                        <input type="hidden" name="apikey"
                                                            value="{{ env('RAZORPAY_KEY') }}" class="form-control apikey">
                                                        <input type="hidden" name="email" id ="email"
                                                            value="{{ session()->get('emp_username') }}"
                                                            class="form-control email">
                                                        <input type="hidden" name="name" id ="name"
                                                            value="{{ session()->get('emp_name') }}"
                                                            class="form-control name">
                                                        <input type="hidden" name="plan" id ="plan"
                                                            value="{{ $plan_id }}" class="form-control plan">
                                                    </div>
                                                    <button id="rzp-button1" class="site-button radius-xl rzp-button1"
                                                        style="background: white;color: #3a9df1;">Buy Now</button>
                                                </div>
                                            </form>
                                            @endif
                                            {{-- <a class="site-button radius-xl" href="{{  route('emp_buy_plan', ['plan_id' => $plan_id, 'amount' => $amount])}}"  style="background: white;color: #3a9df1;"><span class="p-lr30">Buy Now</span></a> --}}
                                        @else
                                           
                                           
                                                <a class="site-button radius-xl" href="{{ route('emp_login') }}"
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
