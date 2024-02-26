<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\UserReservationCancel;
use App\Mail\UserReservationRefund;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserReservationConfirmation;

class PayPalWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $headers = $request->header('Paypal-Transmission-Id');

        try {
            // Verify webhook payload if necessary (based on your security settings)
            // Implement logic to handle different PayPal events
            // ...

            Log::info('PayPal webhook received successfully.');
            http_response_code(200);
            exit();
        } catch (\Exception $e) {
            Log::error('PayPal webhook error: ' . $e->getMessage());
            http_response_code(500);
            exit();
        }
    }
}