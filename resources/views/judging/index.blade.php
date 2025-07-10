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
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row w-100 justify-content-center">
            <div class="col-3 card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="">Choose Image Category</label>
                        <select class="form-select" name="image_category" id="image_category" required>
                            <option value="">Select Category</option>
                            <option value="Open Monochrome">Open Monochrome</option>
                            <option value="Open Color">Open Color</option>
                        </select>
                        <div id="category-error" class="text-danger mt-2" style="display:none;">Please select an image category.</div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Round 1</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            $('.btn-primary').on('click', function() {
                var category = $('#image_category').val();
                if (category) {
                    $('#category-error').hide();
                    window.location.href = '/judging/marking-carousel?category=' + encodeURIComponent(category);
                } else {
                    $('#category-error').show();
                }
            });

            $('#image_category').on('change', function() {
                if ($(this).val()) {
                    $('#category-error').hide();
                }
            });
        });
    </script>
@endsection
