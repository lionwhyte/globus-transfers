<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyReservationAuthorized extends Mailable
{
    use Queueable, SerializesModels;

    public $routeAndReservationData; // Pass data to the email view
    public $invoice_number;

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
        return $this->view('emails.company-reservation-authorized')
            ->with(['routeAndReservationData' => $this->routeAndReservationData]) // Pass data to the view
            ->subject('Globus Transfer Reservation Details from ' . ucfirst($this->routeAndReservationData['first_name']) . ' ' . ucfirst($this->routeAndReservationData['last_name']));

    }
}
