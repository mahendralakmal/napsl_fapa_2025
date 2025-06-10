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
    <div class="row">
        <div class="col-lg-12">
            <div>
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-header"><h2>Upload Images</h2></div>
                                    <div class="card-body" style="padding: 0rem;">
                                        @foreach(['Open Monochrome', 'Open Color'] as $section)
                                            {{-- <div class="row">
                                                <div class="col-md-12"> --}}
                                                    <h3 class="mb-3 entry-title">{{ $section }}</h3>
                                                    <div class="row">
                                                        @for($i = 1; $i <= 4; $i++)
                                                            <div class="col-xxl-6" style="padding: 2rem;">
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
                                                {{-- </div>
                                            </div> --}}
                                        @endforeach
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" id="btn-finish" class="btn btn-success">Done</button>
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

                        $('#btn-finish').on('click', function() {
                            $.ajax({
                                url: "{{ route('send.finish.email') }}",
                                type: "POST",
                                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                success: function(response) {
                                    alert('Thank you! Confirmation email sent.');
                                },
                                error: function() {
                                    alert('Could not send email. Please try again.');
                                }
                            });
                        });
                    });
                </script>
@endsection
