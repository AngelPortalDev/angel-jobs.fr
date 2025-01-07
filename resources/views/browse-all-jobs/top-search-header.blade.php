					<search>
					{{-- <form class="dezPlaceAni" id="searchFilter" > --}}
					<form class="dezPlaceAni" action="{{url('top-search-bar')}}" method="GET"> 
						 @csrf
						<div class="row top-search-close-btn" style="align-items: end;">
							<div class="col-lg-4 col-md-6">
								<div class="form-group" style="position: relative">
										<select name="search_skills[]" class="skillkeysearch" id="search_skills" multiple style="width: 100%">
										
										 @foreach (getDropDownlist('key_skills', ['id', 'key_skill_name']) as $key_skills)
										<option value="{{ base64_encode($key_skills->id)}}">{{ $key_skills->key_skill_name}}</option>
										@endforeach 
										
									</select>
									<i class="fa fa-search search-bar-icon"></i>
									
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								
								<div class="form-group">
									<select name="search_city[]" class="citysearch" id="search_city" multiple style="width: 100%">
										<option value="">All Cities (India)</option>
										 @foreach (getDropDownlist('cities', ['id', 'city_name','country_id']) as $city_name)
										 @if($city_name->country_id == '31')
										<option value="{{ base64_encode($city_name->id)}}">{{ $city_name->city_name}}</option>
										@endif
										@endforeach 
									</select>

									<i class="fas fa-map-marker-alt search-bar-icon"></i>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<select name="search_job_type[]" multiple class="skillkeysearch jobtype" style="width: 100%">
										 @foreach (getDropDownlist('job_types', ['job_type', 'id']) as $job_type)
										<option value="{{ base64_encode($job_type->id)}}" > {{ $job_type->job_type}}</option>
										@endforeach 
									</select>

									<i class="fa fa-briefcase search-bar-icon" aria-hidden="true"></i>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								{{-- <button type="button" id="search" class="site-button btn-block">Find Job</button> --}}
								<button type="submit"  class="site-button btn-block" style="margin-bottom: 25px;">Find Job</button>
							</div>
						</div>
					</form>
					</search>
				