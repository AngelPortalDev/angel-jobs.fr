
<style>
    .list-left .list-item{
        font-size: 15px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .list-right .list-item{
        font-size: 15px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    @media only screen and (max-width: 768px) {
  .jobseeker-info-list {
    display: flex;
    flex-direction: column;
  }
}
</style>

<div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image: url({{ asset('images/jobseeker-profile-bg.jpg') }})">
    @php
        $table = 'jobseeker_view';
            $where = ['email'=> Session::get('js_username')];
            $select = ['js_id','fullname','country_name','city_name','role_name','work_desination_name','mob_code','mobile','email','profile_img','email_verified','resume_link'];
            $profile = [];
        $profile = getData($table, $select, $where);
    @endphp

    <div class="container">
        <div class="row">
            <!-- Candidate Info Section -->
            <div class="col-lg-8 col-xl-7 col-md-10 candidate-info p-3">
                <div class="candidate-detail">
                    <div class="canditate-des text-center">
                        <a>
                            @if (!empty($profile[0]->profile_img))
                                <img class="imagePreview" src="{{ url('storage/jobseeker/profile_image/'.$profile[0]->profile_img)}}" style="height: 100px; width: 100px; margin: 1px; object-fit: contain;">
                            @else
                                <img class="imagePreview" src="{{ asset('images/user_profile.png')}}" style="height: 100px; width: 100px; margin: 1px; object-fit: contain;">
                            @endif
                        </a>
                        <div class="upload-link" title="update" data-bs-toggle="tooltip" data-placement="right">
                            <form class="proflilImage" enctype="multipart/form-data">
                                <input type="file" class="update-flie image profilePic cursor-pointer" name="com_logo" id="com_logo" accept=".png,.jpg,.jpeg">
                                <input type="text" class="curr_img" value="{{ !empty($profile[0]->profile_img) ? $profile[0]->profile_img : '' }}" name="old_img_name" hidden>
                                <i class="fas fa-pencil-alt"></i>
                            </form>
                        </div>
                    </div>
                    @foreach ($profile as $info)
                    <div class="text-white browse-job text-left jobseeker-top-info-sec">
                        <h4 class="m-b0">
                            {{ !empty($info->fullname) ? $info->fullname : '' }}
                            <a class="m-l15 font-16 text-white" data-bs-toggle="modal" data-bs-target="#profilename" href="#"></a>
                        </h4>
                        <p class="m-b15 {{ empty($info->role_name) ? 'hideElem' : '' }}">
                            {{ $info->role_name }}
                        </p>

                        <div class="d-flex justify-content-between jobseeker-info-list">
                            <div class="list-left">
                                @if(!empty($info->city_name))
                                <div class="list-item {{ empty($info->city_name) && empty($info->country_name) ? 'hideElem' : '' }}">
                                    <i class="ti-location-pin"></i>
                                    {{ !empty($info->city_name) ? $info->city_name : '' }},
                                    {{ !empty($info->country_name) ? $info->country_name : '' }}
                                </div>
                                @endif
                                @if(!empty($info->mobile))
                                <div class="list-item">
                                    <i class="ti-mobile"></i>
                                    {{ !empty($info->mob_code) ? $info->mob_code : 'NA' }}
                                    <span class="p-0 text-white d-inline" >
                                        {{ !empty($info->mobile) ? $info->mobile : '' }}
                                    </span>
                                </div>
                                @endif

                                <div class="list-item">
                                    <i class="ti-email"></i> 
                                    {{ !empty($info->email) ? $info->email : 'NA' }}
                                    @if (!empty($info->email_verified) && $info->email_verified === 'Yes')
                                        <a class="verified-pill"><span class="badge bg-success fw-semibold">Verified</span></a>
                                    @else
                                        <a href="javascript:void(0)" class="unverified-pill verify">
                                            <span class="badge bg-red fw-semibold">Verify Now</span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="list-right">
                                <div class="list-item">
                                    <span class="d-flex align-items-center text-white">
                                        @if (!empty($info->email_verified) && $info->email_verified === 'Yes')
                                            <i class="fa-solid fa-check" style="color: green; margin-right: 10px;"></i>
                                        @else
                                            <i class="fa-solid fa-xmark" style="color: red; margin-right: 10px;"></i>
                                        @endif
                                        Verify Email Address
                                    </span>
                                </div>

                                <div class="list-item">
                                    <span class="d-flex align-items-center text-white">
                                        @if (!empty($info->profile_img) && $info->profile_img != null)
                                            <i class="fa-solid fa-check" style="color: green; margin-right: 10px;"></i>
                                        @else
                                            <i class="fa-solid fa-xmark" style="color: red; margin-right: 10px;"></i>
                                        @endif
                                        Add Profile Photo
                                    </span>
                                </div>

                                <div class="list-item">
                                    <span class="d-flex align-items-center text-white">
                                        @if (!empty($info->resume_link) && $info->resume_link != null)
                                            <i class="fa-solid fa-check" style="color: green; margin-right: 10px;"></i>
                                        @else
                                            <i class="fa-solid fa-xmark" style="color: red; margin-right: 10px;"></i>
                                        @endif
                                        Add Resume
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
