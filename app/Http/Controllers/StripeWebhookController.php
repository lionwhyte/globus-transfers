<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\UserReservationCancel;
use App\Mail\UserReservationRefund;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserReservationConfirmation;


class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('stripe-signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, 'whsec_2ed702cfbf9d44cbd06756ae1311975c93b1782e57c2239935a09a3a9c5ba853' 
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('UnexpectedValueException: ' . $e->getMessage());
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            Log::error('SignatureVerificationException: ' . $e->getMessage());
            http_response_code(400);
            exit();
        }


        try {
            // Access specific information from the Stripe event
            $eventType = $event->type;
            $data = $event->data;
        
            // Check if payment_intent is set
            $paymentIntentId = isset($data->object->payment_intent) ? $data->object->payment_intent : null;
            $paymentId = $data->object->id;
        
            // Check if paymentIntentId is set
            if ($paymentIntentId) {
                $transactionId = $paymentIntentId;
            } elseif ($paymentId) {
                $transactionId = $paymentId;
            } else {
                // Log an error if neither payment_intent nor id is set
                Log::error('Invalid Stripe event: No payment_intent or id found.');
                http_response_code(400);
                exit();
            }
        
            // Example: Find reservation with matching stripe_transaction_id
            $reservation = Reservation::where('stripe_transaction_id', $transactionId)->first();
        
            if (!$reservation) {
                Log::error('Reservation not found for Stripe transaction ID: ' . $transactionId);
                http_response_code(404);
                exit();
            }
        
            // Retrieve customer related to the reservation
            $customer = $reservation->customer;
        
            // Send emails based on event type
            if ($eventType === 'charge.captured') {
                Mail::to($customer->email)->send(new UserReservationConfirmation($reservation, $customer, $transactionId));
            } elseif ($eventType === 'charge.refund.updated') {
                Mail::to($customer->email)->send(new UserReservationRefund($reservation, $customer, $transactionId));
            } elseif ($eventType === 'payment_intent.canceled') {
                Mail::to($customer->email)->send(new UserReservationCancel($reservation, $customer, $transactionId));
            }
        
            // Your custom logic based on the event type
            // ...
        
        } catch (\Exception $e) {
            // Log errors and return a response
            Log::error('Exception: ' . $e->getMessage());
            http_response_code(500);
            exit();
        }
    }
}
