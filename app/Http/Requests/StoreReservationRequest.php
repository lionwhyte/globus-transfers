<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    /**
     * It determines whether the user has the right to execute this request.
     */
    public function authorize(): bool
    {
        return true; // We set it to `true` because the control is handled via the session.
    }

    /**
     * Validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Dynamic passenger rules depending on the vehicle stored in the session
        $vehicle = session('routeAndReservationData.vehicle');
        $passengersRules = match ($vehicle) {
            'standard' => 'required|integer|between:1,3',
            'minivan' => 'required|integer|between:1,8',
            default => 'required|integer|between:1,16',
        };

        $dayAfterTomorrow = Carbon::now()->addDays(2)->format('F-d-Y');

        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'email_confirmation' => 'required|email|same:email',
            'phone' => 'required|string|max:20',
            'pick_up_address' => 'required|string|max:255',
            'destination_address' => 'required|string|max:255',
            'passengers' => $passengersRules,
            'departure-date' => 'required|date_format:"F-d-Y"|after_or_equal:' . $dayAfterTomorrow,
            'pickup-time' => 'required|date_format:H:i',
            'payment_option' => 'required|in:direct-bank-transfer',
        ];
    }

    /**
     * Custom poruke pogrešaka na jeziku aplikacije.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => __('content.first_name_required'),
            'last_name.required' => __('content.last_name_required'),
            'email.required' => __('content.email_required'),
            'email.email' => __('content.email_email'),
            'email_confirmation.required' => __('content.email_confirmation_required'),
            'email_confirmation.same' => __('content.email_confirmation_same'),
            'phone.required' => __('content.phone_required'),
            'pick_up_address.required' => __('content.pick_up_address_required'),
            'destination_address.required' => __('content.destination_address_required'),
            'passengers.required' => __('content.passengers_required'),
            'passengers.integer' => __('content.passengers_integer'),
            'passengers.between' => __('content.passengers_between'),
            'departure-date.required' => __('content.departure-date_required'),
            'departure-date.date_format' => __('content.departure-date_date_format'),
            'departure-date.after_or_equal' => __('content.departure-date_after_or_equal'),
            'pickup-time.required' => __('content.pickup-time_required'),
            'pickup-time.date_format' => __('content.pickup-time_date_format'),
            'payment_option.required' => __('content.payment_option_required'),
            'payment_option.in' => __('content.payment_option_in'),
        ];
    }
}