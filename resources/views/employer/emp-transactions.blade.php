@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full bg-white p-t50 p-b20">
                <div class="container">
                    <div class="row">
                        {{-- Left Menu --}}
                        <div class="col-xl-3 col-lg-4 m-b30">
                            @include('layouts/employer-left-menu')
                        </div>
                        {{-- Left Menu end --}}
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <div class="job-bx table-job-bx clearfix" style="overflow-x: auto;">
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 float-start text-uppercase">Transaction History</h5>
                                    {{-- <a href="#" class="site-button button-sm float-end "><i class="fas fa-pencil-alt m-r5"></i> Edit</a> --}}
                                </div>
                                <table style="text-wrap: nowrap;">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Plan Name</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $records)
                                            <tr>
                                                <td class="order-id text-primary">
                                                    @if ($records->status === 3)
                                                        <a href="{{ route('receiptemp', ['id' => base64_encode($records->id)]) }}"
                                                            target="_blank">{{ $records->order_id }}</a>
                                                    @else
                                                        {{ $records->order_id }}
                                                    @endif
                                                </td>
                                                <td class="job-name">{{ $records->plan_name }}</td>
                                                <td class="amount text-primary">€{{ $records->payment_amount }}</td>
                                                <td class="transfer"><b>{{ $records->pay_method }}</b></td>
                                                <td class="expired pending">
                                                    @if ($records->status === 1)
                                                       Failed
                                                    @elseif ($records->status === 2)
                                                    Failed
                                                    @elseif ($records->status === 3)
                                                    Success
                                                    @endif
                                                </td>
                                                <td class="date">{{ $records->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="pagination-bx float-end">
									<ul class="pagination">
										<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
									</ul>
								</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Browse Jobs END -->
        </div>
    </div>
    <!-- Content END-->


    <!-- Import footer  -->
@endsection()
