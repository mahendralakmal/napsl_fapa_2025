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
            {{-- <i class="fa fa-credit-card"></i>&nbsp;&nbsp;Pay Here by Credit/Debit card --}}
        </p>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Make Payment</div>

                    <div class="card-body">
                        <form action="{{ route('payment.initiate') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" class="form-control" name="amount" required> <!-- min="200" required> -->
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency:</label>
                                <select class="form-control" name="currency" required>
                                    <option value="LKR">LKR</option>
                                    <option value="USD" selected>USD</option>
                                    <option value="AUD">AUD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reference">Your reference:</label>
                                <input type="text" class="form-control" name="reference" placeholder="Your reference">
                            </div>
                            <div class="form-group">
                                <label for="email">email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="name" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="tokenize">&nbsp;<label class="form-check-label"> Save card for future payments</label>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Proceed to Payment</button>
                        </form>
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
@endsection
