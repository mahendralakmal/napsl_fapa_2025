@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')



    <div class="row">
        <div class="col-lg-12">
            <div>
                {{-- <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div> --}}
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Entry Form</h5>
                                        {{-- {{ auth()->user()->fapa->id }} --}}
                                        <form id="submitForm"
                                            @if(is_null(auth()->user()->fapa))
                                                action="{{route('user_profile.store')}}"
                                            @else
                                                action="{{route('user_profile.update',auth()->user()->fapa->id)}}"
                                            @endif
                                            enctype="multipart/form-data"
                                            method="POST">

                                            @if(!is_null(auth()->user()->fapa))
                                                @method('PUT')
                                            @endif
                                            @csrf

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
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="accept_rules" name="accept_rules" required>
                                                    <label class="form-check-label" for="accept_rules">
                                                        I accept the rules and conditions of the competition
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary" id="saveBtn" disabled>Submit</button>
                                                {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-lg-block col-lg-2"></div>
                            <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center mt-3 mt-lg-0" style="min-height: 200px;">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('exhibition_entries.index') }}"
                                        class="btn btn-primary{{ is_null(auth()->user()->fapa) ? ' disabled' : '' }}"
                                        {{ is_null(auth()->user()->fapa) ? 'tabindex="-1" aria-disabled="true"' : '' }}>
                                            Upload your entries
                                        </a>
                                        @if(is_null(auth()->user()->fapa))<p style="color: rgb(255 0 0) !important; font-size: x-small; font-weight: bold;position: absolute;margin-top: 90px;">Please submit the entry form.</p>@endif
                                    </div>
                                </div>
                            </div>
                        </div>
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
                `<span><img src="${country.flag}" class="me-2" alt="" style="width:20px;height:15px;object-fit:cover;"/>${country.dial_code} ${country.name || country.text}</span>`
            );
        }

        function initCountrySelect(data) {
            countries = data.map(c => ({
                id: c.id || c.name,
                text: `${c.dial_code} ${c.name}`,
                name: c.name,
                dial_code: c.dial_code,
                flag: c.flag
            }));

            $('#country').select2({
                data: countries,
                templateResult: formatCountry,
                templateSelection: formatCountry,
                placeholder: "Select country",
                allowClear: true,
                width: '100%'
            });
        }

        $(document).ready(function() {
            // Local country list (RestCountries v3.1 is deprecated / requires paid API key)
            $.ajax({
                url: "{{ asset('data/allowed-countries.json') }}",
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    initCountrySelect(data);
                },
                error: function() {
                    // Fallback: free countries.dev API (same shape mapping)
                    $.ajax({
                        url: 'https://countries.dev/countries?fields=name,flags,callingCodes,alpha2Code',
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const allowed = [
                                "Australia", "Bangladesh", "Bhutan", "Brunei", "China", "Hong Kong", "India",
                                "Indonesia", "Japan", "Korea", "Macao", "Malaysia", "Mauritius", "Myanmar",
                                "Nepal", "Pakistan", "Philippines", "Singapore", "Sri Lanka", "Taiwan",
                                "Thailand", "USA", "United States", "United States of America", "Vietnam",
                                "South Korea", "Egypt", "Brunei Darussalam", "Macau", "Viet Nam"
                            ];

                            const mapped = data
                                .filter(c => allowed.some(name =>
                                    (c.name || '').toLowerCase() === name.toLowerCase() ||
                                    (c.name || '').toLowerCase().includes(name.toLowerCase())
                                ))
                                .map(c => {
                                    let id = c.name;
                                    if (/united states/i.test(c.name)) id = 'USA';
                                    if (/korea/i.test(c.name) && !/north/i.test(c.name)) id = 'South Korea';
                                    if (/brunei/i.test(c.name)) id = 'Brunei';
                                    if (/macao|macau/i.test(c.name)) id = 'Macao';
                                    if (/viet nam/i.test(c.name)) id = 'Vietnam';

                                    const code = (c.callingCodes && c.callingCodes[0]) ? String(c.callingCodes[0]) : '';
                                    const dial = code ? (code.startsWith('+') ? code : '+' + code) : '';
                                    const flag = (c.flags && c.flags.png)
                                        ? c.flags.png
                                        : (c.alpha2Code ? `https://flagcdn.com/w40/${c.alpha2Code.toLowerCase()}.png` : '');

                                    return { id: id, name: id, dial_code: dial, flag: flag };
                                })
                                .filter(c => c.dial_code)
                                .sort((a, b) => a.name.localeCompare(b.name));

                            // de-dupe by id
                            const unique = [];
                            const seen = new Set();
                            mapped.forEach(c => {
                                if (!seen.has(c.id)) {
                                    seen.add(c.id);
                                    unique.push(c);
                                }
                            });

                            initCountrySelect(unique);
                        }
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
                                let value = profile.country;
                                // Map legacy values
                                if (/korea/i.test(value || '') && !/south/i.test(value || '')) value = 'South Korea';
                                if (/united states/i.test(value || '')) value = 'USA';
                                $('#country').val(value).trigger('change');
                            } else {
                                setTimeout(setCountry, 100);
                            }
                        };
                        setCountry();
                    }
                }
            });

            // Enable Save button only if checkbox is checked
            $('#accept_rules').on('change', function() {
                $('#saveBtn').prop('disabled', !this.checked);
            });
        });
    </script>
@endsection
