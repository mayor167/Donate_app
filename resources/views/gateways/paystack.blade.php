@extends('layouts.default')
@section('title', 'Paystack Payment')
@section('maincontent')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Paystack Payment Summary</h3>
                </div>

                <div class="card-body text-center">

                    @php
                        $data = session('donation_data');
                    @endphp

                    @if ($data)
                        <p><strong>Name:</strong> {{ $data['donorName'] }}</p>
                        <p><strong>Email:</strong> {{ $data['donorEmail'] }}</p>
                        <p><strong>Amount:</strong> <strong class="text-success">${{ $data['donationAmount'] }}</strong></p>

                        <form method="POST" action="{{ route('gateway.submit') }}">
                            @csrf
                            <input type="hidden" name="gateway" value="paypal">
                            <button type="submit" class="btn btn-success btn-lg mt-3">Confirm and Donate</button>
                        </form>
                    @else
                        <p class="text-danger">No donation data found.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
