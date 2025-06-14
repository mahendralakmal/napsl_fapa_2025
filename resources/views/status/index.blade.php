@extends('layouts.master')
@section('title')
    Status
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
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
    </style>
@endsection
@section('content')
    <div class="card ">
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width:5%;text-align: center;">Index No.</th>
                        <th>Author</th>
                        <th>Country</th>
                        <th style="width:10%;text-align: center;">Open Monochrome</th>
                        <th style="width:10%;text-align: center;">Open Color</th>
                        <th style="width:10%;text-align: center;">Payment</th>
                        {{-- @foreach ($sections as $section)
                            <th>{{ $section }}</th>
                        @endforeach --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td>{{ $entry->title}}{{ $entry->name}} ({{ $entry->honors}})</td>
                            <td>{{ $entry->country}}</td>
                            <td style="text-align: center;">{{ $entry->open_monochrome_count}}</td>
                            <td style="text-align: center;">{{ $entry->open_color_count}}</td>
                            <td style="text-align: center;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
@endsection
