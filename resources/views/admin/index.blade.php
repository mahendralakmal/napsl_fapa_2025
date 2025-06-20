@extends('layouts.admin.master_admin')
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
    <div class="">
        <div class="row">
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <h3>Entrents</h3>
                        <span>{{$clentCount}}</span>
                        <br>
                        <p><strong>Paid : </strong>{{$paidCount}}</p>
                        <p><strong>Unpaid : </strong>{{$unpaidCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Entries</h3>
                        <span>{{$entriesCount}}</span>
                        <br>
                        <p><strong>Monochrome : </strong>{{$monochromeCount}}</p>
                        <p><strong>Color : </strong>{{$colorCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h3>Payment Confirmation</h3></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" id="paymentConfirmationForm">
                            @csrf
                            <div class="mb-3">
                                <label for="client_id" class="form-label">Select Client</label>
                                <select class="form-select" name="client_id" id="client_id" required>
                                    <option value="">Select Client</option>
                                    @foreach($clients as $client)(
                                        @if($client->fapa))
                                            <option value="{{ $client->fapa->id }}">{{ $client->fapa->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <select class="form-select" name="payment_status" id="payment_status" required>
                                    <option value="">Select Payment Status</option>
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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
    $('#paymentConfirmationForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("payments.store") }}',
            type: 'POST',
            data: $(this).serialize(),
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function(response) {
                if(response.success) {
                    alert('Payment status updated!');
                    location.reload();
                }
            },
            error: function(xhr) {
                alert('Error: ' + (xhr.responseJSON.message || 'Something went wrong.'));
            }
        });
    });
    </script>
@endsection
