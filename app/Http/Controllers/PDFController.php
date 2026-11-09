<?php
    
namespace App\Http\Controllers;
    
use Milon\Barcode\DNS2D;
use App\Models\Reservation;
use Illuminate\Support\Facades\File;

class PDFController extends Controller
{
    public function generateCustomPDF()
    {

       
        $pdf = app('dompdf.wrapper')->loadView('invoices.custom');

        // Return the PDF as a response with appropriate headers for streaming
        return $pdf->stream('invoice.pdf');
    }
}