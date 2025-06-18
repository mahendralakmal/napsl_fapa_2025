@extends('layouts.master')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Successful</div>

                <div class="card-body">
                    <p>Thank you for your payment!</p>
                    <p>Transaction Reference: {{ $data['txnReference'] }}</p>
                    <p>Amount: {{ $data['transactionAmount']['paymentAmount'] / 100 }} {{ $data['transactionAmount']['currency'] }}</p>
                    <p>Status: {{ $data['responseText'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
