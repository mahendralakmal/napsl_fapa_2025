@extends('layouts.master')
@section('title')
    Upload Entries
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .img-thumbnail,
        .uploaded-image img {
            max-width: min(250px, 100%);
            max-height: 155px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .upload-slot {
            padding: 1rem !important;
        }

        @media (min-width: 992px) {
            .upload-slot {
                padding: 1.5rem !important;
            }
        }

        .upload-locked .btn-upload,
        .upload-locked input,
        .upload-locked .btn-delete-image {
            pointer-events: none;
            opacity: 0.65;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card {{ !empty($entriesSubmitted) ? 'upload-locked' : '' }}" id="upload-card">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <h2 class="mb-0 h4">Upload Images</h2>
                    @if(!empty($entriesSubmitted))
                        <span class="badge bg-success">Submitted &amp; locked</span>
                    @endif
                </div>

                @if(!empty($entriesSubmitted))
                    <div class="alert alert-info mb-0 rounded-0">
                        Your entries were submitted on {{ auth()->user()->entries_submitted_at->format('d M Y, h:i A') }}.
                        Uploading or deleting images is no longer allowed.
                    </div>
                @else
                    <div class="alert alert-secondary mb-0 rounded-0 small">
                        <strong>Image requirements:</strong>
                        JPEG only · sRGB color space · max 1920×1080 px · max 2 MB per image.
                        When finished, click <strong>Done</strong> to lock your entries and receive a confirmation email.
                    </div>
                @endif

                <div class="card-body" style="padding: 0rem;">
                    @foreach(['Open Monochrome', 'Open Color'] as $section)
                        <h3 class="mb-3 entry-title">{{ $section }}</h3>
                        <div class="row">
                            @for($i = 1; $i <= 4; $i++)
                                <div class="col-12 col-md-6 upload-slot">
                                    <form class="myForm mb-4" enctype="multipart/form-data" method="POST"
                                        data-section="{{ $section }}"
                                        data-count="{{ $i }}" action="{{ route('exhibition_entries.store') }}">
                                        @csrf
                                        <input type="hidden" name="section" value="{{ $section }}">
                                        <input type="hidden" name="count" value="{{ $i }}">
                                        <div class="upload-entry-row">
                                            <div class="upload-entry-fields">
                                                <label for="title_{{ $section }}_{{ $i }}"
                                                    class="form-label mb-1">Title {{ $i }}</label>
                                                <input type="text" class="form-control mb-2"
                                                    name="image_caption" id="title_{{ $section }}_{{ $i }}"
                                                    required {{ !empty($entriesSubmitted) ? 'readonly' : '' }}>
                                                <input type="file" class="form-control mb-2"
                                                    name="image" accept="image/jpeg"
                                                    {{ !empty($entriesSubmitted) ? 'disabled' : 'required' }}>
                                                <button type="submit" class="btn btn-primary btn-upload w-100 w-sm-auto"
                                                    {{ !empty($entriesSubmitted) ? 'disabled' : '' }}>
                                                    Submit
                                                </button>
                                            </div>
                                            <div class="uploaded-image">
                                                <!-- Image preview will appear here -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endfor
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-end">
                    <button type="button" id="btn-finish" class="btn btn-success"
                        {{ !empty($entriesSubmitted) ? 'disabled' : 'disabled' }}>
                        {{ !empty($entriesSubmitted) ? 'Submitted' : 'Done' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let entriesSubmitted = @json(!empty($entriesSubmitted));

        function lockUploadUi() {
            entriesSubmitted = true;
            $('#upload-card').addClass('upload-locked');
            $('.myForm input, .myForm button').prop('disabled', true);
            $('.myForm input[name="image_caption"]').prop('readonly', true).prop('disabled', false);
            $('.btn-delete-image').remove();
            $('#btn-finish').prop('disabled', true).text('Submitted');
        }

        function checkFinishButton() {
            if (entriesSubmitted) {
                $('#btn-finish').prop('disabled', true).text('Submitted');
                return;
            }
            let hasEntry = $('.uploaded-image img').length > 0;
            $('#btn-finish').prop('disabled', !hasEntry).text('Done');
        }

        function showFieldErrors($form, errors) {
            $.each(errors, function(field, messages) {
                var $input = $form.find('[name="' + field + '"]');
                if (!$input.length) {
                    $input = $form.find('input[name="image"]');
                }
                $input.addClass('is-invalid');
                var msg = Array.isArray(messages) ? messages[0] : messages;
                if ($input.next('.invalid-feedback').length === 0) {
                    $input.after('<div class="invalid-feedback d-block">' + msg + '</div>');
                } else {
                    $input.next('.invalid-feedback').text(msg);
                }
            });
        }

        $(document).on('change', '.myForm input[type="file"][name="image"]', function() {
            if (entriesSubmitted) return;
            var input = this;
            var $imgDiv = $(this).closest('.myForm').find('.uploaded-image');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $imgDiv.html(
                        '<img src="' + e.target.result + '" class="img-thumbnail" />' +
                        '<div class="text-danger small mt-1">Verify and click Submit</div>'
                    );
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $imgDiv.html('');
            }
        });

        $(document).ready(function () {
            checkFinishButton();

            $.ajax({
                url: "{{ route('user_entries') }}",
                method: "GET",
                success: function(response) {
                    var entries = response.entries || response;
                    if (response.entries_submitted) {
                        lockUploadUi();
                    }

                    (entries || []).forEach(function(entry) {
                        var $form = $('.myForm[data-section="' + entry.section + '"][data-count="' + entry.count + '"]');
                        if (!$form.length) return;

                        $form.find('input[name="image_caption"]').val(entry.image_caption);
                        if (entry.image) {
                            var imageUrl = "{{ asset('storage') }}/" + entry.image;
                            var deleteBtn = entriesSubmitted ? '' :
                                '<button type="button" class="btn btn-danger btn-sm mt-2 btn-delete-image" ' +
                                'data-section="' + entry.section + '" ' +
                                'data-count="' + entry.count + '" ' +
                                'data-entry-id="' + entry.id + '" title="Delete">' +
                                '<i class="bi bi-trash"></i></button>';

                            $form.find('.uploaded-image').html(
                                '<img src="' + imageUrl + '" class="img-thumbnail" />' + deleteBtn
                            );
                        }
                    });
                    checkFinishButton();
                }
            });

            $('.myForm').on('submit', function(e) {
                e.preventDefault();
                if (entriesSubmitted) {
                    alert('Your entries are locked. You cannot upload more images.');
                    return;
                }

                var $form = $(this);
                var formData = new FormData(this);
                var $imgDiv = $form.find('.uploaded-image');

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
                        if (response.image_url) {
                            $imgDiv.html(
                                '<img src="' + response.image_url + '" class="img-thumbnail" />' +
                                '<button type="button" class="btn btn-danger btn-sm mt-2 btn-delete-image" ' +
                                'data-section="' + $form.data('section') + '" ' +
                                'data-count="' + $form.data('count') + '" ' +
                                'data-entry-id="' + (response.entry_id || '') + '" title="Delete">' +
                                '<i class="bi bi-trash"></i></button>'
                            );
                        } else {
                            $imgDiv.html('<span class="text-success">Uploaded!</span>');
                        }
                        checkFinishButton();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 || xhr.status === 403) {
                            var errors = (xhr.responseJSON && xhr.responseJSON.errors) ? xhr.responseJSON.errors : {
                                image: [(xhr.responseJSON && xhr.responseJSON.error) || 'Validation failed']
                            };
                            showFieldErrors($form, errors);
                        } else {
                            $imgDiv.html('<span class="text-danger">Upload failed</span>');
                        }
                    }
                });
            });

            $('#btn-finish').on('click', function() {
                if (entriesSubmitted) return;

                if (!confirm('Submit your entries now? You will not be able to upload or change images after this.')) {
                    return;
                }

                var $btn = $(this);
                $btn.prop('disabled', true).text('Sending...');

                $.ajax({
                    url: "{{ route('send.finish.email') }}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function(response) {
                        alert(response.message || 'Thank you! Confirmation email sent. Your entries are now locked.');
                        lockUploadUi();
                    },
                    error: function(xhr) {
                        var msg = (xhr.responseJSON && (xhr.responseJSON.error || xhr.responseJSON.message))
                            ? (xhr.responseJSON.error || xhr.responseJSON.message)
                            : 'Could not send email. Please try again.';
                        alert(msg);
                        checkFinishButton();
                    }
                });
            });

            $(document).on('click', '.btn-delete-image', function() {
                if (entriesSubmitted) {
                    alert('Your entries are locked.');
                    return;
                }

                var $btn = $(this);
                var entryId = $btn.data('entry-id');
                var section = $btn.data('section');
                var count = $btn.data('count');
                var $form = $('.myForm[data-section="' + section + '"][data-count="' + count + '"]');

                if (!entryId) {
                    alert('Could not find this entry. Please refresh and try again.');
                    return;
                }

                if (!confirm('Are you sure you want to delete this image?')) return;

                var url = "{{ route('exhibition_entries.destroy', ['upload_image' => 'ENTRY_ID']) }}".replace('ENTRY_ID', entryId);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    success: function() {
                        $form.find('.uploaded-image').html('');
                        $form.find('input[name="image_caption"]').val('');
                        $form.find('input[name="image"]').val('');
                        checkFinishButton();
                    },
                    error: function(xhr) {
                        var msg = (xhr.responseJSON && xhr.responseJSON.error)
                            ? xhr.responseJSON.error
                            : 'Could not delete image. Please try again.';
                        alert(msg);
                    }
                });
            });
        });
    </script>
@endsection
