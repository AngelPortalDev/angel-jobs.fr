<aside id="accordion1" class="sticky-top sidebar-filter">
	<form class="left_filters">
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
						<label class="form-check-label" for="function-services-{{$data->id}}"
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
					<a data-bs-toggle="collapse" href="#education" class="collapsed">
						Education
					</a>
				</h6>
			</div>
			<div id="education" class="acod-body collapse ">
				<div class="acod-content">
					<div class="search-bx style-1 search-field-js">
					{{-- <form role="search" method="post"> --}}
						<div class="input-group">
							<input class="form-control list_filt" value="" data-classfil="main_edu_list" placeholder="Search Education" data-list="1" type="text">
							<span class="input-group-btn" style="display: none">
								<button type="button" class="fa fa-close text-primary"></button>
							</span> 
						</div>
					{{-- </form> --}}
				</div>
				<div id="main_edu_list">
					@foreach (getDropDownlist('qualifications', ['id', 'educational_qualification'], 5) as $data)
					<div class="form-check old_list">
						<input class="form-check-input edu_fil" name="left_edu_fil[]" id="education{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="education{{$data->id}}"
							id="left_edu_fil">{{$data->educational_qualification}}
						</label>
					</div>
					@endforeach
				</div>
				</div>

				
				{{-- Serach bar --}}
				

			</div>
			
		</div>

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#industry" class="collapsed">
						Industry
					</a>
				</h6>
			</div>
			<div id="industry" class="acod-body collapse ">
				<div class="acod-content" id="industry_list">
				<div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control list_filt" value="" data-classfil="main_indus_list" placeholder="Search Industry" data-list="2" type="text">
							<span class="input-group-btn" style="display: none">
								<button type="button" class="fa fa-close text-primary"></button>
							</span> 
						</div>
				</div>


					<div id="main_indus_list">
					@foreach (getDropDownlist('industries', ['id', 'industries_name'], 5) as $data)
					<div class="form-check old_list">
						<input class="form-check-input indus_fil " name="left_indus_fil[]"  id="industry{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="industry{{$data->id}}"
							id="left_indus_fil">{{$data->industries_name}}
							{{-- <span>(0)</span>  --}}
						</label>
					</div>
					@endforeach
				</div>
				</div>

				{{-- Serach bar --}}
				

			</div>
		</div>

		<div class="panel">
			<div class="acod-head">
				<h6 class="acod-title">
					<a data-bs-toggle="collapse" href="#location" class="collapsed">
						Location
					</a>
				</h6>
			</div>
		
			<div id="location" class="acod-body collapse ">

				<div class="acod-content" id="location_list">
						<div class="search-bx style-1 search-field-js">
						<div class="input-group">
							<input class="form-control list_filt" value="" data-classfil="main_loc_list" placeholder="Search Location" data-list="3" type="text">
							<span class="input-group-btn" style="display: none">
								<button type="button" class="fa fa-close text-primary"></button>
							</span> 
						</div>
					</div>
					<div id="main_loc_list">
					@foreach (getDropDownlist('cities', ['id', 'city_name']) as $data)
					<div class="form-check">
						<input class="form-check-input loc_fil" name="left_loc_fil[]" id="location{{$data->id}}"
							type="checkbox" value="{{$data->id}}">
						<label class="form-check-label" for="location{{$data->id}}"
							id="left_loc_fil">{{$data->city_name}}
							{{-- <span>(0)</span>  --}}
						</label>
					</div>
					@endforeach
					
				</div>
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
						Salary
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
							id="left_sal1_fil">{{$data->salary_range}} 
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
				<div class="search-bx style-1 search-field-js">
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
							{{-- <span>(0)</span>  --}}
						</label>
					</div>
					@endforeach
				</div>
				</div>

				{{-- Serach bar --}}
				

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