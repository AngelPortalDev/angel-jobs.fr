


<div class="row">
	<div class="col-md-12 col-lg-12">
		<div id="filter-sidebar" class="filter-sidebar hide-23-23 showfilter">
			<div class="filt-head">
				<h4 class="filt-first">Advance Options</h4>
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i
						class="ti-close"></i></a>
			</div>
			<div class="page_sidebar show-hide-sidebar">
				<form class="left_filters">
					<div class="">
					<h6 class="title"><i class="fa fa-sliders m-r5"></i> Refined By <a href="{{url('top-search-bar')}}"
							class="font-12 float-end">Reset All</a></h6>
			
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#vacancy-type">
									Job Type
								</a>
							</h6>
						</div>
						<div id="vacancy-type" class="acod-body collapse show">
							<div class="acod-content">
								{{-- @php $checked = $list[0]->job_type_name; @endphp --}}
								@foreach (getDropDownlist('job_types', ['job_type', 'id']) as $data)
			
								<div class="form-check">
									<input class="form-check-input job_type_fil" name="left_jtype_fil[]"
										id="mbfunction-services-{{$data->id}}" type="checkbox" value="{{base64_encode($data->id)}}">
									<label class="form-check-label" for="mbfunction-services-{{$data->id}}"
										id="left_intern_fil">{{ $data->job_type}} 
										{{-- <span>({{is_exist('job_posting_view',['job_type'=>$data->id, 'is_deleted'=>'No','status'=>'Live'])}})</span>  --}}
									</label>
								</div>
								@endforeach
							</div>
							
			
			
						</div>
			
					</div>
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#industry">
									Industry
								</a>
							</h6>
						</div>
						<div id="industry" class="acod-body collapse show">
							<div class="acod-content" id="industry_list">
			
								<div class="search-bx style-1 search-field-js">
									<div class="input-group">
										<input class="form-control search-industry" data-classfil="main_indus_list" placeholder="Search Industry" data-list="3" type="text">
										<button type="button" class="btn btn-primary btn-sm clear-search-industry" id="clear-search-industry">Clear</button>
									</div>
								</div>
								<div class="main_indus_list mobile-view">
									@foreach (getDropDownlist('industries', ['id', 'industries_name']) as $index =>  $data)
										<div class="form-check indus-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
											<input class="form-check-input indus_fil" name="left_indus_fil[]" id="mbindustry{{$data->id}}" type="checkbox" value="{{$data->id}}">
											<label class="form-check-label" for="mbindustry{{$data->id}}">{{$data->industries_name}}</label>
										</div>
									@endforeach
								</div>
								@if (count(getDropDownlist('industries', ['id', 'industries_name'])) > 5)
									<button id="show-more-industry" class="btn btn-primary btn-sm mt-2 show-more-industry">Show More</button>
								@endif
							</div>
			
							{{-- Serach bar --}}
							
			
						</div>
					</div>
			
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#location">
									Location
								</a>
							</h6>
						</div>
					
						<div id="location" class="acod-body collapse show">
			
							<div class="acod-content" id="location_list">
								<div class="search-bx style-1 search-field-js">
									<div class="input-group">
										<input class="form-control search-location-js" placeholder="Search Location" data-classfil="main_loc_list" data-list="3" type="text">
										<button type="button" class="btn btn-primary btn-sm clear-search-location-js">Clear</button>
									</div>
								</div>
								
								<!-- Location List -->
								<div class="main_loc_list location-list-js mobile-view">
									@foreach (getDropDownlist('cities', ['id', 'city_name']) as $index => $data)
										<div class="form-check location-item-js" style="{{ $index >= 5 ? 'display: none;' : '' }}">
											<input class="form-check-input loc_fil" name="left_loc_fil[]" id="mblocation{{$data->id}}" type="checkbox" value="{{$data->id}}">
											<label class="form-check-label" for="mblocation{{$data->id}}">{{$data->city_name}}</label>
										</div>
									@endforeach
								</div>
								
								<!-- Show More Button -->
								@if (count(getDropDownlist('cities', ['id', 'city_name'])) > 5)
									<button class="btn btn-primary btn-sm mt-2 show-more-location-js">Show More</button>
								@endif
							</div>
			
							{{-- Serach bar --}}
						
			
						</div>
					</div>
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#education" class="collapsed">
									Education
								</a>
							</h6>
						</div>
						<div id="education" class="acod-body collapse ">
							<div class="acod-content">
								<div class="search-bx style-1 search-field-js">
									<div class="input-group">
										<input class="form-control search-education" value="" data-classfil="main_edu_list" placeholder="Search Education" data-list="1" type="text">
										<button type="button" class="btn btn-primary btn-sm clear-search-education" id="clear-search-education">Clear</button>
									</div>
								</div>
								<div class="main_edu_list mobile-view">
									@foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $index => $data)
										<div class="form-check edu-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
											<input class="form-check-input edu_fil" name="left_edu_fil[]" id="mbeducation{{$data->id}}" type="checkbox" value="{{$data->id}}">
											<label class="form-check-label" for="mbeducation{{$data->id}}">{{$data->educational_qualification}}</label>
										</div>
									@endforeach
								</div>
								@if (count(getDropDownlist('qualifications', ['id', 'educational_qualification'])) > 5)
									<button id="show-more-education" class="btn btn-primary btn-sm mt-2 show-more-education">Show More</button>
								@endif
							</div>
			
							
							{{-- Serach bar --}}
							
			
						</div>
						
					</div>
			
					
			
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#experience" class="collapsed">
									Experience
								</a>
							</h6>
						</div>
						<div id="experience" class="acod-body collapse">
							<div class="acod-content">
								@foreach (getDropDownlist('experiances', ['experiance', 'id']) as $data)
								<div class="form-check">
									<input class="form-check-input exp_fil" name="left_exp_fil[]" id="mb{{$data->id}}" type="radio"
										value="{{$data->id}}">
									<label class="form-check-label" for="mb{{$data->id}}" id="left_fulltime_fil">{{$data->experiance}}
									</label>
								</div>
								@endforeach
							</div>
			
							{{-- <div class="panel">
								<div class="acod-head">
									<h6 class="acod-title">
										<a data-bs-toggle="collapse" href="#desigantion" class="collapsed">
											Designation
										</a>
									</h6>
								</div>
								<div id="designation" class="acod-body collapse">
									<div class="acod-content">
										@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
										<div class="form-check">
											<input class="form-check-input desig_fil" name="left_desig_fil[]" id="{{$data->id}}" type="radio"
												value="{{$data->id}}">
											<label class="form-check-label" for="{{$data->id}}" id="left_fulltime_fil">{{$data->designations}}
											</label>
										</div>
										@endforeach
									</div> --}}
							<!-- Range Bar -->
							{{-- <div class="range-slider">
								<div id="tooltip"></div>
								<input id="range" type="range" class="exp_fil" name="left_exp_fil" id="{{$data->id}}" step="1" value="200" min="1" max="12">
							</div> --}}
			
						</div>
					</div>
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#salary" class="collapsed">
									Salary (Monthly)
								</a>
							</h6>
						</div>
						<div id="salary" class="acod-body collapse">
							<div class="acod-content">
								@foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $data)
								<div class="form-check">
									<input class="form-check-input sal_fil" name="left_sal_fil[]" id="mbsalary-op{{$data->id}}"
										type="checkbox" value="{{$data->id}}">
									<label class="form-check-label" for="mbsalary-op{{$data->id}}"
										id="left_sal1_fil"> {{$data->salary_range}} 
										{{-- <span>(0)</span>  --}}
									</label>
								</div>
								@endforeach
			
							</div>
						</div>
					</div>
			
					{{--desig without search}}
					{{-- <div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#desig" class="collapsed">
									Designation
								</a>
							</h6>
						</div>
						<div id="desig" class="acod-body collapse">
							<div class="acod-content">
								@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
								<div class="form-check">
									<input class="form-check-input desig_fil" name="left_desig_fil[]" id="desig{{$data->id}}"
										type="checkbox" value="{{$data->id}}">
									<label class="form-check-label" for="desig{{$data->id}}"
										id="left_sal1_fil">{{$data->role_name}}  --}}
										{{-- <span>(0)</span>  --}}
									{{-- </label>
								</div>
								@endforeach
			
							</div>
						</div>
					</div> --}}
			
					<div class="panel">
						<div class="acod-head">
							<h6 class="acod-title">
								<a data-bs-toggle="collapse" href="#desig" class="collapsed">
									Designation
								</a>
							</h6>
						</div>
						<div id="desig" class="acod-body collapse ">
							<div class="acod-content" id="desig_list">
							{{-- <div class="search-bx style-1 search-field-js">
									<div class="input-group">
										<input class="form-control list_filt" value="" data-classfil="main_desig_list" placeholder="Search Industry" data-list="4" type="text">
										<span class="input-group-btn" style="display: none">
											<button type="button" class="fa fa-close text-primary"></button>
										</span> 
									</div>
							</div>
			
			
								<div id="main_desig_list">
								@foreach (getDropDownlist('designations', ['role_name', 'id'], 5) as $data)
								<div class="form-check old_list">
									<input class="form-check-input desig_fil " name="left_desig_fil[]"  id="desig{{$data->id}}"
										type="checkbox" value="{{$data->id}}">
									<label class="form-check-label" for="desig{{$data->id}}"
										id="left_desig_fil">{{$data->role_name}}
									</label>
								</div>
								@endforeach
							</div> --}}
							<div class="search-bx style-1 search-field-js">
								<div class="input-group">
									<input class="form-control search-designation" value="" id="search-designation" data-classfil="main_desig_list" placeholder="Search Designation" data-list="4" type="text">
									<button type="button" class="btn btn-primary btn-sm clear-search-designation" id="clear-search-designation">Clear</button>
								</div>
							</div>
							
							<div class="main_desig_list mobile-view">
								@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
									<div class="form-check design-item" style="{{ $loop->index >= 5 ? 'display: none;' : '' }}">
										<input class="form-check-input desig_fil" name="left_desig_fil[]" id="mbdesig{{$data->id}}" type="checkbox" value="{{$data->id}}">
										<label class="form-check-label" for="mbdesig{{$data->id}}" id="left_desig_fil">{{$data->role_name}}</label>
									</div>
								@endforeach
							</div>
							
							@if (count(getDropDownlist('designations', ['role_name', 'id'])) > 5)
								<button id="show-more-designation" class="btn btn-primary btn-sm mt-2 show-more-designation">Show More</button>
							@endif
							
							</div>
			
							{{-- Serach bar --}}
							
			
						</div>
					</div>
						</div>
				</form>

			</div>
		</div>
	</div>
</div>
<aside id="accordion1" class="sticky-top sidebar-filter">
	<form class="left_filters">
		<div class="hidefilter">
		<h6 class="title"><i class="fa fa-sliders m-r5"></i> Refined By <a href="{{url('top-search-bar')}}"
				class="font-12 float-end">Reset All</a></h6>

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#vacancy-type">
						Job Type
					</a>
				</h6>
			</div>
			<div id="vacancy-type" class="acod-body collapse show">
				<div class="acod-content">
					{{-- @php $checked = $list[0]->job_type_name; @endphp --}}
					@foreach (getDropDownlist('job_types', ['job_type', 'id']) as $data)

					<div class="form-check">
						<input class="form-check-input job_type_fil" name="left_jtype_fil[]"
							id="function-services-{{$data->id}}" type="checkbox" value="{{base64_encode($data->id)}}">
						<label class="form-check-label" for="function-services-{{$data->id}}" id="left_intern_fil">{{ $data->job_type}} 
							
						</label>
					</div>
					@endforeach
				</div>
				


			</div>

		</div>
		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#industry">
						Industry
					</a>
				</h6>
			</div>
			<div id="industry" class="acod-body collapse show">
				<div class="acod-content" id="industry_list">

					<div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control search-industry" data-classfil="main_indus_lisst" placeholder="Search Industry" data-list="3" type="text">

							{{-- <input class="form-control" id="search-industry" data-classfil="main_indus_list" placeholder="Search Industry" data-list="3" type="text"> --}}
							<button type="button" class="btn btn-primary btn-sm clear-search-industry" id="clear-search-industry">Clear</button>
						</div>
					</div>
					<div class="main_indus_list desktop-view">
						@foreach (getDropDownlist('industries', ['id', 'industries_name']) as $index =>  $data)
							<div class="form-check indus-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
								<input class="form-check-input indus_fil" name="left_indus_fil[]" id="industry{{$data->id}}" type="checkbox" value="{{$data->id}}">
								<label class="form-check-label" for="industry{{$data->id}}">{{$data->industries_name}}</label>
							</div>
						@endforeach
					</div>
					@if (count(getDropDownlist('industries', ['id', 'industries_name'])) > 5)
						<button id="show-more-industry" class="btn btn-primary btn-sm mt-2 show-more-industry">Show More</button>
					@endif
				</div>

				{{-- Serach bar --}}
				

			</div>
		</div>

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#location">
						Location
					</a>
				</h6>
			</div>
		
			<div id="location" class="acod-body collapse show">

				<div class="acod-content" id="location_list">
					{{-- <div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control list_filt" value="" data-classfil="main_loc_list" placeholder="Search Location" data-list="3" type="text"> 
							<span class="input-group-btn" style="display: none">
								<button type="button" class="fa fa-close text-primary"></button>
							</span> 
						</div>
					</div> --}}

					<div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control search-location-js" placeholder="Search Location" data-classfil="main_loc_list" data-list="3" type="text">
							<button type="button" class="btn btn-primary btn-sm clear-search-location-js">Clear</button>
						</div>
					</div>
					
					<!-- Location List -->
					<div class="main_loc_list location-list-js desktop-view">
						@foreach (getDropDownlist('cities', ['id', 'city_name']) as $index => $data)
							<div class="form-check location-item-js" style="{{ $index >= 5 ? 'display: none;' : '' }}">
								<input class="form-check-input loc_fil" name="left_loc_fil[]" id="location{{$data->id}}" type="checkbox" value="{{$data->id}}">
								<label class="form-check-label" for="location{{$data->id}}">{{$data->city_name}}</label>
							</div>
						@endforeach
					</div>
					
					<!-- Show More Button -->
					@if (count(getDropDownlist('cities', ['id', 'city_name'])) > 5)
						<button class="btn btn-primary btn-sm mt-2 show-more-location-js">Show More</button>
					@endif
				</div>

				{{-- Serach bar --}}
			

			</div>
		</div>
		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#education" class="collapsed">
						Education
					</a>
				</h6>
			</div>
			<div id="education" class="acod-body collapse ">
				<div class="acod-content">
					<div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control search-education" value="" data-classfil="main_edu_list" placeholder="Search Education" data-list="1" type="text">
							<button type="button" class="btn btn-primary btn-sm clear-search-education" id="clear-search-education">Clear</button>
						</div>
					</div>
					<div class="main_edu_list desktop-view">
						@foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $index => $data)
							<div class="form-check edu-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
								<input class="form-check-input edu_fil" name="left_edu_fil[]" id="education{{$data->id}}" type="checkbox" value="{{$data->id}}">
								<label class="form-check-label" for="education{{$data->id}}">{{$data->educational_qualification}}</label>
							</div>
						@endforeach
					</div>
					@if (count(getDropDownlist('qualifications', ['id', 'educational_qualification'])) > 5)
						<button id="show-more-education" class="btn btn-primary btn-sm mt-2 show-more-education">Show More</button>
					@endif
				</div>

				
				{{-- Serach bar --}}
				

			</div>
			
		</div>

		

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#experience" class="collapsed">
						Experience
					</a>
				</h6>
			</div>
			<div id="experience" class="acod-body collapse">
				<div class="acod-content">
					@foreach (getDropDownlist('experiances', ['experiance', 'id']) as $data)
					<div class="form-check">
						<input class="form-check-input exp_fil" name="left_exp_fil[]" id="{{$data->id}}" type="radio"
							value="{{$data->id}}">
						<label class="form-check-label" for="{{$data->id}}" id="left_fulltime_fil">{{$data->experiance}}
						</label>
					</div>
					@endforeach
				</div>

				{{-- <div class="panel">
					<div class="acod-head">
						<h6 class="acod-title">
							<a data-bs-toggle="collapse" href="#desigantion" class="collapsed">
								Designation
							</a>
						</h6>
					</div>
					<div id="designation" class="acod-body collapse">
						<div class="acod-content">
							@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
							<div class="form-check">
								<input class="form-check-input desig_fil" name="left_desig_fil[]" id="{{$data->id}}" type="radio"
									value="{{$data->id}}">
								<label class="form-check-label" for="{{$data->id}}" id="left_fulltime_fil">{{$data->designations}}
								</label>
							</div>
							@endforeach
						</div> --}}
				<!-- Range Bar -->
				{{-- <div class="range-slider">
					<div id="tooltip"></div>
					<input id="range" type="range" class="exp_fil" name="left_exp_fil" id="{{$data->id}}" step="1" value="200" min="1" max="12">
				</div> --}}

			</div>
		</div>
		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#salary" class="collapsed">
						Salary (Monthly)
					</a>
				</h6>
			</div>
			<div id="salary" class="acod-body collapse">
				<div class="acod-content">
					@foreach (getDropDownlist('salary_ranges', ['salary_range', 'id']) as $data)
					<div class="form-check">
						<input class="form-check-input sal_fil" name="left_sal_fil[]" id="salary-op{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="salary-op{{$data->id}}"
							id="left_sal1_fil"> {{$data->salary_range}} 
							{{-- <span>(0)</span>  --}}
						</label>
					</div>
					@endforeach

				</div>
			</div>
		</div>

		{{--desig without search}}
		{{-- <div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#desig" class="collapsed">
						Designation
					</a>
				</h6>
			</div>
			<div id="desig" class="acod-body collapse">
				<div class="acod-content">
					@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
					<div class="form-check">
						<input class="form-check-input desig_fil" name="left_desig_fil[]" id="desig{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="desig{{$data->id}}"
							id="left_sal1_fil">{{$data->role_name}}  --}}
							{{-- <span>(0)</span>  --}}
						{{-- </label>
					</div>
					@endforeach

				</div>
			</div>
		</div> --}}

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#desig" class="collapsed">
						Designation
					</a>
				</h6>
			</div>
			<div id="desig" class="acod-body collapse ">
				<div class="acod-content" id="desig_list">
				{{-- <div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control list_filt" value="" data-classfil="main_desig_list" placeholder="Search Industry" data-list="4" type="text">
							<span class="input-group-btn" style="display: none">
								<button type="button" class="fa fa-close text-primary"></button>
							</span> 
						</div>
				</div>


					<div id="main_desig_list">
					@foreach (getDropDownlist('designations', ['role_name', 'id'], 5) as $data)
					<div class="form-check old_list">
						<input class="form-check-input desig_fil " name="left_desig_fil[]"  id="desig{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="desig{{$data->id}}"
							id="left_desig_fil">{{$data->role_name}}
						</label>
					</div>
					@endforeach
				</div> --}}
				<div class="search-bx style-1 search-field-js">
					<div class="input-group">
						<input class="form-control search-designation" value="" id="search-designation" data-classfil="main_desig_list" placeholder="Search Designation" data-list="4" type="text">
						<button type="button" class="btn btn-primary btn-sm clear-search-designation" id="clear-search-designation">Clear</button>
					</div>
				</div>
				
				<div class="main_desig_list desktop-view">
					@foreach (getDropDownlist('designations', ['role_name', 'id']) as $data)
						<div class="form-check design-item" style="{{ $loop->index >= 5 ? 'display: none;' : '' }}">
							<input class="form-check-input desig_fil" name="left_desig_fil[]" id="desig{{$data->id}}" type="checkbox" value="{{$data->id}}">
							<label class="form-check-label" for="desig{{$data->id}}" id="left_desig_fil">{{$data->role_name}}</label>
						</div>
					@endforeach
				</div>
				
				@if (count(getDropDownlist('designations', ['role_name', 'id'])) > 5)
					<button id="show-more-designation" class="btn btn-primary btn-sm mt-2 show-more-designation">Show More</button>
				@endif
				
				</div>

				{{-- Serach bar --}}
				

			</div>
		</div>
			</div>
	</form>
</aside>




<!-- Range bar Selection JS  -->
<script>
	    const
        range = document.getElementById('range'),
        tooltip = document.getElementById('tooltip'),
        setValue = ()=>{
            const
                newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
                newPosition = 16 - (newValue * 0.32);
            tooltip.innerHTML = `<span>${range.value}</span>`;
            tooltip.style.left = `calc(${newValue}% + (${newPosition}px))`;
            document.documentElement.style.setProperty("--range-progress", `calc(${newValue}% + (${newPosition}px))`);
        };
    document.addEventListener("DOMContentLoaded", setValue);
    range.addEventListener('input', setValue);
</script>