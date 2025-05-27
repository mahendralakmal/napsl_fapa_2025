@extends('layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
    <style>
        .entry-image {
            position: relative;
            margin-top: 2.5rem;
        }

        .entry-form {
            position: relative;
            top: 5rem;
        }

        .uploaded-image img {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .uploaded-image img:hover {
            transform: scale(3);
            z-index: 10;
            box-shadow: 0 4px 16px rgba(0,0,0,0.3);
            position: relative;
        }

        .img-thumbnail, .uploaded-image img{
            max-width: 250px;
            max-height: 155px
        }
    </style>
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
                                    class="d-none d-md-inline-block">Upload Images</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        @foreach(['Open Monochrome', 'Open Color', 'World In Focus'] as $section)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="mb-3" style="text-align: center;border-bottom: 1px solid #e5e5e5;padding-bottom: 12px;margin-top: 2rem;">{{ $section }}</h5>
                                                    <div class="row">
                                                        @for($i = 1; $i <= 4; $i++)
                                                            <div class="col-xxl-6">
                                                                <form class="myForm mb-4" enctype="multipart/form-data" method="POST"
                                                                    data-section="{{ $section }}"
                                                                    data-count="{{ $i }}" action="{{ route('exhibition_entries.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="section" value="{{ $section }}">
                                                                    <input type="hidden" name="count" value="{{ $i }}">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-3">
                                                                            <label for="title_{{ $section }}_{{ $i }}"
                                                                                class="form-label mb-1">Title</label>
                                                                            <input type="text" class="form-control mb-2"
                                                                                name="image_caption" id="title_{{ $section }}_{{ $i }}"
                                                                                required>
                                                                            <input type="file" class="form-control mb-2"
                                                                                name="image" accept="image/jpeg" required>
                                                                            <button type="submit" class="btn btn-primary btn-upload">
                                                                                Submit
                                                                            </button>
                                                                        </div>
                                                                        <div class="uploaded-image ms-3">
                                                                            <!-- Image preview will appear here -->
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    // Show image preview immediately after file selection
                    $(document).on('change', '.myForm input[type="file"][name="image"]', function(e) {
                        var input = this;
                        var $imgDiv = $(this).closest('.myForm').find('.uploaded-image');
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $imgDiv.html(
                                    '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width:250px;" />' +
                                    '<div style="color: #dc3545; font-size: 0.95em; margin-top: 0.5em;">Verify and click the submit</div>'
                                );
                            }
                            reader.readAsDataURL(input.files[0]);
                        } else {
                            $imgDiv.html('');
                        }
                    });

                    $(document).ready(function () {
                        $.ajax({
                            url: "{{ route('user_entries') }}",
                            method: "GET",
                            success: function(entries) {
                                entries.forEach(function(entry) {
                                    // Find the form for this section and count
                                    var $form = $('.myForm[data-section="' + entry.section + '"][data-count="' + entry.count + '"]');
                                    if ($form.length) {
                                        // Set caption
                                        $form.find('input[name="image_caption"]').val(entry.image_caption);
                                        // Set image
                                        if(entry.image){
                                            var imageUrl = "{{ asset('storage') }}/" + entry.image;
                                            $form.find('.uploaded-image').html('<img src="' + imageUrl + '" class="img-thumbnail" style="max-width:250px;" />');
                                        }
                                    }
                                });
                            }
                        });

                        $('.myForm').on('submit', function(e) {
                            e.preventDefault();
                            var $form = $(this);
                            var formData = new FormData(this);
                            var $imgDiv = $form.find('.uploaded-image');

                            // Remove previous errors
                            $form.find('.is-invalid').removeClass('is-invalid');
                            $form.find('.invalid-feedback').remove();

                            $.ajax({
                                url: $form.attr('action'),
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                success: function(response) {
                                    if(response.image_url){
                                        $imgDiv.html('<img src="' + response.image_url + '" class="img-thumbnail" style="max-width:250px;" />');
                                    } else {
                                        $imgDiv.html('<span class="text-success">Uploaded!</span>');
                                    }
                                },
                                error: function(xhr) {
                                    if(xhr.status === 422) {
                                        var errors = xhr.responseJSON.errors;
                                        // Loop through errors and show them
                                        $.each(errors, function(field, messages) {
                                            var $input = $form.find('[name="' + field + '"]');
                                            $input.addClass('is-invalid');
                                            // Only add one error message per field
                                            if ($input.next('.invalid-feedback').length === 0) {
                                                $input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                                            }
                                        });
                                    } else {
                                        $imgDiv.html('<span class="text-danger">Upload failed</span>');
                                    }
                                }
                            });
                        });
                    });
                </script>
@endsection
