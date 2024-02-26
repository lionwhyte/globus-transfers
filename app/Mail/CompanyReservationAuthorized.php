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

    public $reservationData; // Pass data to the email view

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservationData)
    {
        $this->reservationData = $reservationData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.company-reservation-authorized')
            ->with(['reservationData' => $this->reservationData]) // Pass data to the view
            ->subject('Globus Transfer Reservation Details'); // Set the email subject
    }
}
