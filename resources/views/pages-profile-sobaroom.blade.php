@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ URL::asset('build/images/profile-bg.jpg') }}" alt="" class="profile-wid-img"/>
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img
                        src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('build/images/users/avatar-1.jpg') }} @endif"
                        alt="user-img" class="img-thumbnail rounded-circle"/>
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1 text-capitalize">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->first_name}} {{auth()->user()->profile->surname}}@else{{auth()->user()->name}}@endif</h3>
                    <p class="text-white-75 text-capitalize">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->section}}@endif</p>
                    {{--                    <div class="hstack text-white-50 gap-1">--}}
                    {{--                        <div class="me-2"><i--}}
                    {{--                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>California,--}}
                    {{--                            United States</div>--}}
                    {{--                        <div><i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Themesbrand--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <!--end col-->
        {{--            <div class="col-12 col-lg-auto order-last order-lg-0">--}}
        {{--                <div class="row text text-white-50 text-center">--}}
        {{--                    <div class="col-lg-6 col-4">--}}
        {{--                        <div class="p-2">--}}
        {{--                            <h4 class="text-white mb-1">24.3K</h4>--}}
        {{--                            <p class="fs-14 mb-0">Followers</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-6 col-4">--}}
        {{--                        <div class="p-2">--}}
        {{--                            <h4 class="text-white mb-1">1.3K</h4>--}}
        {{--                            <p class="fs-14 mb-0">Following</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                <tr>
                                                    <th class="ps-0" scope="row">Full Name :</th>
                                                    <td class="text-muted">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->first_name}} {{auth()->user()->profile->surname}}@endif</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Mobile :</th>
                                                    <td class="text-muted">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->telephone}}@endif</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">E-mail :</th>
                                                    <td class="text-muted">{{auth()->user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="ps-0" scope="row">Category</th>
                                                    <td class="text-muted">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->section}}@endif</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Update Profile</h5>

                                        <form id="submitForm" @if(is_null(auth()->user()->profile))action="{{route('user_profile.store')}}" method="POST"
                                              @else action="{{route('user_profile.store',auth()->user()->profile->id)}}" method="PUT" @endif>
{{--                                            @if(!is_null(auth()->user()->profile))--}}
{{--                                                @method('PUT')--}}
{{--                                            @endif--}}
                                            @csrf
                                            <div class="col-xxl-5">
                                                <input type="hidden" id="id" name="id"
                                                       @if(!is_null(auth()->user()->profile))value="{{auth()->user()->profile->id}}"@endif>
                                                <div class="mb-3">
                                                    <label class="form-label d-block">Section <span
                                                            class="text-danger">*</span></label>
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="school" value="school">
                                                            <label class="form-check-label" for="school">
                                                                School
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="student" value="student">
                                                            <label class="form-check-label" for="student">
                                                                NAPSL Students
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="section"
                                                                   id="member" value="member" checked>
                                                            <label class="form-check-label" for="member">
                                                                Members Open
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name(s)
                                                        <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control @error('first_name') is-invalid @enderror"
                                                           name="first_name" value="{{ old('first_name') }}"
                                                           id="first_name"
                                                           placeholder="Enter first_name">
                                                    @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="invalid-feedback">
                                                        Please enter first name
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="surname" class="form-label">Surname <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control @error('surname') is-invalid @enderror"
                                                           name="surname" value="{{ old('surname') }}"
                                                           id="surname"
                                                           placeholder="Enter surname">
                                                    @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="invalid-feedback">
                                                        Please enter surname
                                                    </div>
                                                </div>
                                                <div class="school" style="display: none">
                                                    <div class="mb-3">
                                                        <label for="age" class="form-label">Age <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control @error('age') is-invalid @enderror"
                                                               name="age" value="{{ old('age') }}" id="age"
                                                               placeholder="Enter age">
                                                        @error('age')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter age
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="grade" class="form-label">Grade <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control @error('grade') is-invalid @enderror"
                                                               name="grade" value="{{ old('grade') }}"
                                                               id="grade"
                                                               placeholder="Enter grade">
                                                        @error('grade')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter grade
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="school" class="form-label">Name of the
                                                            school <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control @error('school') is-invalid @enderror"
                                                               name="school" value="{{ old('school') }}"
                                                               id="school"
                                                               placeholder="Enter school">
                                                        @error('school')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter school name
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="napsl" style="display: none">
                                                    <div class="mb-3">
                                                        <label for="year_of_study" class="form-label">Year
                                                            of study <span
                                                                class="text-danger">*</span></label>
                                                        <select name="year_of_study" id="year_of_study"
                                                                class="form-control @error('registration_number') is-invalid @enderror">
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                        @error('year_of_study')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter year of study
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="registration_number" class="form-label">Registration
                                                            Number
                                                            <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control @error('registration_number') is-invalid @enderror"
                                                               name="registration_number"
                                                               value="{{ old('registration_number') }}"
                                                               id="registration_number"
                                                               placeholder="Enter registration_number">
                                                        @error('registration_number')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter registration number
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="member" style="display: block">
                                                    <div class="mb-3">
                                                        <label for="membership_number" class="form-label">Membership
                                                            Number
                                                            <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                               class="form-control @error('membership_number') is-invalid @enderror"
                                                               name="membership_number"
                                                               value="{{ old('membership_number') }}"
                                                               id="membership_number"
                                                               placeholder="Enter membership_number"
                                                        >
                                                        @error('membership_number')
                                                        <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter membership number
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Telephone/
                                                        Mobile <span
                                                            class="text-danger">*</span></label>
                                                    <input type="tel"
                                                           class="form-control @error('telephone') is-invalid @enderror"
                                                           name="telephone" value="{{ old('telephone') }}"
                                                           id="telephone"
                                                           placeholder="Enter telephone">
                                                    @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                    @enderror
                                                    <div class="invalid-feedback">
                                                        Please enter telephone/ Mobile
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="checkbox" name="cetify" id="certify">
                                                    <label for="telephone" class="form-label">&nbsp;&nbsp; I accept the rules and regulations of the competition<span
                                                        class="text-danger">*</span></label>
                                                    @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                    @enderror
                                                    <div class="invalid-feedback">
                                                        Please enter telephone/ Mobile
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">Save
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        @endsection
        @section('script')
            <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

            <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
            <script src="{{ URL::asset('build/js/app.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    // Attach change event handler to radio buttons
                    $('input[type="radio"]').change(function () {
                        var selectedOption = $('input[type="radio"]:checked').val();

                        // Show the corresponding div segment based on the selected option
                        if (selectedOption === 'school') {
                            $('.school').show(500);
                            $('.napsl').hide(500);
                            $('.member').hide(500);
                        } else if (selectedOption === 'student') {
                            $('.napsl').show(500);
                            $('.school').hide(500);
                            $('.member').hide(500);
                        } else if (selectedOption === 'member') {
                            $('.napsl').hide(500);
                            $('.school').hide(500);
                            $('.member').show(500);
                        }
                    });
                });
            </script>
@endsection
