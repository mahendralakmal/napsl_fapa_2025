@extends('layouts.admin.master_admin')
@section('title')
    Rules & Regulations
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Optionally include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
    .table th, .table td {
        padding: 0.45rem 0.6rem !important;
    }
.thumbnail {
    max-width: 100px;
    transition: all 0.3s ease; /* Smooth transition effect */
    position: relative; /* Needed for z-index */
    z-index: 1; /* Default stacking order */
}

.thumbnail:hover {
    transform: scale(3); /* Enlarge by 1.5 times */
    z-index: 10; /* Bring to front when hovered */
    position: relative;

    box-shadow: 0 0 10px rgba(0,0,0,0.3); /* Optional: Add shadow */
}
</style>
@endsection
@section('content')
    <div class="">
        <div class="row">
            <div class="col-6 row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Entrents</h3>
                                    <span>{{$clentCount}}</span>
                                    <br>
                                    <p><strong>Paid : </strong>{{$paidCount}}</p>
                                    <p><strong>Unpaid : </strong>{{$unpaidCount}}</p>
                                </div>
                            </div>
                            <a href="{{ route('exhibition_entries.download_images') }}" class="btn btn-primary">
                                Download All Images
                            </a>
                        </div>
                        <div class="col-3">
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
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header"><h3>Judging Status</h3></div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judge</th>
                                                <th>Open Color</th>
                                                <th>Open Monochrome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($judging as $index => $row)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $row['user_name'] }}</td>
                                                    <td class="text-center">{{ $row['Open Color'] }}</td>
                                                    <td class="text-center">{{ $row['Open Monochrome'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
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
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header"><h3>User List</h3></div>
                    <div class="card-body table-responsive">
                        {{-- <table class="table table-bordered table-striped align-middle"> --}}
                        <table id="user-table" class="table table-bordered table-striped align-middle">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Has Entry Form</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if($user->fapa)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>
                                            @if(auth()->user()->id !== $user->id && auth()->user()->role === 'admin')
                                                <form action="{{ route('impersonate.start', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-user-secret"></i> Impersonate
                                                    </button>
                                                </form>
                                            @elseif(auth()->user()->id === $user->id && session()->has('impersonate'))
                                                <form action="{{ route('impersonate.stop') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-user-secret"></i> Stop Impersonate
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3>Judgin Results</h3></div>
                    <div class="card-body">
                        <table id="result-table" class="table table-bordered table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Section</th>
                                    <th>Caption</th>
                                    <th>Total Score</th>
                                    <th>Judge Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($judging_results as $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="/storage/{{ $result->image }}" alt="{{ $result->image_name }}" data-image-id="{{ $result->image_id }}" class="thumbnail"></td>
                                        <td>{{ $result->section }}</td>
                                        <td>{{ $result->image_name }}</td>
                                        <td>{{ $result->total_score }}</td>
                                        <td>{{ $result->judge_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
            // Optional customizations:
            "pageLength": 10,
            "order": [], // Disable initial sorting
        });
        $('#result-table').DataTable({
            // Optional customizations:
            "pageLength": 20,
            "order": [], // Disable initial sorting
        });
    });
</script>

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
