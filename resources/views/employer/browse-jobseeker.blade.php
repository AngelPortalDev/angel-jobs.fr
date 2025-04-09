@extends('layouts.main')
@section('content')
<style>
    .showfilter {
        display: none;
    }

    @media (max-width: 767px) {
        .hidefilter {
            display: none;
        }
        .showfilter {
            display: block;
        }
        .filter-sidebar .show-hide-sidebar {
            padding: 10px 30px 10px 20px;
            overflow-y: scroll;
            position: relative;
            width: calc(100% + 17px);
            min-height: 300px;
            display: block;
            height: 100%;
        }
        .page_sidebar {
            position: relative;
            width: 100%;
            margin-bottom: 30px;               
            padding: 1rem 1rem;
        }
        .filt-head {
            display: flex;
            padding: 0 1rem 1rem 1.5rem;
            flex-wrap: wrap;
            align-items: center;
        }
        .filt-head .filt-first {
            flex: 1;
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }
        .filter-sidebar .closebtn {
            position: relative;
            font-size: 36px;
            margin-left: 00px;
            font-weight: 500;
            text-align: center;
            font-size: 14px;
            padding: 0;
            color: #2d4767;
        }
        h6.acod-title {
            font-size: 16px;
            line-height: 5px;
        }
        .filter-sidebar {
            height: 100vh;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow: hidden;
            transition: 0.5s;
            padding-top: 20px;
            padding-bottom: 2rem;
            box-shadow: 0 0 20px 0 rgba(62, 28, 131, 0.1);
        }
        #paginationLinks {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            display: flex;
            scroll-behavior: smooth;
        }
        .pagination-bx {
            float: none !important
        }
        .job-post-info br {
            display: none
        }

        .pagination {
            display: block;
            text-align: center;
        }
    }
</style>
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

                                    @if (isset($totalPages) && $totalPages != 0)
                                    <ul class="pagination">
                                        <!-- Previous Button -->


                                        <!-- Next Button -->
                                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                            <a class="page-linkem" href="javascript:void(0);"
                                                data-page="{{ $currentPage - 1 }}">« Prev</a>
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
                                                data-page="{{ $currentPage + 1 }}">Next »</a>
                                        </li>
                                    </ul>
                                    @endif
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
