<div class="col-xl-9 col-lg-8 col-md-7">
	<div class="job-bx-title clearfix">
		<h5 class="font-weight-700 float-start text-uppercase" id="jobCount">{{ $count ?? 0 }} Jobs Found</h5>
		<div class="float-end">
		@php
                $totalPages = ceil($total_count / $perPage);
                $currentPage = $page;
                $range = 3;

            @endphp

            <div id="pageDropdownlist">
                
                @if (isset($totalPages) && $totalPages != 0)
                    <select id="pageDropdown">                        
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <option value="{{ $i }}" {{ $i == $currentPage ? 'selected' : '' }}>
                                    Page {{ $i }}
                                </option>
                            @endfor                      
                    </select>
                @endif
            </div>
		
			{{-- <form class="left_filters">
			<span class="select-title">Sort by</span>
			<select name='date_sort'>
				<option value="">Sort Date</option>
				<option value="0">Todays</option>
				<option value="7">1 Week Old</option>
				<option value="15">15 Days Old</option>
				<option value="30">1 Month Old</option>
				<option value="90">3 Month Old</option>
			</select>
			</form> --}}
		</div>
	</div>

	<ul class="post-job-bx" id="jobResults">
			{!! $html !!}
	</ul>
	{{-- <br>--}}

	{{-- @if ($page > 1 )
    <a href="?page={{ $page - 1 }}" class="btn btn-primary">Previous</a>
	@else
	<a class="btn btn-primary">Previous</a>
	@endif

	
	@if($list->count() == $perPage)
	<a href="?page={{ $page + 1 }}" class="btn btn-primary">Next</a>
	@endif  --}}

		

	{{-- Pagination Pending --}}
	<div class="pagination-bx float-end m-t30">
		<form class="left_filters">
			
			<div id="paginationLinks" class="pagination-bx">
				

            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="javascript:void(0);" data-page="{{ $currentPage - 1 }}">Previous</a>
                </li>
            
                @for ($i = 1; $i <= $totalPages; $i++)
                    @if ($i == 1 || $i == $totalPages || ($i >= $currentPage - $range && $i <= $currentPage + $range))
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link pagination-link" href="javascript:void(0);" data-page="{{ $i }}">{{ $i }}</a>
                        </li>
                    @elseif ($i == 2 && $currentPage > $range + 1)
                        <li class="page-item disabled"><a class="page-link">...</a></li>
                    @elseif ($i == $totalPages - 1 && $currentPage < $totalPages - $range)
                        <li class="page-item disabled"><a class="page-link">...</a></li>
                    @endif
                @endfor
            
                <!-- Next Button -->
                <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                    <a class="page-link" href="javascript:void(0);" data-page="{{ $currentPage + 1 }}">Next</a>
                </li>
            </ul>
			</div>
			
		{{-- <ul class="pagination">
			<li class="previous"><a href="#" class="prev"><i class="ti-arrow-left"></i> Prev</a></li>

			@if ($pages != 0)
					@for ($i = 1; $i <= $pages; $i++)

			@if ($i < 4)
				<li class=""><a href="javascript:void(0);" data-page_no="{{$i}}" class="paginations">{{$i}} </a></li>
			@else
				<li class="mt-4" >...............</li>
			@endif
			
		@endfor
			<input type="text" id="selected_page" hidden>
			@endif
	
			<li class="next"><a href="#" class="next">Next <i class="ti-arrow-right"></i></a></li>
		</ul> --}}
		</form>
	</div>
</div>
