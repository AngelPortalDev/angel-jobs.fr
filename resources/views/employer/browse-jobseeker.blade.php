@extends('layouts.main')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">


        <!-- Filters Search END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <div class="section-full browse-job p-b50 p-t30">
                <div class="container">
                    <div class="row">
                        @include('employer.left-filter-browse-jobseeker')
                        <div class="col-xl-9 col-lg-8">
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 float-start text-uppercase" id="jobseekerCount">{{ $count ?? 0 }}
                                    Jobseekers Found</h5>
                                    @php
                                    $totalPages = ceil($total_count / $perPage);
                                    $currentPage = $page;
                                    $range = 3; 
                                    
                                @endphp
                                <div class="float-end">
									
									<div id="pageDropdownlistem">
                
                                        @if (isset($totalPages) && $totalPages != 0)
                                            <select id="pageDropdownem">                        
                                                    @for ($i = 1; $i <= $totalPages; $i++)
                                                        <option value="{{ $i }}" {{ $i == $currentPage ? 'selected' : '' }}>
                                                            Page {{ $i }}
                                                        </option>
                                                    @endfor                      
                                            </select>
                                        @endif
                                    </div>

								</div>
                                {{-- <div class="float-end">
									<span class="select-title">Sort by</span>
									<select>
										<option>Last 2 Months</option>
										<option>Last Months</option>
										<option>Last Weeks</option>
										<option>Last 3 Days</option>
									</select>

								</div> --}}
                            </div>

                            <ul class="post-job-bx browse-js-list" id="jobseekerResults">
                                {!! $html !!}

                            </ul>
                            <div class="pagination-bx m-t30 float-end">
                                <div id="paginationLinks" class="pagination-bx">
                                    {{-- <ul class="pagination">
                                        <!-- Previous Button -->
                                        @if ($paginate->currentPage() > 1)
                                            <li class="page-item">
                                                <a href="#" class="btn btn-primary page-linkem prev-page" data-page="{{ $paginate->currentPage() - 1 }}">Previous</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class=" disabled">Previous</a>
                                            </li>
                                        @endif
                                
                                        <!-- Page Numbers -->
                                        @php
                                        $currentPage = $paginate->currentPage();
                                        $lastPage = $paginate->lastPage();
                                        $range = 3; 
                                    @endphp

                                    @for ($i = 1; $i <= $lastPage; $i++)
                                        @if ($i <= 3 || ($i >= $currentPage - $range && $i <= $currentPage + $range) || $i > $lastPage - 3 || $i == 1 || $i == $lastPage)
                                            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                <a href="#" class="btn btn-primary page-linkem" data-page="{{ $i }}">{{ $i }}</a>
                                            </li>
                                        @elseif ($i == 4 && $currentPage > 4)
                                            <li class="page-item">
                                                <a href="#" class="btn btn-primary page-linkem" data-page="...">...</a>
                                            </li>
                                        @elseif ($i == $lastPage - 3 && $currentPage < $lastPage - 3)
                                            <li class="page-item">
                                                <a href="#" class="btn btn-primary page-linkem" data-page="...">...</a>
                                            </li>
                                        @endif
                                    @endfor
                                
                                        <!-- Next Button -->
                                        @if ($paginate->currentPage() < $paginate->lastPage())
                                            <li class="page-item">
                                                <a href="#" class="btn btn-primary page-linkem next-page" data-page="{{ $paginate->currentPage() + 1 }}">Next</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <a class=" disabled">Next</a>
                                            </li>
                                        @endif
                                    </ul> --}}

                                   
                                    <ul class="pagination">
                                        <!-- Previous Button -->


                                        <!-- Next Button -->
                                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                            <a class="page-linkem" href="javascript:void(0);"
                                                data-page="{{ $currentPage - 1 }}">Previous</a>
                                        </li>

                                        @for ($i = 1; $i <= $totalPages; $i++)
                                            @if ($i == 1 || $i == $totalPages || ($i >= $currentPage - $range && $i <= $currentPage + $range))
                                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                                    <a class="page-linkem pagination-link" href="javascript:void(0);"
                                                        data-page="{{ $i }}">{{ $i }}</a>
                                                </li>
                                            @elseif ($i == 2 && $currentPage > $range + 1)
                                                <li class="page-item disabled"><a class="page-linkem">...</a></li>
                                            @elseif ($i == $totalPages - 1 && $currentPage < $totalPages - $range)
                                                <li class="page-item disabled"><a class="page-linkem">...</a></li>
                                            @endif
                                        @endfor

                                        <!-- Next Button -->
                                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                            <a class="page-linkem" href="javascript:void(0);"
                                                data-page="{{ $currentPage + 1 }}">Next</a>
                                        </li>
                                    </ul>
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
