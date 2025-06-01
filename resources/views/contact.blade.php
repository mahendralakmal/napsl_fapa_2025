@extends('layouts.master')
@section('title')
    Contact
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optionally include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
@endsection
@section('content')
    <div class="container bg-white p-5 rounded shadow">
        <h2 class="mb-3">Contact</h2>
        <p>
            <strong>Wimal Amaratunge. EFIAP</strong><br>
            Exhibition Chairman<br>
            National Association of Photographers-Sri Lanka<br>
            290, D. R. Wijewardena Mawatha,<br>
            Colombo. 01000<br>
            SRI LANKA<br>
            <i class="fa fa-phone"></i>&nbsp;&nbsp;+94 777790626<br>
            <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:napsrilanka@gmail.com">napsrilanka@gmail.com</a>
        </p>
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
@endsection
