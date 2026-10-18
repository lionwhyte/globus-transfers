
<!DOCTYPE html>
<html>
<head>
    <title>PDF Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: rgb(73, 73, 73);
            font-size: 0.8rem;
            line-height: 80%;
        }

        header div {
            display: inline-block;
        }

        section div {
            display: inline-block;
        }

    </style>
</head>
<body>
    <div style="height: 96%; width: 100%">
        <header>
            <div>
                <img src="{{ public_path('images/globus-transfers-logo.jpg') }}" alt="Logo" width="250">
                <br>
                <br>
                <p><strong>GLOBUS Transfers</strong></p>
                <p>Zadarska 1, Zadar Hrvatska</p>
                <p>OIB: 123456789</p>
                <table style="margin: -5;">
                    <tr>
                        <td><img src="{{ public_path('images/globus_icon.jpg') }}" alt="Logo" width="20"></td>
                        <td>www.globus-transfers.com.hr</td>
                    </tr>
                    <tr>
                        <td><img src="{{ public_path('images/envelope_icon.jpg') }}" alt="Logo" width="20"></td>
                        <td>globus@mail.test</td>
                    </tr>
                    <tr>
                        <td><img src="{{ public_path('images/phone_icon.png') }}" alt="Logo" width="15"></td>
                        <td>+385 123456789</td>
                    </tr>
                </table>
            </div>
    
            <div style="float: right;">
                <table style="border: 1px solid gray; padding: 16px; border-radius: 8px;">
                    <tr>
                        <th style="text-align: right; padding: 4px;"><h3 style="color: darkcyan">Ponuda: {{ $invoice_id }}</h3></th>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong>Klijent:</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;">{{ $customerName }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong>Datum ponude:</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;">{{ $invoice_date }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong>Valjanost ponude:</strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;">{{ $invoice_expiration_date }}</td>
                    </tr>
                </table>
            </div>
        </header>
        <br>
        <br>
        <br>
        <br>
        <section>
            <table style="width: 100%;">
                <tr>
                    <th colspan="2" style="text-align: left;"><strong>NAZIV I OPIS</strong><hr></th>
                    <th style="text-align: right;"><strong>PDV</strong><hr></th>
                    <th style="text-align: right;"><strong>IZNOS</strong><hr></th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td style="width: 50%; line-height: 110%;"><strong>Najam vozila s vozačem</strong><br>
                        {{ $routeAndReservationData['departure'] }} - {{ $routeAndReservationData['destination'] }}
                        <br>Udaljenost rute: {{ $routeAndReservationData['distance'] }} km
                    </td>
                    <td style="text-align: right;">0%</td>
                    <td style="text-align: right;">{{ $formatted_total_price }} €</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                    <td><hr></td>
                    <td><hr></td>
                </tr>
            </table>
        </section>
    
        <section>
            <div>
                <br>
                <br>
                {{-- <img src="{{ public_path('images/2-1-2024.png') }}" alt="QR Code" width="150"> --}}
                <img src="data:image/png;base64, {{ $base64ImageData }}" alt="QR Code" width="200">
                <br>
                <br>
                <br>
                <p><strong>Način plaćanja: </strong>Transakcijski račun</p>
                <p>
                    <strong>IBAN / BANKA: Raiffeisenbank Austria d.d. Zagreb: </strong>
                </p>
                <p>HR123456789</p>
                <p><strong>Model / Poziv na broj: </strong>00 / {{ $invoice_id }}</p>
                <p>
                    <strong>Napomena: </strong>Ovo nije fiskalizirani račun.
                </p>
                <p>
                    <i>Oslobođeno PDV-a temeljem članka 90. st. 2  Zakona o PDV-u</i>
                </p>
            </div>
            <div style="float: right;">
                <br>
                <table style="border: 1px solid gray; padding: 16px; border-radius: 8px;">
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong>Osnovica</strong>(0%)</td>
                        <td style="text-align: right; padding: 4px;"><strong>{{ $formatted_total_price }} </strong>€</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong>PDV </strong>(0%)</td>
                        <td style="text-align: right; padding: 4px;"><strong>0,00 </strong>€</td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding: 4px;"><strong><h4>UKUPAN IZNOS</h4></strong></td>
                        <td style="text-align: right; padding: 4px; color:darkcyan;"><strong>{{ $formatted_total_price }} </strong>€</td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
    
   {{-- <hr>
   <div style="width: 100%; text-align: center;">
    <small>
        Globus Transfers d.o.o. za trgovinu i usluge • Društvo je upisano u registar Trgovačkog suda u Zagrebu / MBS: 081133926 • Temeljni kapital društva iznosi 265,00 eur i
        uplaćen je u cijelosti • Član uprave: Marko Marković, direktor
    </small>
   </div> --}}
  
  

   {{-- <img src="data:image/png;base64, {{ $base64ImageData }}" alt="QR Code" width="150"> --}}

    <!-- ... (rest of your PDF content) -->
</body>
</html>