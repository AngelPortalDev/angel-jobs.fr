@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white manage-jobs-page-table">
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


                        {{-- {{$jobData}} --}}
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <div class="job-bx clearfix table-responsive" style="overflow-x: auto ">
                                <div class="job-bx-title clearfix">
                                    <h5 class="font-weight-700 float-start text-uppercase">Manage jobs</h5>
                                    {{-- <div class="float-end">
										<span class="select-title">Sort by freshness</span>
										<select>
											<option>All</option>
											<option>None</option>
											<option>Read</option>
											<option>Unread</option>
											<option>Starred</option>
											<option>Unstarred</option>
										</select>
									</div> --}}
                                </div>
                                {{-- <table class="table table-responsive table-job-bx cv-manager company-manage-job"> --}}
									
                                <table class="table-job-bx cv-manager company-manage-job">
                                    <thead>
                                        <tr>
                                            {{-- <th class="feature">
												<div class="form-check">
													<input type="checkbox" id="check12" class="form-check-input selectAllCheckBox" name="example1">
													<label class="form-check-label" for="check12"></label>
												</div>
											</th> --}}
                                            {{-- <th>Sr.</th> --}}
                                            <th>Job Title</th>
                                            <th>Applications</th>
                                            <th style="text-wrap: nowrap;">Posted On</th>
                                            <th style="text-wrap: nowrap;">Expire On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Active</th>
                                            <th>Approval status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($jobData as $jobDatas)
										
                                            @php

                                                $enc_id = base64_encode($jobDatas->id);
                                                $applied_count = is_exist('job_application_history', ['job_id' => $jobDatas->id,]);
												
                                            @endphp

                                            <tr class="tr_no_{{ $i }}">
                                                {{-- <td class="feature"> --}}

                                                {{-- <div class="form-check">
													<input type="checkbox" class="form-check-input" id="check1" name="example1">
													<label class="form-check-label" for="check1"></label>
												</div> --}}
                                                {{-- <td class="job-name">
												{{$i}}.

											</td> --}}
                                                @php

                                                @endphp
                                                <td class="job-name">
                                                    <a href="{{ url('job-details-view', $enc_id) }}"
                                                        target="_blank">{!! htmlspecialchars_decode($jobDatas->job_title) !!}</a>
                                                    <ul class="job-post-info">
                                                        <li><i class="fas fa-map-marker-alt"></i>
                                                            {{ empty($jobDatas->location_hiring_name) ? 'Not Disclosed' : $jobDatas->location_hiring_name }}</li>
                                                        {{-- <li><i class="far fa-bookmark"></i> {{$jobDatas->job_type_name}}</li> --}}
                                                        {{-- <li><i class="fa fa-filter"></i> {{$jobDatas->job_designation_name}}</li> --}}
                                                    </ul>
                                                </td>
                                                <td class="application text-primary"><a
                                                        href="{{ route('applied-jobseeker', $enc_id) }}">({{ $applied_count }})
                                                        Applied</a></td>
                                                <td class="application text-primary" style="text-wrap: nowrap;">
                                                    {{ $jobDatas->start_date }} </td>
                                                <td class="application text-primary" style="text-wrap: nowrap;">
                                                    {{ $jobDatas->job_expired_on }}</td>
													@if(strtotime($jobDatas->job_expired_on) < strtotime(now()))
                                                    @php
                                                        $checked = '';
                                                        $status = 'Inactive';
                                                    @endphp
                                                    <td class="application text-danger statusChange{{ $i }}">
                                                        {{ $status }} <i class="fa fa-circle"></i>
                                                    </td>
                                                @elseif ($jobDatas->status === 'Live')
                                                    @php
                                                        $checked = 'checked';
                                                        $status = $jobDatas->status;
                                                    @endphp
                                                    <td class="application text-success statusChange{{ $i }}">
                                                        {{ $status }} <i class="fa fa-circle"></i>
                                                    </td>
                                                @else
                                                    @php
                                                        $checked = '';
                                                        $status = $jobDatas->status;
                                                    @endphp
                                                    <td class="application text-danger statusChange{{ $i }}">
                                                        {{ $status }} <i class="fa fa-circle"></i>
                                                    </td>
                                                @endif
                                                <td>
                                                    {{-- <div class="form-check form-switch">
                                                        <input class="form-check-input job_inactive"
                                                            data-row="{{ $i }}" type="checkbox"
                                                            data-enc_id_inc="{{ $enc_id }}" role="switch"
                                                            id="flexSwitchCheckDefault_{{ $i }}"
                                                            @if ($status === 'Inactive') value="Live"
															@else
																value="" @endif
                                                            {{ $checked }}
                                                            @if(strtotime($jobDatas->job_expired_on) < strtotime(now())) disabled @endif>
                                                    </div> --}}
                                                    @if(strtotime($jobDatas->job_expired_on) > strtotime(now()))
                                                    <div class="form-check form-switch">
                                                    <input class="form-check-input job_inactive"
                                                        data-row="{{ $i }}" type="checkbox"
                                                        data-enc_id_inc="{{ $enc_id }}" role="switch"
                                                        id="flexSwitchCheckDefault_{{ $i }}"
                                                        @if ($status === 'Inactive') value="Live"
                                                        @else
                                                            value="" @endif
                                                        {{ $checked }}>
                                                    </div>
                                                    @else
                                                    <div>
                                                    <a href="{{ route('job-update', ['enc_id' => $enc_id]) }}" class="bg-warning mb-0 badge"  style="padding:8px 15px; font-size:14px;color:black">
                                                        Repost
                                                    </a>
                                                      
                                                </div>
                                                @endif
                                                </td>
                                                <td class="job-links">
                                                    <a href="javascript:void(0);" data-enc_id="{{ $enc_id }}" data-del_row="{{ $i }}" class="job_delete">
                                                        <i class="fa fa-trash text-danger border-0"></i>
                                                    </a>
													@if(strtotime($jobDatas->job_expired_on) < strtotime(now()))
													<a>
                                                        <i class="fa fa-edit text-danger border-0"></i>
                                                    </a>
													@else
                                                    <a href="{{ route('job-update', ['enc_id' => $enc_id]) }}">
                                                        <i class="fa fa-edit text-danger border-0"></i>
                                                    </a>
													@endif
                                                </td>
                                                <td class="application text-primary" style="text-wrap: nowrap;">
                                                    <div class="mb-0 badge {{ $jobDatas->approval_status == '1' ? 'bg-success' : 'bg-warning text-dark' }}"
                                                        style="padding:8px 15px; font-size:12px">
                                                        {{ $jobDatas->approval_status }}
                                                    </div>
                                                </td>                                              
                                            </tr>

                                            @php
                                                $i++;
                                            @endphp
                                            <!-- Modal End -->
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="pagination-bx m-t30 float-end">
                                    {{-- <ul class="pagination">
										<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
									</ul> --}}
                                </div>

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
