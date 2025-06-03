@extends('layouts.master')
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
    <div class="container bg-white p-5 rounded shadow">
        <h2 class="mb-3">FAPA Awards 2025</h2>
        <h4>Payment Instructions:</h4>
        <p>
            Entry fee may be transferred/deposited to the National Association of Photographers-Sri Lanka Account No.
            <strong>102960999314</strong> of the Sampath Bank Head Office Branch and the proof of payment should be emailed to <a href="mailto:napsrilanka@gmail.com">napsrilanka@gmail.com</a>
            <br><br>
            or
            <br><br>
            <i class="fa fa-credit-card"></i>&nbsp;&nbsp;Pay Here by Credit/Debit card (to the IPG)
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
