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
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row w-100 justify-content-center">
            <div id="slideshow-container">
                <div class="text-center mb-3">
                    <img id="slideshow-image" src="" alt="Image" class="img-fluid" style="height: 800px; box-shadow: #a8a8a8 7px 4px 14px; border: 0.5px solid #a8a8a8;">
                </div>
                <div class="text-center">
                    <div id="mark-options">
                        <label class="mb-2">Mark this image:</label>
                        @for ($i = 1; $i <= 10; $i++)
                            <label class="form-check form-check-inline mx-1">
                                <input class="form-check-input" type="radio" name="mark" value="{{ $i }}"> {{ $i }}
                            </label>
                        @endfor
                        <button id="next-btn" class="btn btn-primary" disabled>Next</button>
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
            $('input[name="mark"]').prop('checked', false);
            $('#next-btn').prop('disabled', true);
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

                // TODO: Save mark via AJAX if needed
                // $.post('/save-mark', { image: images[currentIndex], mark: selectedMark, _token: '{{ csrf_token() }}' });

                currentIndex++;
                if (currentIndex < images.length) {
                    showImage(currentIndex);
                } else {
                    // All images marked
                    $('#slideshow-container').html('<div class="alert alert-success text-center">Thank you! All images have been marked.</div>');
                }
            });

            // Show the first image
            showImage(currentIndex);
        });
    </script>
@endsection
