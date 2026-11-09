<?php
namespace App\Services;
use Milon\Barcode\DNS2D;
use App\Models\Reservation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InvoiceService
{
    /**
     * Generates a QR code and a PDF invoice, and returns the invoice number and the path to the PDF.
     */
    public function generate(array $routeAndReservationData): array
    {
        $customerName = ucfirst($routeAndReservationData['first_name']) . ' ' . ucfirst($routeAndReservationData['last_name']);

        // Get the last reservation
        $reservation = Reservation::latest()->first();

        // Calculate the invoice number
        $existingInvoiceCount = Reservation::whereNotNull('invoice_id')->count() + 1;
        $currentYear = date("Y");
        $price = $routeAndReservationData['total_price'] * 100;
        $invoice_id = $existingInvoiceCount . '-1-' . $currentYear;
        $description = 'Ponuda ' . $invoice_id;

        // Save invoice_id to the reservation
        if ($reservation) {
            $reservation->update([
                'invoice_id' => $invoice_id,
            ]);
        }
        
        // Data for HRVHUB30 barcode (2D barcode / QR)
        $data = [
            'HRVHUB30',
            'EUR',
            $amountInCents,
            '',
            '',
            '',
            'GLOBUS TRANSPORTS D.O.O.', // Fictitious company name
            'POSLOVNA ULICA 10',          // Fictitious address
            '10000 ZAGREB',               // Fictitious postal code
            'HR1234567890123456789',      // Fictitious IBAN
            'HR00',
            $invoiceId,
            '',
            $description,
        ];

        $barCodeData = implode("\n", $data);
        $barcode = new DNS2D();
        $barcodeImageData = $barcode->getBarcodePNG($barCodeData, 'PDF417');

        $fileName = $invoice_id . '.png';
        $filePath = storage_path('app/private/' . $fileName);
        File::put($filePath, base64_decode($barcodeImageData));

        $base64ImageData = base64_encode(file_get_contents($filePath));
        $formatted_total_price = number_format($routeAndReservationData['total_price'], 2, ',', '.');

        // PDF generation via Dompdf
        $pdf = app('dompdf.wrapper')->loadView('invoices.custom', [
            'base64ImageData' => $base64ImageData,
            'customerName' => $customerName,
            'routeAndReservationData' => $routeAndReservationData,
            'invoice_id' => $invoice_id,
            'invoice_date' => now()->format('d.m.Y. / H:i:s'),
            'invoice_expiration_date' => now()->addDays(7)->format('d.m.Y.'),
            'formatted_total_price' => $formatted_total_price,
        ]);

        // Saving the PDF to storage
        $pdfFilePath = 'invoices/' . $customerName . '_' . now()->format('Ymd_His') . '.pdf';
        Storage::put($pdfFilePath, $pdf->output());

        return [$invoice_id, $pdfFilePath];
    }
}