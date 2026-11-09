<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserReservationAuthorizedPaypal extends Mailable
{
    use Queueable, SerializesModels;

    public $routeAndReservationData; // Pass data to the email view
    public $invoice_number; // Pass data to the email view

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($routeAndReservationData, $invoice_number)
    {
        $this->routeAndReservationData = $routeAndReservationData;
        $this->invoice_number = $invoice_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user-reservation-authorized-paypal')
            ->with([
                'routeAndReservationData' => $this->routeAndReservationData,
                'invoice_number' => $this->invoice_number,
                ]) // Pass data to the view
            ->subject('Globus Transfer Reservation Details from');
    }
}
