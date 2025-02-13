		<div class="col-xl-3 col-lg-4 col-md-5 m-b30">
							<aside id="accordion1" class="sticky-top sidebar-filter">
								<h6 class="title"><i class="fa fa-sliders m-r5"></i> Refined By <a href="{{route('browse-jobseeker')}}" class="font-12 float-end">Reset All</a></h6>
								<form class="jsfound_left_filters">
								<div class="panel">
									<div class="acod-head">
										<h6 class="acod-title"> 
											<a data-bs-toggle="collapse" href="#jobtype" >
												Job Type 
											</a>
										</h6>
									</div>
									<div id="jobtype" class="acod-body collapse show">
										<div class="acod-content">
											@foreach (getDropDownlist('job_types', ['job_type', 'id']) as $data)
											<div class="form-check">
												<input class="form-check-input job_type_fil" name="left_jtype_fil[]"
													id="function-services-{{$data->id}}" type="checkbox" value="{{$data->id}}">
												<label class="form-check-label" for="function-services-{{$data->id}}"
													id="left_intern_fil">{{ $data->job_type}} 
													{{-- <span>({{is_exist('job_posting_view',['job_type'=>$data->id, 'is_deleted'=>'No','status'=>'Live'])}})</span>  --}}
												</label>
											</div>
											@endforeach

										</div>
									</div>
								</div>
								<div class="form-check form-switch joiner-switcher">
									
									<label class="form-check-label" for="immidate_join">Immediate Joiners</label>
									@php
										$immidiate = getDropDownlist('notice_periods', ['notice', 'id']);
									@endphp
									<input class="form-check-input" name="notice_type_fil[]" value="1" type="checkbox" role="switch" id="immidate_join">
								</div>

								<div class="panel" id="immidiate_shuffle">
									<div class="acod-head">
										<h6 class="acod-title"> 
											<a data-bs-toggle="collapse"  href="#notice" class="collapsed">
												Notice Period 
											</a>
										</h6>
									</div>
									<div id="notice" class="acod-body collapse">
										<div class="acod-content">
											@foreach (getDropDownlist('notice_periods', ['notice', 'id']) as $data)
											<div class="form-check">
												<input class="form-check-input notice_type_fil" name="notice_type_fil[]"
													id="function-services-{{$data->id}}" type="checkbox" value="{{$data->id}}">
												<label class="form-check-label" for="function-services-{{$data->id}}"
													id="notice_type_fil">{{ $data->notice}} 
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
												<div class="input-group">
													<input class="form-control" value="" data-classfil="main_edu_list" placeholder="Search Education" data-list="1" type="text">
													<button type="button" class="btn btn-primary btn-sm" id="clear-search-education">Clear</button>
												</div>
											</div>
											<div id="main_edu_list">
												@foreach (getDropDownlist('qualifications', ['id', 'educational_qualification']) as $index => $data)
													<div class="form-check edu-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">
														<input class="form-check-input edu_fil" name="left_edu_fil[]" id="education{{$data->id}}" type="checkbox" value="{{$data->id}}">
														<label class="form-check-label" for="education{{$data->id}}">{{$data->educational_qualification}}</label>
													</div>
												@endforeach
											</div>
											@if (count(getDropDownlist('qualifications', ['id', 'educational_qualification'])) > 5)
												<button id="show-more-education" class="btn btn-primary btn-sm mt-2">Show More</button>
											@endif
										</div>
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
									<div id="location" class="acod-body collapse">
										<div class="acod-content">
											
											<div class="search-bx style-1 search-field-js">
												<div class="input-group">
													<input class="form-control" id="search-location" placeholder="Search Location" data-classfil="main_loc_list" data-list="3" type="text">
													<button type="button" class="btn btn-primary btn-sm" id="clear-search-location">Clear</button>
												</div>
											</div>
											<div id="main_loc_list">
												@foreach (getDropDownlist('cities', ['id', 'city_name']) as $index => $data)
													<div class="form-check location-item" style="{{ $index >= 5 ? 'display: none;' : '' }}">					
														<input class="form-check-input loc_fil" name="left_loc_fil[]" id="location{{$data->id}}" type="checkbox" value="{{$data->id}}">
														<label class="form-check-label" for="location{{$data->id}}">{{$data->city_name}}</label>
													</div>
												@endforeach
											</div>
											@if (count(getDropDownlist('cities', ['id', 'city_name'])) > 5)
												<button id="show-more-location" class="btn btn-primary btn-sm mt-2">Show More</button>
											@endif
										</div>
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
									</div>
								</div>
					

								<div class="panel">
									<div class="acod-head">
										<h6 class="acod-title"> 
											<a data-bs-toggle="collapse"  href="#salary" class="collapsed" >
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
													id="left_sal1_fil">{{$data->salary_range}} 
													{{-- <span>(0)</span>  --}}
												</label>
											</div>
											@endforeach
										</div>
									</div>
								</div>

								
		

								</form>
							</aside>
						</div>