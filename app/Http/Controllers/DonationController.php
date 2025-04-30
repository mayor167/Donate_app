<?php

namespace App\Http\Controllers;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    //show home page to donate fund
    public function showForm(){
        return view('home');
    }
    public function processDonation(Request $request){

        //validate before grapping user data on home page
        $validated_data = $request->validate([
                        'donorName'      => 'required|string|max:255',
                        'donorEmail'     => 'required|email|max:255',
                        'donationAmount' => 'required|numeric|min:1',
                        'paymentOption'  => 'required|in:paystack,paypal,stripe,binance',
        ]);
        //storing the validated data temporarily from user using session
        // $request ->session()->put('donation_data', $validated_data);

        
        $request->session()->put('donation_data', $validated_data);
        return redirect()->route('payment.gateway', ['gateway' => strtolower($validated_data['paymentOption'])]);
    }
    public function showGateway($gateway){
        // Check if the gateway is valid
        if (!in_array($gateway, ['paystack', 'paypal', 'stripe', 'binance'])) {
            return redirect()->route('donation.form')
                ->with('error', 'Invalid payment gateway selected.');
        }

        // Render the gateway page
        return view("gateways.{$gateway}");
    }

    public function submitGateway(Request $request){
    // Validate the gateway input using request validate
    $request->validate([
        'gateway' => 'required|in:paystack,paypal,stripe,binance',
    ]);

    // Retrieve donation data from session
    $donationData = session('donation_data');

    if (!$donationData) {
        return redirect()->route('donation.form')
            ->with('error', 'No donation data found. Please start over.');
    }

    // Save donation to database
    try {
        Donation::create([
            'donor_name' => $donationData['donorName'],
            'donor_email' => $donationData['donorEmail'],
            'donation_amount' => $donationData['donationAmount'],
            'payment_option' => $donationData['paymentOption'],
        ]);

        // Clear session data
        $request->session()->forget('donation_data');

        // Redirect back to form with success message
        return redirect()->route('donation.form')
            ->with('success', 'Donation confirmed successfully!');
    } catch (\Exception $e) {
        return redirect()->route('donation.form')
            ->with('error', 'An error occurred while confirming your donation. Please try again.');
    }
}


    }

