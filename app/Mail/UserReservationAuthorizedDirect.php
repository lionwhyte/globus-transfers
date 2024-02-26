<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserReservationAuthorizedDirect extends Mailable
{
    use Queueable, SerializesModels;

    public $routeAndReservationData; // Pass data to the email view
    public $invoice_number;
    public $pdfFilePath; // Pass PDF instance to the email view

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($routeAndReservationData, $invoice_number, $pdfFilePath)
    {
        $this->routeAndReservationData = $routeAndReservationData;
        $this->invoice_number = $invoice_number;
        $this->pdfFilePath = $pdfFilePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice_number = $this->invoice_number;
        $pdfFilePath = $this->pdfFilePath;
        $bookingNumber = (explode("-",$invoice_number))[0];

        return $this->view('emails.user-reservation-authorized-direct')
            ->with([
                'reservationData' => $this->routeAndReservationData,
                'bookingNumber' => $bookingNumber
                ]) // Pass data to the view
            ->subject('Globus Transfer Reservation Details')
            ->attach(storage_path('app/' . $pdfFilePath), [
                'as' => 'invoice-' . $invoice_number . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
