

@extends('layouts.default')
@section('title','Home')
@section('maincontent')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3">
            <div class="card p-4 shadow-sm">
                <h1 class="text-center mb-4" style="font-size: 30px;">Lend a Hand. Light Up a Life.</h1>
                {{-- -- display success flash message -- --}}
                @if(session('success'))
                        <div class="alert alert-success ">
                                {{session('success')}}
                        </div>
                @endif
                {{-- display error flash message --}}
                @if(session('error'))
                        <div class="alert alert-danger ">
                                {{session('error')}}
                        </div>
                @endif
                <form action="{{route('donation.process')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="donorName" class="form-label" style="font-weight: bold;">Full Name</label>
                        <input type="text" class="form-control" id="donorName" name="donorName" placeholder="Enter your full name" required>
                    </div>
                        <br>
                    <div class="mb-3">
                        <label for="donorEmail" class="form-label" style="font-weight: bold;">Email Address</label>
                        <input type="email" class="form-control" id="donorEmail" name="donorEmail" placeholder="Enter your email" required>
                    </div>
                        <br>
                    <div class="mb-3">
                        <label for="donationAmount" class="form-label" style="font-weight: bold;">Donation Amount ($)</label>
                        <input type="number" class="form-control" id="donationAmount" name="donationAmount" placeholder="Enter amount" required>
                    </div>
                        <br>
                    <div class="mb-3">
                        <label for="paymentOption" class="form-label" style="font-weight: bold;">Select Payment Method</label>
                        <select class="form-select" id="paymentOption" name="paymentOption" required>
                            <option value="" disabled selected>Select a payment option</option>
                            <option value="paystack">Paystack</option>
                            <option value="paypal">PayPal</option>
                            <option value="stripe">Stripe</option>
                            <option value="binance">Binance</option>
                        </select>
                    </div>
                        <br>
                    <button type="submit" class="btn btn-primary w-100" id="donateBtn">Donate Now</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<center>
    <div class="container">
        <small class="text-muted">
            &copy; {{ date('Y') }} <strong>ReignSolution Technologies.</strong> All rights reserved.
        </small>
    </div>
</center>
<script src="{{asset('custom_js/donate_with_gateway.js')}}"></script>
@endsection