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
            <i class="fa fa-credit-card"></i>&nbsp;&nbsp;Pay Here by Credit/Debit card
        </p>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Make Payment</div>

                    <div class="card-body">
                        <form action="{{ route('payment.initiate') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="currency">Currency:</label>
                                <div class="input-group">
                                    <select class="form-control" name="currency" id="currency" required>
                                        <option value="LKR">LKR</option>
                                        <option value="USD" selected>USD</option>
                                        {{-- <option value="EUR">EUR</option> --}}
                                    </select>
                                    {{-- <span class="input-group-text"><i class="fa fa-caret-down"></i></span> --}}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="amount">Amount:</label>
                                <div class="input-group">
                                    <select class="form-control" name="amount" id="amount" required>
                                        <option value="5">5</option>
                                        <option value="8">8</option>
                                    </select>
                                    {{-- <span class="input-group-text"><i class="fa fa-caret-down"></i></span> --}}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="reference">Your reference:</label>
                                <input type="text" class="form-control" name="reference" placeholder="Your reference">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ auth()->user()->email??'' }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name:</label>
                                <input type="name" class="form-control" name="name" placeholder="Name" value="{{ auth()->user()->fapa->name??'' }}" required>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="refund_policy" data-bs-toggle="modal" data-bs-target="#refundPolicyModal">&nbsp;<label class="form-check-label">
                                  <a href="#" id="showRefundPolicy">Accept the refund policy</a>
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="tokenize">&nbsp;<label class="form-check-label"> Save card for future payments</label>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit" id="proceedBtn" disabled>Proceed to Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Policy Modal -->
    <div class="modal fade" id="refundPolicyModal" tabindex="-1" aria-labelledby="refundPolicyModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="refundPolicyModalLabel">Refund Policy</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ol>
                <li>
                    <strong>Refund Eligibility</strong>
                    <ul>
                        <li>The request for a refund is made within <strong>7 days</strong> of the payment date.</li>
                        <li>The service was not delivered as described, or there was a technical issue that prevented delivery.</li>
                        <li>Proof of payment is provided (e.g., order confirmation, transaction ID).</li>
                    </ul>
                </li>
                <li>
                    <strong>Refund Process</strong>
                    <ol>
                        <li>Email us at <a href="mailto:napsrilanka@gmail.com">napsrilanka@gmail.com</a> with the subject line "Refund Request".</li>
                        <li>Provide a brief explanation of your reason for the request.</li>
                        <li>Our team will review your request within <strong>5 working days</strong>.</li>
                        <li>If approved, the refund will be issued to your original payment method within <strong>10 days</strong>, depending on your card issuer’s processing time.</li>
                    </ol>
                </li>
                <li>
                    <strong>Contact Us</strong>
                    <ul>
                        <li>Email: <a href="mailto:napsrilanka@gmail.com">napsrilanka@gmail.com</a></li>
                        <li>Phone: +94 112444336</li>
                    </ul>
                </li>
            </ol>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currencySelect = document.getElementById('currency');
        const amountSelect = document.getElementById('amount');

        function updateAmountOptions() {
            const currency = currencySelect.value;
            amountSelect.innerHTML = '';
            if (currency === 'USD') {
                amountSelect.innerHTML += '<option value="5">5</option>';
                amountSelect.innerHTML += '<option value="8">8</option>';
            } else if (currency === 'LKR') {
                amountSelect.innerHTML += '<option value="1500">1500</option>';
                amountSelect.innerHTML += '<option value="2500">2500</option>';
            }
        }

        currencySelect.addEventListener('change', updateAmountOptions);
        updateAmountOptions();

        const refundCheckbox = document.querySelector('input[name="refund_policy"]');
        const proceedBtn = document.getElementById('proceedBtn');

        refundCheckbox.addEventListener('change', function() {
            proceedBtn.disabled = !this.checked;
        });

        // Set initial state
        proceedBtn.disabled = !refundCheckbox.checked;

        // Show refund policy in modal
        document.getElementById('showRefundPolicy').addEventListener('click', function(e) {
            e.preventDefault();
            var modal = new bootstrap.Modal(document.getElementById('refundPolicyModal'));
            modal.show();
        });
    });
</script>
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
