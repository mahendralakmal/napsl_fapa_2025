@extends('layouts.master')
@section('title')
    Home
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <style>
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #carouselExampleIndicators {
            max-width: 800px;
            margin: auto;
        }

        .carousel-inner {
            height: 400px; /* Set your desired height */
        }

        .carousel-inner .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .owl-carousel .item img {
            width: 800px;
            height: 500px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        /* Center dots below the image */
        .owl-dots {
            text-align: center;
            margin-top: 10px;
            position: relative;
            bottom: 35px!important;
        }
        .owl-dot span {
            width: 14px;
            height: 14px;
            background: #bbb;
            display: inline-block;
            border-radius: 50%;
            margin: 5px 4px;
            transition: background 0.3s;
        }
        .owl-dot.active span {
            background: #007bff;
        }
    </style>
@endsection
@section('content')
<div>
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 1.jpg') }}" alt="Image 1" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 2.jpg') }}" alt="Image 2" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 3.jpg') }}" alt="Image 3" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 4.jpg') }}" alt="Image 4" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 5.jpg') }}" alt="Image 5" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 6.jpg') }}" alt="Image 6" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 7.jpg') }}" alt="Image 7" class="img-fluid mx-auto d-block">
        </div>
        <div class="item">
            <img src="{{ asset('images/carusel/FAPA Web 9.jpg') }}" alt="Image 8" class="img-fluid mx-auto d-block">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
          items:1,
          loop:true,
          margin:0,
          nav:false,
          dots:true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true
      });
    });
    </script>
@endsection
