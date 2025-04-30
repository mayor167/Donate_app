<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;

Route::get('/', [DonationController::class, 'showForm'])->name('donation.form');
Route::post('/donation', [DonationController::class, 'processDonation'])->name('donation.process');
Route::get('/payment/{gateway}', [DonationController::class, 'showGateway'])->name('payment.gateway');
Route::post('/gateway/submit', [DonationController::class, 'submitGateway'])->name('gateway.submit');
