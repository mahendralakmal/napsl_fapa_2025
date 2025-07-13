@extends('layouts.judging.master_admin')
@section('title')
    Rules & Regulations
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optionally include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
@endsection
@section('content')
    @php
        // $images is now passed from the controller
    @endphp

    @if (!isset($images) || empty($images))
        <div class="alert alert-warning text-center">
            No images available for marking. Please check the upload process.
        </div>
    @else
    <div class="d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div id="slideshow-container">
                <div class="text-center mb-3">
                    <img id="slideshow-image" src="" alt="Image" class="img-fluid" style="height: 765px; box-shadow: #6a6a6a 8px 8px 16px; border: 0.5px solid #6a6a6a;">
                </div>
                <div class="text-center">
                    <div id="caption" class="mb-2" style="font-size: large"></div>
                    <div id="mark-options">
                        <button id="prev-btn" class="btn btn-primary" disabled> Previous </button>
                        <label class="mb-2">Mark this image:</label>
                        @for ($i = 1; $i <= 10; $i++)
                            <input type="radio" class="btn-check" name="mark" id="mark{{ $i }}" value="{{ $i }}" autocomplete="off">
                            <label class="btn btn-outline-primary" style="position: relative; top:4px;" for="mark{{ $i }}">{{ $i }}</label>
                        @endfor
                        <button id="next-btn" class="btn btn-primary" disabled> Next </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        const images = @json($images);
        let currentIndex = 0;
        let marks = [];

        function showImage(index) {
            $('#slideshow-image').attr('src', '/storage/' + images[index]['image']);
            $('#slideshow-image').attr('data-image_id', images[index]['image_id']);

            $('#caption').text(images[index]['caption'] || 'No caption available');

            // Reset radio buttons
            $('input[name="mark"]').prop('checked', false);

            // Re-check previous mark if exists
            if (images[index]['my_judging']) {
                const mark = images[index]['my_judging'];
                $('input[name="mark"][value="' + mark + '"]').prop('checked', true);
                $('#next-btn').prop('disabled', false);
            }
            else if (marks[index]) {
                $('input[name="mark"][value="' + marks[index] + '"]').prop('checked', true);
                $('#next-btn').prop('disabled', false);
            } else {
                $('#next-btn').prop('disabled', true);
            }

            // Enable/disable navigation buttons
            $('#prev-btn').prop('disabled', index === 0);
        }

        $(document).ready(function() {
            // Enable Next button when a mark is selected
            $('#mark-options input[name="mark"]').on('change', function() {
                $('#next-btn').prop('disabled', false);
            });

            // Handle Next button click
            $('#next-btn').on('click', function() {
                const selectedMark = $('input[name="mark"]:checked').val();
                marks[currentIndex] = selectedMark;

                currentIndex++;
                if (currentIndex < images.length) {
                    showImage(currentIndex);
                } else {
                    $('#slideshow-container').html('<div class="alert alert-success text-center">Thank you! All images have been marked.</div>');
                }
            });

            // Handle Previous button click
            $('#prev-btn').on('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    showImage(currentIndex);
                }
            });

            // Show the first image
            showImage(currentIndex);
        });


        // Function to submit marks
        $('.btn-check').on('click', function () {
            const selectedMark = $('input[name="mark"]:checked').val();
            const imageId = $('#slideshow-image').data('image_id');

            marks[currentIndex] = selectedMark;

            // Send mark via AJAX
            $.ajax({
                url: '{{ route('submit.mark') }}',
                type: 'POST',
                data: {
                    image_id: imageId,
                    mark: selectedMark,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    currentIndex++;
                    if (currentIndex < images.length) {
                        showImage(currentIndex);
                    } else {
                        $('#slideshow-container').html('<div class="alert alert-success text-center">Thank you! All images have been marked.</div>');
                    }
                },
                error: function (xhr) {
                    alert('Error submitting mark: ' + xhr.responseJSON.message);
                }
            });
        });
    </script>
@endsection
