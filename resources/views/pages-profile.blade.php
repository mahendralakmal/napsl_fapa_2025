@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    {{-- <h3 class="text-white mb-1 text-capitalize">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->first_name}} {{auth()->user()->profile->surname}}@else{{auth()->user()->name}}@endif</h3> --}}
                    {{-- <p class="text-white-75 text-capitalize">@if(!is_null(auth()->user()->profile)){{auth()->user()->profile->section}}@endif</p> --}}
                </div>
            </div>
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
                            {{-- <div class="col-xxl-3">
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
                            </div> --}}
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Update Profile</h5>

                                        <form id="submitForm" @if(is_null(auth()->user()->profile))action="{{route('user_profile.store')}}" method="POST"
                                              @else action="{{route('user_profile.store',auth()->user()->profile->id)}}" method="PUT" @endif>
                                            @csrf
                                            <div class="col-xxl-5">
                                                <input type="hidden" id="id" name="id"
                                                       @if(!is_null(auth()->user()->profile))value="{{auth()->user()->profile->id}}"@endif>
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                    <select class="form-control @error('title') is-invalid @enderror" name="title" id="title" required>
                                                        <option value="">Select Title</option>
                                                        <option value="Dr." {{ old('title') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                                        <option value="Mr." {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                                        <option value="Mrs." {{ old('title') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                                        <option value="Ms." {{ old('title') == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                                    </select>
                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}"
                                                           id="name"
                                                           placeholder="Enter your name" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="honors" class="form-label">Honors</label>
                                                    <input type="text"
                                                           class="form-control @error('honors') is-invalid @enderror"
                                                           name="honors" value="{{ old('honors') }}"
                                                           id="honors"
                                                           placeholder="Enter honors (if any)">
                                                    @error('honors')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="club" class="form-label">Club</label>
                                                    <input type="text"
                                                           class="form-control @error('club') is-invalid @enderror"
                                                           name="club" value="{{ old('club') }}"
                                                           id="club"
                                                           placeholder="Enter club name">
                                                    @error('club')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <textarea type="text"
                                                           class="form-control @error('address') is-invalid @enderror"
                                                           name="address" value="{{ old('address') }}"
                                                           id="address"
                                                           placeholder="Enter address" required></textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                                    <select class="form-control @error('country') is-invalid @enderror" name="country" id="country" required>
                                                        <option value="">Select country</option>
                                                    </select>
                                                    @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email', auth()->user()->email) }}"
                                                           id="email"
                                                           placeholder="Enter email" required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Telephone <span class="text-danger">*</span></label>
                                                    <input type="tel"
                                                           class="form-control @error('telephone') is-invalid @enderror"
                                                           name="telephone" value="{{ old('telephone') }}"
                                                           id="telephone"
                                                           placeholder="Enter telephone" required>
                                                    @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        let countries = [];

        function formatCountry(country) {
            if (!country.id) return country.text;
            return $(
                `<span><img src="${country.flag}" class="me-2" style="width:20px;height:15px;"/>${country.dial_code} ${country.text.replace(country.dial_code, '')}</span>`
            );
        }

        $(document).ready(function() {
            // Fetch countries from restcountries.com
            $.ajax({
                url: 'https://restcountries.com/v3.1/all',
                method: 'GET',
                success: function(data) {
                    countries = data.map(c => ({
                        id: c.cca2,
                        text: `${c.idd.root ? c.idd.root + (c.idd.suffixes ? c.idd.suffixes[0] : '') : ''} ${c.name.common}`,
                        dial_code: c.idd.root ? c.idd.root + (c.idd.suffixes ? c.idd.suffixes[0] : '') : '',
                        flag: c.flags && c.flags.png ? c.flags.png : ''
                    })).filter(c => c.dial_code.trim() !== '');

                    $('#country').select2({
                        data: countries,
                        templateResult: formatCountry,
                        templateSelection: formatCountry,
                        placeholder: "Select country",
                        allowClear: true,
                        width: '100%'
                    });
                }
            });

            // Set telephone input on country select
            $('#country').on('select2:select', function (e) {
                const selected = countries.find(c => c.id === e.params.data.id);
                if (selected) {
                    $('#telephone').val(selected.dial_code + ' ');
                }
            });

            // Fetch user profile data via AJAX
            $.ajax({
                url: "{{ route('profile.show') }}",
                method: "GET",
                dataType: "json",
                success: function(profile) {
                    if (profile) {
                        $('#title').val(profile.title).trigger('change');
                        $('#name').val(profile.name);
                        $('#honors').val(profile.honors);
                        $('#club').val(profile.club);
                        $('#address').val(profile.address);
                        $('#email').val(profile.email);
                        $('#telephone').val(profile.telephone);

                        // For country, set after Select2 is initialized and countries are loaded
                        let setCountry = function() {
                            if ($('#country').hasClass("select2-hidden-accessible")) {
                                $('#country').val(profile.country).trigger('change');
                            } else {
                                setTimeout(setCountry, 100);
                            }
                        };
                        setCountry();
                    }
                }
            });
        });
    </script>
@endsection
